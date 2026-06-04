<x-app-layout>
    <div class="block w-full min-h-screen bg-slate-50 antialiased">
        <div class="flex min-h-screen w-full overflow-hidden">
            <x-admin-sidebar />

            <div class="flex-1 bg-slate-50 overflow-y-auto">
                <main class="p-8 lg:p-12 space-y-8 max-w-[1600px] mx-auto">
                    
                    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                        <div>
                            <h1 class="text-3xl font-extrabold text-slate-900 tracking-tight">Manajemen Perusahaan</h1>
                            <p class="text-slate-500 mt-2">Daftar semua perusahaan yang terdaftar di JOBHUB.</p>
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
                                        <th class="pb-3 font-bold">Industri</th>
                                        <th class="pb-3 font-bold">Tgl Daftar</th>
                                        <th class="pb-3 font-bold">Status</th>
                                        <th class="pb-3 font-bold text-right">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-slate-100 text-slate-700 font-medium">
                                    @forelse($companies as $company)
                                    <tr>
                                        <td class="py-4">
                                            <div class="flex items-center gap-4">
                                                <div class="h-10 w-10 overflow-hidden rounded-xl border border-slate-200 shadow-sm bg-slate-50 shrink-0 flex items-center justify-center">
                                                    @if($company->logo_path)
                                                        <img src="{{ asset('storage/' . $company->logo_path) }}" alt="Logo" class="h-full w-full object-cover">
                                                    @else
                                                        <span class="text-sm font-black text-slate-400">{{ strtoupper(substr($company->name, 0, 1)) }}</span>
                                                    @endif
                                                </div>
                                                <div>
                                                    <p class="font-bold text-slate-900">{{ $company->name }}</p>
                                                    <p class="text-xs text-slate-500">{{ $company->user->email ?? '-' }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="py-4 text-slate-500">{{ $company->industry ?? '-' }}</td>
                                        <td class="py-4 text-slate-500">{{ $company->created_at->format('d M Y') }}</td>
                                        <td class="py-4">
                                            @if($company->status === 'verified')
                                                <span class="inline-flex rounded-full bg-emerald-50 px-3 py-0.5 text-xs font-bold text-emerald-700 border border-emerald-100">Verified</span>
                                            @elseif($company->status === 'rejected')
                                                <span class="inline-flex rounded-full bg-rose-50 px-3 py-0.5 text-xs font-bold text-rose-700 border border-rose-100">Rejected</span>
                                            @else
                                                <span class="inline-flex rounded-full bg-amber-50 px-3 py-0.5 text-xs font-bold text-amber-700 border border-amber-100">Pending</span>
                                            @endif
                                        </td>
                                        <td class="py-4 text-right">
                                            @if($company->status === 'pending')
                                                <div class="flex items-center justify-end gap-2">
                                                    <form action="{{ route('admin.companies.verify', $company->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Verifikasi perusahaan ini?')">
                                                        @csrf
                                                        @method('PUT')
                                                        <button type="submit" class="rounded-lg bg-emerald-50 px-3 py-1.5 text-xs font-bold text-emerald-700 hover:bg-emerald-100 transition">Verify</button>
                                                    </form>
                                                    <form action="{{ route('admin.companies.reject', $company->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Tolak perusahaan ini?')">
                                                        @csrf
                                                        @method('PUT')
                                                        <button type="submit" class="rounded-lg bg-rose-50 px-3 py-1.5 text-xs font-bold text-rose-700 hover:bg-rose-100 transition">Reject</button>
                                                    </form>
                                                </div>
                                            @else
                                                <span class="text-xs text-slate-400 italic">No action needed</span>
                                            @endif
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="5" class="py-8 text-center text-slate-500">Belum ada perusahaan yang mendaftar.</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        <div class="mt-6">
                            {{ $companies->links() }}
                        </div>
                    </section>
                </main>
            </div>
        </div>
    </div>
</x-app-layout>
