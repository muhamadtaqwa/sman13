<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\AttendanceLog;
use App\Models\Activity;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $data = ['role' => $user->role];

        if ($user->role === 'admin') {
            // Semua kegiatan
            $activities = Activity::orderBy('id')->get();

            // Ringkasan per kegiatan (hari ini)
            $ringkasanPerKegiatan = [];
            foreach ($activities as $activity) {
                $ringkasanPerKegiatan[$activity->id] = [
                    'hadir' => AttendanceLog::whereDate('created_at', Carbon::today())
                        ->where('id_kegiatan', $activity->id)
                        ->where('status_kehadiran', 'Hadir')
                        ->count(),
                    'belum' => AttendanceLog::whereDate('created_at', Carbon::today())
                        ->where('id_kegiatan', $activity->id)
                        ->whereIn('status_kehadiran', ['Sakit', 'Izin', 'Alpa'])
                        ->count(),
                ];
            }

            $data['ringkasanPerKegiatan'] = $ringkasanPerKegiatan;
            $data['firstActivityId'] = $activities->first()?->id ?? null;

            // Data grafik per kegiatan (6 hari terakhir)
            $chartData = [];
            foreach ($activities as $activity) {
                $labels = [];
                $kehadiran = [];

                for ($i = 5; $i >= 0; $i--) {
                    $date = Carbon::today()->subDays($i);
                    $labels[] = $date->translatedFormat('D');
                    $kehadiran[] = AttendanceLog::whereDate('created_at', $date)
                        ->where('id_kegiatan', $activity->id)
                        ->count();
                }

                $chartData[] = [
                    'id' => $activity->id,
                    'nama' => $activity->nama_kegiatan,
                    'labels' => $labels,
                    'data' => $kehadiran,
                ];
            }

            $data['chartData'] = $chartData;
        } else {
            $data['ringkasanPerKegiatan'] = [];
            $data['firstActivityId'] = null;
            $data['chartData'] = [];
        }

        return view('admin.dashboard', $data);
    }
}