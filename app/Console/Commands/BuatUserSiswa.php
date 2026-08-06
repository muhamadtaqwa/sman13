<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class BuatUserSiswa extends Command
{
    protected $signature = 'buat:user-siswa';
    protected $description = 'Buat user siswa dari data students';

    public function handle()
    {
        $siswa = DB::table('students')->get();
        $count = 0;

        foreach ($siswa as $s) {
            $user = User::where('username', $s->nis)->first();
            if (!$user) {
                $user = new User();
                $user->username = $s->nis;
                $user->password = Hash::make('siswa123');
                $user->role = 'siswa';
                $user->save();
                $count++;
            }
        }

        $this->info("Berhasil membuat {$count} user siswa!");
    }
}