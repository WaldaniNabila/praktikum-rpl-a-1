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
                                <div class="h-10 w-10 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center"><svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" /></svg></div>
                            </div>
                            <p class="text-sm font-bold text-slate-400 tracking-wide">Total Users</p>
                            <p class="mt-2 text-4xl font-black text-slate-900">{{ $totalUsers ?? 0 }}</p>
                        </div>
                        <div class="rounded-2xl bg-white p-6 shadow-sm border border-slate-100/80 hover:shadow-md transition">
                            <div class="flex items-center justify-between mb-4">
                                <div class="h-10 w-10 rounded-xl bg-indigo-50 text-indigo-600 flex items-center justify-center"><svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3.75h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008z" /></svg></div>
                            </div>
                            <p class="text-sm font-bold text-slate-400 tracking-wide">Total Companies</p>
                            <p class="mt-2 text-4xl font-black text-slate-900">{{ $totalCompanies ?? 0 }}</p>
                        </div>
                        <div class="rounded-2xl bg-white p-6 shadow-sm border border-slate-100/80 hover:shadow-md transition">
                            <div class="flex items-center justify-between mb-4">
                                <div class="h-10 w-10 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center"><svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M20.25 14.15v4.25c0 1.094-.896 1.982-1.982 1.982H5.732c-1.086 0-1.982-.888-1.982-1.982v-4.25m16.5 0a2.18 2.18 0 00.75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 00-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0112 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 01-.673-.38m0 0A2.18 2.18 0 013 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 013.413-.387m7.5 0V5.25A2.25 2.25 0 0013.5 3h-3a2.25 2.25 0 00-2.25 2.25v3.894m7.5 0a48.667 48.667 0 00-7.5 0M12 12.75h.008v.008H12v-.008z" /></svg></div>
                            </div>
                            <p class="text-sm font-bold text-slate-400 tracking-wide">Total Jobs</p>
                            <p class="mt-2 text-4xl font-black text-slate-900">{{ $totalJobs ?? 0 }}</p>
                        </div>
                        <div class="rounded-2xl bg-white p-6 shadow-sm border border-slate-100/80 hover:shadow-md transition">
                            <div class="flex items-center justify-between mb-4">
                                <div class="h-10 w-10 rounded-xl bg-violet-50 text-violet-600 flex items-center justify-center"><svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" /></svg></div>
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
                            <div class="h-20 w-20 bg-amber-400/30 rounded-full flex items-center justify-center"><svg class="w-10 h-10" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" /></svg></div>
                        </div>

                        <div class="rounded-2xl bg-gradient-to-br from-teal-500 to-teal-600 p-6 shadow-lg shadow-teal-500/20 text-white flex items-center justify-between">
                            <div>
                                <h3 class="text-lg font-bold text-teal-50">Pending Companies</h3>
                                <p class="mt-1 text-sm text-teal-100/80">Perusahaan menunggu verifikasi</p>
                                <div class="mt-4 text-4xl font-black">{{ $pendingCompanies ?? 0 }}</div>
                            </div>
                            <div class="h-20 w-20 bg-teal-400/30 rounded-full flex items-center justify-center"><svg class="w-10 h-10" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 01-1.043 3.296 3.745 3.745 0 01-3.296 1.043A3.745 3.745 0 0112 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 01-3.296-1.043 3.745 3.745 0 01-1.043-3.296A3.745 3.745 0 013 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 011.043-3.296 3.746 3.746 0 013.296-1.043A3.746 3.746 0 0112 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 013.296 1.043 3.746 3.746 0 011.043 3.296A3.745 3.745 0 0121 12z" /></svg></div>
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