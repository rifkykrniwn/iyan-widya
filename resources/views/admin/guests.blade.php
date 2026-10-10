<!DOCTYPE html>

<html lang="id">



<head>



    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">



    <title>Daftar Tamu - Admin</title>



    @vite(['resources/css/app.css', 'resources/js/app.js'])



</head>



<body class="min-h-screen bg-neutral-100 text-neutral-800">



    <div class="max-w-6xl mx-auto px-4 py-8">



        {{-- Header --}}

        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-8">



            <div>

                <h1 class="text-2xl font-semibold">

                    Daftar Tamu

                </h1>



                <p class="text-sm text-neutral-500 mt-1">

                    Kelola daftar tamu undangan

                </p>

            </div>

            {{-- Search & Filter --}}

<form

    action="{{ route('admin.guests') }}"

    method="GET"

    class="mt-8 rounded-3xl bg-white p-5 shadow-sm"

\>

    <div class="grid grid-cols-1 gap-4 md:grid-cols-[1fr_220px_auto_auto]">



        {{-- Search --}}

        <div>

            <label class="text-[10px] tracking-[0.2em] text-neutral-400">

                CARI TAMU

            </label>



            <input

                type="text"

                name="search"

                value="{{ $search ?? '' }}"

                placeholder="Cari nama tamu..."

                class="mt-2 w-full rounded-xl border border-neutral-200 bg-neutral-50 px-4 py-3 text-sm text-neutral-800 outline-none transition focus:border-neutral-400 focus:bg-white"

            >

        </div>



        {{-- Status --}}

        <div>

            <label class="text-[10px] tracking-[0.2em] text-neutral-400">

                STATUS

            </label>



            <select

                name="status"

                class="mt-2 w-full rounded-xl border border-neutral-200 bg-neutral-50 px-4 py-3 text-sm text-neutral-800 outline-none transition focus:border-neutral-400 focus:bg-white"

            >

                <option value="">Semua Status</option>

                <option value="belum_rsvp" {{ ($status ?? '') === 'belum_rsvp' ? 'selected' : '' }}>

                    Belum RSVP

                </option>

                <option value="hadir" {{ ($status ?? '') === 'hadir' ? 'selected' : '' }}>

                    Hadir

                </option>

                <option value="tidak_hadir" {{ ($status ?? '') === 'tidak_hadir' ? 'selected' : '' }}>

                    Tidak Hadir

                </option>

                <option value="ragu" {{ ($status ?? '') === 'ragu' ? 'selected' : '' }}>

                    Ragu

                </option>

            </select>

        </div>



        {{-- Cari --}}

        <div class="flex items-end">

            <button

                type="submit"

                class="w-full rounded-xl bg-neutral-900 px-5 py-3 text-xs tracking-[0.15em] text-white transition hover:bg-neutral-700"

            >

                CARI

            </button>

        </div>



        {{-- Reset --}}

        <div class="flex items-end">

            <a

                href="{{ route('admin.guests') }}"

                class="w-full rounded-xl border border-neutral-200 bg-white px-5 py-3 text-center text-xs tracking-[0.15em] text-neutral-600 transition hover:bg-neutral-100"

            >

                RESET

            </a>

        </div>



    </div>

