<x-guest-layout>
    <div class="w-full max-w-2xl rounded-[2rem] bg-white p-10 shadow-[0_20px_60px_rgba(15,23,42,0.12)]">
        <div class="mb-10 text-center">
            <div class="text-5xl font-extrabold text-sky-600">JobHub</div>
            <h1 class="mt-4 text-4xl font-bold text-slate-950">Lupa Password</h1>
            <p class="mt-3 text-base text-slate-500">
                Masukkan alamat email yang terdaftar. Kami akan mengirimkan tautan untuk mengatur ulang password Anda.
            </p>
        </div>

        <x-auth-session-status
            class="mb-6 rounded-2xl bg-emerald-50 p-4 text-sm text-emerald-800"
            :status="session('status')"
        />

        <form method="POST" action="{{ route('password.email') }}" class="space-y-6">
            @csrf

            <div class="space-y-2">
                <label for="email" class="block text-sm font-semibold text-slate-700">
                    Email
                </label>

                <input
                    id="email"
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    autofocus
                    placeholder="Masukkan email terdaftar"
                    class="w-full rounded-2xl border border-slate-300 bg-white px-4 py-4 text-sm text-slate-900 shadow-sm outline-none transition focus:border-sky-500 focus:ring-4 focus:ring-sky-100"
                >

                <x-input-error
                    :messages="$errors->get('email')"
                    class="mt-2 text-sm text-red-600"
                />
            </div>

            <button
                type="submit"
                class="w-full rounded-2xl bg-sky-600 px-6 py-4 text-sm font-semibold text-white shadow-lg shadow-sky-200 transition hover:bg-sky-700 focus:outline-none focus:ring-4 focus:ring-sky-200"
            >
                Kirim Link Reset Password
            </button>

            <div class="text-center">
                <a
                    href="{{ route('login') }}"
                    class="text-sm font-semibold text-sky-600 hover:text-sky-700"
                >
                    ← Kembali ke Login
                </a>
            </div>
        </form>
    </div>
</x-guest-layout>