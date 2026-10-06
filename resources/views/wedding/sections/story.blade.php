<section
    id="story"
    class="story-section relative overflow-hidden px-5 py-24 sm:px-6 sm:py-28"
>
    {{-- =========================================
         JAVA HERITAGE BACKGROUND
    ========================================== --}}
    <img
        src="{{ asset('images/wedding/java-heritage/BACKGROUND.webp') }}"
        alt=""
        class="story-background"
    >

    <div class="story-background-overlay"></div>

    {{-- Subtle decorative atmosphere --}}
    <div class="story-glow story-glow-one"></div>
    <div class="story-glow story-glow-two"></div>

    {{-- =========================================
         MAIN CONTENT
    ========================================== --}}
    <div class="relative z-10 mx-auto w-full max-w-5xl">

        <div class="story-panel">

            {{-- Decorative corners --}}
            <span class="story-corner story-corner-tl"></span>
            <span class="story-corner story-corner-tr"></span>
            <span class="story-corner story-corner-bl"></span>
            <span class="story-corner story-corner-br"></span>

            {{-- =========================================
                 HEADER
            ========================================== --}}
            <header class="story-header text-center">

                <p class="story-kicker">
                    OUR STORY
                </p>

                <div class="story-ornament">
                    <span></span>
                    <b>❦</b>
                    <span></span>
                </div>

                <h2 class="story-title">
                    Perjalanan Kami
                </h2>

                <p class="story-intro">
                    Setiap pertemuan memiliki cerita,
                    dan setiap cerita membawa kami
                    menuju hari yang istimewa ini.
                </p>

            </header>


            {{-- =========================================
                 TIMELINE
            ========================================== --}}
            <div class="story-timeline">

                {{-- Main vertical line --}}
                <div class="story-line"></div>


                {{-- =========================================
                     STORY 1 — 2019
                ========================================== --}}
                <article
                    class="story-item story-item-left"
                    style="--story-delay: .15s;"
                >

                    <div class="story-year-wrap">
                        <p class="story-year">
                            2019
                        </p>

                        <p class="story-label">
                            PERTAMA BERTEMU
                        </p>
                    </div>


                    <div class="story-content">
                        <div class="story-card">

                            <div class="story-card-number">
                                01
                            </div>

                            <span class="story-card-ornament">
                                ✦
                            </span>

                            <p>
                                Sebuah pertemuan sederhana menjadi awal
                                dari cerita yang tidak pernah kami
                                bayangkan sebelumnya.
                            </p>

                        </div>
                    </div>


                    <span class="story-dot">
                        <span class="story-dot-inner"></span>
                        <span class="story-dot-ring"></span>
                    </span>

                </article>


                {{-- =========================================
                     STORY 2 — 2021
                ========================================== --}}
                <article
                    class="story-item story-item-right"
                    style="--story-delay: .30s;"
                >

                    <div class="story-content">
                        <div class="story-card">

                            <div class="story-card-number">
                                02
                            </div>

                            <span class="story-card-ornament">
                                ✦
                            </span>

                            <p>
                                Waktu berjalan dan membuat kami semakin
                                mengenal satu sama lain, berbagi cerita,
                                tawa, dan impian.
                            </p>

                        </div>
                    </div>


                    <div class="story-year-wrap">
                        <p class="story-year">
                            2021
                        </p>

                        <p class="story-label">
                            MENJALIN HUBUNGAN
                        </p>
                    </div>


                    <span class="story-dot">
                        <span class="story-dot-inner"></span>
                        <span class="story-dot-ring"></span>
                    </span>

                </article>


                {{-- =========================================
                     STORY 3 — 2025
                ========================================== --}}
                <article
                    class="story-item story-item-left"
                    style="--story-delay: .45s;"
                >

                    <div class="story-year-wrap">
                        <p class="story-year">
                            2025
                        </p>

                        <p class="story-label">
                            LAMARAN
                        </p>
                    </div>


                    <div class="story-content">
                        <div class="story-card">

                            <div class="story-card-number">
                                03
                            </div>

                            <span class="story-card-ornament">
                                ✦
                            </span>

                            <p>
                                Dengan keyakinan dan doa, kami memutuskan
                                untuk melangkah ke tahap berikutnya
                                dan mengikat janji.
                            </p>

                        </div>
                    </div>


                    <span class="story-dot">
                        <span class="story-dot-inner"></span>
                        <span class="story-dot-ring"></span>
                    </span>

                </article>


                {{-- =========================================
                     STORY 4 — 2026
                ========================================== --}}
                <article
                    class="story-item story-item-right story-item-final"
                    style="--story-delay: .60s;"
                >

                    <div class="story-content">
                        <div class="story-card story-card-final">

                            <div class="story-card-number">
                                04
                            </div>

                            <span class="story-card-ornament">
                                ✦
                            </span>

                            <p>
                                Kini kami siap memulai babak baru dalam
                                kehidupan, bersama dalam satu ikatan
                                pernikahan.
                            </p>

                        </div>
                    </div>


                    <div class="story-year-wrap">
                        <p class="story-year">
                            2026
                        </p>

                        <p class="story-label">
                            MENUJU PERNIKAHAN
                        </p>
                    </div>


                    <span class="story-dot story-dot-final">
                        <span class="story-dot-inner"></span>
                        <span class="story-dot-ring"></span>
                    </span>

                </article>

            </div>


            {{-- =========================================
                 BOTTOM ORNAMENT
            ========================================== --}}
            <div class="story-bottom">

                <div class="story-bottom-ornament">
                    <span></span>
                    <b>♡</b>
                    <span></span>
                </div>

                <p>
                    AND THE STORY CONTINUES
                </p>

            </div>

        </div>
    </div>
