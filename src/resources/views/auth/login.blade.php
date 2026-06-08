<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'JobHub') }} - Login</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body class="min-h-screen bg-slate-100 font-sans text-slate-900">
    <div class="min-h-screen flex items-center justify-center px-4 py-10">
        <div x-data="{ showPassword: false }" class="w-full max-w-2xl rounded-[2rem] bg-white p-10 shadow-[0_20px_60px_rgba(15,23,42,0.12)]">
            <div class="mb-10 text-center">
                <div class="text-5xl font-extrabold text-sky-600">JobHub</div>
                <h1 class="mt-4 text-4xl font-bold text-slate-950">Selamat Datang</h1>
                <p class="mt-3 text-base text-slate-500">Login untuk melanjutkan</p>
            </div>

            <x-auth-session-status class="mb-6 rounded-2xl bg-emerald-50 p-4 text-sm text-emerald-800" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                <div class="space-y-2">
                    <label for="email" class="block text-sm font-semibold text-slate-700">Email</label>
                    <input
                        id="email"
                        name="email"
                        type="email"
                        value="{{ old('email') }}"
                        required
                        autofocus
                        autocomplete="username"
                        placeholder="Masukkan email"
                        class="w-full rounded-2xl border border-slate-300 bg-white px-4 py-4 text-sm text-slate-900 shadow-sm outline-none transition focus:border-sky-500 focus:ring-4 focus:ring-sky-100"
                    >
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-600" />
                </div>

                <div class="space-y-2">
                    <label for="password" class="block text-sm font-semibold text-slate-700">
                        Password
                    </label>

                    <div class="relative">
                        <input
                            id="password"
                            name="password"
                            :type="showPassword ? 'text' : 'password'"
                            required
                            autocomplete="current-password"
                            placeholder="Masukkan password"
                            class="w-full rounded-2xl border border-slate-300 bg-white px-4 py-4 pr-12 text-sm text-slate-900 shadow-sm outline-none transition focus:border-sky-500 focus:ring-4 focus:ring-sky-100">

                        <button
                            type="button"
                            x-on:click="showPassword = !showPassword"
                            style="position:absolute; right:12px; top:50%; transform:translateY(-50%);"
                            class="text-slate-500 hover:text-sky-600"
                        >
                            <i :class="showPassword ? 'fa-solid fa-eye-slash' : 'fa-solid fa-eye'"></i>
                        </button>
                    </div>
                </div>

                <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between text-sm text-slate-600">
                    <label class="inline-flex items-center gap-2">
                        <input
                            id="remember_me"
                            name="remember"
                            type="checkbox"
                            class="h-4 w-4 rounded border-slate-300 text-sky-600 focus:ring-sky-500"
                        >
                        Ingat saya
                    </label>

                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="font-semibold text-sky-600 hover:text-sky-700">Lupa password?</a>
                    @endif
                </div>

                <button
                    type="submit"
                    class="w-full rounded-2xl bg-sky-600 px-6 py-4 text-sm font-semibold text-white shadow-lg shadow-sky-200 transition hover:bg-sky-700 focus:outline-none focus:ring-4 focus:ring-sky-200"
                >
                    Masuk
                </button>
            </form>

            <p class="mt-8 text-center text-sm text-slate-500">
                Belum punya akun?
                <a href="{{ route('register') }}" class="font-semibold text-sky-600 hover:text-sky-700">Daftar sekarang</a>
            </p>
        </div>
    </div>
</body>
</html>
