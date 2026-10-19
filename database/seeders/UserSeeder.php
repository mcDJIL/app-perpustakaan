<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Administrator Perpustakaan',
                'email' => 'admin@pens.ac.id',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('password'),
                'role' => 'admin',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Petugas Satu',
                'email' => 'petugas1@pens.ac.id',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('password'),
                'role' => 'petugas',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Petugas Dua',
                'email' => 'petugas2@pens.ac.id',
                'email_verified_at' => null, // Contoh user yang belum verifikasi email
                'password' => Hash::make('password'),
                'role' => 'petugas',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ];

        DB::table('users')->insert($users);
    }
}