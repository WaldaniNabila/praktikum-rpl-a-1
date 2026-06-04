<x-app-layout>
    <div class="block w-full min-h-screen bg-slate-50 antialiased"
         x-data="{ 
            openAddModal: false, 
            openEditModal: false,
            editJob: { id: '', title: '', location: '', status: '' }
         }">
        
        <div class="flex min-h-screen w-full overflow-hidden">
            
            <x-company-sidebar />

            <div class="flex-1 bg-slate-50 overflow-y-auto">
                <main class="p-8 lg:p-12 space-y-10 max-w-[1600px] mx-auto">
                    
                    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                        <div>
                            <h1 class="text-3xl font-extrabold text-slate-900 tracking-tight">Company Dashboard</h1>
                        </div>
                        
                        <div class="flex items-center gap-4">
                            <div class="text-right">
                                <p class="text-sm font-bold text-slate-900">{{ Auth::user()->name }}</p>
                                <p class="text-xs text-slate-500 font-medium">{{ Auth::user()->email }}</p>
                                <div class="mt-1.5">
                                    <span class="inline-flex rounded-full bg-blue-50 px-3 py-0.5 text-[11px] font-bold text-blue-600 border border-blue-100">
                                        Company Account
                                    </span>
                                </div>
                            </div>
                            <div class="h-12 w-12 overflow-hidden rounded-full border border-slate-200 shadow-sm bg-slate-300 shrink-0">
                                <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=100&q=80" alt="Avatar" class="h-full w-full object-cover">
                            </div>
                        </div>
                    </div>

                    <div class="grid gap-6 grid-cols-1 sm:grid-cols-2 lg:grid-cols-4">
                        <div class="rounded-2xl bg-white p-6 shadow-sm border border-slate-100/80">
                            <p class="text-sm font-bold text-slate-400 tracking-wide">Total Jobs</p>
                            <p class="mt-4 text-4xl font-black text-blue-600">{{ $totalJobs ?? 0 }}</p>
                        </div>
                        <div class="rounded-2xl bg-white p-6 shadow-sm border border-slate-100/80">
                            <p class="text-sm font-bold text-slate-400 tracking-wide">Total Applicants</p>
                            <p class="mt-4 text-4xl font-black text-blue-600">{{ $totalApplicants ?? 0 }}</p>
                        </div>
                        <div class="rounded-2xl bg-white p-6 shadow-sm border border-slate-100/80">
                            <p class="text-sm font-bold text-slate-400 tracking-wide">Active Jobs</p>
                            <p class="mt-4 text-4xl font-black text-blue-600">{{ $activeJobs ?? 0 }}</p>
                        </div>
                        <div class="rounded-2xl bg-white p-6 shadow-sm border border-slate-100/80">
                            <p class="text-sm font-bold text-slate-400 tracking-wide">Pending Jobs</p>
                            <p class="mt-4 text-4xl font-black text-blue-600">{{ $pendingJobs ?? 0 }}</p>
                        </div>
                    </div>

                    <section class="rounded-2xl bg-white p-6 shadow-sm border border-slate-100/80">
                        <div class="flex items-center justify-between mb-8">
                            <h2 class="text-xl font-extrabold text-slate-900 tracking-tight">Recent Job Listings</h2>
                            <a href="{{ route('company.jobs.create') }}" class="inline-flex items-center justify-center rounded-xl bg-blue-600 px-5 py-2.5 text-sm font-bold text-white shadow-md shadow-blue-600/10 hover:bg-blue-700 transition">
                                + Add Job
                            </a>
                        </div>

                        <div class="overflow-x-auto">
                            <table class="w-full text-left text-sm">
                                <thead>
                                    <tr class="text-xs font-bold text-slate-400 uppercase tracking-wider border-b border-slate-100">
                                        <th class="pb-3 font-bold">Job Title</th>
                                        <th class="pb-3 font-bold">Location</th>
                                        <th class="pb-3 font-bold">Applicants</th>
                                        <th class="pb-3 font-bold">Status</th>
                                        <th class="pb-3 font-bold text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-slate-100 text-slate-700 font-medium">
                                    @forelse($recentJobs ?? [] as $job)
                                    <tr>
                                        <td class="py-4 font-bold text-slate-900">{{ $job->title }}</td>
                                        <td class="py-4 text-slate-500">{{ $job->location }}</td>
                                        <td class="py-4 font-black text-slate-900">{{ $job->applications ? $job->applications->count() : 0 }}</td>
                                        <td class="py-4">
                                            @if($job->is_open)
                                                <span class="inline-flex rounded-full bg-emerald-50 px-3 py-0.5 text-xs font-bold text-emerald-700 border border-emerald-100">Open</span>
                                            @else
                                                <span class="inline-flex rounded-full bg-rose-50 px-3 py-0.5 text-xs font-bold text-rose-700 border border-rose-100">Closed</span>
                                            @endif
                                        </td>
                                        <td class="py-4 text-right space-x-1">
                                            <a href="{{ route('company.jobs.edit', $job->id) }}" class="rounded-lg bg-slate-100 px-3 py-1.5 text-xs font-bold text-slate-700 hover:bg-slate-200 transition">Edit</a>
                                            
                                            <form action="{{ route('company.jobs.destroy', $job->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Apakah kamu yakin ingin menghapus lowongan ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="rounded-lg bg-rose-50 px-3 py-1.5 text-xs font-bold text-rose-700 hover:bg-rose-100 transition">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="5" class="py-4 text-center text-slate-500">Belum ada lowongan pekerjaan.</td>
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