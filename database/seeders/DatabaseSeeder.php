<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $now = Carbon::now();

        // 1. Data Master Kegiatan
        DB::table('activities')->insert([
            ['nama_kegiatan' => 'Kehadiran Pagi', 'created_at' => $now, 'updated_at' => $now],
            ['nama_kegiatan' => 'Sholat Dhuha', 'created_at' => $now, 'updated_at' => $now],
            ['nama_kegiatan' => 'Sholat Dhuhur', 'created_at' => $now, 'updated_at' => $now],
            ['nama_kegiatan' => 'Keputrian', 'created_at' => $now, 'updated_at' => $now],
            ['nama_kegiatan' => 'Sholat Ashar', 'created_at' => $now, 'updated_at' => $now],
        ]);

        // 2. Data Akun Pengguna (Admin, Guru, dan Murid)
        DB::table('users')->insert([
            // ADMIN
            [
                'username' => 'admin',
                'password' => Hash::make('admin123'), // Sandi khusus admin
                'role' => 'admin',
                'created_at' => $now,
                'updated_at' => $now
            ],
            // GURU (Contoh NIP: 19800101, Lahir: 17 Agustus 1980)
            // Pola Sandi: 19800101 + 17081980
            [
                'username' => '19800101',
                'password' => Hash::make('1980010117081980'),
                'role' => 'guru',
                'created_at' => $now,
                'updated_at' => $now
            ],
            // MURID 1: Budi (NIS 1001, Lahir: 15 Agustus 2010)
            // Pola Sandi: 1001 + 15082010
            [
                'username' => '1001',
                'password' => Hash::make('100115082010'),
                'role' => 'murid',
                'created_at' => $now,
                'updated_at' => $now
            ],
            // MURID 2: Siti (NIS 1002, Lahir: 20 Mei 2010)
            // Pola Sandi: 1002 + 20052010
            [
                'username' => '1002',
                'password' => Hash::make('100220052010'),
                'role' => 'murid',
                'created_at' => $now,
                'updated_at' => $now
            ]
        ]);

        // 3. Data Master Siswa (Profil detailnya)
        DB::table('students')->insert([
            [
                'nis' => '1001',
                'nama_lengkap' => 'Budi Santoso',
                'kode_kelas' => 'X-1',
                'kode_qr' => '1001',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'nis' => '1002',
                'nama_lengkap' => 'Siti Aminah',
                'kode_kelas' => 'X-1',
                'kode_qr' => '1002',
                'created_at' => $now,
                'updated_at' => $now
            ]
        ]);
    }
}