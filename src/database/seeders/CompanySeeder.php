<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Company;
use Illuminate\Support\Facades\Hash;

class CompanySeeder extends Seeder
{
    public function run(): void
    {
        $companies = [
            [
                'name'        => 'GoJek Indonesia',
                'email'       => 'hr@gojek.com',
                'industry'    => 'Teknologi & IT',
                'description' => 'GoJek adalah perusahaan teknologi asal Indonesia yang menyediakan layanan transportasi, logistik, dan pembayaran digital.',
                'phone'       => '02150251000',
                'address'     => 'Pasaraya Blok M, Jl. Iskandarsyah II No.2, Jakarta Selatan',
                'status'      => 'verified',
            ],
            [
                'name'        => 'Tokopedia',
                'email'       => 'hr@tokopedia.com',
                'industry'    => 'Teknologi & IT',
                'description' => 'Tokopedia adalah platform e-commerce terbesar di Indonesia yang menghubungkan jutaan penjual dan pembeli.',
                'phone'       => '02129278600',
                'address'     => 'Tokopedia Tower, Jl. Prof. DR. Satrio, Jakarta Selatan',
                'status'      => 'verified',
            ],
            [
                'name'        => 'Shopee Indonesia',
                'email'       => 'hr@shopee.com',
                'industry'    => 'Teknologi & IT',
                'description' => 'Shopee adalah platform e-commerce yang berfokus pada pengalaman berbelanja mobile-first.',
                'phone'       => '02150251111',
                'address'     => 'Treasury Tower, District 8, Jakarta Selatan',
                'status'      => 'verified',
            ],
            [
                'name'        => 'Bukalapak',
                'email'       => 'hr@bukalapak.com',
                'industry'    => 'Teknologi & IT',
                'description' => 'Bukalapak adalah platform e-commerce dan fintech yang melayani jutaan UMKM di seluruh Indonesia.',
                'phone'       => '02127899999',
                'address'     => 'Epicentrum Walk, Jl. HR Rasuna Said, Jakarta Selatan',
                'status'      => 'verified',
            ],
            [
                'name'        => 'Traveloka',
                'email'       => 'hr@traveloka.com',
                'industry'    => 'Teknologi & IT',
                'description' => 'Traveloka adalah platform travel dan lifestyle terkemuka di Asia Tenggara.',
                'phone'       => '02150251222',
                'address'     => 'Traveloka Building, Jl. HR Rasuna Said, Jakarta Selatan',
                'status'      => 'verified',
            ],
        ];

        foreach ($companies as $companyData) {
            // Buat akun user untuk perusahaan
            $user = User::create([
                'name'     => $companyData['name'],
                'email'    => $companyData['email'],
                'password' => Hash::make('company123'),
                'role'     => 'company',
            ]);

            // Buat profil perusahaan
            Company::create([
                'user_id'     => $user->id,
                'name'        => $companyData['name'],
                'industry'    => $companyData['industry'],
                'description' => $companyData['description'],
                'phone'       => $companyData['phone'],
                'address'     => $companyData['address'],
                'status'      => $companyData['status'],
            ]);
        }
    }
}