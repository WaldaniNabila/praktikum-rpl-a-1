<x-guest-layout>
    <div class="relative w-full max-w-xl overflow-hidden rounded-[2.5rem] bg-white p-10 shadow-[0_20px_60px_rgba(15,23,42,0.08)] ring-1 ring-slate-100 sm:p-14">
        
        <!-- Decorative Background Gradient -->
        <div class="absolute -left-20 -top-20 h-64 w-64 rounded-full bg-gradient-to-br from-sky-400 to-indigo-500 opacity-20 blur-[60px]"></div>
        <div class="absolute -bottom-20 -right-20 h-64 w-64 rounded-full bg-gradient-to-tl from-emerald-300 to-sky-400 opacity-20 blur-[60px]"></div>

        <div class="relative z-10 mb-10 text-center">
            <!-- Icon -->
            <div class="mx-auto mb-6 flex h-20 w-20 items-center justify-center rounded-3xl bg-gradient-to-tr from-sky-100 to-sky-50 text-sky-600 shadow-sm ring-1 ring-sky-100">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-10 w-10">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                </svg>
            </div>
            
            <h1 class="text-3xl font-extrabold tracking-tight text-slate-900 sm:text-4xl">Lupa Password?</h1>
            <p class="mt-4 text-base leading-relaxed text-slate-500">
                Jangan khawatir. Masukkan email Anda di bawah dan kami akan mengirimkan tautan untuk mengatur ulang password Anda.
            </p>
        </div>

        <div class="relative z-10">
            <x-auth-session-status
                class="mb-8 flex items-center gap-3 rounded-2xl bg-emerald-50 p-4 text-sm font-medium text-emerald-800 ring-1 ring-emerald-200/50"
                :status="session('status')"
            />

            <form method="POST" action="{{ route('password.email') }}" class="space-y-6">
                @csrf

                <div class="space-y-2">
                    <label for="email" class="block text-sm font-semibold text-slate-700">
                        Alamat Email
                    </label>

                    <div class="relative">
                        <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4">
                            <svg class="h-5 w-5 text-slate-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                            </svg>
                        </div>
                        <input
                            id="email"
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            required
                            autofocus
                            placeholder="nama@email.com"
                            class="block w-full rounded-2xl border-0 bg-slate-50 py-4 pl-12 pr-4 text-slate-900 shadow-sm ring-1 ring-inset ring-slate-200 transition-all placeholder:text-slate-400 focus:bg-white focus:ring-2 focus:ring-inset focus:ring-sky-500 sm:text-sm sm:leading-6"
                        >
                    </div>

                    <x-input-error
                        :messages="$errors->get('email')"
                        class="mt-2 text-sm text-red-600"
                    />
                </div>

                <button
                    type="submit"
                    class="group relative flex w-full justify-center overflow-hidden rounded-2xl bg-sky-600 px-6 py-4 text-sm font-semibold text-white shadow-[0_8px_30px_rgb(2,132,199,0.3)] transition-all duration-300 hover:scale-[1.02] hover:bg-sky-500 hover:shadow-[0_8px_30px_rgb(2,132,199,0.4)] focus:outline-none focus:ring-4 focus:ring-sky-100"
                >
                    <span class="absolute inset-0 flex h-full w-full justify-center [transform:skew(-12deg)_translateX(-100%)] group-hover:duration-1000 group-hover:[transform:skew(-12deg)_translateX(100%)]">
                        <div class="relative h-full w-8 bg-white/20"></div>
                    </span>
                    <span class="relative">Kirim Tautan Reset</span>
                </button>

                <div class="mt-8 text-center">
                    <a
                        href="{{ route('login') }}"
                        class="group inline-flex items-center text-sm font-medium text-slate-500 transition-colors hover:text-sky-600"
                    >
                        <svg class="mr-2 h-4 w-4 transition-transform group-hover:-translate-x-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                        </svg>
                        Kembali ke halaman Login
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>