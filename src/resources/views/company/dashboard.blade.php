<x-app-layout>
    <div class="block w-full min-h-screen bg-slate-50 antialiased"
         x-data="{ 
            openAddModal: false, 
            openEditModal: false,
            editJob: { id: '', title: '', location: '', status: '' }
         }">
        
        <div class="flex min-h-screen w-full overflow-hidden">
            
            <aside class="w-80 bg-slate-900 p-6 text-slate-100 shrink-0 flex flex-col justify-between border-r border-slate-800">
                <div>
                    <div class="mb-10 mt-2 px-2">
                        <div class="text-3xl font-black tracking-wider text-blue-500 uppercase">JOBHUB</div>
                    </div>

                    <nav class="space-y-1.5">
                        <a href="#" class="flex items-center gap-4 rounded-xl bg-blue-600 px-4 py-3.5 text-sm font-semibold text-white shadow-md shadow-blue-600/10 transition">
                            <span class="text-base">📊</span>
                            <span>Dashboard</span>
                        </a>
                        <a href="#" class="flex items-center gap-4 rounded-xl px-4 py-3.5 text-sm font-medium text-slate-400 hover:bg-slate-800/60 hover:text-white transition">
                            <span class="text-base">💼</span>
                            <span>Job Listings</span>
                        </a>
                        <a href="#" class="flex items-center gap-4 rounded-xl px-4 py-3.5 text-sm font-medium text-slate-400 hover:bg-slate-800/60 hover:text-white transition">
                            <span class="text-base">👨‍💼</span>
                            <span>Applicants</span>
                        </a>
                        <a href="#" class="flex items-center gap-4 rounded-xl px-4 py-3.5 text-sm font-medium text-slate-400 hover:bg-slate-800/60 hover:text-white transition">
                            <span class="text-base">📄</span>
                            <span>Company Profile</span>
                        </a>
                        <a href="#" class="flex items-center gap-4 rounded-xl px-4 py-3.5 text-sm font-medium text-slate-400 hover:bg-slate-800/60 hover:text-white transition">
                            <span class="text-base">⚙</span>
                            <span>Settings</span>
                        </a>
                    </nav>
                </div>

                <div class="border-t border-slate-800/60 pt-4">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="flex w-full items-center gap-4 rounded-xl px-4 py-3.5 text-sm font-medium text-amber-600 hover:bg-slate-800/60 transition">
                            <span class="text-base">🚪</span>
                            <span>Logout</span>
                        </button>
                    </form>
                </div>
            </aside>

            <div class="flex-1 bg-slate-50 overflow-y-auto">
                <main class="p-8 lg:p-12 space-y-10 max-w-[1600px] mx-auto">
                    
                    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                        <div>
                            <h1 class="text-3xl font-extrabold text-slate-900 tracking-tight">Company Dashboard</h1>
                        </div>
                        
                        <div class="flex items-center gap-4">
                            <div class="text-right">
                                <p class="text-sm font-bold text-slate-900">Waldani Nabila Tamamah</p>
                                <p class="text-xs text-slate-500 font-medium">googlecompany@gmail.com</p>
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
                            <p class="mt-4 text-4xl font-black text-blue-600">24</p>
                        </div>
                        <div class="rounded-2xl bg-white p-6 shadow-sm border border-slate-100/80">
                            <p class="text-sm font-bold text-slate-400 tracking-wide">Total Applicants</p>
                            <p class="mt-4 text-4xl font-black text-blue-600">310</p>
                        </div>
                        <div class="rounded-2xl bg-white p-6 shadow-sm border border-slate-100/80">
                            <p class="text-sm font-bold text-slate-400 tracking-wide">Interview Schedule</p>
                            <p class="mt-4 text-4xl font-black text-blue-600">18</p>
                        </div>
                        <div class="rounded-2xl bg-white p-6 shadow-sm border border-slate-100/80">
                            <p class="text-sm font-bold text-slate-400 tracking-wide">Messages</p>
                            <p class="mt-4 text-4xl font-black text-blue-600">12</p>
                        </div>
                    </div>

                    <section class="rounded-2xl bg-white p-6 shadow-sm border border-slate-100/80">
                        <div class="flex items-center justify-between mb-8">
                            <h2 class="text-xl font-extrabold text-slate-900 tracking-tight">Recent Job Listings</h2>
                            <button @click="openAddModal = true" class="inline-flex items-center justify-center rounded-xl bg-blue-600 px-5 py-2.5 text-sm font-bold text-white shadow-md shadow-blue-600/10 hover:bg-blue-700 transition">
                                + Add Job
                            </button>
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
                                    <tr>
                                        <td class="py-4 font-bold text-slate-900">Frontend Developer</td>
                                        <td class="py-4 text-slate-500">Jakarta</td>
                                        <td class="py-4 font-black text-slate-900">45</td>
                                        <td class="py-4">
                                            <span class="inline-flex rounded-full bg-emerald-50 px-3 py-0.5 text-xs font-bold text-emerald-700 border border-emerald-100">Open</span>
                                        </td>
                                        <td class="py-4 text-right space-x-1">
                                            <button @click="editJob = { id: '1', title: 'Frontend Developer', location: 'Jakarta', status: 'Open' }; openEditModal = true;" class="rounded-lg bg-slate-100 px-3 py-1.5 text-xs font-bold text-slate-700 hover:bg-slate-200 transition">Edit</button>
                                            
                                            <form action="#" method="POST" class="inline-block" onsubmit="return confirm('Apakah kamu yakin ingin menghapus lowongan ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="rounded-lg bg-rose-50 px-3 py-1.5 text-xs font-bold text-rose-700 hover:bg-rose-100 transition">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="py-4 font-bold text-slate-900">Backend Developer</td>
                                        <td class="py-4 text-slate-500">Bandung</td>
                                        <td class="py-4 font-black text-slate-900">38</td>
                                        <td class="py-4">
                                            <span class="inline-flex rounded-full bg-emerald-50 px-3 py-0.5 text-xs font-bold text-emerald-700 border border-emerald-100">Open</span>
                                        </td>
                                        <td class="py-4 text-right space-x-1">
                                            <button @click="editJob = { id: '2', title: 'Backend Developer', location: 'Bandung', status: 'Open' }; openEditModal = true;" class="rounded-lg bg-slate-100 px-3 py-1.5 text-xs font-bold text-slate-700 hover:bg-slate-200 transition">Edit</button>
                                            
                                            <form action="#" method="POST" class="inline-block" onsubmit="return confirm('Apakah kamu yakin ingin menghapus lowongan ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="rounded-lg bg-rose-50 px-3 py-1.5 text-xs font-bold text-rose-700 hover:bg-rose-100 transition">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="py-4 font-bold text-slate-900">UI/UX Designer</td>
                                        <td class="py-4 text-slate-500">Surabaya</td>
                                        <td class="py-4 font-black text-slate-900">22</td>
                                        <td class="py-4">
                                            <span class="inline-flex rounded-full bg-rose-50 px-3 py-0.5 text-xs font-bold text-rose-700 border border-rose-100">Closed</span>
                                        </td>
                                        <td class="py-4 text-right space-x-1">
                                            <button @click="editJob = { id: '3', title: 'UI/UX Designer', location: 'Surabaya', status: 'Closed' }; openEditModal = true;" class="rounded-lg bg-slate-100 px-3 py-1.5 text-xs font-bold text-slate-700 hover:bg-slate-200 transition">Edit</button>
                                            
                                            <form action="#" method="POST" class="inline-block" onsubmit="return confirm('Apakah kamu yakin ingin menghapus lowongan ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="rounded-lg bg-rose-50 px-3 py-1.5 text-xs font-bold text-rose-700 hover:bg-rose-100 transition">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </section>
                </main>
            </div>
            
        </div>

        <div x-show="openAddModal" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-900/60" x-cloak style="display: none;">
            <div class="bg-white rounded-2xl max-w-md w-full p-6 shadow-xl border border-slate-100" @click.away="openAddModal = false">
                <h3 class="text-lg font-bold text-slate-900 mb-4">Tambah Lowongan Baru</h3>
                <form action="#" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label class="block text-xs font-bold text-slate-500 uppercase mb-1">Job Title</label>
                        <input type="text" name="title" required class="w-full rounded-xl border-slate-200 text-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-500 uppercase mb-1">Location</label>
                        <input type="text" name="location" required class="w-full rounded-xl border-slate-200 text-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-500 uppercase mb-1">Status</label>
                        <select name="status" class="w-full rounded-xl border-slate-200 text-sm focus:border-blue-500 focus:ring-blue-500">
                            <option value="Open">Open</option>
                            <option value="Closed">Closed</option>
                        </select>
                    </div>
                    <div class="flex justify-end gap-2 pt-2">
                        <button type="button" @click="openAddModal = false" class="px-4 py-2 text-sm font-semibold text-slate-600 bg-slate-100 rounded-xl">Batal</button>
                        <button type="submit" class="px-4 py-2 text-sm font-semibold text-white bg-blue-600 rounded-xl hover:bg-blue-700">Simpan</button>
                    </div>
                </form>
            </div>
        </div>

        <div x-show="openEditModal" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-900/60" x-cloak style="display: none;">
            <div class="bg-white rounded-2xl max-w-md w-full p-6 shadow-xl border border-slate-100" @click.away="openEditModal = false">
                <h3 class="text-lg font-bold text-slate-900 mb-4">Edit Lowongan Kerja</h3>
                <form :action="'/jobs/' + editJob.id" method="POST" class="space-y-4">
                    @csrf
                    @method('PUT')
                    <div>
                        <label class="block text-xs font-bold text-slate-500 uppercase mb-1">Job Title</label>
                        <input type="text" name="title" x-model="editJob.title" required class="w-full rounded-xl border-slate-200 text-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-500 uppercase mb-1">Location</label>
                        <input type="text" name="location" x-model="editJob.location" required class="w-full rounded-xl border-slate-200 text-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-500 uppercase mb-1">Status</label>
                        <select name="status" x-model="editJob.status" class="w-full rounded-xl border-slate-200 text-sm focus:border-blue-500 focus:ring-blue-500">
                            <option value="Open">Open</option>
                            <option value="Closed">Closed</option>
                        </select>
                    </div>
                    <div class="flex justify-end gap-2 pt-2">
                        <button type="button" @click="openEditModal = false" class="px-4 py-2 text-sm font-semibold text-slate-600 bg-slate-100 rounded-xl">Batal</button>
                        <button type="submit" class="px-4 py-2 text-sm font-semibold text-white bg-blue-600 rounded-xl hover:bg-blue-700">Perbarui</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</x-app-layout>