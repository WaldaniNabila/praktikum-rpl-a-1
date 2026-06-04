<x-app-layout>
    <div class="block w-full min-h-screen bg-slate-50 antialiased">
        <div class="flex min-h-screen w-full overflow-hidden">
            <x-company-sidebar />

            <div class="flex-1 bg-slate-50 overflow-y-auto">
                <main class="p-8 lg:p-12 space-y-10 max-w-[1600px] mx-auto">
                    
                    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                        <div>
                            <h1 class="text-3xl font-extrabold text-slate-900 tracking-tight">Semua Lowongan</h1>
                            <p class="text-slate-500 mt-2">Kelola semua lowongan pekerjaan yang telah kamu buat</p>
                        </div>
                        
                        <a href="{{ route('company.jobs.create') }}" class="inline-flex items-center justify-center rounded-xl bg-blue-600 px-5 py-2.5 text-sm font-bold text-white shadow-md shadow-blue-600/10 hover:bg-blue-700 transition">
                            + Add Job
                        </a>
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
                                        <th class="pb-3 font-bold">Job Title</th>
                                        <th class="pb-3 font-bold">Location</th>
                                        <th class="pb-3 font-bold">Type</th>
                                        <th class="pb-3 font-bold">Applicants</th>
                                        <th class="pb-3 font-bold">Status</th>
                                        <th class="pb-3 font-bold text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-slate-100 text-slate-700 font-medium">
                                    @forelse($jobs as $job)
                                    <tr>
                                        <td class="py-4 font-bold text-slate-900">
                                            {{ $job->title }}
                                            <div class="text-xs text-slate-500 font-normal mt-1">{{ \Illuminate\Support\Str::limit($job->description, 50) }}</div>
                                        </td>
                                        <td class="py-4 text-slate-500">{{ $job->location }}</td>
                                        <td class="py-4 text-slate-500 capitalize">{{ str_replace('-', ' ', $job->employment_type) }}</td>
                                        <td class="py-4 font-black text-slate-900">{{ $job->applications ? $job->applications->count() : 0 }}</td>
                                        <td class="py-4">
                                            @if($job->is_open)
                                                <span class="inline-flex rounded-full bg-emerald-50 px-3 py-0.5 text-xs font-bold text-emerald-700 border border-emerald-100">Open</span>
                                            @else
                                                <span class="inline-flex rounded-full bg-rose-50 px-3 py-0.5 text-xs font-bold text-rose-700 border border-rose-100">Closed</span>
                                            @endif
                                        </td>
                                        <td class="py-4 text-right space-x-1">
                                            <a href="{{ route('company.jobs.applicants', $job->id) }}" class="rounded-lg bg-indigo-50 px-3 py-1.5 text-xs font-bold text-indigo-700 hover:bg-indigo-100 transition inline-block">Pelamar</a>
                                            
                                            <a href="{{ route('company.jobs.edit', $job->id) }}" class="rounded-lg bg-slate-100 px-3 py-1.5 text-xs font-bold text-slate-700 hover:bg-slate-200 transition inline-block">Edit</a>
                                            
                                            <form action="{{ route('company.jobs.destroy', $job->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Apakah kamu yakin ingin menghapus lowongan ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="rounded-lg bg-rose-50 px-3 py-1.5 text-xs font-bold text-rose-700 hover:bg-rose-100 transition">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="6" class="py-8 text-center text-slate-500">
                                            <p class="mb-4">Belum ada lowongan pekerjaan yang dibuat.</p>
                                        </td>
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
