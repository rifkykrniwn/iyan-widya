<section
    id="gift"
    class="gift-section relative overflow-hidden px-6 py-24 sm:py-28"
>
    {{-- =========================================================
        JAVA HERITAGE BACKGROUND
    ========================================================== --}}

    <img
        src="{{ asset('images/wedding/java-heritage/BACKGROUND.webp') }}"
        alt=""
        aria-hidden="true"
        class="gift-bg"
    >

    <div class="gift-overlay"></div>

    <div class="gift-glow gift-glow-one"></div>
    <div class="gift-glow gift-glow-two"></div>


    {{-- =========================================================
        MAIN CONTENT
    ========================================================== --}}

    <div class="relative z-10 mx-auto w-full max-w-3xl">

        <div class="gift-panel">

            {{-- Decorative corners --}}

            <span class="gift-corner gift-corner-tl"></span>
            <span class="gift-corner gift-corner-tr"></span>
            <span class="gift-corner gift-corner-bl"></span>
            <span class="gift-corner gift-corner-br"></span>


            {{-- =================================================
                HEADER
            ================================================== --}}

            <div class="gift-header">

                <div class="gift-icon-wrap">

                    <div class="gift-icon">

                        <svg
                            viewBox="0 0 64 64"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                d="M10 25h44v29H10V25Z"
                                stroke="currentColor"
                                stroke-width="1.5"
                            />

                            <path
                                d="M8 20h48v8H8v-8Z"
                                stroke="currentColor"
                                stroke-width="1.5"
                            />

                            <path
                                d="M32 20v34"
                                stroke="currentColor"
                                stroke-width="1.5"
                            />

                            <path
                                d="M32 20H20.5a6.5 6.5 0 1 1 6.5-6.5L32 20Z"
                                stroke="currentColor"
                                stroke-width="1.5"
                            />

                            <path
                                d="M32 20h11.5a6.5 6.5 0 1 0-6.5-6.5L32 20Z"
                                stroke="currentColor"
                                stroke-width="1.5"
                            />
                        </svg>

                    </div>

                </div>


                <p class="gift-kicker">
                    WEDDING GIFT
                </p>


                <div class="gift-divider">

                    <span></span>

                    <b>❦</b>

                    <span></span>

                </div>


                <h2 class="gift-title">
                    Kado Digital
                </h2>


                <p class="gift-description">
                    Doa dan kehadiran Anda merupakan hadiah terindah
                    bagi kami. Namun apabila ingin memberikan tanda kasih,
                    Anda dapat mengirimkannya melalui informasi berikut.
                </p>

            </div>


            {{-- =================================================
                GIFT ACTION
            ================================================== --}}

            @if ($wedding->gifts->count())

                <div class="gift-action">

                    <button
                        type="button"
                        id="openGiftButton"
                        class="gift-open-button"
                    >

                        <span class="gift-button-icon">
                            ♡
                        </span>

                        <span>
                            LIHAT KADO DIGITAL
                        </span>

                        <span class="gift-button-arrow">
                            ↓
                        </span>

                    </button>

                    <p class="gift-action-note">
                        Pilih untuk melihat informasi rekening
                        dan alamat pengiriman hadiah.
                    </p>

                </div>

            @endif


            {{-- =================================================
                GIFT CONTENT
            ================================================== --}}

            <div
                id="giftContent"
                class="gift-content"
            >

                <div class="gift-content-header">

                    <div>

                        <p class="gift-content-kicker">
                            TANDA KASIH
                        </p>

                        <h3>
                            Informasi Kado
                        </h3>

                    </div>

                    <button
                        type="button"
                        id="closeGiftButton"
                        class="gift-close-button"
                        aria-label="Tutup informasi hadiah"
                    >
                        ×
                    </button>

                </div>


                <div class="gift-list">

                    @forelse ($wedding->gifts as $gift)

                        {{-- =================================================
                            BANK
                        ================================================== --}}

                        @if ($gift->type === 'bank')

                            <article class="gift-card">

                                <div class="gift-card-top">

                                    <div>

                                        <p class="gift-card-label">
                                            BANK
                                        </p>

                                        <h4 class="gift-bank-name">
                                            {{ $gift->bank_name }}
                                        </h4>

                                    </div>

                                    <div class="gift-card-symbol">
                                        ♡
                                    </div>

                                </div>


                                <div class="gift-card-divider"></div>


                                <div class="gift-account-section">

                                    <p class="gift-field-label">
                                        NOMOR REKENING
                                    </p>

                                    <div class="gift-account-row">

                                        <p
                                            id="account-{{ $gift->id }}"
                                            class="gift-account-number"
                                        >
                                            {{ $gift->account_number }}
                                        </p>

                                        <button
                                            type="button"
                                            onclick="copyGiftText('{{ $gift->account_number }}', this, 'Nomor rekening berhasil disalin.')"
                                            class="gift-copy-button"
                                        >
                                            <span class="copy-default">
                                                SALIN
                                            </span>

                                            <span class="copy-success">
                                                TERSALIN
                                            </span>
                                        </button>

                                    </div>

                                </div>


                                <div class="gift-owner-section">

                                    <p class="gift-field-label">
                                        ATAS NAMA
                                    </p>

                                    <p class="gift-owner-name">
                                        {{ $gift->account_name }}
                                    </p>

                                </div>

                            </article>

                        @endif


                        {{-- =================================================
                            ADDRESS
                        ================================================== --}}

                        @if ($gift->type === 'address')

                            <article class="gift-card">

                                <div class="gift-card-top">

                                    <div>

                                        <p class="gift-card-label">
                                            ALAMAT PENGIRIMAN
                                        </p>

                                        <h4 class="gift-bank-name">
                                            Kirim Hadiah
                                        </h4>

                                    </div>

                                    <div class="gift-card-symbol">
                                        ♡
                                    </div>

                                </div>


                                <div class="gift-card-divider"></div>


                                <div class="gift-address-section">

                                    <p class="gift-field-label">
                                        ALAMAT
                                    </p>

                                    <p
                                        id="address-{{ $gift->id }}"
                                        class="gift-address"
                                    >
                                        {{ $gift->address }}
                                    </p>


                                    <button
                                        type="button"
                                        onclick="copyGiftText(`{{ addslashes($gift->address) }}`, this, 'Alamat berhasil disalin.')"
                                        class="gift-copy-button gift-copy-address"
                                    >
                                        <span class="copy-default">
                                            SALIN ALAMAT
                                        </span>

                                        <span class="copy-success">
                                            TERSALIN
                                        </span>
                                    </button>

                                </div>

                            </article>

                        @endif

                    @empty

                        <div class="gift-empty">

                            <div class="gift-empty-icon">
                                ♡
                            </div>

                            <p class="gift-empty-title">
                                Informasi hadiah belum tersedia.
                            </p>

                            <p class="gift-empty-text">
                                Doa dan kehadiran Anda tetap menjadi
                                hadiah terindah bagi kami.
                            </p>

                        </div>

                    @endforelse

                </div>


                {{-- =================================================
                    CLOSE
                ================================================== --}}

                @if ($wedding->gifts->count())

                    <button
                        type="button"
                        id="closeGiftButtonBottom"
                        class="gift-close-bottom"
                    >
                        TUTUP INFORMASI
                    </button>

                @endif

            </div>


            {{-- =================================================
                BOTTOM ORNAMENT
            ================================================== --}}

            <div class="gift-bottom">

                <div class="gift-bottom-divider">

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


