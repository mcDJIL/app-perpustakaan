# Aplikasi Perpustakaan

Aplikasi Perpustakaan adalah aplikasi web untuk membantu pengelolaan data perpustakaan secara lebih terstruktur. Tujuannya adalah memudahkan pengembangan fitur seperti pencatatan koleksi buku, data pengguna, serta proses peminjaman dan pengembalian buku.

## Menjalankan Secara Lokal

1. Pastikan PHP 8.2+, Composer, Node.js, dan npm telah terpasang.
2. Salin `.env.example` menjadi `.env`, lalu sesuaikan pengaturan database pada file tersebut.
3. Jalankan `composer run setup` untuk memasang dependensi, membuat application key, menjalankan migrasi, dan membangun aset frontend.
4. Jalankan `php artisan serve`, kemudian buka alamat yang ditampilkan Laravel pada browser.

## Pemahaman MVC
### Model
`Model adalah bagian yang mengelola data dan aturan bisnis aplikasi, misalnya data pengguna atau buku di database.` 
### View
`View adalah tampilan yang dilihat pengguna dan bertugas menyajikan data dengan jelas.` 
### Controller
`Controller menjadi penghubung yang menerima permintaan, memprosesnya melalui Model, lalu menentukan View atau respons yang dikembalikan.`
