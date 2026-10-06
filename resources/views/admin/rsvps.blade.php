<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Data RSVP - Admin</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-neutral-100 text-neutral-800">

    <div class="max-w-7xl mx-auto px-4 py-8">

        {{-- Header --}}
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-8">

            <div>
                <h1 class="text-2xl font-semibold">
                    Data RSVP
                </h1>

                <p class="text-sm text-neutral-500 mt-1">
                    Daftar konfirmasi kehadiran tamu
                </p>
            </div>

            <div class="flex gap-2">
                <a
                    href="{{ route('admin.rsvps.export', [
                        'search' => $search ?? '',
                        'status' => $status ?? '',
                    ]) }}"
                    class="px-4 py-2 rounded-xl bg-green-600 text-white text-sm hover:bg-green-700"
                >
                    Export Excel
                </a>

                <a
                    href="{{ route('admin.dashboard') }}"
                    class="px-4 py-2 rounded-xl bg-white border border-neutral-200 text-sm hover:bg-neutral-50"
                >
                    ← Dashboard
                </a>

                <form action="{{ route('admin.logout') }}" method="POST">
                    @csrf

                    <button
                        type="submit"
                        class="px-4 py-2 rounded-xl bg-neutral-900 text-white text-sm hover:bg-neutral-800"
                    >
                        Logout
                    </button>
                </form>

            </div>

        </div>
        {{-- Search & Filter --}}
<div class="bg-white border border-neutral-200 rounded-2xl p-5 mb-6">

    <form
        action="{{ route('admin.rsvps') }}"
        method="GET"
        class="flex flex-col md:flex-row gap-3"
    >

        {{-- Search --}}
        <div class="flex-1">

            <label class="block text-xs text-neutral-500 mb-2">
                Cari nama
            </label>

            <input
                type="text"
                name="search"
                value="{{ $search ?? '' }}"
                placeholder="Cari nama tamu atau pengisi RSVP..."
                class="w-full px-4 py-3 rounded-xl border border-neutral-200 bg-neutral-50 text-sm focus:outline-none focus:ring-2 focus:ring-neutral-300"
            >

        </div>


        {{-- Status --}}
        <div class="md:w-52">

            <label class="block text-xs text-neutral-500 mb-2">
                Status RSVP
            </label>

            <select
                name="status"
                class="w-full px-4 py-3 rounded-xl border border-neutral-200 bg-neutral-50 text-sm focus:outline-none focus:ring-2 focus:ring-neutral-300"
            >

                <option value="">
                    Semua Status
                </option>

                <option
                    value="hadir"
                    {{ ($status ?? '') === 'hadir' ? 'selected' : '' }}
                >
                    Hadir
                </option>

                <option
                    value="tidak_hadir"
                    {{ ($status ?? '') === 'tidak_hadir' ? 'selected' : '' }}
                >
                    Tidak Hadir
                </option>

                <option
                    value="ragu"
                    {{ ($status ?? '') === 'ragu' ? 'selected' : '' }}
                >
                    Ragu
                </option>

            </select>

        </div>


        {{-- Button --}}
        <div class="flex items-end gap-2">

            <button
                type="submit"
                class="px-5 py-3 rounded-xl bg-neutral-900 text-white text-sm hover:bg-neutral-800"
            >
                Cari
            </button>

            @if(($search ?? '') || ($status ?? ''))

                <a
                    href="{{ route('admin.rsvps') }}"
                    class="px-5 py-3 rounded-xl border border-neutral-200 bg-white text-sm hover:bg-neutral-50"
                >
                    Reset
                </a>

            @endif

        </div>

    </form>

</div>

        {{-- Statistik RSVP --}}
@php
    $totalRsvp = $rsvps->count();

    $totalHadir = $rsvps
        ->where('attendance', 'hadir')
        ->count();

    $totalTidakHadir = $rsvps
        ->where('attendance', 'tidak_hadir')
        ->count();

    $totalRagu = $rsvps
        ->where('attendance', 'ragu')
        ->count();

    $totalOrangHadir = $rsvps
        ->where('attendance', 'hadir')
        ->sum('guest_count');
@endphp

