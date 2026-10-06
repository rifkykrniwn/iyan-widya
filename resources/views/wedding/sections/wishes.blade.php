<section
    id="wishes"
    class="wishes-section relative overflow-hidden px-6 py-24 sm:py-28"
>
    {{-- =========================================================
        JAVA HERITAGE BACKGROUND
    ========================================================== --}}

    <img
        src="{{ asset('images/wedding/java-heritage/BACKGROUND.webp') }}"
        alt=""
        aria-hidden="true"
        class="wishes-bg"
    >

    <div class="wishes-overlay"></div>

    <div class="wishes-glow wishes-glow-one"></div>
    <div class="wishes-glow wishes-glow-two"></div>


    {{-- =========================================================
        MAIN CONTENT
    ========================================================== --}}

    <div class="relative z-10 mx-auto w-full max-w-4xl">

        <div class="wishes-panel">

            {{-- Decorative corners --}}

            <span class="wishes-corner wishes-corner-tl"></span>
            <span class="wishes-corner wishes-corner-tr"></span>
            <span class="wishes-corner wishes-corner-bl"></span>
            <span class="wishes-corner wishes-corner-br"></span>


            {{-- =================================================
                HEADER
            ================================================== --}}

            <div class="wishes-header text-center">

                <p class="wishes-kicker">
                    WISHES
                </p>

                <div class="wishes-divider">
                    <span></span>
                    <b>❦</b>
                    <span></span>
                </div>

                <h2 class="wishes-title">
                    Ucapan &amp; Doa
                </h2>

                <p class="wishes-description">
                    Doa dan ucapan dari keluarga serta sahabat
                    menjadi bagian indah dalam perjalanan kami.
                </p>

            </div>


            {{-- =================================================
                WISHES LIST
            ================================================== --}}

            <div class="wishes-list">

                @forelse (
                    $wedding->rsvps
                        ->whereNotNull('message')
                        ->where('message', '!=', '')
                        ->sortByDesc('created_at')
                    as $rsvp
                )

                    <article
                        class="wish-card"
                        style="--wish-delay: {{ $loop->index * 0.09 + 0.12 }}s;"
                    >

                        {{-- Decorative quote --}}

                        <div class="wish-quote-mark" aria-hidden="true">
                            ”
                        </div>


                        {{-- Top ornament --}}

                        <div class="wish-topline">
                            <span></span>
                            <b>❦</b>
                            <span></span>
                        </div>


                        {{-- Message --}}

                        <div class="wish-message-wrap">

                            <span class="wish-open-quote" aria-hidden="true">
                                “
                            </span>

                            <p class="wish-message">
                                {{ $rsvp->message }}
                            </p>

                            <span class="wish-close-quote" aria-hidden="true">
                                ”
                            </span>

                        </div>


                        {{-- Divider --}}

                        <div class="wish-divider"></div>


                        {{-- Bottom information --}}

                        <div class="wish-meta">

                            {{-- Name --}}

                            <div class="wish-author">

                                <p class="wish-name">
                                    {{ $rsvp->name }}
                                </p>

                                @if ($rsvp->created_at)
                                    <p class="wish-date">
                                        {{ $rsvp->created_at->format('d M Y') }}
                                    </p>
                                @endif

                            </div>


                            {{-- Attendance --}}

                            <div class="wish-attendance">

                                @if ($rsvp->attendance === 'hadir')

                                    <span class="attendance-badge attendance-present">
                                        <span class="attendance-dot"></span>
                                        AKAN HADIR
                                    </span>

                                @elseif ($rsvp->attendance === 'tidak_hadir')

                                    <span class="attendance-badge attendance-absent">
                                        <span class="attendance-dot"></span>
                                        TIDAK HADIR
                                    </span>

                                @else

                                    <span class="attendance-badge attendance-unsure">
                                        <span class="attendance-dot"></span>
                                        MASIH RAGU
                                    </span>

                                @endif

                            </div>

                        </div>

                    </article>

                @empty

                    {{-- =================================================
                        EMPTY STATE
                    ================================================== --}}

                    <div class="wish-empty">

                        <div class="wish-empty-ornament">
                            <span>♡</span>
                        </div>

                        <div class="wish-empty-divider">
                            <span></span>
                            <b>❦</b>
                            <span></span>
                        </div>

                        <p class="wish-empty-title">
                            Belum ada ucapan.
                        </p>

                        <p class="wish-empty-text">
                            Jadilah yang pertama memberikan doa
                            untuk kedua mempelai.
                        </p>

                    </div>

                @endforelse

            </div>


            {{-- =================================================
                BOTTOM ORNAMENT
            ================================================== --}}

            <div class="wishes-bottom">

                <div class="wishes-bottom-divider">
                    <span></span>
                    <b>♡</b>
                    <span></span>
                </div>

                <p>
                    WITH LOVE
                </p>

            </div>

        </div>

    </div>
