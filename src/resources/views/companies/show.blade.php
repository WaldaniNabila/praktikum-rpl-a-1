<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil {{ $company->name }} — JobHub</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 text-gray-900 antialiased min-h-screen flex flex-col">

    {{-- NAVBAR --}}
    <nav class="bg-white border-b border-gray-200 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-6 flex items-center h-14 gap-6">
            <a href="{{ route('home') }}" class="text-lg font-semibold text-blue-700 tracking-tight">JobHub</a>
            <a href="{{ route('jobs.index') }}" class="text-sm font-medium text-blue-700">Lowongan</a>
            <a href="#" class="text-sm text-gray-500 hover:text-gray-800 transition-colors">Tentang kami</a>
            <div class="flex-1"></div>
            @guest
                <a href="{{ route('login') }}" class="text-sm px-4 py-1.5 rounded-lg border border-blue-300 text-blue-700 hover:bg-blue-50 transition-colors">Masuk</a>
                <a href="{{ route('register') }}" class="text-sm px-4 py-1.5 rounded-lg bg-blue-700 text-white hover:bg-blue-800 transition-colors font-medium">Daftar gratis</a>
            @else
                <a href="{{ auth()->user()->role === 'admin' ? route('admin.dashboard') : (auth()->user()->role === 'company' ? route('company.dashboard') : route('job_seeker.dashboard')) }}"
                   class="text-sm px-4 py-1.5 rounded-lg bg-blue-700 text-white hover:bg-blue-800 transition-colors font-medium">
                    Dashboard
                </a>
            @endguest
        </div>
    </nav>

    {{-- HEADER COMPANY --}}
    <section class="bg-white border-b border-gray-200 py-10 px-6">
        <div class="max-w-5xl mx-auto flex flex-col md:flex-row gap-6 items-start md:items-center">
            <div class="w-24 h-24 rounded-2xl bg-blue-50 text-blue-700 text-3xl font-bold flex items-center justify-center shrink-0 border border-blue-100 shadow-sm">
                @if($company->logo_path)
                    <img src="{{ asset('storage/' . $company->logo_path) }}" alt="{{ $company->name }}" class="w-full h-full object-cover rounded-2xl">
                @else
                    {{ strtoupper(substr($company->name, 0, 2)) }}
                @endif
            </div>
            <div class="flex-1">
                <div class="flex items-center gap-3">
                    <h1 class="text-3xl font-bold text-gray-900">{{ $company->name }}</h1>
                    @if($company->isVerified())
                        <span class="bg-green-100 text-green-800 text-xs font-semibold px-2.5 py-0.5 rounded flex items-center gap-1">
                            <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                            Terverifikasi
                        </span>
                    @endif
                </div>
                
                <div class="flex flex-wrap gap-x-6 gap-y-2 mt-3 text-sm text-gray-600">
                    @if($company->industry)
                        <div class="flex items-center gap-1.5">
                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            {{ $company->industry }}
                        </div>
                    @endif
                    @if($company->address)
                        <div class="flex items-center gap-1.5">
                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            {{ $company->address }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    {{-- MAIN CONTENT --}}
    <main class="flex-1 max-w-5xl mx-auto w-full px-6 py-10 flex flex-col md:flex-row gap-10">
        
        {{-- DESKRIPSI KIRI --}}
        <div class="flex-1 space-y-8">
            <section>
                <h2 class="text-xl font-bold text-gray-900 border-b border-gray-200 pb-2 mb-4">Tentang Perusahaan</h2>
                @if($company->description)
                    <div class="prose prose-blue max-w-none text-gray-700 leading-relaxed whitespace-pre-line">
                        {{ $company->description }}
                    </div>
                @else
                    <p class="text-gray-500 italic">Perusahaan ini belum menambahkan deskripsi detail.</p>
                @endif
            </section>
        </div>

        {{-- INFO KANAN --}}
        <aside class="w-full md:w-80 shrink-0 space-y-6">
            <div class="bg-white border border-gray-200 rounded-2xl p-6">
                <h3 class="font-bold text-gray-900 mb-4">Kontak & Info</h3>
                
                <ul class="space-y-4 text-sm">
                    @if($company->phone)
                    <li>
                        <div class="text-xs text-gray-500 mb-1">Telepon</div>
                        <div class="font-medium text-gray-900">{{ $company->phone }}</div>
                    </li>
                    @endif
                    <li>
                        <div class="text-xs text-gray-500 mb-1">Email Resmi</div>
                        <div class="font-medium text-gray-900">{{ $company->user->email }}</div>
                    </li>
                    <li>
                        <div class="text-xs text-gray-500 mb-1">Total Lowongan Aktif</div>
                        <div class="font-medium text-blue-700">{{ $activeJobs->total() }} Pekerjaan</div>
                    </li>
                </ul>
            </div>
        </aside>

    </main>

    {{-- ACTIVE JOBS --}}
    <section class="bg-gray-100 border-t border-gray-200 py-12 px-6">
        <div class="max-w-5xl mx-auto">
            <h2 class="text-2xl font-bold text-gray-900 mb-6">Lowongan Terbuka di {{ $company->name }}</h2>
            
            @if($activeJobs->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($activeJobs as $job)
                        <a href="{{ route('jobs.show', $job->id) }}" class="bg-white p-5 rounded-2xl border border-gray-200 hover:border-blue-300 hover:shadow-lg transition-all group flex flex-col h-full">
                            <div class="mb-3">
                                <span class="text-xs font-semibold px-2 py-1 rounded bg-blue-50 text-blue-700">{{ $job->category->name }}</span>
                            </div>
                            <h3 class="text-lg font-bold text-gray-900 group-hover:text-blue-700 transition mb-2">{{ $job->title }}</h3>
                            <p class="text-sm text-gray-500 line-clamp-2 mb-4">{{ $job->description }}</p>
                            
                            <div class="mt-auto pt-4 border-t border-gray-100 flex flex-wrap gap-2 text-xs text-gray-500">
                                <span class="flex items-center gap-1"><svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg> {{ $job->location }}</span>
                                <span class="flex items-center gap-1"><svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg> {{ $job->employment_type }}</span>
                            </div>
                        </a>
                    @endforeach
                </div>
                
                <div class="mt-8">
                    {{ $activeJobs->links() }}
                </div>
            @else
                <div class="text-center py-10 bg-white rounded-2xl border border-gray-200">
                    <p class="text-gray-500">Belum ada lowongan yang dibuka saat ini.</p>
                </div>
            @endif
        </div>
    </section>

    {{-- FOOTER --}}
    <footer class="bg-gray-900 text-white mt-auto py-8">
        <div class="max-w-5xl mx-auto px-6 flex flex-col sm:flex-row items-center justify-between gap-4">
            <div class="text-xl font-bold tracking-tight">JobHub</div>
            <div class="text-sm text-gray-400">© {{ date('Y') }} JobHub. Hak Cipta Dilindungi.</div>
        </div>
    </footer>

</body>
</html>
