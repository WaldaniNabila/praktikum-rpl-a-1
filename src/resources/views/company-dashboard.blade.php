<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-2">
            <h2 class="text-xl font-semibold text-slate-900">Company Dashboard</h2>
            <p class="text-sm text-slate-500">Kelola lowongan, pelamar, dan profil perusahaan Anda.</p>
        </div>
    </x-slot>

    <div x-data="{ mobileMenuOpen: false }" class="min-h-screen bg-slate-50">
        <style>[x-cloak]{display:none!important}</style>

        <div class="lg:flex lg:space-x-6">
            <aside class="hidden lg:block lg:w-72 xl:w-80 shrink-0">
                <div class="sticky top-6 rounded-3xl bg-slate-900 p-6 text-slate-100 shadow-xl shadow-slate-900/10">
                    <div class="mb-10">
                        <div class="text-3xl font-bold tracking-tight text-sky-400">JOBHUB</div>
                        <p class="mt-3 text-sm leading-6 text-slate-300">Kelola dashboard perusahaan dengan mudah.</p>
                    </div>

                    <nav class="space-y-2">
                        <a href="#" class="flex items-center gap-3 rounded-2xl bg-slate-800 px-4 py-3 text-sm font-semibold text-white transition hover:bg-slate-700">
                            <span>📊</span>
                            <span>Dashboard</span>
                        </a>
                        <a href="#" class="flex items-center gap-3 rounded-2xl px-4 py-3 text-sm font-semibold text-slate-300 hover:bg-slate-800 hover:text-white transition">
                            <span>💼</span>
                            <span>Job Listings</span>
                        </a>
                        <a href="#" class="flex items-center gap-3 rounded-2xl px-4 py-3 text-sm font-semibold text-slate-300 hover:bg-slate-800 hover:text-white transition">
                            <span>👨‍💼</span>
                            <span>Applicants</span>
                        </a>
                        <a href="#" class="flex items-center gap-3 rounded-2xl px-4 py-3 text-sm font-semibold text-slate-300 hover:bg-slate-800 hover:text-white transition">
                            <span>📄</span>
                            <span>Company Profile</span>
                        </a>
                        <a href="#" class="flex items-center gap-3 rounded-2xl px-4 py-3 text-sm font-semibold text-slate-300 hover:bg-slate-800 hover:text-white transition">
                            <span>⚙</span>
                            <span>Settings</span>
                        </a>
                        <form method="POST" action="{{ route('logout') }}" class="mt-4">
                            @csrf
                            <button type="submit" class="flex w-full items-center gap-3 rounded-2xl bg-rose-500 px-4 py-3 text-sm font-semibold text-white transition hover:bg-rose-400">
                                <span>🚪</span>
                                <span>Logout</span>
                            </button>
                        </form>
                    </nav>
                </div>
            </aside>

            <div class="flex-1">
                <div class="border-b border-slate-200 bg-white px-4 py-4 shadow-sm lg:hidden">
                    <div class="flex items-center justify-between gap-3">
                        <div>
                            <p class="text-sm font-semibold text-slate-900">JOBHUB</p>
                            <p class="text-sm text-slate-500">Company Dashboard</p>
                        </div>
                        <button @click="mobileMenuOpen = true" class="rounded-2xl border border-slate-300 bg-white px-4 py-2 text-sm font-semibold text-slate-700 shadow-sm hover:bg-slate-50 transition">
                            Menu
                        </button>
                    </div>
                </div>

                <div x-show="mobileMenuOpen" x-cloak class="fixed inset-0 z-50 bg-slate-900/70 lg:hidden">
                    <div class="absolute left-0 top-0 h-full w-3/4 max-w-xs bg-slate-900 p-6">
                        <div class="flex items-center justify-between mb-8">
                            <div class="text-lg font-semibold text-white">Menu</div>
                            <button @click="mobileMenuOpen = false" class="rounded-full bg-slate-800 p-2 text-slate-200 hover:bg-slate-700 transition">✕</button>
                        </div>
                        <nav class="space-y-2">
                            <a href="#" class="flex items-center gap-3 rounded-2xl bg-slate-800 px-4 py-3 text-sm font-semibold text-white">📊 Dashboard</a>
                            <a href="#" class="flex items-center gap-3 rounded-2xl px-4 py-3 text-sm font-semibold text-slate-300 hover:bg-slate-800 hover:text-white transition">💼 Job Listings</a>
                            <a href="#" class="flex items-center gap-3 rounded-2xl px-4 py-3 text-sm font-semibold text-slate-300 hover:bg-slate-800 hover:text-white transition">👨‍💼 Applicants</a>
                            <a href="#" class="flex items-center gap-3 rounded-2xl px-4 py-3 text-sm font-semibold text-slate-300 hover:bg-slate-800 hover:text-white transition">📄 Company Profile</a>
                            <a href="#" class="flex items-center gap-3 rounded-2xl px-4 py-3 text-sm font-semibold text-slate-300 hover:bg-slate-800 hover:text-white transition">⚙ Settings</a>
                            <form method="POST" action="{{ route('logout') }}" class="mt-4">
                                @csrf
                                <button type="submit" class="flex w-full items-center gap-3 rounded-2xl bg-rose-500 px-4 py-3 text-sm font-semibold text-white transition hover:bg-rose-400">🚪 Logout</button>
                            </form>
                        </nav>
                    </div>
                    <button @click="mobileMenuOpen = false" class="absolute inset-0"></button>
                </div>

                <main class="px-4 py-6 sm:px-6 lg:px-8">
                    <div class="rounded-3xl bg-white p-6 shadow-sm shadow-slate-200/50 sm:p-8">
                        <div class="flex flex-col gap-6 lg:flex-row lg:items-center lg:justify-between">
                            <div>
                                <h1 class="text-3xl font-semibold text-slate-900">Company Dashboard</h1>
                                <p class="mt-2 text-sm text-slate-500">Selamat datang kembali, {{ auth()->user()->name }}.</p>
                            </div>
                            <div class="flex items-center gap-4 rounded-3xl bg-slate-50 p-4">
                                <div class="text-right">
                                    <p class="text-sm font-semibold text-slate-900">{{ auth()->user()->name }}</p>
                                    <p class="text-sm text-slate-500">{{ auth()->user()->email }}</p>
                                    <span class="mt-2 inline-flex rounded-full bg-sky-100 px-3 py-1 text-xs font-semibold text-sky-700">Company Account</span>
                                </div>
                                <div class="h-16 w-16 overflow-hidden rounded-full bg-slate-200"></div>
                            </div>
                        </div>
                    </div>

                    <section class="mt-8 grid gap-4 lg:grid-cols-4">
                        <div class="rounded-3xl bg-white p-6 shadow-sm shadow-slate-200/50">
                            <h3 class="text-sm font-medium text-slate-500">Total Jobs</h3>
                            <p class="mt-4 text-3xl font-bold text-sky-700">24</p>
                        </div>
                        <div class="rounded-3xl bg-white p-6 shadow-sm shadow-slate-200/50">
                            <h3 class="text-sm font-medium text-slate-500">Total Applicants</h3>
                            <p class="mt-4 text-3xl font-bold text-amber-600">310</p>
                        </div>
                        <div class="rounded-3xl bg-white p-6 shadow-sm shadow-slate-200/50">
                            <h3 class="text-sm font-medium text-slate-500">Interview Schedule</h3>
                            <p class="mt-4 text-3xl font-bold text-teal-600">18</p>
                        </div>
                        <div class="rounded-3xl bg-white p-6 shadow-sm shadow-slate-200/50">
                            <h3 class="text-sm font-medium text-slate-500">Messages</h3>
                            <p class="mt-4 text-3xl font-bold text-slate-700">12</p>
                        </div>
                    </section>

                    <section class="mt-8 rounded-3xl bg-white p-6 shadow-sm shadow-slate-200/50">
                        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                            <div>
                                <h2 class="text-xl font-semibold text-slate-900">Recent Job Listings</h2>
                                <p class="mt-1 text-sm text-slate-500">Lowongan terbaru yang sedang dipublikasikan.</p>
                            </div>
                            <button class="inline-flex items-center justify-center rounded-2xl bg-sky-600 px-5 py-3 text-sm font-semibold text-white transition hover:bg-sky-700">+ Add Job</button>
                        </div>

                        <div class="mt-6 overflow-x-auto">
                            <table class="min-w-full divide-y divide-slate-200 text-left text-sm">
                                <thead class="bg-slate-50">
                                    <tr>
                                        <th class="px-4 py-3 font-semibold text-slate-500">Job Title</th>
                                        <th class="px-4 py-3 font-semibold text-slate-500">Location</th>
                                        <th class="px-4 py-3 font-semibold text-slate-500">Applicants</th>
                                        <th class="px-4 py-3 font-semibold text-slate-500">Status</th>
                                        <th class="px-4 py-3 font-semibold text-slate-500">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-slate-200">
                                    <tr>
                                        <td class="px-4 py-4 text-slate-900">Frontend Developer</td>
                                        <td class="px-4 py-4 text-slate-500">Jakarta</td>
                                        <td class="px-4 py-4 text-slate-900">45</td>
                                        <td class="px-4 py-4">
                                            <span class="rounded-full bg-emerald-100 px-3 py-1 text-xs font-semibold text-emerald-700">Open</span>
                                        </td>
                                        <td class="px-4 py-4">
                                            <button class="mr-2 rounded-2xl bg-slate-100 px-3 py-2 text-xs font-semibold text-slate-700 hover:bg-slate-200">Edit</button>
                                            <button class="rounded-2xl bg-rose-100 px-3 py-2 text-xs font-semibold text-rose-700 hover:bg-rose-200">Delete</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-4 py-4 text-slate-900">Backend Developer</td>
                                        <td class="px-4 py-4 text-slate-500">Bandung</td>
                                        <td class="px-4 py-4 text-slate-900">38</td>
                                        <td class="px-4 py-4">
                                            <span class="rounded-full bg-emerald-100 px-3 py-1 text-xs font-semibold text-emerald-700">Open</span>
                                        </td>
                                        <td class="px-4 py-4">
                                            <button class="mr-2 rounded-2xl bg-slate-100 px-3 py-2 text-xs font-semibold text-slate-700 hover:bg-slate-200">Edit</button>
                                            <button class="rounded-2xl bg-rose-100 px-3 py-2 text-xs font-semibold text-rose-700 hover:bg-rose-200">Delete</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-4 py-4 text-slate-900">UI/UX Designer</td>
                                        <td class="px-4 py-4 text-slate-500">Surabaya</td>
                                        <td class="px-4 py-4 text-slate-900">22</td>
                                        <td class="px-4 py-4">
                                            <span class="rounded-full bg-rose-100 px-3 py-1 text-xs font-semibold text-rose-700">Closed</span>
                                        </td>
                                        <td class="px-4 py-4">
                                            <button class="mr-2 rounded-2xl bg-slate-100 px-3 py-2 text-xs font-semibold text-slate-700 hover:bg-slate-200">Edit</button>
                                            <button class="rounded-2xl bg-rose-100 px-3 py-2 text-xs font-semibold text-rose-700 hover:bg-rose-200">Delete</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </section>
                </main>
            </div>
        </div>
    </div>
</x-app-layout>