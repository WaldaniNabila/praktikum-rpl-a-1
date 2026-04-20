# Software Requirements Specification (SRS)
# JOBHUB — Platform Pencarian Lowongan Kerja

---

## 1. Pendahuluan

### 1.1 Tujuan Dokumen
Dokumen SRS ini bertujuan untuk mendeskripsikan kebutuhan fungsional dan non-fungsional dari sistem JOBHUB secara formal dan terstruktur. Dokumen ini menjadi acuan bagi seluruh anggota tim dalam proses pengembangan, pengujian, dan evaluasi sistem.

### 1.2 Ruang Lingkup Sistem
JOBHUB adalah platform berbasis web yang menghubungkan pencari kerja (pelamar) dengan perusahaan yang membuka lowongan pekerjaan. Sistem ini memiliki tiga peran pengguna utama yaitu pelamar, perusahaan, dan admin. Sistem mencakup fitur pencarian lowongan, pengiriman lamaran, pengelolaan lowongan oleh perusahaan, serta moderasi konten oleh admin.

### 1.3 Definisi Istilah

| Istilah | Definisi |
|---------|----------|
| Pelamar | Pengguna yang mencari dan melamar pekerjaan melalui platform |
| Perusahaan | Pengguna yang memposting lowongan dan mengelola rekrutmen |
| Admin | Pengelola platform yang memverifikasi konten dan pengguna |
| Lowongan | Informasi pekerjaan yang diposting oleh perusahaan |
| Lamaran | Pengajuan dari pelamar untuk posisi pekerjaan tertentu |
| MVP | Minimum Viable Product — fitur minimum yang harus ada |
| FR | Functional Requirement — kebutuhan fungsional sistem |
| NFR | Non-Functional Requirement — kebutuhan non-fungsional sistem |

---

## 2. Deskripsi Umum

### 2.1 Perspektif Produk
JOBHUB merupakan sistem baru yang berdiri sendiri (standalone web application) berbasis Laravel framework dengan database MySQL. Sistem diakses melalui browser tanpa perlu instalasi tambahan oleh pengguna.

### 2.2 Fungsi Utama Sistem
- Menampilkan dan memfilter daftar lowongan kerja secara publik
- Mengelola akun pengguna dengan sistem multi-role
- Memfasilitasi proses pengiriman lamaran secara online
- Menyediakan dashboard bagi perusahaan untuk mengelola lowongan
- Menyediakan panel admin untuk moderasi konten platform

### 2.3 Karakteristik Pengguna

| Pengguna | Karakteristik |
|----------|--------------|
| Pelamar | Masyarakat umum yang mencari pekerjaan, familiar dengan penggunaan web |
| Perusahaan | HRD atau rekruter perusahaan yang ingin memposting lowongan |
| Admin | Tim pengelola platform dengan akses penuh ke sistem |

### 2.4 Batasan Sistem
- Sistem hanya tersedia dalam Bahasa Indonesia
- Sistem tidak menyediakan fitur video interview atau chat langsung
- Pembayaran/fitur premium tidak termasuk dalam scope MVP

---

## 3. Kebutuhan Fungsional (Functional Requirements)

**FR-01:** Sistem menyediakan form registrasi bagi pelamar dengan input nama lengkap, email, password, dan nomor HP.  
**Prioritas:** High  
**Ref:** US-01

---

**FR-02:** Sistem menyediakan form registrasi bagi perusahaan dengan input nama perusahaan, bidang usaha, email, dan password, serta mengirimkan notifikasi ke admin untuk proses verifikasi.  
**Prioritas:** High  
**Ref:** US-17

---

**FR-03:** Sistem menyediakan halaman login dengan autentikasi berbasis email dan password, serta mengarahkan pengguna ke dashboard sesuai role masing-masing (pelamar, perusahaan, admin).  
**Prioritas:** High  
**Ref:** US-02

---

**FR-04:** Sistem menampilkan daftar lowongan kerja yang dapat dicari berdasarkan kata kunci posisi dan lokasi, serta difilter berdasarkan kategori, tipe pekerjaan, dan tipe lokasi kerja.  
**Prioritas:** High  
**Ref:** US-03, US-11

---

**FR-05:** Sistem menampilkan halaman detail lowongan yang berisi judul posisi, deskripsi pekerjaan, persyaratan, informasi gaji, tipe pekerjaan, lokasi, dan profil singkat perusahaan.  
**Prioritas:** High  
**Ref:** US-04

---

**FR-06:** Sistem memungkinkan pelamar yang sudah login untuk mengirimkan lamaran pada lowongan yang tersedia, dan menyimpan data lamaran dengan status awal "Menunggu".  
**Prioritas:** High  
**Ref:** US-05

---

**FR-07:** Sistem menampilkan daftar lamaran beserta status terkini (Menunggu / Diproses / Diterima / Ditolak) pada halaman dashboard pelamar.  
**Prioritas:** Medium  
**Ref:** US-06

---

**FR-08:** Sistem menyediakan form posting lowongan bagi perusahaan yang terverifikasi, dengan input judul posisi, deskripsi, persyaratan, gaji, tipe pekerjaan, dan lokasi.  
**Prioritas:** High  
**Ref:** US-07

---

**FR-09:** Sistem memungkinkan admin untuk menyetujui atau menolak lowongan yang diposting perusahaan, dan menayangkan lowongan di halaman publik setelah disetujui.  
**Prioritas:** High  
**Ref:** US-09

---

**FR-10:** Sistem memungkinkan admin untuk mengaktifkan atau menonaktifkan akun pengguna (pelamar maupun perusahaan) melalui panel manajemen user.  
**Prioritas:** Medium  
**Ref:** US-10, US-18

---

## 4. Kebutuhan Non-Fungsional (Non-Functional Requirements)

**NFR-01 (Performance):** Halaman utama (landing page) dan halaman daftar lowongan harus termuat dalam waktu kurang dari 3 detik pada koneksi broadband (≥10 Mbps).

---

**NFR-02 (Security):** Sistem harus mengenkripsi password pengguna menggunakan algoritma bcrypt sebelum disimpan ke database. Seluruh halaman yang membutuhkan autentikasi harus dilindungi middleware sehingga tidak dapat diakses tanpa login.

---

**NFR-03 (Usability):** Antarmuka sistem harus responsif dan dapat digunakan dengan baik pada perangkat desktop (lebar layar ≥ 1280px) maupun tablet (lebar layar ≥ 768px). Setiap form harus menampilkan pesan error yang jelas ketika input tidak valid.

---

**NFR-04 (Availability):** Sistem harus dapat berjalan secara konsisten di lingkungan Docker dengan uptime minimal selama sesi demonstrasi berlangsung tanpa crash atau restart paksa.

---

## 5. Catatan dan Asumsi

### Catatan
- Dokumen ini disusun berdasarkan artefak P2 (problem statement, user stories, dan product backlog) yang telah dibuat sebelumnya
- Kebutuhan fungsional pada dokumen ini mencakup fitur **Must-have** dari product backlog sebagai prioritas utama MVP
- Fitur **Should-have** dan **Could-have** dapat dikembangkan setelah MVP selesai

### Asumsi
- Pengguna diasumsikan memiliki koneksi internet yang stabil untuk mengakses platform
- Perusahaan yang mendaftar diasumsikan adalah entitas bisnis yang sah dan bertanggung jawab atas konten lowongan yang diposting
- Admin diasumsikan selalu tersedia untuk melakukan verifikasi perusahaan dan moderasi lowongan dalam waktu 1x24 jam
- Sistem dikembangkan dan diuji di lingkungan lokal menggunakan Docker Desktop
