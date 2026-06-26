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
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z" /></svg>
                            <span>Dashboard</span>
                        </a>
                        <a href="#" class="flex items-center gap-3 rounded-2xl px-4 py-3 text-sm font-semibold text-slate-300 hover:bg-slate-800 hover:text-white transition">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M20.25 14.15v4.25c0 1.094-.896 1.982-1.982 1.982H5.732c-1.086 0-1.982-.888-1.982-1.982v-4.25m16.5 0a2.18 2.18 0 00.75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 00-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0112 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 01-.673-.38m0 0A2.18 2.18 0 013 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 013.413-.387m7.5 0V5.25A2.25 2.25 0 0013.5 3h-3a2.25 2.25 0 00-2.25 2.25v3.894m7.5 0a48.667 48.667 0 00-7.5 0M12 12.75h.008v.008H12v-.008z" /></svg>
                            <span>Job Listings</span>
                        </a>
                        <a href="#" class="flex items-center gap-3 rounded-2xl px-4 py-3 text-sm font-semibold text-slate-300 hover:bg-slate-800 hover:text-white transition">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" /></svg>
                            <span>Applicants</span>
                        </a>
                        <a href="#" class="flex items-center gap-3 rounded-2xl px-4 py-3 text-sm font-semibold text-slate-300 hover:bg-slate-800 hover:text-white transition">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3.75h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008z" /></svg>
                            <span>Company Profile</span>
                        </a>
                        <a href="#" class="flex items-center gap-3 rounded-2xl px-4 py-3 text-sm font-semibold text-slate-300 hover:bg-slate-800 hover:text-white transition">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" /></svg>
                            <span>Settings</span>
                        </a>
                        <form method="POST" action="{{ route('logout') }}" class="mt-4">
                            @csrf
                            <button type="submit" class="flex w-full items-center gap-3 rounded-2xl bg-rose-500 px-4 py-3 text-sm font-semibold text-white transition hover:bg-rose-400">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" /></svg>
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
                            <a href="#" class="flex items-center gap-3 rounded-2xl bg-slate-800 px-4 py-3 text-sm font-semibold text-white"><svg class="w-5 h-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z" /></svg> Dashboard</a>
                            <a href="#" class="flex items-center gap-3 rounded-2xl px-4 py-3 text-sm font-semibold text-slate-300 hover:bg-slate-800 hover:text-white transition"><svg class="w-5 h-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M20.25 14.15v4.25c0 1.094-.896 1.982-1.982 1.982H5.732c-1.086 0-1.982-.888-1.982-1.982v-4.25m16.5 0a2.18 2.18 0 00.75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 00-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0112 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 01-.673-.38m0 0A2.18 2.18 0 013 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 013.413-.387m7.5 0V5.25A2.25 2.25 0 0013.5 3h-3a2.25 2.25 0 00-2.25 2.25v3.894m7.5 0a48.667 48.667 0 00-7.5 0M12 12.75h.008v.008H12v-.008z" /></svg> Job Listings</a>
                            <a href="#" class="flex items-center gap-3 rounded-2xl px-4 py-3 text-sm font-semibold text-slate-300 hover:bg-slate-800 hover:text-white transition"><svg class="w-5 h-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" /></svg> Applicants</a>
                            <a href="#" class="flex items-center gap-3 rounded-2xl px-4 py-3 text-sm font-semibold text-slate-300 hover:bg-slate-800 hover:text-white transition"><svg class="w-5 h-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3.75h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008z" /></svg> Company Profile</a>
                            <a href="#" class="flex items-center gap-3 rounded-2xl px-4 py-3 text-sm font-semibold text-slate-300 hover:bg-slate-800 hover:text-white transition"><svg class="w-5 h-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" /></svg> Settings</a>
                            <form method="POST" action="{{ route('logout') }}" class="mt-4">
                                @csrf
                                <button type="submit" class="flex w-full items-center gap-3 rounded-2xl bg-rose-500 px-4 py-3 text-sm font-semibold text-white transition hover:bg-rose-400"><svg class="w-5 h-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" /></svg> Logout</button>
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