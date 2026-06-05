<x-app-layout>
    <div class="block w-full min-h-screen bg-slate-50 antialiased">
        <div class="flex min-h-screen w-full overflow-hidden">
            
            <x-jobseeker-sidebar />

            <div class="flex-1 bg-slate-50 overflow-y-auto">
                <main class="p-8 lg:p-12 space-y-10 max-w-[1600px] mx-auto">
                    
                    {{-- HEADER --}}
                    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                        <div>
                            <h1 class="text-3xl font-extrabold text-slate-900 tracking-tight">Status Lamaran</h1>
                            <p class="text-slate-500 mt-2">Daftar semua lowongan pekerjaan yang telah kamu lamar.</p>
                        </div>
                    </div>

                    @if(session('success'))
                        <div class="text-sm font-medium text-green-700 bg-green-50 px-4 py-3 rounded-xl border border-green-200">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if(session('error'))
                        <div class="text-sm font-medium text-red-700 bg-red-50 px-4 py-3 rounded-xl border border-red-200">
                            {{ session('error') }}
                        </div>
                    @endif

                    {{-- APPLICATIONS TABLE --}}
                    <section class="rounded-2xl bg-white shadow-sm border border-slate-100/80 overflow-hidden">
                        <div class="overflow-x-auto">
                            <table class="w-full text-left text-sm">
                                <thead class="bg-slate-50 border-b border-slate-100">
                                    <tr class="text-xs font-bold text-slate-500 uppercase tracking-wider">
                                        <th class="py-4 px-6">Posisi & Perusahaan</th>
                                        <th class="py-4 px-6">Kategori</th>
                                        <th class="py-4 px-6">Tanggal Lamar</th>
                                        <th class="py-4 px-6">Status</th>
                                        <th class="py-4 px-6 text-right">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-slate-100 text-slate-700 font-medium bg-white">
                                    @forelse($applications ?? [] as $app)
                                    <tr class="hover:bg-slate-50/50 transition">
                                        <td class="py-4 px-6">
                                            <a href="{{ route('jobs.show', $app->jobListing->id) }}" class="font-bold text-slate-900 hover:text-blue-700 block truncate max-w-xs">
                                                {{ $app->jobListing->title }}
                                            </a>
                                            <div class="text-slate-500 text-xs mt-0.5">{{ $app->jobListing->company->name }}</div>
                                        </td>
                                        <td class="py-4 px-6 text-slate-500">
                                            {{ $app->jobListing->category->name }}
                                        </td>
                                        <td class="py-4 px-6 text-slate-500">
                                            {{ $app->created_at->format('d M Y, H:i') }}
                                        </td>
                                        <td class="py-4 px-6">
                                            @if($app->status === 'accepted')
                                                <span class="inline-flex rounded-full bg-emerald-50 px-2.5 py-1 text-[10px] font-bold text-emerald-700 border border-emerald-100 uppercase tracking-wider">Diterima</span>
                                            @elseif($app->status === 'rejected')
                                                <span class="inline-flex rounded-full bg-rose-50 px-2.5 py-1 text-[10px] font-bold text-rose-700 border border-rose-100 uppercase tracking-wider">Ditolak</span>
                                            @else
                                                <span class="inline-flex rounded-full bg-amber-50 px-2.5 py-1 text-[10px] font-bold text-amber-700 border border-amber-100 uppercase tracking-wider">Menunggu</span>
                                            @endif
                                        </td>
                                        <td class="py-4 px-6 text-right flex justify-end gap-2">
                                            <a href="{{ route('jobs.show', $app->jobListing->id) }}" class="rounded-lg bg-slate-100 px-3 py-1.5 text-xs font-bold text-slate-700 hover:bg-slate-200 transition">Lihat Job</a>
                                            
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
                                        <td colspan="5" class="py-12 text-center">
                                            <div class="text-4xl mb-3">📭</div>
                                            <p class="text-slate-500 font-medium">Kamu belum melamar pekerjaan apapun.</p>
                                            <a href="{{ route('jobs.index') }}" class="inline-block mt-4 px-4 py-2 bg-blue-600 text-white font-bold rounded-xl hover:bg-blue-700 transition">Cari Lowongan</a>
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        @if(isset($applications) && $applications->hasPages())
                            <div class="p-6 border-t border-slate-100">
                                {{ $applications->links() }}
                            </div>
                        @endif
                    </section>

                </main>
            </div>
            
        </div>
    </div>
</x-app-layout>
