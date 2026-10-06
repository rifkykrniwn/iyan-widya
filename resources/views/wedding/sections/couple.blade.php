<section id="couple" class="couple-section relative min-h-screen overflow-hidden">

    {{-- BACKGROUND JAVA HERITAGE --}}
    <img
        src="{{ asset('images/wedding/java-heritage/BACKGROUND.webp') }}"
        alt=""
        class="couple-background"
    >

    {{-- WARM OVERLAY --}}
    <div class="couple-background-overlay"></div>

    <div class="couple-wrapper relative z-10">

        <div class="couple-panel">

            {{-- CORNER ORNAMENTS --}}
            <span class="couple-corner couple-corner-tl"></span>
            <span class="couple-corner couple-corner-tr"></span>
            <span class="couple-corner couple-corner-bl"></span>
            <span class="couple-corner couple-corner-br"></span>

            {{-- HEADER --}}
            <div class="couple-title">

                <span class="couple-kicker">
                    THE COUPLE
                </span>

                <div class="couple-title-divider">
                    <span></span>
                    <b>❦</b>
                    <span></span>
                </div>

                <h2>
                    Mempelai
                </h2>

                <p>
                    Dengan penuh rasa syukur, kami mempersembahkan
                    kedua mempelai yang akan mengikat janji suci.
                </p>

            </div>


            {{-- COUPLE CONTENT --}}
            <div class="couple-grid">

                {{-- BRIDE --}}
                <article class="couple-person bride-person">

                    <div class="couple-photo-frame">

                        <div class="couple-photo-inner">

                            <img
                                src="{{ $wedding->bride_image
                                    ? asset($wedding->bride_image)
                                    : asset('images/wedding/couple/bride.jpg') }}"
                                alt="{{ $wedding->bride_name }}"
                                class="couple-photo"
                            >

                        </div>

                    </div>

                    <div class="couple-role">
                        THE BRIDE
                    </div>

                    <h3 class="couple-name">
                        {{ $wedding->bride_name }}
                    </h3>

                    <div class="couple-name-divider">
                        <span></span>
                        <b>❦</b>
                        <span></span>
                    </div>

                    <p class="couple-parents-label">
                        Putri dari
                    </p>

                    <p class="couple-parents">
                        {{ $wedding->bride_parents }}
                    </p>

                </article>


                {{-- AMPERSAND --}}
                <div class="couple-ampersand" aria-hidden="true">

                    <span class="ampersand-line"></span>

                    <div class="ampersand-circle">
                        <span>&amp;</span>
                    </div>

                    <span class="ampersand-line"></span>

                </div>


                {{-- GROOM --}}
                <article class="couple-person groom-person">

                    <div class="couple-photo-frame">

                        <div class="couple-photo-inner">

                            <img
                                src="{{ $wedding->groom_image
                                    ? asset($wedding->groom_image)
                                    : asset('images/wedding/couple/groom.jpg') }}"
                                alt="{{ $wedding->groom_name }}"
                                class="couple-photo"
                            >

                        </div>

                    </div>

                    <div class="couple-role">
                        THE GROOM
                    </div>

                    <h3 class="couple-name">
                        {{ $wedding->groom_name }}
                    </h3>

                    <div class="couple-name-divider">
                        <span></span>
                        <b>❦</b>
                        <span></span>
                    </div>

                    <p class="couple-parents-label">
                        Putra dari
                    </p>

                    <p class="couple-parents">
                        {{ $wedding->groom_parents }}
                    </p>

                </article>

            </div>


            {{-- BOTTOM ORNAMENT --}}
            <div class="couple-bottom-ornament">
                <span></span>
                <b>❦</b>
                <span></span>
            </div>

        </div>

    </div>

</section>


