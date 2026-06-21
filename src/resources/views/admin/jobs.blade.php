<x-app-layout>
    <div class="block w-full min-h-screen bg-slate-50 antialiased">
        <div class="flex min-h-screen w-full overflow-hidden">
            <x-admin-sidebar />

            <div class="flex-1 bg-slate-50 overflow-y-auto">
                <main class="p-8 lg:p-12 space-y-8 max-w-[1600px] mx-auto">
                    
                    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                        <div>
                            <h1 class="text-3xl font-extrabold text-slate-900 tracking-tight">Manajemen Lowongan</h1>
                            <p class="text-slate-500 mt-2">Daftar semua lowongan dari seluruh perusahaan.</p>
                        </div>
                    </div>

                    @if (session('success'))
                        <div class="bg-emerald-50 border-l-4 border-emerald-500 p-4 mb-4 rounded-lg">
                            <p class="text-sm text-emerald-700 font-bold">{{ session('success') }}</p>
                        </div>
                    @endif

                    <section class="rounded-2xl bg-white p-6 shadow-sm border border-slate-100/80">
                        <div class="overflow-x-auto">
                            <table class="w-full text-left text-sm">
                                <thead>
                                    <tr class="text-xs font-bold text-slate-400 uppercase tracking-wider border-b border-slate-100">
                                        <th class="pb-3 font-bold">Perusahaan</th>
                                        <th class="pb-3 font-bold">Lowongan</th>
                                        <th class="pb-3 font-bold">Kategori</th>
                                        <th class="pb-3 font-bold">Lokasi</th>
                                        <th class="pb-3 font-bold">Status Admin</th>
                                        <th class="pb-3 font-bold">Open/Closed</th>
                                        <th class="pb-3 font-bold text-right">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-slate-100 text-slate-700 font-medium">
                                    @forelse($jobs as $job)
                                    <tr>
                                        <td class="py-4">
                                            <div class="flex items-center gap-3">
                                                <div class="h-8 w-8 overflow-hidden rounded-lg border border-slate-200 shadow-sm bg-slate-50 shrink-0 flex items-center justify-center">
                                                    @if($job->company && $job->company->logo_path)
                                                        <img src="{{ asset('storage/' . $job->company->logo_path) }}" alt="Logo" class="h-full w-full object-cover">
                                                    @else
                                                        <span class="text-xs font-black text-slate-400">{{ strtoupper(substr($job->company->name ?? '?', 0, 1)) }}</span>
                                                    @endif
                                                </div>
                                                <p class="font-bold text-slate-900">{{ $job->company->name ?? 'Terhapus' }}</p>
                                            </div>
                                        </td>
                                        <td class="py-4 font-bold text-slate-900">{{ $job->title }}</td>
                                        <td class="py-4 text-slate-500">{{ $job->category->name ?? '-' }}</td>
                                        <td class="py-4 text-slate-500">{{ $job->location }}</td>
                                        <td class="py-4">
                                            @if($job->status === 'approved')
                                                <span class="inline-flex rounded-full bg-blue-50 px-3 py-0.5 text-xs font-bold text-blue-700 border border-blue-100 uppercase tracking-wider">Approved</span>
                                            @elseif($job->status === 'rejected')
                                                <span class="inline-flex rounded-full bg-red-50 px-3 py-0.5 text-xs font-bold text-red-700 border border-red-100 uppercase tracking-wider">Rejected</span>
                                            @else
                                                <span class="inline-flex rounded-full bg-amber-50 px-3 py-0.5 text-xs font-bold text-amber-700 border border-amber-100 uppercase tracking-wider">Pending</span>
                                            @endif
                                        </td>
                                        <td class="py-4">
                                            @if($job->is_open)
                                                <span class="inline-flex rounded-full bg-emerald-50 px-3 py-0.5 text-xs font-bold text-emerald-700 border border-emerald-100">Open</span>
                                            @else
                                                <span class="inline-flex rounded-full bg-rose-50 px-3 py-0.5 text-xs font-bold text-rose-700 border border-rose-100">Closed</span>
                                            @endif
                                        </td>
                                        <td class="py-4 text-right">
                                            <div class="flex items-center justify-end gap-2">
                                                @if($job->status !== 'approved')
                                                <form action="{{ route('admin.jobs.approve', $job->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Setujui lowongan ini?')">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit" class="rounded-lg bg-emerald-50 px-3 py-1.5 text-xs font-bold text-emerald-700 hover:bg-emerald-100 transition">Approve</button>
                                                </form>
                                                @endif
                                                @if($job->status !== 'rejected')
                                                <form action="{{ route('admin.jobs.reject', $job->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Tolak lowongan ini?')">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit" class="rounded-lg bg-rose-50 px-3 py-1.5 text-xs font-bold text-rose-700 hover:bg-rose-100 transition">Reject</button>
                                                </form>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="7" class="py-8 text-center text-slate-500">Belum ada data lowongan.</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        <div class="mt-6">
                            {{ $jobs->links() }}
                        </div>
                    </section>
                </main>
            </div>
        </div>
    </div>
</x-app-layout>