</section>


<style>
/* =========================================================
   SECTION
========================================================= */

.wishes-section {
    position: relative;
    isolation: isolate;
    min-height: 100vh;
}


/* =========================================================
   BACKGROUND IMAGE
========================================================= */

.wishes-bg {
    position: absolute;
    inset: 0;
    z-index: -4;

    width: 100%;
    height: 100%;

    object-fit: cover;
    object-position: center;

    pointer-events: none;
    user-select: none;
}

.wishes-overlay {
    position: absolute;
    inset: 0;
    z-index: -3;

    background:
        linear-gradient(
            180deg,
            rgba(247, 238, 225, .93) 0%,
            rgba(239, 224, 204, .86) 48%,
            rgba(224, 204, 178, .94) 100%
        );
}

.wishes-overlay::after {
    content: "";
    position: absolute;
    inset: 0;

    background:
        radial-gradient(
            circle at 50% 18%,
            rgba(255, 251, 244, .68),
            transparent 38%
        );
}


/* =========================================================
   SOFT DECORATIVE GLOW
========================================================= */

.wishes-glow {
    position: absolute;
    z-index: -2;

    width: 420px;
    height: 420px;

    border-radius: 999px;

    background: rgba(255, 250, 240, .28);
    filter: blur(80px);

    pointer-events: none;
}

.wishes-glow-one {
    top: -180px;
    left: -170px;

    animation:
        wishesGlowOne
        13s
        ease-in-out
        infinite
        alternate;
}

.wishes-glow-two {
    right: -180px;
    bottom: -180px;

    animation:
        wishesGlowTwo
        15s
        ease-in-out
        infinite
        alternate;
}

@keyframes wishesGlowOne {
    from {
        transform:
            translate3d(0, 0, 0)
            scale(1);
    }

    to {
        transform:
            translate3d(30px, 24px, 0)
            scale(1.08);
    }
}

@keyframes wishesGlowTwo {
    from {
        transform:
            translate3d(0, 0, 0)
            scale(1);
    }

    to {
        transform:
            translate3d(-28px, -24px, 0)
            scale(1.08);
    }
}


/* =========================================================
   MAIN PANEL
========================================================= */

.wishes-panel {
    position: relative;

    width: 100%;

    padding:
        72px
        72px
        58px;

    background:
        linear-gradient(
            135deg,
            rgba(255, 250, 242, .94),
            rgba(247, 236, 219, .90)
        );

    border: 1px solid rgba(173, 131, 72, .58);

    box-shadow:
        0 28px 80px rgba(76, 48, 29, .17),
        inset 0 0 0 1px rgba(255, 255, 255, .60);

    backdrop-filter: blur(3px);
    -webkit-backdrop-filter: blur(3px);
}

.wishes-panel::before {
    content: "";

    position: absolute;
    inset: 12px;

    border: 1px solid rgba(173, 131, 72, .18);

    pointer-events: none;
}


/* =========================================================
   CORNER ORNAMENTS
========================================================= */

.wishes-corner {
    position: absolute;

    width: 42px;
    height: 42px;

    pointer-events: none;
}

.wishes-corner::before,
.wishes-corner::after {
    content: "";

    position: absolute;

    background: #b88a4a;
}

.wishes-corner::before {
    width: 100%;
    height: 1px;
}

.wishes-corner::after {
    width: 1px;
    height: 100%;
}

.wishes-corner-tl {
    top: 24px;
    left: 24px;
}

.wishes-corner-tr {
    top: 24px;
    right: 24px;
    transform: scaleX(-1);
}

.wishes-corner-bl {
    bottom: 24px;
    left: 24px;
    transform: scaleY(-1);
}

.wishes-corner-br {
    right: 24px;
    bottom: 24px;
    transform: scale(-1);
}


/* =========================================================
   HEADER
========================================================= */

.wishes-header {
    opacity: 0;

    transform:
        translateY(24px);

    animation:
        wishesHeaderIn
        1s
        cubic-bezier(.22,1,.36,1)
        .08s
        forwards;
}

@keyframes wishesHeaderIn {
    from {
        opacity: 0;

        transform:
            translateY(24px);
    }

    to {
        opacity: 1;

        transform:
            translateY(0);
    }
}

