<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Student;
use App\Models\Activity;
use App\Models\AttendanceLog;
use Carbon\Carbon;

class SiswaController extends Controller
{
    public function dashboard()
    {
        if (Auth::user()->role !== 'siswa') {
            abort(403, 'Akses Ditolak. Anda bukan siswa.');
        }

        $siswa = Student::where('nis', Auth::user()->username)->first();
        $activities = Activity::all();
        $attendanceToday = AttendanceLog::where('nis', Auth::user()->username)
            ->whereDate('created_at', Carbon::today())
            ->get()
            ->keyBy('id_kegiatan');

        return view('siswa.dashboard', compact('siswa', 'activities', 'attendanceToday'));
    }

    // ✅ Method baru untuk download QR Code
    public function downloadQR()
    {
        if (Auth::user()->role !== 'siswa') {
            abort(403, 'Akses Ditolak.');
        }

        $siswa = Student::where('nis', Auth::user()->username)->first();

        if (!$siswa || !$siswa->kode_qr) {
            return back()->with('error', 'QR Code tidak ditemukan.');
        }

        // Ambil gambar QR dari API
        $qrData = $siswa->kode_qr ?? $siswa->nis;
        $qrUrl = "https://api.qrserver.com/v1/create-qr-code/?size=500x500&data={$qrData}&bgcolor=ffffff&color=1e293b";
        $image = file_get_contents($qrUrl);

        // Nama file
        $fileName = 'QRCode_' . $siswa->nama_lengkap . '_' . $siswa->nis . '.png';
        $fileName = str_replace(' ', '_', $fileName);

        // Return response download
        return response($image)
            ->header('Content-Type', 'image/png')
            ->header('Content-Disposition', 'attachment; filename="' . $fileName . '"');
    }

    public function riwayat()
    {
        if (Auth::user()->role !== 'siswa') {
            abort(403, 'Akses Ditolak. Anda bukan siswa.');
        }

        $siswa = Student::where('nis', Auth::user()->username)->first();

        // Ambil semua log kehadiran, urutkan terbaru
        $riwayat = AttendanceLog::where('nis', Auth::user()->username)
            ->with('activity') // Pastikan relasi activity ada di Model
            ->orderBy('created_at', 'desc')
            ->take(50) // Batasi 50 data terbaru
            ->get()
            ->groupBy(function ($item) {
                return Carbon::parse($item->created_at)->format('Y-m-d');
            });

        return view('siswa.riwayat', compact('siswa', 'riwayat'));
    }

    public function rekap(Request $request)
    {
        if (Auth::user()->role !== 'siswa') {
            abort(403, 'Akses Ditolak. Anda bukan siswa.');
        }

        $siswa = Student::where('nis', Auth::user()->username)->first();

        // Bulan yang dipilih (default: bulan sekarang)
        $selectedMonth = $request->input('bulan', now()->format('m'));
        $selectedYear = now()->format('Y');

        // Ambil semua log di bulan terpilih
        $logs = AttendanceLog::where('nis', Auth::user()->username)
            ->whereYear('created_at', $selectedYear)
            ->whereMonth('created_at', $selectedMonth)
            ->with('activity')
            ->get();

        // Hitung total per status
        $totalHadir = $logs->where('status_kehadiran', 'Hadir')->count();
        $totalIzin = $logs->where('status_kehadiran', 'Izin')->count();
        $totalSakit = $logs->where('status_kehadiran', 'Sakit')->count();
        $totalAlpha = $logs->where('status_kehadiran', 'Alpha')->count();
        $totalKegiatan = $logs->count();

        // Hitung persentase
        $persentase = $totalKegiatan > 0 ? round(($totalHadir / $totalKegiatan) * 100) : 0;

        // Status kehadiran
        if ($persentase >= 90) {
            $statusKehadiran = 'Sangat Baik';
            $statusColor = 'success';
        } elseif ($persentase >= 75) {
            $statusKehadiran = 'Baik';
            $statusColor = 'primary';
        } elseif ($persentase >= 60) {
            $statusKehadiran = 'Cukup';
            $statusColor = 'warning';
        } else {
            $statusKehadiran = 'Kurang';
            $statusColor = 'danger';
        }

        // Rincian per kegiatan
        $rincianKegiatan = [];
        $activities = Activity::all();

        foreach ($activities as $activity) {
            $logsKegiatan = $logs->where('id_kegiatan', $activity->id);
            $totalPerKegiatan = $logsKegiatan->count();
            $hadirPerKegiatan = $logsKegiatan->where('status_kehadiran', 'Hadir')->count();
            $persentaseKegiatan = $totalPerKegiatan > 0 ? round(($hadirPerKegiatan / $totalPerKegiatan) * 100) : 0;

            $rincianKegiatan[] = [
                'nama' => $activity->nama_kegiatan,
                'persentase' => $persentaseKegiatan,
                'hadir' => $hadirPerKegiatan,
                'total' => $totalPerKegiatan,
            ];
        }

        // Daftar bulan untuk filter
        $availableMonths = AttendanceLog::where('nis', Auth::user()->username)
            ->selectRaw("DATE_FORMAT(created_at, '%m') as month, DATE_FORMAT(created_at, '%Y') as year")
            ->groupBy('month', 'year')
            ->orderBy('year', 'desc')
            ->orderBy('month', 'desc')
            ->get();

        return view('siswa.rekap', compact(
            'siswa',
            'selectedMonth',
            'selectedYear',
            'totalHadir',
            'totalIzin',
            'totalSakit',
            'totalAlpha',
            'totalKegiatan',
            'persentase',
            'statusKehadiran',
            'rincianKegiatan',
            'availableMonths'
        ));
    }

    public function settings()
    {
        if (Auth::user()->role !== 'siswa') {
            abort(403, 'Akses Ditolak. Anda bukan siswa.');
        }

        $siswa = Student::where('nis', Auth::user()->username)->first();

        return view('siswa.settings', compact('siswa'));
    }
}