<script>
document.addEventListener('DOMContentLoaded', function () {

    const giftContent =
        document.getElementById('giftContent');

    const openGiftButton =
        document.getElementById('openGiftButton');

    const closeGiftButton =
        document.getElementById('closeGiftButton');

    const closeGiftButtonBottom =
        document.getElementById('closeGiftButtonBottom');


    function openGift() {

        if (!giftContent) {
            return;
        }

        giftContent.classList.add('is-open');

        if (openGiftButton) {
            openGiftButton.classList.add('is-hidden');
        }

        setTimeout(function () {

            giftContent.scrollIntoView({
                behavior: 'smooth',
                block: 'nearest'
            });

        }, 120);

    }


    function closeGift() {

        if (!giftContent) {
            return;
        }

        giftContent.classList.remove('is-open');

        if (openGiftButton) {
            openGiftButton.classList.remove('is-hidden');
        }

    }


    if (openGiftButton) {

        openGiftButton.addEventListener(
            'click',
            openGift
        );

    }


    if (closeGiftButton) {

        closeGiftButton.addEventListener(
            'click',
            closeGift
        );

    }


    if (closeGiftButtonBottom) {

        closeGiftButtonBottom.addEventListener(
            'click',
            closeGift
        );

    }

});


/* =========================================================
   COPY GIFT
========================================================= */

