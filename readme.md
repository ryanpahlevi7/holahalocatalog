<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Instalasi Menggunakan Laragon

Untuk menjalankan aplikasi ini maka ada beberapa yang perlu di persiapkkan, diantaranya :

- Laragon sebagai web server, dapat di unduh pada link berikut [Laragon](https://laragon.org/download/). atau dengan menjalankan php artisan serve pada cmd
- Clone projek pada direktori www Laragon. Dapat disesuaikan dimana anda menginstall.
- Download komponen Laravel dengan perintah conposer install pada cmd saat berada di direktori projek
- Konfigurasi .env 
- Persiapkan database pada MySQL
- Jalankan php artisan key:generate 
- Jalankan php artisan migrate untuk migrasi database
- Jalankan php artisan db:seed untuk seeding
- Lalu jalankan php artisan storage:link untuk me link kan folder storage dengan public untuk load foto. Jika tidak menjalankan perintah tersebut maka foto tidak akan bisa di load.
- Setelah semua langkah selesai maka HolaHalo Catalog dapat dijalankan di web browser dengan mengetikkan link sesuai konfigurasi vhost di laragon atau denga php artisan serve dengan mengetikkan url localhost:8000
- Untuk login ke dalam menu admin, sudah disediakan email dan password default yaitu: email: admin@email.com pass: admin

