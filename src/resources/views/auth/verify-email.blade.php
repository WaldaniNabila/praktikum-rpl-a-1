<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'JobHub') }} - Verifikasi Email</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body class="min-h-screen bg-slate-100 font-sans text-slate-900">
    <div class="min-h-screen flex items-center justify-center px-4 py-10">
        <div class="w-full max-w-2xl rounded-[2rem] bg-white p-10 shadow-[0_20px_60px_rgba(15,23,42,0.12)]">
            <div class="mb-8 text-center flex flex-col items-center">
                <div class="w-20 h-20 bg-sky-100 rounded-full flex items-center justify-center mb-6">
                    <i class="fa-regular fa-envelope-open text-4xl text-sky-600"></i>
                </div>
                <h1 class="text-4xl font-bold text-slate-950 mb-4">Cek Email Kamu</h1>
                <p class="text-base text-slate-500 leading-relaxed">
                    Terima kasih sudah mendaftar! Sebelum mulai, tolong verifikasi alamat email kamu dengan mengklik link yang baru saja kami kirimkan. Kalau kamu tidak menerima emailnya, kami bisa kirimkan ulang.
                </p>
            </div>

            @if (session('status') == 'verification-link-sent')
                <div class="mb-8 rounded-2xl bg-emerald-50 border border-emerald-100 p-4 text-center">
                    <p class="text-sm font-semibold text-emerald-800">
                        <i class="fa-solid fa-circle-check mr-2"></i> Link verifikasi baru sudah dikirim ke email kamu!
                    </p>
                </div>
            @endif

            <div class="flex flex-col gap-4 mt-8">
                <!-- Form untuk submit OTP -->
                <form method="POST" action="{{ route('verification.verify') }}" class="w-full">
                    @csrf
                    
                    <div class="mb-6">
                        <label for="otp" class="block text-sm font-semibold text-slate-700 mb-2">Masukkan Kode 6-Digit</label>
                        <input
                            id="otp"
                            name="otp"
                            type="text"
                            required
                            autofocus
                            maxlength="6"
                            placeholder="Contoh: 123456"
                            class="w-full rounded-2xl border border-slate-300 bg-white px-4 py-4 text-center text-2xl tracking-[0.5em] font-bold text-slate-900 shadow-sm outline-none transition focus:border-sky-500 focus:ring-4 focus:ring-sky-100"
                        >
                        <x-input-error :messages="$errors->get('otp')" class="mt-2 text-sm text-red-600 text-center" />
                    </div>

                    <button
                        type="submit"
                        class="w-full rounded-2xl bg-sky-600 px-6 py-4 text-sm font-semibold text-white shadow-lg shadow-sky-200 transition hover:bg-sky-700 focus:outline-none focus:ring-4 focus:ring-sky-200"
                    >
                        Verifikasi Kode
                    </button>
                </form>

                <div class="relative flex items-center py-2">
                    <div class="flex-grow border-t border-slate-200"></div>
                    <span class="flex-shrink-0 mx-4 text-slate-400 text-sm">Atau</span>
                    <div class="flex-grow border-t border-slate-200"></div>
                </div>

                <!-- Form untuk kirim ulang -->
                <form method="POST" action="{{ route('verification.send') }}" class="w-full">
                    @csrf
                    <button
                        type="submit"
                        class="w-full rounded-2xl bg-white border-2 border-slate-200 px-6 py-4 text-sm font-semibold text-slate-600 transition hover:bg-slate-50 focus:outline-none focus:ring-4 focus:ring-slate-100"
                    >
                        Kirim Ulang Email Verifikasi
                    </button>
                </form>

                <form method="POST" action="{{ route('logout') }}" class="w-full">
                    @csrf
                    <button
                        type="submit"
                        class="w-full rounded-2xl bg-slate-100 px-6 py-4 text-sm font-semibold text-slate-700 transition hover:bg-slate-200 focus:outline-none focus:ring-4 focus:ring-slate-100"
                    >
                        Log Out
                    </button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
