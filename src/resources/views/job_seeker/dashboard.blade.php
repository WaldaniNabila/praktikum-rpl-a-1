<x-app-layout>
    <div class="block w-full min-h-screen bg-slate-50 antialiased">
        <div class="flex min-h-screen w-full overflow-hidden">
            
            <x-jobseeker-sidebar />

            <div class="flex-1 bg-slate-50 overflow-y-auto">
                <main class="p-8 lg:p-12 space-y-10 max-w-[1600px] mx-auto">
                    
                                        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                        <div>
                            <h1 class="text-3xl font-extrabold text-slate-900 tracking-tight">Dashboard Pelamar</h1>
                            <p class="text-slate-500 mt-2">Selamat datang kembali, pantau status lamaranmu di sini.</p>
                        </div>
                        
                        <div class="flex items-center gap-4">
                            <div class="text-right">
                                <p class="text-sm font-bold text-slate-900">{{ Auth::user()->name }}</p>
                                <p class="text-xs text-slate-500 font-medium">{{ Auth::user()->email }}</p>
                                <div class="mt-1.5">
                                    <span class="inline-flex rounded-full bg-blue-50 px-3 py-0.5 text-[11px] font-bold text-blue-600 border border-blue-100 uppercase tracking-widest">
                                        Pelamar Aktif
                                    </span>
                                </div>
                            </div>
                            <div class="h-12 w-12 overflow-hidden rounded-full border border-slate-200 shadow-sm bg-slate-100 shrink-0 flex items-center justify-center text-xl font-bold text-blue-600 relative">
                                @if(isset($jobSeeker) && $jobSeeker->profile_picture)
                                    <img src="{{ asset('storage/' . $jobSeeker->profile_picture) }}" alt="Avatar" class="h-full w-full object-cover z-10" onerror="this.style.display='none'">
                                    <span class="absolute inset-0 flex items-center justify-center">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</span>
                                @else
                                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                                @endif
                            </div>
                        </div>
                    </div>

                                        <div class="grid gap-6 grid-cols-1 sm:grid-cols-3">
                        <div class="rounded-2xl bg-white p-6 shadow-sm border border-slate-100/80 hover:shadow-md transition">
                            <div class="flex items-center justify-between mb-4">
                                <div class="h-10 w-10 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center"><svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" /></svg></div>
                            </div>
                            <p class="text-sm font-bold text-slate-400 tracking-wide">Total Dilamar</p>
                            <p class="mt-2 text-4xl font-black text-slate-900">{{ $totalApplications ?? 0 }}</p>
                        </div>
                        <div class="rounded-2xl bg-white p-6 shadow-sm border border-slate-100/80 hover:shadow-md transition">
                            <div class="flex items-center justify-between mb-4">
                                <div class="h-10 w-10 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center"><svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" /></svg></div>
                            </div>
                            <p class="text-sm font-bold text-slate-400 tracking-wide">Menunggu</p>
                            <p class="mt-2 text-4xl font-black text-slate-900">{{ $waitingApplications ?? 0 }}</p>
                        </div>
                        <div class="rounded-2xl bg-white p-6 shadow-sm border border-slate-100/80 hover:shadow-md transition">
                            <div class="flex items-center justify-between mb-4">
                                <div class="h-10 w-10 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center"><svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg></div>
                            </div>
                            <p class="text-sm font-bold text-slate-400 tracking-wide">Diterima</p>
                            <p class="mt-2 text-4xl font-black text-slate-900">{{ $acceptedApplications ?? 0 }}</p>
                        </div>
                    </div>

                                        <section class="rounded-2xl bg-white p-6 shadow-sm border border-slate-100/80">
                        <div class="flex items-center justify-between mb-8">
                            <h2 class="text-xl font-extrabold text-slate-900 tracking-tight">Lamaran Terbaru</h2>
                            <a href="{{ route('job_seeker.applications') }}" class="text-sm font-bold text-blue-600 hover:text-blue-700 hover:underline">
                                Lihat Semua &rarr;
                            </a>
                        </div>

                        <div class="overflow-x-auto">
                            <table class="w-full text-left text-sm">
                                <thead>
                                    <tr class="text-xs font-bold text-slate-400 uppercase tracking-wider border-b border-slate-100">
                                        <th class="pb-3">Lowongan</th>
                                        <th class="pb-3">Perusahaan</th>
                                        <th class="pb-3">Tanggal Lamar</th>
                                        <th class="pb-3">Status</th>
                                        <th class="pb-3 text-right">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-slate-100 text-slate-700 font-medium">
                                    @forelse($recentApplications ?? [] as $app)
                                    <tr>
                                        <td class="py-4 font-bold text-slate-900">{{ $app->jobListing->title }}</td>
                                        <td class="py-4 text-slate-500">{{ $app->jobListing->company->name }}</td>
                                        <td class="py-4 text-slate-500">{{ $app->created_at->format('d M Y') }}</td>
                                        <td class="py-4">
                                            @if($app->status === 'accepted')
                                                <span class="inline-flex rounded-full bg-emerald-50 px-2.5 py-1 text-[10px] font-bold text-emerald-700 border border-emerald-100 uppercase tracking-wider">Diterima</span>
                                            @elseif($app->status === 'rejected')
                                                <span class="inline-flex rounded-full bg-rose-50 px-2.5 py-1 text-[10px] font-bold text-rose-700 border border-rose-100 uppercase tracking-wider">Ditolak</span>
                                            @else
                                                <span class="inline-flex rounded-full bg-amber-50 px-2.5 py-1 text-[10px] font-bold text-amber-700 border border-amber-100 uppercase tracking-wider">Menunggu</span>
                                            @endif
                                        </td>
                                        <td class="py-4 text-right flex justify-end gap-2">
                                            <a href="{{ route('jobs.show', $app->jobListing->id) }}" class="rounded-lg bg-blue-50 px-3 py-1.5 text-xs font-bold text-blue-700 hover:bg-blue-100 transition inline-block">Detail Lowongan</a>
                                            @if($app->status === 'waiting')
                                                <form action="{{ route('job_seeker.application.cancel', $app->id) }}" method="POST" onsubmit="return confirm('Yakin ingin membatalkan lamaran ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="rounded-lg bg-rose-50 px-3 py-1.5 text-xs font-bold text-rose-700 hover:bg-rose-100 transition">
                                                        Batalkan
                                                    </button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="5" class="py-8 text-center text-slate-500">
                                            Belum ada lamaran terkirim.<br>
                                            <a href="{{ route('jobs.index') }}" class="inline-block mt-3 text-blue-600 hover:underline">Cari Lowongan Sekarang</a>
                                        </td>
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