<style>
    /* =========================================================
       JAVA HERITAGE — COUPLE SECTION
       ========================================================= */

    .couple-section {
        position: relative;
        isolation: isolate;
        scroll-margin-top: 20px;
        color: #5b4030;
        background: #efe4d3;
    }


    /* ---------------------------------------------------------
       BACKGROUND
       --------------------------------------------------------- */

    .couple-background {
        position: absolute;
        inset: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
        z-index: -3;
    }

    .couple-background-overlay {
        position: absolute;
        inset: 0;
        z-index: -2;

        background:
            linear-gradient(
                180deg,
                rgba(248, 239, 225, 0.88) 0%,
                rgba(239, 225, 207, 0.82) 50%,
                rgba(225, 207, 184, 0.90) 100%
            );
    }


    /* ---------------------------------------------------------
       WRAPPER
       --------------------------------------------------------- */

    .couple-wrapper {
        width: 100%;
        min-height: 100vh;

        display: flex;
        align-items: center;
        justify-content: center;

        padding: 80px 24px;
    }


    /* ---------------------------------------------------------
       MAIN PANEL
       --------------------------------------------------------- */

    .couple-panel {
        position: relative;

        width: min(1080px, 100%);

        padding: 70px 70px 55px;

        background:
            linear-gradient(
                135deg,
                rgba(255, 250, 242, 0.91),
                rgba(247, 236, 219, 0.88)
            );

        border: 1px solid rgba(173, 131, 72, 0.55);

        box-shadow:
            0 25px 80px rgba(77, 48, 27, 0.16),
            inset 0 0 0 1px rgba(255, 255, 255, 0.65);

        backdrop-filter: blur(3px);
        -webkit-backdrop-filter: blur(3px);
    }


    /* ---------------------------------------------------------
       INNER GOLD FRAME
       --------------------------------------------------------- */

    .couple-panel::before {
        content: "";
        position: absolute;
        inset: 14px;

        border: 1px solid rgba(181, 139, 78, 0.30);

        pointer-events: none;
    }


    /* ---------------------------------------------------------
       GOLD CORNERS
       --------------------------------------------------------- */

    .couple-corner {
        position: absolute;
        width: 35px;
        height: 35px;

        pointer-events: none;
    }

    .couple-corner::before,
    .couple-corner::after {
        content: "";
        position: absolute;
        display: block;
        background: #b88a4a;
    }

    .couple-corner::before {
        width: 35px;
        height: 1px;
    }

    .couple-corner::after {
        width: 1px;
        height: 35px;
    }

    .couple-corner-tl {
        top: 24px;
        left: 24px;
    }

    .couple-corner-tr {
        top: 24px;
        right: 24px;
        transform: rotate(90deg);
    }

    .couple-corner-bl {
        bottom: 24px;
        left: 24px;
        transform: rotate(-90deg);
    }

    .couple-corner-br {
        right: 24px;
        bottom: 24px;
        transform: rotate(180deg);
    }


    /* ---------------------------------------------------------
       TITLE
       --------------------------------------------------------- */

    .couple-title {
        text-align: center;
        max-width: 600px;
        margin: 0 auto 55px;

        opacity: 0;
        transform: translateY(25px);
    }

    .couple-section.is-visible .couple-title {
        animation: coupleReveal 0.9s ease forwards;
    }

    .couple-kicker {
        display: block;

        font-family:
            Georgia,
            "Times New Roman",
            serif;

        font-size: 12px;
        font-weight: 600;
        letter-spacing: 0.32em;

        color: #9b713c;
    }

    .couple-title-divider {
        display: flex;
        align-items: center;
        justify-content: center;

        gap: 12px;

        margin: 14px 0 10px;
    }

    .couple-title-divider span {
        display: block;

        width: 55px;
        height: 1px;

        background: linear-gradient(
            to right,
            transparent,
            #b88a4a
        );
    }

    .couple-title-divider span:last-child {
        background: linear-gradient(
            to left,
            transparent,
            #b88a4a
        );
    }

    .couple-title-divider b {
        font-family: Georgia, serif;

        font-size: 19px;
        font-weight: normal;

        color: #b88a4a;
    }

    .couple-title h2 {
        margin: 0;

        font-family:
            Georgia,
            "Times New Roman",
            serif;

        font-size: clamp(31px, 4vw, 43px);
        font-weight: 500;

        letter-spacing: 0.04em;

        color: #654735;
    }

    .couple-title p {
        margin: 15px auto 0;

        max-width: 480px;

        font-family:
            Georgia,
            "Times New Roman",
            serif;

        font-size: 14px;
        line-height: 1.8;

        color: #876a52;
    }


    /* ---------------------------------------------------------
       COUPLE GRID
       --------------------------------------------------------- */

    .couple-grid {
        display: grid;

        grid-template-columns:
            minmax(0, 1fr)
            90px
            minmax(0, 1fr);

        align-items: start;

        gap: 30px;

        max-width: 850px;
        margin: 0 auto;
    }


    /* ---------------------------------------------------------
       PERSON
       --------------------------------------------------------- */

    .couple-person {
        text-align: center;

        opacity: 0;
        transform: translateY(35px);
    }

    .couple-section.is-visible .bride-person {
        animation: coupleReveal 0.9s ease 0.15s forwards;
    }

    .couple-section.is-visible .groom-person {
        animation: coupleReveal 0.9s ease 0.30s forwards;
    }


    /* ---------------------------------------------------------
       PHOTO FRAME
       --------------------------------------------------------- */

    .couple-photo-frame {
        position: relative;

        width: min(275px, 100%);
        aspect-ratio: 0.77;

        margin: 0 auto 28px;

        padding: 7px;

        background:
            linear-gradient(
                135deg,
                #d5b476,
                #a9793e,
                #d7b97c
            );

        border-radius:
            145px 145px 20px 20px;

        box-shadow:
            0 18px 38px rgba(76, 47, 27, 0.20);
    }

    .couple-photo-frame::before {
        content: "";

        position: absolute;
        inset: 4px;

        border:
            1px solid rgba(255, 247, 226, 0.85);

        border-radius:
            140px 140px 16px 16px;

        z-index: 2;

        pointer-events: none;
    }

    .couple-photo-inner {
        width: 100%;
        height: 100%;

        overflow: hidden;

        background: #e7d7c0;

        border-radius:
            138px 138px 14px 14px;
    }

    .couple-photo {
        width: 100%;
        height: 100%;

        display: block;

        object-fit: cover;
        object-position: center;

        filter: none;

        transition:
            transform 0.8s ease,
            filter 0.8s ease;
    }

    .couple-photo-frame:hover .couple-photo {
        transform: scale(1.045);
    }


    /* ---------------------------------------------------------
       ROLE
       --------------------------------------------------------- */

    .couple-role {
        display: inline-block;

        margin-bottom: 9px;

        font-family:
            Arial,
            sans-serif;

        font-size: 10px;
        font-weight: 600;

        letter-spacing: 0.28em;

        color: #a27a45;
    }


    /* ---------------------------------------------------------
       NAME
       --------------------------------------------------------- */

    .couple-name {
        margin: 0;

        font-family:
            Georgia,
            "Times New Roman",
            serif;

        font-size: clamp(26px, 3vw, 34px);
        font-weight: 500;
        line-height: 1.25;

        color: #654735;
    }


    /* ---------------------------------------------------------
       NAME DIVIDER
       --------------------------------------------------------- */

    .couple-name-divider {
        display: flex;

        align-items: center;
        justify-content: center;

        gap: 9px;

        margin: 13px auto 12px;

        max-width: 155px;
    }

    .couple-name-divider span {
        flex: 1;

        height: 1px;

        background:
            linear-gradient(
                to right,
                transparent,
                rgba(177, 135, 73, 0.75)
            );
    }

    .couple-name-divider span:last-child {
        background:
            linear-gradient(
                to left,
                transparent,
                rgba(177, 135, 73, 0.75)
            );
    }

    .couple-name-divider b {
        color: #b4874a;

        font-family: Georgia, serif;

        font-size: 15px;
        font-weight: normal;
    }


    /* ---------------------------------------------------------
       PARENTS
       --------------------------------------------------------- */

    .couple-parents-label {
        margin: 0 0 3px;

        font-family:
            Georgia,
            "Times New Roman",
            serif;

        font-size: 12px;
        font-style: italic;

        color: #95745c;
    }

    .couple-parents {
        margin: 0 auto;

        max-width: 260px;

        font-family:
            Georgia,
            "Times New Roman",
            serif;

        font-size: 14px;
        line-height: 1.7;

        color: #684b38;
    }


    /* ---------------------------------------------------------
       AMPERSAND
       --------------------------------------------------------- */

    .couple-ampersand {
        display: flex;

        flex-direction: column;
        align-items: center;
        justify-content: center;

        gap: 17px;

        padding-top: 145px;

        opacity: 0;
        transform: translateY(20px);
    }

    .couple-section.is-visible .couple-ampersand {
        animation:
            coupleReveal 0.9s ease 0.22s forwards,
            coupleFloat 4s ease-in-out 1.3s infinite;
    }

    .ampersand-line {
        width: 1px;
        height: 55px;

        background:
            linear-gradient(
                to bottom,
                transparent,
                #b68a4d,
                transparent
            );
    }

    .ampersand-circle {
        width: 58px;
        height: 58px;

        display: flex;
        align-items: center;
        justify-content: center;

        border: 1px solid rgba(173, 130, 70, 0.65);

        border-radius: 50%;

        background:
            rgba(255, 250, 241, 0.72);

        box-shadow:
            0 8px 25px rgba(82, 53, 31, 0.10);
    }

    .ampersand-circle span {
        font-family:
            Georgia,
            "Times New Roman",
            serif;

        font-size: 28px;
        font-style: italic;
        font-weight: 400;

        color: #8a613b;
    }


    /* ---------------------------------------------------------
       BOTTOM ORNAMENT
       --------------------------------------------------------- */

    .couple-bottom-ornament {
        display: flex;

        align-items: center;
        justify-content: center;

        gap: 13px;

        margin-top: 58px;

        opacity: 0;
        transform: translateY(20px);
    }

    .couple-section.is-visible .couple-bottom-ornament {
        animation: coupleReveal 0.9s ease 0.45s forwards;
    }

    .couple-bottom-ornament span {
        width: 75px;
        height: 1px;

        background:
            linear-gradient(
                to right,
                transparent,
                #b88a4a
            );
    }

    .couple-bottom-ornament span:last-child {
        background:
            linear-gradient(
                to left,
                transparent,
                #b88a4a
            );
    }

    .couple-bottom-ornament b {
        font-family: Georgia, serif;

        font-size: 18px;
        font-weight: normal;

        color: #b88a4a;
    }


    /* ---------------------------------------------------------
       ANIMATION
       --------------------------------------------------------- */

    @keyframes coupleReveal {
        from {
            opacity: 0;
            transform: translateY(35px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes coupleFloat {
        0%,
        100% {
            transform: translateY(0);
        }

        50% {
            transform: translateY(-8px);
        }
    }


    /* ---------------------------------------------------------
       TABLET
       --------------------------------------------------------- */

    @media (max-width: 850px) {

        .couple-panel {
            padding: 60px 40px 48px;
        }

        .couple-grid {
            grid-template-columns:
                minmax(0, 1fr)
                minmax(0, 1fr);

            gap: 50px 24px;
        }

        .couple-ampersand {
            grid-column: 1 / -1;
            grid-row: 2;

            flex-direction: row;

            padding-top: 0;

            margin-top: -20px;
        }

        .ampersand-line {
            width: 80px;
            height: 1px;

            background:
                linear-gradient(
                    to right,
                    transparent,
                    #b68a4d
                );
        }

        .ampersand-line:last-child {
            background:
                linear-gradient(
                    to left,
                    transparent,
                    #b68a4d
                );
        }
    }


    /* ---------------------------------------------------------
       MOBILE
       --------------------------------------------------------- */

    @media (max-width: 640px) {

        .couple-wrapper {
            padding: 55px 15px;
        }

        .couple-panel {
            padding: 52px 20px 40px;
        }

        .couple-panel::before {
            inset: 10px;
        }

        .couple-corner-tl {
            top: 18px;
            left: 18px;
        }

        .couple-corner-tr {
            top: 18px;
            right: 18px;
        }

        .couple-corner-bl {
            bottom: 18px;
            left: 18px;
        }

        .couple-corner-br {
            right: 18px;
            bottom: 18px;
        }

        .couple-title {
            margin-bottom: 40px;
        }

        .couple-title p {
            font-size: 13px;
            line-height: 1.75;
        }

        .couple-grid {
            display: flex;

            flex-direction: column;

            align-items: center;

            gap: 0;
        }

        .couple-person {
            width: 100%;
        }

        .couple-photo-frame {
            width: min(245px, 78vw);

            margin-bottom: 24px;
        }

        .couple-name {
            font-size: 27px;
        }

        .couple-ampersand {
            order: 2;

            width: 100%;

            margin: 35px 0 40px;

            padding: 0;
        }

        .bride-person {
            order: 1;
        }

        .groom-person {
            order: 3;
        }

        .ampersand-circle {
            width: 52px;
            height: 52px;
        }

        .ampersand-circle span {
            font-size: 25px;
        }

        .ampersand-line {
            flex: 1;

            width: auto;
        }

        .couple-bottom-ornament {
            margin-top: 45px;
        }

        .couple-bottom-ornament span {
            width: 50px;
        }
    }


    /* ---------------------------------------------------------
       SMALL MOBILE
       --------------------------------------------------------- */

    @media (max-width: 380px) {

        .couple-wrapper {
            padding-left: 10px;
            padding-right: 10px;
        }

        .couple-panel {
            padding-left: 16px;
            padding-right: 16px;
        }

        .couple-photo-frame {
            width: 220px;
        }

        .couple-title h2 {
            font-size: 29px;
        }

        .couple-name {
            font-size: 24px;
        }
    }


    /* ---------------------------------------------------------
       REDUCED MOTION
       --------------------------------------------------------- */

    @media (prefers-reduced-motion: reduce) {

        .couple-title,
        .couple-person,
        .couple-ampersand,
        .couple-bottom-ornament {
            opacity: 1;
            transform: none;
            animation: none !important;
        }

        .couple-photo {
            transition: none;
        }
    }
</style>


<script>
    document.addEventListener('DOMContentLoaded', function () {

        const coupleSection = document.getElementById('couple');

        if (!coupleSection) {
            return;
        }

        const observer = new IntersectionObserver(
            function (entries) {

                entries.forEach(function (entry) {

                    if (entry.isIntersecting) {

                        coupleSection.classList.add('is-visible');

                        observer.unobserve(coupleSection);
                    }

                });

            },
            {
                threshold: 0.15
            }
        );

        observer.observe(coupleSection);

    });
</script>