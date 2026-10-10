const header = document.querySelector(".site-header");
const menuButton = document.querySelector(".menu-button");
const mobileNav = document.querySelector(".mobile-nav");

const updateHeader = () => {
    header.classList.toggle("is-sticky", window.scrollY > 34);
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

const observer = new IntersectionObserver(
    (entries) => {
        entries.forEach((entry) => {
            if (!entry.isIntersecting) return;
            entry.target.classList.add("is-visible");
            observer.unobserve(entry.target);
        });
    },
    { threshold: 0.12 }
);

document.querySelectorAll(".reveal").forEach((element, index) => {
    element.style.transitionDelay = `${Math.min(index % 4, 3) * 80}ms`;
    observer.observe(element);
});

const clips = [...document.querySelectorAll(".hero__clip")];
if (clips.length) {
    let clipIndex = 0;
    clips.forEach((clip) => {
        clip.muted = true;
        clip.playsInline = true;
    });
    const showClip = (index) => {
        clips.forEach((clip, clipNumber) => {
            const active = clipNumber === index;
            clip.classList.toggle("is-on", active);
            if (active) {
                clip.currentTime = 0;
                clip.play().catch(() => {});
            } else {
                clip.pause();
            }
        });
    };
    showClip(0);
    window.setInterval(() => {
        clipIndex = (clipIndex + 1) % clips.length;
        showClip(clipIndex);
    }, 4200);
}

const statement = document.querySelector(".statement");
const statementImage = document.querySelector(".statement__image");

if (statement && statementImage && !window.matchMedia("(prefers-reduced-motion: reduce)").matches) {
    let frame = 0;
    const moveStatement = () => {
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
    moveStatement();
}

const presenceNet = document.querySelector(".presence__net");

if (presenceNet && !window.matchMedia("(prefers-reduced-motion: reduce)").matches) {
    const context = presenceNet.getContext("2d");
    const nodes = Array.from({ length: 36 }, () => ({
        x: Math.random(),
        y: Math.random(),
        vx: (Math.random() - 0.5) * 0.00022,
        vy: (Math.random() - 0.5) * 0.00018,
    }));
    let netFrame = 0;

    const drawNet = () => {
        netFrame = 0;
        const width = presenceNet.clientWidth;
        const height = presenceNet.clientHeight;
        if (!width || !height) return;
        const ratio = Math.min(window.devicePixelRatio || 1, 2);
        if (presenceNet.width !== Math.round(width * ratio) || presenceNet.height !== Math.round(height * ratio)) {
            presenceNet.width = Math.round(width * ratio);
            presenceNet.height = Math.round(height * ratio);
        }
        context.setTransform(ratio, 0, 0, ratio, 0, 0);
        context.clearRect(0, 0, width, height);
        nodes.forEach((node) => {
            node.x += node.vx;
            node.y += node.vy;
            if (node.x < 0 || node.x > 1) node.vx *= -1;
            if (node.y < 0 || node.y > 1) node.vy *= -1;
        });
        const reach = Math.min(width, height) * 0.28;
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
    };

    const requestNet = () => {
        if (netFrame) return;
        netFrame = window.requestAnimationFrame(drawNet);
    };
    const watchNet = new IntersectionObserver((entries) => {
        if (entries.some((entry) => entry.isIntersecting)) requestNet();
    });
    watchNet.observe(presenceNet.parentElement);
    const loopNet = () => {
        const box = presenceNet.getBoundingClientRect();
        const visible = box.bottom > 0 && box.top < window.innerHeight;
        if (visible) drawNet();
        window.requestAnimationFrame(loopNet);
    };
    loopNet();
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
    const reduced = window.matchMedia("(prefers-reduced-motion: reduce)").matches;

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

    if (reduced) {
        showStory("4");
        if (meter) meter.style.transform = "scaleX(1)";
    } else {
        let beat = 0;
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
            window.setTimeout(play, hold);
        };
        play();
    }
}
