<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Amplop Digital - Admin</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-neutral-50 text-neutral-900">

    {{-- Header --}}
    <header class="border-b border-neutral-200 bg-white">
        <div class="mx-auto flex max-w-6xl items-center justify-between px-5 py-5">

            <div>
                <p class="text-[10px] tracking-[0.25em] text-neutral-400">
                    ADMIN
                </p>

                <h1 class="mt-2 text-xl font-light">
                    Amplop Digital
                </h1>

                <p class="mt-1 text-sm text-neutral-400">
                    {{ $wedding->groom_name }} & {{ $wedding->bride_name }}
                </p>
            </div>

            <a
                href="{{ route('admin.dashboard') }}"
                class="rounded-xl bg-neutral-100 px-4 py-2 text-xs text-neutral-600 transition hover:bg-neutral-900 hover:text-white"
            >
                ← Dashboard
            </a>

        </div>
    </header>


    {{-- Content --}}
    <main class="mx-auto max-w-6xl px-5 py-8">

        {{-- Success Message --}}
        @if (session('success'))
            <div class="mb-6 rounded-2xl bg-neutral-900 px-5 py-4 text-sm text-white">
                {{ session('success') }}
            </div>
        @endif


        {{-- Form Tambah --}}
        <div class="rounded-3xl bg-white p-6 shadow-sm">

            <div class="mb-6">
                <p class="text-[10px] tracking-[0.25em] text-neutral-400">
                    TAMBAH DATA
                </p>

                <h2 class="mt-2 text-xl font-light">
                    Tambahkan Rekening / Alamat
                </h2>
            </div>


            @if ($errors->any())
                <div class="mb-6 rounded-2xl bg-red-50 p-4 text-sm text-red-600">
                    <ul class="list-disc space-y-1 pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


            <form
                action="{{ route('admin.gifts.store') }}"
                method="POST"
                class="space-y-5"
            >
                @csrf

                {{-- Jenis --}}
                <div>
                    <label class="mb-2 block text-xs text-neutral-500">
                        Jenis
                    </label>

                    <select
                        name="type"
                        id="giftType"
                        class="w-full rounded-2xl border border-neutral-200 bg-white px-4 py-3 text-sm outline-none focus:border-neutral-900"
                    >
                        <option value="bank">
                            Rekening Bank
                        </option>

                        <option value="address">
                            Alamat Pengiriman
                        </option>
                    </select>
                </div>


                {{-- Bank --}}
                <div id="bankFields" class="space-y-5">

                    <div>
                        <label class="mb-2 block text-xs text-neutral-500">
                            Nama Bank
                        </label>

                        <input
                            type="text"
                            name="bank_name"
                            value="{{ old('bank_name') }}"
                            placeholder="Contoh: BCA"
                            class="w-full rounded-2xl border border-neutral-200 px-4 py-3 text-sm outline-none focus:border-neutral-900"
                        >
                    </div>


                    <div>
                        <label class="mb-2 block text-xs text-neutral-500">
                            Nomor Rekening
                        </label>

                        <input
                            type="text"
                            name="account_number"
                            value="{{ old('account_number') }}"
                            placeholder="Contoh: 1234567890"
                            class="w-full rounded-2xl border border-neutral-200 px-4 py-3 text-sm outline-none focus:border-neutral-900"
                        >
                    </div>


                    <div>
                        <label class="mb-2 block text-xs text-neutral-500">
                            Atas Nama
                        </label>

                        <input
                            type="text"
                            name="account_name"
                            value="{{ old('account_name') }}"
                            placeholder="Contoh: Widya"
                            class="w-full rounded-2xl border border-neutral-200 px-4 py-3 text-sm outline-none focus:border-neutral-900"
                        >
                    </div>

                </div>


                {{-- Address --}}
                <div id="addressFields" class="hidden">

                    <label class="mb-2 block text-xs text-neutral-500">
                        Alamat Pengiriman
                    </label>

                    <textarea
                        name="address"
                        rows="5"
                        placeholder="Masukkan alamat lengkap..."
                        class="w-full rounded-2xl border border-neutral-200 px-4 py-3 text-sm outline-none focus:border-neutral-900"
                    >{{ old('address') }}</textarea>

                </div>


                {{-- Submit --}}
                <button
                    type="submit"
                    class="w-full rounded-2xl bg-neutral-900 px-5 py-3 text-sm text-white transition hover:bg-neutral-700"
                >
                    + Tambahkan Data
                </button>

            </form>

        </div>


        {{-- Daftar Gift --}}
        <div class="mt-8">

            <div class="mb-5">
                <p class="text-[10px] tracking-[0.25em] text-neutral-400">
                    DATA TERSIMPAN
                </p>

                <h2 class="mt-2 text-xl font-light">
                    Rekening & Alamat
                </h2>
            </div>


            <div class="grid gap-5 md:grid-cols-2">

                @forelse ($gifts as $gift)

                    <div class="rounded-3xl bg-white p-6 shadow-sm">

                        @if ($gift->type === 'bank')

                            <p class="text-[10px] tracking-[0.2em] text-neutral-400">
                                REKENING BANK
                            </p>

                            <h3 class="mt-3 text-lg font-light">
                                {{ $gift->bank_name }}
                            </h3>

                            <p class="mt-4 text-2xl tracking-wider">
                                {{ $gift->account_number }}
                            </p>

                            <p class="mt-2 text-sm text-neutral-500">
                                a.n. {{ $gift->account_name }}
                            </p>

                        @else

                            <p class="text-[10px] tracking-[0.2em] text-neutral-400">
                                ALAMAT PENGIRIMAN
                            </p>

                            <p class="mt-4 whitespace-pre-line text-sm leading-7 text-neutral-600">
                                {{ $gift->address }}
                            </p>

                        @endif


                        {{-- Delete --}}
                        <div class="mt-6 flex flex-wrap gap-2">

    {{-- Edit --}}
    <button
        type="button"
        onclick="editGift({{ $gift->id }})"
        class="rounded-xl bg-neutral-100 px-4 py-2 text-xs text-neutral-600 transition hover:bg-neutral-900 hover:text-white"
    >
        Edit
    </button>


    {{-- Hapus --}}
    <form
        action="{{ route('admin.gifts.delete', $gift) }}"
        method="POST"
        onsubmit="return confirm('Hapus data ini?')"
    >
        @csrf
        @method('DELETE')

        <button
            type="submit"
            class="rounded-xl bg-red-50 px-4 py-2 text-xs text-red-500 transition hover:bg-red-500 hover:text-white"
        >
            Hapus
        </button>
    </form>

