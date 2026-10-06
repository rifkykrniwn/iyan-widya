<div
    id="openingScreen"
    class="fixed inset-0 z-[99999] flex min-h-screen items-center justify-center overflow-hidden bg-[#eeeeec]"
>

    {{-- Background --}}
    <div class="absolute inset-0">

        <img
        src="{{ $wedding->cover_image
            ? asset($wedding->cover_image)
            : asset('images/wedding/cover.jpeg') }}"
        alt=""
        class="h-full w-full object-cover"
>

        <div class="absolute inset-0 bg-black/35"></div>

    </div>


    {{-- Content --}}
    <div
        class="relative z-10 px-6 text-center text-white"
    >

        <p class="text-[10px] tracking-[0.45em]">
            THE WEDDING OF
        </p>


        <h1
            class="mt-5 text-4xl font-light tracking-wide sm:text-5xl"
        >
            {{ $wedding->bride_name }} & {{ $wedding->groom_name }}
        </h1>


        <p class="mt-5 text-xs tracking-[0.35em]">
            {{ \Carbon\Carbon::parse($wedding->wedding_date)->translatedFormat('d F Y') }}
        </p>


        <div class="mx-auto mt-12 max-w-xs">

            <p class="text-xs tracking-wide">
                Kepada Yth.
            </p>

            <p class="mt-2 text-lg">
                {{ $guestName }}
            </p>

        </div>


        {{-- Open Button --}}
        <button
            id="openInvitation"
            type="button"
            class="mt-10 rounded-full border border-white/70 bg-white/10 px-8 py-3 text-[10px] tracking-[0.3em] backdrop-blur-sm transition duration-500 hover:bg-white hover:text-neutral-900"
        >
            BUKA UNDANGAN
        </button>

    </div>

</div>