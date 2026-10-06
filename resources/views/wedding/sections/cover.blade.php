<section
    id="cover"
    class="
        relative
        min-h-screen
        overflow-hidden
        bg-[#2c211b]
    "
>

    {{-- =====================================================
         BACKGROUND FOTO
    ====================================================== --}}

    <div
        class="
            absolute
            inset-0
            bg-cover
            bg-center
            bg-no-repeat
            scale-[1.02]
        "
        style="
            background-image:
                url('{{ $wedding->cover_image
                    ? asset($wedding->cover_image)
                    : asset('images/wedding/cover.jpeg')
                }}');
        "
    ></div>


    {{-- =====================================================
         CINEMATIC OVERLAY
    ====================================================== --}}

    <div
        class="
            absolute
            inset-0
            bg-gradient-to-r
            from-black/55
            via-black/25
            to-black/45
        "
    ></div>


    {{-- Soft warm overlay --}}
    <div
        class="
            absolute
            inset-0
            bg-[#6d503c]/10
            mix-blend-multiply
        "
    ></div>


    {{-- =====================================================
         CONTENT
    ====================================================== --}}

    <div
        class="
            relative
            z-10
            flex
            min-h-screen
            items-center
            justify-center
            px-6
            py-20
        "
    >

        <div
            class="
                w-full
                max-w-xl
                text-center
                text-white
            "
        >

            {{-- THE WEDDING OF --}}

            <p
                class="
                    text-[9px]
                    font-medium
                    tracking-[0.48em]
                    text-[#f4e4c3]
                    sm:text-[11px]
                "
            >
                THE WEDDING OF
            </p>


            {{-- BRIDE --}}

            <h1
                class="
                    mt-5
                    font-serif
                    text-5xl
                    font-normal
                    leading-none
                    tracking-wide
                    text-[#f3d27e]
                    drop-shadow-[0_2px_8px_rgba(0,0,0,0.35)]
                    sm:text-6xl
                    md:text-7xl
                "
            >
                {{ $wedding->bride_name }}
            </h1>


            {{-- AMPERSAND --}}

            <div
                class="
                    my-3
                    font-serif
                    text-2xl
                    italic
                    text-[#f8e8bf]
                    sm:text-3xl
                "
            >
                &
            </div>


            {{-- GROOM --}}

            <h1
                class="
                    font-serif
                    text-5xl
                    font-normal
                    leading-none
                    tracking-wide
                    text-[#f3d27e]
                    drop-shadow-[0_2px_8px_rgba(0,0,0,0.35)]
                    sm:text-6xl
                    md:text-7xl
                "
            >
                {{ $wedding->groom_name }}
            </h1>


            {{-- DIVIDER --}}

            <div
                class="
                    mx-auto
                    mt-8
                    h-px
                    w-20
                    bg-[#e4c47d]/60
                "
            ></div>


            {{-- DATE --}}

            <p
                class="
                    mt-5
                    text-[10px]
                    font-medium
                    tracking-[0.3em]
                    text-[#fff5df]
                    sm:text-xs
                "
            >
                {{ $wedding->wedding_date->format('d · m · Y') }}
            </p>


            {{-- =================================================
                 SCROLL
            ================================================== --}}

            <div
                class="
                    absolute
                    bottom-8
                    left-1/2
                    -translate-x-1/2
                "
            >

                <div
                    class="
                        flex
                        flex-col
                        items-center
                    "
                >

                    {{-- animated line --}}

                    <div
                        class="
                            relative
                            h-12
                            w-px
                            overflow-hidden
                            bg-white/30
                        "
                    >

                        <span
                            class="
                                absolute
                                left-0
                                top-0
                                h-5
                                w-px
                                bg-[#f2d27e]
                                animate-scroll-line
                            "
                        ></span>

                    </div>


                    <p
                        class="
                            mt-3
                            text-[8px]
                            font-medium
                            tracking-[0.45em]
                            text-white/80
                        "
                    >
                        SCROLL
                    </p>

                </div>

            </div>

        </div>

    </div>

</section>