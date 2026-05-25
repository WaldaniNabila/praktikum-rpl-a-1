<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'JobHub') }} - Register</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>[x-cloak] { display: none !important; }</style>
</head>
<body class="min-h-screen bg-slate-100 font-sans text-slate-900">
    <div class="min-h-screen flex items-center justify-center px-6 py-10">
        <div x-data="{ selectedRole: '{{ old('role', '') }}', showPassword: false, showConfirm: false, subtitle: '{{ old('role') ? 'Lengkapi data untuk membuat akun' : 'Pilih jenis akun yang ingin didaftarkan' }}' }" class="w-full max-w-5xl rounded-[2rem] bg-white p-10 shadow-[0_10px_30px_rgba(0,0,0,0.1)]">
            <div class="mb-10 text-center">
                <div class="text-5xl font-extrabold text-sky-600">JobHub</div>
                <h1 class="mt-4 text-4xl font-bold text-slate-950">Buat Akun ✨</h1>
                <p class="mt-3 text-base text-slate-500" x-text="subtitle"></p>
            </div>

            <div class="role-box mb-10 flex flex-wrap justify-center gap-6" x-show="!selectedRole" x-cloak>
                <button type="button" @click="selectedRole = 'company'; subtitle = 'Lengkapi data untuk membuat akun'" class="role-card w-full max-w-sm rounded-[1.5rem] bg-slate-50 p-8 text-left transition duration-300 hover:-translate-y-1 hover:border-sky-500 hover:shadow-[0_10px_25px_rgba(0,0,0,0.08)] border-2 border-transparent">
                    <div class="flex justify-center mb-6">
                        <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" alt="Company icon" class="h-20 w-20 object-contain" />
                    </div>
                    <h3 class="text-2xl font-semibold text-slate-950 mb-3 text-center">Company</h3>
                    <p class="text-sm leading-7 text-slate-500 text-center">Posting lowongan dan cari kandidat terbaik untuk perusahaanmu.</p>
                </button>

                <button type="button" @click="selectedRole = 'pelamar'; subtitle = 'Lengkapi data untuk membuat akun'" class="role-card w-full max-w-sm rounded-[1.5rem] bg-slate-50 p-8 text-left transition duration-300 hover:-translate-y-1 hover:border-sky-500 hover:shadow-[0_10px_25px_rgba(0,0,0,0.08)] border-2 border-transparent">
                    <div class="flex justify-center mb-6">
                        <img src="https://cdn-icons-png.flaticon.com/512/1077/1077114.png" alt="Job seeker icon" class="h-20 w-20 object-contain" />
                    </div>
                    <h3 class="text-2xl font-semibold text-slate-950 mb-3 text-center">Pelamar</h3>
                    <p class="text-sm leading-7 text-slate-500 text-center">Cari pekerjaan impian dan bangun karirmu bersama JobHub.</p>
                </button>
            </div>

            <form method="POST" action="{{ route('register') }}" class="space-y-6" x-show="selectedRole" x-cloak>
                @csrf
                <input type="hidden" name="role" x-bind:value="selectedRole" value="{{ old('role') }}">

                <div class="flex items-center gap-3 text-sm font-semibold text-slate-700 mb-6">
                    <button type="button" @click="selectedRole = null; subtitle = 'Pilih jenis akun yang ingin didaftarkan'" class="text-sky-600 hover:text-sky-700">← Kembali</button>
                    <span class="text-slate-400">|</span>
                    <span x-text="selectedRole === 'company' ? 'Daftar sebagai Company' : 'Daftar sebagai Pelamar'"></span>
                </div>

                <div class="grid gap-6 lg:grid-cols-2">
                    <template x-if="selectedRole === 'company'">
                        <div class="space-y-6">
                            <div class="space-y-2">
                                <label for="companyName" class="block text-sm font-semibold text-slate-700">Nama Perusahaan</label>
                                <input id="companyName" name="company_name" type="text" value="{{ old('company_name') }}" placeholder="Nama perusahaan" class="w-full rounded-2xl border border-slate-300 bg-white px-4 py-4 text-sm text-slate-900 shadow-sm outline-none transition focus:border-sky-500 focus:ring-4 focus:ring-sky-100" />
                                <x-input-error :messages="$errors->get('company_name')" class="mt-2 text-sm text-red-600" />
                            </div>

                            <div class="space-y-2">
                                <label for="companyEmail" class="block text-sm font-semibold text-slate-700">Email Perusahaan</label>
                                <input id="companyEmail" name="company_email" type="email" value="{{ old('company_email') }}" placeholder="Email perusahaan" class="w-full rounded-2xl border border-slate-300 bg-white px-4 py-4 text-sm text-slate-900 shadow-sm outline-none transition focus:border-sky-500 focus:ring-4 focus:ring-sky-100" />
                                <x-input-error :messages="$errors->get('company_email')" class="mt-2 text-sm text-red-600" />
                            </div>

                            <div class="space-y-2">
                                <label for="companyPhone" class="block text-sm font-semibold text-slate-700">Nomor Telepon</label>
                                <input id="companyPhone" name="company_phone" type="text" value="{{ old('company_phone') }}" placeholder="Nomor telepon" class="w-full rounded-2xl border border-slate-300 bg-white px-4 py-4 text-sm text-slate-900 shadow-sm outline-none transition focus:border-sky-500 focus:ring-4 focus:ring-sky-100" />
                                <x-input-error :messages="$errors->get('company_phone')" class="mt-2 text-sm text-red-600" />
                            </div>

                            <div class="space-y-2">
                                <label for="companyField" class="block text-sm font-semibold text-slate-700">Bidang Perusahaan</label>
                                <select id="companyField" name="company_field" class="w-full rounded-2xl border border-slate-300 bg-white px-4 py-4 text-sm text-slate-900 shadow-sm outline-none transition focus:border-sky-500 focus:ring-4 focus:ring-sky-100">
                                    <option value="">Pilih Bidang</option>
                                    <option value="Technology" {{ old('company_field') == 'Technology' ? 'selected' : '' }}>Technology</option>
                                    <option value="Finance" {{ old('company_field') == 'Finance' ? 'selected' : '' }}>Finance</option>
                                    <option value="Education" {{ old('company_field') == 'Education' ? 'selected' : '' }}>Education</option>
                                    <option value="Creative" {{ old('company_field') == 'Creative' ? 'selected' : '' }}>Creative</option>
                                </select>
                                <x-input-error :messages="$errors->get('company_field')" class="mt-2 text-sm text-red-600" />
                            </div>
                        </div>
                    </template>

                    <template x-if="selectedRole === 'pelamar'">
                        <div class="space-y-6">
                            <div class="space-y-2">
                                <label for="pelamarName" class="block text-sm font-semibold text-slate-700">Nama Lengkap</label>
                                <input id="pelamarName" name="pelamar_name" type="text" value="{{ old('pelamar_name') }}" placeholder="Nama lengkap" class="w-full rounded-2xl border border-slate-300 bg-white px-4 py-4 text-sm text-slate-900 shadow-sm outline-none transition focus:border-sky-500 focus:ring-4 focus:ring-sky-100" />
                                <x-input-error :messages="$errors->get('pelamar_name')" class="mt-2 text-sm text-red-600" />
                            </div>

                            <div class="space-y-2">
                                <label for="pelamarEmail" class="block text-sm font-semibold text-slate-700">Email</label>
                                <input id="pelamarEmail" name="pelamar_email" type="email" value="{{ old('pelamar_email') }}" placeholder="Email" class="w-full rounded-2xl border border-slate-300 bg-white px-4 py-4 text-sm text-slate-900 shadow-sm outline-none transition focus:border-sky-500 focus:ring-4 focus:ring-sky-100" />
                                <x-input-error :messages="$errors->get('pelamar_email')" class="mt-2 text-sm text-red-600" />
                            </div>

                            <div class="space-y-2">
                                <label for="pelamarPhone" class="block text-sm font-semibold text-slate-700">Nomor HP</label>
                                <input id="pelamarPhone" name="pelamar_phone" type="text" value="{{ old('pelamar_phone') }}" placeholder="Nomor HP" class="w-full rounded-2xl border border-slate-300 bg-white px-4 py-4 text-sm text-slate-900 shadow-sm outline-none transition focus:border-sky-500 focus:ring-4 focus:ring-sky-100" />
                                <x-input-error :messages="$errors->get('pelamar_phone')" class="mt-2 text-sm text-red-600" />
                            </div>

                            <div class="space-y-2">
                                <label for="pelamarEducation" class="block text-sm font-semibold text-slate-700">Pendidikan</label>
                                <select id="pelamarEducation" name="pelamar_education" class="w-full rounded-2xl border border-slate-300 bg-white px-4 py-4 text-sm text-slate-900 shadow-sm outline-none transition focus:border-sky-500 focus:ring-4 focus:ring-sky-100">
                                    <option value="">Pilih Pendidikan</option>
                                    <option value="SMA/SMK" {{ old('pelamar_education') == 'SMA/SMK' ? 'selected' : '' }}>SMA/SMK</option>
                                    <option value="D3" {{ old('pelamar_education') == 'D3' ? 'selected' : '' }}>D3</option>
                                    <option value="S1" {{ old('pelamar_education') == 'S1' ? 'selected' : '' }}>S1</option>
                                    <option value="S2" {{ old('pelamar_education') == 'S2' ? 'selected' : '' }}>S2</option>
                                </select>
                                <x-input-error :messages="$errors->get('pelamar_education')" class="mt-2 text-sm text-red-600" />
                            </div>
                        </div>
                    </template>

                    <div class="space-y-6">
                        <div class="space-y-2">
                            <label for="password" class="block text-sm font-semibold text-slate-700">Password</label>
                            <div class="relative">
                                <input id="password" name="password" :type="showPassword ? 'text' : 'password'" required autocomplete="new-password" placeholder="Masukkan password" class="w-full rounded-2xl border border-slate-300 bg-white px-4 py-4 pr-28 text-sm text-slate-900 shadow-sm outline-none transition focus:border-sky-500 focus:ring-4 focus:ring-sky-100" />
                                <button type="button" x-on:click="showPassword = !showPassword" class="absolute inset-y-0 right-3 inline-flex items-center rounded-full bg-slate-100 px-3 text-sm font-semibold text-slate-600 transition hover:bg-slate-200">
                                    <span x-text="showPassword ? 'Sembunyikan' : 'Tampilkan'"></span>
                                </button>
                            </div>
                            <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm text-red-600" />
                        </div>

                        <div class="space-y-2">
                            <label for="password_confirmation" class="block text-sm font-semibold text-slate-700">Konfirmasi Password</label>
                            <div class="relative">
                                <input id="password_confirmation" name="password_confirmation" :type="showConfirm ? 'text' : 'password'" required autocomplete="new-password" placeholder="Ulangi password" class="w-full rounded-2xl border border-slate-300 bg-white px-4 py-4 pr-28 text-sm text-slate-900 shadow-sm outline-none transition focus:border-sky-500 focus:ring-4 focus:ring-sky-100" />
                                <button type="button" x-on:click="showConfirm = !showConfirm" class="absolute inset-y-0 right-3 inline-flex items-center rounded-full bg-slate-100 px-3 text-sm font-semibold text-slate-600 transition hover:bg-slate-200">
                                    <span x-text="showConfirm ? 'Sembunyikan' : 'Tampilkan'"></span>
                                </button>
                            </div>
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-sm text-red-600" />
                        </div>

                        <div class="space-y-2 lg:col-span-2">
                            <label for="address" class="block text-sm font-semibold text-slate-700">Alamat</label>
                            <textarea id="address" name="address" rows="4" placeholder="Masukkan alamat lengkap" class="w-full rounded-2xl border border-slate-300 bg-white px-4 py-4 text-sm text-slate-900 shadow-sm outline-none transition focus:border-sky-500 focus:ring-4 focus:ring-sky-100">{{ old('address') }}</textarea>
                            <x-input-error :messages="$errors->get('address')" class="mt-2 text-sm text-red-600" />
                        </div>
                    </div>
                </div>

                <button type="submit" class="w-full rounded-2xl bg-sky-600 px-6 py-4 text-sm font-semibold text-white shadow-lg shadow-sky-200 transition hover:bg-sky-700 focus:outline-none focus:ring-4 focus:ring-sky-200">Daftar Sekarang</button>
            </form>

            <div class="mt-8 text-center text-sm text-slate-500">
                Sudah punya akun?
                <a href="{{ route('login') }}" class="font-semibold text-sky-600 hover:text-sky-700">Login</a>
            </div>
        </div>
    </div>
</body>
</html>
