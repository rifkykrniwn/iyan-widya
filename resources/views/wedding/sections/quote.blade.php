<section
    id="quote"
    class="java-quote relative min-h-screen overflow-hidden"
>

    {{-- =====================================================
         BACKGROUND IMAGE
    ====================================================== --}}

    <img
        src="{{ asset('images/wedding/java-heritage/BACKGROUND.webp') }}"
        alt=""
        class="java-quote-background"
    >


    {{-- Overlay lembut --}}
    <div class="java-quote-overlay"></div>


    {{-- =====================================================
         PANEL QUOTE
    ====================================================== --}}

    <div class="java-quote-wrapper">

        <div class="java-quote-panel">

            {{-- Decorative corners --}}
            <span class="java-corner java-corner-tl"></span>
            <span class="java-corner java-corner-tr"></span>
            <span class="java-corner java-corner-bl"></span>
            <span class="java-corner java-corner-br"></span>


            {{-- =================================================
                 INITIAL
            ================================================== --}}

            <div class="java-quote-initial">

                {{ mb_substr($wedding->bride_name, 0, 1) }}

                <span>&amp;</span>

                {{ mb_substr($wedding->groom_name, 0, 1) }}

            </div>


            {{-- Divider --}}

            <div class="java-quote-divider">

                <span></span>

                <i>✦</i>

                <span></span>

            </div>


            {{-- =================================================
                 AYAT ARAB
            ================================================== --}}

            <p
                dir="rtl"
                lang="ar"
                class="java-quote-arabic"
            >
                وَمِنْ آيَاتِهِ أَنْ خَلَقَ لَكُم مِّنْ أَنفُسِكُمْ
                أَزْوَاجًا لِّتَسْكُنُوا إِلَيْهَا وَجَعَلَ بَيْنَكُم
                مَّوَدَّةً وَرَحْمَةً ۚ إِنَّ فِي ذَٰلِكَ لَآيَاتٍ
                لِّقَوْمٍ يَتَفَكَّرُونَ
            </p>


            {{-- =================================================
                 TERJEMAHAN / QUOTE
            ================================================== --}}

            <blockquote class="java-quote-text">

                “{{ $wedding->quote }}”

            </blockquote>


            {{-- =================================================
                 SOURCE
            ================================================== --}}

            <p class="java-quote-source">
                ( Ar-Rum ayat 21 )
            </p>

        </div>

    </div>

</section>