</section>


<style>
/* =========================================================
   JAVA HERITAGE STORY
========================================================= */

.story-section {
    position: relative;
    isolation: isolate;
    min-height: 100vh;
    background: #efe0cc;
    color: #654735;
}


/* =========================================================
   BACKGROUND
========================================================= */

.story-background {
    position: absolute;
    inset: 0;
    z-index: -3;
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
}

.story-background-overlay {
    position: absolute;
    inset: 0;
    z-index: -2;
    background:
        linear-gradient(
            180deg,
            rgba(247, 238, 225, .93) 0%,
            rgba(242, 230, 212, .88) 48%,
            rgba(226, 207, 181, .94) 100%
        );
}

.story-glow {
    position: absolute;
    z-index: -1;
    width: 360px;
    height: 360px;
    border-radius: 999px;
    background: rgba(255, 250, 241, .42);
    filter: blur(70px);
    pointer-events: none;
}

.story-glow-one {
    top: 5%;
    left: -180px;
    animation: storyGlowOne 13s ease-in-out infinite alternate;
}

.story-glow-two {
    right: -180px;
    bottom: 5%;
    animation: storyGlowTwo 15s ease-in-out infinite alternate;
}


/* =========================================================
   MAIN PANEL
========================================================= */

.story-panel {
    position: relative;
    width: 100%;
    padding: 72px 58px 60px;
    background:
        linear-gradient(
            135deg,
            rgba(255, 250, 242, .94),
            rgba(247, 236, 219, .90)
        );
    border: 1px solid rgba(173, 131, 72, .58);
    box-shadow:
        0 30px 90px rgba(76, 48, 29, .16),
        inset 0 0 0 1px rgba(255, 255, 255, .60);
    backdrop-filter: blur(4px);
    overflow: hidden;
}

.story-panel::before {
    content: "";
    position: absolute;
    inset: 12px;
    border: 1px solid rgba(173, 131, 72, .20);
    pointer-events: none;
}


/* =========================================================
   CORNERS
========================================================= */

.story-corner {
    position: absolute;
    width: 28px;
    height: 28px;
    border-color: rgba(166, 121, 62, .72);
    z-index: 2;
}

.story-corner-tl {
    top: 24px;
    left: 24px;
    border-top: 1px solid;
    border-left: 1px solid;
}

.story-corner-tr {
    top: 24px;
    right: 24px;
    border-top: 1px solid;
    border-right: 1px solid;
}

.story-corner-bl {
    bottom: 24px;
    left: 24px;
    border-bottom: 1px solid;
    border-left: 1px solid;
}

