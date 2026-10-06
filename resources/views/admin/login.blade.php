<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login Admin — Wedding Invitation</title>

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])
</head>

<body class="min-h-screen bg-[#eeeeec]">

    <div class="relative flex min-h-screen items-center justify-center overflow-hidden px-6">

        {{-- Background Decoration --}}
        <div class="absolute -left-32 -top-32 h-96 w-96 rounded-full bg-white/70 blur-3xl"></div>

        <div class="absolute -bottom-32 -right-32 h-96 w-96 rounded-full bg-white/70 blur-3xl"></div>


        {{-- Login Card --}}
        <div class="relative z-10 w-full max-w-md">

            {{-- Header --}}
            <div class="mb-10 text-center">

                <p class="text-[10px] tracking-[0.45em] text-neutral-500">
                    WEDDING INVITATION
                </p>

                <h1 class="mt-4 text-3xl font-light tracking-wide text-neutral-900">
                    Admin
                </h1>

                <p class="mt-3 text-sm text-neutral-500">
                    Masuk untuk mengelola undangan
                </p>

            </div>


            {{-- Card --}}
            <div class="rounded-3xl border border-white/70 bg-white/70 p-8 shadow-xl backdrop-blur-md">

                {{-- Error --}}
                @if ($errors->any())

                    <div class="mb-6 rounded-2xl border border-red-200 bg-red-50/70 p-4 text-sm text-red-700">

                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach

                    </div>

                @endif


                <form
                    action="{{ route('admin.authenticate') }}"
                    method="POST"
                >

                    @csrf


                    {{-- Email --}}
                    <div>

                        <label
                            for="email"
                            class="text-xs tracking-[0.15em] text-neutral-600"
                        >
                            EMAIL
                        </label>

                        <input
                            id="email"
                            name="email"
                            type="email"
                            value="{{ old('email') }}"
                            required
                            autofocus
                            autocomplete="email"
                            placeholder="Masukkan email"
                            class="mt-3 w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm outline-none transition focus:border-neutral-500"
                        >

                    </div>


                    {{-- Password --}}
                    <div class="mt-6">

                        <label
                            for="password"
                            class="text-xs tracking-[0.15em] text-neutral-600"
                        >
                            PASSWORD
                        </label>

                        <input
                            id="password"
                            name="password"
                            type="password"
                            required
                            autocomplete="current-password"
                            placeholder="Masukkan password"
                            class="mt-3 w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm outline-none transition focus:border-neutral-500"
                        >

                    </div>


                    {{-- Submit --}}
                    <button
                        type="submit"
                        class="mt-8 w-full rounded-full bg-neutral-900 px-6 py-3.5 text-[10px] tracking-[0.25em] text-white transition duration-300 hover:bg-neutral-700"
                    >
                        MASUK
                    </button>

                </form>

            </div>


            {{-- Footer --}}
            <p class="mt-6 text-center text-[10px] tracking-wide text-neutral-400">
                Wedding Invitation Admin Panel
            </p>

        </div>

    </div>

</body>
</html>