</form>



            <div class="flex flex-wrap gap-2">



                {{-- Tambah Tamu --}}

                {{-- Import Excel --}}

                <a

                    href="{{ route('admin.guests.import') }}"

                    class="px-4 py-2 rounded-xl bg-white border border-neutral-200 text-sm hover:bg-neutral-50"

                >

                    📥 Import Excel

                </a>



                <a

                    href="{{ route('admin.guests.create') }}"

                    class="px-4 py-2 rounded-xl bg-neutral-900 text-white text-sm hover:bg-neutral-800"

                >

                    + Tambah Tamu

                </a>



                {{-- Dashboard --}}

                <a

                    href="{{ route('admin.dashboard') }}"

                    class="px-4 py-2 rounded-xl bg-white border border-neutral-200 text-sm hover:bg-neutral-50"

                >

                    ← Dashboard

                </a>



                {{-- Logout --}}

                <form action="{{ route('admin.logout') }}" method="POST">

                    @csrf



                    <button

                        type="submit"

                        class="px-4 py-2 rounded-xl bg-white border border-neutral-200 text-sm hover:bg-neutral-50"

                    >

                        Logout

                    </button>

                </form>



            </div>



        </div>





        {{-- Success Message --}}

        @if(session('success'))



            <div class="mb-6 bg-green-50 border border-green-200 text-green-700 rounded-2xl px-5 py-4 text-sm">

                {{ session('success') }}

            </div>



        @endif





        {{-- Statistik --}}

        <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">



    {{-- Total Tamu --}}

    <div class="rounded-3xl bg-white p-6 shadow-sm">

        <p class="text-[10px] tracking-[0.25em] text-neutral-400">

            TOTAL TAMU

        </p>



        <p class="mt-3 text-3xl font-light text-neutral-900">

            {{ $totalGuests }}

        </p>



        <p class="mt-2 text-sm text-neutral-400">

            Seluruh daftar tamu

        </p>

    </div>



    {{-- Sudah RSVP --}}

    <div class="rounded-3xl bg-white p-6 shadow-sm">

        <p class="text-[10px] tracking-[0.25em] text-neutral-400">

            SUDAH RSVP

        </p>



        <p class="mt-3 text-3xl font-light text-neutral-900">

            {{ $rsvpedGuests }}

        </p>



        <p class="mt-2 text-sm text-neutral-400">

            Tamu sudah konfirmasi

        </p>

    </div>



    {{-- Belum RSVP --}}

    <div class="rounded-3xl bg-white p-6 shadow-sm">

        <p class="text-[10px] tracking-[0.25em] text-neutral-400">

            BELUM RSVP

        </p>



        <p class="mt-3 text-3xl font-light text-neutral-900">

            {{ $belumRsvp }}

        </p>



        <p class="mt-2 text-sm text-neutral-400">

            Tamu belum konfirmasi

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

                                Nama Tamu

                            </th>



                            <th class="text-left px-5 py-4 font-medium">

                                No. HP

                            </th>



                            <th class="text-left px-5 py-4 font-medium">

                                Status RSVP

                            </th>



                            <th class="text-left px-5 py-4 font-medium">

                                Link Undangan

                            </th>



                            <th class="text-left px-5 py-4 font-medium">

                                Aksi

                            </th>



                        </tr>



                    </thead>





                    <tbody class="divide-y divide-neutral-100">



                        @forelse($guests as $index => $guest)



                            @php

                                $latestRsvp = $guest->rsvps

                                    ->sortByDesc('created_at')

                                    ->first();

                            @endphp



                            <tr class="hover:bg-neutral-50">



                                {{-- Nomor --}}

                                <td class="px-5 py-4 text-neutral-500">

                                    {{ $guests->firstItem() + $index }}

                                </td>





                                {{-- Nama --}}

                                <td class="px-5 py-4">



                                    <div class="font-medium">

                                        {{ $guest->name }}

                                    </div>



                                </td>





                                {{-- Nomor HP --}}

                                <td class="px-5 py-4 text-neutral-500">

                                    {{ $guest->phone ?? '-' }}

                                </td>





                                {{-- Status RSVP --}}

                                <td class="px-5 py-4">



                                    @if($latestRsvp)



                                        @if($latestRsvp->attendance === 'hadir')



                                            <span class="inline-flex px-3 py-1 rounded-full bg-green-100 text-green-700 text-xs font-medium">

                                                HADIR

                                            </span>



                                        @elseif($latestRsvp->attendance === 'tidak_hadir')



                                            <span class="inline-flex px-3 py-1 rounded-full bg-red-100 text-red-700 text-xs font-medium">

                                                TIDAK HADIR

                                            </span>



                                        @else



                                            <span class="inline-flex px-3 py-1 rounded-full bg-yellow-100 text-yellow-700 text-xs font-medium">

                                                RAGU

                                            </span>



                                        @endif



                                    @else



                                        <span class="inline-flex px-3 py-1 rounded-full bg-neutral-100 text-neutral-500 text-xs font-medium">

                                            BELUM RSVP

                                        </span>



                                    @endif



                                </td>





                                {{-- Link Undangan --}}

                                <td class="px-5 py-4">



                                    <div class="flex items-center gap-2">



                                        <input

                                            id="link-{{ $guest->id }}"

                                            type="text"

                                            readonly

                                            value="{{ url($guest->slug) }}"

                                            class="w-64 px-3 py-2 rounded-lg border border-neutral-200 bg-neutral-50 text-xs"

                                        >



                                        <button

                                            type="button"

                                            onclick="copyGuestLink({{ $guest->id }})"

                                            class="px-3 py-2 rounded-lg bg-neutral-900 text-white text-xs hover:bg-neutral-800"

                                        >

                                            Copy

                                        </button>



                                    </div>



                                </td>





                                {{-- Aksi --}}

