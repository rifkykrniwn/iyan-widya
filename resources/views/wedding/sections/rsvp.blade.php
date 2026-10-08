<section
    id="rsvp"
    class="rsvp-section relative overflow-hidden px-5 py-24 sm:px-6 sm:py-28"
>
    {{-- =========================================
         JAVA HERITAGE BACKGROUND
    ========================================== --}}
    <img
        src="{{ asset('images/wedding/java-heritage/BACKGROUND.webp') }}"
        alt=""
        class="rsvp-background"
    >

    <div class="rsvp-background-overlay"></div>

    <div class="rsvp-glow rsvp-glow-one"></div>
    <div class="rsvp-glow rsvp-glow-two"></div>


    {{-- =========================================
         MAIN CONTENT
    ========================================== --}}
    <div class="relative z-10 mx-auto w-full max-w-2xl">

        <div class="rsvp-panel">

            {{-- Decorative corners --}}
            <span class="rsvp-corner rsvp-corner-tl"></span>
            <span class="rsvp-corner rsvp-corner-tr"></span>
            <span class="rsvp-corner rsvp-corner-bl"></span>
            <span class="rsvp-corner rsvp-corner-br"></span>


            {{-- =========================================
                 HEADER
            ========================================== --}}
            <header class="rsvp-header">

                <p class="rsvp-kicker">
                    RSVP
                </p>

                <div class="rsvp-ornament">
                    <span></span>
                    <b>❦</b>
                    <span></span>
                </div>

                <h2 class="rsvp-title">
                    Konfirmasi Kehadiran
                </h2>

                <p class="rsvp-intro">
                    Mohon konfirmasi kehadiran Anda untuk membantu kami
                    mempersiapkan hari bahagia ini.
                </p>

            </header>


            {{-- =========================================
                 SUCCESS POPUP
            ========================================== --}}
            @if (session('success'))

                <div
                    id="successPopup"
                    class="rsvp-popup fixed inset-0 z-[99999] flex items-center justify-center px-5"
                >

                    <div
                        class="rsvp-popup-backdrop"
                        onclick="
                            document.getElementById('successPopup').remove();
                            document.body.classList.remove('overflow-hidden');
                        "
                    ></div>

                    <div class="rsvp-popup-box">

                        <div class="rsvp-popup-flower">
                            ❦
                        </div>

                        <div class="rsvp-success-icon">
                            <span>✓</span>
                        </div>

                        <p class="rsvp-popup-kicker">
                            RSVP BERHASIL
                        </p>

                        <h3>
                            Terima Kasih
                        </h3>

                        <p class="rsvp-popup-message">
                            Konfirmasi kehadiran dan ucapan Anda
                            telah berhasil dikirim.
                        </p>

                        <div class="rsvp-popup-ornament">
                            <span></span>
                            <b>♡</b>
                            <span></span>
                        </div>

                        <button
                            type="button"
                            onclick="
                                document.getElementById('successPopup').remove();
                                document.body.classList.remove('overflow-hidden');
                            "
                            class="rsvp-popup-close"
                        >
                            TUTUP
                        </button>

                    </div>

                </div>

                <script>
                    document.body.classList.add('overflow-hidden');
                </script>

            @endif


            {{-- =========================================
                 VALIDATION
            ========================================== --}}
            @if ($errors->any())

                <div class="rsvp-error">

                    <div class="rsvp-error-icon">
                        !
                    </div>

                    <div class="rsvp-error-content">

                        <p class="rsvp-error-title">
                            Mohon periksa kembali:
                        </p>

                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>

                    </div>

                </div>

            @endif


            {{-- =========================================
                 RSVP FORM
            ========================================== --}}
            <form
                action="{{ request()->route('guestSlug')
                    ? route('wedding.guest.rsvp', [
                        'guestSlug' => request()->route('guestSlug'),
                    ])
                    : route('wedding.rsvp') }}"
                method="POST"
                class="rsvp-form"
            >

                @csrf


                {{-- =====================================
                     NAME
                ====================================== --}}
                <div class="rsvp-field">

                    <label for="name">
                        NAMA
                    </label>

                    <div class="rsvp-input-wrap">

                        <input
                            id="name"
                            name="name"
                            type="text"
                            value="{{ old('name', $guest->name ?? '') }}"
                            required
                            maxlength="100"
                            placeholder="Masukkan nama Anda"
                            @if(isset($guest)) readonly @endif
                        >

                        @if(isset($guest))

                            <span class="rsvp-input-status">
                                ✓
                            </span>

                        @endif

                    </div>

                </div>


                {{-- =====================================
                     ATTENDANCE
                ====================================== --}}
                <div class="rsvp-field rsvp-field-attendance">

                    <p class="rsvp-field-label">
                        KONFIRMASI KEHADIRAN
                    </p>


                    <div class="attendance-list">


                        {{-- HADIR --}}
                        <label class="attendance-option">

                            <input
                                type="radio"
                                name="attendance"
                                value="hadir"
                                {{ old('attendance') === 'hadir' ? 'checked' : '' }}
                                required
                            >

                            <div class="attendance-card">

                                <div class="attendance-icon">
                                    ✓
                                </div>

                                <div class="attendance-content">

                                    <p>
                                        Saya akan hadir
                                    </p>

                                    <span>
                                        Dengan senang hati hadir di acara
                                    </span>

                                </div>

                                <div class="attendance-check">
                                    ✓
                                </div>

                            </div>

                        </label>


                        {{-- TIDAK HADIR --}}
                        <label class="attendance-option">

                            <input
                                type="radio"
                                name="attendance"
                                value="tidak_hadir"
                                {{ old('attendance') === 'tidak_hadir' ? 'checked' : '' }}
                            >

                            <div class="attendance-card">

                                <div class="attendance-icon">
                                    —
                                </div>

                                <div class="attendance-content">

                                    <p>
                                        Saya tidak dapat hadir
                                    </p>

                                    <span>
                                        Mohon maaf tidak dapat hadir
                                    </span>

                                </div>

                                <div class="attendance-check">
                                    ✓
                                </div>

                            </div>

                        </label>


                        {{-- RAGU --}}
                        <label class="attendance-option">

                            <input
                                type="radio"
                                name="attendance"
                                value="ragu"
                                {{ old('attendance') === 'ragu' ? 'checked' : '' }}
                            >

                            <div class="attendance-card">

                                <div class="attendance-icon">
                                    ?
                                </div>

                                <div class="attendance-content">

                                    <p>
                                        Masih ragu
                                    </p>

                                    <span>
                                        Akan kami informasikan kembali
                                    </span>

                                </div>

                                <div class="attendance-check">
                                    ✓
                                </div>

                            </div>

                        </label>

                    </div>

                </div>


                {{-- =====================================
                     GUEST COUNT
                ====================================== --}}
                <div class="rsvp-field">

                    <label for="guest_count">
                        JUMLAH TAMU
                    </label>

                    <div class="rsvp-select-wrap">

                        <select
                            id="guest_count"
                            name="guest_count"
                            required
                        >

                            @for ($i = 1; $i <= 10; $i++)

                                <option
                                    value="{{ $i }}"
                                    {{ old('guest_count', 1) == $i ? 'selected' : '' }}
                                >
                                    {{ $i }} {{ $i === 1 ? 'orang' : 'orang' }}
                                </option>

                            @endfor

                        </select>

                        <span class="rsvp-select-arrow">
                           ⌄
                        </span>

                    </div>

                </div>


                {{-- =====================================
                     MESSAGE
                ====================================== --}}
                <div class="rsvp-field">

                    <label for="message">
                        UCAPAN
                    </label>

                    <textarea
                        id="message"
                        name="message"
                        rows="5"
                        maxlength="500"
                        placeholder="Tuliskan ucapan dan doa untuk kedua mempelai..."
                    >{{ old('message') }}</textarea>

                    <div class="rsvp-character-count">
                        <span id="messageCount">0</span>
                        <span>/ 500 KARAKTER</span>
                    </div>

                </div>


                {{-- =====================================
                     SUBMIT
                ====================================== --}}
                <button
                    type="submit"
                    class="rsvp-submit"
                >
                    <span>
                        KIRIM RSVP
                    </span>

                    <span class="rsvp-submit-arrow">
                        →
                    </span>
                </button>

            </form>


            {{-- =========================================
                 BOTTOM ORNAMENT
            ========================================== --}}
            <div class="rsvp-bottom">

                <div class="rsvp-bottom-ornament">
                    <span></span>
                    <b>♡</b>
                    <span></span>
                </div>

                <p>
                    TERIMA KASIH ATAS DOA DAN KEHADIRANNYA
                </p>

            </div>

        </div>

    </div>
