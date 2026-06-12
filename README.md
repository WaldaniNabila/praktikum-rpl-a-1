# JOBHUB — Platform Rekrutmen Online

> Proyek praktikum Rekayasa Perangkat Lunak (RPL) — Kelompok A-1

## Anggota Tim

| Nama | NIM |
|------|-----|
| Argya Seno | L0124004 |
| Intan Trinanda | L0124018 |
| Izanahda Nurkhasna | L0124019 |
| Waldani Nabila | L0124122 |

---

## Tentang Aplikasi

**JOBHUB** adalah platform rekrutmen online berbasis web yang menghubungkan pencari kerja dengan perusahaan. Dibangun menggunakan **Laravel 12** dengan sistem multi-role (Pelamar, Perusahaan, Admin).

---

## Fitur yang Sudah Berjalan

### Autentikasi 
- ✅ Registrasi akun — Pelamar & Perusahaan (dengan pilihan role)
- ✅ Login & Logout
- ✅ Lupa password & reset password
- ✅ Role-based access control (Pelamar / Perusahaan / Admin)

---

### Halaman Publik 
- ✅ Landing page / Halaman utama
- ✅ Daftar lowongan publik (`/lowongan`)
- ✅ Detail lowongan (`/lowongan/{id}`)
- ✅ Detail profil perusahaan

---

### Dashboard Pelamar
- ✅ Halaman dashboard pelamar
- ✅ Halaman profil pelamar
- ✅ Halaman daftar lamaran saya
- ✅ Halaman lowongan tersimpan (bookmark)

---

### Dashboard Perusahaan
- ✅ Halaman dashboard perusahaan (statistik lowongan & pelamar)
- ✅ Halaman profil perusahaan
- ✅ Daftar lowongan milik perusahaan
- ✅ Form buat lowongan baru
- ✅ Form edit lowongan
- ✅ Halaman daftar pelamar per lowongan
- ✅ Halaman detail profil pelamar

---

### Dashboard Admin
- ✅ Halaman dashboard admin (statistik platform)
- ✅ Halaman kelola lowongan (approve / reject)
- ✅ Halaman kelola pengguna (aktif / nonaktif)
- ✅ Halaman kelola perusahaan (verifikasi / reject)
- ✅ Halaman kelola kategori lowongan

---

## Tech Stack

| Teknologi | Keterangan |
|-----------|-----------|
| PHP ^8.2 | Backend |
| Laravel ^12.0 | Framework |
| Laravel Breeze | Autentikasi |
| TailwindCSS | Styling (via Vite) |
| MySQL | Database (development) |
| Docker | Tersedia |

---

## Cara Menjalankan

### Docker (Direkomendasikan)

```bash
cd src 
docker compose up --build
```

Buka `http://localhost:8000`

### Lokal

```bash
cd src
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
npm install
npm run dev
```

---

## Dokumentasi

Lihat folder [`docs/`](./docs/) untuk:
- [Problem Statement](./docs/Problem-statemen.md)
- [User Stories](./docs/User-stories.md)
- [Product Backlog](./docs/Backlog.md)
- [SRS](./docs/srs.md)
- [ERD](./docs/erd.png)
- [Data Dictionary](./docs/data_dictionary.md)
- [Team Contract](./docs/team-contract.md)
- [User Manual](./docs/user-manual.md)
