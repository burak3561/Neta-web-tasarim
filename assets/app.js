const header = document.querySelector(".site-header");
const menuButton = document.querySelector(".menu-button");
const mobileNav = document.querySelector(".mobile-nav");

const updateHeader = () => {
    if (header) header.classList.toggle("is-sticky", window.scrollY > 34);
};

updateHeader();
window.addEventListener("scroll", updateHeader, { passive: true });

const toTop = document.querySelector(".to-top");

if (toTop) {
    const toggleToTop = () => {
        toTop.classList.toggle("is-on", window.scrollY > 480);
    };

    toggleToTop();
    window.addEventListener("scroll", toggleToTop, { passive: true });
    toTop.addEventListener("click", () => {
        const reduce = window.matchMedia("(prefers-reduced-motion: reduce)").matches;
        window.scrollTo({ top: 0, behavior: reduce ? "auto" : "smooth" });
    });
}

menuButton?.addEventListener("click", () => {
    const isOpen = menuButton.getAttribute("aria-expanded") === "true";
    menuButton.setAttribute("aria-expanded", String(!isOpen));
    menuButton.setAttribute("aria-label", isOpen ? "Menüyü aç" : "Menüyü kapat");
    mobileNav.classList.toggle("is-open", !isOpen);
    document.body.classList.toggle("menu-open", !isOpen);
});

mobileNav?.querySelectorAll("a").forEach((link) => {
    link.addEventListener("click", () => {
        menuButton.setAttribute("aria-expanded", "false");
        menuButton.setAttribute("aria-label", "Menüyü aç");
        mobileNav.classList.remove("is-open");
        document.body.classList.remove("menu-open");
    });
});

const motion = window.matchMedia("(prefers-reduced-motion: reduce)");
const onMotionChange = (callback) => {
    if (motion.addEventListener) motion.addEventListener("change", callback);
    else motion.addListener(callback);
};

const observer = "IntersectionObserver" in window ? new IntersectionObserver(
    (entries) => {
        entries.forEach((entry) => {
            if (!entry.isIntersecting) return;
            entry.target.classList.add("is-visible");
            observer.unobserve(entry.target);
        });
    },
    { threshold: 0.12 }
) : null;

document.querySelectorAll(".reveal").forEach((element, index) => {
    element.style.transitionDelay = `${Math.min(index % 4, 3) * 80}ms`;
    if (observer) {
        element.classList.add("reveal--pending");
        observer.observe(element);
    } else element.classList.add("is-visible");
});

const clips = [...document.querySelectorAll(".hero__clip")];
if (clips.length) {
    let clipIndex = 0;
    let clipTimer = 0;
    clips.forEach((clip) => {
        clip.muted = true;
        clip.defaultMuted = true;
        clip.playsInline = true;
        clip.addEventListener("playing", () => {
            if (clips[clipIndex] === clip && !motion.matches && !document.hidden) {
                clip.classList.add("is-on");
            } else clip.pause();
        });
        clip.addEventListener("error", () => clip.classList.remove("is-on"));
    });
    const playClip = () => {
        const clip = clips[clipIndex];
        if (motion.matches || document.hidden) return;
        // A synchronous media error must not prevent the text, map or scroll effects.
        try {
            const playback = clip.play();
            if (playback && playback.catch) playback.catch(() => clip.classList.remove("is-on"));
        } catch (error) {
            clip.classList.remove("is-on");
        }
    };
    const showClip = () => {
        window.clearTimeout(clipTimer);
        clips.forEach((clip) => {
            clip.classList.remove("is-on");
            clip.pause();
        });
        if (motion.matches || document.hidden) return;
        const clip = clips[clipIndex];
        // Safari may reject seeking before metadata/seekable ranges are available.
        if (clip.readyState >= 1 && clip.seekable.length) {
            try { clip.currentTime = 0; } catch (error) { /* Keep the current frame. */ }
        }
        playClip();
        clipTimer = window.setTimeout(nextClip, 4200);
    };
    const nextClip = () => {
        clipIndex = (clipIndex + 1) % clips.length;
        showClip();
    };
    // Retry within a real gesture when iOS blocks autoplay (e.g. Low Power Mode).
    document.addEventListener("touchend", playClip, { passive: true });
    document.addEventListener("click", playClip);
    document.addEventListener("visibilitychange", showClip);
    window.addEventListener("pageshow", showClip);
    onMotionChange(showClip);
    showClip();
}

const statement = document.querySelector(".statement");
const statementImage = document.querySelector(".statement__image");

