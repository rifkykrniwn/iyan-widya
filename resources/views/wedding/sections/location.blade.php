<section
    id="location"
    class="location-section relative overflow-hidden px-5 py-24 sm:px-6 sm:py-28"
>
    {{-- =========================================
         JAVA HERITAGE BACKGROUND
    ========================================== --}}
    <img
        src="{{ asset('images/wedding/java-heritage/BACKGROUND.webp') }}"
        alt=""
        class="location-background"
    >

    <div class="location-background-overlay"></div>

    <div class="location-glow location-glow-one"></div>
    <div class="location-glow location-glow-two"></div>


    {{-- =========================================
         MAIN CONTENT
    ========================================== --}}
    <div class="relative z-10 mx-auto w-full max-w-5xl">

        <div class="location-panel">

            {{-- Decorative corners --}}
            <span class="location-corner location-corner-tl"></span>
            <span class="location-corner location-corner-tr"></span>
            <span class="location-corner location-corner-bl"></span>
            <span class="location-corner location-corner-br"></span>


            {{-- =========================================
                 HEADER
            ========================================== --}}
            <header class="location-header">

                <p class="location-kicker">
                    LOCATION
                </p>

                <div class="location-ornament">
                    <span></span>
                    <b>❦</b>
                    <span></span>
                </div>

                <h2 class="location-title">
                    Lokasi Acara
                </h2>

                <p class="location-intro">
                    Kami dengan senang hati menantikan kehadiran
                    Anda di hari istimewa kami.
                </p>

            </header>


            {{-- =========================================
                 LOCATION CARDS
            ========================================== --}}
            <div class="location-grid">

                @foreach ($wedding->events as $event)

                    <article
                        class="location-card"
                        style="--location-delay: {{ $loop->index * 0.18 + 0.15 }}s;"
                    >

                        {{-- =================================
                             DECORATIVE MAP AREA
                        ================================== --}}
                        <div class="location-map">

                            <div class="map-pattern"></div>

                            <div class="map-ring map-ring-one"></div>
                            <div class="map-ring map-ring-two"></div>
                            <div class="map-ring map-ring-three"></div>

                            <div class="map-cross map-cross-horizontal"></div>
                            <div class="map-cross map-cross-vertical"></div>

                            {{-- Pin --}}
                            <div class="location-pin">
                                <span class="location-pin-symbol">
                                    ⌖
                                </span>
                            </div>

                            {{-- Event title --}}
                            <div class="location-map-label">
                                <span>
                                    {{ strtoupper($event->title) }}
                                </span>
                            </div>

                        </div>


                        {{-- =================================
                             CONTENT
                        ================================== --}}
                        <div class="location-content">

                            <p class="location-event-label">
                                {{ strtoupper($event->title) }}
                            </p>


                            <h3 class="location-venue">
                                {{ $event->venue }}
                            </h3>


                            <div class="location-divider">
                                <span></span>
                                <b>✦</b>
                                <span></span>
                            </div>


                            <div class="location-address">
                                <span class="location-address-icon">
                                    ⌖
                                </span>

                                <p>
                                    {{ $event->address }}
                                </p>
                            </div>


                            {{-- Google Maps --}}
                            <div class="location-action">

                                @if ($event->maps_url)

                                    <a
                                        href="{{ $event->maps_url }}"
                                        target="_blank"
                                        rel="noopener noreferrer"
                                        class="location-button"
                                    >
                                        <span>
                                            BUKA GOOGLE MAPS
                                        </span>

                                        <span class="location-button-arrow">
                                            →
                                        </span>
                                    </a>

                                @else

                                    <span class="location-unavailable">
                                        LOKASI AKAN SEGERA DITAMBAHKAN
                                    </span>

                                @endif

                            </div>

                        </div>

                    </article>

                @endforeach

            </div>


            {{-- =========================================
                 BOTTOM ORNAMENT
            ========================================== --}}
            <div class="location-bottom">

                <div class="location-bottom-ornament">
                    <span></span>
                    <b>♡</b>
                    <span></span>
                </div>

                <p>
                    WITH LOVE, WE WELCOME YOU
                </p>

            </div>

        </div>

    </div>
