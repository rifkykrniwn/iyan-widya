<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Pengaturan Undangan - Admin</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="min-h-screen bg-neutral-100 text-neutral-800">

    <div class="max-w-4xl mx-auto px-4 py-8">

        {{-- Header --}}
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-8">

            <div>

                <a
                    href="{{ route('admin.dashboard') }}"
                    class="text-sm text-neutral-500 hover:text-neutral-800"
                >
                    ← Kembali ke Dashboard
                </a>

                <h1 class="text-2xl font-semibold mt-4">
                    Pengaturan Undangan
                </h1>

                <p class="text-sm text-neutral-500 mt-1">
                    Kelola informasi utama undangan pernikahan.
                </p>

            </div>

        </div>


        {{-- Success --}}
        @if(session('success'))

            <div class="mb-6 bg-green-50 border border-green-200 text-green-700 rounded-2xl px-5 py-4 text-sm">
                {{ session('success') }}
            </div>

        @endif


        {{-- Validation Error --}}
        @if($errors->any())

            <div class="mb-6 bg-red-50 border border-red-200 text-red-700 rounded-2xl px-5 py-4">

                <p class="font-medium text-sm mb-2">
                    Terdapat kesalahan:
                </p>

                <ul class="text-sm list-disc list-inside space-y-1">

                    @foreach($errors->all() as $error)

                        <li>
                            {{ $error }}
                        </li>

                    @endforeach

                </ul>

            </div>

        @endif


        {{-- Form --}}
        <div class="bg-white border border-neutral-200 rounded-2xl p-6">

            <form
                action="{{ route('admin.settings.update') }}"
                method="POST"
                enctype="multipart/form-data"
            >

                @csrf
                @method('PUT')


                {{-- Nama Mempelai --}}
                <div class="grid md:grid-cols-2 gap-5">

                    {{-- Mempelai Wanita --}}
                    <div>

                        <label class="block text-sm font-medium mb-2">
                            Nama Mempelai Wanita
                        </label>

                        <input
                            type="text"
                            name="bride_name"
                            value="{{ old('bride_name', $wedding->bride_name) }}"
                            required
                            class="w-full px-4 py-3 rounded-xl border border-neutral-200 bg-neutral-50 text-sm focus:outline-none focus:ring-2 focus:ring-neutral-300"
                        >

                    </div>


                    {{-- Mempelai Pria --}}
                    <div>

                        <label class="block text-sm font-medium mb-2">
                            Nama Mempelai Pria
                        </label>

                        <input
                            type="text"
                            name="groom_name"
                            value="{{ old('groom_name', $wedding->groom_name) }}"
                            required
                            class="w-full px-4 py-3 rounded-xl border border-neutral-200 bg-neutral-50 text-sm focus:outline-none focus:ring-2 focus:ring-neutral-300"
                        >

                    </div>

                </div>


                {{-- Orang Tua --}}
                <div class="grid md:grid-cols-2 gap-5 mt-5">

                    <div>

                        <label class="block text-sm font-medium mb-2">
                            Orang Tua Mempelai Wanita
                        </label>

                        <textarea
                            name="bride_parents"
                            rows="3"
                            class="w-full px-4 py-3 rounded-xl border border-neutral-200 bg-neutral-50 text-sm focus:outline-none focus:ring-2 focus:ring-neutral-300"
                        >{{ old('bride_parents', $wedding->bride_parents) }}</textarea>

                    </div>


                    <div>

                        <label class="block text-sm font-medium mb-2">
                            Orang Tua Mempelai Pria
                        </label>

                        <textarea
                            name="groom_parents"
                            rows="3"
                            class="w-full px-4 py-3 rounded-xl border border-neutral-200 bg-neutral-50 text-sm focus:outline-none focus:ring-2 focus:ring-neutral-300"
                        >{{ old('groom_parents', $wedding->groom_parents) }}</textarea>

                    </div>

                </div>


                {{-- Tanggal --}}
                <div class="mt-5">

                    <label class="block text-sm font-medium mb-2">
                        Tanggal Pernikahan
                    </label>

                    <input
                        type="date"
                        name="wedding_date"
                        value="{{ old('wedding_date', optional($wedding->wedding_date)->format('Y-m-d')) }}"
                        required
                        class="w-full px-4 py-3 rounded-xl border border-neutral-200 bg-neutral-50 text-sm focus:outline-none focus:ring-2 focus:ring-neutral-300"
                    >

                </div>


                {{-- Quote --}}
                <div class="mt-5">

                    <label class="block text-sm font-medium mb-2">
                        Quote
                    </label>

                    <textarea
                        name="quote"
                        rows="5"
                        placeholder="Masukkan quote untuk undangan..."
                        class="w-full px-4 py-3 rounded-xl border border-neutral-200 bg-neutral-50 text-sm focus:outline-none focus:ring-2 focus:ring-neutral-300"
                    >{{ old('quote', $wedding->quote) }}</textarea>

                </div>


                {{-- Alamat --}}
                <div class="mt-5">

                    <label class="block text-sm font-medium mb-2">
                        Alamat Acara
                    </label>

                    <textarea
                        name="address"
                        rows="4"
                        placeholder="Masukkan alamat lengkap acara..."
                        class="w-full px-4 py-3 rounded-xl border border-neutral-200 bg-neutral-50 text-sm focus:outline-none focus:ring-2 focus:ring-neutral-300"
                    >{{ old('address', $wedding->address) }}</textarea>

                </div>


                {{-- Maps --}}
                <div class="mt-5">

                    <label class="block text-sm font-medium mb-2">
                        Link Google Maps
                    </label>

                    <input
                        type="url"
                        name="maps_url"
                        value="{{ old('maps_url', $wedding->maps_url) }}"
                        placeholder="https://maps.google.com/..."
                        class="w-full px-4 py-3 rounded-xl border border-neutral-200 bg-neutral-50 text-sm focus:outline-none focus:ring-2 focus:ring-neutral-300"
                    >

                </div>
                {{-- Cover Image --}}
                    <div class="mt-8 border-t border-neutral-200 pt-8">

                        <label class="block text-sm font-medium mb-2">
                            Cover Image
                        </label>

                        @if ($wedding->cover_image)
                            <div class="mb-4 overflow-hidden rounded-2xl border border-neutral-200 bg-neutral-100">
                                <img
                                    src="{{ asset($wedding->cover_image) }}"
                                    alt="Cover Image"
                                    class="h-56 w-full object-cover"
                                >
                            </div>
                        @endif

                        <input
                            type="file"
                            name="cover_image"
                            accept="image/jpeg,image/png,image/webp"
                            class="block w-full rounded-xl border border-neutral-200 bg-neutral-50 px-4 py-3 text-sm"
                        >

                        <p class="mt-2 text-xs text-neutral-400">
                            Format JPG, PNG, atau WebP. Maksimal 5 MB.
                        </p>

                    </div>
                    {{-- Foto Mempelai --}}