</section>


<script>
document.addEventListener('DOMContentLoaded', function () {

    const message = document.getElementById('message');
    const messageCount = document.getElementById('messageCount');

    if (message && messageCount) {

        const updateCount = () => {
            messageCount.textContent = message.value.length;
        };

        updateCount();

        message.addEventListener('input', updateCount);
    }

});
</script>


<style>
/* =========================================================
   JAVA HERITAGE RSVP
========================================================= */

.rsvp-section {
    position: relative;
    isolation: isolate;
    min-height: 100vh;
    background: #efe0cc;
    color: #654735;
}


/* =========================================================
   BACKGROUND
========================================================= */

.rsvp-background {
    position: absolute;
    inset: 0;
    z-index: -3;
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
}

.rsvp-background-overlay {
    position: absolute;
    inset: 0;
    z-index: -2;
    background:
        linear-gradient(
            180deg,
            rgba(247, 238, 225, .94) 0%,
            rgba(242, 230, 212, .88) 48%,
            rgba(226, 207, 181, .95) 100%
        );
}

.rsvp-glow {
    position: absolute;
    z-index: -1;
    width: 360px;
    height: 360px;
    border-radius: 999px;
    background: rgba(255, 250, 241, .40);
    filter: blur(72px);
    pointer-events: none;
}