</section>


<style>
/* =========================================================
   JAVA HERITAGE LOCATION
========================================================= */

.location-section {
    position: relative;
    isolation: isolate;
    min-height: 100vh;
    background: #efe0cc;
    color: #654735;
}


/* =========================================================
   BACKGROUND
========================================================= */

.location-background {
    position: absolute;
    inset: 0;
    z-index: -3;
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
}

.location-background-overlay {
    position: absolute;
    inset: 0;
    z-index: -2;
    background:
        linear-gradient(
            180deg,
            rgba(247, 238, 225, .93) 0%,
            rgba(242, 230, 212, .87) 48%,
            rgba(226, 207, 181, .94) 100%
        );
}

.location-glow {
    position: absolute;
    z-index: -1;
    width: 360px;
    height: 360px;
    border-radius: 999px;
    background: rgba(255, 250, 241, .40);
    filter: blur(72px);
    pointer-events: none;
}

.location-glow-one {
    top: 5%;
    left: -180px;
    animation:
        locationGlowOne
        13s
        ease-in-out
        infinite
        alternate;
}

.location-glow-two {
    right: -180px;
    bottom: 5%;
    animation:
        locationGlowTwo
        15s
        ease-in-out
        infinite
        alternate;
}


/* =========================================================
   PANEL
========================================================= */

.location-panel {
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

.location-panel::before {
    content: "";
    position: absolute;
    inset: 12px;
    border: 1px solid rgba(173, 131, 72, .20);
    pointer-events: none;
}


/* =========================================================
   CORNERS
========================================================= */

.location-corner {
    position: absolute;
    z-index: 3;
    width: 28px;
    height: 28px;
    border-color: rgba(166, 121, 62, .72);
}

.location-corner-tl {
    top: 24px;
    left: 24px;
    border-top: 1px solid;
    border-left: 1px solid;
}

.location-corner-tr {
    top: 24px;
    right: 24px;
    border-top: 1px solid;
    border-right: 1px solid;
}

.location-corner-bl {
    bottom: 24px;
    left: 24px;
    border-bottom: 1px solid;
    border-left: 1px solid;
}

.location-corner-br {
    right: 24px;
    bottom: 24px;
    border-right: 1px solid;
    border-bottom: 1px solid;
}


/* =========================================================
   HEADER
========================================================= */

.location-header {
    max-width: 620px;
    margin: 0 auto 60px;
    text-align: center;
    opacity: 0;
    transform: translateY(24px);
    animation:
        locationHeaderIn
        1s
        cubic-bezier(.22, 1, .36, 1)
        .1s
        forwards;
}

.location-kicker {
    margin: 0;
    color: #9b713c;
    font-family: Arial, sans-serif;
    font-size: 10px;
    font-weight: 600;
    letter-spacing: .48em;
    text-transform: uppercase;
}

.location-ornament {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 14px;
    margin-top: 20px;
}

.location-ornament span {
    width: 48px;
    height: 1px;
    background: linear-gradient(
        90deg,
        transparent,
        rgba(165, 120, 60, .65)
    );
}

.location-ornament span:last-child {
    background: linear-gradient(
        90deg,
        rgba(165, 120, 60, .65),
        transparent
    );
}

.location-ornament b {
    color: #a27a45;
    font-family: Georgia, serif;
    font-size: 17px;
    font-weight: 400;
}

.location-title {
    margin: 22px 0 0;
    color: #654735;
    font-family: Georgia, "Times New Roman", serif;
    font-size: clamp(2.3rem, 5vw, 3.7rem);
    font-weight: 400;
    letter-spacing: .025em;
    line-height: 1.15;
}

.location-intro {
    max-width: 470px;
    margin: 20px auto 0;
    color: #80644d;
    font-family: Arial, sans-serif;
    font-size: 13px;
    line-height: 1.9;
}


/* =========================================================
   GRID
========================================================= */

.location-grid {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 28px;
}


/* =========================================================
   CARD
========================================================= */

.location-card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    overflow: hidden;
    background:
        linear-gradient(
            145deg,
            rgba(255, 252, 247, .94),
            rgba(244, 231, 211, .84)
        );
    border: 1px solid rgba(173, 131, 72, .42);
    box-shadow:
        0 18px 45px rgba(76, 48, 29, .10),
        inset 0 0 0 1px rgba(255, 255, 255, .62);
    opacity: 0;
    transform: translateY(35px) scale(.975);
    animation:
        locationCardIn
        1s
        cubic-bezier(.22, 1, .36, 1)
        var(--location-delay)
        forwards;
    transition:
        transform .5s cubic-bezier(.22, 1, .36, 1),
        box-shadow .5s ease,
        border-color .5s ease;
}

