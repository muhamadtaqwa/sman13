<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guru;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class GuruController extends Controller
{
    public function index(Request $request)
    {
        $query = User::where('role', 'guru');

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where('username', 'like', "%{$search}%");
        }

        $guru = $query->orderBy('username')->get();

        return view('admin.guru', compact('guru'));
    }

    public function dashboard()
    {
        $kegiatan = \DB::table('activities')->orderBy('id')->get();

        $kelasList = \DB::table('students')
            ->select('kode_kelas')
            ->whereNotNull('kode_kelas')
            ->distinct()
            ->orderBy('kode_kelas')
            ->get();

        $hariIni = date('Y-m-d');
        $dataKelas = [];

        foreach ($kelasList as $kelas) {
            $siswaDiKelas = \DB::table('students')
                ->where('kode_kelas', $kelas->kode_kelas)
                ->pluck('nis')
                ->toArray();

            $totalSiswa = count($siswaDiKelas);
            $kegiatanPertama = $kegiatan->first();
            $idKegiatan = $kegiatanPertama ? $kegiatanPertama->id : 1;

            $hadir = \DB::table('attendance_logs')
                ->whereIn('nis', $siswaDiKelas)
                ->where('id_kegiatan', $idKegiatan)
                ->whereDate('created_at', $hariIni)
                ->where('status_kehadiran', 'Hadir')
                ->count();

            $izinSakit = \DB::table('attendance_logs')
                ->whereIn('nis', $siswaDiKelas)
                ->where('id_kegiatan', $idKegiatan)
                ->whereDate('created_at', $hariIni)
                ->whereIn('status_kehadiran', ['Izin', 'Sakit'])
                ->count();

            $belum = $totalSiswa - $hadir - $izinSakit;

            $dataKelas[] = (object) [
                'nama_kelas' => $kelas->kode_kelas,
                'total_siswa' => $totalSiswa,
                'hadir' => $hadir,
                'izin_sakit' => $izinSakit,
                'belum' => $belum
            ];
        }

        return view('guru.dashboard', compact('kegiatan', 'dataKelas'));
    }
    public function getDataByKegiatan($kegiatanId)
    {
        $hariIni = date('Y-m-d');

        $kelasList = \DB::table('students')
            ->select('kode_kelas')
            ->whereNotNull('kode_kelas')
            ->distinct()
            ->orderBy('kode_kelas')
            ->get();

        $dataKelas = [];

        foreach ($kelasList as $kelas) {
            $siswaDiKelas = \DB::table('students')
                ->where('kode_kelas', $kelas->kode_kelas)
                ->pluck('nis')
                ->toArray();

            $totalSiswa = count($siswaDiKelas);

            $hadir = \DB::table('attendance_logs')
                ->whereIn('nis', $siswaDiKelas)
                ->where('id_kegiatan', $kegiatanId)
                ->whereDate('created_at', $hariIni)
                ->where('status_kehadiran', 'Hadir')
                ->count();

            $izinSakit = \DB::table('attendance_logs')
                ->whereIn('nis', $siswaDiKelas)
                ->where('id_kegiatan', $kegiatanId)
                ->whereDate('created_at', $hariIni)
                ->whereIn('status_kehadiran', ['Izin', 'Sakit'])
                ->count();

            $belum = $totalSiswa - $hadir - $izinSakit;

            $dataKelas[] = [
                'nama_kelas' => $kelas->kode_kelas,
                'total_siswa' => $totalSiswa,
                'hadir' => $hadir,
                'izin_sakit' => $izinSakit,
                'belum' => $belum
            ];
        }

        return response()->json([
            'status' => 'success',
            'dataKelas' => $dataKelas
        ]);
    }

    public function scan()
    {
        return view('guru.scan');
    }

    public function rekap(Request $request)
    {
        $kelasList = \DB::table('students')
            ->select('kode_kelas')
            ->whereNotNull('kode_kelas')
            ->distinct()
            ->orderBy('kode_kelas')
            ->get();

        $kegiatanList = \DB::table('activities')->orderBy('id')->get();

        $tanggal = date('Y-m-d');
        $mode = 'harian';

        $dataSiswa = $this->getRekapData($tanggal, 'semua', $mode);

        return view('guru.rekap', compact('kelasList', 'kegiatanList', 'dataSiswa', 'mode', 'tanggal'));
    }

    private function getRekapData($waktu, $kelas, $mode)
    {
        $query = \DB::table('students')
            ->leftJoin('attendance_logs', 'students.nis', '=', 'attendance_logs.nis')
            ->leftJoin('activities', 'attendance_logs.id_kegiatan', '=', 'activities.id')
            ->select(
                'students.nis',
                'students.nama_lengkap',
                'students.kode_kelas',
                'attendance_logs.status_kehadiran',
                'activities.nama_kegiatan',
                'attendance_logs.created_at'
            );

        if ($kelas !== 'semua') {
            $query->where('students.kode_kelas', $kelas);
        }

        if ($mode === 'harian') {
            $query->where(function ($q) use ($waktu) {
                $q->whereDate('attendance_logs.created_at', $waktu)
                  ->orWhereNull('attendance_logs.created_at');
            });
        } elseif ($mode === 'bulanan') {
            $query->where(function ($q) use ($waktu) {
                $q->whereYear('attendance_logs.created_at', substr($waktu, 0, 4))
                  ->whereMonth('attendance_logs.created_at', substr($waktu, 5, 2))
                  ->orWhereNull('attendance_logs.created_at');
            });
        } elseif ($mode === 'tahunan') {
            $query->where(function ($q) use ($waktu) {
                $q->whereYear('attendance_logs.created_at', $waktu)
                  ->orWhereNull('attendance_logs.created_at');
            });
        }

        $results = $query->get();

        $dataSiswa = [];
        foreach ($results as $row) {
            if (!isset($dataSiswa[$row->nis])) {
                $dataSiswa[$row->nis] = [
                    'nis' => $row->nis,
                    'nama_lengkap' => $row->nama_lengkap,
                    'kode_kelas' => $row->kode_kelas,
                    'kegiatan' => []
                ];
            }

            if ($row->nama_kegiatan) {
                $dataSiswa[$row->nis]['kegiatan'][$row->nama_kegiatan] = $row->status_kehadiran ?? 'Belum';
            }
        }

        $allKegiatan = \DB::table('activities')->pluck('nama_kegiatan')->toArray();

        foreach ($dataSiswa as &$siswa) {
            foreach ($allKegiatan as $keg) {
                if (!isset($siswa['kegiatan'][$keg])) {
                    $siswa['kegiatan'][$keg] = 'Belum';
                }
            }
        }

        return array_values($dataSiswa);
    }
    private function getRekapDataStatistik($waktu, $kelas, $mode)
    {
        if ($mode === 'bulanan') {
            $tahun = substr($waktu, 0, 4);
            $bulan = substr($waktu, 5, 2);
            $query = \DB::table('students')
                ->leftJoin('attendance_logs', 'students.nis', '=', 'attendance_logs.nis')
                ->leftJoin('activities', 'attendance_logs.id_kegiatan', '=', 'activities.id')
                ->select(
                    'students.nis',
                    'students.nama_lengkap',
                    'students.kode_kelas',
                    'attendance_logs.status_kehadiran',
                    'activities.nama_kegiatan'
                )
                ->whereYear('attendance_logs.created_at', $tahun)
                ->whereMonth('attendance_logs.created_at', $bulan);
        } else { // tahunan
            $query = \DB::table('students')
                ->leftJoin('attendance_logs', 'students.nis', '=', 'attendance_logs.nis')
                ->leftJoin('activities', 'attendance_logs.id_kegiatan', '=', 'activities.id')
                ->select(
                    'students.nis',
                    'students.nama_lengkap',
                    'students.kode_kelas',
                    'attendance_logs.status_kehadiran',
                    'activities.nama_kegiatan'
                )
                ->whereYear('attendance_logs.created_at', $waktu);
        }

        if ($kelas !== 'semua') {
            $query->where('students.kode_kelas', $kelas);
        }

        $results = $query->get();

        $dataSiswa = [];
        $allKegiatan = \DB::table('activities')->pluck('nama_kegiatan')->toArray();

        foreach ($results as $row) {
            if (!isset($dataSiswa[$row->nis])) {
                $dataSiswa[$row->nis] = [
                    'nis' => $row->nis,
                    'nama_lengkap' => $row->nama_lengkap,
                    'kode_kelas' => $row->kode_kelas,
                    'kegiatan' => []
                ];
                foreach ($allKegiatan as $keg) {
                    $dataSiswa[$row->nis]['kegiatan'][$keg] = [
                        'Hadir' => 0,
                        'Izin' => 0,
                        'Sakit' => 0,
                        'Alpa' => 0
                    ];
                }
            }

            if ($row->nama_kegiatan && $row->status_kehadiran) {
                $status = $row->status_kehadiran;
                if (isset($dataSiswa[$row->nis]['kegiatan'][$row->nama_kegiatan][$status])) {
                    $dataSiswa[$row->nis]['kegiatan'][$row->nama_kegiatan][$status]++;
                }
            }
        }

        return array_values($dataSiswa);
    }
    public function cetakRekap(Request $request)
    {
        $mode = $request->mode;
        $waktu = $request->waktu;
        $kelas = $request->kelas;

        $dataSiswa = $this->getRekapData($waktu, $kelas, $mode);

        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('guru.rekap_pdf', [
            'dataSiswa' => $dataSiswa,
            'mode' => $mode,
            'waktu' => $waktu,
            'kelas' => $kelas,
            'tanggal_cetak' => date('d-m-Y H:i:s')
        ]);

        $pdf->setPaper('A4', 'landscape');

        return $pdf->download('rekap_absensi_' . date('Ymd_His') . '.pdf');
    }

    public function filterRekap(Request $request)
    {
        $mode = $request->mode;
        $waktu = $request->waktu;
        $kelas = $request->kelas;

        if ($mode === 'harian') {
            $dataSiswa = $this->getRekapData($waktu, $kelas, $mode);
            return response()->json([
                'status' => 'success',
                'data' => $dataSiswa,
                'displayMode' => 'harian'
            ]);
        } else {
            $dataSiswa = $this->getRekapDataStatistik($waktu, $kelas, $mode);
            return response()->json([
                'status' => 'success',
                'data' => $dataSiswa,
                'displayMode' => 'statistik'
            ]);
        }
    }

    public function manual()
    {
        $kelasList = \DB::table('students')
            ->select('kode_kelas')
            ->whereNotNull('kode_kelas')
            ->distinct()
            ->orderBy('kode_kelas')
            ->get();

        $kegiatanList = \DB::table('activities')->orderBy('id')->get();

        return view('guru.manual', compact('kelasList', 'kegiatanList'));
    }

    public function getSiswaByKelas($kodeKelas)
    {
        $siswa = \DB::table('students')
            ->where('kode_kelas', $kodeKelas)
            ->orderBy('nama_lengkap')
            ->get(['nis', 'nama_lengkap']);

        return response()->json($siswa);
    }

    public function storeManual(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'kode_kelas' => 'required|string',
            'nis' => 'required|string',
            'keterangan' => 'required|in:izin,sakit,alpha',
            'kegiatan' => 'required|array|min:1',
            'kegiatan.*' => 'string',
        ]);

        $student = \DB::table('students')
            ->where('nis', $request->nis)
            ->where('kode_kelas', $request->kode_kelas)
            ->first();

        if (!$student) {
            return back()->with('error', 'Siswa tidak ditemukan!');
        }

        $statusMap = [
            'izin' => 'Izin',
            'sakit' => 'Sakit',
            'alpha' => 'Alpa'
        ];
        $status = $statusMap[$request->keterangan];

        $insertCount = 0;
        $skipCount = 0;

        foreach ($request->kegiatan as $namaKegiatan) {
            $kegiatan = \DB::table('activities')
                ->where('nama_kegiatan', $namaKegiatan)
                ->first();

            if (!$kegiatan) {
                continue;
            }

            $sudahAda = \DB::table('attendance_logs')
                ->where('nis', $request->nis)
                ->where('id_kegiatan', $kegiatan->id)
                ->whereDate('created_at', $request->tanggal)
                ->exists();

            if ($sudahAda) {
                $skipCount++;
                continue;
            }

            \DB::table('attendance_logs')->insert([
                'nis' => $request->nis,
                'id_kegiatan' => $kegiatan->id,
                'status_kehadiran' => $status,
                'created_at' => $request->tanggal . ' 00:00:00',
                'updated_at' => now(),
            ]);

            $insertCount++;
        }

        if ($insertCount == 0 && $skipCount > 0) {
            return back()->with('warning', 'Semua kegiatan yang dipilih sudah tercatat sebelumnya untuk siswa ini.');
        }

        $message = "Berhasil menyimpan {$insertCount} absensi untuk {$student->nama_lengkap}";
        if ($skipCount > 0) {
            $message .= ". {$skipCount} kegiatan sudah terisi sebelumnya dan dilewati.";
        }

        return back()->with('success', $message);
    }

    public function storePresensi(Request $request)
    {
        $request->validate([
            'kode_qr' => 'required|string',
            'kegiatan' => 'required|string'
        ]);

        $student = \DB::table('students')->where('kode_qr', $request->kode_qr)->first();

        if (!$student) {
            return response()->json([
                'status' => 'error',
                'message' => 'QR Code tidak terdaftar!'
            ]);
        }

        $kegiatan = \DB::table('activities')
            ->where('nama_kegiatan', $request->kegiatan)
            ->first();

        if (!$kegiatan) {
            return response()->json([
                'status' => 'error',
                'message' => 'Kegiatan tidak ditemukan!'
            ]);
        }

        $sudahAbsen = \DB::table('attendance_logs')
            ->where('nis', $student->nis)
            ->where('id_kegiatan', $kegiatan->id)
            ->whereDate('created_at', date('Y-m-d'))
            ->exists();

        if ($sudahAbsen) {
            return response()->json([
                'status' => 'warning',
                'message' => '⚠️ ' . $student->nama_lengkap . ' sudah tercatat ' . $request->kegiatan . ' hari ini!'
            ]);
        }

        \DB::table('attendance_logs')->insert([
            'nis' => $student->nis,
            'id_kegiatan' => $kegiatan->id,
            'status_kehadiran' => 'Hadir',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return response()->json([
            'status' => 'success',
            'message' => '✅ ' . $student->nama_lengkap . ' - ' . $request->kegiatan
        ]);
    }

    public function settings()
    {
        $guru = auth()->user();
        return view('guru.settings', compact('guru'));
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'username' => 'required|string|min:3|max:255',
            'email' => 'nullable|email|max:255',
            'nama_lengkap' => 'nullable|string|max:255'
        ]);

        $user = Auth::user();

        if ($request->username !== $user->username) {
            $request->validate([
                'username' => 'unique:users,username'
            ]);
        }

        $user->username = $request->username;
        $user->email = $request->email;

        $user->nama_lengkap = $request->nama_lengkap;

        $user->save();

        return back()->with('success', 'Profil berhasil diperbarui');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required|string',
            'new_password' => 'required|string|min:6|confirmed',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Password lama tidak sesuai']);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return back()->with('success', 'Password berhasil diperbarui');
    }
}