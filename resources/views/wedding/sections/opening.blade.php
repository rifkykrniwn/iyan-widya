<div
    id="openingScreen"
    class="java-opening"
>

    {{-- =====================================================
         BACKGROUND IMAGE
    ====================================================== --}}

    <img
        src="{{ asset('images/wedding/java-heritage/BACKGROUND.webp') }}"
        alt=""
        class="java-opening-background"
    >


    {{-- =====================================================
         FRAME TENGAH
    ====================================================== --}}

    <img
        src="{{ asset('images/wedding/java-heritage/FRAME-TENGAH.png') }}"
        alt=""
        class="java-opening-frame"
    >


    {{-- =====================================================
         CONTENT
    ====================================================== --}}

    <div class="java-opening-content">

        <p class="java-opening-eyebrow">
            THE WEDDING OF
        </p>

        <h1 class="java-opening-name">
            {{ $wedding->bride_name }}
        </h1>

        <div class="java-opening-ampersand">
            &
        </div>

        <h1 class="java-opening-name">
            {{ $wedding->groom_name }}
        </h1>

        <div class="java-opening-date">
            {{ \Carbon\Carbon::parse($wedding->wedding_date)->translatedFormat('d F Y') }}
        </div>

        <div class="java-opening-guest">

            <span>
                Kepada Yth.
            </span>

            <strong>
                {{ $guestName }}
            </strong>

            <small>
                Tamu Undangan
            </small>

        </div>

        <button
            id="openInvitation"
            type="button"
            class="java-opening-button"
        >
            BUKA UNDANGAN
        </button>

    </div>

</div>