.rsvp-glow-one {
    top: 5%;
    left: -180px;
    animation:
        rsvpGlowOne
        13s
        ease-in-out
        infinite
        alternate;
}

.rsvp-glow-two {
    right: -180px;
    bottom: 5%;
    animation:
        rsvpGlowTwo
        15s
        ease-in-out
        infinite
        alternate;
}


/* =========================================================
   PANEL
========================================================= */

.rsvp-panel {
    position: relative;
    width: 100%;
    padding: 72px 58px 58px;
    background:
        linear-gradient(
            135deg,
            rgba(255, 250, 242, .95),
            rgba(247, 236, 219, .91)
        );
    border: 1px solid rgba(173, 131, 72, .58);
    box-shadow:
        0 30px 90px rgba(76, 48, 29, .16),
        inset 0 0 0 1px rgba(255, 255, 255, .60);
    backdrop-filter: blur(4px);
    overflow: hidden;
}

.rsvp-panel::before {
    content: "";
    position: absolute;
    inset: 12px;
    border: 1px solid rgba(173, 131, 72, .20);
    pointer-events: none;
}


/* =========================================================
   CORNERS
========================================================= */

.rsvp-corner {
    position: absolute;
    z-index: 3;
    width: 28px;
    height: 28px;
    border-color: rgba(166, 121, 62, .72);
}

.rsvp-corner-tl {
    top: 24px;
    left: 24px;
    border-top: 1px solid;
    border-left: 1px solid;
}

.rsvp-corner-tr {
    top: 24px;
    right: 24px;
    border-top: 1px solid;
    border-right: 1px solid;
}

.rsvp-corner-bl {
    bottom: 24px;
    left: 24px;
    border-bottom: 1px solid;
    border-left: 1px solid;
}

.rsvp-corner-br {
    right: 24px;
    bottom: 24px;
    border-right: 1px solid;
    border-bottom: 1px solid;
}


/* =========================================================
   HEADER
========================================================= */

.rsvp-header {
    max-width: 560px;
    margin: 0 auto 50px;
    text-align: center;
    opacity: 0;
    transform: translateY(24px);
    animation:
        rsvpHeaderIn
        1s
        cubic-bezier(.22, 1, .36, 1)
        .1s
        forwards;
}

.rsvp-kicker {
    margin: 0;
    color: #9b713c;
    font-family: Arial, sans-serif;
    font-size: 10px;
    font-weight: 600;
    letter-spacing: .48em;
    text-transform: uppercase;
}

.rsvp-ornament {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 14px;
    margin-top: 20px;
}

.rsvp-ornament span {
    width: 48px;
    height: 1px;
    background: linear-gradient(
        90deg,
        transparent,
        rgba(165, 120, 60, .65)
    );
}

.rsvp-ornament span:last-child {
    background: linear-gradient(
        90deg,
        rgba(165, 120, 60, .65),
        transparent
    );
}

.rsvp-ornament b {
    color: #a27a45;
    font-family: Georgia, serif;
    font-size: 17px;
    font-weight: 400;
}

