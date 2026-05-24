<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'JobHub') }} - Register</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-slate-100 font-sans text-slate-900">
    <div class="min-h-screen flex items-center justify-center px-6 py-10">
        <div x-data="{ showPassword: false, showConfirm: false }" class="w-full max-w-3xl rounded-[2rem] bg-white p-10 shadow-[0_20px_60px_rgba(15,23,42,0.12)]">
            <div class="mb-10 text-center">
                <div class="text-5xl font-extrabold text-sky-600">JobHub</div>
                <h1 class="mt-4 text-4xl font-bold text-slate-950">Buat Akun ✨</h1>
                <p class="mt-3 text-base text-slate-500">Isi data diri untuk melanjutkan</p>
            </div>

            <x-auth-session-status class="mb-6 rounded-2xl bg-emerald-50 p-4 text-sm text-emerald-800" :status="session('status')" />

            <form method="POST" action="{{ route('register') }}" class="space-y-8">
                @csrf

                <div class="grid gap-6 lg:grid-cols-2">
                    <div class="space-y-2">
                        <label for="name" class="block text-sm font-semibold text-slate-700">Nama Lengkap</label>
                        <input
                            id="name"
                            name="name"
                            type="text"
                            value="{{ old('name') }}"
                            required
                            autofocus
                            autocomplete="name"
                            placeholder="Masukkan nama lengkap"
                            class="w-full rounded-2xl border border-slate-300 bg-white px-4 py-4 text-sm text-slate-900 shadow-sm outline-none transition focus:border-sky-500 focus:ring-4 focus:ring-sky-100"
                        >
                        <x-input-error :messages="$errors->get('name')" class="mt-2 text-sm text-red-600" />
                    </div>

                    <div class="space-y-2">
                        <label for="email" class="block text-sm font-semibold text-slate-700">Email</label>
                        <input
                            id="email"
                            name="email"
                            type="email"
                            value="{{ old('email') }}"
                            required
                            autocomplete="username"
                            placeholder="Masukkan email"
                            class="w-full rounded-2xl border border-slate-300 bg-white px-4 py-4 text-sm text-slate-900 shadow-sm outline-none transition focus:border-sky-500 focus:ring-4 focus:ring-sky-100"
                        >
                        <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-600" />
                    </div>

                    <div class="space-y-2">
                        <label for="phone" class="block text-sm font-semibold text-slate-700">Nomor HP</label>
                        <input
                            id="phone"
                            name="phone"
                            type="text"
                            value="{{ old('phone') }}"
                            placeholder="08xxxxxxxxxx"
                            class="w-full rounded-2xl border border-slate-300 bg-white px-4 py-4 text-sm text-slate-900 shadow-sm outline-none transition focus:border-sky-500 focus:ring-4 focus:ring-sky-100"
                        >
                        <x-input-error :messages="$errors->get('phone')" class="mt-2 text-sm text-red-600" />
                    </div>

                    <div class="space-y-2">
                        <label for="birth" class="block text-sm font-semibold text-slate-700">Tanggal Lahir</label>
                        <input
                            id="birth"
                            name="birth"
                            type="date"
                            value="{{ old('birth') }}"
                            class="w-full rounded-2xl border border-slate-300 bg-white px-4 py-4 text-sm text-slate-900 shadow-sm outline-none transition focus:border-sky-500 focus:ring-4 focus:ring-sky-100"
                        >
                        <x-input-error :messages="$errors->get('birth')" class="mt-2 text-sm text-red-600" />
                    </div>

                    <div class="space-y-2">
                        <label for="gender" class="block text-sm font-semibold text-slate-700">Jenis Kelamin</label>
                        <select
                            id="gender"
                            name="gender"
                            class="w-full rounded-2xl border border-slate-300 bg-white px-4 py-4 text-sm text-slate-900 shadow-sm outline-none transition focus:border-sky-500 focus:ring-4 focus:ring-sky-100"
                        >
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="Laki-laki" {{ old('gender') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="Perempuan" {{ old('gender') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                        <x-input-error :messages="$errors->get('gender')" class="mt-2 text-sm text-red-600" />
                    </div>

                    <div class="space-y-2">
                        <label for="education" class="block text-sm font-semibold text-slate-700">Pendidikan</label>
                        <select
                            id="education"
                            name="education"
                            class="w-full rounded-2xl border border-slate-300 bg-white px-4 py-4 text-sm text-slate-900 shadow-sm outline-none transition focus:border-sky-500 focus:ring-4 focus:ring-sky-100"
                        >
                            <option value="">Pilih Pendidikan</option>
                            <option value="SMA/SMK" {{ old('education') == 'SMA/SMK' ? 'selected' : '' }}>SMA/SMK</option>
                            <option value="D3" {{ old('education') == 'D3' ? 'selected' : '' }}>D3</option>
                            <option value="S1" {{ old('education') == 'S1' ? 'selected' : '' }}>S1</option>
                            <option value="S2" {{ old('education') == 'S2' ? 'selected' : '' }}>S2</option>
                        </select>
                        <x-input-error :messages="$errors->get('education')" class="mt-2 text-sm text-red-600" />
                    </div>

                    <div class="space-y-2">
                        <label for="password" class="block text-sm font-semibold text-slate-700">Password</label>
                        <div class="relative">
                            <input
                                id="password"
                                name="password"
                                :type="showPassword ? 'text' : 'password'"
                                required
                                autocomplete="new-password"
                                placeholder="Masukkan password"
                                class="w-full rounded-2xl border border-slate-300 bg-white px-4 py-4 pr-28 text-sm text-slate-900 shadow-sm outline-none transition focus:border-sky-500 focus:ring-4 focus:ring-sky-100"
                            >
                            <button
                                type="button"
                                x-on:click="showPassword = !showPassword"
                                class="absolute inset-y-0 right-3 inline-flex items-center rounded-full bg-slate-100 px-3 text-sm font-semibold text-slate-600 transition hover:bg-slate-200"
                            >
                                <span x-text="showPassword ? 'Sembunyikan' : 'Tampilkan'"></span>
                            </button>
                        </div>
                        <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm text-red-600" />
                    </div>

                    <div class="space-y-2">
                        <label for="password_confirmation" class="block text-sm font-semibold text-slate-700">Konfirmasi Password</label>
                        <div class="relative">
                            <input
                                id="password_confirmation"
                                name="password_confirmation"
                                :type="showConfirm ? 'text' : 'password'"
                                required
                                autocomplete="new-password"
                                placeholder="Ulangi password"
                                class="w-full rounded-2xl border border-slate-300 bg-white px-4 py-4 pr-28 text-sm text-slate-900 shadow-sm outline-none transition focus:border-sky-500 focus:ring-4 focus:ring-sky-100"
                            >
                            <button
                                type="button"
                                x-on:click="showConfirm = !showConfirm"
                                class="absolute inset-y-0 right-3 inline-flex items-center rounded-full bg-slate-100 px-3 text-sm font-semibold text-slate-600 transition hover:bg-slate-200"
                            >
                                <span x-text="showConfirm ? 'Sembunyikan' : 'Tampilkan'"></span>
                            </button>
                        </div>
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-sm text-red-600" />
                    </div>
                </div>

                <div class="space-y-2">
                    <label for="address" class="block text-sm font-semibold text-slate-700">Alamat</label>
                    <textarea
                        id="address"
                        name="address"
                        rows="4"
                        placeholder="Masukkan alamat lengkap"
                        class="w-full rounded-2xl border border-slate-300 bg-white px-4 py-4 text-sm text-slate-900 shadow-sm outline-none transition focus:border-sky-500 focus:ring-4 focus:ring-sky-100"
                    >{{ old('address') }}</textarea>
                    <x-input-error :messages="$errors->get('address')" class="mt-2 text-sm text-red-600" />
                </div>

                <button
                    type="submit"
                    class="w-full rounded-2xl bg-sky-600 px-6 py-4 text-sm font-semibold text-white shadow-lg shadow-sky-200 transition hover:bg-sky-700 focus:outline-none focus:ring-4 focus:ring-sky-200"
                >
                    Daftar Sekarang
                </button>
            </form>

            <p class="mt-8 text-center text-sm text-slate-500">
                Sudah punya akun?
                <a href="{{ route('login') }}" class="font-semibold text-sky-600 hover:text-sky-700">Login</a>
            </p>
        </div>
    </div>
</body>
</html>
