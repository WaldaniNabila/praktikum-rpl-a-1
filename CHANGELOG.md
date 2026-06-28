# Changelog

Semua perubahan yang signifikan pada proyek JOBHUB didokumentasikan pada file ini.

## [v1.0.0] - 2026-06-27

### Added
- Implementasi sistem autentikasi *multi-role* (Admin, Perusahaan, dan Pelamar).
- Penambahan modul manajemen profil perusahaan yang terintegrasi dengan fitur unggah logo.
- Penambahan modul manajemen profil pelamar yang dilengkapi fasilitas unggah dokumen CV dan pas foto.
- Pembuatan antarmuka *dashboard* terdedikasi untuk masing-masing *role* beserta ringkasan data analitik.
- Pengembangan fitur pengelolaan lowongan pekerjaan (pembuatan, pengeditan, dan publikasi) untuk pihak perusahaan.
- Integrasi sistem pencarian dan filtrasi lowongan pekerjaan berdasarkan kategori, tipe pekerjaan, dan lokasi.
- Penerapan alur rekrutmen komprehensif yang memungkinkan perusahaan untuk melacak, menerima, maupun menolak kandidat.
- Implementasi sistem validasi oleh Admin untuk persetujuan penayangan lowongan pekerjaan dan verifikasi akun perusahaan baru.
- Peningkatan kualitas UI/UX yang responsif menggunakan *framework* Tailwind CSS, diiringi dengan penggunaan aset ikon SVG.

### Fixed
- Resolusi anomali otorisasi untuk mencegah akses silang *role* pada rute yang dibatasi.
- Perbaikan sistem validasi pada modul unggah dokumen, khususnya dalam menangani penolakan format CV atau gambar yang tidak didukung.
- Optimalisasi tata letak responsif pada perangkat *mobile* guna memastikan stabilitas navigasi menu *sidebar*.

### Changed
- Migrasi aset visual aplikasi dari emoji teks ke *library* SVG Heroicons guna meningkatkan konsistensi dan estetika antarmuka.
- Restrukturisasi presentasi data pelamar dari format *grid* menjadi format tabel untuk mempermudah analisis data oleh pihak perusahaan.
- Penyederhanaan formulir registrasi awal dengan merelokasi input data media sosial ke halaman pengaturan profil demi mempercepat pembuatan akun.
- Optimalisasi mekanisme registrasi dengan menerapkan verifikasi akun otomatis guna mempercepat proses *onboarding* pengguna baru.
