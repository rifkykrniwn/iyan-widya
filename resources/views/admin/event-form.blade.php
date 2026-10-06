<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        {{ $event ? 'Edit Acara' : 'Tambah Acara' }} - Admin Wedding
    </title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-[#f3f3f1] text-neutral-900">

    <div class="mx-auto max-w-3xl px-4 py-8 sm:px-6 lg:px-8">

        {{-- Header --}}
        <div class="mb-8">

            <a
                href="{{ route('admin.events') }}"
                class="text-xs text-neutral-500 underline underline-offset-4"
            >
                ← Kembali ke Acara
            </a>

            <p class="mt-7 text-[10px] tracking-[0.4em] text-neutral-500">
                ADMIN PANEL
            </p>

            <h1 class="mt-2 text-3xl font-light tracking-wide">
                {{ $event ? 'Edit Acara' : 'Tambah Acara' }}
            </h1>

            <p class="mt-2 text-sm text-neutral-500">
                {{ $event
                    ? 'Perbarui informasi acara pernikahan.'
                    : 'Tambahkan acara baru ke undangan.'
                }}
            </p>

        </div>


        {{-- Validation errors --}}
        @if ($errors->any())

            <div class="mb-6 rounded-2xl border border-red-200 bg-red-50 px-5 py-4">

                <p class="text-sm font-medium text-red-700">
                    Terdapat kesalahan:
                </p>

                <ul class="mt-2 list-inside list-disc text-sm text-red-600">

                    @foreach ($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif


        {{-- Form --}}
        <form
            action="{{ $event
                ? route('admin.events.update', $event)
                : route('admin.events.store')
            }}"
            method="POST"
            class="rounded-3xl border border-neutral-200 bg-white p-6 shadow-sm sm:p-8"
        >

            @csrf

            @if ($event)
                @method('PUT')
            @endif


            {{-- Type --}}
            <div>

                <label
                    for="type"
                    class="text-xs font-medium tracking-[0.15em] text-neutral-700"
                >
                    TIPE ACARA
                </label>

                <input
                    id="type"
                    type="text"
                    name="type"
                    value="{{ old('type', $event?->type) }}"
                    placeholder="Contoh: akad / resepsi"
                    required
                    class="mt-2 w-full rounded-2xl border border-neutral-200 bg-neutral-50 px-4 py-3 text-sm outline-none transition focus:border-neutral-500 focus:bg-white"
                >

                <p class="mt-2 text-xs text-neutral-400">
                    Contoh: akad atau resepsi.
                </p>

            </div>


            {{-- Title --}}
            <div class="mt-6">

                <label
                    for="title"
                    class="text-xs font-medium tracking-[0.15em] text-neutral-700"
                >
                    NAMA ACARA
                </label>

                <input
                    id="title"
                    type="text"
                    name="title"
                    value="{{ old('title', $event?->title) }}"
                    placeholder="Contoh: Akad Nikah"
                    required
                    class="mt-2 w-full rounded-2xl border border-neutral-200 bg-neutral-50 px-4 py-3 text-sm outline-none transition focus:border-neutral-500 focus:bg-white"
                >

            </div>


            {{-- Date & Time --}}
            <div class="mt-6 grid gap-6 sm:grid-cols-2">

                {{-- Start --}}
                <div>

                    <label
                        for="start_at"
                        class="text-xs font-medium tracking-[0.15em] text-neutral-700"
                    >
                        MULAI
                    </label>

                    <input
                        id="start_at"
                        type="datetime-local"
                        name="start_at"
                        value="{{ old(
                            'start_at',
                            $event?->start_at?->format('Y-m-d\TH:i')
                        ) }}"
                        required
                        class="mt-2 w-full rounded-2xl border border-neutral-200 bg-neutral-50 px-4 py-3 text-sm outline-none transition focus:border-neutral-500 focus:bg-white"
                    >

                </div>


                {{-- End --}}
                <div>

                    <label
                        for="end_at"
                        class="text-xs font-medium tracking-[0.15em] text-neutral-700"
                    >
                        SELESAI
                    </label>

                    <input
                        id="end_at"
                        type="datetime-local"
                        name="end_at"
                        value="{{ old(
                            'end_at',
                            $event?->end_at?->format('Y-m-d\TH:i')
                        ) }}"
                        class="mt-2 w-full rounded-2xl border border-neutral-200 bg-neutral-50 px-4 py-3 text-sm outline-none transition focus:border-neutral-500 focus:bg-white"
                    >

                    <p class="mt-2 text-xs text-neutral-400">
                        Kosongkan jika acara tidak memiliki waktu selesai.
                    </p>

                </div>

            </div>


            {{-- Venue --}}
            <div class="mt-6">

                <label
                    for="venue"
                    class="text-xs font-medium tracking-[0.15em] text-neutral-700"
                >
                    TEMPAT
                </label>

                <input
                    id="venue"
                    type="text"
                    name="venue"
                    value="{{ old('venue', $event?->venue) }}"
                    placeholder="Contoh: Kediaman Mempelai Wanita"
                    class="mt-2 w-full rounded-2xl border border-neutral-200 bg-neutral-50 px-4 py-3 text-sm outline-none transition focus:border-neutral-500 focus:bg-white"
                >

            </div>


            {{-- Address --}}
            <div class="mt-6">

                <label
                    for="address"
                    class="text-xs font-medium tracking-[0.15em] text-neutral-700"
                >
                    ALAMAT
                </label>

                <textarea
                    id="address"
                    name="address"
                    rows="4"
                    placeholder="Masukkan alamat lengkap acara"
                    class="mt-2 w-full resize-none rounded-2xl border border-neutral-200 bg-neutral-50 px-4 py-3 text-sm leading-7 outline-none transition focus:border-neutral-500 focus:bg-white"
                >{{ old('address', $event?->address) }}</textarea>

            </div>


            {{-- Maps --}}
            <div class="mt-6">

                <label
                    for="maps_url"
                    class="text-xs font-medium tracking-[0.15em] text-neutral-700"
                >
                    LINK GOOGLE MAPS
                </label>

                <input
                    id="maps_url"
                    type="url"
                    name="maps_url"
                    value="{{ old('maps_url', $event?->maps_url) }}"
                    placeholder="https://maps.google.com/..."
                    class="mt-2 w-full rounded-2xl border border-neutral-200 bg-neutral-50 px-4 py-3 text-sm outline-none transition focus:border-neutral-500 focus:bg-white"
                >

                <p class="mt-2 text-xs text-neutral-400">
                    Salin link lokasi dari Google Maps.
                </p>

            </div>


            {{-- Buttons --}}
            <div class="mt-8 flex flex-col-reverse gap-3 sm:flex-row sm:justify-end">

                <a
                    href="{{ route('admin.events') }}"
                    class="inline-flex items-center justify-center rounded-full border border-neutral-300 px-6 py-3 text-xs tracking-[0.15em] text-neutral-700 transition hover:bg-neutral-100"
                >
                    BATAL
                </a>

                <button
                    type="submit"
                    class="inline-flex items-center justify-center rounded-full bg-neutral-900 px-6 py-3 text-xs tracking-[0.15em] text-white transition hover:bg-neutral-700"
                >
                    {{ $event ? 'SIMPAN PERUBAHAN' : 'SIMPAN ACARA' }}
                </button>

            </div>

        </form>

    </div>

</body>
</html>