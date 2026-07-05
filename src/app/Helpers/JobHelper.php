<?php

namespace App\Helpers;

class JobHelper
{
    /**
     * Fungsi Kalkulasi: Menghitung persentase kelengkapan profil.
     */
    public static function calculateProfileScore(array $userProfile): int
    {
        if (empty($userProfile)) {
            return 0;
        }

        $totalFields = count($userProfile);
        $filledFields = 0;

        foreach ($userProfile as $field) {
            if (!empty($field)) {
                $filledFields++;
            }
        }

        return (int) round(($filledFields / $totalFields) * 100);
    }

    /**
     * Fungsi Validasi: Memastikan password kuat (minimal 8 karakter dan ada angka).
     */
    public static function isPasswordStrong(string $password): bool
    {
        if (strlen($password) < 8) {
            return false;
        }

        // Cek apakah ada minimal 1 angka
        if (!preg_match('/[0-9]/', $password)) {
            return false;
        }

        return true;
    }

    /**
     * Fungsi Transformasi: Format rentang gaji ke bentuk Rupiah.
     */
    public static function formatSalaryRange(?int $min, ?int $max): string
    {
        if ($min === null && $max === null) {
            return 'Gaji tidak dicantumkan';
        }

        if ($min !== null && $max === null) {
            return 'Mulai dari Rp ' . number_format($min, 0, ',', '.');
        }

        if ($min === null && $max !== null) {
            return 'Hingga Rp ' . number_format($max, 0, ',', '.');
        }

        return 'Rp ' . number_format($min, 0, ',', '.') . ' - Rp ' . number_format($max, 0, ',', '.');
    }
    /**
     * Fungsi Transformasi: Membuat URL slug dari string (misal judul pekerjaan).
     */
    public static function generateSlug(string $title): string
    {
        // Ubah jadi huruf kecil dan hapus spasi di awal/akhir
        $slug = strtolower(trim($title));
        // Ganti karakter selain huruf dan angka dengan strip (-)
        $slug = preg_replace('/[^a-z0-9-]+/', '-', $slug);
        // Hapus strip di awal atau akhir jika ada
        return trim($slug, '-');
    }

    /**
     * Fungsi Kalkulasi: Menentukan kategori pengalaman dari jumlah tahun.
     */
    public static function calculateExperienceLevel(int $years): string
    {
        if ($years < 0) {
            return 'Invalid';
        }
        if ($years < 2) {
            return 'Junior';
        }
        if ($years <= 5) {
            return 'Mid-level';
        }
        return 'Senior';
    }
}
