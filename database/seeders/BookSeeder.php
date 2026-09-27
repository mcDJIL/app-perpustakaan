<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;     // sesuaikan namespace/model kalau nama model kamu Buku
use App\Models\Category; // model kategori dari CategorySeeder sebelumnya

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ambil id kategori berdasarkan nama, biar gak hardcode id angka.
        // Pastikan CategorySeeder sudah dijalankan duluan.
        $categories = Category::pluck('id', 'nama_kategori');

        $books = [
            [
                'judul'        => 'Laskar Pelangi',
                'penulis'      => 'Andrea Hirata',
                'penerbit'     => 'Bentang Pustaka',
                'tahun_terbit' => 2005,
                'isbn'         => '9789793062792',
                'stok'         => 5,
                'kategori'     => 'Fiksi',
            ],
            [
                'judul'        => 'Bumi Manusia',
                'penulis'      => 'Pramoedya Ananta Toer',
                'penerbit'     => 'Hasta Mitra',
                'tahun_terbit' => 1980,
                'isbn'         => '9789794616125',
                'stok'         => 3,
                'kategori'     => 'Fiksi',
            ],
            [
                'judul'        => 'Sapiens: A Brief History of Humankind',
                'penulis'      => 'Yuval Noah Harari',
                'penerbit'     => 'Harper',
                'tahun_terbit' => 2011,
                'isbn'         => '9780062316097',
                'stok'         => 4,
                'kategori'     => 'Non-Fiksi',
            ],
            [
                'judul'        => 'A Brief History of Time',
                'penulis'      => 'Stephen Hawking',
                'penerbit'     => 'Bantam Books',
                'tahun_terbit' => 1988,
                'isbn'         => '9780553380163',
                'stok'         => 2,
                'kategori'     => 'Sains & Teknologi',
            ],
            [
                'judul'        => 'Clean Code',
                'penulis'      => 'Robert C. Martin',
                'penerbit'     => 'Prentice Hall',
                'tahun_terbit' => 2008,
                'isbn'         => '9780132350884',
                'stok'         => 6,
                'kategori'     => 'Teknik Informatika',
            ],
            [
                'judul'        => 'Introduction to Algorithms',
                'penulis'      => 'Thomas H. Cormen',
                'penerbit'     => 'MIT Press',
                'tahun_terbit' => 2009,
                'isbn'         => '9780262033848',
                'stok'         => 3,
                'kategori'     => 'Teknik Informatika',
            ],
            [
                'judul'        => 'Rich Dad Poor Dad',
                'penulis'      => 'Robert T. Kiyosaki',
                'penerbit'     => 'Plata Publishing',
                'tahun_terbit' => 1997,
                'isbn'         => '9781612680194',
                'stok'         => 4,
                'kategori'     => 'Ekonomi & Bisnis',
            ],
            [
                'judul'        => 'Sejarah Indonesia Modern 1200-2008',
                'penulis'      => 'M. C. Ricklefs',
                'penerbit'     => 'Serambi',
                'tahun_terbit' => 2008,
                'isbn'         => null,
                'stok'         => 2,
                'kategori'     => 'Sejarah',
            ],
            [
                'judul'        => 'Steve Jobs',
                'penulis'      => 'Walter Isaacson',
                'penerbit'     => 'Simon & Schuster',
                'tahun_terbit' => 2011,
                'isbn'         => '9781451648539',
                'stok'         => 3,
                'kategori'     => 'Biografi',
            ],
            [
                'judul'        => 'Cara Belajar Efektif untuk Mahasiswa',
                'penulis'      => 'Tim Penulis',
                'penerbit'     => 'Gramedia',
                'tahun_terbit' => 2019,
                'isbn'         => null,
                'stok'         => 5,
                'kategori'     => 'Pendidikan',
            ],
            [
                'judul'        => 'Si Kancil Anak Nakal',
                'penulis'      => 'Kak Zepe',
                'penerbit'     => 'Erlangga',
                'tahun_terbit' => 2015,
                'isbn'         => null,
                'stok'         => 6,
                'kategori'     => 'Anak & Remaja',
            ],
            [
                'judul'        => 'Atomic Habits',
                'penulis'      => 'James Clear',
                'penerbit'     => 'Avery',
                'tahun_terbit' => 2018,
                'isbn'         => '9780735211292',
                'stok'         => 7,
                'kategori'     => 'Kesehatan',
            ],
        ];

        foreach ($books as $book) {
            Book::create([
                'judul'        => $book['judul'],
                'penulis'      => $book['penulis'],
                'penerbit'     => $book['penerbit'],
                'tahun_terbit' => $book['tahun_terbit'],
                'isbn'         => $book['isbn'],
                'stok'         => $book['stok'],
                'category_id'  => $categories[$book['kategori']] ?? null,
            ]);
        }
    }
}