<section
    id="gallery"
    class="gallery-section relative min-h-screen overflow-hidden"
>

    {{-- =========================================================
         BACKGROUND JAVA HERITAGE
    ========================================================== --}}

    <img
        src="{{ asset('images/wedding/java-heritage/BACKGROUND.webp') }}"
        alt=""
        class="gallery-background"
    >

    <div class="gallery-background-overlay"></div>


    {{-- =========================================================
         MAIN WRAPPER
    ========================================================== --}}

    <div class="gallery-wrapper relative z-10">

        <div class="gallery-panel">

            {{-- CORNER ORNAMENTS --}}
            <span class="gallery-corner gallery-corner-tl"></span>
            <span class="gallery-corner gallery-corner-tr"></span>
            <span class="gallery-corner gallery-corner-bl"></span>
            <span class="gallery-corner gallery-corner-br"></span>


            {{-- =================================================
                 HEADER
            ================================================== --}}

            <div class="gallery-header">

                <span class="gallery-kicker">
                    OUR MOMENTS
                </span>

                <div class="gallery-header-divider">
                    <span></span>
                    <b>❦</b>
                    <span></span>
                </div>

                <h2>
                    Photo Gallery
                </h2>

                <p>
                    Beberapa momen indah yang menjadi bagian
                    dari perjalanan kisah kami.
                </p>

            </div>


            {{-- =================================================
                 GALLERY GRID
            ================================================== --}}

            <div class="gallery-grid">

                @forelse (
                    $wedding->galleries
                        ->sortBy('sort_order')
                    as $index => $photo
                )

                    <button
                        type="button"
                        class="gallery-item"
                        data-image="{{ asset($photo->image) }}"
                        style="--gallery-delay: {{ $index * 0.09 + 0.1 }}s;"
                    >

                        {{-- IMAGE --}}
                        <div class="gallery-image-wrapper">

                            <img
                                src="{{ asset($photo->image) }}"
                                alt="{{ $photo->caption ?? 'Momen pernikahan' }}"
                                class="gallery-image"
                                loading="lazy"
                            >

                        </div>


                        {{-- OVERLAY --}}
                        <div class="gallery-overlay">

                            <span class="gallery-zoom">
                                +
                            </span>

                        </div>


                        {{-- GOLD FRAME --}}
                        <span class="gallery-frame"></span>

                    </button>

                @empty

                    <div class="gallery-empty">

                        <div class="gallery-empty-icon">
                            ♡
                        </div>

                        <p>
                            Galeri belum tersedia.
                        </p>

                        <span>
                            Momen indah akan segera hadir di sini.
                        </span>

                    </div>

                @endforelse

            </div>


            {{-- =================================================
                 BOTTOM ORNAMENT
            ================================================== --}}

            @if ($wedding->galleries->count() > 0)

                <div class="gallery-bottom">

                    <span></span>

                    <b>❦</b>

                    <span></span>

                </div>

            @endif

        </div>

    </div>

</section>


{{-- =============================================================
     LIGHTBOX
============================================================== --}}

<div
    id="gallery-lightbox"
    class="gallery-lightbox"
    aria-hidden="true"
>

    <button
        type="button"
        class="gallery-lightbox-close"
        aria-label="Tutup"
    >
        ×
    </button>

    <div class="gallery-lightbox-content">

        <img
            id="gallery-lightbox-image"
            src=""
            alt="Preview foto"
        >

    </div>

</div>


