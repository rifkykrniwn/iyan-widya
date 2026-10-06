<section
    id="countdown"
    class="countdown-section relative min-h-screen overflow-hidden"
>

    {{-- =========================================================
         BACKGROUND JAVA HERITAGE
    ========================================================== --}}

    <img
        src="{{ asset('images/wedding/java-heritage/BACKGROUND.webp') }}"
        alt=""
        class="countdown-background"
    >

    <div class="countdown-background-overlay"></div>


    {{-- =========================================================
         MAIN WRAPPER
    ========================================================== --}}

    <div class="countdown-wrapper relative z-10">

        <div class="countdown-panel">

            {{-- CORNER ORNAMENTS --}}
            <span class="countdown-corner countdown-corner-tl"></span>
            <span class="countdown-corner countdown-corner-tr"></span>
            <span class="countdown-corner countdown-corner-bl"></span>
            <span class="countdown-corner countdown-corner-br"></span>


            {{-- =================================================
                 HEADER
            ================================================== --}}

            <div class="countdown-header">

                <span class="countdown-kicker">
                    COUNTDOWN TO OUR SPECIAL DAY
                </span>

                <div class="countdown-header-divider">
                    <span></span>
                    <b>❦</b>
                    <span></span>
                </div>

                <h2>
                    Menuju Hari Bahagia
                </h2>

                <p>
                    Hitung mundur menuju hari ketika
                    dua hati menjadi satu dalam ikatan suci.
                </p>

            </div>


            {{-- =================================================
                 COUNTDOWN
            ================================================== --}}

            <div
                id="countdownTimer"
                class="countdown-grid"
            >

                {{-- DAYS --}}
                <div
                    class="countdown-box"
                    style="--countdown-delay: .15s;"
                >

                    <p
                        id="days"
                        class="countdown-number"
                    >
                        00
                    </p>

                    <div class="countdown-box-divider"></div>

                    <p class="countdown-label">
                        HARI
                    </p>

                </div>


                {{-- HOURS --}}
                <div
                    class="countdown-box"
                    style="--countdown-delay: .30s;"
                >

                    <p
                        id="hours"
                        class="countdown-number"
                    >
                        00
                    </p>

                    <div class="countdown-box-divider"></div>

                    <p class="countdown-label">
                        JAM
                    </p>

                </div>


                {{-- MINUTES --}}
                <div
                    class="countdown-box"
                    style="--countdown-delay: .45s;"
                >

                    <p
                        id="minutes"
                        class="countdown-number"
                    >
                        00
                    </p>

                    <div class="countdown-box-divider"></div>

                    <p class="countdown-label">
                        MENIT
                    </p>

                </div>


                {{-- SECONDS --}}
                <div
                    class="countdown-box"
                    style="--countdown-delay: .60s;"
                >

                    <p
                        id="seconds"
                        class="countdown-number"
                    >
                        00
                    </p>

                    <div class="countdown-box-divider"></div>

                    <p class="countdown-label">
                        DETIK
                    </p>

                </div>

            </div>


            {{-- =================================================
                 WEDDING DATE
            ================================================== --}}

            <div class="countdown-date">

                <span class="countdown-date-line"></span>

                <div class="countdown-date-content">

                    <span>
                        HARI BAHAGIA KAMI
                    </span>

                    <strong>
                        {{ $wedding->wedding_date->translatedFormat('d F Y') }}
                    </strong>

                </div>

                <span class="countdown-date-line"></span>

            </div>


            {{-- =================================================
                 MESSAGE AFTER COUNTDOWN
            ================================================== --}}

            <div
                id="countdownMessage"
                class="countdown-message"
            >

                <div class="countdown-message-divider">

                    <span></span>

                    <b>♡</b>

                    <span></span>

                </div>

                <p>
                    Hari bahagia kami telah tiba.
                </p>

            </div>


            {{-- =================================================
                 BOTTOM ORNAMENT
            ================================================== --}}

            <div class="countdown-bottom">

                <span></span>

                <b>❦</b>

                <span></span>

            </div>

        </div>

    </div>

</section>