<div class="mt-8 border-t border-neutral-200 pt-8">

    <h2 class="text-lg font-medium text-neutral-900">
        Foto Mempelai
    </h2>

    <p class="mt-1 text-sm text-neutral-500">
        Kelola foto mempelai yang ditampilkan pada halaman undangan.
    </p>


    {{-- Mempelai Wanita --}}
    <div class="mt-6">

        <label class="block text-sm font-medium mb-2">
            Foto Mempelai Wanita
        </label>

        @if ($wedding->bride_image)

            <div class="mb-4 overflow-hidden rounded-2xl border border-neutral-200 bg-neutral-100">
                <img
                    src="{{ asset($wedding->bride_image) }}"
                    alt="Foto Mempelai Wanita"
                    class="h-72 w-full object-cover"
                >
            </div>

        @endif

        <input
            type="file"
            name="bride_image"
            accept="image/jpeg,image/png,image/webp"
            class="block w-full rounded-xl border border-neutral-200 bg-neutral-50 px-4 py-3 text-sm"
        >

        <p class="mt-2 text-xs text-neutral-400">
            Format JPG, PNG, atau WebP. Maksimal 5 MB.
        </p>

    </div>


    {{-- Mempelai Pria --}}
    <div class="mt-6">

        <label class="block text-sm font-medium mb-2">
            Foto Mempelai Pria
        </label>

        @if ($wedding->groom_image)

            <div class="mb-4 overflow-hidden rounded-2xl border border-neutral-200 bg-neutral-100">
                <img
                    src="{{ asset($wedding->groom_image) }}"
                    alt="Foto Mempelai Pria"
                    class="h-72 w-full object-cover"
                >
            </div>

        @endif

        <input
            type="file"
            name="groom_image"
            accept="image/jpeg,image/png,image/webp"
            class="block w-full rounded-xl border border-neutral-200 bg-neutral-50 px-4 py-3 text-sm"
        >

        <p class="mt-2 text-xs text-neutral-400">
            Format JPG, PNG, atau WebP. Maksimal 5 MB.
        </p>

    </div>

