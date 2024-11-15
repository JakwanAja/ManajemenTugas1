# Aplikasi Manajemen Tugas

Aplikasi ini merupakan aplikasi Manajemen Tugas (Task Manager) berbasis web yang dibuat dengan framework Laravel 10. Aplikasi ini adalah project untuk menyelesaikan tugas mata kuliah pemrograman berbasis web II Program studi TRPL Politeknik Negeri Madiun.

Login default : 
- Email : admin1@gmail.com
- Password : 12345678
Atau :
- login with google

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