<div class="grid grid-cols-2 gap-4 lg:grid-cols-4 mb-6">

    {{-- Total RSVP --}}
    <div class="bg-white border border-neutral-200 rounded-2xl p-5">
        <p class="text-xs text-neutral-500">
            Total RSVP
        </p>

        <p class="text-3xl font-semibold mt-2">
            {{ $totalRsvp }}
        </p>
    </div>


    {{-- Hadir --}}
    <div class="bg-white border border-neutral-200 rounded-2xl p-5">
        <p class="text-xs text-neutral-500">
            Hadir
        </p>

        <p class="text-3xl font-semibold mt-2 text-green-600">
            {{ $totalHadir }}
        </p>

        <p class="mt-1 text-xs text-neutral-400">
            {{ $totalOrangHadir }} orang
        </p>
    </div>


    {{-- Tidak Hadir --}}
    <div class="bg-white border border-neutral-200 rounded-2xl p-5">
        <p class="text-xs text-neutral-500">
            Tidak Hadir
        </p>

        <p class="text-3xl font-semibold mt-2 text-red-600">
            {{ $totalTidakHadir }}
        </p>
    </div>


    {{-- Ragu --}}
    <div class="bg-white border border-neutral-200 rounded-2xl p-5">
        <p class="text-xs text-neutral-500">
            Ragu
        </p>

        <p class="text-3xl font-semibold mt-2 text-yellow-600">
            {{ $totalRagu }}
        </p>
    </div>

</div>


        {{-- Desktop Table --}}
        <div class="hidden md:block bg-white border border-neutral-200 rounded-2xl overflow-hidden">

            <div class="overflow-x-auto">

                <table class="w-full text-sm">

                    <thead class="bg-neutral-50 border-b border-neutral-200">

                        <tr>

                            <th class="text-left px-5 py-4 font-medium">
                                #
                            </th>

                            <th class="text-left px-5 py-4 font-medium">
                                Tamu
                            </th>

                            <th class="text-left px-5 py-4 font-medium">
                                Nama Pengisi
                            </th>

                            <th class="text-left px-5 py-4 font-medium">
                                Status
                            </th>

                            <th class="text-left px-5 py-4 font-medium">
                                Jumlah
                            </th>

                            <th class="text-left px-5 py-4 font-medium">
                                Pesan
                            </th>

                            <th class="text-left px-5 py-4 font-medium">
                                Waktu
                            </th>

                        </tr>

                    </thead>


                    <tbody class="divide-y divide-neutral-100">

                        @forelse($rsvps as $index => $rsvp)

                            <tr class="hover:bg-neutral-50">

                                {{-- Nomor --}}
                                <td class="px-5 py-4 text-neutral-500">
                                    {{ $index + 1 }}
                                </td>


                                {{-- Tamu --}}
                                <td class="px-5 py-4">

                                    <div class="font-medium">
                                        {{ $rsvp->guest?->name ?? '-' }}
                                    </div>

                                </td>


                                {{-- Nama Pengisi --}}
                                <td class="px-5 py-4">

                                    {{ $rsvp->name }}

                                </td>


                                {{-- Status --}}
                                <td class="px-5 py-4">

                                    @if($rsvp->attendance === 'hadir')

                                        <span class="inline-flex px-3 py-1 rounded-full bg-green-100 text-green-700 text-xs font-medium">
                                            HADIR
                                        </span>

                                    @elseif($rsvp->attendance === 'tidak_hadir')

                                        <span class="inline-flex px-3 py-1 rounded-full bg-red-100 text-red-700 text-xs font-medium">
                                            TIDAK HADIR
                                        </span>

                                    @else

                                        <span class="inline-flex px-3 py-1 rounded-full bg-yellow-100 text-yellow-700 text-xs font-medium">
                                            RAGU
                                        </span>

                                    @endif

                                </td>


                                {{-- Jumlah --}}
                                <td class="px-5 py-4">

                                    {{ $rsvp->guest_count }} orang

                                </td>


                                {{-- Pesan --}}
<td class="px-5 py-4 max-w-xs">

    @if ($rsvp->message)

        <p class="truncate text-neutral-600">
            {{ $rsvp->message }}
        </p>

        <button
            type="button"
            class="mt-2 text-xs text-neutral-500 underline underline-offset-4 hover:text-neutral-900"
            onclick="openRsvpMessage(@js($rsvp->message), @js($rsvp->name))"
        >
            Lihat Pesan
        </button>

    @else

        <span class="text-neutral-400">
            -
        </span>

    @endif

