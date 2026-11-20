# Skenario Demo Aplikasi Perpustakaan

Dokumen ini berisi urutan langkah demo untuk presentasi/UAS, sesuai skenario Pertemuan 11. Ikuti dari atas ke bawah; setiap langkah mencantumkan aksi dan hasil yang diharapkan.

## Persiapan

1. Pastikan database sudah di-reset dan diisi data demo:

   ```bash
   php artisan migrate:fresh --seed
   ```

2. Jalankan **dua** server di terminal terpisah:

   ```bash
   # Terminal 1 - server utama
   php artisan serve --port=8000

   # Terminal 2 - API internal untuk Dashboard dan Laporan
   php artisan serve --port=8011
   ```

3. Buka `http://127.0.0.1:8000`.

4. Siapkan akun demo:

   | Email | Password | Role |
   | --- | --- | --- |
   | `admin@pens.ac.id` | `password` | admin |
   | `petugas1@pens.ac.id` | `password` | petugas |

5. Siapkan Postman (atau `curl`) untuk demo API. Base URL API: `http://127.0.0.1:8011/api`.

## Alur Demo

### 1. Login

- Buka `http://127.0.0.1:8000/login`.
- Masuk dengan `admin@pens.ac.id` / `password`.
- **Hasil:** diarahkan ke Dashboard (`/`), muncul pesan sukses, dan nama **Bambang Sutrisno** tampil di navbar.

### 2. Tampilkan Dashboard

- Perhatikan tiga kartu statistik: **Total Buku**, **Total Anggota**, **Peminjaman Aktif**.
- **Hasil:** angka terisi sesuai data seeding (20 buku, 15 anggota, dan jumlah peminjaman berstatus `dipinjam`).
- Jelaskan singkat: angka ini diambil lewat `GET /api/stats` dari server port `8011`, bukan query langsung ke database.

### 3. Tambah Kategori

- Buka menu **Kategori** → **+ Tambah Kategori**.
- Isi nama kategori, misalnya `Ensiklopedia`, dan deskripsi singkat.
- Simpan.
- **Hasil:** kategori baru muncul di daftar dengan pesan sukses. (Menu ini hanya tampil untuk role admin.)

### 4. Tambah Buku

- Buka menu **Buku** → **+ Tambah Buku**.
- Isi judul (misalnya `Ensiklopedia Nusantara`), penulis, penerbit, tahun terbit, ISBN (opsional), stok, dan pilih kategori yang baru dibuat.
- Simpan.
- **Hasil:** buku baru muncul di daftar buku. Perhatikan data buku lain sudah bergaya Indonesia (judul, penulis, penerbit).

### 5. Tambah Anggota

- Buka menu **Anggota** → **+ Tambah Anggota**.
- Isi nama, NIM unik (misalnya `5025221001`), email kampus (misalnya `demo@pens.ac.id`), nomor telepon, alamat, dan status `aktif`.
- Simpan.
- **Hasil:** anggota baru muncul di daftar anggota.

### 6. Buat Peminjaman

- Buka menu **Peminjaman** → **+ Tambah Peminjaman**.
- Pilih anggota yang baru dibuat.
- Isi tanggal pinjam (hari ini) dan tanggal kembali (misalnya 7 hari ke depan).
- Centang satu atau beberapa buku.
- Simpan.
- **Hasil:** transaksi baru muncul di daftar peminjaman dengan status `dipinjam`, petugas tercatat otomatis dari akun yang login.

### 7. Lihat Daftar Peminjaman Aktif

- Di halaman **Peminjaman**, perhatikan baris dengan status `dipinjam`.
- **Hasil:** transaksi dari langkah 6 tampil dengan status `dipinjam` dan tombol **Kembalikan**.

### 8. Proses Pengembalian

- Pada baris transaksi yang baru dibuat, klik **Kembalikan**.
- **Hasil:** status berubah menjadi `dikembalikan` (atau `terlambat` bila melewati tanggal kembali), tombol **Kembalikan** hilang, dan muncul pesan sukses.

### 9. Tampilkan Laporan

- Buka menu **Laporan** (atau klik **Lihat Laporan Peminjaman** dari Dashboard).
- **Hasil:** tabel laporan menampilkan transaksi lengkap dengan nama anggota, petugas, daftar buku, tanggal, dan status. Data diambil dari `GET /api/loans`; jika transaksi lebih dari 10, navigasi halaman muncul di bawah tabel.

### 10. Demo API di Postman

Gunakan base URL `http://127.0.0.1:8011/api`.

1. **GET** `/stats`
   - **Hasil:** `200 OK` dengan JSON `total_buku`, `total_anggota`, `peminjaman_aktif`.
2. **GET** `/books`
   - **Hasil:** `200 OK`, daftar buku dalam format JSON beserta `meta` pagination.
3. **GET** `/members`
   - **Hasil:** `200 OK`, daftar anggota dalam format JSON.
4. **GET** `/loans`
   - **Hasil:** `200 OK`, daftar peminjaman lengkap dengan relasi anggota, petugas, dan buku.
5. **POST** `/loans`
   - Body (JSON):

     ```json
     {
       "member_id": 1,
       "user_id": 1,
       "tanggal_pinjam": "2026-11-20",
       "tanggal_kembali": "2026-11-27",
       "book_ids": [1, 2]
     }
     ```

   - **Hasil:** `201 Created` dengan data peminjaman yang baru dibuat.

## Demo Tambahan: Fallback Saat API Internal Mati

- Hentikan terminal server port `8011` (biarkan port `8000` tetap jalan).
- Refresh halaman **Dashboard** dan **Laporan**.
- **Hasil:** Dashboard tetap tampil dengan statistik `0`, tabel laporan menampilkan "Belum ada data peminjaman." - bukan error 500. Ini membuktikan penanganan `ConnectionException` bekerja.

## Catatan

- Jika Dashboard menampilkan semua angka `0` padahal data ada, pastikan server port `8011` menyala dan `INTERNAL_API_URL` di `.env` menunjuk ke port tersebut.
- Jika halaman menggantung saat membuka Dashboard/Laporan, kemungkinan `INTERNAL_API_URL` masih menunjuk ke port server utama (`8000`) sehingga terjadi deadlock. Ubah ke `8011` lalu jalankan ulang kedua server.
- Setelah mengubah `.env`, jalankan `php artisan config:clear` bila nilai lama masih terbaca.
