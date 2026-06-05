<x-app-layout>
    <div class="block w-full min-h-screen bg-slate-50 antialiased">
        <div class="flex min-h-screen w-full overflow-hidden">
            <x-company-sidebar />

            <div class="flex-1 bg-slate-50 overflow-y-auto">
                <main class="p-8 lg:p-12 space-y-10 max-w-[1600px] mx-auto">
                    
                    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                        <div>
                            <div class="flex items-center gap-3">
                                <a href="{{ route('company.jobs') }}" class="text-slate-400 hover:text-blue-600 transition">
                                    🔙 Kembali
                                </a>
                                <h1 class="text-3xl font-extrabold text-slate-900 tracking-tight">Daftar Pelamar</h1>
                            </div>
                            <p class="text-slate-500 mt-2">Lowongan: <strong>{{ $jobListing->title }}</strong></p>
                        </div>
                    </div>

                    @if (session('success'))
                        <div class="bg-emerald-50 border-l-4 border-emerald-500 p-4 mb-4 rounded-lg">
                            <p class="text-sm text-emerald-700 font-bold">{{ session('success') }}</p>
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="bg-rose-50 border-l-4 border-rose-500 p-4 mb-4 rounded-lg">
                            <ul class="list-disc list-inside text-sm text-rose-600">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <section class="rounded-2xl bg-white p-6 shadow-sm border border-slate-100/80">
                        <div class="overflow-x-auto">
                            <table class="w-full text-left text-sm">
                                <thead>
                                    <tr class="text-xs font-bold text-slate-400 uppercase tracking-wider border-b border-slate-100">
                                        <th class="pb-3 font-bold">Nama Kandidat</th>
                                        <th class="pb-3 font-bold">Cover Letter</th>
                                        <th class="pb-3 font-bold">Resume / CV</th>
                                        <th class="pb-3 font-bold">Status</th>
                                        <th class="pb-3 font-bold text-right">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-slate-100 text-slate-700 font-medium">
                                    @forelse($applications as $app)
                                    <tr>
                                        <td class="py-4">
                                            <p class="font-bold text-slate-900">{{ $app->jobSeeker->user->name ?? 'User Terhapus' }}</p>
                                            <p class="text-xs text-slate-500">{{ $app->jobSeeker->user->email ?? '-' }}</p>
                                        </td>
                                        <td class="py-4">
                                            <div class="text-xs text-slate-600 max-w-xs break-words">
                                                {{ \Illuminate\Support\Str::limit($app->cover_letter, 100) }}
                                            </div>
                                        </td>
                                        <td class="py-4">
                                            @if($app->cv_path)
                                                <a href="{{ asset('storage/' . $app->cv_path) }}" target="_blank" class="text-blue-600 hover:underline text-xs font-bold flex items-center gap-1">
                                                    📄 Lihat CV
                                                </a>
                                            @else
                                                <span class="text-slate-400 text-xs">Tidak ada CV</span>
                                            @endif
                                        </td>
                                        <td class="py-4">
                                            @php
                                                $statusColors = [
                                                    'waiting' => 'bg-amber-50 text-amber-700 border-amber-100',
                                                    'process' => 'bg-blue-50 text-blue-700 border-blue-100',
                                                    'accepted' => 'bg-emerald-50 text-emerald-700 border-emerald-100',
                                                    'rejected' => 'bg-rose-50 text-rose-700 border-rose-100',
                                                ];
                                                $color = $statusColors[$app->status] ?? 'bg-slate-50 text-slate-700 border-slate-100';
                                            @endphp
                                            <span class="inline-flex rounded-full px-3 py-0.5 text-[11px] font-bold border uppercase tracking-wider {{ $color }}">
                                                {{ $app->status }}
                                            </span>
                                        </td>
                                        <td class="py-4 text-right">
                                            <form action="{{ route('company.application.status', $app->id) }}" method="POST" class="flex items-center justify-end gap-2">
                                                @csrf
                                                @method('PUT')
                                                <select name="status" class="rounded-lg border-slate-200 text-xs py-1.5 focus:border-blue-500 focus:ring-blue-500 pr-8">
                                                    <option value="waiting" {{ $app->status === 'waiting' ? 'selected' : '' }}>Waiting</option>
                                                    <option value="process" {{ $app->status === 'process' ? 'selected' : '' }}>Process</option>
                                                    <option value="accepted" {{ $app->status === 'accepted' ? 'selected' : '' }}>Accept</option>
                                                    <option value="rejected" {{ $app->status === 'rejected' ? 'selected' : '' }}>Reject</option>
                                                </select>
                                                <button type="submit" class="rounded-lg bg-blue-600 px-3 py-1.5 text-xs font-bold text-white hover:bg-blue-700 transition">Update</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="5" class="py-8 text-center text-slate-500">
                                            <p>Belum ada yang melamar pada lowongan ini.</p>
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
