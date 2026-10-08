<section
    id="location"
    class="location-section relative overflow-hidden px-5 py-24 sm:px-6 sm:py-28"
>

    {{-- =========================================================
         JAVA HERITAGE BACKGROUND
    ========================================================== --}}

    <img
        src="{{ asset('images/wedding/java-heritage/BACKGROUND.webp') }}"
        alt=""
        class="location-background"
    >

    <div class="location-background-overlay"></div>

    <div class="location-glow location-glow-one"></div>
    <div class="location-glow location-glow-two"></div>


    {{-- =========================================================
         MAIN CONTENT
    ========================================================== --}}

    <div class="relative z-10 mx-auto w-full max-w-5xl">

        <div class="location-panel">

            {{-- Decorative corners --}}

            <span class="location-corner location-corner-tl"></span>
            <span class="location-corner location-corner-tr"></span>
            <span class="location-corner location-corner-bl"></span>
            <span class="location-corner location-corner-br"></span>


            {{-- =================================================
                 HEADER
            ================================================== --}}

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



            {{-- =================================================
                 LOCATION CARDS
            ================================================== --}}

            <div class="location-grid">

                @foreach ($wedding->events as $event)

                    @php

                        /*
                        |--------------------------------------------------------------------------
                        | KOORDINAT LOKASI
                        |--------------------------------------------------------------------------
                        |
                        | 7°44'14.5"S 110°26'07.1"E
                        |
                        | Decimal:
                        | Latitude  = -7.7373611
                        | Longitude = 110.4353056
                        |
                        */

                        $latitude = -7.7373611;

                        $longitude = 110.4353056;


                        /*
                        |--------------------------------------------------------------------------
                        | GOOGLE MAPS URL
                        |--------------------------------------------------------------------------
                        */

                        $mapsUrl =
                            'https://www.google.com/maps/search/?api=1&query='
                            . $latitude
                            . ','
                            . $longitude;

                    @endphp


                    {{-- =================================================
                         EVENT CARD
                    ================================================== --}}

                    <article
                        class="location-card"
                        style="
                            --location-delay:
                            {{ $loop->index * 0.18 + 0.15 }}s;
                        "
                    >


                        {{-- =================================================
                             REAL MAP PREVIEW
                        ================================================== --}}

                        <div
                            id="location-map-{{ $loop->index }}"
                            class="location-map"
                            data-latitude="{{ $latitude }}"
                            data-longitude="{{ $longitude }}"
                            data-title="{{ strtoupper($event->title) }}"
                            data-venue="{{ $event->venue }}"
                        >

                            {{-- Loading --}}

                            <div class="location-map-loading">

                                <div class="location-map-loading-inner">

                                    <span class="location-map-loading-icon">
                                        ⌖
                                    </span>

                                    <span>
                                        MEMUAT PETA
                                    </span>

                                </div>

                            </div>

                        </div>



                        {{-- =================================================
                             CONTENT
                        ================================================== --}}

                        <div class="location-content">


                            {{-- EVENT LABEL --}}

                            <p class="location-event-label">

                                {{ strtoupper($event->title) }}

                            </p>



                            {{-- VENUE --}}

                            <h3 class="location-venue">

                                {{ $event->venue }}

                            </h3>



                            {{-- DIVIDER --}}

                            <div class="location-divider">

                                <span></span>

                                <b>✦</b>

                                <span></span>

                            </div>



                            {{-- ADDRESS --}}

                            <div class="location-address">

                                <span class="location-address-icon">
                                    ⌖
                                </span>

                                <p>
                                    {{ $event->address }}
                                </p>

                            </div>



                            {{-- =================================================
                                 GOOGLE MAPS BUTTON
                            ================================================== --}}

                            <div class="location-action">

                                <a
                                    href="{{ $mapsUrl }}"
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

                            </div>


                        </div>

                    </article>

                @endforeach

            </div>



            {{-- =========================================================
                 BOTTOM ORNAMENT
            ========================================================== --}}

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



{{-- =========================================================
     LEAFLET MAP
========================================================= --}}

<link
    rel="stylesheet"
    href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
/>


<script
    src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
></script>



<script>

