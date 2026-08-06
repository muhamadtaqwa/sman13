<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AttendanceLog extends Model
{
    protected $table = 'attendance_logs';

    protected $fillable = ['nis', 'id_kegiatan', 'id_petugas', 'status_kehadiran', 'keterangan'];

    public function student()
    {
        return $this->belongsTo(Student::class, 'nis', 'nis');
    }

    // ✅ Pastikan relasi ini ada
    public function activity()
    {
        return $this->belongsTo(Activity::class, 'id_kegiatan', 'id');
    }
}