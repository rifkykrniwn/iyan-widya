<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Import Tamu - Admin</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="min-h-screen bg-neutral-100 text-neutral-800">

    <div class="max-w-3xl mx-auto px-4 py-8">

        {{-- Header --}}
        <div class="mb-8">

            <a
                href="{{ route('admin.guests') }}"
                class="inline-flex items-center text-sm text-neutral-500 hover:text-neutral-900 transition"
            >
                ← Kembali ke Daftar Tamu
            </a>

            <h1 class="mt-5 text-2xl font-semibold">
                Import Tamu
            </h1>

            <p class="text-sm text-neutral-500 mt-1">
                Tambahkan banyak tamu sekaligus menggunakan file Excel.
            </p>

        </div>

        {{-- Format Excel --}}
        <div class="rounded-3xl bg-white p-6 shadow-sm">

            <div class="mb-6">

                <p class="text-[10px] tracking-[0.2em] text-neutral-400">
                    FORMAT EXCEL
                </p>

                <h2 class="mt-2 text-lg font-semibold">
                    Nama dan Nomor HP
                </h2>

                <p class="mt-2 text-sm text-neutral-500">
                    File Excel cukup memiliki dua kolom: <strong>nama</strong>
                    dan <strong>phone</strong>.
                </p>

            </div>

            {{-- Contoh --}}
            <div class="overflow-hidden rounded-2xl border border-neutral-200">

                <table class="w-full text-sm">

                    <thead>
                        <tr class="bg-neutral-50 border-b border-neutral-200">
                            <th class="px-4 py-3 text-left font-medium">
                                nama
                            </th>

                            <th class="px-4 py-3 text-left font-medium">
                                phone
                            </th>
                        </tr>
                    </thead>

                    <tbody>

                        <tr class="border-b border-neutral-100">
                            <td class="px-4 py-3">
                                Budi Santoso
                            </td>

                            <td class="px-4 py-3">
                                081234567890
                            </td>
                        </tr>

                        <tr>
                            <td class="px-4 py-3">
                                Andi Wijaya
                            </td>

                            <td class="px-4 py-3">
                                081298765432
                            </td>
                        </tr>

                    </tbody>

                </table>

            </div>

            <p class="mt-3 text-xs text-neutral-400">
                Gunakan format nomor HP 08... dan atur kolom phone
                sebagai Text di Excel agar angka 0 di depan tidak hilang.
            </p>

            {{-- Error --}}
            @if ($errors->any())

                <div class="mt-6 rounded-2xl bg-red-50 p-4 text-sm text-red-700">

                    <ul class="list-disc pl-5 space-y-1">

                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach

                    </ul>

                </div>

            @endif

            {{-- Form --}}
            <form
                action="{{ route('admin.guests.import.store') }}"
                method="POST"
                enctype="multipart/form-data"
                class="mt-8"
            >

                @csrf

                <label class="block">

                    <span class="text-[10px] tracking-[0.2em] text-neutral-400">
                        FILE EXCEL
                    </span>

                    <input
                        type="file"
                        name="file"
                        accept=".xlsx,.xls,.csv"
                        required
                        class="mt-2 block w-full rounded-xl border border-neutral-200 bg-neutral-50 px-4 py-3 text-sm"
                    >

                </label>

                <div class="mt-6 flex flex-col-reverse gap-3 sm:flex-row sm:justify-end">

                    <a
                        href="{{ route('admin.guests') }}"
                        class="rounded-xl border border-neutral-200 px-5 py-3 text-center text-sm font-medium text-neutral-600 hover:bg-neutral-50 transition"
                    >
                        Batal
                    </a>

                    <button
                        type="submit"
                        class="rounded-xl bg-neutral-900 px-5 py-3 text-sm font-medium text-white hover:bg-neutral-800 transition"
                    >
                        📥 Import Tamu
                    </button>

                </div>

            </form>

        </div>

    </div>

</body>

</html>