</div>

                    </div>

                @empty

                    <div class="rounded-3xl bg-white p-8 text-center shadow-sm md:col-span-2">

                        <p class="text-sm text-neutral-400">
                            Belum ada rekening atau alamat hadiah.
                        </p>

                    </div>

                @endforelse

            </div>

        </div>

    </main>


    {{-- Toggle Jenis Gift --}}
    <script>
        const giftType = document.getElementById('giftType');
        const bankFields = document.getElementById('bankFields');
        const addressFields = document.getElementById('addressFields');

        function toggleGiftFields() {

            if (giftType.value === 'bank') {

                bankFields.classList.remove('hidden');
                addressFields.classList.add('hidden');

            } else {

                bankFields.classList.add('hidden');
                addressFields.classList.remove('hidden');

            }
        }

        giftType.addEventListener('change', toggleGiftFields);

        toggleGiftFields();
    </script>
{{-- Modal Edit Gift --}}
<div
    id="editGiftModal"
    class="fixed inset-0 z-50 hidden items-center justify-center bg-black/40 px-5 backdrop-blur-sm"
>
    <div class="w-full max-w-lg rounded-3xl bg-white p-6 shadow-xl">

        <div class="flex items-start justify-between gap-4">

            <div>
                <p class="text-[10px] tracking-[0.25em] text-neutral-400">
                    EDIT DATA
                </p>

                <h2 class="mt-2 text-xl font-light text-neutral-900">
                    Edit Amplop Digital
                </h2>
            </div>

            <button
                type="button"
                onclick="closeEditGift()"
                class="flex h-9 w-9 items-center justify-center rounded-full bg-neutral-100 text-neutral-500 hover:bg-neutral-900 hover:text-white"
            >
                ×
            </button>

        </div>


        <form
            id="editGiftForm"
            method="POST"
            class="mt-6 space-y-5"
        >

            @csrf
            @method('PUT')

            {{-- Jenis --}}
            <div>

                <label class="mb-2 block text-xs text-neutral-500">
                    Jenis
                </label>

                <select
                    name="type"
                    id="editGiftType"
                    class="w-full rounded-2xl border border-neutral-200 bg-white px-4 py-3 text-sm outline-none focus:border-neutral-900"
                >

                    <option value="bank">
                        Rekening Bank
                    </option>

                    <option value="address">
                        Alamat Pengiriman
                    </option>

                </select>

            </div>


            {{-- Bank --}}
            <div id="editBankFields" class="space-y-5">

                <div>

                    <label class="mb-2 block text-xs text-neutral-500">
                        Nama Bank
                    </label>

                    <input
                        type="text"
                        name="bank_name"
                        id="editBankName"
                        class="w-full rounded-2xl border border-neutral-200 px-4 py-3 text-sm outline-none focus:border-neutral-900"
                    >

                </div>


                <div>

                    <label class="mb-2 block text-xs text-neutral-500">
                        Nomor Rekening
                    </label>

                    <input
                        type="text"
                        name="account_number"
                        id="editAccountNumber"
                        class="w-full rounded-2xl border border-neutral-200 px-4 py-3 text-sm outline-none focus:border-neutral-900"
                    >

                </div>


                <div>

                    <label class="mb-2 block text-xs text-neutral-500">
                        Atas Nama
                    </label>

                    <input
                        type="text"
                        name="account_name"
                        id="editAccountName"
                        class="w-full rounded-2xl border border-neutral-200 px-4 py-3 text-sm outline-none focus:border-neutral-900"
                    >

                </div>

            </div>


            {{-- Address --}}
            <div id="editAddressFields" class="hidden">

                <label class="mb-2 block text-xs text-neutral-500">
                    Alamat Pengiriman
                </label>

                <textarea
                    name="address"
                    id="editAddress"
                    rows="5"
                    class="w-full rounded-2xl border border-neutral-200 px-4 py-3 text-sm outline-none focus:border-neutral-900"
                ></textarea>

            </div>


            <div class="flex justify-end gap-2 pt-2">

                <button
                    type="button"
                    onclick="closeEditGift()"
                    class="rounded-xl bg-neutral-100 px-5 py-3 text-xs text-neutral-600 hover:bg-neutral-200"
                >
                    Batal
                </button>

                <button
                    type="submit"
                    class="rounded-xl bg-neutral-900 px-5 py-3 text-xs text-white hover:bg-neutral-700"
                >
                    Simpan Perubahan
                </button>

            </div>

        </form>

    </div>
