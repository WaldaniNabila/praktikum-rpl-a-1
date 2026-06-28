<x-app-layout>
    <div class="block w-full min-h-screen bg-slate-50 antialiased">
        <div class="flex min-h-screen w-full overflow-hidden">
            <x-company-sidebar />

            <div class="flex-1 bg-slate-50 overflow-y-auto">
                <main class="p-8 lg:p-12 space-y-10 max-w-4xl mx-auto">
                    <div>
                        <h1 class="text-3xl font-extrabold text-slate-900 tracking-tight">Company Profile</h1>
                        <p class="text-slate-500 mt-2">Manage your company details and brand identity</p>
                    </div>

                    @if (session('success'))
                        <div class="bg-emerald-50 border-l-4 border-emerald-500 p-4 mb-4 rounded-lg">
                            <p class="text-sm text-emerald-700 font-bold">{{ session('success') }}</p>
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

                    <section class="rounded-2xl bg-white p-6 md:p-8 shadow-sm border border-slate-100/80">
                        <form action="{{ route('company.profile.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                            @csrf
                            @method('PUT')
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-xs font-bold text-slate-500 uppercase mb-2">Nama Perusahaan <span class="text-rose-500">*</span></label>
                                    <input type="text" name="name" value="{{ old('name', Auth::user()->name) }}" required class="w-full rounded-xl border-slate-200 text-sm focus:border-blue-500 focus:ring-blue-500 shadow-sm">
                                </div>
                                
                                <div>
                                    <label class="block text-xs font-bold text-slate-500 uppercase mb-2">Email Perusahaan <span class="text-rose-500">*</span></label>
                                    <input type="email" name="email" value="{{ old('email', Auth::user()->email) }}" required class="w-full rounded-xl border-slate-200 text-sm focus:border-blue-500 focus:ring-blue-500 shadow-sm">
                                </div>
                                
                                <div>
                                    <label class="block text-xs font-bold text-slate-500 uppercase mb-2">Industri <span class="text-rose-500">*</span></label>
                                    <input type="text" name="industry" value="{{ old('industry', $company->industry) }}" required class="w-full rounded-xl border-slate-200 text-sm focus:border-blue-500 focus:ring-blue-500 shadow-sm">
                                </div>

                                <div>
                                    <label class="block text-xs font-bold text-slate-500 uppercase mb-2">Nomor Telepon</label>
                                    <input type="text" name="phone" value="{{ old('phone', $company->phone) }}" class="w-full rounded-xl border-slate-200 text-sm focus:border-blue-500 focus:ring-blue-500 shadow-sm">
                                </div>
                            </div>

                            <div>
                                <label class="block text-xs font-bold text-slate-500 uppercase mb-2">Logo Perusahaan</label>
                                <div class="mt-2 mb-4">
                                @if(isset($company) && $company->logo_path)
                                        <img id="logo-preview" src="{{ asset('storage/' . $company->logo_path) }}" alt="Logo" class="w-32 h-32 object-contain border rounded-xl p-2 bg-slate-50">
                                    @else
                                        <div id="logo-preview-placeholder" class="w-32 h-32 flex items-center justify-center border rounded-xl bg-blue-50">
                                            <span class="text-4xl font-black text-blue-300">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</span>
                                        </div>
                                        <img id="logo-preview" src="" alt="Logo" class="w-32 h-32 object-contain border rounded-xl p-2 bg-slate-50 hidden">
                                    @endif
                                </div>
                                <input type="file" name="logo_path" accept="image/*" onchange="if(this.files[0]){ var p=document.getElementById('logo-preview-placeholder'); if(p) p.classList.add('hidden'); var img=document.getElementById('logo-preview'); img.src=window.URL.createObjectURL(this.files[0]); img.classList.remove('hidden'); }" class="w-full text-sm text-slate-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 transition">
                                @if(isset($company) && $company->logo_path)
                                    <form method="POST" action="{{ route('company.profile.logo.delete') }}" onsubmit="return confirm('Hapus logo perusahaan?')" class="mt-2">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="flex items-center gap-1 text-xs font-semibold text-rose-600 hover:text-rose-800 transition"><svg class="w-4 h-4 inline-block mr-1 -mt-0.5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" /></svg> Hapus Logo</button>
                                    </form>
                                @endif
                                <p class="text-xs text-slate-400 mt-2">Format yang didukung: JPG, PNG, GIF. Maksimal ukuran 2MB.</p>
                            </div>

                            <div>
                                <label class="block text-xs font-bold text-slate-500 uppercase mb-2">Deskripsi Perusahaan</label>
                                <textarea name="description" rows="4" class="w-full rounded-xl border-slate-200 text-sm focus:border-blue-500 focus:ring-blue-500 shadow-sm">{{ old('description', $company->description) }}</textarea>
                            </div>

                            <div>
                                <label class="block text-xs font-bold text-slate-500 uppercase mb-2">Alamat Lengkap</label>
                                <textarea name="address" rows="3" class="w-full rounded-xl border-slate-200 text-sm focus:border-blue-500 focus:ring-blue-500 shadow-sm">{{ old('address', $company->address) }}</textarea>
                            </div>
                            
                            <div class="flex items-center justify-end pt-4 border-t border-slate-100">
                                <button type="submit" class="rounded-xl bg-blue-600 px-6 py-3 text-sm font-bold text-white shadow-md shadow-blue-600/10 hover:bg-blue-700 transition">
                                    Simpan Perubahan
                                </button>
                            </div>
                        </form>
                    </section>
                </main>
            </div>
        </div>
    </div>
</x-app-layout>