.story-corner-br {
    right: 24px;
    bottom: 24px;
    border-right: 1px solid;
    border-bottom: 1px solid;
}


/* =========================================================
   HEADER
========================================================= */

.story-header {
    max-width: 650px;
    margin: 0 auto 82px;
    text-align: center;
    opacity: 0;
    transform: translateY(24px);
    animation:
        storyHeaderIn
        1s
        cubic-bezier(.22, 1, .36, 1)
        .1s
        forwards;
}

.story-kicker {
    margin: 0;
    color: #9b713c;
    font-family: Arial, sans-serif;
    font-size: 10px;
    font-weight: 600;
    letter-spacing: .48em;
    text-transform: uppercase;
}

.story-ornament {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 14px;
    margin-top: 20px;
}

.story-ornament span {
    width: 48px;
    height: 1px;
    background: linear-gradient(
        90deg,
        transparent,
        rgba(165, 120, 60, .65)
    );
}

.story-ornament span:last-child {
    background: linear-gradient(
        90deg,
        rgba(165, 120, 60, .65),
        transparent
    );
}

.story-ornament b {
    color: #a27a45;
    font-family: Georgia, serif;
    font-size: 17px;
    font-weight: 400;
}

.story-title {
    margin: 22px 0 0;
    color: #654735;
    font-family: Georgia, "Times New Roman", serif;
    font-size: clamp(2.4rem, 5vw, 4rem);
    font-weight: 400;
    letter-spacing: .025em;
    line-height: 1.15;
}

.story-intro {
    max-width: 540px;
    margin: 22px auto 0;
    color: #80644d;
    font-family: Arial, sans-serif;
    font-size: 13px;
    line-height: 1.95;
}


/* =========================================================
   TIMELINE
========================================================= */

.story-timeline {
    position: relative;
    width: 100%;
}

.story-line {
    position: absolute;
    top: 8px;
    bottom: 8px;
    left: 50%;
    width: 1px;
    transform: translateX(-50%);
    background:
        linear-gradient(
            180deg,
            transparent 0%,
            rgba(164, 120, 62, .38) 8%,
            rgba(164, 120, 62, .55) 50%,
            rgba(164, 120, 62, .38) 92%,
            transparent 100%
        );
    opacity: 0;
    animation:
        storyLineIn
        1.6s
        ease-out
        .35s
        forwards;
}


/* =========================================================
   STORY ITEM
========================================================= */

.story-item {
    position: relative;
    display: grid;
    grid-template-columns: minmax(0, 1fr) minmax(0, 1fr);
    column-gap: 88px;
    align-items: center;
    min-height: 150px;
    margin-bottom: 74px;
    opacity: 0;
    transform: translateY(32px);
    animation:
        storyItemIn
        1s
        cubic-bezier(.22, 1, .36, 1)
        var(--story-delay)
        forwards;
}

.story-item:last-child {
    margin-bottom: 0;
}

.story-item-left .story-year-wrap {
    text-align: right;
}

.story-item-left .story-content {
    text-align: left;
}

.story-item-right .story-year-wrap {
    text-align: left;
}

.story-item-right .story-content {
    grid-column: 1;
    grid-row: 1;
    text-align: right;
}

.story-item-right .story-year-wrap {
    grid-column: 2;
    grid-row: 1;
}


/* =========================================================
   YEAR
========================================================= */

.story-year-wrap {
    position: relative;
    z-index: 2;
}

.story-year {
    margin: 0;
    color: #6b4b35;
    font-family: Georgia, "Times New Roman", serif;
    font-size: clamp(2.7rem, 5vw, 4.2rem);
    font-weight: 400;
    letter-spacing: .025em;
    line-height: 1;
    transition:
        color .5s ease,
        letter-spacing .5s ease,
        transform .5s ease;
}

.story-item:hover .story-year {
    color: #a27a45;
    letter-spacing: .07em;
    transform: translateY(-2px);
}

.story-label {
    margin: 13px 0 0;
    color: #9b713c;
    font-family: Arial, sans-serif;
    font-size: 9px;
    font-weight: 600;
    letter-spacing: .32em;
    line-height: 1.5;
}


/* =========================================================
   STORY CARD
========================================================= */

.story-content {
    position: relative;
    z-index: 2;
}