<style>

    /* =========================================================
       JAVA HERITAGE — GALLERY
    ========================================================== */

    .gallery-section {
        position: relative;
        isolation: isolate;

        scroll-margin-top: 20px;

        background: #eadcc8;

        color: #5d4331;
    }


    /* =========================================================
       BACKGROUND
    ========================================================== */

    .gallery-background {
        position: absolute;
        inset: 0;

        width: 100%;
        height: 100%;

        object-fit: cover;
        object-position: center;

        z-index: -3;
    }


    .gallery-background-overlay {
        position: absolute;
        inset: 0;

        z-index: -2;

        background:
            linear-gradient(
                180deg,
                rgba(247, 238, 225, .91) 0%,
                rgba(238, 224, 204, .83) 50%,
                rgba(224, 204, 178, .92) 100%
            );
    }


    /* =========================================================
       WRAPPER
    ========================================================== */

    .gallery-wrapper {
        width: 100%;

        min-height: 100vh;

        display: flex;

        align-items: center;
        justify-content: center;

        padding: 80px 24px;
    }


    /* =========================================================
       PANEL
    ========================================================== */

    .gallery-panel {
        position: relative;

        width: min(1080px, 100%);

        padding: 70px 65px 55px;

        background:
            linear-gradient(
                135deg,
                rgba(255, 250, 242, .93),
                rgba(247, 236, 219, .89)
            );

        border:
            1px solid rgba(173, 131, 72, .58);

        box-shadow:
            0 28px 80px rgba(76, 48, 29, .17),
            inset 0 0 0 1px rgba(255, 255, 255, .60);

        backdrop-filter: blur(3px);
        -webkit-backdrop-filter: blur(3px);
    }


    .gallery-panel::before {
        content: "";

        position: absolute;

        inset: 14px;

        border:
            1px solid rgba(181, 139, 78, .30);

        pointer-events: none;
    }


    /* =========================================================
       CORNERS
    ========================================================== */

    .gallery-corner {
        position: absolute;

        width: 35px;
        height: 35px;

        pointer-events: none;
    }


    .gallery-corner::before,
    .gallery-corner::after {
        content: "";

        position: absolute;

        display: block;

        background: #b88a4a;
    }


    .gallery-corner::before {
        width: 35px;
        height: 1px;
    }


    .gallery-corner::after {
        width: 1px;
        height: 35px;
    }


    .gallery-corner-tl {
        top: 24px;
        left: 24px;
    }


    .gallery-corner-tr {
        top: 24px;
        right: 24px;

        transform: rotate(90deg);
    }


    .gallery-corner-bl {
        bottom: 24px;
        left: 24px;

        transform: rotate(-90deg);
    }


    .gallery-corner-br {
        right: 24px;
        bottom: 24px;

        transform: rotate(180deg);
    }


    /* =========================================================
       HEADER
    ========================================================== */

    .gallery-header {
        max-width: 600px;

        margin: 0 auto 50px;

        text-align: center;

        opacity: 0;

        transform: translateY(28px);
    }


    .gallery-section.is-visible .gallery-header {
        animation:
            galleryReveal
            .9s
            cubic-bezier(.22,1,.36,1)
            forwards;
    }


    .gallery-kicker {
        display: block;

        font-family:
            Arial,
            sans-serif;

        font-size: 10px;

        font-weight: 600;

        letter-spacing: .38em;

        color: #9b713c;
    }


    .gallery-header-divider {
        display: flex;

        align-items: center;
        justify-content: center;

        gap: 12px;

        margin: 15px 0 10px;
    }


    .gallery-header-divider span {
        width: 55px;
        height: 1px;

        background:
            linear-gradient(
                to right,
                transparent,
                #b88a4a
            );
    }


    .gallery-header-divider span:last-child {
        background:
            linear-gradient(
                to left,
                transparent,
                #b88a4a
            );
    }


    .gallery-header-divider b {
        font-family: Georgia, serif;

        font-size: 18px;

        font-weight: normal;

        color: #b88a4a;
    }


    .gallery-header h2 {
        margin: 0;

        font-family:
            Georgia,
            "Times New Roman",
            serif;

        font-size: clamp(31px, 4vw, 44px);

        font-weight: 500;

        letter-spacing: .035em;

        color: #654735;
    }


    .gallery-header p {
        max-width: 470px;

        margin: 15px auto 0;

        font-family:
            Georgia,
            "Times New Roman",
            serif;

        font-size: 14px;

        line-height: 1.8;

        color: #876a52;
    }


    /* =========================================================
       GALLERY GRID
    ========================================================== */

    .gallery-grid {
        display: grid;

        grid-template-columns:
            repeat(3, minmax(0, 1fr));

        gap: 18px;
    }


    /* =========================================================
       GALLERY ITEM
    ========================================================== */

    .gallery-item {
        position: relative;

        display: block;

        width: 100%;

        padding: 0;

        border: 0;

        background: transparent;

        cursor: pointer;

        overflow: hidden;

        opacity: 0;

        transform:
            translateY(35px)
            scale(.97);

        animation:
            galleryItemReveal
            .9s
            cubic-bezier(.22,1,.36,1)
            var(--gallery-delay)
            forwards;

        -webkit-tap-highlight-color: transparent;
    }


    .gallery-image-wrapper {
        position: relative;

        aspect-ratio: 1 / 1;

        overflow: hidden;

        background: #dfcfb8;

        border-radius: 3px;

        box-shadow:
            0 12px 30px rgba(75, 48, 29, .12);

        transition:
            box-shadow .5s ease,
            transform .5s ease;
    }


    /* =========================================================
       IMAGE
    ========================================================== */

    .gallery-image {
        display: block;

        width: 100%;
        height: 100%;

        object-fit: cover;

        filter: none;

        transform: scale(1.005);

        transition:
            transform .9s cubic-bezier(.22,1,.36,1),
            filter .6s ease;
    }


    .gallery-item:hover .gallery-image {
        transform: scale(1.08);

        filter:
            saturate(1.06)
            contrast(1.02);
    }


    .gallery-item:hover .gallery-image-wrapper {
        transform: translateY(-4px);

        box-shadow:
            0 20px 40px rgba(75, 48, 29, .18);
    }


    /* =========================================================
       GOLD FRAME
    ========================================================== */

    .gallery-frame {
        position: absolute;

        inset: 7px;

        z-index: 3;

        border:
            1px solid rgba(255, 241, 212, .72);

        box-shadow:
            inset 0 0 0 1px rgba(151, 107, 54, .18);

        pointer-events: none;

        transition:
            inset .5s ease,
            border-color .5s ease;
    }


    .gallery-item:hover .gallery-frame {
        inset: 10px;

        border-color:
            rgba(255, 247, 226, .95);
    }


    /* =========================================================
       OVERLAY
    ========================================================== */

    .gallery-overlay {
        position: absolute;

        inset: 0;

        z-index: 2;

        display: flex;

        align-items: center;
        justify-content: center;

        background:
            rgba(65, 43, 28, 0);

        transition:
            background .5s ease;
    }


    .gallery-item:hover .gallery-overlay {
        background:
            rgba(65, 43, 28, .18);
    }


    /* =========================================================
       ZOOM ICON
    ========================================================== */

    .gallery-zoom {
        width: 48px;
        height: 48px;

        display: flex;

        align-items: center;
        justify-content: center;

        border:
            1px solid rgba(255, 247, 226, .82);

        border-radius: 50%;

        background:
            rgba(71, 46, 29, .28);

        color: #fff8ed;

        font-family:
            Georgia,
            serif;

        font-size: 25px;

        font-weight: 300;

        opacity: 0;

        transform: scale(.65);

        transition:
            opacity .35s ease,
            transform .45s cubic-bezier(.22,1,.36,1);
    }


    .gallery-item:hover .gallery-zoom {
        opacity: 1;

        transform: scale(1);
    }


    /* =========================================================
       EMPTY STATE
    ========================================================== */

    .gallery-empty {
        grid-column: 1 / -1;

        padding: 65px 30px;

        text-align: center;

        background:
            rgba(255, 250, 241, .72);

        border:
            1px dashed rgba(177, 135, 73, .42);
    }


    .gallery-empty-icon {
        width: 58px;
        height: 58px;

        display: flex;

        align-items: center;
        justify-content: center;

        margin: 0 auto;

        border:
            1px solid rgba(177, 135, 73, .48);

        border-radius: 50%;

        font-family: Georgia, serif;

        font-size: 22px;

        color: #b88a4a;
    }


    .gallery-empty p {
        margin: 17px 0 0;

        font-family:
            Georgia,
            serif;

        font-size: 14px;

        color: #74563f;
    }


    .gallery-empty span {
        display: block;

        margin-top: 6px;

        font-family:
            Georgia,
            serif;

        font-size: 12px;

        color: #9a7e64;
    }


    /* =========================================================
       BOTTOM ORNAMENT
    ========================================================== */

    .gallery-bottom {
        display: flex;

        align-items: center;
        justify-content: center;

        gap: 13px;

        margin-top: 48px;

        opacity: 0;

        transform: translateY(15px);
    }


    .gallery-section.is-visible .gallery-bottom {
        animation:
            galleryReveal
            .9s
            ease-out
            .7s
            forwards;
    }


    .gallery-bottom span {
        width: 65px;
        height: 1px;

        background:
            linear-gradient(
                to right,
                transparent,
                #b88a4a
            );
    }


    .gallery-bottom span:last-child {
        background:
            linear-gradient(
                to left,
                transparent,
                #b88a4a
            );
    }


    .gallery-bottom b {
        font-family: Georgia, serif;

        font-size: 18px;

        font-weight: normal;

        color: #b88a4a;
    }


    /* =========================================================
       LIGHTBOX
    ========================================================== */

    .gallery-lightbox {
        position: fixed;

        inset: 0;

        z-index: 9999;

        display: flex;

        align-items: center;
        justify-content: center;

        padding: 30px;

        background:
            rgba(45, 29, 20, .88);

        opacity: 0;

        visibility: hidden;

        transition:
            opacity .35s ease,
            visibility .35s ease;
    }


    .gallery-lightbox.is-open {
        opacity: 1;

        visibility: visible;
    }


    .gallery-lightbox-content {
        position: relative;

        max-width: min(1000px, 94vw);
        max-height: 88vh;

        display: flex;

        align-items: center;
        justify-content: center;

        transform: scale(.94);

        transition:
            transform .45s cubic-bezier(.22,1,.36,1);
    }


    .gallery-lightbox.is-open .gallery-lightbox-content {
        transform: scale(1);
    }


    .gallery-lightbox-content img {
        display: block;

        max-width: 100%;
        max-height: 84vh;

        width: auto;
        height: auto;

        object-fit: contain;

        border:
            5px solid rgba(255, 247, 229, .92);

        box-shadow:
            0 25px 70px rgba(0, 0, 0, .35);
    }


    .gallery-lightbox-close {
        position: absolute;

        top: 20px;
        right: 24px;

        z-index: 3;

        width: 45px;
        height: 45px;

        display: flex;

        align-items: center;
        justify-content: center;

        padding: 0;

        border:
            1px solid rgba(255, 241, 216, .55);

        border-radius: 50%;

        background:
            rgba(72, 45, 28, .45);

        color: #fff8eb;

        font-family:
            Arial,
            sans-serif;

        font-size: 29px;

        font-weight: 200;

        line-height: 1;

        cursor: pointer;

        transition:
            transform .3s ease,
            background .3s ease;
    }


    .gallery-lightbox-close:hover {
        transform: rotate(90deg);

        background:
            rgba(118, 78, 46, .75);
    }


    /* =========================================================
       ANIMATIONS
    ========================================================== */

    @keyframes galleryReveal {

        from {
            opacity: 0;

            transform:
                translateY(30px);
        }

        to {
            opacity: 1;

            transform:
                translateY(0);
        }

    }


    @keyframes galleryItemReveal {

        from {
            opacity: 0;

            transform:
                translateY(35px)
                scale(.97);
        }

        to {
            opacity: 1;

            transform:
                translateY(0)
                scale(1);
        }

    }


    /* =========================================================
       MOBILE
    ========================================================== */

    @media (max-width: 700px) {

        .gallery-wrapper {
            padding: 55px 14px;
        }


        .gallery-panel {
            padding: 52px 20px 45px;
        }


        .gallery-panel::before {
            inset: 10px;
        }


        .gallery-corner-tl {
            top: 18px;
            left: 18px;
        }

        .gallery-corner-tr {
            top: 18px;
            right: 18px;
        }

        .gallery-corner-bl {
            bottom: 18px;
            left: 18px;
        }

        .gallery-corner-br {
            right: 18px;
            bottom: 18px;
        }


        .gallery-header {
            margin-bottom: 35px;
        }


        .gallery-header p {
            font-size: 13px;

            line-height: 1.75;
        }


        .gallery-grid {
            grid-template-columns:
                repeat(2, minmax(0, 1fr));

            gap: 10px;
        }


        .gallery-frame {
            inset: 5px;
        }


        .gallery-zoom {
            width: 40px;
            height: 40px;

            font-size: 21px;
        }


        /*
         * Di HP tombol + tetap sedikit terlihat
         * agar user tahu foto bisa ditekan.
         */
        .gallery-zoom {
            opacity: .72;

            transform: scale(.9);
        }


        .gallery-item:hover .gallery-zoom {
            opacity: .72;

            transform: scale(.9);
        }


        .gallery-item:hover .gallery-image-wrapper {
            transform: none;
        }


        .gallery-item:hover .gallery-image {
            transform: scale(1.03);
        }

    }


    /* =========================================================
       SMALL MOBILE
    ========================================================== */

    @media (max-width: 380px) {

        .gallery-wrapper {
            padding-left: 9px;
            padding-right: 9px;
        }


        .gallery-panel {
            padding-left: 15px;
            padding-right: 15px;
        }


        .gallery-grid {
            gap: 8px;
        }

    }


    /* =========================================================
       REDUCED MOTION
    ========================================================== */

    @media (prefers-reduced-motion: reduce) {

        .gallery-header,
        .gallery-item,
        .gallery-bottom {
            animation: none !important;

            opacity: 1;

            transform: none;
        }


        .gallery-image,
        .gallery-image-wrapper,
        .gallery-overlay,
        .gallery-zoom,
        .gallery-lightbox,
        .gallery-lightbox-content {
            transition: none !important;
        }

    }