.location-card::before {
    content: "";
    position: absolute;
    inset: 7px;
    z-index: 4;
    border: 1px solid rgba(173, 131, 72, .15);
    pointer-events: none;
}

.location-card:hover {
    transform: translateY(-7px);
    border-color: rgba(173, 131, 72, .62);
    box-shadow:
        0 26px 58px rgba(76, 48, 29, .14),
        inset 0 0 0 1px rgba(255, 255, 255, .68);
}


/* =========================================================
   MAP / DECORATIVE AREA
========================================================= */

.location-map {
    position: relative;
    display: flex;
    height: 235px;
    flex-shrink: 0;
    align-items: center;
    justify-content: center;
    overflow: hidden;
    background:
        linear-gradient(
            145deg,
            #e7d8c2,
            #d8c4a6
        );
}

.map-pattern {
    position: absolute;
    inset: 0;
    opacity: .30;
    background-image:
        linear-gradient(
            115deg,
            transparent 47%,
            rgba(119, 84, 48, .20) 48%,
            rgba(119, 84, 48, .20) 49%,
            transparent 50%
        ),
        linear-gradient(
            25deg,
            transparent 46%,
            rgba(119, 84, 48, .14) 47%,
            rgba(119, 84, 48, .14) 48%,
            transparent 49%
        );
    background-size: 72px 72px;
}

.map-pattern::before,
.map-pattern::after {
    content: "";
    position: absolute;
    border: 1px solid rgba(119, 84, 48, .18);
    border-radius: 999px;
}

.map-pattern::before {
    width: 280px;
    height: 150px;
    left: -70px;
    top: 20px;
    transform: rotate(-18deg);
}

.map-pattern::after {
    width: 310px;
    height: 120px;
    right: -90px;
    bottom: 12px;
    transform: rotate(18deg);
}


/* =========================================================
   MAP RINGS
========================================================= */

.map-ring {
    position: absolute;
    border: 1px solid rgba(141, 101, 54, .25);
    border-radius: 999px;
}

.map-ring-one {
    width: 190px;
    height: 190px;
}

.map-ring-two {
    width: 135px;
    height: 135px;
}

.map-ring-three {
    width: 80px;
    height: 80px;
}


/* =========================================================
   MAP CROSS
========================================================= */

.map-cross {
    position: absolute;
    background: rgba(141, 101, 54, .20);
}

.map-cross-horizontal {
    width: 100%;
    height: 1px;
}

.map-cross-vertical {
    width: 1px;
    height: 100%;
}


/* =========================================================
   PIN
========================================================= */

.location-pin {
    position: relative;
    z-index: 3;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 72px;
    height: 72px;
    border: 1px solid rgba(156, 112, 58, .65);
    border-radius: 999px;
    background:
        linear-gradient(
            145deg,
            rgba(255, 250, 241, .95),
            rgba(244, 228, 204, .88)
        );
    box-shadow:
        0 12px 30px rgba(83, 52, 29, .16),
        inset 0 0 0 6px rgba(255, 250, 241, .38);
    animation:
        locationPinFloat
        4s
        ease-in-out
        infinite;
    transition:
        transform .5s ease,
        box-shadow .5s ease;
}

.location-pin::before {
    content: "";
    position: absolute;
    inset: 8px;
    border: 1px solid rgba(173, 131, 72, .25);
    border-radius: 999px;
}

.location-pin-symbol {
    position: relative;
    z-index: 1;
    color: #8f6737;
    font-family: Georgia, serif;
    font-size: 30px;
    line-height: 1;
}