document.addEventListener(
    'DOMContentLoaded',
    function () {


        /*
        |--------------------------------------------------------------------------
        | FIND ALL MAPS
        |--------------------------------------------------------------------------
        */

        const mapElements =
            document.querySelectorAll(
                '.location-map'
            );


        /*
        |--------------------------------------------------------------------------
        | INITIALIZE EACH MAP
        |--------------------------------------------------------------------------
        */

        mapElements.forEach(
            function (element) {


                const latitude =
                    parseFloat(
                        element.dataset.latitude
                    );


                const longitude =
                    parseFloat(
                        element.dataset.longitude
                    );


                const title =
                    element.dataset.title ||
                    'LOKASI ACARA';


                const venue =
                    element.dataset.venue ||
                    '';


                /*
                |--------------------------------------------------------------------------
                | CREATE MAP
                |--------------------------------------------------------------------------
                */

                const map =
                    L.map(
                        element,
                        {
                            zoomControl: true,

                            scrollWheelZoom: false,

                            dragging: true,

                            doubleClickZoom: true,

                            touchZoom: true,

                            boxZoom: false,

                            keyboard: true,

                            attributionControl: true
                        }
                    );


                /*
                |--------------------------------------------------------------------------
                | MAP POSITION
                |--------------------------------------------------------------------------
                */

                map.setView(
                    [
                        latitude,
                        longitude
                    ],
                    17
                );


                /*
                |--------------------------------------------------------------------------
                | OPEN STREET MAP
                |--------------------------------------------------------------------------
                */

                L.tileLayer(
                    'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
                    {
                        maxZoom: 19,

                        attribution:
                            '&copy; OpenStreetMap contributors'
                    }
                )
                .addTo(map);



                /*
                |--------------------------------------------------------------------------
                | CUSTOM WEDDING PIN
                |--------------------------------------------------------------------------
                */

                const weddingIcon =
                    L.divIcon({

                        className:
                            'wedding-location-marker',

                        html: `

                            <div class="wedding-pin">

                                <div class="wedding-pin-inner">
                                    ♥
                                </div>

                            </div>

                        `,

                        iconSize:
                            [
                                46,
                                54
                            ],

                        iconAnchor:
                            [
                                23,
                                52
                            ],

                        popupAnchor:
                            [
                                0,
                                -48
                            ]

                    });



                /*
                |--------------------------------------------------------------------------
                | MARKER
                |--------------------------------------------------------------------------
                */

                const marker =
                    L.marker(
                        [
                            latitude,
                            longitude
                        ],
                        {
                            icon:
                                weddingIcon
                        }
                    )
                    .addTo(map);



                /*
                |--------------------------------------------------------------------------
                | POPUP
                |--------------------------------------------------------------------------
                */

                marker.bindPopup(`

                    <div class="wedding-popup">

                        <div class="wedding-popup-event">
                            ${title}
                        </div>

                        <div class="wedding-popup-venue">
                            ${venue}
                        </div>

                        <div class="wedding-popup-coordinate">
                            7°44'14.5"S
                            110°26'07.1"E
                        </div>

                    </div>

                `);



                /*
                |--------------------------------------------------------------------------
                | REMOVE LOADING
                |--------------------------------------------------------------------------
                */

                const loading =
                    element.querySelector(
                        '.location-map-loading'
                    );


                if (loading) {

                    loading.style.opacity = '0';


                    setTimeout(
                        function () {

                            loading.remove();

                        },
                        350
                    );

                }



                /*
                |--------------------------------------------------------------------------
                | FIX MAP SIZE
                |--------------------------------------------------------------------------
                */

                setTimeout(
                    function () {

                        map.invalidateSize();

                    },
                    300
                );


                setTimeout(
                    function () {

                        map.invalidateSize();

                    },
                    1000
                );


            }
        );

    }
);

</script>



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

    background:
        rgba(
            255,
            250,
            241,
            .40
        );

    filter:
        blur(72px);

    pointer-events:
        none;

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

    padding:
        72px
        58px
        60px;

    background:
        linear-gradient(
            135deg,
            rgba(255, 250, 242, .94),
            rgba(247, 236, 219, .90)
        );

    border:
        1px solid
        rgba(173, 131, 72, .58);

    box-shadow:
        0 30px 90px
        rgba(76, 48, 29, .16),

        inset
        0 0 0 1px
        rgba(255, 255, 255, .60);

    backdrop-filter:
        blur(4px);

    overflow:
        hidden;

}


