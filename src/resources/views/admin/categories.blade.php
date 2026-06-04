<x-app-layout>
    <div class="block w-full min-h-screen bg-slate-50 antialiased">
        <div class="flex min-h-screen w-full overflow-hidden">
            <x-admin-sidebar />

            <div class="flex-1 bg-slate-50 overflow-y-auto">
                <main class="p-8 lg:p-12 space-y-8 max-w-[1600px] mx-auto">
                    
                    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                        <div>
                            <h1 class="text-3xl font-extrabold text-slate-900 tracking-tight">Kategori Pekerjaan</h1>
                            <p class="text-slate-500 mt-2">Kelola master data kategori yang digunakan oleh perusahaan saat memposting lowongan.</p>
                        </div>
                    </div>

                    @if (session('success'))
                        <div class="bg-emerald-50 border-l-4 border-emerald-500 p-4 rounded-lg">
                            <p class="text-sm text-emerald-700 font-bold">{{ session('success') }}</p>
                        </div>
                    @endif
                    
                    @if ($errors->any())
                        <div class="bg-rose-50 border-l-4 border-rose-500 p-4 rounded-lg">
                            <ul class="list-disc list-inside text-sm text-rose-600">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                        
                        <!-- List Kategori -->
                        <div class="lg:col-span-2 space-y-6">
                            <section class="rounded-2xl bg-white p-6 shadow-sm border border-slate-100/80">
                                <h2 class="text-xl font-extrabold text-slate-900 tracking-tight mb-6">Daftar Kategori</h2>
                                <div class="overflow-x-auto">
                                    <table class="w-full text-left text-sm">
                                        <thead>
                                            <tr class="text-xs font-bold text-slate-400 uppercase tracking-wider border-b border-slate-100">
                                                <th class="pb-3 font-bold">Nama Kategori</th>
                                                <th class="pb-3 font-bold">Slug (URL)</th>
                                                <th class="pb-3 font-bold text-right">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody class="divide-y divide-slate-100 text-slate-700 font-medium">
                                            @forelse($categories as $category)
                                            <tr>
                                                <td class="py-4 font-bold text-slate-900">{{ $category->name }}</td>
                                                <td class="py-4 text-slate-500">{{ $category->slug }}</td>
                                                <td class="py-4 text-right">
                                                    <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kategori ini? Pastikan tidak ada lowongan yang terhubung.')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="rounded-lg bg-red-50 px-3 py-1.5 text-xs font-bold text-red-700 hover:bg-red-100 transition">Hapus</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <td colspan="3" class="py-8 text-center text-slate-500">Belum ada kategori yang dibuat.</td>
                                            </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </section>
                        </div>

                        <!-- Form Tambah Kategori -->
                        <div class="lg:col-span-1">
                            <section class="rounded-2xl bg-white p-6 shadow-sm border border-slate-100/80 sticky top-8">
                                <h2 class="text-xl font-extrabold text-slate-900 tracking-tight mb-6">Tambah Kategori Baru</h2>
                                <form action="{{ route('admin.categories.store') }}" method="POST" class="space-y-4">
                                    @csrf
                                    <div>
                                        <label class="block text-xs font-bold text-slate-500 uppercase mb-2">Nama Kategori <span class="text-blue-500">*</span></label>
                                        <input type="text" name="name" id="name_input" value="{{ old('name') }}" required class="w-full rounded-xl border-slate-200 text-sm focus:border-blue-500 focus:ring-blue-500 shadow-sm" placeholder="Contoh: Software Engineering">
                                    </div>
                                    <div>
                                        <label class="block text-xs font-bold text-slate-500 uppercase mb-2">Slug (URL) <span class="text-blue-500">*</span></label>
                                        <input type="text" name="slug" id="slug_input" value="{{ old('slug') }}" required class="w-full rounded-xl border-slate-200 text-sm focus:border-blue-500 focus:ring-blue-500 shadow-sm" placeholder="Contoh: software-engineering">
                                        <p class="text-[10px] text-slate-400 mt-1">Harus unik, huruf kecil, dan tanpa spasi (gunakan tanda hubung -).</p>
                                    </div>
                                    <div class="pt-2">
                                        <button type="submit" class="w-full rounded-xl bg-blue-600 px-5 py-2.5 text-sm font-bold text-white shadow-md shadow-blue-600/10 hover:bg-blue-700 transition">Simpan Kategori</button>
                                    </div>
                                </form>
                            </section>
                        </div>

                    </div>
                </main>
            </div>
        </div>
    </div>
    
    <!-- Script untuk auto-generate slug -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const nameInput = document.getElementById('name_input');
            const slugInput = document.getElementById('slug_input');
            
            if(nameInput && slugInput) {
                nameInput.addEventListener('input', function() {
                    const slug = this.value
                        .toLowerCase()
                        .replace(/[^\w ]+/g, '')
                        .replace(/ +/g, '-');
                    slugInput.value = slug;
                });
            }
        });
    </script>
</x-app-layout>
