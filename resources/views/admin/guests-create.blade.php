<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tambah Tamu - Admin</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="min-h-screen bg-neutral-100 text-neutral-800">

    <div class="max-w-2xl mx-auto px-4 py-8">

        {{-- Header --}}
        <div class="mb-8">

            <a
                href="{{ route('admin.guests') }}"
                class="text-sm text-neutral-500 hover:text-neutral-800"
            >
                ← Kembali ke Daftar Tamu
            </a>

            <h1 class="text-2xl font-semibold mt-4">
                Tambah Tamu
            </h1>

            <p class="text-sm text-neutral-500 mt-1">
                Tambahkan tamu baru ke daftar undangan.
            </p>

        </div>


        {{-- Form --}}
        <div class="bg-white border border-neutral-200 rounded-2xl p-6">

            <form
                action="{{ route('admin.guests.store') }}"
                method="POST"
            >

                @csrf


                {{-- Nama --}}
                <div class="mb-5">

                    <label class="block text-sm font-medium mb-2">
                        Nama Tamu
                    </label>

                    <input
                        type="text"
                        name="name"
                        value="{{ old('name') }}"
                        placeholder="Contoh: Budi Santoso"
                        required
                        class="w-full px-4 py-3 rounded-xl border border-neutral-200 bg-neutral-50 text-sm focus:outline-none focus:ring-2 focus:ring-neutral-300"
                    >

                    @error('name')
                        <p class="text-sm text-red-600 mt-2">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                {{-- Nomor HP --}}
                <div class="mb-6">

                    <label class="block text-sm font-medium mb-2">
                        Nomor HP
                    </label>

                    <input
                        type="text"
                        name="phone"
                        value="{{ old('phone') }}"
                        placeholder="Contoh: 081234567890"
                        class="w-full px-4 py-3 rounded-xl border border-neutral-200 bg-neutral-50 text-sm focus:outline-none focus:ring-2 focus:ring-neutral-300"
                    >

                    @error('phone')
                        <p class="text-sm text-red-600 mt-2">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                {{-- Button --}}
                <div class="flex gap-3">

                    <a
                        href="{{ route('admin.guests') }}"
                        class="flex-1 text-center px-4 py-3 rounded-xl border border-neutral-200 bg-white text-sm hover:bg-neutral-50"
                    >
                        Batal
                    </a>

                    <button
                        type="submit"
                        class="flex-1 px-4 py-3 rounded-xl bg-neutral-900 text-white text-sm hover:bg-neutral-800"
                    >
                        Tambah Tamu
                    </button>

                </div>

            </form>

        </div>

    </div>

</body>

</html>