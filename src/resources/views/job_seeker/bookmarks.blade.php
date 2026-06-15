<x-app-layout>
    <div class="block w-full min-h-screen bg-slate-50 antialiased">
        <div class="flex min-h-screen w-full overflow-hidden">
            
            <x-jobseeker-sidebar />

            <div class="flex-1 bg-slate-50 overflow-y-auto">
                <main class="p-8 lg:p-12 space-y-10 max-w-[1600px] mx-auto">
                    
                                        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                        <div>
                            <h1 class="text-3xl font-extrabold text-slate-900 tracking-tight">Lowongan Tersimpan</h1>
                            <p class="text-slate-500 mt-2">Kumpulan pekerjaan yang kamu bookmark untuk dilamar nanti.</p>
                        </div>
                    </div>

                    @if(session('success'))
                        <div class="text-sm font-medium text-green-700 bg-green-50 px-4 py-3 rounded-xl border border-green-200">
                            {{ session('success') }}
                        </div>
                    @endif

                                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @forelse($bookmarks ?? [] as $bookmark)
                            <div class="bg-white border border-slate-200 rounded-2xl p-6 hover:shadow-lg hover:border-blue-300 transition-all group flex flex-col h-full">
                                <div class="flex gap-4 items-start mb-4">
                                    <div class="w-12 h-12 rounded-xl bg-blue-50 text-blue-700 text-base font-bold flex items-center justify-center shrink-0 border border-blue-100">
                                        @if($bookmark->jobListing->company->logo_path)
                                            <img src="{{ asset('storage/' . $bookmark->jobListing->company->logo_path) }}" alt="{{ $bookmark->jobListing->company->name }}" class="w-full h-full object-cover rounded-xl">
                                        @else
                                            {{ strtoupper(substr($bookmark->jobListing->company->name, 0, 2)) }}
                                        @endif
                                    </div>
                                    <div class="flex-1 min-w-0 pr-2">
                                        <a href="{{ route('jobs.show', $bookmark->jobListing->id) }}" class="text-lg font-bold text-slate-900 group-hover:text-blue-700 transition-colors block truncate">
                                            {{ $bookmark->jobListing->title }}
                                        </a>
                                        <div class="text-sm text-slate-500 mt-0.5">{{ $bookmark->jobListing->company->name }}</div>
                                    </div>
                                    <form action="{{ route('job_seeker.bookmark.toggle', $bookmark->jobListing->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="text-blue-600 hover:text-blue-800 transition" title="Hapus Bookmark">
                                            <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24">
                                                <path d="M17 3H7c-1.1 0-1.99.9-1.99 2L5 21l7-3 7 3V5c0-1.1-.9-2-2-2z"></path>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                                
                                <div class="flex flex-wrap gap-2 mb-6">
                                    <span class="text-xs px-2.5 py-1 rounded-full bg-slate-100 text-slate-700 font-medium">{{ $bookmark->jobListing->location }}</span>
                                    <span class="text-xs px-2.5 py-1 rounded-full bg-blue-50 text-blue-800 font-medium">{{ $bookmark->jobListing->employment_type }}</span>
                                </div>
                                
                                <div class="mt-auto pt-4 border-t border-slate-100 flex items-center justify-between">
                                    <a href="{{ route('jobs.show', $bookmark->jobListing->id) }}" class="text-sm font-bold text-blue-600 hover:text-blue-800">
                                        Lihat Detail &rarr;
                                    </a>
                                    <span class="text-xs text-slate-400">Disimpan {{ \Carbon\Carbon::parse($bookmark->created_at)->diffForHumans() }}</span>
                                </div>
                            </div>
                        @empty
                            <div class="col-span-1 md:col-span-2 lg:col-span-3 text-center py-16 bg-white border border-slate-200 rounded-2xl">
                                <div class="text-5xl mb-4">🔖</div>
                                <h3 class="text-xl font-bold text-slate-900">Belum ada lowongan tersimpan</h3>
                                <p class="text-slate-500 mt-2">Temukan pekerjaan impianmu dan simpan untuk dilamar nanti.</p>
                                <a href="{{ route('jobs.index') }}" class="inline-block mt-6 px-6 py-3 bg-blue-600 text-white font-bold rounded-xl hover:bg-blue-700 transition shadow-lg shadow-blue-600/20">Cari Lowongan Sekarang</a>
                            </div>
                        @endforelse
                    </div>

                </main>
            </div>
            
        </div>
    </div>
</x-app-layout>