.location-card:hover .location-pin {
    transform: scale(1.08);
    box-shadow:
        0 16px 36px rgba(83, 52, 29, .20),
        inset 0 0 0 6px rgba(255, 250, 241, .46);
}


/* =========================================================
   MAP LABEL
========================================================= */

.location-map-label {
    position: absolute;
    right: 0;
    bottom: 20px;
    left: 0;
    z-index: 3;
    text-align: center;
}

.location-map-label span {
    display: inline-flex;
    padding: 9px 17px;
    border: 1px solid rgba(155, 113, 60, .34);
    background: rgba(255, 250, 241, .74);
    color: #74563d;
    font-family: Arial, sans-serif;
    font-size: 8px;
    font-weight: 600;
    letter-spacing: .28em;
    backdrop-filter: blur(5px);
}


/* =========================================================
   CONTENT
========================================================= */

.location-content {
    display: flex;
    flex: 1;
    flex-direction: column;
    padding: 31px 30px 30px;
    text-align: center;
}

.location-event-label {
    margin: 0;
    color: #a07843;
    font-family: Arial, sans-serif;
    font-size: 8px;
    font-weight: 600;
    letter-spacing: .36em;
}

.location-venue {
    margin: 14px auto 0;
    max-width: 330px;
    color: #624530;
    font-family: Georgia, "Times New Roman", serif;
    font-size: 23px;
    font-weight: 400;
    line-height: 1.45;
    transition:
        color .4s ease,
        letter-spacing .4s ease;
}

.location-card:hover .location-venue {
    color: #9b713c;
    letter-spacing: .015em;
}


/* =========================================================
   DIVIDER
========================================================= */

.location-divider {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 9px;
    margin: 19px auto 0;
}

.location-divider span {
    width: 28px;
    height: 1px;
    background: rgba(164, 120, 62, .42);
}

.location-divider b {
    color: #b88a4a;
    font-family: Georgia, serif;
    font-size: 9px;
    font-weight: 400;
}


/* =========================================================
   ADDRESS
========================================================= */

.location-address {
    display: flex;
    flex-direction: column;
    align-items: center;
    margin-top: 20px;
}

.location-address-icon {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 28px;
    height: 28px;
    border: 1px solid rgba(164, 120, 62, .35);
    border-radius: 999px;
    color: #9b713c;
    font-family: Georgia, serif;
    font-size: 14px;
}

.location-address p {
    max-width: 340px;
    margin: 11px auto 0;
    color: #80644d;
    white-space: pre-line;
    font-family: Arial, sans-serif;
    font-size: 12px;
    line-height: 1.85;
}


/* =========================================================
   ACTION
========================================================= */

.location-action {
    display: flex;
    min-height: 58px;
    align-items: flex-end;
    justify-content: center;
    margin-top: auto;
    padding-top: 27px;
}

.location-button {
    display: inline-flex;
    align-items: center;
    gap: 15px;
    padding: 12px 22px;
    border: 1px solid rgba(123, 87, 48, .62);
    background: transparent;
    color: #6b4b35;
    font-family: Arial, sans-serif;
    font-size: 9px;
    font-weight: 600;
    letter-spacing: .20em;
    text-decoration: none;
    transition:
        transform .45s ease,
        background .45s ease,
        color .45s ease,
        box-shadow .45s ease,
        border-color .45s ease;
}

.location-button:hover {
    transform: translateY(-3px);
    border-color: #765238;
    background: #765238;
    color: #fff8ed;
    box-shadow:
        0 12px 26px rgba(87, 54, 31, .17);
}

.location-button-arrow {
    font-family: Georgia, serif;
    font-size: 15px;
    transition: transform .45s ease;
}

.location-button:hover .location-button-arrow {
    transform: translateX(4px);
}

.location-unavailable {
    color: #a28b73;
    font-family: Arial, sans-serif;
    font-size: 8px;
    letter-spacing: .20em;
}


/* =========================================================
   BOTTOM
========================================================= */

.location-bottom {
    margin-top: 60px;
    text-align: center;
    opacity: 0;
    transform: translateY(15px);
    animation:
        locationBottomIn
        1s
        ease-out
        1s
        forwards;
}

