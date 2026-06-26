<x-app-layout>
    <div class="block w-full min-h-screen bg-slate-50 antialiased">
        <div class="flex min-h-screen w-full overflow-hidden">
            
            <x-jobseeker-sidebar />

            <div class="flex-1 bg-slate-50 overflow-y-auto">
                <main class="p-8 lg:p-12 space-y-10 max-w-[1000px] mx-auto">
                    
                                        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                        <div>
                            <h1 class="text-3xl font-extrabold text-slate-900 tracking-tight">Profil Pelamar</h1>
                            <p class="text-slate-500 mt-2">Perbarui informasi profil dan CV Anda agar lebih menarik di mata perusahaan.</p>
                        </div>
                    </div>

                    @if(session('success'))
                        <div class="text-sm font-medium text-green-700 bg-green-50 px-4 py-3 rounded-xl border border-green-200 mb-4">
                            {{ session('success') }}
                        </div>
                    @endif

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

                    <section class="bg-white border border-slate-100 rounded-2xl shadow-sm p-8">
                        <form method="POST" action="{{ route('job_seeker.profile.update') }}" enctype="multipart/form-data" class="space-y-8">
                            @csrf
                            @method('PUT')

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                                                                <div class="space-y-6">
                                    <div>
                                        <label for="name" class="block text-sm font-bold text-slate-700 mb-2">Nama Lengkap</label>
                                        <input type="text" id="name" name="name" value="{{ old('name', Auth::user()->name) }}" required
                                            class="w-full rounded-xl border-slate-200 focus:border-blue-500 focus:ring-blue-500 text-sm py-3 px-4 shadow-sm" />
                                        @error('name') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                                    </div>

                                    <div>
                                        <label for="email" class="block text-sm font-bold text-slate-700 mb-2">Email</label>
                                        <input type="email" id="email" value="{{ Auth::user()->email }}" disabled
                                            class="w-full rounded-xl border-slate-200 bg-slate-50 text-slate-500 text-sm py-3 px-4 shadow-sm" />
                                        <p class="text-xs text-slate-400 mt-1.5">Email akun tidak dapat diubah di sini.</p>
                                    </div>

                                    <div>
                                        <label for="phone" class="block text-sm font-bold text-slate-700 mb-2">Nomor HP / WhatsApp</label>
                                        <input type="text" id="phone" name="phone" value="{{ old('phone', $jobSeeker->phone) }}"
                                            class="w-full rounded-xl border-slate-200 focus:border-blue-500 focus:ring-blue-500 text-sm py-3 px-4 shadow-sm" />
                                        @error('phone') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                                    </div>
                                    
                                    <div>
                                        <label for="description" class="block text-sm font-bold text-slate-700 mb-2">Tentang Saya (Bio Pendek)</label>
                                        <textarea id="description" name="description" rows="5"
                                            class="w-full rounded-xl border-slate-200 focus:border-blue-500 focus:ring-blue-500 text-sm py-3 px-4 shadow-sm" placeholder="Ceritakan latar belakang pendidikan, keahlian, dan minatmu...">{{ old('description', $jobSeeker->description) }}</textarea>
                                        @error('description') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                                    </div>
                                </div>

                                                                <div class="space-y-6">
                                    <div>
                                        <label class="block text-sm font-bold text-slate-700 mb-2">Foto Profil (JPG/PNG)</label>
                                        <div class="mt-2 mb-4" id="profile-preview-container" style="{{ $jobSeeker->profile_picture ? '' : 'display: none;' }}">
                                            <img id="profile-preview" src="{{ $jobSeeker->profile_picture ? asset('storage/' . $jobSeeker->profile_picture) : '' }}" alt="Foto" class="w-32 h-32 object-cover rounded-full border-4 border-slate-100 shadow-md">
                                        </div>
                                        @if(!$jobSeeker->profile_picture)
                                            <div id="no-profile-placeholder" class="mt-2 mb-4 w-32 h-32 rounded-full border-4 border-dashed border-slate-200 flex items-center justify-center text-slate-400 text-sm font-medium">
                                                Belum ada foto
                                            </div>
                                        @endif
                                        <input type="file" id="profile_picture" name="profile_picture" accept="image/*"
                                            onchange="if(this.files[0]) { document.getElementById('profile-preview-container').style.display='block'; document.getElementById('profile-preview').src = window.URL.createObjectURL(this.files[0]); var placeholder = document.getElementById('no-profile-placeholder'); if(placeholder) placeholder.style.display='none'; }"
                                            class="block w-full text-sm text-slate-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 transition-colors" />
                                        @if($jobSeeker->profile_picture)
                                            <button type="submit" form="delete-photo-form" onclick="return confirm('Hapus foto profil?')" class="text-xs font-semibold text-rose-600 hover:text-rose-800 transition mt-2 flex items-center gap-1"><svg class="w-4 h-4 inline-block mr-1 -mt-0.5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" /></svg> Hapus Foto Profil</button>
                                        @endif
                                        @error('profile_picture') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                                    </div>

                                    <div>
                                        <label class="block text-sm font-bold text-slate-700 mb-2">Resume / CV (PDF, Max 5MB)</label>
                                        @if($jobSeeker->cv_path)
                                            <div class="mb-4 bg-emerald-50 border border-emerald-100 rounded-xl p-4 flex items-center justify-between">
                                                <div class="flex items-center gap-3">
                                                    <span class="text-emerald-600"><svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" /></svg></span>
                                                    <div>
                                                        <p class="text-sm font-bold text-emerald-800">CV Sudah Diupload</p>
                                                        <a href="{{ asset('storage/' . $jobSeeker->cv_path) }}" target="_blank" class="text-xs text-emerald-600 hover:underline">Lihat file saat ini</a>
                                                    </div>
                                                </div>
                                                <button type="submit" form="delete-cv-form" onclick="return confirm('Hapus CV ini?')" class="flex items-center gap-1 rounded-lg bg-rose-50 px-3 py-1.5 text-xs font-bold text-rose-600 hover:bg-rose-100 transition"><svg class="w-4 h-4 inline-block mr-1 -mt-0.5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" /></svg> Hapus CV</button>
                                            </div>
                                        @else
                                            <div class="mb-4 bg-rose-50 border border-rose-100 rounded-xl p-4 flex items-center gap-3">
                                                <span class="text-rose-600"><svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" /></svg></span>
                                                <p class="text-sm font-bold text-rose-800">Anda belum mengupload CV utama.</p>
                                            </div>
                                        @endif
                                        <input type="file" id="cv_path" name="cv_path" accept=".pdf"
                                            onchange="if(this.files[0]) { document.getElementById('cv-filename-preview').classList.remove('hidden'); document.getElementById('cv-filename').innerText = this.files[0].name; }"
                                            class="block w-full text-sm text-slate-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 transition-colors" />
                                        <p id="cv-filename-preview" class="mt-2 text-sm text-blue-600 font-medium hidden">File terpilih untuk diupload: <span id="cv-filename" class="font-bold"></span></p>
                                        @error('cv_path') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="pt-6 border-t border-slate-100 flex justify-end">
                                <button type="submit" class="bg-blue-600 text-white font-bold py-3 px-8 rounded-xl shadow-md shadow-blue-600/20 hover:bg-blue-700 transition">
                                    Simpan Perubahan Profil
                                </button>
                            </div>
                        </form>
                    </section>

                    @if($jobSeeker->profile_picture)
                    <form id="delete-photo-form" method="POST" action="{{ route('job_seeker.profile.photo.delete') }}" class="hidden">
                        @csrf
                        @method('DELETE')
                    </form>
                    @endif

                    @if($jobSeeker->cv_path)
                    <form id="delete-cv-form" method="POST" action="{{ route('job_seeker.profile.cv.delete') }}" class="hidden">
                        @csrf
                        @method('DELETE')
                    </form>
                    @endif

                </main>
            </div>
            
        </div>
    </div>
</x-app-layout>
