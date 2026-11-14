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

        // 3. Hitung rekap kehadiran per siswa (hari ini) secara agregat (1 query efisien)
        $todayLogs = AttendanceLog::whereDate('created_at', Carbon::today())
            ->select('nis', 'status_kehadiran', \Illuminate\Support\Facades\DB::raw('count(*) as total'))
            ->groupBy('nis', 'status_kehadiran')
            ->get();

        $logMap = [];
        foreach ($todayLogs as $log) {
            $logMap[$log->nis][strtolower($log->status_kehadiran)] = (int) $log->total;
        }

        $rekap = [];
        foreach ($students as $student) {
            $rekap[$student->nis] = [
                'hadir' => $logMap[$student->nis]['hadir'] ?? 0,
                'sakit' => $logMap[$student->nis]['sakit'] ?? 0,
                'izin'  => $logMap[$student->nis]['izin'] ?? 0,
                'alpa'  => $logMap[$student->nis]['alpa'] ?? 0,
            ];
        }

        return view('admin.rekap', compact('students', 'daftar_kelas', 'kelas_terpilih', 'rekap'));
    }
}