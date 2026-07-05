# AI-Usage Log

| Tanggal | Anggota | Tool AI | Ringkasan Prompt | Ringkasan Output | Modifikasi / Verifikasi |
| :--- | :--- | :--- | :--- | :--- | :--- |
| 2026-05-20 | Argya Seno | Gemini / ChatGPT | Buatkan class *Model* Laravel beserta fungsi relasi antar tabel (User, Perusahaan, Lowongan, Pelamar) berdasarkan skema ERD | *File Model* Laravel lengkap dengan fungsi relasi `hasMany`, `belongsTo`, dll | Mengecek kebenaran *foreign key* dan memastikan relasi berfungsi saat *query* |
| 2026-05-20 | Argya Seno | Gemini / ChatGPT | Buatkan *database seeder* lengkap dengan library Faker untuk *generate* puluhan data *dummy* perusahaan dan lowongan | *Script* Seeder & Factory yang terstruktur untuk menghasilkan data acak | Menjalankan `php artisan db:seed` dan memastikan struktur *database* terisi benar |
| 2026-05-21 | Argya Seno | Gemini / ChatGPT | Bantu *scaffold* (buatkan kerangka) *Controller* dan *Routes* untuk API manajemen lowongan dan profil (CRUD lengkap) | Kumpulan *file controller* dengan fungsi CRUD dan konfigurasi *routing* di `api.php` | Menyesuaikan *namespace*, menambahkan validasi *request*, dan diuji via Postman |
| 2026-05-23 | Argya Seno | Gemini / ChatGPT | Buatkan *custom middleware* Laravel yang kompleks untuk membatasi hak akses spesifik per-*role* (Admin, Perusahaan, Pelamar) | *File* `RoleMiddleware.php` dengan *logic* percabangan *role* *user* | Mendaftarkan *middleware* di `Kernel.php` dan memblokir akses *dashboard* yang tidak sah |
| 2026-06-24 | Argya Seno | Gemini / ChatGPT | Buatkan `JobHelper` untuk ekstraksi algoritma *backend*, beserta *Unit Test* komprehensif menggunakan PHPUnit | File `JobHelper.php` dan ratusan baris skenario pengujian di `JobHelperTest.php` | Menjalankan `php artisan test`, memperbaiki *assertions* yang gagal, dan *refactor controller* |