.location-panel::before {

    content: "";

    position: absolute;

    inset: 12px;

    border:
        1px solid
        rgba(173, 131, 72, .20);

    pointer-events:
        none;

}


/* =========================================================
   CORNERS
========================================================= */

.location-corner {

    position: absolute;

    z-index: 3;

    width: 28px;

    height: 28px;

    border-color:
        rgba(166, 121, 62, .72);

}


.location-corner-tl {

    top: 24px;

    left: 24px;

    border-top:
        1px solid;

    border-left:
        1px solid;

}


.location-corner-tr {

    top: 24px;

    right: 24px;

    border-top:
        1px solid;

    border-right:
        1px solid;

}


.location-corner-bl {

    bottom: 24px;

    left: 24px;

    border-bottom:
        1px solid;

    border-left:
        1px solid;

}


.location-corner-br {

    right: 24px;

    bottom: 24px;

    border-right:
        1px solid;

    border-bottom:
        1px solid;

}


/* =========================================================
   HEADER
========================================================= */

.location-header {

    max-width:
        620px;

    margin:
        0 auto 60px;

    text-align:
        center;

    opacity:
        0;

    transform:
        translateY(24px);

    animation:
        locationHeaderIn
        1s
        cubic-bezier(.22, 1, .36, 1)
        .1s
        forwards;

}


.location-kicker {

    margin:
        0;

    color:
        #9b713c;

    font-family:
        Arial,
        sans-serif;

    font-size:
        10px;

    font-weight:
        600;

    letter-spacing:
        .48em;

    text-transform:
        uppercase;

}


.location-ornament {

    display:
        flex;

    align-items:
        center;

    justify-content:
        center;

    gap:
        14px;

    margin-top:
        20px;

}


.location-ornament span {

    width:
        48px;

    height:
        1px;

    background:
        linear-gradient(
            90deg,
            transparent,
            rgba(165, 120, 60, .65)
        );

}


.location-ornament span:last-child {

    background:
        linear-gradient(
            90deg,
            rgba(165, 120, 60, .65),
            transparent
        );

}


.location-ornament b {

    color:
        #a27a45;

    font-family:
        Georgia,
        serif;

    font-size:
        17px;

    font-weight:
        400;

}


.location-title {

    margin:
        22px 0 0;

    color:
        #654735;

    font-family:
        Georgia,
        "Times New Roman",
        serif;

    font-size:
        clamp(
            2.3rem,
            5vw,
            3.7rem
        );

    font-weight:
        400;

    letter-spacing:
        .025em;

    line-height:
        1.15;

}


.location-intro {

    max-width:
        470px;

    margin:
        20px auto 0;

    color:
        #80644d;

    font-family:
        Arial,
        sans-serif;

    font-size:
        13px;

    line-height:
        1.9;

}


/* =========================================================
   GRID
========================================================= */

.location-grid {

    display:
        grid;

    grid-template-columns:
        repeat(
            2,
            minmax(
                0,
                1fr
            )
        );

    gap:
        28px;

}


/* =========================================================
   CARD
========================================================= */

.location-card {

    position:
        relative;

    display:
        flex;

    flex-direction:
        column;

    min-width:
        0;

    overflow:
        hidden;

    background:
        linear-gradient(
            145deg,
            rgba(255, 252, 247, .94),
            rgba(244, 231, 211, .84)
        );

    border:
        1px solid
        rgba(173, 131, 72, .42);

    box-shadow:
        0 18px 45px
        rgba(76, 48, 29, .10),

        inset
        0 0 0 1px
        rgba(255, 255, 255, .62);

    opacity:
        0;

    transform:
        translateY(35px)
        scale(.975);

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

    content:
        "";

    position:
        absolute;

    inset:
        7px;

    z-index:
        10;

    border:
        1px solid
        rgba(173, 131, 72, .15);

    pointer-events:
        none;

}


.location-card:hover {

    transform:
        translateY(-7px);

    border-color:
        rgba(173, 131, 72, .62);

    box-shadow:
        0 26px 58px
        rgba(76, 48, 29, .14),

        inset
        0 0 0 1px
        rgba(255, 255, 255, .68);

}


/* =========================================================
   REAL MAP
========================================================= */

.location-map {

    position:
        relative;

    display:
        block;

    width:
        100%;

    height:
        235px;

    flex-shrink:
        0;

    overflow:
        hidden;

    background:
        #e7d8c2;

}


/* Leaflet */

