# DATA DICTIONARY

## Tabel USERS
|     Tabel     |      Kolom      |   Tipe Data   |           Constraint           |             Keterangan             |
|---------------|-----------------|---------------|--------------------------------|------------------------------------|
| users         | id              | INT           | PK, AUTO_INCREMENT             | ID unik pengguna                   |
| users         | name            | VARCHAR(100)  | NOT NULL                       | Nama pengguna                      |
| users         | email           | VARCHAR(255)  | UNIQUE, NOT NULL               | Email untuk login                  |
| users         | password        | VARCHAR(255)  | NOT NULL                       | Password (hasheed, misal bcrypt)   |
| users         | role            | ENUM          | NOT NULL                       | Peran user (admin/user/company)    |
| users         | phone           | VARCHAR(20)   | NULL                           | Nomor telepon pengguna             |
| users         | cv-path         | VARCHAR(255)  | NULL                           | Path file CV                       |
| users         | created_at      | TIMESTAMP     | DEFAULT CURRENT-TIMESTAMP      | Waktu pembuatan akun               |

## Tabel COMPANIES
|     Tabel     |      Kolom      |   Tipe Data   |           Constraint           |             Keterangan             |
|---------------|-----------------|---------------|--------------------------------|------------------------------------|
| companies     | id              | INT           | PK, AUTO_INCREMENT             | ID unik perusahaan                 |
| companies     | user_id         | INT           | FK --> users.id, NOT NULL      | Relasi ke pemilik akun             |
| companies     | name            | VARCHAR(150)  | NOT NULL                       | Nama perusahaan                    |
| companies     | industry        | VARCHAR(100)  | NULL                           | Bidang industri                    |
| companies     | description     | TEXT          | NULL                           | Deskripsi perusahaan               |
| companies     | logo_path       | VARCHAR(255)  | NULL                           | Path logo perusahaan               |
| companies     | status          | ENUM          | NOT NULL                       | Status perusahaan                  |
| companies     | created_at      | TIMESTAMP     | DEFAULT CURRENT_TIMESTAMP      | Waktu dibuat                       |

## Tabel CATEGORIES
|     Tabel     |      Kolom      |   Tipe Data   |           Constraint           |             Keterangan             |
|---------------|-----------------|---------------|--------------------------------|------------------------------------|
| categories    | id              | INT           | PK, AUTO_INCREMENT             | ID kategori                        |
| categories    | name            | VARCHAR(100)  | NOT NULL                       | Nama kategori                      |
| categories    | slug            | VARCHAR(100)  | UNIQUE, NOT NULL               | URL slug kategori                  |

## Tabel JOBS
|     Tabel     |      Kolom      |   Tipe Data   |           Constraint           |             Keterangan             |
|---------------|-----------------|---------------|--------------------------------|------------------------------------|
| jobs          | id              | INT           | PK, AUTO_INCREMENT             | ID pekerjaan                       |
| jobs          | company_id      | INT           | FK --> companies.id, NOT NULL  | Relasi ke perusahaan               |
| jobs          | category_id     | INT           | FK --> categories.id, NOT NULL | Relasi ke kategori                 |
| jobs          | title           | VARCHAR(150)  | NOT NULL                       | Judul pekerjaan                    |
| jobs          | description     | TEXT          | NOT NULL                       | Deskripsi pekerjaan                |
| jobs          | requirements    | TEXT          | NULL                           | Persyaratan pekerjaan              |
| jobs          | location        | VARCHAR(100)  | NULL                           | Lokasi kerja                       |
| jobs          | employment_type | ENUM          | NOT NULL                       | Tipe pekerjaan (full-time, dll)    |
| jobs          | work_type       | ENUM          | NOT NULL                       | Tipe kerja (remote/on-site)        |
| jobs          | salary_min      | INT           | NULL                           | Gaji minimum                       |
| jobs          | salary_max      | INT           | NULL                           | Gaji maksimum                      |
| jobs          | status          | ENUM          | NOT NULL                       | Status pekerjaan                   |
| jobs          | is_open         | BOOLEAN       | DEFAULT TRUE                   | Apakah lowongan masih dibuka       |
| jobs          | created_at      | TIMESTAMP     | DEFAULT CURRENT_TIMESTAMP      | Waktu dibuat                       |

## Tabel APPLICATIONS
|     Tabel     |      Kolom      |   Tipe Data   |           Constraint           |             Keterangan             |
|---------------|-----------------|---------------|--------------------------------|------------------------------------|
| applications  | id              | INT           | PK, AUTO_INCREMENT             | ID lamaran                         |
| applications  | user_id         | INT           | FK --> users.id, NOT NULL      | Pelamar                            |
| applications  | job_id          | INT           | FK --> jobs.id, NOT NULL       | Lowongan yang dilamar              |
| applications  | cover_letter    | TEXT          | NULL                           | Surat lamaran                      |
| applications  | cv_path         | VARCHAR(255)  | NULL                           | Path CV                            |
| applications  | status          | ENUM          | NOT NULL                       | Status lamaran                     |
| applicatons   | created_at      | TIMESTAMP     | DEFAULT CURRENT_TIMESTAMP      | Waktu melamar                      |

## Tabel BOOKMARKS
|     Tabel     |      Kolom      |   Tipe Data   |           Constraint           |             Keterangan             |
|---------------|-----------------|---------------|--------------------------------|------------------------------------|
| bookmarks     | id              | INT           | PK, AUTO_INCREMENT             | ID bookmark                        |
| bookmarks     | user_id         | INT           | FK --> users.id, NOT NULL      | Pengguna                           |
| bookmarks     | job_id          | INT           | FK --> jobs.id, NOT NULL       | Lowongan yang disimpan             |
| bookmarks     | created_at      | TIMESTAMP     | DEFAULT CURRENT_TIMESTAMP      | Waktu bookmark dibuat              |
