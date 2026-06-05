<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cari Lowongan Pekerjaan — JobHub</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 text-gray-900 antialiased min-h-screen flex flex-col">

    {{-- NAVBAR --}}
    <nav class="bg-white border-b border-gray-200 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-6 flex items-center h-14 gap-6">
            <a href="{{ route('home') }}" class="text-lg font-semibold text-blue-700 tracking-tight">JobHub</a>
            <a href="{{ route('jobs.index') }}" class="text-sm font-medium text-blue-700 border-b-2 border-blue-700 pb-0.5">Lowongan</a>
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

    {{-- HEADER SEARCH --}}
    <section class="bg-blue-800 py-12 px-6">
        <div class="max-w-7xl mx-auto">
            <h1 class="text-3xl font-semibold text-white mb-6">Temukan Pekerjaan Idealmu</h1>
            <form action="{{ route('jobs.index') }}" method="GET" class="flex flex-col sm:flex-row gap-3">
                <div class="flex-1 bg-white rounded-xl flex items-center px-4 overflow-hidden focus-within:ring-2 focus-within:ring-blue-400">
                    <span class="text-gray-400">🔍</span>
                    <input type="text" name="q" value="{{ request('q') }}" placeholder="Posisi, keahlian, atau nama perusahaan..." class="w-full py-3 px-3 border-none outline-none focus:ring-0 text-sm text-gray-700">
                </div>
                <div class="sm:w-64 bg-white rounded-xl flex items-center px-4 overflow-hidden focus-within:ring-2 focus-within:ring-blue-400">
                    <span class="text-gray-400">📍</span>
                    <input type="text" name="location" value="{{ request('location') }}" placeholder="Lokasi..." class="w-full py-3 px-3 border-none outline-none focus:ring-0 text-sm text-gray-700">
                </div>
                <button type="submit" class="bg-blue-600 hover:bg-blue-500 text-white font-semibold py-3 px-8 rounded-xl transition-colors">Cari</button>
            </form>
        </div>
    </section>

    {{-- MAIN CONTENT --}}
    <main class="flex-1 max-w-7xl mx-auto w-full px-6 py-8 flex flex-col md:flex-row gap-8">
        
        {{-- SIDEBAR FILTER --}}
        <aside class="w-full md:w-64 shrink-0">
            <div class="bg-white border border-gray-200 rounded-xl p-5 sticky top-20">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="font-semibold text-gray-900">Filter Pencarian</h2>
                    <a href="{{ route('jobs.index') }}" class="text-xs text-blue-600 hover:underline">Reset</a>
                </div>
                
                <form action="{{ route('jobs.index') }}" method="GET" class="space-y-6">
                    <input type="hidden" name="q" value="{{ request('q') }}">
                    <input type="hidden" name="location" value="{{ request('location') }}">
                    
                    {{-- Kategori --}}
                    <div>
                        <h3 class="text-sm font-medium text-gray-700 mb-2">Kategori</h3>
                        <select name="category" class="w-full rounded-lg border-gray-300 text-sm focus:border-blue-500 focus:ring-blue-500" onchange="this.form.submit()">
                            <option value="">Semua Kategori</option>
                            @foreach($categories as $cat)
                                <option value="{{ $cat->slug }}" {{ request('category') == $cat->slug ? 'selected' : '' }}>
                                    {{ $cat->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Tipe Pekerjaan --}}
                    <div>
                        <h3 class="text-sm font-medium text-gray-700 mb-2">Tipe Pekerjaan</h3>
                        <select name="employment_type" class="w-full rounded-lg border-gray-300 text-sm focus:border-blue-500 focus:ring-blue-500" onchange="this.form.submit()">
                            <option value="">Semua Tipe</option>
                            <option value="Full-time" {{ request('employment_type') == 'Full-time' ? 'selected' : '' }}>Full-time</option>
                            <option value="Part-time" {{ request('employment_type') == 'Part-time' ? 'selected' : '' }}>Part-time</option>
                            <option value="Contract" {{ request('employment_type') == 'Contract' ? 'selected' : '' }}>Contract</option>
                            <option value="Internship" {{ request('employment_type') == 'Internship' ? 'selected' : '' }}>Internship</option>
                        </select>
                    </div>

                    {{-- Sistem Kerja --}}
                    <div>
                        <h3 class="text-sm font-medium text-gray-700 mb-2">Sistem Kerja</h3>
                        <select name="work_type" class="w-full rounded-lg border-gray-300 text-sm focus:border-blue-500 focus:ring-blue-500" onchange="this.form.submit()">
                            <option value="">Semua Sistem</option>
                            <option value="On-site" {{ request('work_type') == 'On-site' ? 'selected' : '' }}>On-site</option>
                            <option value="Remote" {{ request('work_type') == 'Remote' ? 'selected' : '' }}>Remote</option>
                            <option value="Hybrid" {{ request('work_type') == 'Hybrid' ? 'selected' : '' }}>Hybrid</option>
                        </select>
                    </div>
                </form>
            </div>
        </aside>

        {{-- JOB LIST --}}
        <div class="flex-1">
            <h2 class="text-gray-700 text-sm font-medium mb-4">Menampilkan {{ $jobs->total() }} lowongan pekerjaan</h2>
            
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                @forelse($jobs as $job)
                    <div class="bg-white border border-gray-200 rounded-xl p-5 hover:border-blue-400 hover:shadow-md transition-all group flex flex-col h-full">
                        <div class="flex gap-4 items-start mb-4">
                            <div class="w-12 h-12 rounded-lg bg-blue-50 text-blue-700 text-base font-semibold flex items-center justify-center shrink-0 border border-blue-100">
                                @if($job->company->logo_path)
                                    <img src="{{ asset('storage/' . $job->company->logo_path) }}" alt="{{ $job->company->name }}" class="w-full h-full object-cover rounded-lg">
                                @else
                                    {{ strtoupper(substr($job->company->name, 0, 2)) }}
                                @endif
                            </div>
                            <div class="flex-1 min-w-0">
                                <a href="{{ route('jobs.show', $job->id) }}" class="text-lg font-bold text-gray-900 group-hover:text-blue-700 transition-colors block truncate">
                                    {{ $job->title }}
                                </a>
                                <div class="text-sm text-gray-500 mt-0.5">{{ $job->company->name }}</div>
                            </div>
                        </div>
                        
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="text-xs px-2.5 py-1 rounded-full bg-blue-50 text-blue-800 font-medium">{{ $job->employment_type }}</span>
                            <span class="text-xs px-2.5 py-1 rounded-full bg-purple-50 text-purple-800 font-medium">{{ $job->work_type }}</span>
                            <span class="text-xs px-2.5 py-1 rounded-full bg-gray-100 text-gray-700 font-medium">{{ $job->location }}</span>
                        </div>
                        
                        <div class="mt-auto pt-4 border-t border-gray-100 flex items-center justify-between">
                            <span class="text-sm font-semibold text-green-700">
                                @if($job->salary_min && $job->salary_max)
                                    Rp {{ number_format($job->salary_min/1000000, 0) }}–{{ number_format($job->salary_max/1000000, 0) }} jt
                                @else
                                    Gaji Disembunyikan
                                @endif
                            </span>
                    </div>
                @empty
                    <div class="col-span-1 lg:col-span-2 text-center py-16 bg-white border border-gray-200 rounded-xl">
                        <div class="text-4xl mb-4">🕵️‍♂️</div>
                        <h3 class="text-lg font-semibold text-gray-900">Lowongan tidak ditemukan</h3>
                        <p class="text-sm text-gray-500 mt-1">Coba ubah filter pencarian atau kata kunci Anda.</p>
                    </div>
                @endforelse
            </div>

            <div class="mt-8">
                {{ $jobs->withQueryString()->links() }}
            </div>
        </div>
    </main>

    {{-- FOOTER --}}
    <footer class="bg-white border-t border-gray-200 mt-auto py-8">
        <div class="max-w-7xl mx-auto px-6 flex flex-col sm:flex-row items-center justify-between gap-4">
            <div class="text-xl font-bold text-blue-700 tracking-tight">JobHub</div>
            <div class="text-sm text-gray-500">© {{ date('Y') }} JobHub. Hak Cipta Dilindungi.</div>
        </div>
    </footer>

</body>
</html>
