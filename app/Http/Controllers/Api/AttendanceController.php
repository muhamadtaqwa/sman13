<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\AttendanceLog;
use Carbon\Carbon;

class AttendanceController extends Controller
{
    public function scan(Request $request)
    {
        // 1. Validasi Input dari HP Guru (Flutter)
        $request->validate([
            'kode_qr' => 'required',
            'id_kegiatan' => 'required',
            'id_petugas' => 'required'
        ]);

        $nis = $request->kode_qr; // Karena kesepakatan kita: Kode QR = NIS
        $idKegiatan = $request->id_kegiatan;
        $today = Carbon::today();

        // 2. Cek apakah NIS terdaftar di database
        $student = Student::where('nis', $nis)->first();

        if (!$student) {
            return response()->json([
                'status' => 'error',
                'message' => 'QR / NIS tidak dikenali di sistem!'
            ], 404);
        }

        // 3. Cek Duplikasi: Apakah anak ini sudah scan untuk kegiatan ini pada hari ini?
        $alreadyScanned = AttendanceLog::where('nis', $nis)
            ->where('id_kegiatan', $idKegiatan)
            ->whereDate('created_at', $today)
            ->first();

        if ($alreadyScanned) {
            return response()->json([
                'status' => 'warning',
                'message' => "Gagal: {$student->nama_lengkap} sudah presensi kegiatan ini."
            ], 400);
        }

        // 4. Jika aman, Eksekusi Simpan Data ke Tabel
        AttendanceLog::insert([
            'nis' => $nis,
            'id_kegiatan' => $idKegiatan,
            'id_petugas' => $request->id_petugas,
            'status_kehadiran' => 'Hadir',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        // 5. Berikan Respon Sukses (Warna Hijau) ke HP Guru
        return response()->json([
            'status' => 'success',
            'message' => 'Berhasil!',
            'data' => [
                'nama' => $student->nama_lengkap,
                'kelas' => $student->kode_kelas
            ]
        ], 200);
    }
}