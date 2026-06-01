<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'JobHub') }} - Pencarian Lowongan</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>[x-cloak] { display: none !important; }</style>
</head>
<body class="min-h-screen bg-slate-100 font-sans text-slate-900">
    <!-- Navbar -->
    <nav class="bg-sky-600 text-white px-6 md:px-12 py-4 shadow-md flex justify-between items-center">
        <div class="text-2xl md:text-3xl font-bold">JobHub</div>
        <div class="flex items-center gap-4">
            <span class="text-sm md:text-base hidden sm:inline">{{ auth()->user()->name }}</span>
            <form method="POST" action="{{ route('logout') }}" class="inline">
                @csrf
                <button type="submit" class="text-sm font-semibold hover:text-sky-100 transition">
                    Logout
                </button>
            </form>
        </div>
    </nav>

    <!-- Main Content -->
    <div x-data="jobSearch()" x-cloak class="max-w-6xl mx-auto my-10 px-5 md:px-6">
        
        <!-- Search Box -->
        <div class="bg-white rounded-3xl shadow-lg p-6 md:p-8 mb-8">
            <div class="flex flex-col md:flex-row gap-4 flex-wrap">
                <input
                    type="text"
                    x-model="searchKeyword"
                    @input="performSearch()"
                    placeholder="Cari posisi pekerjaan..."
                    class="flex-1 min-w-max md:min-w-56 px-4 py-3 border border-slate-300 rounded-2xl focus:outline-none focus:border-sky-500 focus:ring-4 focus:ring-sky-100 transition"
                >

                <select
                    x-model="selectedLocation"
                    @change="performSearch()"
                    class="flex-1 min-w-max md:min-w-48 px-4 py-3 border border-slate-300 rounded-2xl focus:outline-none focus:border-sky-500 focus:ring-4 focus:ring-sky-100 transition bg-white"
                >
                    <option value="">Semua Lokasi</option>
                    <option value="Jakarta">Jakarta</option>
                    <option value="Bandung">Bandung</option>
                    <option value="Surabaya">Surabaya</option>
                    <option value="Yogyakarta">Yogyakarta</option>
                </select>

                <select
                    x-model="selectedCategory"
                    @change="performSearch()"
                    class="flex-1 min-w-max md:min-w-48 px-4 py-3 border border-slate-300 rounded-2xl focus:outline-none focus:border-sky-500 focus:ring-4 focus:ring-sky-100 transition bg-white"
                >
                    <option value="">Semua Kategori</option>
                    <option value="IT">IT</option>
                    <option value="Design">Design</option>
                    <option value="Marketing">Marketing</option>
                    <option value="Finance">Finance</option>
                </select>

                <button
                    @click="performSearch()"
                    class="bg-sky-600 text-white px-6 py-3 rounded-2xl font-semibold hover:bg-sky-700 transition shadow-md md:col-span-full lg:col-span-auto"
                >
                    Cari
                </button>
            </div>
        </div>

        <!-- Job List -->
        <div class="grid gap-6">
            <template x-if="filteredJobs.length === 0">
                <div class="bg-white rounded-3xl shadow-md p-10 text-center">
                    <h3 class="text-lg font-semibold text-slate-700">Tidak ada lowongan ditemukan</h3>
                    <p class="text-slate-500 mt-2">Coba ubah filter pencarian Anda</p>
                </div>
            </template>

            <template x-for="job in filteredJobs" :key="job.title">
                <div class="bg-white rounded-3xl shadow-md hover:shadow-lg transition p-6 md:p-8">
                    <div class="flex flex-col md:flex-row md:items-start md:justify-between gap-4">
                        <div class="flex-1">
                            <h2 class="text-xl md:text-2xl font-bold text-slate-900" x-text="job.title"></h2>
                            <p class="text-sky-600 font-semibold mt-2" x-text="job.company"></p>
                            <p class="text-slate-600 mt-3">
                                <span>📍 <span x-text="job.location"></span></span>
                                <span class="mx-2">|</span>
                                <span>Kategori: <span x-text="job.category"></span></span>
                            </p>
                        </div>
                        <button
                            class="bg-emerald-600 text-white px-6 py-3 rounded-2xl font-semibold hover:bg-emerald-700 transition whitespace-nowrap"
                        >
                            Lamar Sekarang
                        </button>
                    </div>
                </div>
            </template>
        </div>

    </div>

    <script>
        function jobSearch() {
            return {
                searchKeyword: '',
                selectedLocation: '',
                selectedCategory: '',
                jobs: [
                    {
                        title: 'Frontend Developer',
                        company: 'PT Digital Indonesia',
                        location: 'Jakarta',
                        category: 'IT'
                    },
                    {
                        title: 'UI/UX Designer',
                        company: 'Creative Studio',
                        location: 'Bandung',
                        category: 'Design'
                    },
                    {
                        title: 'Digital Marketing',
                        company: 'MarketPro',
                        location: 'Surabaya',
                        category: 'Marketing'
                    },
                    {
                        title: 'Backend Developer',
                        company: 'Tech Nusantara',
                        location: 'Jakarta',
                        category: 'IT'
                    },
                    {
                        title: 'Graphic Designer',
                        company: 'Creative Studio',
                        location: 'Bandung',
                        category: 'Design'
                    },
                    {
                        title: 'Financial Analyst',
                        company: 'Finance Pro',
                        location: 'Jakarta',
                        category: 'Finance'
                    }
                ],
                filteredJobs: [],
                
                performSearch() {
                    this.filteredJobs = this.jobs.filter(job => {
                        const matchKeyword = job.title.toLowerCase().includes(this.searchKeyword.toLowerCase());
                        const matchLocation = this.selectedLocation === '' || job.location === this.selectedLocation;
                        const matchCategory = this.selectedCategory === '' || job.category === this.selectedCategory;
                        
                        return matchKeyword && matchLocation && matchCategory;
                    });
                },

                init() {
                    this.filteredJobs = this.jobs;
                }
            }
        }
    </script>
</body>
</html>