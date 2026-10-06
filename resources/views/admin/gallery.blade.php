<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Gallery - Admin</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-[#f5f5f3] text-neutral-900">

<div class="mx-auto max-w-6xl px-4 py-8 sm:px-6 lg:px-8">

    {{-- Header --}}
    <div class="mb-8 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <p class="text-[10px] tracking-[0.3em] text-neutral-400">
                ADMIN PANEL
            </p>

            <h1 class="mt-2 text-2xl font-light tracking-wide text-neutral-900">
                Gallery Pernikahan
            </h1>

            <p class="mt-2 text-sm text-neutral-500">
                Kelola foto yang ditampilkan pada gallery undangan.
            </p>
        </div>

        <a
            href="{{ route('admin.dashboard') }}"
            class="inline-flex w-fit items-center rounded-full border border-neutral-200 px-5 py-2.5 text-xs tracking-wide text-neutral-600 transition hover:bg-neutral-100"
        >
            KEMBALI
        </a>
    </div>


    {{-- Success --}}
    @if (session('success'))
        <div class="mb-6 rounded-2xl border border-neutral-200 bg-white px-5 py-4 text-sm text-neutral-700 shadow-sm">
            {{ session('success') }}
        </div>
    @endif


    {{-- Validation Error --}}
    @if ($errors->any())
        <div class="mb-6 rounded-2xl border border-red-200 bg-red-50 px-5 py-4 text-sm text-red-700">
            <p class="font-medium">Terjadi kesalahan:</p>

            <ul class="mt-2 list-disc space-y-1 pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    {{-- Upload --}}
    <div class="mb-10 rounded-3xl bg-white p-6 shadow-sm sm:p-8">

        <div class="mb-6">
            <p class="text-[10px] tracking-[0.25em] text-neutral-400">
                TAMBAH FOTO
            </p>

            <h2 class="mt-2 text-lg font-light text-neutral-900">
                Upload Foto Gallery
            </h2>
        </div>

        <form
            action="{{ route('admin.gallery.store') }}"
            method="POST"
            enctype="multipart/form-data"
        >
            @csrf

            <div class="grid gap-5 sm:grid-cols-2">

                {{-- Image --}}
                <div>
                    <label class="mb-2 block text-xs text-neutral-500">
                        Foto
                    </label>

                    <input
                        type="file"
                        name="image"
                        accept="image/jpeg,image/png,image/webp"
                        required
                        class="block w-full rounded-2xl border border-neutral-200 bg-neutral-50 px-4 py-3 text-sm text-neutral-600 file:mr-4 file:rounded-full file:border-0 file:bg-neutral-900 file:px-4 file:py-2 file:text-xs file:text-white hover:file:bg-neutral-700"
                    >

                    <p class="mt-2 text-xs text-neutral-400">
                        JPG, PNG, atau WEBP. Maksimal 5 MB.
                    </p>
                </div>


                {{-- Caption --}}
                <div>
                    <label class="mb-2 block text-xs text-neutral-500">
                        Caption
                    </label>

                    <input
                        type="text"
                        name="caption"
                        value="{{ old('caption') }}"
                        placeholder="Contoh: Prewedding"
                        class="w-full rounded-2xl border border-neutral-200 bg-neutral-50 px-4 py-3 text-sm text-neutral-700 outline-none transition focus:border-neutral-400"
                    >
                </div>

            </div>


            <div class="mt-6">
                <button
                    type="submit"
                    class="rounded-full bg-neutral-900 px-6 py-3 text-xs tracking-[0.15em] text-white transition hover:bg-neutral-700"
                >
                    UPLOAD FOTO
                </button>
            </div>

        </form>

    </div>


    {{-- Gallery --}}
    <div>

        <div class="mb-6 flex items-end justify-between">
            <div>
                <p class="text-[10px] tracking-[0.25em] text-neutral-400">
                    FOTO
                </p>

                <h2 class="mt-2 text-lg font-light text-neutral-900">
                    Gallery
                </h2>
            </div>

            <p class="text-xs text-neutral-400">
                {{ $galleries->count() }} foto
            </p>
        </div>


        @if ($galleries->count())

            {{-- Form Update Gallery --}}
            <form
                id="gallery-order-form"
                action="{{ route('admin.gallery.order') }}"
                method="POST"
            >
                @csrf
            </form>


            {{-- Grid Foto --}}
            <div class="grid grid-cols-2 gap-4 sm:grid-cols-3 lg:grid-cols-4">

                @foreach ($galleries as $gallery)

                    <div class="group overflow-hidden rounded-3xl bg-white shadow-sm">

                        {{-- Image --}}
                        <div class="aspect-square overflow-hidden bg-neutral-100">

                            <img
                                src="{{ asset($gallery->image) }}"
                                alt="{{ $gallery->caption ?? 'Gallery' }}"
                                class="h-full w-full object-cover transition duration-500 group-hover:scale-105"
                            >

                        </div>


                        {{-- Info --}}
                        <div class="p-4">
                            {{-- Ganti Foto --}}
                            <form
                                action="{{ route('admin.gallery.update', $gallery) }}"
                                method="POST"
                                enctype="multipart/form-data"
                                class="mb-4"
                            >
                                @csrf
                                @method('PUT')

                                <label class="mb-2 block text-xs text-neutral-400">
                                    Ganti Foto
                                </label>

                                <input
                                    type="file"
                                    name="image"
                                    accept="image/jpeg,image/png,image/webp"
                                    required
                                    class="block w-full rounded-xl border border-neutral-200 bg-neutral-50 px-3 py-2 text-xs text-neutral-600 file:mr-3 file:rounded-full file:border-0 file:bg-neutral-900 file:px-3 file:py-1.5 file:text-[10px] file:text-white hover:file:bg-neutral-700"
                                >

                                <input
                                    type="hidden"
                                    name="caption"
                                    value="{{ $gallery->caption }}"
                                >

                                <input
                                    type="hidden"
                                    name="sort_order"
                                    value="{{ $gallery->sort_order }}"
                                >

                                <button
                                    type="submit"
                                    class="mt-3 w-full rounded-full bg-neutral-900 px-4 py-2 text-xs tracking-wide text-white transition hover:bg-neutral-700"
                                >
                                    SIMPAN FOTO
                                </button>

                            </form>

                            {{-- Caption --}}
                            <div>
                                <label
                                    for="caption_{{ $gallery->id }}"
                                    class="mb-2 block text-xs text-neutral-400"
                                >
                                    Caption
                                </label>

                                <input
                                    id="caption_{{ $gallery->id }}"
                                    type="text"
                                    name="caption[{{ $gallery->id }}]"
                                    value="{{ $gallery->caption }}"
                                    maxlength="255"
                                    form="gallery-order-form"
                                    placeholder="Contoh: Prewedding"
                                    class="w-full rounded-xl border border-neutral-200 bg-neutral-50 px-3 py-2 text-sm text-neutral-700 outline-none transition focus:border-neutral-400"
                                >
                            </div>


                            {{-- Urutan --}}
                            <div class="mt-3">

                                <label
                                    for="sort_order_{{ $gallery->id }}"
                                    class="mb-2 block text-xs text-neutral-400"
                                >
                                    Urutan Foto
                                </label>

                                <input
                                    id="sort_order_{{ $gallery->id }}"
                                    type="number"
                                    name="sort_order[{{ $gallery->id }}]"
                                    value="{{ $gallery->sort_order }}"
                                    min="1"
                                    form="gallery-order-form"
                                    class="w-full rounded-xl border border-neutral-200 bg-neutral-50 px-3 py-2 text-sm text-neutral-700 outline-none transition focus:border-neutral-400"
                                >

                            </div>


                            {{-- Delete --}}
                            <form
                                action="{{ route('admin.gallery.delete', $gallery) }}"
                                method="POST"
                                class="mt-4"
                                onsubmit="return confirm('Hapus foto ini dari gallery?')"
                            >
                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="w-full rounded-full border border-neutral-200 px-4 py-2 text-xs text-neutral-500 transition hover:border-red-200 hover:bg-red-50 hover:text-red-600"
                                >
                                    HAPUS FOTO
                                </button>
                            </form>

                        </div>

                    </div>

                @endforeach

            </div>


            {{-- Simpan Perubahan --}}
            <div class="mt-6">

                <button
                    type="submit"
                    form="gallery-order-form"
                    class="rounded-full bg-neutral-900 px-6 py-3 text-xs tracking-[0.15em] text-white transition hover:bg-neutral-700"
                >
                    SIMPAN PERUBAHAN
                </button>

            </div>


        @else

            <div class="rounded-3xl bg-white px-6 py-16 text-center shadow-sm">

                <p class="text-sm text-neutral-400">
                    Belum ada foto di gallery.
                </p>

                <p class="mt-2 text-xs text-neutral-400">
                    Upload foto pertama Anda menggunakan form di atas.
                </p>

            </div>

        @endif

    </div>

</div>

</body>
</html>