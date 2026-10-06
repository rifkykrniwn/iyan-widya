<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard Admin</title>

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])
</head>

<body class="min-h-screen bg-[#eeeeec]">

    <div class="mx-auto max-w-7xl px-6 py-10">

        {{-- Header --}}
        <div class="flex flex-col gap-6 sm:flex-row sm:items-center sm:justify-between">

            <div>
                <p class="text-[10px] tracking-[0.45em] text-neutral-500">
                    WEDDING INVITATION
                </p>

                <h1 class="mt-3 text-3xl font-light tracking-wide text-neutral-900">
                    Dashboard
                </h1>

                <p class="mt-2 text-sm text-neutral-500">
                    {{ $wedding->bride_name }} & {{ $wedding->groom_name }}
                </p>
            </div>

            <form
                action="{{ route('admin.logout') }}"
                method="POST"
            >
                @csrf

                <button
                    type="submit"
                    class="rounded-full border border-neutral-300 bg-white px-5 py-2.5 text-[10px] tracking-[0.2em] text-neutral-700 transition hover:bg-neutral-900 hover:text-white"
                >
                    LOGOUT
                </button>
            </form>

        </div>


        {{-- Statistics --}}
        <div class="mt-10 grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-4">

            {{-- Total Tamu --}}
            <div class="rounded-3xl bg-white p-6 shadow-sm">
                <p class="text-[10px] tracking-[0.2em] text-neutral-400">
                    TOTAL TAMU
                </p>

                <p class="mt-4 text-4xl font-light text-neutral-900">
                    {{ $totalGuests }}
                </p>

                <p class="mt-2 text-xs text-neutral-500">
                    Tamu terdaftar
                </p>
            </div>


            {{-- Sudah RSVP --}}
            <div class="rounded-3xl bg-white p-6 shadow-sm">
                <p class="text-[10px] tracking-[0.2em] text-neutral-400">
                    SUDAH RSVP
                </p>

                <p class="mt-4 text-4xl font-light text-neutral-900">
                    {{ $rsvpedGuests }}
                </p>

                <p class="mt-2 text-xs text-neutral-500">
                    Tamu sudah konfirmasi
                </p>

                <p class="mt-3 text-xs text-neutral-400">
                    {{ $totalGuests > 0 ? number_format(($rsvpedGuests / $totalGuests) * 100, 1) : 0 }}%
                    dari total tamu
                </p>
            </div>


            {{-- Belum RSVP --}}
            <div class="rounded-3xl bg-white p-6 shadow-sm">
                <p class="text-[10px] tracking-[0.2em] text-neutral-400">
                    BELUM RSVP
                </p>

                <p class="mt-4 text-4xl font-light text-neutral-900">
                    {{ $belumRsvp }}
                </p>

                <p class="mt-2 text-xs text-neutral-500">
                    Menunggu konfirmasi
                </p>
            </div>


            {{-- Orang Hadir --}}
            <div class="rounded-3xl bg-white p-6 shadow-sm">
                <p class="text-[10px] tracking-[0.2em] text-neutral-400">
                    ORANG AKAN HADIR
                </p>

                <p class="mt-4 text-4xl font-light text-neutral-900">
                    {{ $totalOrangHadir }}
                </p>

                <p class="mt-2 text-xs text-neutral-500">
                    Berdasarkan RSVP
                </p>
            </div>

        </div>
        {{-- RSVP Progress --}}
<div class="mt-5 rounded-3xl bg-white p-6 shadow-sm">

    <div class="flex flex-col gap-2 sm:flex-row sm:items-end sm:justify-between">
        <div>
            <p class="text-[10px] tracking-[0.2em] text-neutral-400">
                PROGRESS RSVP
            </p>

            <p class="mt-2 text-sm text-neutral-600">
                {{ $rsvpedGuests }} dari {{ $totalGuests }} tamu sudah melakukan konfirmasi.
            </p>
        </div>

        <p class="text-2xl font-light text-neutral-900">
            {{ $totalGuests > 0 ? number_format(($rsvpedGuests / $totalGuests) * 100, 1) : 0 }}%
        </p>
    </div>

    <div class="mt-5 h-3 overflow-hidden rounded-full bg-neutral-100">
        <div
            class="h-full rounded-full bg-neutral-900 transition-all duration-700"
            style="width: {{ $totalGuests > 0 ? min(100, ($rsvpedGuests / $totalGuests) * 100) : 0 }}%;"
        ></div>
    </div>

    <div class="mt-3 flex justify-between text-xs text-neutral-400">
        <span>Sudah RSVP: {{ $rsvpedGuests }}</span>
        <span>Belum RSVP: {{ $belumRsvp }}</span>
    </div>

