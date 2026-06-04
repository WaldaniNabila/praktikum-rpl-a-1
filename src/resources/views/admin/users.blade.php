<x-app-layout>
    <div class="block w-full min-h-screen bg-slate-50 antialiased">
        <div class="flex min-h-screen w-full overflow-hidden">
            <x-admin-sidebar />

            <div class="flex-1 bg-slate-50 overflow-y-auto">
                <main class="p-8 lg:p-12 space-y-8 max-w-[1600px] mx-auto">
                    
                    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                        <div>
                            <h1 class="text-3xl font-extrabold text-slate-900 tracking-tight">Manajemen User</h1>
                            <p class="text-slate-500 mt-2">Daftar semua pengguna portal (Admin, Company, Job Seeker).</p>
                        </div>
                    </div>

                    @if (session('success'))
                        <div class="bg-emerald-50 border-l-4 border-emerald-500 p-4 mb-4 rounded-lg">
                            <p class="text-sm text-emerald-700 font-bold">{{ session('success') }}</p>
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="bg-rose-50 border-l-4 border-rose-500 p-4 mb-4 rounded-lg">
                            <p class="text-sm text-rose-700 font-bold">{{ session('error') }}</p>
                        </div>
                    @endif

                    <section class="rounded-2xl bg-white p-6 shadow-sm border border-slate-100/80">
                        <div class="overflow-x-auto">
                            <table class="w-full text-left text-sm">
                                <thead>
                                    <tr class="text-xs font-bold text-slate-400 uppercase tracking-wider border-b border-slate-100">
                                        <th class="pb-3 font-bold">Pengguna</th>
                                        <th class="pb-3 font-bold">Role</th>
                                        <th class="pb-3 font-bold">Tanggal Daftar</th>
                                        <th class="pb-3 font-bold">Status Akun</th>
                                        <th class="pb-3 font-bold text-right">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-slate-100 text-slate-700 font-medium">
                                    @forelse($users as $user)
                                    <tr>
                                        <td class="py-4">
                                            <div class="flex items-center gap-3">
                                                <div class="h-10 w-10 overflow-hidden rounded-full border border-slate-200 shadow-sm bg-slate-50 shrink-0 flex items-center justify-center">
                                                    <span class="text-sm font-black text-slate-400">{{ strtoupper(substr($user->name, 0, 1)) }}</span>
                                                </div>
                                                <div>
                                                    <p class="font-bold text-slate-900">{{ $user->name }}</p>
                                                    <p class="text-xs text-slate-500">{{ $user->email }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="py-4">
                                            @if($user->role === 'admin')
                                                <span class="inline-flex rounded-full bg-rose-50 px-3 py-0.5 text-xs font-bold text-rose-700 border border-rose-100 uppercase tracking-wider">Admin</span>
                                            @elseif($user->role === 'company')
                                                <span class="inline-flex rounded-full bg-blue-50 px-3 py-0.5 text-xs font-bold text-blue-700 border border-blue-100 uppercase tracking-wider">Company</span>
                                            @else
                                                <span class="inline-flex rounded-full bg-emerald-50 px-3 py-0.5 text-xs font-bold text-emerald-700 border border-emerald-100 uppercase tracking-wider">Job Seeker</span>
                                            @endif
                                        </td>
                                        <td class="py-4 text-slate-500">{{ $user->created_at->format('d M Y') }}</td>
                                        <td class="py-4">
                                            @if($user->email_verified_at)
                                                <span class="inline-flex rounded-full bg-emerald-50 px-3 py-0.5 text-xs font-bold text-emerald-700 border border-emerald-100">Aktif</span>
                                            @else
                                                <span class="inline-flex rounded-full bg-rose-50 px-3 py-0.5 text-xs font-bold text-rose-700 border border-rose-100">Banned / Unverified</span>
                                            @endif
                                        </td>
                                        <td class="py-4 text-right">
                                            @if($user->role !== 'admin')
                                                <form action="{{ route('admin.users.toggle', $user->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Apakah Anda yakin ingin mengubah status pengguna ini?')">
                                                    @csrf
                                                    @method('PUT')
                                                    @if($user->email_verified_at)
                                                        <button type="submit" class="rounded-lg bg-rose-50 px-3 py-1.5 text-xs font-bold text-rose-700 hover:bg-rose-100 transition">Suspend / Ban</button>
                                                    @else
                                                        <button type="submit" class="rounded-lg bg-emerald-50 px-3 py-1.5 text-xs font-bold text-emerald-700 hover:bg-emerald-100 transition">Aktifkan Kembali</button>
                                                    @endif
                                                </form>
                                            @else
                                                <span class="text-xs text-slate-400 italic">No action</span>
                                            @endif
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="5" class="py-8 text-center text-slate-500">Belum ada pengguna.</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        <div class="mt-6">
                            {{ $users->links() }}
                        </div>
                    </section>
                </main>
            </div>
        </div>
    </div>
</x-app-layout>