.location-bottom-ornament {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 15px;
}

.location-bottom-ornament span {
    width: 54px;
    height: 1px;
    background: linear-gradient(
        90deg,
        transparent,
        rgba(164, 120, 62, .55)
    );
}

.location-bottom-ornament span:last-child {
    background: linear-gradient(
        90deg,
        rgba(164, 120, 62, .55),
        transparent
    );
}

.location-bottom-ornament b {
    color: #a27a45;
    font-family: Georgia, serif;
    font-size: 19px;
    font-weight: 400;
}

.location-bottom p {
    margin: 16px 0 0;
    color: #a27a45;
    font-family: Arial, sans-serif;
    font-size: 8px;
    letter-spacing: .34em;
}


/* =========================================================
   ANIMATIONS
========================================================= */

@keyframes locationHeaderIn {
    from {
        opacity: 0;
        transform: translateY(24px);
    }

    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes locationCardIn {
    from {
        opacity: 0;
        transform: translateY(35px) scale(.975);
    }

    to {
        opacity: 1;
        transform: translateY(0) scale(1);
    }
}

@keyframes locationBottomIn {
    from {
        opacity: 0;
        transform: translateY(15px);
    }

    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes locationPinFloat {
    0%,
    100% {
        transform: translateY(0);
    }

    50% {
        transform: translateY(-6px);
    }
}

@keyframes locationGlowOne {
    from {
        transform: translate3d(0, 0, 0) scale(1);
    }

    to {
        transform: translate3d(38px, 28px, 0) scale(1.08);
    }
}

@keyframes locationGlowTwo {
    from {
        transform: translate3d(0, 0, 0) scale(1);
    }

    to {
        transform: translate3d(-38px, -28px, 0) scale(1.08);
    }
}


/* =========================================================
   MOBILE
========================================================= */

@media (max-width: 767px) {

    .location-section {
        padding-top: 5rem;
        padding-bottom: 5rem;
    }

    .location-panel {
        padding: 60px 22px 48px;
    }

    .location-panel::before {
        inset: 9px;
    }

    .location-corner {
        width: 22px;
        height: 22px;
    }

    .location-corner-tl,
    .location-corner-tr {
        top: 18px;
    }

    .location-corner-bl,
    .location-corner-br {
        bottom: 18px;
    }

    .location-corner-tl,
    .location-corner-bl {
        left: 18px;
    }

    .location-corner-tr,
    .location-corner-br {
        right: 18px;
    }

    .location-header {
        margin-bottom: 48px;
    }

    .location-title {
        font-size: 2.3rem;
    }

    .location-intro {
        max-width: 300px;
        font-size: 12px;
        line-height: 1.85;
    }

    .location-grid {
        grid-template-columns: 1fr;
        gap: 24px;
    }

    .location-map {
        height: 215px;
    }

    .location-content {
        padding: 28px 24px 27px;
    }

    .location-venue {
        font-size: 21px;
    }

    .location-address p {
        font-size: 11.5px;
    }
}


/* =========================================================
   SMALL MOBILE
========================================================= */

@media (max-width: 400px) {

    .location-panel {
        padding-left: 18px;
        padding-right: 18px;
    }

    .location-title {
        font-size: 2.05rem;
    }

    .location-kicker {
        font-size: 8px;
        letter-spacing: .40em;
    }

    .location-map {
        height: 195px;
    }

    .location-pin {
        width: 64px;
        height: 64px;
    }

    .location-pin-symbol {
        font-size: 27px;
    }

    .location-content {
        padding-left: 20px;
        padding-right: 20px;
    }

    .location-button {
        padding: 11px 18px;
        font-size: 8px;
    }

    .location-bottom p {
        font-size: 7px;
        letter-spacing: .27em;
    }
}


/* =========================================================
   REDUCED MOTION
========================================================= */

@media (prefers-reduced-motion: reduce) {

    .location-glow-one,
    .location-glow-two,
    .location-header,
    .location-card,
    .location-pin,
    .location-bottom {
        animation: none !important;
        transition: none !important;
        opacity: 1;
        transform: none;
    }
}
</style>