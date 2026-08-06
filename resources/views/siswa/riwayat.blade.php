<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Riwayat Kehadiran - SIM 13</title>

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
            0%, 100% { transform: translateX(0) translateY(0); }
            25% { transform: translateX(25px) translateY(-12px); }
            50% { transform: translateX(-12px) translateY(6px); }
            75% { transform: translateX(18px) translateY(-8px); }
        }

        /* ========== HEADER SKYEDU ========== */
        .header-modern {
            background: linear-gradient(160deg, #3B82F6 0%, #60A5FA 50%, #93C5FD 100%);
            padding: 25px 20px 35px 20px;
            border-bottom-left-radius: 28px;
            border-bottom-right-radius: 28px;
            color: white;
            box-shadow: 0 8px 35px rgba(59, 130, 246, 0.2);
            margin-bottom: 25px;
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

        /* ========== SUMMARY CARD ========== */
        .summary-card {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            border-radius: 16px;
            padding: 20px;
            box-shadow: var(--shadow-md);
            border: 1px solid var(--border-light);
            margin-bottom: 20px;
        }

        .summary-item {
            text-align: center;
        }

        .summary-icon {
            width: 45px;
            height: 45px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 8px;
            font-size: 1.3rem;
        }

        .summary-count {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 2px;
        }

        .summary-label {
            font-size: 0.7rem;
            color: var(--text-muted);
            font-weight: 600;
        }

        /* ========== DATE GROUP ========== */
        .date-group {
            margin-bottom: 25px;
        }

        .date-header {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 12px;
            padding: 0 4px;
        }

        .date-badge {
            background: linear-gradient(135deg, #3B82F6, #60A5FA);
            color: white;
            padding: 6px 14px;
            border-radius: 50px;
            font-size: 0.78rem;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            box-shadow: 0 4px 15px rgba(59, 130, 246, 0.25);
        }

        .date-line {
            flex: 1;
            height: 2px;
            background: linear-gradient(90deg, #BFDBFE, transparent);
            border-radius: 2px;
        }

        /* ========== LOG CARD ========== */
        .log-card {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-radius: 14px;
            padding: 16px;
            margin-bottom: 10px;
            box-shadow: var(--shadow-sm);
            border: 1px solid var(--border-light);
            display: flex;
            align-items: center;
            gap: 14px;
            transition: all 0.2s ease;
        }

        .log-card:active {
            transform: scale(0.98);
            background: rgba(59, 130, 246, 0.02);
        }

        .log-time {
            font-size: 0.7rem;
            color: var(--text-muted);
            font-weight: 500;
            min-width: 45px;
            text-align: center;
        }

        .log-icon {
            width: 42px;
            height: 42px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.1rem;
            flex-shrink: 0;
        }

        .log-info {
            flex: 1;
        }

        .log-title {
            font-size: 0.9rem;
            font-weight: 600;
            color: #1E293B;
            margin-bottom: 2px;
        }

        .log-petugas {
            font-size: 0.7rem;
            color: #94A3B8;
            font-weight: 500;
        }

        .log-status {
            padding: 5px 12px;
            border-radius: 8px;
            font-size: 0.7rem;
            font-weight: 700;
            white-space: nowrap;
        }

        .status-hadir {
            background: #D1FAE5;
            color: #059669;
        }

        .status-sakit {
            background: #FEE2E2;
            color: #DC2626;
        }

        .status-izin {
            background: #FEF3C7;
            color: #D97706;
        }

        .status-alpha {
            background: #F1F5F9;
            color: #64748B;
        }

        /* ========== EMPTY STATE ========== */
        .empty-state {
            text-align: center;
            padding: 60px 20px;
        }

        .empty-state i {
            font-size: 4rem;
            color: #93C5FD;
            margin-bottom: 15px;
        }

        .empty-state p {
            color: #94A3B8;
            font-weight: 500;
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
                padding: 20px 15px 25px 15px;
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
                    <small class="text-white text-opacity-75" style="font-weight: 500;">Riwayat Kehadiran</small>
                </div>
            </div>
        </div>

        <div class="text-center">
            <h4 class="fw-bold text-white mb-1">{{ $siswa->nama_lengkap ?? Auth::user()->username }}</h4>
            <span class="badge bg-white bg-opacity-25 text-white px-3 py-1 rounded-pill"
                style="font-size: 0.75rem; font-weight: 500;">
                Kelas {{ $siswa->kode_kelas ?? '' }}
            </span>
        </div>
    </div>

    <div class="container px-4">

        @php
            $currentMonth = now()->format('Y-m');
            $logsBulanIni = collect();
            foreach ($riwayat as $logs) {
                foreach ($logs as $log) {
                    if (\Carbon\Carbon::parse($log->created_at)->format('Y-m') === $currentMonth) {
                        $logsBulanIni->push($log);
                    }
                }
            }
            $totalHadir = $logsBulanIni->where('status_kehadiran', 'Hadir')->count();
            $totalSakit = $logsBulanIni->where('status_kehadiran', 'Sakit')->count();
            $totalIzin = $logsBulanIni->where('status_kehadiran', 'Izin')->count();
            $totalAlpha = $logsBulanIni->where('status_kehadiran', 'Alpha')->count();
        @endphp

        <div class="summary-card">
            <div class="row g-2">
                <div class="col-3 summary-item">
                    <div class="summary-icon" style="background: #D1FAE5;">
                        <i class="bi bi-check-circle-fill text-success"></i>
                    </div>
                    <div class="summary-count text-success">{{ $totalHadir }}</div>
                    <div class="summary-label">Hadir</div>
                </div>
                <div class="col-3 summary-item">
                    <div class="summary-icon" style="background: #FEE2E2;">
                        <i class="bi bi-heart-pulse-fill text-danger"></i>
                    </div>
                    <div class="summary-count text-danger">{{ $totalSakit }}</div>
                    <div class="summary-label">Sakit</div>
                </div>
                <div class="col-3 summary-item">
                    <div class="summary-icon" style="background: #FEF3C7;">
                        <i class="bi bi-envelope-paper-fill text-warning"></i>
                    </div>
                    <div class="summary-count text-warning">{{ $totalIzin }}</div>
                    <div class="summary-label">Izin</div>
                </div>
                <div class="col-3 summary-item">
                    <div class="summary-icon" style="background: #F1F5F9;">
                        <i class="bi bi-x-circle-fill text-secondary"></i>
                    </div>
                    <div class="summary-count text-secondary">{{ $totalAlpha }}</div>
                    <div class="summary-label">Alpha</div>
                </div>
            </div>
        </div>

        @if($riwayat->count() > 0)
            @foreach($riwayat as $tanggal => $logs)
                <div class="date-group">
                    <div class="date-header">
                        <div class="date-badge">
                            <i class="bi bi-calendar3"></i>
                            {{ \Carbon\Carbon::parse($tanggal)->locale('id')->isoFormat('dddd, D MMMM Y') }}
                        </div>
                        <div class="date-line"></div>
                    </div>

                    @foreach($logs as $log)
                        @php
                            $namaKegiatan = strtolower($log->activity->nama_kegiatan ?? '');

                            $iconBg = 'bg-light';
                            $iconClass = 'bi-calendar-check';
                            $iconColor = 'text-secondary';

                            if (strpos($namaKegiatan, 'pagi') !== false) {
                                $iconBg = 'bg-warning bg-opacity-10';
                                $iconClass = 'bi-sun-fill';
                                $iconColor = 'text-warning';
                            } elseif (strpos($namaKegiatan, 'dhuha') !== false) {
                                $iconBg = 'bg-primary bg-opacity-10';
                                $iconClass = 'bi-brightness-alt-high-fill';
                                $iconColor = 'text-primary';
                            } elseif (strpos($namaKegiatan, 'dhuhur') !== false) {
                                $iconBg = 'bg-info bg-opacity-10';
                                $iconClass = 'bi-clock-fill';
                                $iconColor = 'text-info';
                            } elseif (strpos($namaKegiatan, 'ashar') !== false) {
                                $iconBg = 'bg-danger bg-opacity-10';
                                $iconClass = 'bi-sunset-fill';
                                $iconColor = 'text-danger';
                            }

                            $statusClass = match (strtolower($log->status_kehadiran)) {
                                'hadir' => 'status-hadir',
                                'sakit' => 'status-sakit',
                                'izin' => 'status-izin',
                                default => 'status-alpha'
                            };
                        @endphp

                        <div class="log-card">
                            <div class="log-time">
                                {{ \Carbon\Carbon::parse($log->created_at)->format('H:i') }}
                            </div>

                            <div class="log-icon {{ $iconBg }}">
                                <i class="bi {{ $iconClass }} {{ $iconColor }}"></i>
                            </div>

                            <div class="log-info">
                                <div class="log-title">{{ $log->activity->nama_kegiatan ?? 'Kegiatan' }}</div>
                                <div class="log-petugas">
                                    <i class="bi bi-person-check me-1"></i>
                                    Petugas ID: {{ $log->id_petugas ?? '-' }}
                                </div>
                            </div>

                            <span class="log-status {{ $statusClass }}">
                                {{ $log->status_kehadiran }}
                            </span>
                        </div>
                    @endforeach
                </div>
            @endforeach
        @else
            <div class="empty-state">
                <i class="bi bi-inbox"></i>
                <p class="mb-0">Belum ada riwayat kehadiran</p>
                <small class="text-muted">Data kehadiran akan muncul di sini</small>
            </div>
        @endif

    </div>

    <!-- Bottom Nav - Sky Pill -->
    <div class="bottom-nav">
        <a href="/siswa/dashboard" class="nav-link">
            <i class="bi bi-qr-code-scan"></i>
            <span>Beranda</span>
        </a>
        <a href="/siswa/riwayat" class="nav-link active">
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
</body>

</html>