function copyGiftText(text, button, successMessage) {

    function success() {

        if (!button) {
            alert(successMessage);
            return;
        }

        button.classList.add('is-copied');

        clearTimeout(button._copyTimeout);

        button._copyTimeout = setTimeout(function () {

            button.classList.remove('is-copied');

        }, 1800);
    }


    function failed() {

        alert(
            successMessage === 'Nomor rekening berhasil disalin.'
                ? 'Gagal menyalin nomor rekening.'
                : 'Gagal menyalin alamat.'
        );

    }


    if (
        navigator.clipboard &&
        window.isSecureContext
    ) {

        navigator.clipboard
            .writeText(text)
            .then(success)
            .catch(failed);

        return;
    }


    const textarea =
        document.createElement('textarea');

    textarea.value = text;

    textarea.style.position = 'fixed';
    textarea.style.left = '-9999px';
    textarea.style.opacity = '0';

    document.body.appendChild(textarea);

    textarea.focus();
    textarea.select();

    try {

        const copied =
            document.execCommand('copy');

        if (copied) {
            success();
        } else {
            failed();
        }

    } catch (error) {

        failed();

    } finally {

        document.body.removeChild(textarea);
    }
}
</script>


<style>
/* =========================================================
   SECTION
========================================================= */

.gift-section {
    position: relative;

    isolation: isolate;

    min-height: 100vh;
}


/* =========================================================
   BACKGROUND
========================================================= */