<style>

    /* =========================================================
       JAVA HERITAGE — COUNTDOWN
    ========================================================== */

    .countdown-section {
        position: relative;

        isolation: isolate;

        scroll-margin-top: 20px;

        background: #eadcc8;

        color: #5d4331;
    }


    /* =========================================================
       BACKGROUND
    ========================================================== */

    .countdown-background {
        position: absolute;

        inset: 0;

        width: 100%;
        height: 100%;

        object-fit: cover;
        object-position: center;

        z-index: -3;
    }


    .countdown-background-overlay {
        position: absolute;

        inset: 0;

        z-index: -2;

        background:
            linear-gradient(
                180deg,
                rgba(247, 238, 225, .92) 0%,
                rgba(238, 224, 204, .84) 50%,
                rgba(224, 204, 178, .92) 100%
            );
    }


    /* =========================================================
       WRAPPER
    ========================================================== */

    .countdown-wrapper {
        width: 100%;

        min-height: 100vh;

        display: flex;

        align-items: center;
        justify-content: center;

        padding: 80px 24px;
    }


    /* =========================================================
       PANEL
    ========================================================== */

    .countdown-panel {
        position: relative;

        width: min(920px, 100%);

        padding: 75px 65px 58px;

        background:
            linear-gradient(
                135deg,
                rgba(255, 250, 242, .93),
                rgba(247, 236, 219, .89)
            );

        border:
            1px solid rgba(173, 131, 72, .58);

        box-shadow:
            0 28px 80px rgba(76, 48, 29, .17),
            inset 0 0 0 1px rgba(255, 255, 255, .60);

        backdrop-filter: blur(3px);
        -webkit-backdrop-filter: blur(3px);
    }


    .countdown-panel::before {
        content: "";

        position: absolute;

        inset: 14px;

        border:
            1px solid rgba(181, 139, 78, .30);

        pointer-events: none;
    }


    /* =========================================================
       CORNERS
    ========================================================== */

    .countdown-corner {
        position: absolute;

        width: 35px;
        height: 35px;

        pointer-events: none;
    }


    .countdown-corner::before,
    .countdown-corner::after {
        content: "";

        position: absolute;

        display: block;

        background: #b88a4a;
    }


    .countdown-corner::before {
        width: 35px;
        height: 1px;
    }


    .countdown-corner::after {
        width: 1px;
        height: 35px;
    }


    .countdown-corner-tl {
        top: 24px;
        left: 24px;
    }


    .countdown-corner-tr {
        top: 24px;
        right: 24px;

        transform: rotate(90deg);
    }


    .countdown-corner-bl {
        bottom: 24px;
        left: 24px;

        transform: rotate(-90deg);
    }


    .countdown-corner-br {
        right: 24px;
        bottom: 24px;

        transform: rotate(180deg);
    }


    /* =========================================================
       HEADER
    ========================================================== */

    .countdown-header {
        max-width: 600px;

        margin: 0 auto;

        text-align: center;

        opacity: 0;

        transform: translateY(30px);
    }


    .countdown-section.is-visible .countdown-header {
        animation:
            countdownReveal
            .9s
            cubic-bezier(.22,1,.36,1)
            forwards;
    }


    .countdown-kicker {
        display: block;

        font-family:
            Arial,
            sans-serif;

        font-size: 10px;

        font-weight: 600;

        letter-spacing: .38em;

        color: #9b713c;
    }


    .countdown-header-divider {
        display: flex;

        align-items: center;
        justify-content: center;

        gap: 12px;

        margin: 15px 0 10px;
    }


    .countdown-header-divider span {
        width: 55px;
        height: 1px;

        background:
            linear-gradient(
                to right,
                transparent,
                #b88a4a
            );
    }


    .countdown-header-divider span:last-child {
        background:
            linear-gradient(
                to left,
                transparent,
                #b88a4a
            );
    }


    .countdown-header-divider b {
        font-family: Georgia, serif;

        font-size: 18px;

        font-weight: normal;

        color: #b88a4a;
    }


    .countdown-header h2 {
        margin: 0;

        font-family:
            Georgia,
            "Times New Roman",
            serif;

        font-size: clamp(31px, 4vw, 44px);

        font-weight: 500;

        letter-spacing: .035em;

        color: #654735;
    }


    .countdown-header p {
        max-width: 470px;

        margin: 15px auto 0;

        font-family:
            Georgia,
            "Times New Roman",
            serif;

        font-size: 14px;

        line-height: 1.8;

        color: #876a52;
    }


    /* =========================================================
       COUNTDOWN GRID
    ========================================================== */

    .countdown-grid {
        display: grid;

        grid-template-columns:
            repeat(4, minmax(0, 1fr));

        gap: 18px;

        margin-top: 52px;
    }


    /* =========================================================
       COUNTDOWN BOX
    ========================================================== */

    .countdown-box {
        position: relative;

        padding: 27px 12px 24px;

        text-align: center;

        background:
            rgba(255, 250, 241, .72);

        border:
            1px solid rgba(177, 135, 73, .46);

        box-shadow:
            0 12px 30px rgba(76, 48, 29, .08);

        opacity: 0;

        transform:
            translateY(30px)
            scale(.97);

        animation:
            countdownBoxReveal
            .9s
            cubic-bezier(.22,1,.36,1)
            var(--countdown-delay)
            forwards;

        transition:
            transform .5s ease,
            box-shadow .5s ease,
            background .5s ease;
    }


    .countdown-box::before {
        content: "";

        position: absolute;

        inset: 7px;

        border:
            1px solid rgba(177, 135, 73, .20);

        pointer-events: none;
    }


    .countdown-box:hover {
        transform:
            translateY(-6px)
            scale(1.015);

        background:
            rgba(255, 252, 246, .88);

        box-shadow:
            0 20px 40px rgba(76, 48, 29, .14);
    }


    /* =========================================================
       NUMBERS
    ========================================================== */

    .countdown-number {
        margin: 0;

        font-family:
            Georgia,
            "Times New Roman",
            serif;

        font-size: clamp(38px, 5vw, 58px);

        font-weight: 400;

        line-height: 1;

        letter-spacing: .03em;

        color: #654735;

        font-variant-numeric:
            tabular-nums;

        transition:
            opacity .15s ease,
            transform .15s ease;
    }


    .countdown-number.tick {
        animation:
            countdownTick
            .3s
            ease-out;
    }


    @keyframes countdownTick {

        0% {
            opacity: .35;

            transform:
                translateY(-4px);
        }

        100% {
            opacity: 1;

            transform:
                translateY(0);
        }

    }


    /* =========================================================
       BOX DIVIDER
    ========================================================== */

    .countdown-box-divider {
        width: 25px;

        height: 1px;

        margin: 13px auto 0;

        background:
            #b88a4a;
    }


    /* =========================================================
       LABEL
    ========================================================== */

    .countdown-label {
        margin: 10px 0 0;

        font-family:
            Arial,
            sans-serif;

        font-size: 8px;

        font-weight: 600;

        letter-spacing: .30em;

        color: #9a7c60;
    }


    /* =========================================================
       DATE
    ========================================================== */

    .countdown-date {
        display: flex;

        align-items: center;
        justify-content: center;

        gap: 20px;

        margin-top: 48px;

        opacity: 0;

        transform: translateY(20px);
    }


    .countdown-section.is-visible .countdown-date {
        animation:
            countdownReveal
            .9s
            cubic-bezier(.22,1,.36,1)
            .55s
            forwards;
    }


    .countdown-date-line {
        width: 75px;

        height: 1px;

        background:
            linear-gradient(
                to right,
                transparent,
                #b88a4a
            );
    }


    .countdown-date-line:last-child {
        background:
            linear-gradient(
                to left,
                transparent,
                #b88a4a
            );
    }


    .countdown-date-content {
        text-align: center;
    }


    .countdown-date-content span {
        display: block;

        font-family:
            Arial,
            sans-serif;

        font-size: 8px;

        font-weight: 600;

        letter-spacing: .28em;

        color: #a08266;
    }


    .countdown-date-content strong {
        display: block;

        margin-top: 8px;

        font-family:
            Georgia,
            "Times New Roman",
            serif;

        font-size: 20px;

        font-weight: 500;

        color: #654735;
    }


    /* =========================================================
       MESSAGE
    ========================================================== */

    .countdown-message {
        display: none;

        margin-top: 35px;

        text-align: center;
    }


    .countdown-message.is-visible {
        display: block;

        animation:
            countdownMessageReveal
            .9s
            ease-out
            forwards;
    }


    .countdown-message-divider {
        display: flex;

        align-items: center;
        justify-content: center;

        gap: 10px;
    }


    .countdown-message-divider span {
        width: 45px;

        height: 1px;

        background:
            linear-gradient(
                to right,
                transparent,
                #b88a4a
            );
    }


    .countdown-message-divider span:last-child {
        background:
            linear-gradient(
                to left,
                transparent,
                #b88a4a
            );
    }


    .countdown-message-divider b {
        font-family: Georgia, serif;

        font-size: 17px;

        font-weight: normal;

        color: #b88a4a;
    }


    .countdown-message p {
        margin: 13px 0 0;

        font-family:
            Georgia,
            "Times New Roman",
            serif;

        font-size: 14px;

        font-style: italic;

        color: #80634c;
    }


    /* =========================================================
       BOTTOM ORNAMENT
    ========================================================== */

    .countdown-bottom {
        display: flex;

        align-items: center;
        justify-content: center;

        gap: 13px;

        margin-top: 45px;

        opacity: 0;

        transform: translateY(15px);
    }


    .countdown-section.is-visible .countdown-bottom {
        animation:
            countdownReveal
            .9s
            ease-out
            .8s
            forwards;
    }


    .countdown-bottom span {
        width: 60px;

        height: 1px;

        background:
            linear-gradient(
                to right,
                transparent,
                #b88a4a
            );
    }


    .countdown-bottom span:last-child {
        background:
            linear-gradient(
                to left,
                transparent,
                #b88a4a
            );
    }


    .countdown-bottom b {
        font-family: Georgia, serif;

        font-size: 18px;

        font-weight: normal;

        color: #b88a4a;
    }


    /* =========================================================
       ANIMATIONS
    ========================================================== */

    @keyframes countdownReveal {

        from {
            opacity: 0;

            transform:
                translateY(30px);
        }

        to {
            opacity: 1;

            transform:
                translateY(0);
        }

    }


    @keyframes countdownBoxReveal {

        from {
            opacity: 0;

            transform:
                translateY(30px)
                scale(.97);
        }

        to {
            opacity: 1;

            transform:
                translateY(0)
                scale(1);
        }

    }


    @keyframes countdownMessageReveal {

        from {
            opacity: 0;

            transform:
                translateY(15px);
        }

        to {
            opacity: 1;

            transform:
                translateY(0);
        }

    }


    /* =========================================================
       MOBILE
    ========================================================== */

    @media (max-width: 640px) {

        .countdown-wrapper {
            padding: 55px 14px;
        }


        .countdown-panel {
            padding: 52px 18px 43px;
        }


        .countdown-panel::before {
            inset: 10px;
        }


        .countdown-corner-tl {
            top: 18px;
            left: 18px;
        }

        .countdown-corner-tr {
            top: 18px;
            right: 18px;
        }

        .countdown-corner-bl {
            bottom: 18px;
            left: 18px;
        }

        .countdown-corner-br {
            right: 18px;
            bottom: 18px;
        }


        .countdown-header p {
            font-size: 13px;

            line-height: 1.75;
        }


        .countdown-grid {
            gap: 8px;

            margin-top: 38px;
        }


        .countdown-box {
            padding:
                22px 5px
                20px;
        }


        .countdown-number {
            font-size: clamp(
                30px,
                9vw,
                43px
            );
        }


        .countdown-label {
            font-size: 7px;

            letter-spacing: .18em;
        }


        .countdown-date {
            gap: 10px;

            margin-top: 38px;
        }


        .countdown-date-line {
            width: 35px;
        }


        .countdown-date-content strong {
            font-size: 17px;
        }


        .countdown-bottom {
            margin-top: 38px;
        }

    }


    /* =========================================================
       SMALL MOBILE
    ========================================================== */

    @media (max-width: 380px) {

        .countdown-wrapper {
            padding-left: 9px;
            padding-right: 9px;
        }


        .countdown-panel {
            padding-left: 14px;
            padding-right: 14px;
        }


        .countdown-grid {
            gap: 5px;
        }


        .countdown-box {
            padding-left: 3px;
            padding-right: 3px;
        }


        .countdown-number {
            font-size: 29px;
        }


        .countdown-date-content strong {
            font-size: 15px;
        }

    }


    /* =========================================================
       REDUCED MOTION
    ========================================================== */

    @media (prefers-reduced-motion: reduce) {

        .countdown-header,
        .countdown-box,
        .countdown-date,
        .countdown-bottom,
        .countdown-message {
            animation: none !important;

            opacity: 1;

            transform: none;
        }


        .countdown-number {
            transition: none !important;
        }

    }