</div>
<script>
    const gifts = @json($gifts);

    function editGift(id) {

        const gift = gifts.find(item => item.id === id);

        if (!gift) {
            return;
        }

        const modal = document.getElementById('editGiftModal');
        const form = document.getElementById('editGiftForm');

        const type = document.getElementById('editGiftType');
        const bankFields = document.getElementById('editBankFields');
        const addressFields = document.getElementById('editAddressFields');

        const bankName = document.getElementById('editBankName');
        const accountNumber = document.getElementById('editAccountNumber');
        const accountName = document.getElementById('editAccountName');
        const address = document.getElementById('editAddress');


        // Action form
        form.action = `/admin/gifts/${gift.id}`;


        // Isi data
        type.value = gift.type;

        bankName.value = gift.bank_name ?? '';
        accountNumber.value = gift.account_number ?? '';
        accountName.value = gift.account_name ?? '';
        address.value = gift.address ?? '';


        // Tampilkan field sesuai jenis
        toggleEditGiftFields();


        // Tampilkan modal
        modal.classList.remove('hidden');
        modal.classList.add('flex');

        document.body.classList.add('overflow-hidden');
    }


    function closeEditGift() {

        const modal = document.getElementById('editGiftModal');

        modal.classList.add('hidden');
        modal.classList.remove('flex');

        document.body.classList.remove('overflow-hidden');
    }


    function toggleEditGiftFields() {

        const type = document.getElementById('editGiftType').value;

        const bankFields = document.getElementById('editBankFields');
        const addressFields = document.getElementById('editAddressFields');


        if (type === 'bank') {

            bankFields.classList.remove('hidden');
            addressFields.classList.add('hidden');

        } else {

            bankFields.classList.add('hidden');
            addressFields.classList.remove('hidden');

        }
    }


    document
        .getElementById('editGiftType')
        .addEventListener('change', toggleEditGiftFields);


    // Klik area luar modal untuk menutup
    document
        .getElementById('editGiftModal')
        .addEventListener('click', function (event) {

            if (event.target === this) {
                closeEditGift();
            }

        });


    // Tombol Escape
    document.addEventListener('keydown', function (event) {

        if (event.key === 'Escape') {
            closeEditGift();
        }

    });
</script>
</body>
</html>