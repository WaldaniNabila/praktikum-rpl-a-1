<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\JobSeeker;
use Illuminate\Support\Facades\Hash;

class JobSeekerSeeder extends Seeder
{
    public function run(): void
    {
        $seekers = [
            [
                'name'        => 'Budi Santoso',
                'email'       => 'budi@gmail.com',
                'phone'       => '081234567890',
                'description' => 'Fresh graduate Teknik Informatika dengan passion di bidang web development.',
            ],
            [
                'name'        => 'Siti Rahayu',
                'email'       => 'siti@gmail.com',
                'phone'       => '081234567891',
                'description' => 'UI/UX Designer dengan pengalaman 2 tahun di startup teknologi.',
            ],
            [
                'name'        => 'Ahmad Fauzi',
                'email'       => 'ahmad@gmail.com',
                'phone'       => '081234567892',
                'description' => 'Backend Developer berpengalaman dengan keahlian Laravel dan Node.js.',
            ],
        ];

        foreach ($seekers as $seekerData) {
            $user = User::create([
                'name'     => $seekerData['name'],
                'email'    => $seekerData['email'],
                'password' => Hash::make('seeker123'),
                'role'     => 'job_seeker',
            ]);

            JobSeeker::create([
                'user_id'     => $user->id,
                'phone'       => $seekerData['phone'],
                'description' => $seekerData['description'],
            ]);
        }
    }
}