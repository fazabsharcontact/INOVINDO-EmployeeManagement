# Inovindo Employee Management System

Aplikasi manajemen pegawai berbasis Laravel yang dikembangkan 
untuk PT. INOVINDO. Aplikasi ini dibangun menggunakan arsitektur 
MVC dan mencakup berbagai kebutuhan operasional pengelolaan 
sumber daya manusia perusahaan.

## Fitur Utama

- **Kepegawaian** — pengelolaan data pegawai, jabatan, divisi, dan tim
- **Presensi** — pencatatan kehadiran harian pegawai beserta rekap bulanan
- **Penggajian** — pengelolaan gaji pokok, tunjangan, potongan, dan slip gaji
- **Tugas** — pemberian dan pemantauan tugas antar pegawai
- **Pengumuman** — penyebaran informasi dari admin ke pegawai
- **Cuti** — pengajuan dan persetujuan cuti tahunan pegawai
- **Meeting** — penjadwalan rapat dan daftar peserta
- **Pelaporan** — laporan performa kehadiran dan kinerja pegawai

## Tech Stack

- **Framework** — Laravel (PHP 8.x)
- **Database** — MySQL
- **Frontend** — Blade Template, Bootstrap
- **PDF Generation** — DomPDF
- **Authentication** — Laravel Breeze

## Role Pengguna

- **Admin** — akses penuh ke seluruh modul pengelolaan
- **Pegawai** — akses terbatas ke data pribadi, presensi, gaji, dan tugas

## Instalasi

```bash
git clone https://github.com/username/inovindo-employee-management
cd inovindo-employee-management
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan serve
```

## Catatan

Aplikasi ini merupakan objek penelitian skripsi yang berfokus 
pada analisis dan perbaikan kualitas kode menggunakan pendekatan 
refactoring arsitektur berbasis AI Agent. Pengukuran kualitas 
dilakukan terhadap 28 modul controller menggunakan metrik 
Maintainability Index (MI) dan Reusability Index (RI).