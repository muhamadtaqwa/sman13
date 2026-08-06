<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Beranda Siswa - Sistem Informasi Monitoring</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

    <style>
        :root {
            --sky-blue: #3B82F6;
            --sky-light: #60A5FA;
            --sky-soft: #93C5FD;
            --cloud-white: #FFFFFF;
            --cloud-soft: #F8FAFC;
            --text-dark: #1E3A5F;
            --text-muted: #64748B;
            --border-light: rgba(59, 130, 246, 0.1);
            --shadow-sm: 0 2px 8px rgba(59, 130, 246, 0.06);
            --shadow-md: 0 8px 25px rgba(59, 130, 246, 0.1);
            --shadow-lg: 0 15px 40px rgba(59, 130, 246, 0.12);
            --radius-xl: 24px;
            --radius-lg: 18px;
            --radius-md: 14px;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(180deg, #EBF2FF 0%, #F0F4FF 30%, #FFFFFF 100%);
            color: var(--text-dark);
            min-height: 100vh;
            padding-bottom: 100px;
        }

        /* ========== AWAN DEKORATIF ========== */
        .cloud {
            position: fixed;
            background: rgba(255, 255, 255, 0.6);
            border-radius: 50%;
            filter: blur(60px);
            z-index: 0;
            pointer-events: none;
            animation: floatCloud 25s infinite ease-in-out;
        }

        .cloud-1 {
            width: 220px;
            height: 120px;
            top: 8%;
            right: -8%;
            animation-delay: 0s;
        }

        .cloud-2 {
            width: 180px;
            height: 100px;
            bottom: 15%;
            left: -6%;
            animation-delay: -10s;
        }

        @keyframes floatCloud {

            0%,
            100% {
                transform: translateX(0) translateY(0);
            }

            25% {
                transform: translateX(25px) translateY(-12px);
            }

            50% {
                transform: translateX(-12px) translateY(6px);
            }

            75% {
                transform: translateX(18px) translateY(-8px);
            }
        }

        /* ========== HEADER SKYEDU ========== */
        .header-modern {
            background: linear-gradient(160deg, #3B82F6 0%, #60A5FA 50%, #93C5FD 100%);
            padding: 25px 20px 45px 20px;
            border-bottom-left-radius: 28px;
            border-bottom-right-radius: 28px;
            color: white;
            box-shadow: 0 8px 35px rgba(59, 130, 246, 0.2);
            position: relative;
            overflow: hidden;
        }

        .header-modern::before {
            content: '';
            position: absolute;
            top: -40%;
            right: -20%;
            width: 200px;
            height: 200px;
            background: rgba(255, 255, 255, 0.08);
            border-radius: 50%;
            pointer-events: none;
        }

        .header-modern::after {
            content: '';
            position: absolute;
            bottom: -30%;
            left: -10%;
            width: 150px;
            height: 150px;
            background: rgba(255, 255, 255, 0.06);
            border-radius: 50%;
            pointer-events: none;
        }

        .logo-box img {
            width: 45px;
            height: 45px;
            object-fit: contain;
            background-color: white;
            border-radius: 50%;
            padding: 4px;
            position: relative;
            z-index: 1;
        }

        .notif-icon {
            background: rgba(255, 255, 255, 0.25);
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            z-index: 1;
        }

        /* ========== QR CARD ========== */
        .qr-card {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            border-radius: 24px;
            border: 1px solid var(--border-light);
            box-shadow: var(--shadow-lg);
            padding: 35px 25px 25px;
            text-align: center;
            margin-top: -25px;
            position: relative;
            z-index: 10;
            overflow: hidden;
        }

        .qr-card::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 6px;
            background: linear-gradient(90deg, #3B82F6, #60A5FA, #93C5FD);
        }

        .qr-badge {
            display: inline-block;
            background: rgba(59, 130, 246, 0.08);
            color: #2563EB;
            padding: 8px 20px;
            border-radius: 50px;
            font-size: 0.75rem;
            font-weight: 700;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            margin-bottom: 25px;
            border: 1px solid rgba(59, 130, 246, 0.15);
        }

        .qr-code-wrapper {
            background: #FFFFFF;
            padding: 15px;
            border-radius: 20px;
            display: inline-block;
            box-shadow: 0 8px 25px rgba(59, 130, 246, 0.08);
            border: 2px dashed #BFDBFE;
            margin-bottom: 20px;
            transition: transform 0.3s ease;
        }

        .qr-code-wrapper:hover {
            transform: scale(1.02);
        }

        .qr-code-wrapper img {
            width: 200px;
            height: 200px;
            object-fit: contain;
            display: block;
        }

        .student-info {
            margin-top: 5px;
        }

        .student-name {
            font-size: 1.3rem;
            font-weight: 700;
            color: #1E293B;
            margin-bottom: 5px;
            letter-spacing: -0.3px;
        }

        .student-class {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: #F0F4FF;
            color: #1E40AF;
            padding: 6px 16px;
            border-radius: 50px;
            font-size: 0.85rem;
            font-weight: 600;
            border: 1px solid #DBEAFE;
        }

        .student-class i {
            font-size: 0.9rem;
            color: #3B82F6;
        }

        .nis-badge {
            display: block;
            margin-top: 12px;
            font-size: 0.7rem;
            color: #94A3B8;
            font-weight: 500;
            letter-spacing: 0.3px;
        }

        /* ========== DOWNLOAD QR BUTTON ========== */
        .btn-download-qr {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: linear-gradient(135deg, #3B82F6, #60A5FA);
            color: white;
            padding: 10px 24px;
            border-radius: 50px;
            font-size: 0.8rem;
            font-weight: 600;
            text-decoration: none;
            margin-top: 18px;
            transition: all 0.3s ease;
            box-shadow: 0 8px 25px rgba(59, 130, 246, 0.3);
            border: none;
            cursor: pointer;
        }

        .btn-download-qr:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 35px rgba(59, 130, 246, 0.4);
            color: white;
        }

        .btn-download-qr:active {
            transform: translateY(0);
        }

        /* ========== SECTION TITLE ========== */
        .section-title {
            font-size: 0.7rem;
            font-weight: 700;
            color: var(--sky-blue);
            text-transform: uppercase;
            letter-spacing: 1px;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .section-title::before {
            content: '';
            width: 3px;
            height: 14px;
            background: var(--sky-blue);
            border-radius: 2px;
        }

        /* ========== ACTIVITY CARD ========== */
        .activity-card {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-radius: 16px;
            padding: 20px;
            box-shadow: var(--shadow-md);
            border: 1px solid var(--border-light);
        }

        .activity-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 0;
            border-bottom: 1px dashed var(--border-light);
        }

        .activity-item:last-child {
            border-bottom: none;
            padding-bottom: 0;
        }

        .act-title {
            font-size: 0.9rem;
            font-weight: 600;
            color: #334155;
        }

        .badge-status {
            padding: 6px 12px;
            border-radius: 8px;
            font-size: 0.7rem;
            font-weight: 700;
        }

        .status-hadir {
            background: #D1FAE5;
            color: #059669;
        }

        .status-sakit {
            background: #FEF3C7;
            color: #D97706;
        }

        .status-izin {
            background: #FEF3C7;
            color: #D97706;
        }

        .status-belum {
            background: #F1F5F9;
            color: #64748B;
        }

        /* ========== ALERT ========== */
        .alert-custom {
            position: fixed;
            top: 20px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 9999;
            min-width: 300px;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
            animation: slideDown 0.3s ease;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateX(-50%) translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateX(-50%) translateY(0);
            }
        }

        /* ========== BOTTOM NAV - SKY PILL ========== */
        .bottom-nav {
            position: fixed;
            bottom: 16px;
            left: 50%;
            transform: translateX(-50%);
            width: 90%;
            max-width: 400px;
            height: 68px;
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(25px);
            -webkit-backdrop-filter: blur(25px);
            border-radius: 24px;
            display: flex;
            justify-content: space-around;
            align-items: center;
            z-index: 1000;
            box-shadow: 0 10px 40px rgba(59, 130, 246, 0.15);
            border: 1px solid rgba(59, 130, 246, 0.1);
            padding: 0 12px;
            padding-bottom: env(safe-area-inset-bottom, 0px);
        }

        .nav-link {
            text-decoration: none;
            color: #94A3B8;
            font-size: 0.62rem;
            text-align: center;
            font-weight: 600;
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
            padding: 6px 4px;
            border-radius: 16px;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 3px;
            position: relative;
            min-width: 60px;
        }

        .nav-link i {
            font-size: 1.3rem;
            transition: all 0.3s ease;
        }

        .nav-link span {
            font-size: 0.6rem;
            letter-spacing: 0.2px;
            white-space: nowrap;
        }

        .nav-link.active {
            color: #3B82F6;
            background: rgba(59, 130, 246, 0.08);
            font-weight: 700;
        }

        .nav-link.active i {
            color: #3B82F6;
        }

        /* ========== RESPONSIVE ========== */
        @media (max-width: 400px) {
            .header-modern {
                padding: 20px 15px 35px 15px;
            }

            .bottom-nav {
                width: 95%;
                height: 62px;
                bottom: 10px;
            }

            .nav-link i {
                font-size: 1.15rem;
            }

            .nav-link span {
                font-size: 0.55rem;
            }
        }
    </style>
</head>

<body>

    <!-- Awan dekoratif -->
    <div class="cloud cloud-1"></div>
    <div class="cloud cloud-2"></div>

    <!-- ✅ Alert Sukses/Error -->
    @if(session('success'))
        <div class="alert alert-success alert-custom alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-custom alert-dismissible fade show" role="alert">
            <i class="bi bi-exclamation-triangle-fill me-2"></i>{{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <!-- Header Modern -->
    <div class="header-modern">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <div class="d-flex align-items-center">
                <div class="logo-box me-3">
                    <img src="{{ asset('logo.png') }}" alt="Logo"
                        onerror="this.src='https://ui-avatars.com/api/?name=SMAN&background=ffffff&color=3b82f6'">
                </div>
                <div>
                    <h6 class="fw-bold mb-0" style="font-size: 1.1rem;">SMAN 13 Semarang</h6>
                    <small class="text-white text-opacity-75" style="font-weight: 500;">Portal Siswa</small>
                </div>
            </div>
            <div class="notif-icon">
                <i class="bi bi-bell-fill text-white"></i>
            </div>
        </div>

        <div>
            <h4 class="fw-bold text-white mb-0">Halo, {{ $siswa->nama_lengkap ?? Auth::user()->username ?? 'Siswa' }}!
                </h4>
            <p class="text-white text-opacity-75 small fw-medium mt-1 mb-0">Siapkan QR Code ini saat kegiatan
                berlangsung.</p>
        </div>
    </div>

    <div class="container px-4">

        <!-- Kartu Identitas & QR Code -->
        <div class="qr-card">
            <div class="qr-badge">
                <i class="bi bi-person-badge me-1"></i> Kartu Identitas Digital
            </div>

            <div class="qr-code-wrapper">
                <img src="https://api.qrserver.com/v1/create-qr-code/?size=250x250&data={{ $siswa->kode_qr ?? $siswa->nis ?? Auth::user()->username }}&bgcolor=ffffff&color=1e293b"
                    alt="QR Code Siswa">
            </div>

            <div class="student-info">
                <h3 class="student-name">
                    {{ $siswa->nama_lengkap ?? Auth::user()->username ?? 'Nama Siswa' }}
                </h3>

                <div class="student-class">
                    <i class="bi bi-mortarboard-fill"></i>
                    Kelas {{ $siswa->kode_kelas ?? 'Belum diatur' }}
                </div>

                <span class="nis-badge">
                    NIS: {{ $siswa->nis ?? Auth::user()->username }}
                </span>
            </div>

            <!-- ✅ Tombol Download QR Code -->
            <a href="{{ route('siswa.downloadQR') }}" class="btn-download-qr">
                <i class="bi bi-download"></i> Unduh QR Code
            </a>
        </div>

        <!-- Ringkasan Hari Ini -->
        <div class="d-flex justify-content-between align-items-end mb-3 mt-4 px-1">
            <div class="section-title">STATUS HARI INI</div>
            <div class="text-primary" style="font-size: 0.8rem; font-weight: 600;" id="liveDate">Memuat...</div>
        </div>

        <div class="activity-card mb-4">
            @forelse($activities as $activity)
                @php
                    $log = $attendanceToday->get($activity->id);
                    $status = $log ? $log->status_kehadiran : 'Belum';

                    $icon = 'bi-calendar-check fs-5';
                    $iconColor = 'text-secondary';

                    if (stripos($activity->nama_kegiatan, 'pagi') !== false) {
                        $icon = 'bi-sun-fill fs-5';
                        $iconColor = 'text-warning';
                    } elseif (stripos($activity->nama_kegiatan, 'dhuha') !== false) {
                        $icon = 'bi-brightness-alt-high-fill fs-5';
                        $iconColor = 'text-primary';
                    } elseif (stripos($activity->nama_kegiatan, 'dhuhur') !== false) {
                        $icon = 'bi-clock-fill fs-5';
                        $iconColor = 'text-info';
                    } elseif (stripos($activity->nama_kegiatan, 'ashar') !== false) {
                        $icon = 'bi-sunset-fill fs-5';
                        $iconColor = 'text-danger';
                    }
                @endphp

                <div class="activity-item">
                    <div class="d-flex align-items-center gap-2">
                        <i class="bi {{ $icon }} {{ $iconColor }}"></i>
                        <span class="act-title">{{ $activity->nama_kegiatan }}</span>
                    </div>

                    @if(strtolower($status) === 'hadir')
                        <span class="badge-status status-hadir">
                            <i class="bi bi-check-lg me-1"></i>Hadir
                        </span>
                    @elseif(strtolower($status) === 'selesai')
                        <span class="badge-status status-hadir">
                            <i class="bi bi-check-lg me-1"></i>Selesai
                        </span>
                    @elseif(strtolower($status) === 'sakit')
                        <span class="badge-status status-sakit">
                            <i class="bi bi-exclamation-lg me-1"></i>Sakit
                        </span>
                    @elseif(strtolower($status) === 'izin')
                        <span class="badge-status status-izin">
                            <i class="bi bi-exclamation-lg me-1"></i>Izin
                        </span>
                    @else
                        <span class="badge-status status-belum">
                            <i class="bi bi-dash-lg me-1"></i>Belum
                        </span>
                    @endif
                </div>
            @empty
                <div class="text-center text-muted py-3">
                    <i class="bi bi-info-circle"></i> Belum ada kegiatan
                </div>
            @endforelse
        </div>

    </div>

    <!-- Navigasi Bawah - Sky Pill -->
    <div class="bottom-nav">
        <a href="/siswa/dashboard" class="nav-link active">
            <i class="bi bi-qr-code-scan"></i>
            <span>Beranda</span>
        </a>
        <a href="/siswa/riwayat" class="nav-link">
            <i class="bi bi-clock-history"></i>
            <span>Riwayat</span>
        </a>
        <a href="/siswa/rekap" class="nav-link">
            <i class="bi bi-clipboard-data-fill"></i>
            <span>Rekap</span>
        </a>
        <a href="/siswa/settings" class="nav-link">
            <i class="bi bi-gear-fill"></i>
            <span>Profil</span>
        </a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const dateOptions = { day: 'numeric', month: 'long', year: 'numeric' };
        document.getElementById('liveDate').textContent = new Date().toLocaleDateString('id-ID', dateOptions);

        // ✅ Auto hide alert setelah 3 detik
        setTimeout(function () {
            const alerts = document.querySelectorAll('.alert-custom');
            alerts.forEach(function (alert) {
                const bsAlert = new bootstrap.Alert(alert);
                bsAlert.close();
            });
        }, 3000);
    </script>

</body>

</html>