<x-app-layout>
    <div class="bg-white border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Profil Pelamar') }}
            </h2>
            <a href="{{ route('job_seeker.dashboard') }}" class="text-sm font-medium text-blue-600 hover:underline">
                &larr; Kembali ke Dashboard
            </a>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                @if(session('success'))
                    <div class="mb-4 p-4 text-green-700 bg-green-100 rounded-lg">
                        {{ session('success') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('job_seeker.profile.update') }}" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <!-- Nama Lengkap -->
                    <div>
                        <x-input-label for="name" :value="__('Nama Lengkap')" />
                        <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', Auth::user()->name)" required />
                        <x-input-error class="mt-2" :messages="$errors->get('name')" />
                    </div>

                    <!-- Email (Hanya Tampil / Disabled kalau tidak diizinkan ubah) -->
                    <div>
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" type="email" class="mt-1 block w-full bg-gray-100" :value="Auth::user()->email" disabled />
                        <p class="text-xs text-gray-500 mt-1">Email tidak bisa diubah.</p>
                    </div>

                    <!-- Nomor HP -->
                    <div>
                        <x-input-label for="phone" :value="__('Nomor HP')" />
                        <x-text-input id="phone" name="phone" type="text" class="mt-1 block w-full" :value="old('phone', $jobSeeker->phone)" />
                        <x-input-error class="mt-2" :messages="$errors->get('phone')" />
                    </div>

                    <!-- Tentang Saya (Bio) -->
                    <div>
                        <x-input-label for="description" :value="__('Tentang Saya (Bio singkat)')" />
                        <textarea id="description" name="description" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" rows="4">{{ old('description', $jobSeeker->description) }}</textarea>
                        <x-input-error class="mt-2" :messages="$errors->get('description')" />
                    </div>

                    <!-- Foto Profil -->
                    <div>
                        <x-input-label for="profile_picture" :value="__('Foto Profil (JPG/PNG)')" />
                        @if($jobSeeker->profile_picture)
                            <div class="mt-2 mb-4">
                                <img src="{{ asset('storage/' . $jobSeeker->profile_picture) }}" alt="Foto" class="w-32 h-32 object-cover rounded-full border">
                            </div>
                        @endif
                        <input id="profile_picture" name="profile_picture" type="file" accept="image/*" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100" />
                        <x-input-error class="mt-2" :messages="$errors->get('profile_picture')" />
                    </div>

                    <!-- Upload CV -->
                    <div>
                        <x-input-label for="cv_path" :value="__('Upload CV (PDF, Maks 5MB)')" />
                        @if($jobSeeker->cv_path)
                            <div class="mt-2 mb-4 text-sm">
                                <a href="{{ asset('storage/' . $jobSeeker->cv_path) }}" target="_blank" class="text-indigo-600 hover:underline">Lihat CV Saat Ini</a>
                            </div>
                        @endif
                        <input id="cv_path" name="cv_path" type="file" accept=".pdf" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100" />
                        <x-input-error class="mt-2" :messages="$errors->get('cv_path')" />
                    </div>

                    <div class="flex items-center gap-4 pt-4">
                        <x-primary-button>{{ __('Simpan Profil') }}</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
