# Sprint Retrospective Report

**Tanggal:** 5 Juli 2026  
**Proyek:** JOBHUB  
**Iterasi / Rilis:** Versi 1.0.0  

---

## 1. Ringkasan Eksekutif (Executive Summary)
Retrospektif ini mengevaluasi siklus pengembangan yang berujung pada perilisan platform JOBHUB v1.0.0. Fokus utama pada iterasi ini adalah membangun fondasi fitur inti, meliputi autentikasi *multi-role*, manajemen lowongan komprehensif, dan modernisasi antarmuka pengguna (UI). Secara keseluruhan, iterasi berjalan sangat produktif dan berhasil memenuhi ekspektasi fungsionalitas utama, sekaligus memberikan wawasan terkait area teknis yang perlu dioptimasi ke depannya.

## 2. Pencapaian & Keberhasilan (What Went Well)
*   **Arsitektur Keamanan Terpusat:** Berhasil mengimplementasikan sistem autentikasi *multi-role* (Admin, Perusahaan, Pelamar) yang solid, memastikan privasi data dan batasan akses yang terstruktur.
*   **Pengiriman Fitur Inti (MVP):** Modul krusial seperti manajemen profil (terintegrasi dengan fitur unggah dokumen/logo) dan alur manajemen lowongan pekerjaan berjalan stabil sesuai spesifikasi teknis.
*   **Modernisasi Antarmuka (UI/UX):** Proses *refactoring* tampilan menggunakan kerangka kerja Tailwind CSS dan integrasi Heroicons SVG berhasil menghasilkan UX yang jauh lebih modern, konsisten, dan responsif.
*   **Otomatisasi Alur Rekrutmen:** Integrasi alur rekam jejak kandidat yang komprehensif memudahkan perusahaan dalam mengelola status pelamar (persetujuan/penolakan) secara efisien.
*   **Optimasi Pengalaman Pengguna:** Restrukturisasi presentasi data (migrasi ke format tabel informatif) dan penyederhanaan formulir registrasi sukses mengurangi friksi pada fase *onboarding* pengguna.

## 3. Evaluasi & Area Perbaikan (What Could Be Improved)
*   **Anomali Otorisasi Rute:** Sempat teridentifikasi adanya celah otorisasi silang antar-*role* pada beberapa rute *backend* terbatas. Hal ini mengindikasikan perlunya pengetatan lapisan *middleware*.
*   **Penanganan *Exception* Validasi:** Sistem validasi unggah dokumen (CV/Gambar) di awal fase pengembangan kurang adaptif dalam menangani format tak terdukung, sehingga respons *error* kurang informatif bagi *end-user*.
*   **Konsistensi Tata Letak *Mobile*:** Ditemukan isu stabilitas pada navigasi *sidebar* saat diakses melalui perangkat *mobile*, yang menandakan perlunya peningkatan kedisiplinan dalam menerapkan metodologi *mobile-first testing*.

## 4. Tindak Lanjut Strategis (Action Items)
- [ ] **Implementasi *Automated Testing*:** Menyusun *Unit Test* dan *Feature Test* komprehensif (berbasis PHPUnit) untuk mengunci keamanan rute dan memastikan setiap *middleware role* berfungsi absolut tanpa regresi.
- [ ] **Standardisasi Komponen UI/UX:** Membangun *reusable component* khusus untuk formulir unggah berkas yang sudah dilengkapi dengan validasi ukuran dan format secara berlapis (*front-end* & *back-end*), beserta pesan *error* yang deskriptif.
- [ ] **Penerapan *Mobile-First QA*:** Mewajibkan fase pengujian responsivitas pada berbagai resolusi perangkat seluler sebelum modul baru disetujui masuk ke tahap *production*.
- [ ] **Pemantauan Metrik Registrasi:** Melakukan *monitoring* terhadap stabilitas sistem verifikasi akun otomatis yang baru diimplementasikan guna memastikan pengalaman pengguna baru tetap optimal.
