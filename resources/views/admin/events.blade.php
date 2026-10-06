<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Acara - Admin Wedding</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-[#f3f3f1] text-neutral-900">

    <div class="mx-auto max-w-6xl px-4 py-8 sm:px-6 lg:px-8">

        {{-- Header --}}
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

            <div>
                <p class="text-[10px] tracking-[0.4em] text-neutral-500">
                    ADMIN PANEL
                </p>

                <h1 class="mt-2 text-3xl font-light tracking-wide">
                    Acara Pernikahan
                </h1>

                <p class="mt-2 text-sm text-neutral-500">
                    Kelola jadwal, tempat, alamat, dan lokasi acara.
                </p>
            </div>

            <a
                href="{{ route('admin.events.create') }}"
                class="inline-flex items-center justify-center rounded-full bg-neutral-900 px-6 py-3 text-xs tracking-[0.15em] text-white transition hover:bg-neutral-700"
            >
                + TAMBAH ACARA
            </a>

        </div>


        {{-- Success message --}}
        @if (session('success'))

            <div class="mt-6 rounded-2xl border border-neutral-200 bg-white px-5 py-4 text-sm text-neutral-700 shadow-sm">
                {{ session('success') }}
            </div>

        @endif


        {{-- Events --}}
        <div class="mt-8 space-y-5">

            @forelse ($events as $event)

                <div class="overflow-hidden rounded-3xl border border-neutral-200 bg-white shadow-sm">

                    <div class="p-6 sm:p-8">

                        {{-- Top --}}
                        <div class="flex flex-col gap-4 sm:flex-row sm:items-start sm:justify-between">

                            <div>

                                <p class="text-[10px] font-medium tracking-[0.3em] text-neutral-500">
                                    {{ strtoupper($event->type) }}
                                </p>

                                <h2 class="mt-2 text-2xl font-light">
                                    {{ $event->title }}
                                </h2>

                            </div>


                            {{-- Actions --}}
                            <div class="flex gap-2">

                                <a
                                    href="{{ route('admin.events.edit', $event) }}"
                                    class="rounded-full border border-neutral-300 px-5 py-2.5 text-[10px] tracking-[0.15em] text-neutral-700 transition hover:bg-neutral-100"
                                >
                                    EDIT
                                </a>

                                <form
                                    action="{{ route('admin.events.delete', $event) }}"
                                    method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus acara ini?')"
                                >
                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="rounded-full border border-red-200 px-5 py-2.5 text-[10px] tracking-[0.15em] text-red-600 transition hover:bg-red-50"
                                    >
                                        HAPUS
                                    </button>

                                </form>

                            </div>

                        </div>


                        {{-- Event information --}}
                        <div class="mt-7 grid gap-5 border-t border-neutral-100 pt-6 sm:grid-cols-2 lg:grid-cols-4">

                            {{-- Date --}}
                            <div>
                                <p class="text-[10px] tracking-[0.2em] text-neutral-400">
                                    TANGGAL
                                </p>

                                <p class="mt-2 text-sm text-neutral-800">
                                    {{ $event->start_at->translatedFormat('l, d F Y') }}
                                </p>
                            </div>


                            {{-- Time --}}
                            <div>
                                <p class="text-[10px] tracking-[0.2em] text-neutral-400">
                                    WAKTU
                                </p>

                                <p class="mt-2 text-sm text-neutral-800">
                                    {{ $event->start_at->format('H.i') }}

                                    @if ($event->end_at)
                                        - {{ $event->end_at->format('H.i') }}
                                    @endif

                                    WIB
                                </p>
                            </div>


                            {{-- Venue --}}
                            <div>
                                <p class="text-[10px] tracking-[0.2em] text-neutral-400">
                                    TEMPAT
                                </p>

                                <p class="mt-2 text-sm leading-6 text-neutral-800">
                                    {{ $event->venue ?: '-' }}
                                </p>
                            </div>


                            {{-- Maps --}}
                            <div>
                                <p class="text-[10px] tracking-[0.2em] text-neutral-400">
                                    GOOGLE MAPS
                                </p>

                                @if ($event->maps_url)

                                    <a
                                        href="{{ $event->maps_url }}"
                                        target="_blank"
                                        rel="noopener noreferrer"
                                        class="mt-2 inline-block text-sm text-neutral-800 underline underline-offset-4"
                                    >
                                        Buka lokasi
                                    </a>

                                @else

                                    <p class="mt-2 text-sm text-neutral-400">
                                        Belum tersedia
                                    </p>

                                @endif

                            </div>

                        </div>


                        {{-- Address --}}
                        <div class="mt-6 border-t border-neutral-100 pt-6">

                            <p class="text-[10px] tracking-[0.2em] text-neutral-400">
                                ALAMAT
                            </p>

                            <p class="mt-2 whitespace-pre-line text-sm leading-7 text-neutral-600">
                                {{ $event->address ?: '-' }}
                            </p>

                        </div>

                    </div>

                </div>

            @empty

                <div class="rounded-3xl border border-neutral-200 bg-white px-6 py-16 text-center shadow-sm">

                    <p class="text-sm text-neutral-500">
                        Belum ada acara.
                    </p>

                    <a
                        href="{{ route('admin.events.create') }}"
                        class="mt-5 inline-flex rounded-full bg-neutral-900 px-6 py-3 text-[10px] tracking-[0.15em] text-white"
                    >
                        TAMBAH ACARA
                    </a>

                </div>

            @endforelse

        </div>


        {{-- Back --}}
        <div class="mt-8">

            <a
                href="{{ route('admin.dashboard') }}"
                class="text-xs text-neutral-500 underline underline-offset-4"
            >
                ← Kembali ke Dashboard
            </a>

        </div>

    </div>

</body>
</html>