<x-app-layout>
    <div class="block w-full min-h-screen bg-slate-50 antialiased">
        <div class="flex min-h-screen w-full overflow-hidden">
            <x-company-sidebar />

            <div class="flex-1 bg-slate-50 overflow-y-auto">
                <main class="p-8 lg:p-12 space-y-8 max-w-[1200px] mx-auto">
                    
                    <div class="flex items-center gap-3 mb-2">
                        <button onclick="history.back()" class="text-slate-400 hover:text-blue-600 transition flex items-center gap-1 font-medium">
                            🔙 Kembali
                        </button>
                    </div>

                    <div class="bg-white rounded-3xl p-8 shadow-sm border border-slate-100 flex flex-col md:flex-row gap-8 items-start relative overflow-hidden">
                                                <div class="absolute top-0 right-0 w-64 h-64 bg-blue-50 rounded-full blur-3xl -z-10 opacity-60 translate-x-1/2 -translate-y-1/2"></div>
                        
                        <div class="w-32 h-32 rounded-2xl bg-slate-100 text-slate-400 flex items-center justify-center shrink-0 border-4 border-white shadow-md overflow-hidden text-5xl font-extrabold">
                            @if($jobSeeker->profile_picture)
                                <img src="{{ asset('storage/' . $jobSeeker->profile_picture) }}" alt="{{ $jobSeeker->user->name }}" class="w-full h-full object-cover">
                            @else
                                {{ strtoupper(substr($jobSeeker->user->name, 0, 1)) }}
                            @endif
                        </div>
                        
                        <div class="flex-1 space-y-5 z-10">
                            <div>
                                <h1 class="text-3xl font-extrabold text-slate-900 tracking-tight">{{ $jobSeeker->user->name }}</h1>
                                <p class="text-lg text-slate-500 font-medium mt-1">{{ $jobSeeker->user->email }}</p>
                            </div>
                            
                            <div class="flex flex-wrap gap-3 pt-2">
                                @if($jobSeeker->phone)
                                    <div class="flex items-center gap-2 text-slate-600 bg-slate-50 px-4 py-2.5 rounded-xl border border-slate-200 shadow-sm text-sm">
                                        <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                                        <span class="font-semibold text-slate-700">{{ $jobSeeker->phone }}</span>
                                    </div>
                                @endif

                                @if($jobSeeker->cv_path)
                                    <a href="{{ asset('storage/' . $jobSeeker->cv_path) }}" target="_blank" class="flex items-center gap-2 text-blue-700 bg-blue-50 hover:bg-blue-100 px-4 py-2.5 rounded-xl border border-blue-200 transition-colors shadow-sm font-bold text-sm">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                                        Download CV Utama
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-3xl p-8 shadow-sm border border-slate-100">
                        <h2 class="text-xl font-extrabold text-slate-900 mb-5 flex items-center gap-2">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                            Tentang Pelamar
                        </h2>
                        
                        @if($jobSeeker->description)
                            <div class="prose prose-blue max-w-none text-slate-600 leading-relaxed whitespace-pre-line bg-slate-50/50 p-6 rounded-2xl border border-slate-100">
                                {{ $jobSeeker->description }}
                            </div>
                        @else
                            <div class="bg-slate-50 p-6 rounded-2xl border border-slate-100 text-center">
                                <p class="text-slate-500 font-medium">Pelamar ini belum mengisi deskripsi profil.</p>
                            </div>
                        @endif
                    </div>

                </main>
            </div>
        </div>
    </div>
</x-app-layout>
