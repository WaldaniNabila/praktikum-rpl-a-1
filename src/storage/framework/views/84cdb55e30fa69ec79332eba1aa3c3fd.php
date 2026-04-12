<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JobHub — Temukan Pekerjaan Impianmu</title>
    <link rel="stylesheet" href="<?php echo e(asset('build/assets/app-BkyXxD1_.css')); ?>">
    <script src="<?php echo e(asset('build/assets/app-BbzB21r_.js')); ?>" defer></script>
</head>
<body class="bg-gray-50 text-gray-900 antialiased">

    
    <nav class="bg-white border-b border-gray-200 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-6 flex items-center h-14 gap-6">
            <span class="text-lg font-semibold text-blue-700 tracking-tight">JobHub</span>
            <a href="#" class="text-sm font-medium text-blue-700 border-b-2 border-blue-700 pb-0.5">Lowongan</a>
            <a href="#" class="text-sm text-gray-500 hover:text-gray-800 transition-colors">Perusahaan</a>
            <a href="#" class="text-sm text-gray-500 hover:text-gray-800 transition-colors">Tentang kami</a>
            <div class="flex-1"></div>
            <a href="/login" class="text-sm px-4 py-1.5 rounded-lg border border-blue-300 text-blue-700 hover:bg-blue-50 transition-colors">Masuk</a>
            <a href="/register" class="text-sm px-4 py-1.5 rounded-lg bg-blue-700 text-white hover:bg-blue-800 transition-colors font-medium">Daftar gratis</a>
        </div>
    </nav>

    
    <section class="bg-blue-50 border-b border-blue-100 py-16 px-4 text-center">
        <div class="max-w-3xl mx-auto">
            <h1 class="text-4xl font-semibold text-blue-900 leading-snug mb-3">
                Temukan <span class="text-blue-700">pekerjaan impianmu</span><br>
                bersama ribuan perusahaan terbaik
            </h1>
            <p class="text-sm text-blue-600 mb-8 opacity-80">
                Ribuan lowongan kerja dari perusahaan terpercaya di seluruh Indonesia
            </p>

            
            <div class="flex items-center bg-white border border-blue-300 rounded-xl overflow-hidden max-w-2xl mx-auto mb-4">
                <div class="flex items-center px-3 text-gray-400">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 16 16">
                        <circle cx="6.5" cy="6.5" r="5" stroke="currentColor" stroke-width="1.5"/>
                        <path d="M10.5 10.5L14 14" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                    </svg>
                </div>
                <input type="text" placeholder="Posisi, keahlian, atau perusahaan..."
                    class="flex-1 py-3 text-sm bg-transparent outline-none text-gray-700 placeholder-gray-400">
                <div class="w-px h-6 bg-blue-200 mx-1"></div>
                <div class="flex items-center px-3 text-gray-400">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 16 16">
                        <path d="M8 2C5.79 2 4 3.79 4 6c0 3.5 4 8 4 8s4-4.5 4-8c0-2.21-1.79-4-4-4z" stroke="currentColor" stroke-width="1.5"/>
                        <circle cx="8" cy="6" r="1.5" stroke="currentColor" stroke-width="1.2"/>
                    </svg>
                </div>
                <input type="text" placeholder="Kota atau lokasi..."
                    class="w-36 py-3 text-sm bg-transparent outline-none text-gray-700 placeholder-gray-400">
                <button class="bg-blue-700 text-white px-5 py-3 text-sm font-medium hover:bg-blue-800 transition-colors">
                    Cari loker
                </button>
            </div>

            
            <div class="flex items-center justify-center gap-2 flex-wrap text-xs">
                <span class="text-blue-500 opacity-70">Populer:</span>
                <?php $__currentLoopData = ['UI/UX Designer', 'Frontend Dev', 'Data Analyst', 'Product Manager', 'Backend Dev']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="#" class="px-3 py-1 rounded-full bg-blue-100 text-blue-700 hover:bg-blue-200 transition-colors">
                        <?php echo e($tag); ?>

                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>

    
    <section class="bg-white border-b border-gray-200">
        <div class="max-w-7xl mx-auto grid grid-cols-2 sm:grid-cols-4 divide-x divide-gray-100">
            <?php $__currentLoopData = [
                ['12.4rb', 'Lowongan aktif'],
                ['3.200+', 'Perusahaan terdaftar'],
                ['98rb+',  'Pelamar terdaftar'],
                ['87%',    'Tingkat kepuasan'],
            ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as [$num, $label]): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="py-5 text-center">
                    <div class="text-2xl font-semibold text-blue-700"><?php echo e($num); ?></div>
                    <div class="text-xs text-gray-500 mt-1"><?php echo e($label); ?></div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </section>

    
    <section class="max-w-7xl mx-auto px-6 py-10">
        <div class="flex items-baseline justify-between mb-5">
            <h2 class="text-lg font-semibold text-gray-900">Jelajahi berdasarkan kategori</h2>
            <a href="#" class="text-sm text-blue-700 hover:underline">Lihat semua →</a>
        </div>
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
            <?php $__currentLoopData = [
                ['bg-blue-50',   'text-blue-700',   'Teknologi & IT',         '2.841'],
                ['bg-teal-50',   'text-teal-700',   'Keuangan & Akuntansi',   '1.203'],
                ['bg-purple-50', 'text-purple-700', 'Desain & Kreatif',       '987'],
                ['bg-amber-50',  'text-amber-700',  'Marketing & Sales',      '1.540'],
                ['bg-green-50',  'text-green-700',  'Pendidikan',             '642'],
                ['bg-pink-50',   'text-pink-700',   'Kesehatan',              '831'],
                ['bg-orange-50', 'text-orange-700', 'Logistik & Operasional', '723'],
                ['bg-sky-50',    'text-sky-700',    'Hukum & Humas',          '389'],
            ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as [$bg, $color, $name, $count]): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="#" class="flex flex-col gap-2 p-4 rounded-xl border border-gray-100 bg-gray-50 hover:border-blue-200 hover:bg-blue-50 transition-all group">
                    <div class="w-8 h-8 rounded-lg <?php echo e($bg); ?>"></div>
                    <div>
                        <div class="text-sm font-medium text-gray-800 group-hover:text-blue-700 transition-colors"><?php echo e($name); ?></div>
                        <div class="text-xs text-gray-400 mt-0.5"><?php echo e($count); ?> lowongan</div>
                    </div>
                </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </section>

    
    <section class="max-w-7xl mx-auto px-6 pb-10">
        <div class="flex items-baseline justify-between mb-5">
            <h2 class="text-lg font-semibold text-gray-900">Lowongan terbaru</h2>
            <a href="#" class="text-sm text-blue-700 hover:underline">Lihat semua →</a>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
            <?php $__currentLoopData = [
                ['GJ', 'bg-blue-50',   'text-blue-700',   'UI/UX Designer',     'GoJek Indonesia',  'Jakarta Selatan', 'Rp 8–14 jt/bln',  'Full-time', 'Remote'],
                ['TB', 'bg-green-50',  'text-green-700',  'Frontend Developer',  'Tokopedia',        'Surabaya',        'Rp 10–18 jt/bln', 'Full-time', 'On-site'],
                ['SH', 'bg-purple-50', 'text-purple-700', 'Data Analyst',        'Shopee Indonesia', 'Jakarta Pusat',   'Rp 9–15 jt/bln',  'Full-time', 'Hybrid'],
                ['BK', 'bg-amber-50',  'text-amber-700',  'Product Manager',     'Bukalapak',        'Bandung',         'Rp 15–25 jt/bln', 'Full-time', 'Remote'],
            ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as [$init, $bg, $color, $title, $company, $location, $salary, $type, $worktype]): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="bg-white border border-gray-200 rounded-xl p-4 hover:border-blue-300 transition-all group">
                    <div class="flex gap-3 items-start mb-3">
                        <div class="w-10 h-10 rounded-lg <?php echo e($bg); ?> <?php echo e($color); ?> text-sm font-semibold flex items-center justify-center shrink-0">
                            <?php echo e($init); ?>

                        </div>
                        <div class="flex-1 min-w-0">
                            <div class="text-sm font-medium text-gray-900 group-hover:text-blue-700 transition-colors truncate"><?php echo e($title); ?></div>
                            <div class="text-xs text-gray-500"><?php echo e($company); ?></div>
                        </div>
                        <span class="text-xs font-medium px-2 py-0.5 rounded-full bg-teal-50 text-teal-800 shrink-0">Buka</span>
                    </div>
                    <div class="flex flex-wrap gap-1.5 mb-2">
                        <span class="text-xs px-2 py-0.5 rounded-full bg-blue-50 text-blue-800 font-medium"><?php echo e($type); ?></span>
                        <span class="text-xs px-2 py-0.5 rounded-full bg-purple-50 text-purple-800 font-medium"><?php echo e($worktype); ?></span>
                    </div>
                    <div class="text-xs text-gray-400 mb-3"><?php echo e($location); ?></div>
                    <div class="flex items-center gap-2 border-t border-gray-100 pt-3">
                        <span class="text-xs font-semibold text-blue-700 flex-1"><?php echo e($salary); ?></span>
                        <a href="#" class="text-xs px-3 py-1.5 rounded-lg bg-blue-700 text-white hover:bg-blue-800 transition-colors font-medium">Lamar</a>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </section>

    
    <section class="max-w-7xl mx-auto px-6 pb-10">
        <div class="bg-blue-800 rounded-2xl p-8 flex flex-col sm:flex-row items-center gap-6">
            <div class="flex-1 text-center sm:text-left">
                <h2 class="text-xl font-semibold text-blue-50 mb-2">Rekrut talenta terbaik bersama JobHub</h2>
                <p class="text-sm text-blue-300 leading-relaxed">
                    Pasang lowongan dan temukan kandidat yang tepat dari ribuan pelamar aktif di seluruh Indonesia.
                    Gratis untuk 3 posting pertama.
                </p>
            </div>
            <a href="/register/perusahaan" class="shrink-0 px-6 py-2.5 rounded-xl bg-blue-50 text-blue-900 text-sm font-semibold hover:bg-white transition-colors">
                Daftarkan perusahaan →
            </a>
        </div>
    </section>

    
    <section class="bg-gray-50 border-t border-gray-100 py-10 px-4">
        <div class="max-w-7xl mx-auto">
            <h2 class="text-lg font-semibold text-gray-900 mb-6 text-center">Cara kerja JobHub</h2>
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <?php $__currentLoopData = [
                    ['1', 'Buat akun gratis',     'Daftar dalam 1 menit menggunakan email atau akun Google-mu'],
                    ['2', 'Lengkapi profil & CV',  'Upload CV dan isi data dirimu agar perusahaan bisa mengenalmu lebih baik'],
                    ['3', 'Lamar & pantau status', 'Apply ke lowongan impianmu dan pantau status lamaran secara real-time'],
                ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as [$num, $title, $desc]): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="bg-white rounded-xl border border-gray-100 p-5 text-center">
                        <div class="w-8 h-8 rounded-full bg-blue-100 text-blue-700 text-sm font-semibold flex items-center justify-center mx-auto mb-3">
                            <?php echo e($num); ?>

                        </div>
                        <div class="text-sm font-semibold text-gray-800 mb-1.5"><?php echo e($title); ?></div>
                        <div class="text-xs text-gray-500 leading-relaxed"><?php echo e($desc); ?></div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>

    
    <footer class="bg-white border-t border-gray-100 py-6 px-4">
        <div class="max-w-7xl mx-auto flex flex-col sm:flex-row items-center justify-between gap-3">
            <span class="text-base font-semibold text-blue-700">JobHub</span>
            <div class="flex gap-5 flex-wrap justify-center">
                <?php $__currentLoopData = ['Tentang kami', 'Blog', 'Kebijakan privasi', 'Syarat & ketentuan', 'Hubungi kami']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="#" class="text-xs text-gray-400 hover:text-gray-600 transition-colors"><?php echo e($link); ?></a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <span class="text-xs text-gray-400">© <?php echo e(date('Y')); ?> JobHub</span>
        </div>
    </footer>

</body>
</html><?php /**PATH /var/www/resources/views/welcome.blade.php ENDPATH**/ ?>