.wishes-kicker {
    margin: 0;

    font-family:
        Arial,
        Helvetica,
        sans-serif;

    font-size: 10px;
    font-weight: 600;

    letter-spacing: .46em;

    color: #9b713c;

    text-transform: uppercase;
}

.wishes-divider {
    display: flex;

    align-items: center;
    justify-content: center;

    gap: 13px;

    margin-top: 19px;
}

.wishes-divider span {
    width: 42px;
    height: 1px;

    background:
        linear-gradient(
            90deg,
            transparent,
            rgba(184, 138, 74, .72)
        );
}

.wishes-divider span:last-child {
    background:
        linear-gradient(
            90deg,
            rgba(184, 138, 74, .72),
            transparent
        );
}

.wishes-divider b {
    color: #b88a4a;

    font-family: Georgia, "Times New Roman", serif;

    font-size: 15px;
    font-weight: 400;

    line-height: 1;
}

.wishes-title {
    margin-top: 17px;

    font-family:
        Georgia,
        "Times New Roman",
        serif;

    font-size: clamp(32px, 5vw, 44px);
    font-weight: 400;

    line-height: 1.15;

    letter-spacing: .015em;

    color: #654735;
}

.wishes-description {
    max-width: 470px;

    margin:
        17px
        auto
        0;

    font-family:
        Georgia,
        "Times New Roman",
        serif;

    font-size: 14px;

    line-height: 1.9;

    color: #80644d;
}


/* =========================================================
   WISHES LIST
========================================================= */

.wishes-list {
    display: flex;

    flex-direction: column;

    gap: 20px;

    margin-top: 50px;
}


/* =========================================================
   WISH CARD
========================================================= */

.wish-card {
    position: relative;

    overflow: hidden;

    padding: 30px 32px 27px;

    background:
        linear-gradient(
            135deg,
            rgba(255, 251, 245, .94),
            rgba(248, 238, 222, .90)
        );

    border:
        1px solid
        rgba(173, 131, 72, .38);

    box-shadow:
        0 15px 38px rgba(76, 48, 29, .08),
        inset 0 0 0 1px rgba(255, 255, 255, .58);

    opacity: 0;

    transform:
        translateY(25px)
        scale(.985);

    animation:
        wishCardIn
        .85s
        cubic-bezier(.22,1,.36,1)
        var(--wish-delay)
        forwards;

    transition:
        transform .5s cubic-bezier(.22,1,.36,1),
        box-shadow .5s ease,
        border-color .5s ease;
}

.wish-card::before {
    content: "";

    position: absolute;

    inset: 7px;

    border:
        1px solid
        rgba(173, 131, 72, .12);

    pointer-events: none;
}

.wish-card:hover {
    transform:
        translateY(-4px)
        scale(1);

    border-color:
        rgba(173, 131, 72, .58);

    box-shadow:
        0 22px 48px rgba(76, 48, 29, .12),
        inset 0 0 0 1px rgba(255, 255, 255, .70);
}

@keyframes wishCardIn {
    from {
        opacity: 0;

        transform:
            translateY(25px)
            scale(.985);
    }

    to {
        opacity: 1;

        transform:
            translateY(0)
            scale(1);
    }
}


/* =========================================================
   LARGE DECORATIVE QUOTE
========================================================= */

.wish-quote-mark {
    position: absolute;

    top: -8px;
    right: 17px;

    font-family:
        Georgia,
        "Times New Roman",
        serif;

    font-size: 112px;
    font-weight: 400;

    line-height: 1;

    color:
        rgba(184, 138, 74, .10);

    pointer-events: none;
    user-select: none;
}


/* =========================================================
   CARD TOP ORNAMENT
========================================================= */

.wish-topline {
    position: relative;
    z-index: 2;

    display: flex;

    align-items: center;
    justify-content: center;

    gap: 10px;

    margin-bottom: 22px;
}

.wish-topline span {
    width: 30px;
    height: 1px;

    background:
        linear-gradient(
            90deg,
            transparent,
            rgba(184, 138, 74, .55)
        );
}

.wish-topline span:last-child {
    background:
        linear-gradient(
            90deg,
            rgba(184, 138, 74, .55),
            transparent
        );
}

.wish-topline b {
    font-family:
        Georgia,
        "Times New Roman",
        serif;

    font-size: 13px;
    font-weight: 400;

    color: #b88a4a;
}


/* =========================================================
   MESSAGE
========================================================= */

.wish-message-wrap {
    position: relative;
    z-index: 2;

    padding:
        0
        18px;
}