</style>


<script>

    document.addEventListener(
        'DOMContentLoaded',
        function () {

            /* =================================================
               SECTION REVEAL
            ================================================= */

            const countdownSection =
                document.getElementById(
                    'countdown'
                );


            if (countdownSection) {

                const observer =
                    new IntersectionObserver(
                        function (entries) {

                            entries.forEach(
                                function (entry) {

                                    if (
                                        entry.isIntersecting
                                    ) {

                                        countdownSection
                                            .classList
                                            .add(
                                                'is-visible'
                                            );

                                        observer
                                            .unobserve(
                                                countdownSection
                                            );

                                    }

                                }
                            );

                        },
                        {
                            threshold: 0.12
                        }
                    );


                observer.observe(
                    countdownSection
                );

            }


            /* =================================================
               TARGET DATE
            ================================================== */

            const targetDate =
                new Date(
                    window.weddingDate
                ).getTime();


            /* =================================================
               ELEMENTS
            ================================================== */

            const daysElement =
                document.getElementById(
                    'days'
                );

            const hoursElement =
                document.getElementById(
                    'hours'
                );

            const minutesElement =
                document.getElementById(
                    'minutes'
                );

            const secondsElement =
                document.getElementById(
                    'seconds'
                );

            const messageElement =
                document.getElementById(
                    'countdownMessage'
                );


            if (
                !daysElement ||
                !hoursElement ||
                !minutesElement ||
                !secondsElement
            ) {
                return;
            }


            /* =================================================
               FORMAT NUMBER
            ================================================== */

            function pad(number) {

                return String(number)
                    .padStart(2, '0');

            }


            /* =================================================
               UPDATE NUMBER
            ================================================== */

            function updateNumber(
                element,
                value
            ) {

                const formatted =
                    pad(value);


                if (
                    element.textContent !==
                    formatted
                ) {

                    element.classList.remove(
                        'tick'
                    );


                    void element.offsetWidth;


                    element.textContent =
                        formatted;


                    element.classList.add(
                        'tick'
                    );

                }

            }


            /* =================================================
               COUNTDOWN
            ================================================== */

            function updateCountdown() {

                const now =
                    new Date().getTime();


                const distance =
                    targetDate - now;


                /* =============================================
                   WEDDING DAY REACHED
                ============================================== */

                if (distance <= 0) {

                    updateNumber(
                        daysElement,
                        0
                    );

                    updateNumber(
                        hoursElement,
                        0
                    );

                    updateNumber(
                        minutesElement,
                        0
                    );

                    updateNumber(
                        secondsElement,
                        0
                    );


                    if (messageElement) {

                        messageElement.classList
                            .add(
                                'is-visible'
                            );

                    }


                    clearInterval(
                        countdownInterval
                    );

                    return;

                }


                /* =============================================
                   CALCULATE TIME
                ============================================== */

                const days =
                    Math.floor(
                        distance /
                        (
                            1000 *
                            60 *
                            60 *
                            24
                        )
                    );


                const hours =
                    Math.floor(
                        (
                            distance %
                            (
                                1000 *
                                60 *
                                60 *
                                24
                            )
                        ) /
                        (
                            1000 *
                            60 *
                            60
                        )
                    );


                const minutes =
                    Math.floor(
                        (
                            distance %
                            (
                                1000 *
                                60 *
                                60
                            )
                        ) /
                        (
                            1000 *
                            60
                        )
                    );


                const seconds =
                    Math.floor(
                        (
                            distance %
                            (
                                1000 *
                                60
                            )
                        ) /
                        1000
                    );


                /* =============================================
                   UPDATE UI
                ============================================== */

                updateNumber(
                    daysElement,
                    days
                );


                updateNumber(
                    hoursElement,
                    hours
                );


                updateNumber(
                    minutesElement,
                    minutes
                );


                updateNumber(
                    secondsElement,
                    seconds

                );

            }


            /* =================================================
               START
            ================================================== */

            updateCountdown();


            const countdownInterval =
                setInterval(
                    updateCountdown,
                    1000
                );

        }
    );

</script>


<script>

    /*
     * Target tanggal countdown.
     *
     * Tetap menggunakan tanggal wedding dari database.
     * Jam target dibuat 08:00 WIB seperti versi sebelumnya.
     */

    window.weddingDate =
        @json(
            \Carbon\Carbon::parse(
                $wedding->wedding_date
            )
                ->setTime(8, 0, 0)
                ->timezone('Asia/Jakarta')
                ->format('Y-m-d\TH:i:sP')
        );

</script>