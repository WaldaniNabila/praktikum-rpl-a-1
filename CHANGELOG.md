# Changelog

Semua perubahan yang signifikan pada proyek JOBHUB didokumentasikan pada file ini.

## [v1.0.0] - 2026-06-27

### Added
- Tambahkan fitur autentikasi multi-role (Admin, Perusahaan, dan Pelamar).
- Tambahkan fitur manajemen profil perusahaan terintegrasi dengan unggahan logo.
- Tambahkan fitur manajemen profil pelamar beserta fasilitas unggah CV dan pas foto.
- Tambahkan halaman dashboard khusus untuk masing-masing role dengan ringkasan data analitik.
- Tambahkan fitur pembuatan, pengeditan, dan publikasi lowongan pekerjaan oleh perusahaan.
- Tambahkan sistem pencarian dan filter lowongan pekerjaan berdasarkan kategori, tipe pekerjaan, dan lokasi.
- Tambahkan alur pelamaran kerja yang memungkinkan perusahaan melacak, menerima, atau menolak kandidat.
- Tambahkan fitur verifikasi persetujuan lowongan pekerjaan dan akun perusahaan baru oleh Admin.
- Tambahkan desain UI/UX responsif menggunakan Tailwind CSS dengan ikon SVG profesional.

### Fixed
- Perbaiki masalah otorisasi di mana pengguna dengan role berbeda dapat mengakses rute yang tidak diizinkan.
- Perbaiki bug validasi saat mengunggah file CV atau gambar yang formatnya tidak didukung.
- Perbaiki tata letak responsif pada tampilan mobile agar menu navigasi sidebar dapat diakses dengan baik.

### Changed
- Ubah keseluruhan ikon aplikasi dari penggunaan emoji teks menjadi SVG Heroicons agar terlihat lebih profesional.
- Ubah format penampilan daftar pelamar dari bentuk grid menjadi bentuk tabel untuk memudahkan pembacaan data oleh perusahaan.
- Hapus kolom input data sosial media dari pendaftaran awal untuk mempercepat proses registrasi akun baru (dipindahkan ke pengaturan profil).
