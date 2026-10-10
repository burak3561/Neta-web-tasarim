# Safari effects regression checks

Start the actual PHP application in the repository root:

```sh
php -S 127.0.0.1:8765 -t .
```

In another terminal, install the development-only test runner and run the checks:

```sh
npm install --no-save --package-lock=false playwright@1.62.1
npx playwright install webkit chromium
node --check assets/app.js
php -l index.php
node tests/safari-effects.cjs
```

Set `TEST_URL` to use another local PHP server. No Node dependencies are needed in production.

The suite runs WebKit and Chromium in iPhone 13 and desktop dimensions. It checks story/word progression, H.264 playback when the host supports it, scroll parallax, SVG sizing, canvas pixels, marker animation and selection, rotation, reduced motion (including live changes), synchronous playback failure, rejected autoplay, missing observers, and an unavailable canvas context. Media/API failures are injected resilience tests, not a claim that every iPhone has those failures.

## Diagnosis and changes

- The mobile media queries did not intentionally hide the requested effects. All initializers shared one script; an unguarded media operation or unavailable observer/context could prevent later initializers, including hero text, from running. Guard media seeking/playback and optional APIs. Keep the heading and reveal content visible before enhancement.
- Video tags had `muted` and `playsinline`, but no declarative `autoplay`; inactive videos had no poster. Add autoplay to the first clip, metadata preload and posters to all clips, expose a clip only after `playing`, and retry blocked playback from a user gesture. Pause while hidden or reduced motion is requested.
- Map sizing depended entirely on `cqi`/`cqh` and size containment. Safari before 16 cannot use those units. Fit the SVG from stage dimensions with resize handling and a CSS width fallback. Give the SVG explicit intrinsic dimensions.
- The full-width, higher-layer presence container intercepted desktop map clicks. Pass through events outside the actual copy/office controls.
- Reduced motion previously skipped the canvas completely. Render a still network instead; keep an SVG background if canvas is unavailable. Bound the canvas backing store, maintain visible connection distances on narrow screens, and stop offscreen animation.
- React to changes in reduced motion for stories, parallax, canvas and videos without reloading. Preserve static map markers and content.
- All four existing MP4 files contain H.264 Main profile level 3.1 configuration (`avcC: 014d401f`) and have `moov` before `mdat`; no video re-encoding was necessary based on this inspection.

References: [WebKit iOS video policies](https://webkit.org/blog/6784/new-video-policies-for-ios/), [Safari 16 container units](https://webkit.org/blog/13152/webkit-features-in-safari-16-0/).

## Physical-device acceptance

Windows Playwright WebKit is not an actual iPhone. Before merging/deploying, check iPhone Safari with normal and Low Power Mode, reduced motion on/off, and portrait/landscape. Confirm the poster remains visible when autoplay is blocked, a tap can retry playback, all story words appear, the image moves while scrolling, and the network/office pins remain visible and selectable. With reduced motion on, a static heading/image/network and paused video are intentional.

The live deployment URL/server was not supplied. Production MP4 MIME type, byte-range responses, caching, device-specific compositing and iOS power restrictions cannot be certified by the local PHP tests.