.rsvp-title {
    margin: 22px 0 0;
    color: #654735;
    font-family: Georgia, "Times New Roman", serif;
    font-size: clamp(2.2rem, 5vw, 3.5rem);
    font-weight: 400;
    letter-spacing: .025em;
    line-height: 1.15;
}

.rsvp-intro {
    max-width: 430px;
    margin: 20px auto 0;
    color: #80644d;
    font-family: Arial, sans-serif;
    font-size: 13px;
    line-height: 1.9;
}


/* =========================================================
   FORM
========================================================= */

.rsvp-form {
    position: relative;
    z-index: 2;
}

.rsvp-field {
    opacity: 0;
    transform: translateY(20px);
    animation:
        rsvpFieldIn
        .8s
        cubic-bezier(.22, 1, .36, 1)
        .3s
        forwards;
}

.rsvp-field + .rsvp-field {
    margin-top: 30px;
}

.rsvp-field label,
.rsvp-field-label {
    display: block;
    margin: 0;
    color: #795a41;
    font-family: Arial, sans-serif;
    font-size: 9px;
    font-weight: 600;
    letter-spacing: .28em;
}


/* =========================================================
   INPUT
========================================================= */

.rsvp-input-wrap {
    position: relative;
    margin-top: 11px;
}

.rsvp-input-wrap input,
.rsvp-select-wrap select,
.rsvp-field textarea {
    width: 100%;
    border: 1px solid rgba(160, 120, 70, .28);
    outline: none;
    background:
        rgba(255, 252, 247, .80);
    color: #654735;
    font-family: Arial, sans-serif;
    font-size: 13px;
    box-shadow:
        inset 0 0 0 1px rgba(255, 255, 255, .55);
    transition:
        border-color .35s ease,
        box-shadow .35s ease,
        background .35s ease;
}

.rsvp-input-wrap input {
    height: 52px;
    padding: 0 50px 0 18px;
    border-radius: 2px;
}

.rsvp-input-wrap input::placeholder,
.rsvp-field textarea::placeholder {
    color: #aa9988;
}

.rsvp-input-wrap input:focus,
.rsvp-select-wrap select:focus,
.rsvp-field textarea:focus {
    border-color: rgba(156, 112, 58, .72);
    background: rgba(255, 252, 247, .96);
    box-shadow:
        0 0 0 3px rgba(173, 131, 72, .09);
}

.rsvp-input-wrap input[readonly] {
    background: rgba(238, 224, 204, .55);
    color: #80644d;
}

.rsvp-input-status {
    position: absolute;
    top: 50%;
    right: 18px;
    display: flex;
    width: 22px;
    height: 22px;
    align-items: center;
    justify-content: center;
    transform: translateY(-50%);
    border: 1px solid rgba(156, 112, 58, .45);
    border-radius: 999px;
    color: #9b713c;
    font-family: Arial, sans-serif;
    font-size: 10px;
}


/* =========================================================
   ATTENDANCE
========================================================= */

.attendance-list {
    display: grid;
    gap: 10px;
    margin-top: 13px;
}

.attendance-option {
    display: block;
    cursor: pointer;
}

.attendance-option input {
    position: absolute;
    width: 1px;
    height: 1px;
    opacity: 0;
    pointer-events: none;
}

.attendance-card {
    position: relative;
    display: flex;
    min-height: 70px;
    align-items: center;
    gap: 14px;
    padding: 13px 15px;
    border: 1px solid rgba(160, 120, 70, .25);
    background: rgba(255, 252, 247, .66);
    transition:
        transform .35s ease,
        border-color .35s ease,
        background .35s ease,
        box-shadow .35s ease;
}

.attendance-card:hover {
    transform: translateY(-2px);
    border-color: rgba(160, 120, 70, .46);
    background: rgba(255, 252, 247, .90);
    box-shadow:
        0 8px 22px rgba(87, 54, 31, .07);
}

.attendance-option input:checked + .attendance-card {
    border-color: rgba(142, 101, 53, .72);
    background:
        linear-gradient(
            135deg,
            rgba(255, 250, 241, .96),
            rgba(242, 227, 207, .90)
        );
    box-shadow:
        0 9px 25px rgba(87, 54, 31, .10);
}

.attendance-icon {
    display: flex;
    width: 38px;
    height: 38px;
    flex-shrink: 0;
    align-items: center;
    justify-content: center;
    border: 1px solid rgba(160, 120, 70, .27);
    border-radius: 999px;
    background: rgba(255, 252, 247, .80);
    color: #967044;
    font-family: Georgia, serif;
    font-size: 14px;
    transition:
        border-color .35s ease,
        background .35s ease,
        color .35s ease;
}