.wish-open-quote,
.wish-close-quote {
    position: absolute;

    font-family:
        Georgia,
        "Times New Roman",
        serif;

    font-size: 30px;
    line-height: 1;

    color: #b88a4a;
}

.wish-open-quote {
    top: -3px;
    left: -2px;
}

.wish-close-quote {
    right: -2px;
    bottom: -7px;
}

.wish-message {
    margin: 0;

    font-family:
        Georgia,
        "Times New Roman",
        serif;

    font-size: 15px;
    font-weight: 400;

    line-height: 2;

    text-align: center;

    color: #654735;

    overflow-wrap: anywhere;
}


/* =========================================================
   CARD DIVIDER
========================================================= */

.wish-divider {
    width: 100%;
    height: 1px;

    margin:
        24px
        0
        20px;

    background:
        linear-gradient(
            90deg,
            transparent,
            rgba(173, 131, 72, .30),
            transparent
        );
}


/* =========================================================
   CARD META
========================================================= */

.wish-meta {
    position: relative;
    z-index: 2;

    display: flex;

    align-items: center;
    justify-content: space-between;

    gap: 18px;
}

.wish-author {
    min-width: 0;
}

.wish-name {
    margin: 0;

    font-family:
        Georgia,
        "Times New Roman",
        serif;

    font-size: 15px;
    font-weight: 600;

    color: #654735;

    overflow-wrap: anywhere;
}

.wish-date {
    margin-top: 5px;

    font-family:
        Arial,
        Helvetica,
        sans-serif;

    font-size: 8px;
    font-weight: 500;

    letter-spacing: .19em;

    color: #9b8067;

    text-transform: uppercase;
}


/* =========================================================
   ATTENDANCE BADGE
========================================================= */

.wish-attendance {
    flex-shrink: 0;
}

.attendance-badge {
    display: inline-flex;

    align-items: center;

    gap: 8px;

    padding:
        8px
        12px;

    border:
        1px solid
        rgba(173, 131, 72, .34);

    background:
        rgba(255, 250, 242, .62);

    font-family:
        Arial,
        Helvetica,
        sans-serif;

    font-size: 8px;
    font-weight: 600;

    letter-spacing: .14em;

    color: #80644d;

    white-space: nowrap;
}

.attendance-dot {
    width: 5px;
    height: 5px;

    border-radius: 50%;

    background: #b88a4a;

    box-shadow:
        0 0 0 3px rgba(184, 138, 74, .10);
}

.attendance-absent .attendance-dot {
    background: #9a8470;

    box-shadow:
        0 0 0 3px rgba(154, 132, 112, .10);
}

.attendance-unsure .attendance-dot {
    background: #aa9174;

    box-shadow:
        0 0 0 3px rgba(170, 145, 116, .10);
}


/* =========================================================
   EMPTY STATE
========================================================= */

.wish-empty {
    position: relative;

    padding:
        58px
        30px;

    text-align: center;

    background:
        rgba(255, 250, 242, .48);

    border:
        1px dashed
        rgba(173, 131, 72, .48);

    animation:
        wishEmptyIn
        .85s
        cubic-bezier(.22,1,.36,1)
        forwards;
}

.wish-empty::before {
    content: "";

    position: absolute;

    inset: 8px;

    border:
        1px solid
        rgba(173, 131, 72, .12);

    pointer-events: none;
}

.wish-empty-ornament {
    position: relative;

    display: flex;

    align-items: center;
    justify-content: center;

    width: 62px;
    height: 62px;

    margin: 0 auto;

    border:
        1px solid
        rgba(173, 131, 72, .45);

    border-radius: 50%;

    background:
        rgba(255, 250, 242, .72);

    box-shadow:
        inset 0 0 0 5px rgba(255, 255, 255, .35);
}

.wish-empty-ornament::before {
    content: "";

    position: absolute;

    inset: 6px;

    border:
        1px solid
        rgba(173, 131, 72, .17);

    border-radius: 50%;
}

.wish-empty-ornament span {
    position: relative;
    z-index: 1;

    font-family:
        Georgia,
        "Times New Roman",
        serif;

    font-size: 23px;

    color: #b88a4a;
}

.wish-empty-divider {
    display: flex;

    align-items: center;
    justify-content: center;

    gap: 10px;

    margin-top: 20px;
}

.wish-empty-divider span {
    width: 30px;
    height: 1px;

    background:
        rgba(173, 131, 72, .40);
}

.wish-empty-divider b {
    font-family:
        Georgia,
        "Times New Roman",
        serif;

    font-size: 13px;
    font-weight: 400;

    color: #b88a4a;
}