.story-card {
    position: relative;
    min-height: 132px;
    padding: 30px 34px 28px;
    background:
        linear-gradient(
            135deg,
            rgba(255, 252, 247, .90),
            rgba(246, 235, 217, .76)
        );
    border: 1px solid rgba(173, 131, 72, .35);
    box-shadow:
        0 15px 38px rgba(89, 58, 35, .08),
        inset 0 0 0 1px rgba(255, 255, 255, .55);
    transition:
        transform .5s cubic-bezier(.22, 1, .36, 1),
        box-shadow .5s ease,
        border-color .5s ease,
        background .5s ease;
}

.story-card::before {
    content: "";
    position: absolute;
    inset: 7px;
    border: 1px solid rgba(173, 131, 72, .13);
    pointer-events: none;
}

.story-card:hover {
    transform: translateY(-6px);
    border-color: rgba(173, 131, 72, .58);
    box-shadow:
        0 22px 48px rgba(89, 58, 35, .13),
        inset 0 0 0 1px rgba(255, 255, 255, .65);
}

.story-card-number {
    position: absolute;
    top: 12px;
    right: 16px;
    color: rgba(162, 122, 69, .38);
    font-family: Georgia, serif;
    font-size: 10px;
    letter-spacing: .18em;
}

.story-card-ornament {
    display: block;
    margin-bottom: 11px;
    color: #b88a4a;
    font-family: Georgia, serif;
    font-size: 13px;
}

.story-card p {
    position: relative;
    z-index: 1;
    margin: 0;
    color: #765d48;
    font-family: Georgia, "Times New Roman", serif;
    font-size: 14px;
    line-height: 2;
}

.story-card-final {
    background:
        linear-gradient(
            135deg,
            rgba(252, 246, 235, .96),
            rgba(239, 221, 194, .88)
        );
    border-color: rgba(157, 113, 57, .52);
}


/* =========================================================
   TIMELINE DOT
========================================================= */

.story-dot {
    position: absolute;
    top: 50%;
    left: 50%;
    z-index: 5;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 13px;
    height: 13px;
    transform: translate(-50%, -50%);
    border: 2px solid #f8eee1;
    border-radius: 999px;
    background: #a27a45;
    box-shadow:
        0 0 0 5px rgba(238, 224, 204, .82),
        0 4px 12px rgba(96, 61, 34, .16);
}

.story-dot-inner {
    width: 3px;
    height: 3px;
    border-radius: 999px;
    background: #fff8ee;
}

.story-dot-ring {
    position: absolute;
    width: 29px;
    height: 29px;
    border: 1px solid rgba(162, 122, 69, .45);
    border-radius: 999px;
    animation:
        storyDotPulse
        3s
        ease-in-out
        infinite;
}

.story-dot-final {
    width: 15px;
    height: 15px;
    background: #765238;
}

.story-dot-final .story-dot-ring {
    width: 33px;
    height: 33px;
}


/* =========================================================
   BOTTOM
========================================================= */

.story-bottom {
    margin-top: 72px;
    text-align: center;
    opacity: 0;
    transform: translateY(15px);
    animation:
        storyBottomIn
        1s
        ease-out
        1s
        forwards;
}

.story-bottom-ornament {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 15px;
}

.story-bottom-ornament span {
    width: 54px;
    height: 1px;
    background: linear-gradient(
        90deg,
        transparent,
        rgba(164, 120, 62, .55)
    );
}

.story-bottom-ornament span:last-child {
    background: linear-gradient(
        90deg,
        rgba(164, 120, 62, .55),
        transparent
    );
}

.story-bottom-ornament b {
    color: #a27a45;
    font-family: Georgia, serif;
    font-size: 19px;
    font-weight: 400;
}

.story-bottom p {
    margin: 17px 0 0;
    color: #a27a45;
    font-family: Arial, sans-serif;
    font-size: 8px;
    letter-spacing: .38em;
}


/* =========================================================
   ANIMATIONS
========================================================= */