.attendance-option input:checked + .attendance-card .attendance-icon {
    border-color: #90673a;
    background: #765238;
    color: #fff8ed;
}

.attendance-content {
    min-width: 0;
    flex: 1;
}

.attendance-content p {
    margin: 0;
    color: #674a35;
    font-family: Arial, sans-serif;
    font-size: 12px;
    font-weight: 600;
}

.attendance-content span {
    display: block;
    margin-top: 4px;
    color: #9a8774;
    font-family: Arial, sans-serif;
    font-size: 10px;
    line-height: 1.5;
}

.attendance-check {
    display: flex;
    width: 21px;
    height: 21px;
    flex-shrink: 0;
    align-items: center;
    justify-content: center;
    border: 1px solid rgba(160, 120, 70, .30);
    border-radius: 999px;
    color: transparent;
    font-family: Arial, sans-serif;
    font-size: 9px;
    transition:
        border-color .35s ease,
        background .35s ease,
        color .35s ease;
}

.attendance-option input:checked + .attendance-card .attendance-check {
    border-color: #765238;
    background: #765238;
    color: #fff8ed;
}


/* =========================================================
   SELECT
========================================================= */

.rsvp-select-wrap {
    position: relative;
    margin-top: 11px;
}

.rsvp-select-wrap select {
    height: 52px;
    appearance: none;
    cursor: pointer;
    padding: 0 48px 0 18px;
    border-radius: 2px;
}

.rsvp-select-arrow {
    position: absolute;
    top: 50%;
    right: 18px;
    color: #967044;
    font-family: Georgia, serif;
    font-size: 17px;
    pointer-events: none;
    transform: translateY(-50%);
}


/* =========================================================
   TEXTAREA
========================================================= */

.rsvp-field textarea {
    display: block;
    min-height: 130px;
    margin-top: 11px;
    padding: 16px 18px;
    border-radius: 2px;
    resize: vertical;
    line-height: 1.8;
}

.rsvp-character-count {
    display: flex;
    justify-content: flex-end;
    gap: 4px;
    margin-top: 7px;
    color: #aa9988;
    font-family: Arial, sans-serif;
    font-size: 8px;
    letter-spacing: .12em;
}


/* =========================================================
   SUBMIT
========================================================= */

.rsvp-submit {
    position: relative;
    display: flex;
    width: 100%;
    min-height: 54px;
    align-items: center;
    justify-content: center;
    gap: 15px;
    margin-top: 32px;
    border: 1px solid #765238;
    background:
        linear-gradient(
            135deg,
            #765238,
            #5f422e
        );
    color: #fff8ed;
    font-family: Arial, sans-serif;
    font-size: 9px;
    font-weight: 600;
    letter-spacing: .32em;
    box-shadow:
        0 10px 28px rgba(87, 54, 31, .15);
    cursor: pointer;
    transition:
        transform .45s cubic-bezier(.22, 1, .36, 1),
        box-shadow .45s ease,
        background .45s ease;
}

.rsvp-submit:hover {
    transform: translateY(-3px);
    background:
        linear-gradient(
            135deg,
            #87613f,
            #654530
        );
    box-shadow:
        0 16px 34px rgba(87, 54, 31, .22);
}

.rsvp-submit:active {
    transform: translateY(0);
}

.rsvp-submit-arrow {
    font-family: Georgia, serif;
    font-size: 16px;
    letter-spacing: 0;
    transition: transform .4s ease;
}

.rsvp-submit:hover .rsvp-submit-arrow {
    transform: translateX(5px);
}


/* =========================================================
   ERROR
========================================================= */

.rsvp-error {
    position: relative;
    display: flex;
    gap: 13px;
    margin-bottom: 30px;
    padding: 16px 17px;
    border: 1px solid rgba(159, 86, 67, .30);
    background: rgba(250, 235, 226, .72);
    color: #875044;
    animation:
        rsvpErrorIn
        .5s
        ease-out;
}

.rsvp-error-icon {
    display: flex;
    width: 25px;
    height: 25px;
    flex-shrink: 0;
    align-items: center;
    justify-content: center;
    border: 1px solid rgba(159, 86, 67, .40);
    border-radius: 999px;
    font-family: Georgia, serif;
    font-size: 12px;
}

