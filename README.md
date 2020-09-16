## How to setup

1. Clone project dengan cara `git clone https://github.com/milhamsuryapratama/online-shop.git`
2. Jalankan `composer install`
3. Duplicate file `.env.example` and ubah nama file menjadi `.env`
4. Pengaturan database
   * `DB_CONNECTION`=mysql
   * `DB_HOST`=127.0.0.1
   * `DB_PORT`=3306
   * `DB_DATABASE`=online-shop
   * `DB_USERNAME`=root
   * `DB_PASSWORD`=secret
5. Pengaturan email di `.env`, ini digunakan untuk mengirim email verifikasi dan notifikasi
    * `MAIL_DRIVER` : smtp
    * `MAIL_HOST` : smtp.mailtrap.io
    * `MAIL_PORT` : 2525
    * `MAIL_USERNAME` : d88353424a9e23
    * `MAIL_PASSWORD` : 73b13322beb99e
6. Pengaturan pusher di `.env`, ini digunakan untuk membuat notifikasi realtime kepada admin ketika terdapat user yang melakukan transaksi. Begitu transaksi berhasil dilakukan, disaat yang sama terdapat notifikasi pada halaman admin dengan munculnya `modal` yang memberikan informasi bahwa terdapat transaksi baru. Berikut pengaturan pusher :
    * `PUSHER_APP_ID` : 1073107
    * `PUSHER_APP_KEY` : 727557e4dca12f7c6c97
    * `PUSHER_APP_SECRET` : af28942c15c925941aae
    * `PUSHER_APP_CLUSTER`  : ap1
7. Ubah `BROADCAST_DRIVER` : log menjadi `BROADCAST_DRIVER` : pusher 
8. Hapus `MAIL_FROM_ADDRESS=null` pada `.env` (jika ada)
7. Jalankan `php artisan key:generate`
8. Jalankan `php artisan migrate` untuk membuat tabel pada database
9. Jalankan `composer dump-autoload`
10. Jalankan `php artisan db:seed` mengisi data pada database
11. Jalankan `php artisan serve` untuk memulai
12. Website berjalan pada `http://localhost:8000`

## Flowchart

<img src="https://github.com/milhamsuryapratama/online-shop/blob/master/public/assets/flowchart/flowchart.jpg"/>

## Login Admin

Admin panel adalah bagian yang bisa digunakan untuk menambah data master seperti data kategori, data produk dan melihat data transaksi dari pengguna.

1. Kunjungi `http://localhost:8000/admin` dan `http://localhost:8000/admin/dashboard` untuk halaman dashboard
2. Login dengan
    * `email` : admin@gmail.com
    * `password` : admin123
    
