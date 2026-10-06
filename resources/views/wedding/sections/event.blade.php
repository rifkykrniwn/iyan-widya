<section
    id="event"
    class="event-section relative min-h-screen overflow-hidden"
>

    {{-- =========================================================
         BACKGROUND JAVA HERITAGE
    ========================================================== --}}

    <img
        src="{{ asset('images/wedding/java-heritage/BACKGROUND.webp') }}"
        alt=""
        class="event-background"
    >

    <div class="event-background-overlay"></div>


    {{-- =========================================================
         MAIN WRAPPER
    ========================================================== --}}

    <div class="event-wrapper relative z-10">

        <div class="event-panel">

            {{-- CORNER ORNAMENTS --}}
            <span class="event-corner event-corner-tl"></span>
            <span class="event-corner event-corner-tr"></span>
            <span class="event-corner event-corner-bl"></span>
            <span class="event-corner event-corner-br"></span>


            {{-- =================================================
                 HEADER
            ================================================== --}}

            <div class="event-header">

                <span class="event-kicker">
                    SAVE THE DATE
                </span>

                <div class="event-header-divider">
                    <span></span>
                    <b>❦</b>
                    <span></span>
                </div>

                <h2>
                    Acara Pernikahan
                </h2>

                <p>
                    Dengan penuh rasa syukur dan kebahagiaan,
                    kami mengundang Bapak/Ibu/Saudara/i
                    untuk hadir di hari istimewa kami.
                </p>

            </div>


            {{-- =================================================
                 EVENT CARDS
            ================================================== --}}

            <div class="event-list">

                @forelse ($wedding->events as $index => $event)

                    <article
                        class="event-card"
                        style="--delay: {{ $index * 0.18 }}s;"
                    >

                        {{-- NUMBER --}}
                        <div class="event-number">
                            {{ sprintf('%02d', $index + 1) }}
                        </div>


                        {{-- EVENT TITLE --}}
                        <div class="event-card-title">
                            {{ strtoupper($event->title) }}
                        </div>


                        {{-- ORNAMENT --}}
                        <div class="event-card-ornament">
                            <span></span>
                            <b>❦</b>
                            <span></span>
                        </div>


                        {{-- DAY --}}
                        <p class="event-day">
                            {{ $event->start_at->translatedFormat('l') }}
                        </p>


                        {{-- DATE --}}
                        <h3 class="event-date">
                            {{ $event->start_at->translatedFormat('d F Y') }}
                        </h3>


                        {{-- TIME --}}
                        <div class="event-time">

                            <span class="event-label">
                                WAKTU
                            </span>

                            <p>
                                {{ $event->start_at->format('H.i') }}

                                @if ($event->end_at)
                                    <span class="event-time-separator">
                                        —
                                    </span>

                                    {{ $event->end_at->format('H.i') }}
                                @endif

                                <small>
                                    WIB
                                </small>
                            </p>

                        </div>


                        {{-- LOCATION --}}
                        <div class="event-location">

                            <span class="event-label">
                                TEMPAT
                            </span>

                            <h4>
                                {{ $event->venue }}
                            </h4>

                            <p>
                                {{ $event->address }}
                            </p>

                        </div>


                        {{-- MAPS --}}
                        @if ($event->maps_url)

                            <div class="event-map-wrapper">

                                <a
                                    href="{{ $event->maps_url }}"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    class="event-map-button"
                                >
                                    <span class="event-map-icon">
                                        ↗
                                    </span>

                                    <span>
                                        LIHAT LOKASI
                                    </span>
                                </a>

                            </div>

                        @endif

                    </article>

                @empty

                    <div class="event-empty">
                        <span>❦</span>

                        <p>
                            Informasi acara belum tersedia.
                        </p>

                    </div>

                @endforelse

            </div>


            {{-- =================================================
                 SPECIAL DAY
            ================================================== --}}

            <div class="special-day">

                <span class="special-day-kicker">
                    OUR SPECIAL DAY
                </span>

                <div class="special-day-divider">
                    <span></span>
                    <b>❦</b>
                    <span></span>
                </div>


                <div class="special-date">

                    {{-- DAY --}}
                    <div class="date-item">

                        <strong>
                            {{ $wedding->wedding_date->format('d') }}
                        </strong>

                        <span>
                            TANGGAL
                        </span>

                    </div>


                    <div class="date-separator">
                        /
                    </div>


                    {{-- MONTH --}}
                    <div class="date-item">

                        <strong>
                            {{ $wedding->wedding_date->format('m') }}
                        </strong>

                        <span>
                            BULAN
                        </span>

                    </div>


                    <div class="date-separator">
                        /
                    </div>


                    {{-- YEAR --}}
                    <div class="date-item">

                        <strong>
                            {{ $wedding->wedding_date->format('Y') }}
                        </strong>

                        <span>
                            TAHUN
                        </span>

                    </div>

                </div>


                <div class="special-day-ornament">
                    ❦
                </div>

            </div>

        </div>

    </div>