<td class="px-5 py-4">



    <div class="flex items-center gap-2">

        @if($guest->phone)



    @php

        $phone = preg_replace('/[^0-9]/', '', $guest->phone);



        if (str_starts_with($phone, '0')) {

            $phone = '62' . substr($phone, 1);

        }



        $invitationUrl = url($guest->slug);



        $message = "Halo {$guest->name},\n\n"

            . "Kami mengundang Anda untuk hadir di acara pernikahan kami.\n\n"

            . "Berikut link undangan Anda:\n"

            . $invitationUrl

            . "\n\nTerima kasih 🙏";



        $whatsappUrl = 'https://wa.me/' . $phone

            . '?text=' . urlencode($message);

    @endphp



    <a

        href="{{ $whatsappUrl }}"

        target="_blank"

        rel="noopener noreferrer"

        class="inline-flex px-3 py-2 rounded-lg bg-green-50 text-green-700 border border-green-100 text-xs hover:bg-green-100"

    >

        WhatsApp

    </a>



@endif

        {{-- Edit --}}

        <a

            href="{{ route('admin.guests.edit', $guest->id) }}"

            class="inline-flex px-3 py-2 rounded-lg border border-neutral-200 bg-white text-xs hover:bg-neutral-50"

        >

            Edit

        </a>





        {{-- Hapus --}}

        <form

            action="{{ route('admin.guests.delete', $guest->id) }}"

            method="POST"

            onsubmit="return confirm('Apakah Anda yakin ingin menghapus tamu {{ addslashes($guest->name) }}?')"

        >



            @csrf

            @method('DELETE')



            <button

                type="submit"

                class="inline-flex px-3 py-2 rounded-lg bg-red-50 text-red-600 border border-red-100 text-xs hover:bg-red-100"

            >

                Hapus

            </button>



        </form>



    </div>



</td>



                            </tr>



                        @empty



                            <tr>



                                <td

                                    colspan="6"

                                    class="px-5 py-10 text-center text-neutral-500"

                                >

                                    Belum ada data tamu.

                                </td>



                            </tr>



                        @endforelse



                    </tbody>





                </table>



                



            </div>



        </div>





        
        {{-- Pagination: tampil di desktop dan mobile --}}
        @if ($guests->hasPages())
            <div class="mt-6 w-full rounded-3xl border border-neutral-200 bg-white p-4 shadow-sm">
                <div class="mb-4 text-center text-xs text-neutral-500">
                    Menampilkan
                    <span class="font-semibold text-neutral-800">{{ $guests->firstItem() ?? 0 }}–{{ $guests->lastItem() ?? 0 }}</span>
                    dari
                    <span class="font-semibold text-neutral-800">{{ $guests->total() }}</span>
                    tamu
                </div>

                <nav aria-label="Navigasi halaman tamu" class="flex w-full items-center justify-between gap-2">
                    @if ($guests->onFirstPage())
                        <span aria-disabled="true" class="flex min-h-10 items-center justify-center rounded-xl bg-neutral-100 px-3 text-sm text-neutral-400">
                            ← Sebelumnya
                        </span>
                    @else
                        <a href="{{ $guests->previousPageUrl() }}" class="flex min-h-10 items-center justify-center rounded-xl bg-neutral-100 px-3 text-sm text-neutral-700 transition hover:bg-neutral-200">
                            ← Sebelumnya
                        </a>
                    @endif

                    <span class="shrink-0 text-sm font-semibold text-neutral-700">
                        {{ $guests->currentPage() }}/{{ $guests->lastPage() }}
                    </span>

                    @if ($guests->hasMorePages())
                        <a href="{{ $guests->nextPageUrl() }}" class="flex min-h-10 items-center justify-center rounded-xl bg-neutral-900 px-3 text-sm text-white transition hover:bg-neutral-700">
                            Berikutnya →
                        </a>
                    @else
                        <span aria-disabled="true" class="flex min-h-10 items-center justify-center rounded-xl bg-neutral-100 px-3 text-sm text-neutral-400">
                            Berikutnya →
                        </span>
                    @endif
                </nav>
            </div>
        @endif

