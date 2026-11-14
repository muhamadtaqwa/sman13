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

            // Ringkasan per kegiatan (hari ini) secara agregat (1 query cepat)
            $todayLogs = AttendanceLog::whereDate('created_at', Carbon::today())
                ->select(
                    'id_kegiatan',
                    \Illuminate\Support\Facades\DB::raw("SUM(CASE WHEN status_kehadiran = 'Hadir' THEN 1 ELSE 0 END) as hadir"),
                    \Illuminate\Support\Facades\DB::raw("SUM(CASE WHEN status_kehadiran IN ('Sakit', 'Izin', 'Alpa') THEN 1 ELSE 0 END) as belum")
                )
                ->groupBy('id_kegiatan')
                ->get()
                ->keyBy('id_kegiatan');

            $ringkasanPerKegiatan = [];
            foreach ($activities as $activity) {
                $summary = $todayLogs->get($activity->id);
                $ringkasanPerKegiatan[$activity->id] = [
                    'hadir' => (int) ($summary->hadir ?? 0),
                    'belum' => (int) ($summary->belum ?? 0),
                ];
            }

            $data['ringkasanPerKegiatan'] = $ringkasanPerKegiatan;
            $data['firstActivityId'] = $activities->first()?->id ?? null;

            // Data grafik per kegiatan (6 hari terakhir) secara agregat (1 query cepat)
            $sixDaysAgo = Carbon::today()->subDays(5)->startOfDay();
            $chartLogs = AttendanceLog::where('created_at', '>=', $sixDaysAgo)
                ->select(
                    'id_kegiatan',
                    \Illuminate\Support\Facades\DB::raw('DATE(created_at) as log_date'),
                    \Illuminate\Support\Facades\DB::raw('count(*) as total')
                )
                ->groupBy('id_kegiatan', \Illuminate\Support\Facades\DB::raw('DATE(created_at)'))
                ->get();

            $chartMap = [];
            foreach ($chartLogs as $row) {
                $chartMap[$row->id_kegiatan][$row->log_date] = (int) $row->total;
            }

            $chartData = [];
            foreach ($activities as $activity) {
                $labels = [];
                $kehadiran = [];

                for ($i = 5; $i >= 0; $i--) {
                    $date = Carbon::today()->subDays($i);
                    $dateStr = $date->format('Y-m-d');
                    $labels[] = $date->translatedFormat('D');
                    $kehadiran[] = $chartMap[$activity->id][$dateStr] ?? 0;
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