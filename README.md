# REALITA USK
Aplikasi Rekap Lima Tahun Universitas Syiah Kuala

## INSTALLASI
1. Masukkan command berikut: 
```bash
composer install
cp .env-example .env
php artisan key:generate
```
2. Create database baru di phpmyadmin
3. Masukkan database di .env
`DB_DATABASE=`

4. Masukkan command berikut:
```bash
php artisan migrate
php artisan db:seed UserSeeder
php artisan serve
```