</div>

        
        {{-- Attendance --}}
        <div class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-3">

            {{-- Hadir --}}
            <div class="rounded-3xl border border-neutral-200 bg-white p-6">
                <p class="text-[10px] tracking-[0.2em] text-neutral-400">
                    HADIR
                </p>

                <p class="mt-3 text-2xl font-light text-neutral-900">
                    {{ $hadir }}
                </p>

                <p class="mt-1 text-xs text-neutral-500">
                    RSVP
                </p>
            </div>


            {{-- Tidak Hadir --}}
            <div class="rounded-3xl border border-neutral-200 bg-white p-6">
                <p class="text-[10px] tracking-[0.2em] text-neutral-400">
                    TIDAK HADIR
                </p>

                <p class="mt-3 text-2xl font-light text-neutral-900">
                    {{ $tidakHadir }}
                </p>

                <p class="mt-1 text-xs text-neutral-500">
                    RSVP
                </p>
            </div>


            {{-- Ragu --}}
            <div class="rounded-3xl border border-neutral-200 bg-white p-6">
                <p class="text-[10px] tracking-[0.2em] text-neutral-400">
                    MASIH RAGU
                </p>

                <p class="mt-3 text-2xl font-light text-neutral-900">
                    {{ $ragu }}
                </p>

                <p class="mt-1 text-xs text-neutral-500">
                    RSVP
                </p>
            </div>

        </div>


        {{-- Navigation --}}
        <div class="mt-10 grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">

            <a
                href="{{ route('admin.events') }}"
                class="rounded-3xl bg-white p-6 shadow-sm transition hover:-translate-y-1"
            >
                <p class="text-[10px] tracking-[0.25em] text-neutral-400">
                    KELOLA
                </p>

                <h2 class="mt-3 text-lg font-light text-neutral-900">
                    Acara Pernikahan
                </h2>

                <p class="mt-2 text-sm text-neutral-500">
                    Kelola akad, resepsi, waktu, dan lokasi acara.
                </p>
            </a>
            <a
                href="{{ route('admin.gallery') }}"
                class="rounded-3xl bg-white p-6 shadow-sm transition hover:-translate-y-1"
            >
                <p class="text-[10px] tracking-[0.25em] text-neutral-400">
                    KELOLA
                </p>

                <h2 class="mt-3 text-lg font-light text-neutral-900">
                    Gallery
                </h2>

                <p class="mt-2 text-sm text-neutral-500">
                    Kelola foto-foto gallery undangan.
                </p>
            </a>


            <a
                href="{{ route('admin.rsvps') }}"
                class="rounded-3xl bg-white p-6 shadow-sm transition hover:-translate-y-1"
            >
                <p class="text-[10px] tracking-[0.25em] text-neutral-400">
                    KELOLA
                </p>
                

                <h2 class="mt-3 text-lg font-light text-neutral-900">
                    Data RSVP
                </h2>

                <p class="mt-2 text-sm text-neutral-500">
                    Lihat konfirmasi dan ucapan tamu.
                </p>
            </a>

            <a
                href="{{ route('admin.settings') }}"
                class="rounded-3xl bg-white p-6 shadow-sm transition hover:-translate-y-1"
            >
                <p class="text-[10px] tracking-[0.25em] text-neutral-400">
                    KELOLA
                </p>

                <h2 class="mt-3 text-lg font-light text-neutral-900">
                    Pengaturan
                </h2>

                <p class="mt-2 text-sm text-neutral-500">
                    Kelola nama, tanggal, foto, alamat, dan informasi undangan.
                </p>
            </a>
            <a
                href="{{ route('admin.gifts') }}"
                class="rounded-3xl bg-white p-6 shadow-sm transition hover:-translate-y-1"
            >
                <p class="text-[10px] tracking-[0.25em] text-neutral-400">
                    KELOLA
                </p>

                <h2 class="mt-3 text-lg font-light text-neutral-900">
                    Amplop Digital
                </h2>

                <p class="mt-2 text-sm text-neutral-500">
                    Kelola rekening dan alamat hadiah.
                </p>
            </a>
            <a
                href="{{ url('/' . $wedding->slug) }}"
                target="_blank"
                class="rounded-3xl bg-neutral-900 p-6 text-white shadow-sm transition hover:-translate-y-1"
            >
                <p class="text-[10px] tracking-[0.25em] text-neutral-400">
                    WEBSITE
                </p>

                <h2 class="mt-3 text-lg font-light">
                    Lihat Undangan
                </h2>

                <p class="mt-2 text-sm text-neutral-400">
                    Buka halaman undangan.
                </p>
            </a>

        </div>

    </div>

</body>
</html>