</td>


                                {{-- Waktu --}}
                                <td class="px-5 py-4 text-neutral-500 whitespace-nowrap">

                                    {{ $rsvp->created_at->format('d/m/Y H:i') }}

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td
                                    colspan="7"
                                    class="px-5 py-10 text-center text-neutral-500"
                                >
                                    Belum ada data RSVP.
                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>


        {{-- Mobile --}}
        <div class="md:hidden space-y-4">

            @forelse($rsvps as $index => $rsvp)

                <div class="bg-white border border-neutral-200 rounded-2xl p-5">

                    <div class="flex items-start justify-between gap-3">

                        <div>

                            <p class="text-xs text-neutral-400">
                                RSVP #{{ $index + 1 }}
                            </p>

                            <h2 class="font-semibold mt-1">
                                {{ $rsvp->guest?->name ?? 'Tamu Umum' }}
                            </h2>

                            <p class="text-sm text-neutral-500 mt-1">
                                {{ $rsvp->name }}
                            </p>

                        </div>


                        @if($rsvp->attendance === 'hadir')

                            <span class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-xs font-medium">
                                HADIR
                            </span>

                        @elseif($rsvp->attendance === 'tidak_hadir')

                            <span class="px-3 py-1 rounded-full bg-red-100 text-red-700 text-xs font-medium">
                                TIDAK HADIR
                            </span>

                        @else

                            <span class="px-3 py-1 rounded-full bg-yellow-100 text-yellow-700 text-xs font-medium">
                                RAGU
                            </span>

                        @endif

                    </div>


                    <div class="grid grid-cols-2 gap-4 mt-5">

                        <div>

                            <p class="text-xs text-neutral-400">
                                Jumlah
                            </p>

                            <p class="text-sm mt-1">
                                {{ $rsvp->guest_count }} orang
                            </p>

                        </div>


                        <div>

                            <p class="text-xs text-neutral-400">
                                Waktu
                            </p>

                            <p class="text-sm mt-1">
                                {{ $rsvp->created_at->format('d/m/Y H:i') }}
                            </p>

                        </div>

                    </div>


                    <div class="mt-5">

    <p class="text-xs text-neutral-400">
        Pesan
    </p>

    @if ($rsvp->message)

        <p class="mt-1 truncate text-sm text-neutral-600">
            {{ $rsvp->message }}
        </p>

        <button
            type="button"
            class="mt-2 text-xs text-neutral-500 underline underline-offset-4 hover:text-neutral-900"
            onclick="openRsvpMessage(@js($rsvp->message), @js($rsvp->name))"
        >
            Lihat Pesan
        </button>

    @else

        <p class="mt-1 text-sm text-neutral-400">
            -
        </p>

    @endif

</div>

                </div>

            @empty

                <div class="bg-white border border-neutral-200 rounded-2xl p-8 text-center text-neutral-500">
                    Belum ada data RSVP.
                </div>

            @endforelse

        </div>

    </div>
{{-- Modal Pesan RSVP --}}
<div
    id="rsvpMessageModal"
    class="fixed inset-0 z-50 hidden items-center justify-center bg-black/40 px-4 backdrop-blur-sm"
>
    <div
        class="w-full max-w-lg rounded-3xl bg-white p-6 shadow-xl sm:p-8"
    >

        {{-- Header --}}
        <div class="flex items-start justify-between gap-4">

            <div>
                <p class="text-[10px] tracking-[0.25em] text-neutral-400">
                    PESAN RSVP
                </p>

                <h2
                    id="rsvpMessageName"
                    class="mt-2 text-lg font-light text-neutral-900"
                >
                    -
                </h2>
            </div>

            <button
                type="button"
                onclick="closeRsvpMessage()"
                class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full border border-neutral-200 text-neutral-500 transition hover:bg-neutral-100"
                aria-label="Tutup"
            >
                ×
            </button>

        </div>


        {{-- Message --}}
        <div class="mt-6 rounded-2xl bg-neutral-50 p-5">

            <p
                id="rsvpMessageContent"
                class="whitespace-pre-line text-sm leading-7 text-neutral-700"
            >
            </p>

        </div>


        {{-- Close --}}
        <div class="mt-6 text-right">

            <button
                type="button"
                onclick="closeRsvpMessage()"
                class="rounded-full bg-neutral-900 px-6 py-3 text-xs tracking-[0.15em] text-white transition hover:bg-neutral-700"
            >
                TUTUP
            </button>

        </div>

    </div>
</div>
</body>
</html>