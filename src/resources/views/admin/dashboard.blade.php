<x-app-layout>
    <div class="block w-full min-h-screen bg-slate-50 antialiased">
        <div class="flex min-h-screen w-full overflow-hidden">
            <x-admin-sidebar />

            <div class="flex-1 bg-slate-50 overflow-y-auto">
                <main class="p-8 lg:p-12 space-y-10 max-w-[1600px] mx-auto">
                    
                    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                        <div>
                            <h1 class="text-3xl font-extrabold text-slate-900 tracking-tight">Admin Dashboard</h1>
                            <p class="text-slate-500 mt-2">Selamat datang di panel admin utama JOBHUB.</p>
                        </div>
                        
                        <div class="flex items-center gap-4">
                            <div class="text-right">
                                <p class="text-sm font-bold text-slate-900">{{ Auth::user()->name }}</p>
                                <p class="text-xs text-slate-500 font-medium">{{ Auth::user()->email }}</p>
                                <div class="mt-1.5">
                                    <span class="inline-flex rounded-full bg-blue-50 px-3 py-0.5 text-[11px] font-bold text-blue-600 border border-blue-100 uppercase tracking-widest">
                                        Super Admin
                                    </span>
                                </div>
                            </div>
                            <div class="h-12 w-12 overflow-hidden rounded-full border border-slate-200 shadow-sm bg-slate-100 shrink-0 flex items-center justify-center">
                                <span class="text-xl font-black text-blue-600">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="grid gap-6 grid-cols-1 sm:grid-cols-2 lg:grid-cols-4">
                        <div class="rounded-2xl bg-white p-6 shadow-sm border border-slate-100/80 hover:shadow-md transition">
                            <div class="flex items-center justify-between mb-4">
                                <div class="h-10 w-10 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center text-xl">👥</div>
                            </div>
                            <p class="text-sm font-bold text-slate-400 tracking-wide">Total Users</p>
                            <p class="mt-2 text-4xl font-black text-slate-900">{{ $totalUsers ?? 0 }}</p>
                        </div>
                        <div class="rounded-2xl bg-white p-6 shadow-sm border border-slate-100/80 hover:shadow-md transition">
                            <div class="flex items-center justify-between mb-4">
                                <div class="h-10 w-10 rounded-xl bg-indigo-50 text-indigo-600 flex items-center justify-center text-xl">🏢</div>
                            </div>
                            <p class="text-sm font-bold text-slate-400 tracking-wide">Total Companies</p>
                            <p class="mt-2 text-4xl font-black text-slate-900">{{ $totalCompanies ?? 0 }}</p>
                        </div>
                        <div class="rounded-2xl bg-white p-6 shadow-sm border border-slate-100/80 hover:shadow-md transition">
                            <div class="flex items-center justify-between mb-4">
                                <div class="h-10 w-10 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center text-xl">💼</div>
                            </div>
                            <p class="text-sm font-bold text-slate-400 tracking-wide">Total Jobs</p>
                            <p class="mt-2 text-4xl font-black text-slate-900">{{ $totalJobs ?? 0 }}</p>
                        </div>
                        <div class="rounded-2xl bg-white p-6 shadow-sm border border-slate-100/80 hover:shadow-md transition">
                            <div class="flex items-center justify-between mb-4">
                                <div class="h-10 w-10 rounded-xl bg-violet-50 text-violet-600 flex items-center justify-center text-xl">📄</div>
                            </div>
                            <p class="text-sm font-bold text-slate-400 tracking-wide">Total Applicants</p>
                            <p class="mt-2 text-4xl font-black text-slate-900">{{ $totalApplicants ?? 0 }}</p>
                        </div>
                    </div>

                    <div class="grid gap-6 grid-cols-1 lg:grid-cols-2">
                        <div class="rounded-2xl bg-gradient-to-br from-amber-500 to-amber-600 p-6 shadow-lg shadow-amber-500/20 text-white flex items-center justify-between">
                            <div>
                                <h3 class="text-lg font-bold text-amber-50">Pending Jobs</h3>
                                <p class="mt-1 text-sm text-amber-100/80">Lowongan menunggu persetujuan admin</p>
                                <div class="mt-4 text-4xl font-black">{{ $pendingJobs ?? 0 }}</div>
                            </div>
                            <div class="h-20 w-20 bg-amber-400/30 rounded-full flex items-center justify-center text-4xl">⏳</div>
                        </div>

                        <div class="rounded-2xl bg-gradient-to-br from-teal-500 to-teal-600 p-6 shadow-lg shadow-teal-500/20 text-white flex items-center justify-between">
                            <div>
                                <h3 class="text-lg font-bold text-teal-50">Pending Companies</h3>
                                <p class="mt-1 text-sm text-teal-100/80">Perusahaan menunggu verifikasi</p>
                                <div class="mt-4 text-4xl font-black">{{ $pendingCompanies ?? 0 }}</div>
                            </div>
                            <div class="h-20 w-20 bg-teal-400/30 rounded-full flex items-center justify-center text-4xl">🛡️</div>
                        </div>
                    </div>

                    <section class="rounded-2xl bg-white p-6 shadow-sm border border-slate-100/80">
                        <div class="flex items-center justify-between mb-8">
                            <h2 class="text-xl font-extrabold text-slate-900 tracking-tight">Recent Pending Jobs</h2>
                            <a href="{{ route('admin.jobs') }}" class="text-sm font-bold text-blue-600 hover:text-blue-700 hover:underline">
                                Lihat Semua →
                            </a>
                        </div>

                        <div class="overflow-x-auto">
                            <table class="w-full text-left text-sm">
                                <thead>
                                    <tr class="text-xs font-bold text-slate-400 uppercase tracking-wider border-b border-slate-100">
                                        <th class="pb-3 font-bold">Perusahaan</th>
                                        <th class="pb-3 font-bold">Job Title</th>
                                        <th class="pb-3 font-bold">Lokasi</th>
                                        <th class="pb-3 font-bold text-right">Aksi Cepat</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-slate-100 text-slate-700 font-medium">
                                    @forelse($recentJobs ?? [] as $job)
                                    <tr>
                                        <td class="py-4">
                                            <p class="font-bold text-slate-900">{{ $job->company->name ?? '-' }}</p>
                                        </td>
                                        <td class="py-4 font-bold text-slate-900">{{ $job->title }}</td>
                                        <td class="py-4 text-slate-500">{{ $job->location }}</td>
                                        <td class="py-4 text-right">
                                            <div class="flex items-center justify-end gap-2">
                                                <form action="{{ route('admin.jobs.approve', $job->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Approve lowongan ini?')">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit" class="rounded-lg bg-emerald-50 px-3 py-1.5 text-xs font-bold text-emerald-700 hover:bg-emerald-100 transition">Approve</button>
                                                </form>
                                                <form action="{{ route('admin.jobs.reject', $job->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Reject lowongan ini?')">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit" class="rounded-lg bg-rose-50 px-3 py-1.5 text-xs font-bold text-rose-700 hover:bg-rose-100 transition">Reject</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="4" class="py-8 text-center text-slate-500">Tidak ada lowongan yang berstatus pending.</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </section>
                </main>
            </div>
        </div>
    </div>
</x-app-layout>