.gift-bg {
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

.gift-overlay {
    position: absolute;

    inset: 0;

    z-index: -3;

    background:
        linear-gradient(
            180deg,
            rgba(247, 238, 225, .94) 0%,
            rgba(239, 224, 204, .87) 50%,
            rgba(224, 204, 178, .95) 100%
        );
}

.gift-overlay::after {
    content: "";

    position: absolute;

    inset: 0;

    background:
        radial-gradient(
            circle at 50% 22%,
            rgba(255, 251, 244, .72),
            transparent 42%
        );
}


/* =========================================================
   GLOW
========================================================= */

.gift-glow {
    position: absolute;

    z-index: -2;

    width: 400px;
    height: 400px;

    border-radius: 999px;

    background:
        rgba(255, 250, 240, .30);

    filter: blur(80px);

    pointer-events: none;
}

.gift-glow-one {
    top: -170px;
    left: -170px;

    animation:
        giftGlowOne
        13s
        ease-in-out
        infinite
        alternate;
}

.gift-glow-two {
    right: -170px;
    bottom: -170px;

    animation:
        giftGlowTwo
        15s
        ease-in-out
        infinite
        alternate;
}

@keyframes giftGlowOne {

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

@keyframes giftGlowTwo {

    from {
        transform:
            translate3d(0, 0, 0)
            scale(1);
    }

    to {
        transform:
            translate3d(-30px, -24px, 0)
            scale(1.08);
    }
}


/* =========================================================
   PANEL
========================================================= */

.gift-panel {
    position: relative;

    width: 100%;

    padding:
        70px
        65px
        55px;

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
        0 28px 80px rgba(76, 48, 29, .17),
        inset 0 0 0 1px rgba(255, 255, 255, .60);

    backdrop-filter: blur(3px);
    -webkit-backdrop-filter: blur(3px);
}

.gift-panel::before {
    content: "";

    position: absolute;

    inset: 12px;

    border:
        1px solid
        rgba(173, 131, 72, .18);

    pointer-events: none;
}


/* =========================================================
   CORNERS
========================================================= */

.gift-corner {
    position: absolute;

    width: 42px;
    height: 42px;

    pointer-events: none;
}

.gift-corner::before,
.gift-corner::after {
    content: "";

    position: absolute;

    background: #b88a4a;
}

.gift-corner::before {
    width: 100%;
    height: 1px;
}

.gift-corner::after {
    width: 1px;
    height: 100%;
}

.gift-corner-tl {
    top: 24px;
    left: 24px;
}

.gift-corner-tr {
    top: 24px;
    right: 24px;

    transform: scaleX(-1);
}

.gift-corner-bl {
    bottom: 24px;
    left: 24px;

    transform: scaleY(-1);
}

.gift-corner-br {
    right: 24px;
    bottom: 24px;

    transform: scale(-1);
}


/* =========================================================
   HEADER
========================================================= */

.gift-header {
    text-align: center;

    opacity: 0;

    transform:
        translateY(25px);

    animation:
        giftHeaderIn
        1s
        cubic-bezier(.22,1,.36,1)
        .08s
        forwards;
}

@keyframes giftHeaderIn {

    from {
        opacity: 0;

        transform:
            translateY(25px);
    }

    to {
        opacity: 1;

        transform:
            translateY(0);
    }
}


/* =========================================================
   GIFT ICON
========================================================= */

.gift-icon-wrap {
    display: flex;

    align-items: center;
    justify-content: center;
}

.gift-icon {
    display: flex;

    align-items: center;
    justify-content: center;

    width: 76px;
    height: 76px;

    border:
        1px solid
        rgba(173, 131, 72, .55);

    border-radius: 50%;

    background:
        rgba(255, 250, 242, .72);

    color: #b88a4a;

    box-shadow:
        0 12px 28px rgba(76, 48, 29, .08),
        inset 0 0 0 6px rgba(255, 255, 255, .32);
}

.gift-icon svg {
    width: 47px;
    height: 47px;
}


/* =========================================================
   TYPOGRAPHY
========================================================= */

.gift-kicker {
    margin-top: 22px;

    font-family:
        Arial,
        Helvetica,
        sans-serif;

    font-size: 9px;
    font-weight: 600;

    letter-spacing: .46em;

    color: #9b713c;

    text-transform: uppercase;
}

.gift-divider {
    display: flex;

    align-items: center;
    justify-content: center;

    gap: 13px;

    margin-top: 17px;
}

.gift-divider span {
    width: 42px;
    height: 1px;

    background:
        linear-gradient(
            90deg,
            transparent,
            rgba(184, 138, 74, .72)
        );
}

.gift-divider span:last-child {
    background:
        linear-gradient(
            90deg,
            rgba(184, 138, 74, .72),
            transparent
        );
}

.gift-divider b {
    font-family:
        Georgia,
        "Times New Roman",
        serif;

    font-size: 15px;
    font-weight: 400;

    color: #b88a4a;
}

.gift-title {
    margin-top: 17px;

    font-family:
        Georgia,
        "Times New Roman",
        serif;

    font-size: clamp(34px, 5vw, 46px);
    font-weight: 400;

    line-height: 1.15;

    color: #654735;
}

.gift-description {
    max-width: 500px;

    margin:
        18px
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
   OPEN BUTTON
========================================================= */

.gift-action {
    margin-top: 42px;

    text-align: center;

    opacity: 0;

    transform:
        translateY(20px);

    animation:
        giftActionIn
        .9s
        cubic-bezier(.22,1,.36,1)
        .35s
        forwards;
}

@keyframes giftActionIn {

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

.gift-open-button {
    display: inline-flex;

    align-items: center;
    justify-content: center;

    gap: 13px;

    min-width: 225px;

    padding:
        14px
        22px;

    border:
        1px solid
        #806044;

    background:
        #654735;

    color:
        #fffaf2;

    font-family:
        Arial,
        Helvetica,
        sans-serif;

    font-size: 9px;
    font-weight: 600;

    letter-spacing: .19em;

    cursor: pointer;

    box-shadow:
        0 10px 24px rgba(76, 48, 29, .16);

    transition:
        transform .35s cubic-bezier(.22,1,.36,1),
        background .3s ease,
        box-shadow .3s ease;
}

.gift-open-button:hover {
    background:
        #76543d;

    transform:
        translateY(-3px);

    box-shadow:
        0 15px 30px rgba(76, 48, 29, .22);
}

.gift-open-button.is-hidden {
    opacity: 0;
    pointer-events: none;

    transform:
        translateY(-5px);
}

.gift-button-icon {
    font-family:
        Georgia,
        "Times New Roman",
        serif;

    font-size: 16px;

    color: #d4aa6d;
}

.gift-button-arrow {
    font-size: 12px;

    color: #d4aa6d;

    transition:
        transform .3s ease;
}

.gift-open-button:hover .gift-button-arrow {
    transform:
        translateY(3px);
}

.gift-action-note {
    max-width: 340px;

    margin:
        13px
        auto
        0;

    font-family:
        Georgia,
        "Times New Roman",
        serif;

    font-size: 11px;

    line-height: 1.7;

    color: #9b8067;
}


/* =========================================================
   GIFT CONTENT
========================================================= */

.gift-content {
    max-height: 0;

    margin-top: 0;

    overflow: hidden;

    opacity: 0;

    transform:
        translateY(18px);

    transition:
        max-height .8s cubic-bezier(.22,1,.36,1),
        opacity .45s ease,
        transform .65s cubic-bezier(.22,1,.36,1),
        margin-top .6s ease;
}

.gift-content.is-open {
    max-height: 3000px;

    margin-top: 42px;

    opacity: 1;

    transform:
        translateY(0);
}


/* =========================================================
   CONTENT HEADER
========================================================= */

.gift-content-header {
    display: flex;

    align-items: center;
    justify-content: space-between;

    gap: 20px;

    padding-bottom: 17px;

    border-bottom:
        1px solid
        rgba(173, 131, 72, .28);
}

.gift-content-kicker {
    margin: 0;

    font-family:
        Arial,
        Helvetica,
        sans-serif;

    font-size: 8px;
    font-weight: 600;

    letter-spacing: .3em;

    color: #9b713c;
}

.gift-content-header h3 {
    margin-top: 6px;

    font-family:
        Georgia,
        "Times New Roman",
        serif;

    font-size: 22px;
    font-weight: 400;

    color: #654735;
}

.gift-close-button {
    display: flex;

    align-items: center;
    justify-content: center;

    width: 34px;
    height: 34px;

    border:
        1px solid
        rgba(173, 131, 72, .40);

    border-radius: 50%;

    background:
        rgba(255, 250, 242, .70);

    font-family:
        Arial,
        Helvetica,
        sans-serif;

    font-size: 20px;
    font-weight: 300;

    color: #80644d;

    cursor: pointer;

    transition:
        background .3s ease,
        color .3s ease,
        transform .3s ease;
}

.gift-close-button:hover {
    background: #654735;

    color: #fffaf2;

    transform:
        rotate(90deg);
}


/* =========================================================
   LIST
========================================================= */

.gift-list {
    display: flex;

    flex-direction: column;

    gap: 17px;

    margin-top: 20px;
}


/* =========================================================
   CARD
========================================================= */

.gift-card {
    position: relative;

    padding:
        27px
        28px;

    background:
        linear-gradient(
            135deg,
            rgba(255, 251, 245, .95),
            rgba(248, 238, 222, .91)
        );

    border:
        1px solid
        rgba(173, 131, 72, .40);

    box-shadow:
        0 12px 32px rgba(76, 48, 29, .07),
        inset 0 0 0 1px rgba(255, 255, 255, .55);
}

.gift-card::before {
    content: "";

    position: absolute;

    inset: 7px;

    border:
        1px solid
        rgba(173, 131, 72, .11);

    pointer-events: none;
}

.gift-card-top {
    position: relative;
    z-index: 2;

    display: flex;

    align-items: flex-start;
    justify-content: space-between;

    gap: 15px;
}

.gift-card-label {
    margin: 0;

    font-family:
        Arial,
        Helvetica,
        sans-serif;

    font-size: 8px;
    font-weight: 600;

    letter-spacing: .3em;

    color: #9b713c;
}

.gift-bank-name {
    margin-top: 8px;

    font-family:
        Georgia,
        "Times New Roman",
        serif;

    font-size: 21px;
    font-weight: 400;

    color: #654735;
}

.gift-card-symbol {
    display: flex;

    align-items: center;
    justify-content: center;

    flex-shrink: 0;

    width: 38px;
    height: 38px;

    border:
        1px solid
        rgba(184, 138, 74, .38);

    border-radius: 50%;

    background:
        rgba(255, 250, 242, .72);

    font-family:
        Georgia,
        "Times New Roman",
        serif;

    font-size: 16px;

    color: #b88a4a;
}

.gift-card-divider {
    position: relative;
    z-index: 2;

    width: 100%;
    height: 1px;

    margin:
        23px
        0
        20px;

    background:
        linear-gradient(
            90deg,
            transparent,
            rgba(173, 131, 72, .28),
            transparent
        );
}


/* =========================================================
   FIELDS
========================================================= */

.gift-field-label {
    margin: 0;

    font-family:
        Arial,
        Helvetica,
        sans-serif;

    font-size: 8px;
    font-weight: 600;

    letter-spacing: .17em;

    color: #9b8067;
}

.gift-account-section,
.gift-owner-section,
.gift-address-section {
    position: relative;
    z-index: 2;
}

.gift-owner-section {
    margin-top: 21px;
}

.gift-account-row {
    display: flex;

    align-items: center;

    gap: 12px;

    margin-top: 8px;
}

.gift-account-number {
    margin: 0;

    font-family:
        Georgia,
        "Times New Roman",
        serif;

    font-size: clamp(17px, 3vw, 22px);

    letter-spacing: .09em;

    color: #654735;

    overflow-wrap: anywhere;
}

.gift-owner-name {
    margin-top: 7px;

    font-family:
        Georgia,
        "Times New Roman",
        serif;

    font-size: 14px;

    color: #765a43;
}

.gift-address {
    margin-top: 9px;

    white-space: pre-line;

    font-family:
        Georgia,
        "Times New Roman",
        serif;

    font-size: 14px;

    line-height: 1.9;

    color: #654735;
}


/* =========================================================
   COPY
========================================================= */

.gift-copy-button {
    position: relative;

    flex-shrink: 0;

    display: inline-flex;

    align-items: center;
    justify-content: center;

    min-width: 76px;

    padding:
        8px
        12px;

    border:
        1px solid
        rgba(155, 113, 60, .52);

    background:
        rgba(255, 250, 242, .72);

    font-family:
        Arial,
        Helvetica,
        sans-serif;

    font-size: 8px;
    font-weight: 600;

    letter-spacing: .14em;

    color: #80644d;

    cursor: pointer;

    transition:
        background .3s ease,
        color .3s ease,
        transform .3s ease;
}

.gift-copy-button:hover {
    background:
        #654735;

    color:
        #fffaf2;

    transform:
        translateY(-1px);
}

.copy-success {
    display: none;
}

.gift-copy-button.is-copied {
    background:
        #b88a4a;

    border-color:
        #b88a4a;

    color:
        #fffaf2;
}

.gift-copy-button.is-copied .copy-default {
    display: none;
}

.gift-copy-button.is-copied .copy-success {
    display: inline;
}

.gift-copy-address {
    margin-top: 17px;
}


/* =========================================================
   EMPTY
========================================================= */

.gift-empty {
    padding:
        45px
        25px;

    text-align: center;

    background:
        rgba(255, 250, 242, .45);

    border:
        1px dashed
        rgba(173, 131, 72, .45);
}

.gift-empty-icon {
    display: flex;

    align-items: center;
    justify-content: center;

    width: 52px;
    height: 52px;

    margin: 0 auto;

    border:
        1px solid
        rgba(173, 131, 72, .40);

    border-radius: 50%;

    font-family:
        Georgia,
        "Times New Roman",
        serif;

    font-size: 20px;

    color: #b88a4a;
}

.gift-empty-title {
    margin-top: 17px;

    font-family:
        Georgia,
        "Times New Roman",
        serif;

    font-size: 15px;

    color: #654735;
}

.gift-empty-text {
    margin-top: 7px;

    font-family:
        Georgia,
        "Times New Roman",
        serif;

    font-size: 12px;

    line-height: 1.8;

    color: #8b735e;
}


/* =========================================================
   CLOSE BOTTOM
========================================================= */

.gift-close-bottom {
    display: block;

    margin:
        24px
        auto
        0;

    padding:
        10px
        18px;

    border:
        1px solid
        rgba(155, 113, 60, .42);

    background:
        transparent;

    font-family:
        Arial,
        Helvetica,
        sans-serif;

    font-size: 8px;
    font-weight: 600;

    letter-spacing: .18em;

    color: #80644d;

    cursor: pointer;

    transition:
        background .3s ease,
        color .3s ease;
}

.gift-close-bottom:hover {
    background:
        #654735;

    color:
        #fffaf2;
}


/* =========================================================
   BOTTOM ORNAMENT
========================================================= */

.gift-bottom {
    margin-top: 48px;

    text-align: center;
}

.gift-bottom-divider {
    display: flex;

    align-items: center;
    justify-content: center;

    gap: 13px;
}

.gift-bottom-divider span {
    width: 45px;
    height: 1px;

    background:
        linear-gradient(
            90deg,
            transparent,
            rgba(173, 131, 72, .55)
        );
}

.gift-bottom-divider span:last-child {
    background:
        linear-gradient(
            90deg,
            rgba(173, 131, 72, .55),
            transparent
        );
}

.gift-bottom-divider b {
    font-family:
        Georgia,
        "Times New Roman",
        serif;

    font-size: 16px;
    font-weight: 400;

    color: #b88a4a;
}

.gift-bottom p {
    margin-top: 13px;

    font-family:
        Arial,
        Helvetica,
        sans-serif;

    font-size: 8px;
    font-weight: 600;

    letter-spacing: .36em;

    color: #9b8067;
}


/* =========================================================
   MOBILE
========================================================= */

@media (max-width: 768px) {

    .gift-section {
        padding:
            70px
            18px;
    }

    .gift-panel {
        padding:
            58px
            22px
            45px;
    }

    .gift-panel::before {
        inset: 9px;
    }

    .gift-corner {
        width: 30px;
        height: 30px;
    }

    .gift-corner-tl {
        top: 18px;
        left: 18px;
    }

    .gift-corner-tr {
        top: 18px;
        right: 18px;
    }

    .gift-corner-bl {
        bottom: 18px;
        left: 18px;
    }

    .gift-corner-br {
        right: 18px;
        bottom: 18px;
    }

    .gift-icon {
        width: 68px;
        height: 68px;
    }

    .gift-icon svg {
        width: 42px;
        height: 42px;
    }

    .gift-title {
        font-size: 31px;
    }

    .gift-description {
        font-size: 13px;
        line-height: 1.85;
    }

    .gift-open-button {
        width: 100%;

        min-width: 0;
    }

    .gift-card {
        padding:
            25px
            21px;
    }

    .gift-account-row {
        align-items: flex-start;

        flex-direction: column;

        gap: 11px;
    }

    .gift-account-number {
        font-size: 17px;
    }

    .gift-copy-button {
        min-width: 84px;
    }

    .gift-address {
        font-size: 13px;
        line-height: 1.85;
    }
}


/* =========================================================
   SMALL MOBILE
========================================================= */

@media (max-width: 420px) {

    .gift-section {
        padding:
            58px
            12px;
    }

    .gift-panel {
        padding:
            52px
            15px
            40px;
    }

    .gift-kicker {
        font-size: 8px;

        letter-spacing: .38em;
    }

    .gift-title {
        font-size: 28px;
    }

    .gift-description {
        font-size: 12px;
    }

    .gift-card {
        padding:
            23px
            17px;
        }

    .gift-card-label {
        font-size: 7px;
    }

    .gift-bank-name {
        font-size: 18px;
    }

    .gift-card-symbol {
        width: 34px;
        height: 34px;

        font-size: 14px;
    }

    .gift-account-number {
        font-size: 15px;

        letter-spacing: .06em;
    }

    .gift-owner-name {
        font-size: 13px;
    }

    .gift-address {
        font-size: 12px;
    }
}


/* =========================================================
   REDUCED MOTION
========================================================= */

@media (prefers-reduced-motion: reduce) {

    .gift-glow-one,
    .gift-glow-two,
    .gift-header,
    .gift-action {

        animation: none !important;

        opacity: 1;

        transform: none;
    }

    .gift-content,
    .gift-open-button,
    .gift-close-button,
    .gift-copy-button {

        transition: none !important;
    }
}
</style>