.location-map
.leaflet-container {

    width:
        100%;

    height:
        100%;

    font-family:
        Arial,
        sans-serif;

}


.location-map
.leaflet-tile {

    filter:
        saturate(.76)
        sepia(.10)
        brightness(1.04);

}


/* =========================================================
   MAP ZOOM CONTROL
========================================================= */

.location-map
.leaflet-control-zoom {

    margin-top:
        12px !important;

    margin-left:
        12px !important;

    border:
        none !important;

    box-shadow:
        0 5px 15px
        rgba(70, 45, 25, .16);

}


.location-map
.leaflet-control-zoom a {

    width:
        29px !important;

    height:
        29px !important;

    line-height:
        29px !important;

    background:
        rgba(
            250,
            246,
            238,
            .94
        ) !important;

    color:
        #76583c !important;

    border:
        1px solid
        rgba(
            173,
            131,
            72,
            .30
        ) !important;

}


.location-map
.leaflet-control-zoom a:hover {

    background:
        #f3e7d5 !important;

    color:
        #654735 !important;

}


/* =========================================================
   WEDDING MAP PIN
========================================================= */

.wedding-location-marker {

    background:
        transparent;

    border:
        none;

}


.wedding-pin {

    position:
        relative;

    width:
        42px;

    height:
        42px;

    display:
        flex;

    align-items:
        center;

    justify-content:
        center;

    transform:
        rotate(45deg);

    border:
        1px solid
        rgba(
            255,
            250,
            241,
            .95
        );

    border-radius:
        50%
        50%
        50%
        0;

    background:
        #9e8158;

    box-shadow:
        0 7px 18px
        rgba(
            60,
            40,
            20,
            .30);

}


.wedding-pin-inner {

    width:
        27px;

    height:
        27px;

    display:
        flex;

    align-items:
        center;

    justify-content:
        center;

    transform:
        rotate(-45deg);

    border-radius:
        50%;

    background:
        #faf6ef;

    color:
        #9e8158;

    font-family:
        Georgia,
        serif;

    font-size:
        12px;

}


/* =========================================================
   MAP POPUP
========================================================= */

.wedding-popup {

    min-width:
        170px;

    padding:
        3px 5px 5px;

    text-align:
        center;

}


.wedding-popup-event {

    margin-bottom:
        5px;

    color:
        #a07843;

    font-family:
        Arial,
        sans-serif;

    font-size:
        8px;

    font-weight:
        600;

    letter-spacing:
        .18em;

}


.wedding-popup-venue {

    color:
        #624530;

    font-family:
        Georgia,
        "Times New Roman",
        serif;

    font-size:
        14px;

    line-height:
        1.4;

}


.wedding-popup-coordinate {

    margin-top:
        6px;

    color:
        #9b8064;

    font-family:
        Arial,
        sans-serif;

    font-size:
        7px;

}


.location-map
.leaflet-popup-content-wrapper {

    padding:
        7px !important;

    border:
        1px solid
        rgba(
            173,
            131,
            72,
            .40
        ) !important;

    border-radius:
        0 !important;

    background:
        #faf6ef !important;

    box-shadow:
        0 12px 30px
        rgba(
            65,
            42,
            24,
            .17
        ) !important;

}


.location-map
.leaflet-popup-tip {

    background:
        #faf6ef !important;

}


.location-map
.leaflet-popup-close-button {

    color:
        #9e8158 !important;

}


/* =========================================================
   ATTRIBUTION
========================================================= */

.location-map
.leaflet-control-attribution {

    background:
        rgba(
            250,
            246,
            238,
            .82
        ) !important;

    color:
        #80644d !important;

    font-size:
        7px !important;

}


.location-map
.leaflet-control-attribution a {

    color:
        #76583c !important;

}


/* =========================================================
   LOADING
========================================================= */

.location-map-loading {

    position:
        absolute;

    inset:
        0;

    z-index:
        1000;

    display:
        flex;

    align-items:
        center;

    justify-content:
        center;

    background:
        linear-gradient(
            145deg,
            #e7d8c2,
            #d8c4a6
        );

    transition:
        opacity .35s ease;

}


.location-map-loading-inner {

    display:
        flex;

    flex-direction:
        column;

    align-items:
        center;

    gap:
        9px;

    color:
        #80644d;

    font-family:
        Arial,
        sans-serif;

    font-size:
        8px;

    font-weight:
        600;

    letter-spacing:
        .25em;

}


