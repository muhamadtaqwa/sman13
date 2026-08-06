<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;

    // Tambahkan baris ini agar form bisa menyimpan data
    protected $fillable = [
        'nip',
        'nama_lengkap',
    ];
}