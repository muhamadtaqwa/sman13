<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $table = 'activities';

    protected $fillable = ['id', 'nama_kegiatan'];

    public function attendanceLogs()
    {
        return $this->hasMany(AttendanceLog::class, 'id_kegiatan', 'id');
    }
}