.wish-empty-title {
    margin-top: 19px;

    font-family:
        Georgia,
        "Times New Roman",
        serif;

    font-size: 17px;
    font-weight: 400;

    color: #654735;
}

.wish-empty-text {
    max-width: 320px;

    margin:
        8px
        auto
        0;

    font-family:
        Georgia,
        "Times New Roman",
        serif;

    font-size: 13px;

    line-height: 1.8;

    color: #8b735e;
}

@keyframes wishEmptyIn {
    from {
        opacity: 0;

        transform:
            translateY(20px);
    }

    to {
        opacity: 1;

        transform:
            translateY(0);
    }
}


/* =========================================================
   BOTTOM ORNAMENT
========================================================= */

.wishes-bottom {
    margin-top: 52px;

    text-align: center;

    opacity: 0;

    animation:
        wishesBottomIn
        1s
        ease-out
        1s
        forwards;
}

.wishes-bottom-divider {
    display: flex;

    align-items: center;
    justify-content: center;

    gap: 13px;
}

.wishes-bottom-divider span {
    width: 46px;
    height: 1px;

    background:
        linear-gradient(
            90deg,
            transparent,
            rgba(173, 131, 72, .55)
        );
}

.wishes-bottom-divider span:last-child {
    background:
        linear-gradient(
            90deg,
            rgba(173, 131, 72, .55),
            transparent
        );
}

.wishes-bottom-divider b {
    font-family:
        Georgia,
        "Times New Roman",
        serif;

    font-size: 16px;
    font-weight: 400;

    color: #b88a4a;
}

.wishes-bottom p {
    margin-top: 14px;

    font-family:
        Arial,
        Helvetica,
        sans-serif;

    font-size: 8px;
    font-weight: 600;

    letter-spacing: .36em;

    color: #9b8067;
}

@keyframes wishesBottomIn {
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
========================================================= */

@media (max-width: 768px) {

    .wishes-section {
        padding:
            70px
            18px;
    }

    .wishes-panel {
        padding:
            58px
            22px
            46px;
    }

    .wishes-panel::before {
        inset: 9px;
    }

    .wishes-corner {
        width: 30px;
        height: 30px;
    }

    .wishes-corner-tl {
        top: 18px;
        left: 18px;
    }

    .wishes-corner-tr {
        top: 18px;
        right: 18px;
    }

    .wishes-corner-bl {
        bottom: 18px;
        left: 18px;
    }

    .wishes-corner-br {
        right: 18px;
        bottom: 18px;
    }

    .wishes-title {
        font-size: 31px;
    }

    .wishes-description {
        font-size: 13px;
        line-height: 1.85;
    }

    .wishes-list {
        margin-top: 42px;
        gap: 16px;
    }

    .wish-card {
        padding:
            27px
            21px
            23px;
    }

    .wish-message-wrap {
        padding:
            0
            11px;
    }

    .wish-message {
        font-size: 14px;
        line-height: 1.9;
    }

    .wish-meta {
        align-items: flex-start;
        flex-direction: column;
        gap: 13px;
    }

    .wish-attendance {
        width: 100%;
    }

    .attendance-badge {
        padding:
            7px
            11px;

        font-size: 7px;
    }

    .wish-quote-mark {
        right: 6px;

        font-size: 90px;
    }

    .wishes-bottom {
        margin-top: 42px;
    }
}


/* =========================================================
   SMALL MOBILE
========================================================= */

@media (max-width: 420px) {

    .wishes-section {
        padding:
            58px
            12px;
    }

    .wishes-panel {
        padding:
            52px
            15px
            40px;
    }

    .wishes-kicker {
        font-size: 8px;
        letter-spacing: .38em;
    }

    .wishes-title {
        font-size: 28px;
    }

    .wishes-description {
        font-size: 12px;
    }

    .wish-card {
        padding:
            24px
            17px
            21px;
    }

    .wish-message {
        font-size: 13px;
        line-height: 1.85;
    }

    .wish-name {
        font-size: 14px;
    }

    .wish-date {
        font-size: 7px;
    }

    .wish-empty {
        padding:
            48px
            20px;
    }
}


/* =========================================================
   REDUCED MOTION
========================================================= */

@media (prefers-reduced-motion: reduce) {

    .wishes-glow-one,
    .wishes-glow-two,
    .wishes-header,
    .wish-card,
    .wish-empty,
    .wishes-bottom {

        animation: none !important;

        transition: none !important;

        opacity: 1;

        transform: none;
    }
}
</style>