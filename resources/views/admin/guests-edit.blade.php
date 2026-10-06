<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Tamu - Admin</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-[#f5f5f3] text-neutral-900">

<div class="mx-auto max-w-3xl px-4 py-8 sm:px-6 lg:px-8">

    {{-- Header --}}
    <div class="mb-8 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

        <div>
            <p class="text-[10px] tracking-[0.3em] text-neutral-400">
                ADMIN PANEL
            </p>

            <h1 class="mt-2 text-2xl font-light tracking-wide text-neutral-900">
                Edit Tamu
            </h1>

            <p class="mt-2 text-sm text-neutral-500">
                Perbarui informasi tamu undangan.
            </p>
        </div>

        <a
            href="{{ route('admin.guests') }}"
            class="inline-flex w-fit items-center rounded-full border border-neutral-200 bg-white px-5 py-2.5 text-xs tracking-wide text-neutral-600 transition hover:bg-neutral-100"
        >
            KEMBALI
        </a>

    </div>


    {{-- Form --}}
    <div class="rounded-3xl bg-white p-6 shadow-sm sm:p-8">

        <div class="mb-8">

            <p class="text-[10px] tracking-[0.25em] text-neutral-400">
                INFORMASI TAMU
            </p>

            <h2 class="mt-2 text-lg font-light text-neutral-900">
                {{ $guest->name }}
            </h2>

        </div>


        <form
            action="{{ route('admin.guests.update', $guest->id) }}"
            method="POST"
        >
            @csrf
            @method('PUT')


            {{-- Nama Tamu --}}
            <div class="mb-6">

                <label
                    for="name"
                    class="mb-2 block text-xs text-neutral-500"
                >
                    Nama Tamu
                </label>

                <input
                    id="name"
                    type="text"
                    name="name"
                    value="{{ old('name', $guest->name) }}"
                    required
                    class="w-full rounded-2xl border border-neutral-200 bg-neutral-50 px-4 py-3 text-sm text-neutral-700 outline-none transition focus:border-neutral-400 focus:bg-white"
                >

                @error('name')
                    <p class="mt-2 text-xs text-red-600">
                        {{ $message }}
                    </p>
                @enderror

            </div>


            {{-- Nomor HP --}}
            <div class="mb-8">

                <label
                    for="phone"
                    class="mb-2 block text-xs text-neutral-500"
                >
                    Nomor HP
                </label>

                <input
                    id="phone"
                    type="text"
                    name="phone"
                    value="{{ old('phone', $guest->phone) }}"
                    placeholder="Contoh: 081234567890"
                    class="w-full rounded-2xl border border-neutral-200 bg-neutral-50 px-4 py-3 text-sm text-neutral-700 outline-none transition focus:border-neutral-400 focus:bg-white"
                >

                @error('phone')
                    <p class="mt-2 text-xs text-red-600">
                        {{ $message }}
                    </p>
                @enderror

            </div>


            {{-- Tombol --}}
            <div class="flex flex-col-reverse gap-3 sm:flex-row">

                <a
                    href="{{ route('admin.guests') }}"
                    class="flex-1 rounded-full border border-neutral-200 bg-white px-5 py-3 text-center text-xs tracking-wide text-neutral-600 transition hover:bg-neutral-100"
                >
                    BATAL
                </a>

                <button
                    type="submit"
                    class="flex-1 rounded-full bg-neutral-900 px-5 py-3 text-xs tracking-[0.15em] text-white transition hover:bg-neutral-700"
                >
                    SIMPAN PERUBAHAN
                </button>

            </div>

        </form>

    </div>

</div>

</body>
</html>