# API Perpustakaan

Base URL lokal: `http://127.0.0.1:8000/api`

Seluruh endpoint di bawah tidak memerlukan autentikasi. Endpoint `GET /user` (auth:sanctum) tidak termasuk karena tidak termasuk 11 endpoint yang dibahas.

## Daftar endpoint

| # | Method | URL | Body (jika ada) | Contoh response | Status code |
|---|---|---|---|---|---|
| 1 | GET | `/books` | - (filter query: `judul`, `category_id`) | Lihat `public/assets/images/screenshot_get_all_books.png` | 200 |
| 2 | GET | `/books/{id}` | - | Belum ada screenshot | 200, 404 |
| 3 | POST | `/books` | JSON: `judul`, `penulis`, `penerbit`, `tahun_terbit`, `isbn`, `stok`, `category_id` | Lihat `public/assets/images/screenshot_postman_add_new_book_success.png` | 201, 422 (lihat `public/assets/images/screeshot_postman_add_new_book_error.png`) |
| 4 | PUT | `/books/{id}` | JSON: sama dengan POST (semua wajib kecuali `isbn`) | Belum ada screenshot | 200, 404, 422 |
| 5 | DELETE | `/books/{id}` | - | Belum ada screenshot | 200, 404 |
| 6 | GET | `/members` | - | Belum ada screenshot | 200 |
| 7 | GET | `/members/{id}` | - | Belum ada screenshot | 200, 404 |
| 8 | GET | `/loans` | - | Belum ada screenshot | 200 |
| 9 | POST | `/loans` | JSON: `member_id`, `user_id`, `tanggal_pinjam`, `tanggal_kembali`, `book_ids` (array) | Belum ada screenshot | 201, 422 |
| 10 | PUT | `/loans/{id}/kembalikan` | - | Lihat `public/assets/images/screenshot_postman_update_loan_status.png` | 200, 404 |
| 11 | GET | `/stats` | - | Lihat contoh di bawah | 200 |

## Contoh response

### GET /books

Potongan dari screenshot Postman (`screenshot_get_all_books.png`):

```json
{
  "data": [
    {
      "id": 1,
      "judul": "Laskar Pelangi",
      "penulis": "Andrea Hirata",
      "penerbit": "Bentang Pustaka",
      "tahun_terbit": 2005,
      "isbn": "9789793062792",
      "stok": 5,
      "sampul": null,
      "category": { "id": 2, "nama_kategori": "Fiksi" },
      "created_at": "2026-09-27T16:02:47.000000Z",
      "updated_at": "2026-09-27T16:02:47.000000Z"
    }
  ]
}
```

### POST /books (sukses, 201)

Lihat `public/assets/images/screenshot_postman_add_new_book_success.png`. Response berisi objek buku dengan `id: 14` di dalam key `data`.

### POST /books (validasi gagal, 422)

Lihat `public/assets/images/screeshot_postman_add_new_book_error.png`. Body dengan semua field `null` menghasilkan:

```json
{
  "message": "Judul buku wajib diisi. (and 5 more errors)",
  "errors": {
    "judul": ["Judul buku wajib diisi."],
    "penulis": ["Nama penulis wajib diisi."],
    "penerbit": ["Nama penerbit wajib diisi."],
    "tahun_terbit": ["Tahun terbit wajib diisi."]
  }
}
```

### PUT /loans/{id}/kembalikan (200)

Lihat `public/assets/images/screenshot_postman_update_loan_status.png`. Field `status` berubah menjadi `dikembalikan` dan `tanggal_dikembalikan` terisi tanggal hari ini.

### GET /stats (200)

```json
{
  "total_buku": 13,
  "total_anggota": 2,
  "peminjaman_aktif": 0
}
```

## Catatan

- Response daftar (`GET /books`, `/members`, `/loans`) dipaginasi 10 item per halaman dengan key `data`, `links`, dan `meta`.
- Status 404 berasal dari `findOrFail` pada endpoint dengan parameter `{id}`.
- Status 422 berasal dari validasi Laravel. Pesan validasi dalam bahasa Indonesia.