.rsvp-error-content {
    min-width: 0;
}

.rsvp-error-title {
    margin: 0;
    font-family: Arial, sans-serif;
    font-size: 11px;
    font-weight: 600;
}

.rsvp-error ul {
    margin: 7px 0 0;
    padding-left: 16px;
    font-family: Arial, sans-serif;
    font-size: 10px;
    line-height: 1.7;
}


/* =========================================================
   SUCCESS POPUP
========================================================= */

.rsvp-popup {
    animation:
        rsvpPopupIn
        .35s
        ease-out;
}

.rsvp-popup-backdrop {
    position: absolute;
    inset: 0;
    background: rgba(48, 30, 19, .56);
    backdrop-filter: blur(5px);
}

.rsvp-popup-box {
    position: relative;
    z-index: 2;
    width: min(100%, 390px);
    padding: 40px 34px 32px;
    border: 1px solid rgba(173, 131, 72, .55);
    background:
        linear-gradient(
            135deg,
            #fffaf2,
            #f0dfc7
        );
    text-align: center;
    box-shadow:
        0 30px 90px rgba(36, 22, 14, .30),
        inset 0 0 0 1px rgba(255, 255, 255, .68);
    animation:
        rsvpPopupBoxIn
        .55s
        cubic-bezier(.22, 1, .36, 1);
}

.rsvp-popup-box::before {
    content: "";
    position: absolute;
    inset: 8px;
    border: 1px solid rgba(173, 131, 72, .18);
    pointer-events: none;
}

.rsvp-popup-flower {
    color: #a27a45;
    font-family: Georgia, serif;
    font-size: 18px;
}

.rsvp-success-icon {
    display: flex;
    width: 64px;
    height: 64px;
    align-items: center;
    justify-content: center;
    margin: 13px auto 0;
    border: 1px solid rgba(156, 112, 58, .48);
    border-radius: 999px;
    background: rgba(255, 250, 241, .72);
    box-shadow:
        inset 0 0 0 6px rgba(173, 131, 72, .07);
    animation:
        rsvpSuccessIcon
        .6s
        cubic-bezier(.22, 1, .36, 1);
}

.rsvp-success-icon span {
    color: #765238;
    font-family: Georgia, serif;
    font-size: 25px;
}

.rsvp-popup-kicker {
    margin: 21px 0 0;
    color: #a07843;
    font-family: Arial, sans-serif;
    font-size: 8px;
    font-weight: 600;
    letter-spacing: .30em;
}

.rsvp-popup-box h3 {
    margin: 10px 0 0;
    color: #654735;
    font-family: Georgia, "Times New Roman", serif;
    font-size: 29px;
    font-weight: 400;
}

.rsvp-popup-message {
    max-width: 270px;
    margin: 12px auto 0;
    color: #80644d;
    font-family: Arial, sans-serif;
    font-size: 12px;
    line-height: 1.8;
}

.rsvp-popup-ornament {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    margin-top: 19px;
}

.rsvp-popup-ornament span {
    width: 32px;
    height: 1px;
    background: rgba(164, 120, 62, .40);
}

.rsvp-popup-ornament b {
    color: #a27a45;
    font-family: Georgia, serif;
    font-size: 13px;
    font-weight: 400;
}

.rsvp-popup-close {
    position: relative;
    z-index: 2;
    width: 100%;
    margin-top: 22px;
    padding: 13px 20px;
    border: 1px solid #765238;
    background: #765238;
    color: #fff8ed;
    font-family: Arial, sans-serif;
    font-size: 9px;
    font-weight: 600;
    letter-spacing: .28em;
    cursor: pointer;
    transition:
        transform .35s ease,
        background .35s ease,
        box-shadow .35s ease;
}

.rsvp-popup-close:hover {
    transform: translateY(-2px);
    background: #60432f;
    box-shadow:
        0 10px 24px rgba(87, 54, 31, .18);
}


/* =========================================================
   BOTTOM
========================================================= */

.rsvp-bottom {
    margin-top: 52px;
    text-align: center;
    opacity: 0;
    transform: translateY(15px);
    animation:
        rsvpBottomIn
        1s
        ease-out
        1s
        forwards;
}

.rsvp-bottom-ornament {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 15px;
}

