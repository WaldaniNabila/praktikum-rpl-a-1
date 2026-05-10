# Data Dictionary — JOBHUB
# Platform Pencarian Lowongan Kerja

## Tabel: users

> Menyimpan data autentikasi semua pengguna (job seeker, company, admin)

| Kolom | Tipe Data | Constraint | Keterangan |
|-------|-----------|------------|------------|
| id | INT | PK, AUTO_INCREMENT, NOT NULL | ID unik pengguna |
| name | VARCHAR(100) | NOT NULL | Nama lengkap pengguna |
| email | VARCHAR(255) | UNIQUE, NOT NULL | Email untuk login |
| password | VARCHAR(255) | NOT NULL | Password terenkripsi (bcrypt) |
| role | VARCHAR(20) | NOT NULL, DEFAULT 'job_seeker' | Role pengguna: job_seeker, company, admin |
| created_at | TIMESTAMP | NOT NULL, DEFAULT CURRENT_TIMESTAMP | Waktu akun dibuat |
| updated_at | TIMESTAMP | NOT NULL, DEFAULT CURRENT_TIMESTAMP | Waktu akun diupdate |

---

## Tabel: job_seekers

> Menyimpan data spesifik pelamar kerja, berelasi 1:1 dengan tabel users

| Kolom | Tipe Data | Constraint | Keterangan |
|-------|-----------|------------|------------|
| id | INT | PK, AUTO_INCREMENT, NOT NULL | ID unik profil pelamar |
| user_id | INT | FK → users.id, UNIQUE, NOT NULL | Referensi ke akun user (1:1) |
| phone | VARCHAR(20) | NULL | Nomor HP pelamar |
| profile_picture | VARCHAR(255) | NULL | Path foto profil di server |
| cv_path | VARCHAR(255) | NULL | Path file CV di server |
| description | TEXT | NULL | Bio/deskripsi singkat pelamar |
| created_at | TIMESTAMP | NOT NULL, DEFAULT CURRENT_TIMESTAMP | Waktu profil dibuat |
| updated_at | TIMESTAMP | NOT NULL, DEFAULT CURRENT_TIMESTAMP | Waktu profil diupdate |

---

## Tabel: companies

> Menyimpan data spesifik perusahaan, berelasi 1:1 dengan tabel users

| Kolom | Tipe Data | Constraint | Keterangan |
|-------|-----------|------------|------------|
| id | INT | PK, AUTO_INCREMENT, NOT NULL | ID unik perusahaan |
| user_id | INT | FK → users.id, UNIQUE, NOT NULL | Referensi ke akun user (1:1) |
| name | VARCHAR(150) | NOT NULL | Nama perusahaan |
| industry | VARCHAR(100) | NOT NULL | Bidang usaha perusahaan |
| description | TEXT | NULL | Deskripsi singkat perusahaan |
| logo_path | VARCHAR(255) | NULL | Path file logo di server |
| phone | VARCHAR(20) | NULL | Nomor telepon perusahaan |
| address | TEXT | NULL | Alamat lengkap perusahaan |
| status | VARCHAR(20) | NOT NULL, DEFAULT 'pending' | Status verifikasi: pending, verified, rejected |
| created_at | TIMESTAMP | NOT NULL, DEFAULT CURRENT_TIMESTAMP | Waktu perusahaan daftar |
| updated_at | TIMESTAMP | NOT NULL, DEFAULT CURRENT_TIMESTAMP | Waktu profil diupdate |

---

## Tabel: categories

> Menyimpan kategori lowongan kerja

| Kolom | Tipe Data | Constraint | Keterangan |
|-------|-----------|------------|------------|
| id | INT | PK, AUTO_INCREMENT, NOT NULL | ID unik kategori |
| name | VARCHAR(100) | NOT NULL | Nama kategori (contoh: Teknologi & IT) |
| slug | VARCHAR(100) | UNIQUE, NOT NULL | Versi URL-friendly nama kategori (contoh: teknologi-it) |

---

## Tabel: jobs

> Menyimpan data lowongan kerja yang diposting perusahaan

| Kolom | Tipe Data | Constraint | Keterangan |
|-------|-----------|------------|------------|
| id | INT | PK, AUTO_INCREMENT, NOT NULL | ID unik lowongan |
| company_id | INT | FK → companies.id, NOT NULL | Referensi ke perusahaan yang memposting |
| category_id | INT | FK → categories.id, NOT NULL | Referensi ke kategori lowongan |
| title | VARCHAR(150) | NOT NULL | Judul posisi pekerjaan |
| description | TEXT | NOT NULL | Deskripsi lengkap pekerjaan |
| requirements | TEXT | NOT NULL | Persyaratan yang dibutuhkan pelamar |
| location | VARCHAR(100) | NOT NULL | Kota atau lokasi kerja |
| employment_type | VARCHAR(20) | NOT NULL | Tipe: full-time, part-time, contract, internship |
| work_type | VARCHAR(20) | NOT NULL | Tipe lokasi: remote, on-site, hybrid |
| salary_min | INT | NULL | Gaji minimum dalam rupiah |
| salary_max | INT | NULL | Gaji maksimum dalam rupiah |
| status | VARCHAR(20) | NOT NULL, DEFAULT 'pending' | Status: pending, approved, rejected |
| is_open | BOOLEAN | NOT NULL, DEFAULT TRUE | Status lowongan masih buka atau sudah tutup |
| created_at | TIMESTAMP | NOT NULL, DEFAULT CURRENT_TIMESTAMP | Waktu lowongan diposting |
| updated_at | TIMESTAMP | NOT NULL, DEFAULT CURRENT_TIMESTAMP | Waktu lowongan diupdate |

---

## Tabel: applications

> Menyimpan data lamaran yang dikirim pelamar ke lowongan tertentu

| Kolom | Tipe Data | Constraint | Keterangan |
|-------|-----------|------------|------------|
| id | INT | PK, AUTO_INCREMENT, NOT NULL | ID unik lamaran |
| job_seeker_id | INT | FK → job_seekers.id, NOT NULL | Referensi ke profil pelamar |
| job_id | INT | FK → jobs.id, NOT NULL | Referensi ke lowongan yang dilamar |
| cover_letter | TEXT | NULL | Surat lamaran yang ditulis pelamar |
| cv_path | VARCHAR(255) | NULL | Path file CV yang diupload saat melamar |
| status | VARCHAR(20) | NOT NULL, DEFAULT 'waiting' | Status: waiting, process, accepted, rejected |
| created_at | TIMESTAMP | NOT NULL, DEFAULT CURRENT_TIMESTAMP | Waktu lamaran dikirim |
| updated_at | TIMESTAMP | NOT NULL, DEFAULT CURRENT_TIMESTAMP | Waktu status lamaran diupdate |

---

## Tabel: bookmarks

> Menyimpan lowongan yang di-bookmark oleh pelamar

| Kolom | Tipe Data | Constraint | Keterangan |
|-------|-----------|------------|------------|
| id | INT | PK, AUTO_INCREMENT, NOT NULL | ID unik bookmark |
| job_seeker_id | INT | FK → job_seekers.id, NOT NULL | Referensi ke profil pelamar |
| job_id | INT | FK → jobs.id, NOT NULL | Referensi ke lowongan yang disimpan |
| created_at | TIMESTAMP | NOT NULL, DEFAULT CURRENT_TIMESTAMP | Waktu lowongan disimpan |