</style>


<script>
    document.addEventListener('DOMContentLoaded', function () {

        const gallerySection =
            document.getElementById('gallery');

        if (!gallerySection) {
            return;
        }


        /* =====================================================
           SECTION REVEAL
        ====================================================== */

        const observer =
            new IntersectionObserver(
                function (entries) {

                    entries.forEach(function (entry) {

                        if (entry.isIntersecting) {

                            gallerySection.classList.add(
                                'is-visible'
                            );

                            observer.unobserve(
                                gallerySection
                            );

                        }

                    });

                },
                {
                    threshold: 0.12
                }
            );


        observer.observe(gallerySection);


        /* =====================================================
           LIGHTBOX
        ====================================================== */

        const lightbox =
            document.getElementById(
                'gallery-lightbox'
            );

        const lightboxImage =
            document.getElementById(
                'gallery-lightbox-image'
            );

        const closeButton =
            document.querySelector(
                '.gallery-lightbox-close'
            );

        const galleryItems =
            document.querySelectorAll(
                '.gallery-item'
            );


        if (
            !lightbox ||
            !lightboxImage ||
            !closeButton
        ) {
            return;
        }


        galleryItems.forEach(function (item) {

            item.addEventListener(
                'click',
                function () {

                    const image =
                        item.getAttribute(
                            'data-image'
                        );

                    if (!image) {
                        return;
                    }


                    lightboxImage.src = image;

                    lightbox.classList.add(
                        'is-open'
                    );

                    lightbox.setAttribute(
                        'aria-hidden',
                        'false'
                    );

                    document.body.style.overflow =
                        'hidden';

                }
            );

        });


        function closeLightbox() {

            lightbox.classList.remove(
                'is-open'
            );

            lightbox.setAttribute(
                'aria-hidden',
                'true'
            );

            document.body.style.overflow =
                '';

            setTimeout(function () {

                lightboxImage.src = '';

            }, 350);

        }


        closeButton.addEventListener(
            'click',
            closeLightbox
        );


        lightbox.addEventListener(
            'click',
            function (event) {

                if (
                    event.target === lightbox
                ) {
                    closeLightbox();
                }

            }
        );


        document.addEventListener(
            'keydown',
            function (event) {

                if (
                    event.key === 'Escape' &&
                    lightbox.classList.contains(
                        'is-open'
                    )
                ) {
                    closeLightbox();
                }

            }
        );

    });
</script>