.location-map-loading-icon {

    display:
        flex;

    align-items:
        center;

    justify-content:
        center;

    width:
        44px;

    height:
        44px;

    border:
        1px solid
        rgba(
            156,
            112,
            58,
            .50
        );

    border-radius:
        999px;

    color:
        #8f6737;

    font-family:
        Georgia,
        serif;

    font-size:
        21px;

}


/* =========================================================
   CONTENT
========================================================= */

.location-content {

    display:
        flex;

    flex:
        1;

    flex-direction:
        column;

    padding:
        31px
        30px
        30px;

    text-align:
        center;

}


.location-event-label {

    margin:
        0;

    color:
        #a07843;

    font-family:
        Arial,
        sans-serif;

    font-size:
        8px;

    font-weight:
        600;

    letter-spacing:
        .36em;

}


.location-venue {

    margin:
        14px
        auto
        0;

    max-width:
        330px;

    color:
        #624530;

    font-family:
        Georgia,
        "Times New Roman",
        serif;

    font-size:
        23px;

    font-weight:
        400;

    line-height:
        1.45;

    transition:
        color .4s ease,
        letter-spacing .4s ease;

}


.location-card:hover
.location-venue {

    color:
        #9b713c;

    letter-spacing:
        .015em;

}


/* =========================================================
   DIVIDER
========================================================= */

.location-divider {

    display:
        flex;

    align-items:
        center;

    justify-content:
        center;

    gap:
        9px;

    margin:
        19px
        auto
        0;

}


.location-divider span {

    width:
        28px;

    height:
        1px;

    background:
        rgba(
            164,
            120,
            62,
            .42
        );

}


.location-divider b {

    color:
        #b88a4a;

    font-family:
        Georgia,
        serif;

    font-size:
        9px;

    font-weight:
        400;

}


/* =========================================================
   ADDRESS
========================================================= */

.location-address {

    display:
        flex;

    flex-direction:
        column;

    align-items:
        center;

    margin-top:
        20px;

}


.location-address-icon {

    display:
        flex;

    align-items:
        center;

    justify-content:
        center;

    width:
        28px;

    height:
        28px;

    border:
        1px solid
        rgba(
            164,
            120,
            62,
            .35
        );

    border-radius:
        999px;

    color:
        #9b713c;

    font-family:
        Georgia,
        serif;

    font-size:
        14px;

}


.location-address p {

    max-width:
        340px;

    margin:
        11px
        auto
        0;

    color:
        #80644d;

    white-space:
        pre-line;

    font-family:
        Arial,
        sans-serif;

    font-size:
        12px;

    line-height:
        1.85;

}


/* =========================================================
   ACTION
========================================================= */

.location-action {

    display:
        flex;

    min-height:
        58px;

    align-items:
        flex-end;

    justify-content:
        center;

    margin-top:
        auto;

    padding-top:
        27px;

}


.location-button {

    display:
        inline-flex;

    align-items:
        center;

    gap:
        15px;

    padding:
        12px
        22px;

    border:
        1px solid
        rgba(
            123,
            87,
            48,
            .62
        );

    background:
        transparent;

    color:
        #6b4b35;

    font-family:
        Arial,
        sans-serif;

    font-size:
        9px;

    font-weight:
        600;

    letter-spacing:
        .20em;

    text-decoration:
        none;

    transition:
        transform .45s ease,
        background .45s ease,
        color .45s ease,
        box-shadow .45s ease,
        border-color .45s ease;

}


.location-button:hover {

    transform:
        translateY(-3px);

    border-color:
        #765238;

    background:
        #765238;

    color:
        #fff8ed;

    box-shadow:
        0 12px 26px
        rgba(
            87,
            54,
            31,
            .17
        );

}


.location-button-arrow {

    font-family:
        Georgia,
        serif;

    font-size:
        15px;

    transition:
        transform .45s ease;

}


.location-button:hover
.location-button-arrow {

    transform:
        translateX(4px);

}


/* =========================================================
   BOTTOM
========================================================= */

.location-bottom {

    margin-top:
        60px;

    text-align:
        center;

    opacity:
        0;

    transform:
        translateY(15px);

    animation:
        locationBottomIn
        1s
        ease-out
        1s
        forwards;

}


