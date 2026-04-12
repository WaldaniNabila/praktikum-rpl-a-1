# User Stories — JOBHUB

## Aktor / Role Pengguna

### 1. Pelamar
Pengguna yang mencari dan melamar pekerjaan melalui platform JOBHUB.

### 2. Perusahaan
Pengguna yang memposting lowongan pekerjaan dan mengelola proses rekrutmen.

### 3. Admin
Pengelola platform yang memverifikasi konten dan menjaga kualitas layanan JOBHUB.

---

## User Stories

### Pelamar

---

**US-01 — Registrasi akun pelamar**

> Sebagai pelamar, saya ingin mendaftar akun baru agar dapat menggunakan fitur lengkap JOBHUB.

**Acceptance Criteria:**

- **Given** saya belum memiliki akun JOBHUB,
- **When** saya mengisi form registrasi dengan nama, email, dan password yang valid lalu klik "Daftar",
- **Then** akun saya berhasil dibuat dan saya diarahkan ke halaman dashboard pelamar.

---

**US-02 — Login ke akun**

> Sebagai pelamar, saya ingin masuk ke akun saya agar dapat mengakses fitur yang membutuhkan autentikasi.

**Acceptance Criteria:**

- **Given** saya sudah memiliki akun JOBHUB,
- **When** saya memasukkan email dan password yang benar lalu klik "Masuk",
- **Then** saya berhasil login dan diarahkan ke dashboard sesuai role saya.

---

**US-03 — Mencari lowongan kerja**

> Sebagai pelamar, saya ingin mencari lowongan berdasarkan posisi dan lokasi agar dapat menemukan pekerjaan yang sesuai.

**Acceptance Criteria:**

- **Given** saya berada di halaman lowongan,
- **When** saya mengetikkan kata kunci posisi atau lokasi di search bar lalu klik "Cari loker",
- **Then** sistem menampilkan daftar lowongan yang relevan dengan kata kunci tersebut.

---

**US-04 — Melihat detail lowongan**

> Sebagai pelamar, saya ingin melihat detail lengkap lowongan agar dapat memutuskan apakah saya akan melamar.

**Acceptance Criteria:**

- **Given** saya melihat daftar lowongan,
- **When** saya mengklik salah satu lowongan,
- **Then** sistem menampilkan halaman detail berisi deskripsi pekerjaan, persyaratan, gaji, dan informasi perusahaan.

---

**US-05 — Melamar pekerjaan**

> Sebagai pelamar, saya ingin melamar pekerjaan secara online agar proses lamaran lebih mudah dan cepat.

**Acceptance Criteria:**

- **Given** saya sudah login dan berada di halaman detail lowongan,
- **When** saya mengklik tombol "Lamar" dan mengisi form lamaran,
- **Then** lamaran saya terkirim dan status lamaran muncul di dashboard sebagai "Menunggu".

---

**US-06 — Melacak status lamaran**

> Sebagai pelamar, saya ingin memantau status lamaran saya agar mengetahui perkembangan proses rekrutmen.

**Acceptance Criteria:**

- **Given** saya sudah mengirimkan lamaran,
- **When** saya membuka halaman "Lamaran Saya" di dashboard,
- **Then** sistem menampilkan daftar lamaran beserta status terkini (Menunggu / Diproses / Diterima / Ditolak).

---

### Perusahaan

---

**US-07 — Memposting lowongan kerja**

> Sebagai perusahaan, saya ingin memposting lowongan baru agar dapat menjangkau kandidat yang tepat.

**Acceptance Criteria:**

- **Given** saya sudah login sebagai perusahaan dan akun sudah diverifikasi,
- **When** saya mengisi form posting lowongan (judul, deskripsi, syarat, gaji) lalu klik "Posting",
- **Then** lowongan dikirim ke admin untuk ditinjau dan status lowongan menjadi "Menunggu Persetujuan".

---

**US-08 — Mengelola status pelamar**

> Sebagai perusahaan, saya ingin mengubah status lamaran kandidat agar proses seleksi dapat berjalan teratur.

**Acceptance Criteria:**

- **Given** saya berada di halaman daftar pelamar untuk lowongan tertentu,
- **When** saya mengubah status lamaran kandidat menjadi "Diterima" atau "Ditolak",
- **Then** status lamaran kandidat diperbarui dan kandidat mendapatkan notifikasi perubahan status.

---

### Admin

---

**US-09 — Menyetujui lowongan**

> Sebagai admin, saya ingin meninjau dan menyetujui lowongan yang diposting perusahaan agar konten platform tetap terpercaya.

**Acceptance Criteria:**

- **Given** ada lowongan baru yang menunggu persetujuan,
- **When** saya mengklik "Approve" pada lowongan tersebut,
- **Then** lowongan ditayangkan di halaman publik dan perusahaan mendapat notifikasi bahwa lowongan telah disetujui.

---

**US-10 — Mengelola akun pengguna**

> Sebagai admin, saya ingin dapat menonaktifkan akun pengguna yang melanggar aturan agar platform tetap aman.

**Acceptance Criteria:**

- **Given** saya berada di halaman manajemen user,
- **When** saya mengklik "Nonaktifkan" pada akun yang melanggar,
- **Then** akun tersebut tidak dapat login dan muncul pesan bahwa akun telah dinonaktifkan.