{{-- Mobile --}}

        <div class="md:hidden space-y-4">



            @forelse($guests as $index => $guest)



                @php

                    $latestRsvp = $guest->rsvps

                        ->sortByDesc('created_at')

                        ->first();

                @endphp



                <div class="bg-white border border-neutral-200 rounded-2xl p-5">



                    {{-- Nama + Status --}}

                    <div class="flex items-start justify-between gap-3">



                        <div>



                            <p class="text-xs text-neutral-400">

                                Tamu #{{ $guests->firstItem() + $index }}

                            </p>



                            <h2 class="font-semibold mt-1">

                                {{ $guest->name }}

                            </h2>



                            <p class="text-sm text-neutral-500 mt-1">

                                {{ $guest->phone ?? '-' }}

                            </p>



                        </div>





                        {{-- Status --}}

                        @if($latestRsvp)



                            @if($latestRsvp->attendance === 'hadir')



                                <span class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-xs font-medium">

                                    HADIR

                                </span>



                            @elseif($latestRsvp->attendance === 'tidak_hadir')



                                <span class="px-3 py-1 rounded-full bg-red-100 text-red-700 text-xs font-medium">

                                    TIDAK HADIR

                                </span>



                            @else



                                <span class="px-3 py-1 rounded-full bg-yellow-100 text-yellow-700 text-xs font-medium">

                                    RAGU

                                </span>



                            @endif



                        @else



                            <span class="px-3 py-1 rounded-full bg-neutral-100 text-neutral-500 text-xs font-medium">

                                BELUM RSVP

                            </span>



                        @endif



                    </div>





                    {{-- Link --}}

                    <div class="mt-5">



                        <p class="text-xs text-neutral-500 mb-2">

                            Link Undangan

                        </p>



                        <input

                            id="mobile-link-{{ $guest->id }}"

                            type="text"

                            readonly

                            value="{{ url($guest->slug)}}"

                            class="w-full px-3 py-2 rounded-lg border border-neutral-200 bg-neutral-50 text-xs"

                        >



                        <button

                            type="button"

                            onclick="copyGuestLink('mobile-{{ $guest->id }}')"

                            class="w-full mt-2 px-3 py-2 rounded-lg bg-neutral-900 text-white text-sm hover:bg-neutral-800"

                        >

                            Copy Link

                        </button>

                        @if($guest->phone)



    @php

        $phone = preg_replace('/[^0-9]/', '', $guest->phone);



        if (str_starts_with($phone, '0')) {

            $phone = '62' . substr($phone, 1);

        }



        $invitationUrl = url($guest->slug);



        $message = "Halo {$guest->name},\n\n"

            . "Kami mengundang Anda untuk hadir di acara pernikahan kami.\n\n"

            . "Berikut link undangan Anda:\n"

            . $invitationUrl

            . "\n\nTerima kasih 🙏";



        $whatsappUrl = 'https://wa.me/' . $phone

            . '?text=' . urlencode($message);

    @endphp



    <a

        href="{{ $whatsappUrl }}"

        target="_blank"

        rel="noopener noreferrer"

        class="block w-full mt-2 px-3 py-2 rounded-lg bg-green-50 text-green-700 border border-green-100 text-center text-sm hover:bg-green-100"

    >

        Kirim via WhatsApp

    </a>



@endif



                        {{-- Edit --}}

                        <a

                            href="{{ route('admin.guests.edit', $guest->id) }}"

                            class="block w-full mt-2 px-3 py-2 rounded-lg border border-neutral-200 bg-white text-center text-sm hover:bg-neutral-50"

                        >

                            Edit Tamu

                        </a>

                        <form

    action="{{ route('admin.guests.delete', $guest->id) }}"

    method="POST"

    onsubmit="return confirm('Apakah Anda yakin ingin menghapus tamu {{ addslashes($guest->name) }}?')"

\>

    @csrf

    @method('DELETE')



    <button

        type="submit"

        class="w-full mt-2 px-3 py-2 rounded-lg bg-red-50 text-red-600 border border-red-100 text-sm hover:bg-red-100"

    >

        Hapus Tamu

    </button>



</form>



                    </div>



                </div>



            @empty



                <div class="bg-white border border-neutral-200 rounded-2xl p-8 text-center text-neutral-500">

                    Belum ada data tamu.

                </div>



            @endforelse



        </div>



    </div>





    {{-- Copy Link Script --}}

    <script>



        function copyGuestLink(id) {



            let input;



            if (String(id).startsWith('mobile-')) {



                input = document.getElementById(

                    'mobile-link-' + String(id).replace('mobile-', '')

                );



            } else {



                input = document.getElementById(

                    'link-' + id

                );



            }



            if (!input) {

                return;

            }



            navigator.clipboard.writeText(input.value)

                .then(() => {



                    alert('Link undangan berhasil disalin.');



                })

                .catch(() => {



                    input.select();

                    document.execCommand('copy');



                    alert('Link undangan berhasil disalin.');



                });



        }



    </script>



</body>



</html>