# Changelog

Semua perubahan yang signifikan pada proyek JOBHUB didokumentasikan pada file ini.

## [v1.0.0] - 2026-06-27

### Added
- **Autentikasi Multi-Role**: Sistem login dan registrasi khusus untuk Administrator, Perusahaan, dan Pencari Kerja.
- **Manajemen Lowongan**: Perusahaan dapat membuat dan mengelola lowongan, dengan validasi/persetujuan dari Administrator.
- **Alur Pelamaran Kerja**: Pencari kerja dapat mencari, memfilter, menyimpan (*bookmark*), dan melamar lowongan pekerjaan.
- **Manajemen Profil**: Pengaturan profil lengkap, termasuk unggah logo perusahaan, serta foto profil dan CV untuk pencari kerja.
- **Dashboard Terdedikasi**: Antarmuka khusus untuk tiap *role* dengan ringkasan statistik (total pelamar, lowongan aktif, dll).
- **UI/UX Modern**: Desain responsif berbasis Tailwind CSS dengan implementasi ikon SVG.

### Fixed
- Menutup celah keamanan otorisasi *middleware* untuk mencegah akses rute antar-*role*.
- Memperbaiki penanganan *error* pada saat validasi format dokumen (CV dan gambar) saat diunggah.

### Changed
- Menyederhanakan formulir registrasi awal untuk mempercepat proses *onboarding* pengguna baru.
- Merombak presentasi daftar pelamar menggunakan format tabel agar mempermudah perusahaan melakukan analisis kandidat.
