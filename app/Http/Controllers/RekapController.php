<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\AttendanceLog;
use Carbon\Carbon;

class RekapController extends Controller
{
    public function index(Request $request)
    {
        // 1. Ambil daftar kelas untuk dropdown filter
        $daftar_kelas = Student::select('kode_kelas')->distinct()->pluck('kode_kelas');

        // 2. Ambil data siswa berdasarkan filter kelas
        $query = Student::orderBy('nama_lengkap', 'asc');

        if ($request->filled('kelas')) {
            $query->where('kode_kelas', $request->kelas);
            $kelas_terpilih = $request->kelas;
        } else {
            $kelas_terpilih = 'Semua Kelas';
        }

        $students = $query->get();

        // 3. Hitung rekap kehadiran per siswa (hari ini)
        $rekap = [];
        foreach ($students as $student) {
            $rekap[$student->nis] = [
                'hadir' => AttendanceLog::whereDate('created_at', Carbon::today())
                    ->where('nis', $student->nis)
                    ->where('status_kehadiran', 'Hadir')
                    ->count(),
                'sakit' => AttendanceLog::whereDate('created_at', Carbon::today())
                    ->where('nis', $student->nis)
                    ->where('status_kehadiran', 'Sakit')
                    ->count(),
                'izin' => AttendanceLog::whereDate('created_at', Carbon::today())
                    ->where('nis', $student->nis)
                    ->where('status_kehadiran', 'Izin')
                    ->count(),
                'alpa' => AttendanceLog::whereDate('created_at', Carbon::today())
                    ->where('nis', $student->nis)
                    ->where('status_kehadiran', 'Alpa')
                    ->count(),
            ];
        }

        return view('admin.rekap', compact('students', 'daftar_kelas', 'kelas_terpilih', 'rekap'));
    }
}