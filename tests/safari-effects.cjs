// Run against the real PHP page: php -S 127.0.0.1:8765 -t .
// Install Playwright, then: node tests/safari-effects.cjs
const assert = require('node:assert/strict');
const { chromium, webkit, devices } = require('playwright');
const url = process.env.TEST_URL || 'http://127.0.0.1:8765';

async function canvasPixels(page) {
    return page.locator('.presence__net').evaluate(canvas => {
        const data = canvas.getContext('2d').getImageData(0, 0, canvas.width, canvas.height).data;
        return data.reduce((sum, value, index) => sum + (index % 4 === 3 && value > 0 ? 1 : 0), 0);
    });
}

async function run(browser, engine, scenario) {
    const mobile = scenario !== 'desktop';
    const context = await browser.newContext(mobile ? devices['iPhone 13'] : { viewport: { width: 1440, height: 900 } });
    const page = await context.newPage();
    const errors = [];
    page.on('pageerror', error => errors.push(error.message));
    await page.route('https://fonts.googleapis.com/**', route => route.abort());
    await page.route('https://fonts.gstatic.com/**', route => route.abort());
    if (scenario === 'reduced') await page.emulateMedia({ reducedMotion: 'reduce' });
    if (scenario === 'media-error' || scenario === 'missing-apis') {
        await page.addInitScript(mode => {
            if (mode === 'media-error') {
                HTMLMediaElement.prototype.play = function () { throw new DOMException('Simulated media failure', 'NotSupportedError'); };
            } else {
                delete window.IntersectionObserver;
                delete window.ResizeObserver;
                HTMLCanvasElement.prototype.getContext = () => null;
                HTMLMediaElement.prototype.play = () => Promise.reject(new DOMException('Autoplay blocked', 'NotAllowedError'));
            }
        }, scenario);
    }
    await page.goto(url, { waitUntil: 'domcontentloaded' });
    // Avoid smooth-scroll timing in tests; application scroll transforms remain enabled.
    await page.addStyleTag({ content: 'html { scroll-behavior: auto !important; }' });
    await page.waitForFunction(() => document.querySelector('.story.is-on'));
    if (scenario === 'reduced') {
        assert.equal(await page.locator('.story.is-on').getAttribute('data-story'), '4');
        assert.equal(await page.locator('.hero__clip').evaluateAll(clips => clips.every(clip => clip.paused)), true);
    } else {
        assert.equal(await page.locator('.story.is-on').getAttribute('data-story'), '1');
        if (scenario === 'mobile') {
            const supported = await page.locator('video').first().evaluate(el => el.canPlayType('video/mp4; codecs="avc1.4d401f"'));
            if (supported) {
                await page.waitForFunction(() => [...document.querySelectorAll('video')].some(el => !el.paused && el.currentTime > 0.1), null, { timeout: 4000 });
                console.log(`PASS ${engine}: muted inline MP4 playback`);
            } else console.log(`SKIP ${engine}: host has no H.264 decoder; poster fallback tested separately`);
        }
        await page.waitForFunction(() => document.querySelector('.story-2.is-on'), null, { timeout: 6000 });
        await page.waitForFunction(() => document.querySelector('.story-word[data-word="a"].is-on'), null, { timeout: 6000 });
        await page.waitForFunction(() => document.querySelector('.story-word[data-word="b"].is-on'), null, { timeout: 4000 });
    }
    if (scenario === 'media-error' || scenario === 'missing-apis') {
        assert.equal(await page.locator('.hero__clip.is-on').count(), 0, 'failed video must leave the poster visible');
    }
    await page.locator('.statement').scrollIntoViewIfNeeded();
    await page.waitForTimeout(300);
    const before = await page.locator('.statement__image').evaluate(el => el.style.transform);
    await page.evaluate(() => window.scrollBy({ top: 150, behavior: 'instant' }));
    await page.waitForTimeout(300);
    const after = await page.locator('.statement__image').evaluate(el => el.style.transform);
    if (scenario === 'reduced') assert.equal(after, 'none');
    else assert.notEqual(before, after, 'the image must move on scroll');

    await page.locator('.presence__map').scrollIntoViewIfNeeded();
    await page.waitForTimeout(900);
    const map = await page.locator('.tr-map').boundingBox();
    assert.ok(map.width > 200 && map.height > 70, 'SVG map has a usable size');
    await page.waitForFunction(() => getComputedStyle(document.querySelector('.presence__map')).opacity === '1');
    if (scenario !== 'missing-apis') assert.ok(await canvasPixels(page) > 100, 'network contains visible lines and nodes');
    else assert.match(await page.locator('.presence').evaluate(el => getComputedStyle(el).backgroundImage), /presence-net.svg/);
    if (scenario === 'reduced') {
        const still = await page.locator('canvas').evaluate(el => el.toDataURL());
        await page.waitForTimeout(200);
        assert.equal(await page.locator('canvas').evaluate(el => el.toDataURL()), still, 'reduced motion keeps the network static');
    }
    const pinAnimation = await page.locator('.map-pin__dot').first().evaluate(el => getComputedStyle(el).animationName);
    assert.equal(pinAnimation, scenario === 'reduced' ? 'none' : 'pin-breathe');
    await page.locator('.map-pin[data-office="Gaziantep"]').click();
    assert.equal(await page.locator('.map-pin.is-on').getAttribute('data-office'), 'Gaziantep');
    await page.locator('.office-toggle[data-office="Mersin"]').click();
    assert.equal(await page.locator('.map-pin.is-on').getAttribute('data-office'), 'Mersin');
    assert.ok(await page.locator('.tr-stage').evaluate(el => el.classList.contains('is-framed')));
    if (mobile) {
        await page.setViewportSize({ width: 844, height: 390 });
        await page.waitForTimeout(300);
        const size = await page.locator('.tr-zoom').evaluate(el => ({ width: el.offsetWidth, stage: el.parentElement.clientWidth }));
        assert.ok(size.width > 0 && size.width <= size.stage + 1, 'map fits after rotation');
    }
    if (scenario === 'reduced') {
        await page.emulateMedia({ reducedMotion: 'no-preference' });
        await page.waitForFunction(() => document.querySelector('.story-1.is-on'));
        await page.emulateMedia({ reducedMotion: 'reduce' });
        await page.waitForFunction(() => document.querySelector('.story-4.is-on'));
    }
    assert.deepEqual(errors, [], 'no uncaught JavaScript errors');
    console.log(`PASS ${engine}: ${scenario}`);
    await context.close();
}

(async () => {
    for (const [name, type] of Object.entries({ webkit, chromium })) {
        const browser = await type.launch();
        try {
            for (const scenario of ['mobile', 'desktop', 'reduced', 'media-error', 'missing-apis']) {
                await run(browser, name, scenario);
            }
        } finally { await browser.close(); }
    }
})().catch(error => { console.error(error); process.exitCode = 1; });
