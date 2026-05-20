<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Teknologi & IT',         'slug' => 'teknologi-it'],
            ['name' => 'Desain & Kreatif',        'slug' => 'desain-kreatif'],
            ['name' => 'Marketing & Sales',       'slug' => 'marketing-sales'],
            ['name' => 'Keuangan & Akuntansi',    'slug' => 'keuangan-akuntansi'],
            ['name' => 'Pendidikan',              'slug' => 'pendidikan'],
            ['name' => 'Kesehatan',               'slug' => 'kesehatan'],
            ['name' => 'Logistik & Operasional',  'slug' => 'logistik-operasional'],
            ['name' => 'Hukum & Humas',           'slug' => 'hukum-humas'],
            ['name' => 'SDM & Rekrutmen',         'slug' => 'sdm-rekrutmen'],
            ['name' => 'Produk & Riset',          'slug' => 'produk-riset'],
        ];

        DB::table('categories')->insert($categories);
    }
}