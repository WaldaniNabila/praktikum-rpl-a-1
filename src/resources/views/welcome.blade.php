<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JobHub — Temukan Pekerjaan Impianmu</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 text-gray-900 antialiased">

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

    {{-- HERO --}}
    <section class="bg-blue-50 border-b border-blue-100 py-16 px-4 text-center">
        <div class="max-w-3xl mx-auto">
            <h1 class="text-4xl font-semibold text-blue-900 leading-snug mb-3">
                Temukan <span class="text-blue-700">pekerjaan impianmu</span><br>
                bersama ribuan perusahaan terbaik
            </h1>
            <p class="text-sm text-blue-600 mb-8 opacity-80">
                Ribuan lowongan kerja dari perusahaan terpercaya di seluruh Indonesia
            </p>

            <form action="{{ route('jobs.index') }}" method="GET"
                  class="flex items-center bg-white border border-blue-300 rounded-xl overflow-hidden max-w-2xl mx-auto mb-4">
                <div class="flex items-center px-3 text-gray-400">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 16 16">
                        <circle cx="6.5" cy="6.5" r="5" stroke="currentColor" stroke-width="1.5"/>
                        <path d="M10.5 10.5L14 14" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                    </svg>
                </div>
                <input type="text" name="q" placeholder="Posisi, keahlian, atau perusahaan..."
                    class="flex-1 py-3 text-sm bg-transparent outline-none text-gray-700 placeholder-gray-400">
                <div class="w-px h-6 bg-blue-200 mx-1"></div>
                <div class="flex items-center px-3 text-gray-400">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 16 16">
                        <path d="M8 2C5.79 2 4 3.79 4 6c0 3.5 4 8 4 8s4-4.5 4-8c0-2.21-1.79-4-4-4z" stroke="currentColor" stroke-width="1.5"/>
                        <circle cx="8" cy="6" r="1.5" stroke="currentColor" stroke-width="1.2"/>
                    </svg>
                </div>
                <input type="text" name="location" placeholder="Kota atau lokasi..."
                    class="w-36 py-3 text-sm bg-transparent outline-none text-gray-700 placeholder-gray-400">
                <button type="submit" class="bg-blue-700 text-white px-5 py-3 text-sm font-medium hover:bg-blue-800 transition-colors">
                    Cari loker
                </button>
            </form>

            <div class="flex items-center justify-center gap-2 flex-wrap text-xs">
                <span class="text-blue-500 opacity-70">Populer:</span>
                @foreach(['UI/UX Designer', 'Frontend Dev', 'Data Analyst', 'Product Manager', 'Backend Dev'] as $tag)
                    <a href="{{ route('jobs.index', ['q' => $tag]) }}"
                       class="px-3 py-1 rounded-full bg-blue-100 text-blue-700 hover:bg-blue-200 transition-colors">
                        {{ $tag }}
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    {{-- STATISTIK --}}
    <section class="bg-white border-b border-gray-200">
        <div class="max-w-7xl mx-auto grid grid-cols-2 sm:grid-cols-4 divide-x divide-gray-100">
            <div class="py-5 text-center">
                <div class="text-2xl font-semibold text-blue-700">{{ $totalJobs }}+</div>
                <div class="text-xs text-gray-500 mt-1">Lowongan aktif</div>
            </div>
            <div class="py-5 text-center">
                <div class="text-2xl font-semibold text-blue-700">{{ $totalCompanies }}+</div>
                <div class="text-xs text-gray-500 mt-1">Perusahaan terdaftar</div>
            </div>
            <div class="py-5 text-center">
                <div class="text-2xl font-semibold text-blue-700">98rb+</div>
                <div class="text-xs text-gray-500 mt-1">Pelamar terdaftar</div>
            </div>
            <div class="py-5 text-center">
                <div class="text-2xl font-semibold text-blue-700">87%</div>
                <div class="text-xs text-gray-500 mt-1">Tingkat kepuasan</div>
            </div>
        </div>
    </section>

    {{-- KATEGORI --}}
    <section class="max-w-7xl mx-auto px-6 py-10">
        <div class="flex items-baseline justify-between mb-5">
            <h2 class="text-lg font-semibold text-gray-900">Jelajahi berdasarkan kategori</h2>
            <a href="{{ route('jobs.index') }}" class="text-sm text-blue-700 hover:underline">Lihat semua →</a>
        </div>
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
            @foreach($categories as $category)
                <a href="{{ route('jobs.index', ['category' => $category->slug]) }}"
                   class="flex flex-col gap-2 p-4 rounded-xl border border-gray-100 bg-gray-50 hover:border-blue-200 hover:bg-blue-50 transition-all group">
                    <div>
                        <div class="text-sm font-medium text-gray-800 group-hover:text-blue-700 transition-colors">
                            {{ $category->name }}
                        </div>
                        <div class="text-xs text-gray-400 mt-0.5">
                            {{ $category->job_listings_count }} lowongan
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </section>

    {{-- LOWONGAN TERBARU --}}
    <section class="max-w-7xl mx-auto px-6 pb-10">
        <div class="flex items-baseline justify-between mb-5">
            <h2 class="text-lg font-semibold text-gray-900">Lowongan terbaru</h2>
            <a href="{{ route('jobs.index') }}" class="text-sm text-blue-700 hover:underline">Lihat semua →</a>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
            @forelse($latestJobs as $job)
                <div class="bg-white border border-gray-200 rounded-xl p-4 hover:border-blue-300 transition-all group">
                    <div class="flex gap-3 items-start mb-3">
                        <div class="w-10 h-10 rounded-lg bg-blue-50 text-blue-700 text-sm font-semibold flex items-center justify-center shrink-0 overflow-hidden border border-blue-100">
                            @if($job->company->logo_path)
                                <img src="{{ asset('storage/' . $job->company->logo_path) }}" alt="{{ $job->company->name }}" class="w-full h-full object-cover">
                            @else
                                {{ strtoupper(substr($job->company->name, 0, 2)) }}
                            @endif
                        </div>
                        <div class="flex-1 min-w-0">
                            <div class="text-sm font-medium text-gray-900 group-hover:text-blue-700 transition-colors truncate">
                                {{ $job->title }}
                            </div>
                            <div class="text-xs text-gray-500">{{ $job->company->name }}</div>
                        </div>
                        <span class="text-xs font-medium px-2 py-0.5 rounded-full bg-teal-50 text-teal-800 shrink-0">Buka</span>
                    </div>
                    <div class="flex flex-wrap gap-1.5 mb-2">
                        <span class="text-xs px-2 py-0.5 rounded-full bg-blue-50 text-blue-800 font-medium">{{ $job->employment_type }}</span>
                        <span class="text-xs px-2 py-0.5 rounded-full bg-purple-50 text-purple-800 font-medium">{{ $job->work_type }}</span>
                    </div>
                    <div class="text-xs text-gray-400 mb-3">
                        {{ $job->location }} · {{ $job->created_at->diffForHumans() }}
                    </div>
                    <div class="flex items-center gap-2 border-t border-gray-100 pt-3">
                        <span class="text-xs font-semibold text-blue-700 flex-1">
                            @if($job->salary_min && $job->salary_max)
                                Rp {{ number_format($job->salary_min/1000000, 0) }}–{{ number_format($job->salary_max/1000000, 0) }} jt/bln
                            @else
                                Negotiable
                            @endif
                        </span>
                        <a href="{{ route('jobs.show', $job) }}"
                           class="text-xs px-3 py-1.5 rounded-lg bg-blue-700 text-white hover:bg-blue-800 transition-colors font-medium">
                            Lihat detail
                        </a>
                    </div>
                </div>
            @empty
                <div class="col-span-2 text-center py-12 text-gray-400">
                    Belum ada lowongan tersedia.
                </div>
            @endforelse
        </div>
    </section>

    {{-- CTA PERUSAHAAN --}}
    <section class="max-w-7xl mx-auto px-6 pb-10">
        <div class="bg-blue-800 rounded-2xl p-8 flex flex-col sm:flex-row items-center gap-6">
            <div class="flex-1 text-center sm:text-left">
                <h2 class="text-xl font-semibold text-blue-50 mb-2">Rekrut talenta terbaik bersama JobHub</h2>
                <p class="text-sm text-blue-300 leading-relaxed">
                    Pasang lowongan dan temukan kandidat yang tepat dari ribuan pelamar aktif di seluruh Indonesia.
                </p>
            </div>
            <a href="{{ route('register') }}"
               class="shrink-0 px-6 py-2.5 rounded-xl bg-blue-50 text-blue-900 text-sm font-semibold hover:bg-white transition-colors">
                Daftarkan perusahaan →
            </a>
        </div>
    </section>

    {{-- CARA KERJA --}}
    <section class="bg-gray-50 border-t border-gray-100 py-10 px-4">
        <div class="max-w-7xl mx-auto">
            <h2 class="text-lg font-semibold text-gray-900 mb-6 text-center">Cara kerja JobHub</h2>
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                @foreach([
                    ['1', 'Buat akun gratis',     'Daftar dalam 1 menit menggunakan email atau akun Google-mu'],
                    ['2', 'Lengkapi profil & CV',  'Upload CV dan isi data dirimu agar perusahaan bisa mengenalmu lebih baik'],
                    ['3', 'Lamar & pantau status', 'Apply ke lowongan impianmu dan pantau status lamaran secara real-time'],
                ] as [$num, $title, $desc])
                    <div class="bg-white rounded-xl border border-gray-100 p-5 text-center">
                        <div class="w-8 h-8 rounded-full bg-blue-100 text-blue-700 text-sm font-semibold flex items-center justify-center mx-auto mb-3">
                            {{ $num }}
                        </div>
                        <div class="text-sm font-semibold text-gray-800 mb-1.5">{{ $title }}</div>
                        <div class="text-xs text-gray-500 leading-relaxed">{{ $desc }}</div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- FOOTER --}}
    <footer class="bg-white border-t border-gray-100 py-6 px-4">
        <div class="max-w-7xl mx-auto flex flex-col sm:flex-row items-center justify-between gap-3">
            <span class="text-base font-semibold text-blue-700">JobHub</span>
            <div class="flex gap-5 flex-wrap justify-center">
                @foreach(['Tentang kami', 'Blog', 'Kebijakan privasi', 'Syarat & ketentuan', 'Hubungi kami'] as $link)
                    <a href="#" class="text-xs text-gray-400 hover:text-gray-600 transition-colors">{{ $link }}</a>
                @endforeach
            </div>
            <span class="text-xs text-gray-400">© {{ date('Y') }} JobHub</span>
        </div>
    </footer>

</body>
</html>