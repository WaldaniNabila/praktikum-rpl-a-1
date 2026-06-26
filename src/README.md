# JOBHUB

Platform rekrutmen online berbasis web yang menghubungkan pencari kerja dengan perusahaan. Dibangun dengan Laravel 12 dan Tailwind CSS.

---

## Fitur Utama

**Pencari Kerja** — Mencari lowongan, melamar pekerjaan, menyimpan bookmark, mengelola profil dan CV, serta memantau status lamaran.

**Perusahaan** — Memposting lowongan, melihat dan mengelola pelamar, serta mengubah status lamaran (diterima/ditolak).

**Administrator** — Memverifikasi perusahaan, menyetujui lowongan, mengelola kategori pekerjaan, dan mengawasi seluruh pengguna platform.

---

## Tech Stack

| Komponen       | Teknologi                |
|----------------|--------------------------|
| Backend        | PHP 8.2, Laravel 12      |
| Autentikasi    | Laravel Breeze           |
| Frontend       | Tailwind CSS, Alpine.js  |
| Bundler        | Vite                     |
| Database       | MySQL                    |
| Containerisasi | Docker, Docker Compose   |

---

## Instalasi

### Docker (Direkomendasikan)

```bash
docker compose up --build
```

Akses aplikasi pada `http://localhost:8000`.

### Lokal

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
npm install
npm run dev
php artisan serve
```

---

## Lisensi

[MIT License](https://opensource.org/licenses/MIT)
