<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebAuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StudentController;

// --- JALUR PUBLIK ---
Route::get('/', [WebAuthController::class, 'showLogin'])->name('login');
Route::get('/login', [WebAuthController::class, 'showLogin']);
Route::post('/login-web', [WebAuthController::class, 'processLogin']);

// --- JALUR TERPROTEKSI (Wajib Login) ---
Route::middleware('auth')->group(function () {
    Route::post('/logout', [WebAuthController::class, 'logout'])->name('logout');

    // ==========================================
    // 1. RUANGAN KHUSUS GURU
    // ==========================================
    Route::middleware('role:guru')->group(function () {
        Route::get('/guru/dashboard', [App\Http\Controllers\GuruController::class, 'dashboard'])->name('guru.dashboard');
        Route::get('/guru/scan', [App\Http\Controllers\GuruController::class, 'scan'])->name('guru.scan.view');
        Route::post('/guru/scan-presensi', [App\Http\Controllers\GuruController::class, 'storePresensi'])->name('guru.scan.store');
        Route::get('/guru/rekap', [App\Http\Controllers\GuruController::class, 'rekap'])->name('guru.rekap');
        Route::get('/guru/rekap/cetak', [App\Http\Controllers\GuruController::class, 'cetakRekap'])->name('guru.rekap.cetak');
        Route::get('/guru/dashboard/data/{kegiatanId}', [App\Http\Controllers\GuruController::class, 'getDataByKegiatan']);
        Route::get('/guru/rekap/filter', [App\Http\Controllers\GuruController::class, 'filterRekap'])->name('guru.rekap.filter');
        Route::post('/guru/manual/store', [App\Http\Controllers\GuruController::class, 'storeManual'])->name('guru.manual.store');
        Route::get('/guru/manual', [App\Http\Controllers\GuruController::class, 'manual'])->name('guru.manual.view');
        Route::get('/guru/manual/siswa/{kodeKelas}', [App\Http\Controllers\GuruController::class, 'getSiswaByKelas']);
        Route::put('/guru/settings/profile', [App\Http\Controllers\GuruController::class, 'updateProfile'])->name('guru.settings.profile');
        Route::put('/guru/settings/password', [App\Http\Controllers\GuruController::class, 'updatePassword'])->name('guru.settings.password');
        Route::get('/guru/settings', [App\Http\Controllers\GuruController::class, 'settings'])->name('guru.settings');
    });

    // ==========================================
    // 2. RUANGAN KHUSUS ADMIN
    // ==========================================
    Route::middleware('role:admin')->group(function () {
        Route::get('admin/dashboard', [DashboardController::class, 'index']);
        Route::resource('admin/students', StudentController::class);
        Route::resource('admin/guru', App\Http\Controllers\GuruController::class);
        Route::get('admin/rekap', [App\Http\Controllers\RekapController::class, 'index']);
        Route::get('admin/settings', [App\Http\Controllers\SettingsController::class, 'index']);
        Route::put('/admin/settings/password', [App\Http\Controllers\SettingsController::class, 'updatePassword'])
            ->middleware('auth')
            ->name('settings.password');
    });

    // ==========================================
    // 3. RUANGAN KHUSUS SISWA
    // ==========================================
    Route::middleware('role:siswa')->group(function () {
        Route::get('/siswa/dashboard', [App\Http\Controllers\SiswaController::class, 'dashboard'])->name('siswa.dashboard');
        Route::get('/siswa/riwayat', [App\Http\Controllers\SiswaController::class, 'riwayat'])->name('siswa.riwayat');
        Route::get('/siswa/rekap', [App\Http\Controllers\SiswaController::class, 'rekap'])->name('siswa.rekap');
        Route::get('/siswa/settings', [App\Http\Controllers\SiswaController::class, 'settings'])->name('siswa.settings');
        Route::get('/siswa/download-qr', [App\Http\Controllers\SiswaController::class, 'downloadQR'])->name('siswa.downloadQR');
    });
});

// ==========================================
// GENERATE AKUN SISWA (AMAN PAKAI TOKEN)
// ==========================================
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

Route::get('/generate-akun-siswa/{token}', function ($token) {
    // Ganti token sesuai keinginan kamu
    if ($token !== 'rahasia123') {
        abort(403, 'Token tidak valid!');
    }

    set_time_limit(0);
    $passwordDefault = Hash::make('siswa123');

    $semuaSiswa = DB::table('students')->get();
    $jumlahAkunBaru = 0;

    foreach ($semuaSiswa as $siswa) {
        $cekAkun = User::where('username', $siswa->nis)->first();

        if (!$cekAkun) {
            User::create([
                'username' => $siswa->nis,
                'password' => $passwordDefault,
                'role' => 'siswa'
            ]);

            $jumlahAkunBaru++;
        }
    }

    return "Selesai! Berhasil membuat {$jumlahAkunBaru} akun siswa baru yang tersisa.";
});
