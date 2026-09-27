<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category; // sesuaikan namespace/model kalau nama model kamu Kategori
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'nama_kategori' => 'Fiksi',
                'deskripsi'     => 'Karya sastra imajinatif seperti novel, cerpen, dan cerita fiksi lainnya.',
            ],
            [
                'nama_kategori' => 'Non-Fiksi',
                'deskripsi'     => 'Buku berdasarkan fakta, kejadian nyata, dan pengetahuan umum.',
            ],
            [
                'nama_kategori' => 'Sains & Teknologi',
                'deskripsi'     => 'Buku ilmu pengetahuan alam, komputer, dan teknologi.',
            ],
            [
                'nama_kategori' => 'Teknik Informatika',
                'deskripsi'     => 'Buku pemrograman, algoritma, jaringan, dan ilmu komputer.',
            ],
            [
                'nama_kategori' => 'Ekonomi & Bisnis',
                'deskripsi'     => 'Buku manajemen, akuntansi, kewirausahaan, dan ekonomi.',
            ],
            [
                'nama_kategori' => 'Sejarah',
                'deskripsi'     => 'Buku tentang peristiwa dan tokoh sejarah dunia maupun nasional.',
            ],
            [
                'nama_kategori' => 'Agama & Spiritualitas',
                'deskripsi'     => 'Buku keagamaan dan pengembangan spiritual.',
            ],
            [
                'nama_kategori' => 'Biografi',
                'deskripsi'     => 'Kisah hidup tokoh terkenal maupun inspiratif.',
            ],
            [
                'nama_kategori' => 'Pendidikan',
                'deskripsi'     => 'Buku pelajaran, referensi akademik, dan panduan belajar.',
            ],
            [
                'nama_kategori' => 'Anak & Remaja',
                'deskripsi'     => null,
            ],
            [
                'nama_kategori' => 'Kesehatan',
                'deskripsi'     => 'Buku seputar kesehatan, gizi, dan gaya hidup sehat.',
            ],
            [
                'nama_kategori' => 'Seni & Budaya',
                'deskripsi'     => 'Buku seni rupa, musik, budaya, dan desain.',
            ],
        ];

        foreach ($categories as $category) {
            Category::create([
                'nama_kategori' => $category['nama_kategori'],
                'deskripsi'     => $category['deskripsi'],
            ]);
        }
    }
}