</section>


<style>

    /* =========================================================
       JAVA HERITAGE — EVENT SECTION
    ========================================================== */

    .event-section {
        position: relative;
        isolation: isolate;

        scroll-margin-top: 20px;

        color: #5d4331;

        background: #eadcc8;
    }


    /* =========================================================
       BACKGROUND
    ========================================================== */

    .event-background {
        position: absolute;
        inset: 0;

        width: 100%;
        height: 100%;

        object-fit: cover;
        object-position: center;

        z-index: -3;
    }


    .event-background-overlay {
        position: absolute;
        inset: 0;

        z-index: -2;

        background:
            linear-gradient(
                180deg,
                rgba(247, 238, 225, .91) 0%,
                rgba(238, 224, 204, .84) 50%,
                rgba(224, 204, 178, .91) 100%
            );
    }


    /* =========================================================
       WRAPPER
    ========================================================== */

    .event-wrapper {
        min-height: 100vh;

        width: 100%;

        display: flex;
        align-items: center;
        justify-content: center;

        padding: 80px 24px;
    }


    /* =========================================================
       MAIN PANEL
    ========================================================== */

    .event-panel {
        position: relative;

        width: min(1050px, 100%);

        padding: 70px 65px 60px;

        background:
            linear-gradient(
                135deg,
                rgba(255, 250, 242, .92),
                rgba(247, 236, 219, .89)
            );

        border: 1px solid rgba(173, 131, 72, .58);

        box-shadow:
            0 28px 80px rgba(76, 48, 29, .17),
            inset 0 0 0 1px rgba(255, 255, 255, .60);

        backdrop-filter: blur(3px);
        -webkit-backdrop-filter: blur(3px);
    }


    /* =========================================================
       INNER BORDER
    ========================================================== */

    .event-panel::before {
        content: "";

        position: absolute;
        inset: 14px;

        border: 1px solid rgba(181, 139, 78, .30);

        pointer-events: none;
    }


    /* =========================================================
       CORNERS
    ========================================================== */

    .event-corner {
        position: absolute;

        width: 35px;
        height: 35px;

        pointer-events: none;
    }


    .event-corner::before,
    .event-corner::after {
        content: "";

        position: absolute;

        display: block;

        background: #b88a4a;
    }


    .event-corner::before {
        width: 35px;
        height: 1px;
    }


    .event-corner::after {
        width: 1px;
        height: 35px;
    }


    .event-corner-tl {
        top: 24px;
        left: 24px;
    }


    .event-corner-tr {
        top: 24px;
        right: 24px;

        transform: rotate(90deg);
    }


    .event-corner-bl {
        bottom: 24px;
        left: 24px;

        transform: rotate(-90deg);
    }


    .event-corner-br {
        right: 24px;
        bottom: 24px;

        transform: rotate(180deg);
    }


    /* =========================================================
       HEADER
    ========================================================== */

    .event-header {
        max-width: 620px;

        margin: 0 auto 55px;

        text-align: center;

        opacity: 0;
        transform: translateY(30px);
    }


    .event-section.is-visible .event-header {
        animation:
            eventReveal
            .9s
            cubic-bezier(.22,1,.36,1)
            forwards;
    }


    .event-kicker {
        display: block;

        font-family:
            Arial,
            sans-serif;

        font-size: 10px;
        font-weight: 600;

        letter-spacing: .38em;

        color: #9b713c;
    }


    .event-header-divider {
        display: flex;

        align-items: center;
        justify-content: center;

        gap: 12px;

        margin: 15px 0 10px;
    }


    .event-header-divider span {
        width: 55px;
        height: 1px;

        background:
            linear-gradient(
                to right,
                transparent,
                #b88a4a
            );
    }


    .event-header-divider span:last-child {
        background:
            linear-gradient(
                to left,
                transparent,
                #b88a4a
            );
    }


    .event-header-divider b {
        font-family: Georgia, serif;

        font-size: 18px;
        font-weight: normal;

        color: #b88a4a;
    }


    .event-header h2 {
        margin: 0;

        font-family:
            Georgia,
            "Times New Roman",
            serif;

        font-size: clamp(30px, 4vw, 43px);

        font-weight: 500;

        letter-spacing: .035em;

        color: #654735;
    }


    .event-header p {
        margin: 16px auto 0;

        max-width: 500px;

        font-family:
            Georgia,
            "Times New Roman",
            serif;

        font-size: 14px;

        line-height: 1.85;

        color: #876a52;
    }


    /* =========================================================
       EVENT LIST
    ========================================================== */

    .event-list {
        display: grid;

        grid-template-columns:
            repeat(2, minmax(0, 1fr));

        gap: 28px;
    }


    /* =========================================================
       EVENT CARD
    ========================================================== */

    .event-card {
        position: relative;

        display: flex;
        flex-direction: column;

        min-height: 500px;

        padding: 36px 32px 32px;

        text-align: center;

        background:
            rgba(255, 251, 244, .72);

        border:
            1px solid rgba(177, 135, 73, .43);

        box-shadow:
            0 15px 40px rgba(81, 52, 32, .09);

        opacity: 0;
        transform:
            translateY(40px)
            scale(.98);

        animation:
            eventCardReveal
            .9s
            cubic-bezier(.22,1,.36,1)
            var(--delay)
            forwards;

        transition:
            transform .5s ease,
            box-shadow .5s ease,
            background .5s ease;
    }


    .event-card::before {
        content: "";

        position: absolute;

        inset: 8px;

        border:
            1px solid rgba(177, 135, 73, .20);

        pointer-events: none;
    }


    .event-card:hover {
        transform:
            translateY(-7px)
            scale(1.005);

        background:
            rgba(255, 252, 246, .86);

        box-shadow:
            0 25px 55px rgba(81, 52, 32, .14);
    }


    /* =========================================================
       NUMBER
    ========================================================== */

    .event-number {
        position: relative;
        z-index: 2;

        width: 45px;
        height: 45px;

        display: flex;
        align-items: center;
        justify-content: center;

        margin: 0 auto;

        border:
            1px solid rgba(177, 135, 73, .62);

        border-radius: 50%;

        background:
            rgba(255, 250, 240, .82);

        font-family:
            Georgia,
            "Times New Roman",
            serif;

        font-size: 13px;

        color: #9b713c;

        transition:
            transform .5s ease,
            background .5s ease;
    }


    .event-card:hover .event-number {
        transform:
            rotate(8deg)
            scale(1.08);

        background:
            #f6ead7;
    }


    /* =========================================================
       TITLE
    ========================================================== */

    .event-card-title {
        margin-top: 22px;

        font-family:
            Arial,
            sans-serif;

        font-size: 10px;
        font-weight: 600;

        letter-spacing: .28em;

        color: #9b713c;
    }


    /* =========================================================
       ORNAMENT
    ========================================================== */

    .event-card-ornament {
        display: flex;

        align-items: center;
        justify-content: center;

        gap: 9px;

        margin: 18px auto 20px;
    }


    .event-card-ornament span {
        width: 45px;
        height: 1px;

        background:
            linear-gradient(
                to right,
                transparent,
                #b88a4a
            );
    }


    .event-card-ornament span:last-child {
        background:
            linear-gradient(
                to left,
                transparent,
                #b88a4a
            );
    }


    .event-card-ornament b {
        font-family: Georgia, serif;

        font-size: 15px;
        font-weight: normal;

        color: #b88a4a;
    }


    /* =========================================================
       DAY
    ========================================================== */

    .event-day {
        margin: 0;

        font-family:
            Georgia,
            "Times New Roman",
            serif;

        font-size: 14px;
        font-style: italic;

        color: #876a52;
    }


    /* =========================================================
       DATE
    ========================================================== */

    .event-date {
        margin: 5px 0 0;

        font-family:
            Georgia,
            "Times New Roman",
            serif;

        font-size: clamp(25px, 3vw, 31px);

        font-weight: 500;

        line-height: 1.25;

        color: #654735;
    }


    /* =========================================================
       TIME
    ========================================================== */

    .event-time {
        margin-top: 25px;

        padding: 17px 0;

        border-top:
            1px solid rgba(177, 135, 73, .25);

        border-bottom:
            1px solid rgba(177, 135, 73, .25);
    }


    .event-label {
        display: block;

        font-family:
            Arial,
            sans-serif;

        font-size: 8px;

        font-weight: 600;

        letter-spacing: .3em;

        color: #a48768;
    }


    .event-time p {
        margin: 9px 0 0;

        font-family:
            Georgia,
            "Times New Roman",
            serif;

        font-size: 20px;

        font-weight: 500;

        color: #674936;
    }


    .event-time-separator {
        margin: 0 7px;

        color: #b9a083;

        font-weight: 300;
    }


    .event-time small {
        margin-left: 4px;

        font-family:
            Arial,
            sans-serif;

        font-size: 9px;

        font-weight: normal;

        letter-spacing: .08em;

        color: #96795e;
    }


    /* =========================================================
       LOCATION
    ========================================================== */

    .event-location {
        flex: 1;

        margin-top: 25px;
    }


    .event-location h4 {
        margin: 11px auto 0;

        max-width: 330px;

        font-family:
            Georgia,
            "Times New Roman",
            serif;

        font-size: 17px;

        font-weight: 600;

        line-height: 1.45;

        color: #654735;
    }


    .event-location p {
        max-width: 330px;

        margin: 7px auto 0;

        white-space: pre-line;

        font-family:
            Georgia,
            "Times New Roman",
            serif;

        font-size: 13px;

        line-height: 1.75;

        color: #80644d;
    }


    /* =========================================================
       MAP BUTTON
    ========================================================== */

    .event-map-wrapper {
        margin-top: 25px;
    }


    .event-map-button {
        display: inline-flex;

        align-items: center;
        justify-content: center;

        gap: 10px;

        min-width: 160px;

        padding: 11px 20px;

        border:
            1px solid rgba(137, 96, 50, .65);

        background:
            rgba(255, 249, 239, .55);

        color: #765334;

        text-decoration: none;

        font-family:
            Arial,
            sans-serif;

        font-size: 9px;

        font-weight: 600;

        letter-spacing: .2em;

        transition:
            transform .4s ease,
            background .4s ease,
            color .4s ease,
            box-shadow .4s ease;
    }


    .event-map-button:hover {
        transform: translateY(-3px);

        background: #704d34;

        color: #fff8ec;

        box-shadow:
            0 10px 25px rgba(74, 48, 30, .16);
    }


    .event-map-icon {
        font-size: 15px;

        line-height: 1;
    }


    /* =========================================================
       EMPTY STATE
    ========================================================== */

    .event-empty {
        grid-column: 1 / -1;

        padding: 60px 30px;

        text-align: center;

        border:
            1px solid rgba(177, 135, 73, .35);

        background:
            rgba(255, 250, 241, .72);
    }


    .event-empty span {
        display: block;

        margin-bottom: 15px;

        font-family: Georgia, serif;

        font-size: 25px;

        color: #b88a4a;
    }


    .event-empty p {
        margin: 0;

        font-family:
            Georgia,
            serif;

        font-size: 14px;

        color: #876a52;
    }


    /* =========================================================
       SPECIAL DAY
    ========================================================== */

    .special-day {
        margin-top: 75px;

        text-align: center;

        opacity: 0;
        transform: translateY(30px);
    }


    .event-section.is-visible .special-day {
        animation:
            eventReveal
            .9s
            cubic-bezier(.22,1,.36,1)
            .5s
            forwards;
    }


    .special-day-kicker {
        display: block;

        font-family:
            Arial,
            sans-serif;

        font-size: 10px;

        font-weight: 600;

        letter-spacing: .38em;

        color: #9b713c;
    }


    .special-day-divider {
        display: flex;

        align-items: center;
        justify-content: center;

        gap: 10px;

        margin-top: 15px;
    }


    .special-day-divider span {
        width: 48px;
        height: 1px;

        background:
            linear-gradient(
                to right,
                transparent,
                #b88a4a
            );
    }


    .special-day-divider span:last-child {
        background:
            linear-gradient(
                to left,
                transparent,
                #b88a4a
            );
    }


    .special-day-divider b {
        font-family: Georgia, serif;

        font-size: 16px;

        font-weight: normal;

        color: #b88a4a;
    }


    /* =========================================================
       SPECIAL DATE
    ========================================================== */

    .special-date {
        display: flex;

        align-items: center;
        justify-content: center;

        gap: 25px;

        margin-top: 28px;
    }


    .date-item {
        min-width: 90px;

        transition:
            transform .4s ease;
    }


    .date-item:hover {
        transform: translateY(-5px);
    }


    .date-item strong {
        display: block;

        font-family:
            Georgia,
            "Times New Roman",
            serif;

        font-size: clamp(38px, 5vw, 52px);

        font-weight: 400;

        line-height: 1;

        color: #654735;
    }


    .date-item span {
        display: block;

        margin-top: 9px;

        font-family:
            Arial,
            sans-serif;

        font-size: 8px;

        font-weight: 600;

        letter-spacing: .3em;

        color: #987b5f;
    }


    .date-separator {
        font-family:
            Georgia,
            serif;

        font-size: 27px;

        font-weight: 300;

        color: #c4aa88;
    }


    /* =========================================================
       BOTTOM ORNAMENT
    ========================================================== */

    .special-day-ornament {
        margin-top: 30px;

        font-family: Georgia, serif;

        font-size: 19px;

        color: #b88a4a;
    }


    /* =========================================================
       ANIMATIONS
    ========================================================== */

    @keyframes eventReveal {

        from {
            opacity: 0;
            transform: translateY(30px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }

    }


    @keyframes eventCardReveal {

        from {
            opacity: 0;

            transform:
                translateY(40px)
                scale(.98);
        }

        to {
            opacity: 1;

            transform:
                translateY(0)
                scale(1);
        }

    }


    /* =========================================================
       TABLET
    ========================================================== */

    @media (max-width: 800px) {

        .event-panel {
            padding: 60px 38px 50px;
        }

        .event-list {
            grid-template-columns: 1fr;
        }

        .event-card {
            min-height: auto;
        }

    }


    /* =========================================================
       MOBILE
    ========================================================== */

    @media (max-width: 640px) {

        .event-wrapper {
            padding: 55px 14px;
        }


        .event-panel {
            padding: 52px 20px 42px;
        }


        .event-panel::before {
            inset: 10px;
        }


        .event-corner-tl {
            top: 18px;
            left: 18px;
        }

        .event-corner-tr {
            top: 18px;
            right: 18px;
        }

        .event-corner-bl {
            bottom: 18px;
            left: 18px;
        }

        .event-corner-br {
            right: 18px;
            bottom: 18px;
        }


        .event-header {
            margin-bottom: 38px;
        }


        .event-header p {
            font-size: 13px;
            line-height: 1.75;
        }


        .event-card {
            padding: 32px 23px 28px;
        }


        .event-date {
            font-size: 25px;
        }


        .event-time p {
            font-size: 18px;
        }


        .special-day {
            margin-top: 55px;
        }


        .special-date {
            gap: 10px;
        }


        .date-item {
            min-width: 72px;
        }


        .date-item strong {
            font-size: 37px;
        }


        .date-separator {
            font-size: 21px;
        }

    }


    /* =========================================================
       SMALL MOBILE
    ========================================================== */

    @media (max-width: 380px) {

        .event-wrapper {
            padding-left: 9px;
            padding-right: 9px;
        }


        .event-panel {
            padding-left: 16px;
            padding-right: 16px;
        }


        .event-card {
            padding-left: 18px;
            padding-right: 18px;
        }


        .date-item {
            min-width: 63px;
        }


        .date-item strong {
            font-size: 32px;
        }


        .date-item span {
            font-size: 7px;
            letter-spacing: .2em;
        }

    }


    /* =========================================================
       REDUCED MOTION
    ========================================================== */

    @media (prefers-reduced-motion: reduce) {

        .event-header,
        .event-card,
        .special-day {
            animation: none !important;

            opacity: 1;

            transform: none;
        }

        .event-card {
            transition: none;
        }

    }

</style>


<script>
    document.addEventListener('DOMContentLoaded', function () {

        const eventSection =
            document.getElementById('event');

        if (!eventSection) {
            return;
        }


        const observer =
            new IntersectionObserver(
                function (entries) {

                    entries.forEach(function (entry) {

                        if (entry.isIntersecting) {

                            eventSection.classList.add(
                                'is-visible'
                            );

                            observer.unobserve(
                                eventSection
                            );

                        }

                    });

                },
                {
                    threshold: 0.12
                }
            );


        observer.observe(eventSection);

    });
</script>