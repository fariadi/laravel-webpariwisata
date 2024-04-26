## Persiapan Aplikasi

1. Memiliki CLI/Command Line Interface berupa Command Prompt (CMD) atau Power Shell atau Git Bash (selanjutnya kita sebut terminal).
2. Memiliki Web Server (misal XAMPP) dengan PHP versi 8.1
3. Memiliki aplikasi Composer yang sudah ter-install, cek dengan perintah composer -V melalui terminal.
4. Memiliki koneksi internet (untuk proses installasi).

## Cara Instalsi Aplikasi
1. Clone repository, bisa di download .zip atau dengan perintah git clone seperti ini
```
git clone https://github.com/fariadi/pariwisata.git
```
2. Extract file zip (source code) ke dalam direktori htdocs pada XAMPP, misal htdocs/pariwisata.
3. Melalui terminal, masuk ke direktori aplikasi misal contohnya
```
cd c:/xampp/htdocs/pariwisata
```
4. (Sesuai petunjuk installasi) Pada terminal, berikan perintah
```
composer install
```
Ini memerlukan koneksi internet. Composer akan menginstall dependency paket dari source code tersebut hingga selesai.
5. Setting koneksi database di file .env (DB_DATABASE, DB_USERNAME, DB_PASSWORD).
```
    <br>DB_CONNECTION=mysql
    <br>DB_HOST=localhost
    <br>DB_PORT=3306
    <br>DB_DATABASE=pariwisata
    <br>DB_USERNAME=root
    <br>DB_PASSWORD=
```
6. Impor file databes ke aplikasi database MySQL. file SQL ada di dalam folder aplikasi dengan nama 'pariwisata.sql'
5. Aplikasi bisa dijalankan melalui terminal dengan perintah
```
php artisan serve
```
dan di akses melalui http://localhost:8000/ atau jika menggunakan aplikasi XAMPP dengan mamasukan url misal http://localhost/pariwisata/public/

7. Buat database baru (kosong) pada mysql (via phpmyadmin) dengan nama <b>crud</b>.
8. Duplikat file .env.example, lalu rename menjadi .env.
9. Kembali ke terminal, php artisan key:generate.
11. Jika hanya ingin membuat tabel, jalankan perintah <b>php artisan migrate</b>. Cek di phpmyadmin, seharusnya tabel sudah muncul.
12. Setelah selesai, Jalankan perintah <b>php artisan serve</b> maka dapat diakses dengan http://localhost:8000/
