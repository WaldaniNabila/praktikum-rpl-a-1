<x-app-layout>
    <div class="block w-full min-h-screen bg-slate-50 antialiased">
        <div class="flex min-h-screen w-full overflow-hidden">
            <x-company-sidebar />

            <div class="flex-1 bg-slate-50 overflow-y-auto">
                <main class="p-8 lg:p-12 space-y-10 max-w-4xl mx-auto">
                    <div>
                        <h1 class="text-3xl font-extrabold text-slate-900 tracking-tight">Tambah Lowongan Pekerjaan</h1>
                        <p class="text-slate-500 mt-2">Buat lowongan baru untuk mencari talenta terbaik.</p>
                    </div>

                    @if ($errors->any())
                        <div class="bg-rose-50 border-l-4 border-rose-500 p-4 mb-4 rounded-lg">
                            <div class="flex items-center">
                                <div class="text-rose-700 font-bold">Terjadi Kesalahan:</div>
                            </div>
                            <ul class="list-disc list-inside text-sm text-rose-600 mt-2">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <section class="rounded-2xl bg-white p-6 md:p-8 shadow-sm border border-slate-100/80">
                        <form action="{{ route('company.jobs.store') }}" method="POST" class="space-y-6">
                            @csrf
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-xs font-bold text-slate-500 uppercase mb-2">Judul Pekerjaan (Job Title) <span class="text-rose-500">*</span></label>
                                    <input type="text" name="title" value="{{ old('title') }}" required class="w-full rounded-xl border-slate-200 text-sm focus:border-blue-500 focus:ring-blue-500 shadow-sm" placeholder="Misal: Frontend Developer">
                                </div>
                                
                                <div>
                                    <label class="block text-xs font-bold text-slate-500 uppercase mb-2">Kategori <span class="text-rose-500">*</span></label>
                                    <select name="category_id" required class="w-full rounded-xl border-slate-200 text-sm focus:border-blue-500 focus:ring-blue-500 shadow-sm">
                                        <option value="">Pilih Kategori</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                
                                <div>
                                    <label class="block text-xs font-bold text-slate-500 uppercase mb-2">Lokasi <span class="text-rose-500">*</span></label>
                                    <input type="text" name="location" value="{{ old('location') }}" required class="w-full rounded-xl border-slate-200 text-sm focus:border-blue-500 focus:ring-blue-500 shadow-sm" placeholder="Misal: Jakarta Selatan">
                                </div>

                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-xs font-bold text-slate-500 uppercase mb-2">Tipe Karyawan <span class="text-rose-500">*</span></label>
                                        <select name="employment_type" required class="w-full rounded-xl border-slate-200 text-sm focus:border-blue-500 focus:ring-blue-500 shadow-sm">
                                            <option value="full-time" {{ old('employment_type') == 'full-time' ? 'selected' : '' }}>Full-Time</option>
                                            <option value="part-time" {{ old('employment_type') == 'part-time' ? 'selected' : '' }}>Part-Time</option>
                                            <option value="contract" {{ old('employment_type') == 'contract' ? 'selected' : '' }}>Contract</option>
                                            <option value="internship" {{ old('employment_type') == 'internship' ? 'selected' : '' }}>Internship</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label class="block text-xs font-bold text-slate-500 uppercase mb-2">Sistem Kerja <span class="text-rose-500">*</span></label>
                                        <select name="work_type" required class="w-full rounded-xl border-slate-200 text-sm focus:border-blue-500 focus:ring-blue-500 shadow-sm">
                                            <option value="on-site" {{ old('work_type') == 'on-site' ? 'selected' : '' }}>On-site</option>
                                            <option value="remote" {{ old('work_type') == 'remote' ? 'selected' : '' }}>Remote</option>
                                            <option value="hybrid" {{ old('work_type') == 'hybrid' ? 'selected' : '' }}>Hybrid</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-xs font-bold text-slate-500 uppercase mb-2">Gaji Minimum (Opsional)</label>
                                    <input type="number" name="salary_min" value="{{ old('salary_min') }}" class="w-full rounded-xl border-slate-200 text-sm focus:border-blue-500 focus:ring-blue-500 shadow-sm" placeholder="Misal: 5000000">
                                </div>
                                <div>
                                    <label class="block text-xs font-bold text-slate-500 uppercase mb-2">Gaji Maksimum (Opsional)</label>
                                    <input type="number" name="salary_max" value="{{ old('salary_max') }}" class="w-full rounded-xl border-slate-200 text-sm focus:border-blue-500 focus:ring-blue-500 shadow-sm" placeholder="Misal: 10000000">
                                </div>
                            </div>

                            <div>
                                <label class="block text-xs font-bold text-slate-500 uppercase mb-2">Deskripsi Pekerjaan <span class="text-rose-500">*</span></label>
                                <textarea name="description" rows="4" required class="w-full rounded-xl border-slate-200 text-sm focus:border-blue-500 focus:ring-blue-500 shadow-sm" placeholder="Jelaskan peran dan tanggung jawab pekerjaan...">{{ old('description') }}</textarea>
                            </div>
                            
                            <div>
                                <label class="block text-xs font-bold text-slate-500 uppercase mb-2">Persyaratan (Requirements) <span class="text-rose-500">*</span></label>
                                <textarea name="requirements" rows="4" required class="w-full rounded-xl border-slate-200 text-sm focus:border-blue-500 focus:ring-blue-500 shadow-sm" placeholder="Apa saja kualifikasi yang dibutuhkan?">{{ old('requirements') }}</textarea>
                            </div>

                            <div class="flex justify-end gap-3 pt-6 border-t border-slate-100">
                                <a href="{{ route('company.dashboard') }}" class="px-5 py-2.5 text-sm font-bold text-slate-600 bg-slate-100 rounded-xl hover:bg-slate-200 transition">Batal</a>
                                <button type="submit" class="px-5 py-2.5 text-sm font-bold text-white bg-blue-600 rounded-xl hover:bg-blue-700 shadow-md shadow-blue-600/10 transition">Posting Lowongan</button>
                            </div>
                        </form>
                    </section>
                </main>
            </div>
        </div>
    </div>
</x-app-layout>
