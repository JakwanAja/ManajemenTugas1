# Aplikasi Manajemen Tugas
<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

Aplikasi ini merupakan aplikasi Manajemen Tugas (Task Manager) berbasis web yang dibuat dengan framework Laravel 10. Aplikasi ini adalah project untuk menyelesaikan tugas mata kuliah pemrograman berbasis web II Program studi TRPL Politeknik Negeri Madiun.

Login default : 
- Email : admin1@gmail.com
- Password : 12345678

## Instalasi 
Kebutuhan
- PHP 8.1 atau diatasnya
- MySQL (bisa menggunakan XAMPP atau Laragon)
- Composer
- IDE (VS Code, Sublime Text)

Cara Menjalankan 
1. Clone projek ini dengan git bash ```git clone https://github.com/JakwanAja/ManajemenTugas1.git```
2. Konfigurasi nama database di .env sesuai database yang ada (disini saya menggunakan database ```task```)
3. Jalankan Migrasi dan seed
```sh
php artisan migrate:fresh --seed
```
4. Generate key
```sh
php artisan key:generate
```
5. Jalankan aplikasi
```sh
php artisan serv
```
6. Jika ingin mengaktifkan fitur "Login with Google" Tambahkan script di bagian bawah file .env
```sh
GOOGLE_CLIENT_ID="xxx"
GOOGLE_CLIENT_SECRET="xxx"
GOOGLE_CALLBACK="http://127.0.0.1:8000/auth/callback"
```

## Fitur
- Login, Register, Logout
- CRUD Task
- CRUD Kategori
- Dashboard 
- Login with Google

## Alat, Template 
| Plugin | README |
| ------ | ------ |
| Laragon | [https://laragon.org/download/] |
| Composer | [https://getcomposer.org/download/] |
| Laravel | [https://laravel.com/docs/11.x/installation] |
| Modernize |https://themewagon.com/themes/modernize/ |
| Sb Admin 2 | [https://startbootstrap.com/theme/sb-admin-2] |
| Google Cloud | [https://console.cloud.google.com/apis] |

## Informasi Tambahan 
Project ini menggunakan laravel versi 10 jadi pastikan PHP yang terinstal di device adalah php versi 8.1 atau lebih baru. Jika kalian sebelumnya menggunakan PHP versi 8.0 lebih randah, silahkan update composer dan jika belum bisa silahkan update laravel device versi PHP 8.1 https://www.php.net/downloads

## Screenshot
## License
MIT

**Free Software, Hell Yeah!**