if (statement && statementImage) {
    let frame = 0;
    const moveStatement = () => {
        frame = 0;
        if (motion.matches) {
            statementImage.style.transform = "none";
            return;
        }
        const rect = statement.getBoundingClientRect();
        const view = window.innerHeight || 1;
        const center = rect.top + rect.height / 2 - view / 2;
        const shift = Math.max(-110, Math.min(110, center * -0.22));
        statementImage.style.transform = `translate3d(0, ${shift.toFixed(1)}px, 0)`;
        frame = 0;
    };
    const requestMove = () => {
        if (frame) return;
        frame = window.requestAnimationFrame(moveStatement);
    };
    window.addEventListener("scroll", requestMove, { passive: true });
    window.addEventListener("resize", requestMove, { passive: true });
    onMotionChange(requestMove);
    moveStatement();
}

const presenceNet = document.querySelector(".presence__net");

if (presenceNet) {
    const context = presenceNet.getContext("2d");
    if (context) {
        const nodes = Array.from({ length: 36 }, () => ({
            x: Math.random(),
            y: Math.random(),
            vx: (Math.random() - 0.5) * 0.00022,
            vy: (Math.random() - 0.5) * 0.00018,
        }));
        let netFrame = 0;

        const drawNet = () => {
            const width = presenceNet.parentElement.clientWidth;
            const height = presenceNet.parentElement.clientHeight;
            if (!width || !height) return;
            // Bound the backing store on high-DPI iPhones, including tall mobile layouts.
            const ratio = Math.min(window.devicePixelRatio || 1, 2, 4096 / width, 4096 / height,
                Math.sqrt(4000000 / (width * height)));
            if (presenceNet.width !== Math.round(width * ratio) || presenceNet.height !== Math.round(height * ratio)) {
                presenceNet.width = Math.round(width * ratio);
                presenceNet.height = Math.round(height * ratio);
            }
            context.setTransform(ratio, 0, 0, ratio, 0, 0);
            context.clearRect(0, 0, width, height);
            if (!motion.matches) nodes.forEach((node) => {
                node.x += node.vx;
                node.y += node.vy;
                if (node.x < 0 || node.x > 1) node.vx *= -1;
                if (node.y < 0 || node.y > 1) node.vy *= -1;
            });
            const reach = Math.max(180, Math.min(width, height) * 0.28);
            context.lineWidth = 1;
            for (let first = 0; first < nodes.length; first += 1) {
                for (let second = first + 1; second < nodes.length; second += 1) {
                    const dx = (nodes[first].x - nodes[second].x) * width;
                    const dy = (nodes[first].y - nodes[second].y) * height;
                    const distance = Math.hypot(dx, dy);
                    if (distance > reach) continue;
                    context.strokeStyle = `rgba(176, 198, 230, ${(1 - distance / reach) * 0.42})`;
                    context.beginPath();
                    context.moveTo(nodes[first].x * width, nodes[first].y * height);
                    context.lineTo(nodes[second].x * width, nodes[second].y * height);
                    context.stroke();
                }
            }
            nodes.forEach((node) => {
                context.fillStyle = "rgba(226, 234, 244, .9)";
                context.beginPath();
                context.arc(node.x * width, node.y * height, 2.2, 0, Math.PI * 2);
                context.fill();
            });
            presenceNet.parentElement.classList.add("presence--net-ready");
        };

        let netVisible = true;
        const loopNet = () => {
            netFrame = 0;
            if (document.hidden || !netVisible) return;
            drawNet();
            if (!motion.matches) netFrame = window.requestAnimationFrame(loopNet);
        };
        const refreshNet = () => {
            window.cancelAnimationFrame(netFrame);
            loopNet();
        };
        if ("IntersectionObserver" in window) {
            const watchNet = new IntersectionObserver((entries) => {
                netVisible = entries.some((entry) => entry.isIntersecting);
                refreshNet();
            });
            watchNet.observe(presenceNet.parentElement);
        }
        window.addEventListener("resize", refreshNet, { passive: true });
        document.addEventListener("visibilitychange", refreshNet);
        onMotionChange(refreshNet);
        refreshNet();
    }
}

// Use actual stage dimensions; cqi/cqh are unavailable before Safari 16.
const mapStage = document.querySelector(".tr-stage");
const mapZoom = document.querySelector(".tr-zoom");
if (mapStage && mapZoom) {
    const sizeMap = () => {
        mapZoom.style.width = `${Math.min(mapStage.clientWidth, mapStage.clientHeight * 1000 / 371)}px`;
    };
    if ("ResizeObserver" in window) new ResizeObserver(sizeMap).observe(mapStage);
    window.addEventListener("resize", sizeMap, { passive: true });
    sizeMap();
}