.rsvp-bottom-ornament span {
    width: 50px;
    height: 1px;
    background: linear-gradient(
        90deg,
        transparent,
        rgba(164, 120, 62, .55)
    );
}

.rsvp-bottom-ornament span:last-child {
    background: linear-gradient(
        90deg,
        rgba(164, 120, 62, .55),
        transparent
    );
}

.rsvp-bottom-ornament b {
    color: #a27a45;
    font-family: Georgia, serif;
    font-size: 18px;
    font-weight: 400;
}

.rsvp-bottom p {
    margin: 15px 0 0;
    color: #a27a45;
    font-family: Arial, sans-serif;
    font-size: 8px;
    letter-spacing: .30em;
}


/* =========================================================
   ANIMATIONS
========================================================= */

@keyframes rsvpHeaderIn {
    from {
        opacity: 0;
        transform: translateY(24px);
    }

    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes rsvpFieldIn {
    from {
        opacity: 0;
        transform: translateY(20px);
    }

    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes rsvpBottomIn {
    from {
        opacity: 0;
        transform: translateY(15px);
    }

    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes rsvpErrorIn {
    from {
        opacity: 0;
        transform: translateY(-10px);
    }

    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes rsvpPopupIn {
    from {
        opacity: 0;
    }

    to {
        opacity: 1;
    }
}

@keyframes rsvpPopupBoxIn {
    from {
        opacity: 0;
        transform: translateY(25px) scale(.95);
    }

    to {
        opacity: 1;
        transform: translateY(0) scale(1);
    }
}

@keyframes rsvpSuccessIcon {
    from {
        opacity: 0;
        transform: scale(.5) rotate(-10deg);
    }

    to {
        opacity: 1;
        transform: scale(1) rotate(0);
    }
}

@keyframes rsvpGlowOne {
    from {
        transform: translate3d(0, 0, 0) scale(1);
    }

    to {
        transform: translate3d(38px, 28px, 0) scale(1.08);
    }
}

@keyframes rsvpGlowTwo {
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

@media (max-width: 640px) {

    .rsvp-section {
        padding-top: 5rem;
        padding-bottom: 5rem;
    }

    .rsvp-panel {
        padding: 60px 22px 48px;
    }

    .rsvp-panel::before {
        inset: 9px;
    }

    .rsvp-corner {
        width: 22px;
        height: 22px;
    }

    .rsvp-corner-tl,
    .rsvp-corner-tr {
        top: 18px;
    }

    .rsvp-corner-bl,
    .rsvp-corner-br {
        bottom: 18px;
    }

    .rsvp-corner-tl,
    .rsvp-corner-bl {
        left: 18px;
    }

    .rsvp-corner-tr,
    .rsvp-corner-br {
        right: 18px;
    }

    .rsvp-header {
        margin-bottom: 43px;
    }

    .rsvp-title {
        font-size: 2.15rem;
    }

    .rsvp-intro {
        max-width: 300px;
        font-size: 12px;
        line-height: 1.85;
    }

    .attendance-card {
        min-height: 66px;
        padding: 11px 12px;
        gap: 11px;
    }

    .attendance-icon {
        width: 35px;
        height: 35px;
    }

    .attendance-content p {
        font-size: 11px;
    }

    .attendance-content span {
        font-size: 9px;
    }

    .rsvp-popup-box {
        padding: 36px 25px 28px;
    }
}


/* =========================================================
   SMALL MOBILE
========================================================= */

@media (max-width: 400px) {

    .rsvp-panel {
        padding-left: 18px;
        padding-right: 18px;
    }

    .rsvp-title {
        font-size: 2rem;
    }

    .rsvp-kicker {
        font-size: 8px;
        letter-spacing: .40em;
    }

    .attendance-card {
        padding: 10px;
    }

    .attendance-check {
        width: 19px;
        height: 19px;
    }

    .rsvp-submit {
        font-size: 8px;
    }

    .rsvp-bottom p {
        font-size: 7px;
        letter-spacing: .25em;
    }
}


/* =========================================================
   REDUCED MOTION
========================================================= */

@media (prefers-reduced-motion: reduce) {

    .rsvp-glow-one,
    .rsvp-glow-two,
    .rsvp-header,
    .rsvp-field,
    .rsvp-bottom,
    .rsvp-error,
    .rsvp-popup,
    .rsvp-popup-box,
    .rsvp-success-icon {
        animation: none !important;
        transition: none !important;
        opacity: 1;
        transform: none;
    }
}
</style>