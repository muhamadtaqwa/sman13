<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'students';
    protected $primaryKey = 'nis';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = ['nis', 'nama_lengkap', 'kode_kelas', 'kode_qr'];

    public function user()
    {
        return $this->belongsTo(User::class, 'nis', 'username');
    }

    public function attendanceLogs()
    {
        return $this->hasMany(AttendanceLog::class, 'nis', 'nis');
    }
}