</div>

                {{-- Button --}}
                <div class="flex justify-end mt-8">

                    <button
                        type="submit"
                        class="px-6 py-3 rounded-xl bg-neutral-900 text-white text-sm hover:bg-neutral-800"
                    >
                        Simpan Pengaturan
                    </button>

                </div>

            </form>

        </div>

    </div>
<script>
document.addEventListener("DOMContentLoaded", () => {
    const MAX_FILE_SIZE = 3 * 1024 * 1024;
    const MAX_DIMENSION = 2560;
    const MIN_QUALITY = 0.78;

    const inputs = [
        "cover_image",
        "bride_image",
        "groom_image",
    ];

    const form = document.querySelector("form");
    let pendingCompression = 0;

    function loadImage(file) {
        return new Promise((resolve, reject) => {
            const url = URL.createObjectURL(file);
            const image = new Image();

            image.onload = () => {
                URL.revokeObjectURL(url);
                resolve(image);
            };

            image.onerror = () => {
                URL.revokeObjectURL(url);
                reject(new Error("Gagal membaca gambar."));
            };

            image.src = url;
        });
    }

    function canvasToBlob(canvas, type, quality) {
        return new Promise((resolve, reject) => {
            canvas.toBlob(
                blob => {
                    if (blob) {
                        resolve(blob);
                    } else {
                        reject(new Error("Gagal melakukan kompresi gambar."));
                    }
                },
                type,
                quality
            );
        });
    }

    async function compressImage(file) {
        if (!file.type.startsWith("image/")) {
            return file;
        }

        const image = await loadImage(file);

        let width = image.naturalWidth;
        let height = image.naturalHeight;

        const scale = Math.min(
            1,
            MAX_DIMENSION / Math.max(width, height)
        );

        width = Math.round(width * scale);
        height = Math.round(height * scale);

        let quality = 0.92;

        for (let attempt = 0; attempt < 8; attempt++) {
            const canvas = document.createElement("canvas");
            canvas.width = width;
            canvas.height = height;

            const context = canvas.getContext("2d");

            if (!context) {
                throw new Error("Browser tidak mendukung canvas.");
            }

            context.drawImage(image, 0, 0, width, height);

            let blob;

            try {
                blob = await canvasToBlob(
                    canvas,
                    "image/webp",
                    quality
                );
            } catch {
                blob = await canvasToBlob(
                    canvas,
                    "image/jpeg",
                    quality
                );
            }

            if (blob.size <= MAX_FILE_SIZE) {
                const extension = blob.type === "image/webp"
                    ? "webp"
                    : "jpg";

                const filename =
                    file.name.replace(/\.[^/.]+$/, "") +
                    "." +
                    extension;

                return new File(
                    [blob],
                    filename,
                    {
                        type: blob.type,
                        lastModified: Date.now(),
                    }
                );
            }

            if (quality > MIN_QUALITY) {
                quality = Math.max(
                    MIN_QUALITY,
                    quality - 0.07
                );
            } else {
                width = Math.round(width * 0.9);
                height = Math.round(height * 0.9);
            }
        }

        throw new Error(
            "Gambar masih terlalu besar setelah dikompresi."
        );
    }

    inputs.forEach(name => {
        const input = document.querySelector(
            `input[name="${name}"]`
        );

        if (!input) {
            return;
        }

        input.addEventListener("change", async () => {
            const file = input.files?.[0];

            if (!file) {
                return;
            }

            pendingCompression++;
            input.dataset.compressing = "true";

            try {
                const compressed = await compressImage(file);

                const dataTransfer = new DataTransfer();
                dataTransfer.items.add(compressed);

                input.files = dataTransfer.files;

                console.log(
                    `${name}: ${(file.size / 1024 / 1024).toFixed(2)} MB → ` +
                    `${(compressed.size / 1024 / 1024).toFixed(2)} MB`
                );
            } catch (error) {
                console.error(error);

                input.value = "";

                alert(
                    "Gambar gagal dikompresi. Silakan pilih gambar lain."
                );
            } finally {
                input.dataset.compressing = "false";
                pendingCompression--;
            }
        });
    });

    if (form) {
        form.addEventListener("submit", event => {
            const stillCompressing = inputs.some(name => {
                const input = document.querySelector(
                    `input[name="${name}"]`
                );

                return input?.dataset.compressing === "true";
            });

            if (pendingCompression > 0 || stillCompressing) {
                event.preventDefault();

                alert(
                    "Foto masih sedang diproses. Tunggu sebentar lalu tekan Simpan lagi."
                );
            }
        });
    }
});
</script>
</body>

</html>