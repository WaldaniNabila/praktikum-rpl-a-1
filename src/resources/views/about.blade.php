<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Kami — JobHub</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 text-gray-900 antialiased min-h-screen flex flex-col">

    <nav class="bg-white border-b border-gray-200 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-6 flex items-center h-14 gap-6">
            <a href="{{ route('home') }}" class="text-lg font-semibold text-blue-700 tracking-tight">JobHub</a>
            <a href="{{ route('jobs.index') }}" class="text-sm font-medium text-gray-500 hover:text-gray-800 transition-colors">Lowongan</a>
            <a href="{{ route('about') }}" class="text-sm text-blue-700 border-b-2 border-blue-700 pb-0.5">Tentang kami</a>
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

    <main class="flex-1">
        <section class="bg-blue-800 py-16 px-6 text-center text-white">
            <div class="max-w-3xl mx-auto">
                <h1 class="text-4xl font-bold mb-4">Tentang JobHub</h1>
                <p class="text-lg text-blue-100">
                    Kami menghubungkan talenta terbaik dengan perusahaan impian mereka. Misi kami adalah membuat proses pencarian kerja dan rekrutmen menjadi lebih mudah, cepat, dan transparan.
                </p>
            </div>
        </section>

        <section class="py-16 px-6 max-w-5xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center mb-16">
                <div>
                    <h2 class="text-3xl font-bold text-gray-900 mb-4">Visi Kami</h2>
                    <p class="text-gray-600 leading-relaxed">
                        Menjadi platform rekrutmen terdepan yang memberdayakan setiap individu untuk menemukan karier yang bermakna dan membantu perusahaan membangun tim yang hebat.
                    </p>
                </div>
                <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Mengapa JobHub?</h3>
                    <ul class="space-y-3">
                        <li class="flex items-start gap-3">
                            <span class="text-blue-600"><svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg></span>
                            <span class="text-gray-600">Ribuan lowongan pekerjaan terbaru setiap hari.</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="text-blue-600"><svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg></span>
                            <span class="text-gray-600">Proses melamar yang mudah dan transparan.</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="text-blue-600"><svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg></span>
                            <span class="text-gray-600">Terhubung langsung dengan perusahaan terpercaya.</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="text-center">
                <h2 class="text-3xl font-bold text-gray-900 mb-8">Siap Memulai Perjalanan Kariermu?</h2>
                <a href="{{ route('jobs.index') }}" class="inline-block px-8 py-3 rounded-xl bg-blue-700 text-white font-medium hover:bg-blue-800 transition-colors shadow-sm">
                    Cari Lowongan Sekarang
                </a>
            </div>
        </section>
    </main>

    <footer class="bg-white border-t border-gray-100 py-6 px-4 mt-auto">
        <div class="max-w-7xl mx-auto flex flex-col sm:flex-row items-center justify-between gap-3">
            <span class="text-base font-semibold text-blue-700">JobHub</span>
            <div class="flex gap-5 flex-wrap justify-center">
                @foreach([
                    ['title' => 'Tentang kami', 'url' => route('about')],
                    ['title' => 'Blog', 'url' => '#'],
                    ['title' => 'Kebijakan privasi', 'url' => '#'],
                    ['title' => 'Syarat & ketentuan', 'url' => '#'],
                    ['title' => 'Hubungi kami', 'url' => '#']
                ] as $link)
                    <a href="{{ $link['url'] }}" class="text-xs text-gray-400 hover:text-gray-600 transition-colors">{{ $link['title'] }}</a>
                @endforeach
            </div>
            <span class="text-xs text-gray-400">© {{ date('Y') }} JobHub. Hak Cipta Dilindungi.</span>
        </div>
    </footer>

</body>
</html>