@keyframes storyHeaderIn {
    from {
        opacity: 0;
        transform: translateY(24px);
    }

    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes storyLineIn {
    from {
        opacity: 0;
        transform: translateX(-50%) scaleY(.2);
        transform-origin: top;
    }

    to {
        opacity: 1;
        transform: translateX(-50%) scaleY(1);
        transform-origin: top;
    }
}

@keyframes storyItemIn {
    from {
        opacity: 0;
        transform: translateY(32px);
    }

    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes storyBottomIn {
    from {
        opacity: 0;
        transform: translateY(15px);
    }

    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes storyDotPulse {
    0%,
    100% {
        transform: scale(.85);
        opacity: .22;
    }

    50% {
        transform: scale(1.18);
        opacity: .62;
    }
}

@keyframes storyGlowOne {
    from {
        transform: translate3d(0, 0, 0) scale(1);
    }

    to {
        transform: translate3d(45px, 28px, 0) scale(1.08);
    }
}

@keyframes storyGlowTwo {
    from {
        transform: translate3d(0, 0, 0) scale(1);
    }

    to {
        transform: translate3d(-38px, -30px, 0) scale(1.08);
    }
}


/* =========================================================
   MOBILE
========================================================= */

@media (max-width: 767px) {

    .story-section {
        padding-top: 5rem;
        padding-bottom: 5rem;
    }

    .story-panel {
        padding: 60px 25px 48px;
    }

    .story-panel::before {
        inset: 9px;
    }

    .story-corner {
        width: 22px;
        height: 22px;
    }

    .story-corner-tl,
    .story-corner-tr {
        top: 18px;
    }

    .story-corner-bl,
    .story-corner-br {
        bottom: 18px;
    }

    .story-corner-tl,
    .story-corner-bl {
        left: 18px;
    }

    .story-corner-tr,
    .story-corner-br {
        right: 18px;
    }

    .story-header {
        margin-bottom: 60px;
    }

    .story-title {
        font-size: 2.35rem;
    }

    .story-intro {
        max-width: 300px;
        font-size: 12px;
        line-height: 1.85;
    }

    .story-line {
        left: 9px;
        transform: none;
    }

    .story-item {
        display: block;
        min-height: 0;
        margin-bottom: 58px;
        padding-left: 34px;
    }

    .story-item-left .story-year-wrap,
    .story-item-right .story-year-wrap {
        text-align: left;
    }

    .story-item-left .story-content,
    .story-item-right .story-content {
        display: block;
        margin-top: 17px;
        text-align: left;
    }

    .story-item-right .story-content {
        grid-column: auto;
        grid-row: auto;
    }

    .story-item-right .story-year-wrap {
        grid-column: auto;
        grid-row: auto;
    }

    .story-year {
        font-size: 2.75rem;
    }

    .story-label {
        margin-top: 8px;
        font-size: 8px;
        letter-spacing: .27em;
    }

    .story-card {
        min-height: 0;
        padding: 28px 25px 25px;
    }

    .story-card p {
        font-size: 13px;
        line-height: 1.9;
    }

    .story-dot {
        top: 8px;
        left: 9px;
        transform: translate(-50%, 0);
    }

    .story-bottom {
        margin-top: 58px;
    }

    .story-glow {
        width: 260px;
        height: 260px;
        filter: blur(60px);
    }
}


/* =========================================================
   SMALL MOBILE
========================================================= */

@media (max-width: 400px) {

    .story-panel {
        padding-left: 20px;
        padding-right: 20px;
    }

    .story-title {
        font-size: 2.1rem;
    }

    .story-kicker {
        font-size: 8px;
        letter-spacing: .4em;
    }

    .story-card {
        padding-left: 22px;
        padding-right: 22px;
    }

    .story-card p {
        font-size: 12.5px;
    }

    .story-bottom p {
        font-size: 7px;
        letter-spacing: .28em;
    }
}


/* =========================================================
   REDUCED MOTION
========================================================= */

@media (prefers-reduced-motion: reduce) {

    .story-glow-one,
    .story-glow-two,
    .story-header,
    .story-line,
    .story-item,
    .story-dot-ring,
    .story-bottom {
        animation: none !important;
        transition: none !important;
        opacity: 1;
        transform: none;
    }

    .story-line {
        transform: translateX(-50%);
    }

    .story-dot-ring {
        opacity: .4;
    }
}
</style>