<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Widya & Iyan</title>


    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])

</head>


<body class="pb-28">


    @include('wedding.sections.opening')
    

    @include('wedding.sections.cover')

    @include('wedding.sections.quote')

    @include('wedding.sections.couple')

    @include('wedding.sections.event')

    @include('wedding.sections.gallery')

    @include('wedding.sections.countdown')

    <!-- @include('wedding.sections.story') -->

    @include('wedding.sections.location')

    @include('wedding.sections.gift')

    @include('wedding.sections.rsvp')

    @include('wedding.sections.wishes')


<div id="navigationWrapper" class="hidden">
    @include('wedding.sections.navigation')
</div>



<audio
    id="weddingMusic"
    loop
    preload="auto"
>

    <source
        src="{{ asset('music/wedding.mp3') }}"
        type="audio/mpeg"
    >

</audio>



<button
    id="musicButton"
    type="button"
    aria-label="Putar musik"
    class="fixed bottom-6 right-6 z-[90] flex h-12 w-12 items-center justify-center rounded-full border border-white/40 bg-neutral-900/80 text-white shadow-lg backdrop-blur-sm transition duration-300 hover:scale-105"
>


<span id="musicIcon">
    ♪
</span>


</button>


</body>

</html>