.location-bottom-ornament {

    display:
        flex;

    align-items:
        center;

    justify-content:
        center;

    gap:
        15px;

}


.location-bottom-ornament span {

    width:
        54px;

    height:
        1px;

    background:
        linear-gradient(
            90deg,
            transparent,
            rgba(
                164,
                120,
                62,
                .55
            )
        );

}


.location-bottom-ornament
span:last-child {

    background:
        linear-gradient(
            90deg,
            rgba(
                164,
                120,
                62,
                .55
            ),
            transparent
        );

}


.location-bottom-ornament b {

    color:
        #a27a45;

    font-family:
        Georgia,
        serif;

    font-size:
        19px;

    font-weight:
        400;

}


.location-bottom p {

    margin:
        16px 0 0;

    color:
        #a27a45;

    font-family:
        Arial,
        sans-serif;

    font-size:
        8px;

    letter-spacing:
        .34em;

}


/* =========================================================
   ANIMATIONS
========================================================= */

@keyframes locationHeaderIn {

    from {

        opacity:
            0;

        transform:
            translateY(24px);

    }

    to {

        opacity:
            1;

        transform:
            translateY(0);

    }

}


@keyframes locationCardIn {

    from {

        opacity:
            0;

        transform:
            translateY(35px)
            scale(.975);

    }

    to {

        opacity:
            1;

        transform:
            translateY(0)
            scale(1);

    }

}


@keyframes locationBottomIn {

    from {

        opacity:
            0;

        transform:
            translateY(15px);

    }

    to {

        opacity:
            1;

        transform:
            translateY(0);

    }

}


@keyframes locationGlowOne {

    from {

        transform:
            translate3d(
                0,
                0,
                0
            )
            scale(1);

    }

    to {

        transform:
            translate3d(
                38px,
                28px,
                0
            )
            scale(1.08);

    }

}


@keyframes locationGlowTwo {

    from {

        transform:
            translate3d(
                0,
                0,
                0
            )
            scale(1);

    }

    to {

        transform:
            translate3d(
                -38px,
                -28px,
                0
            )
            scale(1.08);

    }

}


/* =========================================================
   MOBILE
========================================================= */

@media (max-width: 767px) {

    .location-section {

        padding-top:
            5rem;

        padding-bottom:
            5rem;

    }


    .location-panel {

        padding:
            60px
            22px
            48px;

    }


    .location-panel::before {

        inset:
            9px;

    }


    .location-corner {

        width:
            22px;

        height:
            22px;

    }


    .location-corner-tl,
    .location-corner-tr {

        top:
            18px;

    }


    .location-corner-bl,
    .location-corner-br {

        bottom:
            18px;

    }


    .location-corner-tl,
    .location-corner-bl {

        left:
            18px;

    }


    .location-corner-tr,
    .location-corner-br {

        right:
            18px;

    }


    .location-header {

        margin-bottom:
            48px;

    }


    .location-title {

        font-size:
            2.3rem;

    }


    .location-intro {

        max-width:
            300px;

        font-size:
            12px;

        line-height:
            1.85;

    }


    /*
    |--------------------------------------------------------------------------
    | MOBILE:
    | Dua card menjadi satu per baris
    |--------------------------------------------------------------------------
    */

    .location-grid {

        grid-template-columns:
            1fr;

        gap:
            24px;

    }


    .location-map {

        height:
            215px;

    }

    .location-content {

        padding:
            28px
            24px
            27px;

    }


    .location-venue {

        font-size:
            21px;

    }


    .location-address p {

        font-size:
            11.5px;

    }

}


/* =========================================================
   SMALL MOBILE
========================================================= */

@media (max-width: 400px) {

    .location-panel {

        padding-left:
            18px;

        padding-right:
            18px;

    }


    .location-title {

        font-size:
            2.05rem;

    }


    .location-kicker {

        font-size:
            8px;

        letter-spacing:
            .40em;

    }


    .location-map {

        height:
            195px;

    }

    .location-content {

        padding-left:
            20px;

        padding-right:
            20px;

    }


    .location-button {

        padding:
            11px
            18px;

        font-size:
            8px;

    }


    .location-bottom p {

        font-size:
            7px;

        letter-spacing:
            .27em;

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
    .location-bottom {

        animation:
            none !important;

        transition:
            none !important;

        opacity:
            1;

        transform:
            none;

    }

}

</style>