const officeToggles = [...document.querySelectorAll(".office-toggle")];
const officeCard = document.querySelector(".office-card");

if (officeToggles.length && officeCard) {
    const selectOffice = (city) => {
        document.querySelectorAll("[data-office]").forEach((element) => {
            const active = element.dataset.office === city;
            element.classList.toggle("is-on", active);
            if (element.matches("button")) element.setAttribute("aria-pressed", String(active));
        });
        const source = officeToggles.find((toggle) => toggle.dataset.office === city);
        if (!source) return;
        officeCard.querySelector("[data-field='label']").textContent = source.dataset.label;
        officeCard.querySelector("[data-field='address']").textContent = source.dataset.address;
        const phone = officeCard.querySelector("[data-field='phone']");
        const email = officeCard.querySelector("[data-field='email']");
        phone.textContent = source.dataset.phone;
        phone.setAttribute("href", source.dataset.tel);
        email.textContent = source.dataset.email;
        email.setAttribute("href", `mailto:${source.dataset.email}`);
        const pin = document.querySelector(`.map-pin[data-office="${CSS.escape(city)}"]`);
        const zoomLayer = document.querySelector(".tr-zoom");
        const stage = document.querySelector(".tr-stage");
        if (!pin || !zoomLayer || !stage) return;
        const x = Number.parseFloat(pin.style.left);
        const y = Number.parseFloat(pin.style.top);
        const scale = 2.15;
        stage.classList.add("is-framed");
        zoomLayer.style.setProperty("--map-scale", String(scale));
        zoomLayer.style.transform = `translate(${(50 - x * scale).toFixed(2)}%, ${(50 - y * scale).toFixed(2)}%) scale(${scale})`;
    };

    document.querySelectorAll(".office-toggle, .map-pin").forEach((button) => {
        button.addEventListener("click", () => selectOffice(button.dataset.office));
    });
}

const hero = document.querySelector(".hero");

if (hero) {
    const stories = [...hero.querySelectorAll(".story")];
    const words = [...hero.querySelectorAll(".story-word")];
    const meter = hero.querySelector(".story-meter span");
    const beats = [
        { story: "1", word: null, hold: 3600 },
        { story: "2", word: null, hold: 3600 },
        { story: "3", word: "a", hold: 1700 },
        { story: "3", word: "b", hold: 1700 },
        { story: "3", word: "c", hold: 1700 },
        { story: "4", word: null, hold: 4200 },
    ];

    const showStory = (name) => {
        stories.forEach((story) => {
            const active = story.dataset.story === name;
            if (active) {
                story.classList.remove("is-out");
                story.classList.add("is-on");
                return;
            }
            if (!story.classList.contains("is-on")) return;
            story.classList.remove("is-on");
            story.classList.add("is-out");
            window.setTimeout(() => story.classList.remove("is-out"), 620);
        });
    };

    const showWord = (name) => {
        words.forEach((word) => {
            const active = name && word.dataset.word === name;
            if (active) {
                word.classList.remove("is-out");
                word.classList.add("is-on");
                return;
            }
            if (!word.classList.contains("is-on")) return;
            word.classList.remove("is-on");
            word.classList.add("is-out");
            window.setTimeout(() => word.classList.remove("is-out"), 520);
        });
    };

    let storyTimer = 0;
    let beat = 0;
    const restartStories = () => {
        window.clearTimeout(storyTimer);
        if (motion.matches) {
            showStory("4");
            showWord(null);
            if (meter) meter.style.transform = "scaleX(1)";
            return;
        }
        if (document.hidden) return;
        beat = 0;
        const play = () => {
            const current = beats[beat];
            if (meter && current.story === "1") {
                meter.style.transition = "none";
                meter.style.transform = "scaleX(0)";
                window.requestAnimationFrame(() => {
                    meter.style.transition = "";
                    meter.style.transform = "scaleX(0.25)";
                });
            } else if (meter) {
                meter.style.transform = `scaleX(${Number(current.story) / 4})`;
            }
            showStory(current.story);
            showWord(current.word);
            const hold = current.hold;
            beat = (beat + 1) % beats.length;
            storyTimer = window.setTimeout(play, hold);
        };
        play();
    };
    onMotionChange(restartStories);
    document.addEventListener("visibilitychange", restartStories);
    restartStories();
}
