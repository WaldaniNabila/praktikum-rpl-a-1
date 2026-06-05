<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $jobListing->title }} di {{ $jobListing->company->name }} — JobHub</title>
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

    {{-- HEADER JOB --}}
    <section class="bg-white border-b border-gray-200 py-10 px-6">
        <div class="max-w-5xl mx-auto">
            <a href="{{ route('jobs.index') }}" class="text-sm text-blue-600 hover:underline mb-6 inline-block">&larr; Kembali ke daftar lowongan</a>
            
            <div class="flex flex-col md:flex-row gap-6 items-start md:items-center justify-between">
                <div class="flex gap-5 items-center">
                    <div class="w-20 h-20 rounded-xl bg-blue-50 text-blue-700 text-2xl font-bold flex items-center justify-center shrink-0 border border-blue-100">
                        @if($jobListing->company->logo_path)
                            <img src="{{ asset('storage/' . $jobListing->company->logo_path) }}" alt="{{ $jobListing->company->name }}" class="w-full h-full object-cover rounded-xl">
                        @else
                            {{ strtoupper(substr($jobListing->company->name, 0, 2)) }}
                        @endif
                    </div>
                    <div>
                        <h1 class="text-3xl font-bold text-gray-900">{{ $jobListing->title }}</h1>
                        <p class="text-lg text-gray-600 mt-1">{{ $jobListing->company->name }}</p>
                        <div class="flex flex-wrap gap-2 mt-3">
                            <span class="text-xs px-3 py-1 rounded-full bg-blue-50 text-blue-800 font-medium">{{ $jobListing->employment_type }}</span>
                            <span class="text-xs px-3 py-1 rounded-full bg-purple-50 text-purple-800 font-medium">{{ $jobListing->work_type }}</span>
                            <span class="text-xs px-3 py-1 rounded-full bg-gray-100 text-gray-700 font-medium">{{ $jobListing->location }}</span>
                        </div>
                    </div>
                </div>
                
                <div class="w-full md:w-auto flex flex-col gap-2 shrink-0" x-data="{ openApplyModal: false }">
                    @if(session('success'))
                        <div class="text-sm font-medium text-green-700 bg-green-50 px-4 py-2 rounded-lg border border-green-200 text-center mb-2">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if(session('error'))
                        <div class="text-sm font-medium text-red-700 bg-red-50 px-4 py-2 rounded-lg border border-red-200 text-center mb-2">
                            {{ session('error') }}
                        </div>
                    @endif

                    @if(Auth::check() && Auth::user()->role === 'job_seeker')
                        <button @click="openApplyModal = true" class="w-full md:w-48 bg-blue-700 hover:bg-blue-800 text-white font-bold py-3 px-6 rounded-xl transition-colors shadow-md shadow-blue-700/20">
                            Lamar Sekarang
                        </button>
                        
                        {{-- MODAL APPLY --}}
                        <div x-show="openApplyModal" style="display: none;" class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
                            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                                <div x-show="openApplyModal" @click="openApplyModal = false" x-transition.opacity class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
                                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                                <div x-show="openApplyModal" x-transition class="inline-block align-bottom bg-white rounded-2xl text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                                    <form action="{{ route('job_seeker.apply', $jobListing->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                            <div class="sm:flex sm:items-start">
                                                <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
                                                    <h3 class="text-lg leading-6 font-bold text-gray-900" id="modal-title">Kirim Lamaran</h3>
                                                    <p class="text-sm text-gray-500 mb-4">Lengkapi data tambahan untuk {{ $jobListing->title }}</p>
                                                    
                                                    <div class="space-y-4">
                                                        <div>
                                                            <label class="block text-sm font-medium text-gray-700 mb-1">Cover Letter / Pesan (Opsional)</label>
                                                            <textarea name="cover_letter" rows="4" class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm" placeholder="Ceritakan singkat mengapa Anda cocok untuk posisi ini..."></textarea>
                                                        </div>
                                                        <div>
                                                            <label class="block text-sm font-medium text-gray-700 mb-1">Upload CV Khusus (Opsional)</label>
                                                            <input type="file" name="cv_path" accept=".pdf,.doc,.docx" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" />
                                                            <p class="text-xs text-gray-500 mt-1">Kosongkan jika ingin menggunakan CV default di profil Anda.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="bg-gray-50 px-4 py-3 sm:px-6 flex flex-row-reverse gap-2">
                                            <button type="submit" class="w-full inline-flex justify-center rounded-xl border border-transparent shadow-sm px-4 py-2 bg-blue-700 text-base font-medium text-white hover:bg-blue-800 sm:w-auto sm:text-sm">
                                                Kirim Lamaran
                                            </button>
                                            <button type="button" @click="openApplyModal = false" class="w-full inline-flex justify-center rounded-xl border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 sm:w-auto sm:text-sm">
                                                Batal
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    @elseif(Auth::guest())
                        <a href="{{ route('login') }}" class="w-full md:w-48 text-center bg-blue-700 hover:bg-blue-800 text-white font-bold py-3 px-6 rounded-xl transition-colors shadow-md shadow-blue-700/20 block">
                            Login untuk Melamar
                        </a>
                    @else
                        <button disabled class="w-full md:w-48 bg-gray-200 text-gray-500 font-bold py-3 px-6 rounded-xl cursor-not-allowed">
                            Hanya Akun Pelamar
                        </button>
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
                <h2 class="text-xl font-bold text-gray-900 border-b border-gray-200 pb-2 mb-4">Deskripsi Pekerjaan</h2>
                <div class="prose prose-blue max-w-none text-gray-700 leading-relaxed whitespace-pre-line">
                    {{ $jobListing->description }}
                </div>
            </section>

            <section>
                <h2 class="text-xl font-bold text-gray-900 border-b border-gray-200 pb-2 mb-4">Persyaratan</h2>
                <div class="prose prose-blue max-w-none text-gray-700 leading-relaxed whitespace-pre-line">
                    {{ $jobListing->requirements }}
                </div>
            </section>
        </div>

        {{-- INFO KANAN --}}
        <aside class="w-full md:w-80 shrink-0 space-y-6">
            <div class="bg-white border border-gray-200 rounded-2xl p-6">
                <h3 class="font-bold text-gray-900 mb-4">Ringkasan Pekerjaan</h3>
                
                <ul class="space-y-4">
                    <li>
                        <div class="text-xs text-gray-500 mb-1">Tanggal Diposting</div>
                        <div class="text-sm font-medium text-gray-900">{{ $jobListing->created_at->format('d M Y') }}</div>
                    </li>
                    <li>
                        <div class="text-xs text-gray-500 mb-1">Kategori</div>
                        <div class="text-sm font-medium text-gray-900">{{ $jobListing->category->name }}</div>
                    </li>
                    <li>
                        <div class="text-xs text-gray-500 mb-1">Rentang Gaji</div>
                        <div class="text-sm font-medium text-green-700">
                            @if($jobListing->salary_min && $jobListing->salary_max)
                                Rp {{ number_format($jobListing->salary_min, 0, ',', '.') }} - Rp {{ number_format($jobListing->salary_max, 0, ',', '.') }}
                            @else
                                Gaji Dirahasiakan / Negotiable
                            @endif
                        </div>
                    </li>
                    <li>
                        <div class="text-xs text-gray-500 mb-1">Batas Lamaran</div>
                        <div class="text-sm font-medium text-gray-900">Segera</div>
                    </li>
                </ul>
            </div>

            <div class="bg-blue-50 border border-blue-100 rounded-2xl p-6">
                <h3 class="font-bold text-blue-900 mb-2">Tentang {{ $jobListing->company->name }}</h3>
                <p class="text-sm text-blue-800 leading-relaxed mb-4">
                    {{ Str::limit($jobListing->company->description ?? 'Perusahaan ini belum menambahkan deskripsi.', 150) }}
                </p>
                <a href="#" class="text-sm font-semibold text-blue-700 hover:underline">Lihat profil perusahaan &rarr;</a>
            </div>
        </aside>

    </main>

    {{-- RELATED JOBS --}}
    @if($relatedJobs->count() > 0)
    <section class="bg-white border-t border-gray-200 py-12 px-6">
        <div class="max-w-5xl mx-auto">
            <h2 class="text-2xl font-bold text-gray-900 mb-6">Lowongan Terkait</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                @foreach($relatedJobs as $related)
                    <a href="{{ route('jobs.show', $related->id) }}" class="flex gap-4 p-4 rounded-xl border border-gray-100 hover:border-blue-300 hover:shadow-sm transition group">
                        <div class="w-12 h-12 rounded-lg bg-blue-50 text-blue-700 flex items-center justify-center font-bold text-lg shrink-0">
                            @if($related->company->logo_path)
                                <img src="{{ asset('storage/' . $related->company->logo_path) }}" alt="{{ $related->company->name }}" class="w-full h-full object-cover rounded-lg">
                            @else
                                {{ strtoupper(substr($related->company->name, 0, 1)) }}
                            @endif
                        </div>
                        <div>
                            <h3 class="font-bold text-gray-900 group-hover:text-blue-700 transition">{{ $related->title }}</h3>
                            <p class="text-sm text-gray-500">{{ $related->company->name }} • {{ $related->location }}</p>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    {{-- FOOTER --}}
    <footer class="bg-gray-900 text-white mt-auto py-8">
        <div class="max-w-5xl mx-auto px-6 flex flex-col sm:flex-row items-center justify-between gap-4">
            <div class="text-xl font-bold tracking-tight">JobHub</div>
            <div class="text-sm text-gray-400">© {{ date('Y') }} JobHub. Hak Cipta Dilindungi.</div>
        </div>
    </footer>

</body>
</html>
