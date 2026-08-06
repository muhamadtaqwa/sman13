<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Rekap Saya - Sistem Informasi Monitoring</title>

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

        /* ========== FILTER CARD ========== */
        .filter-card {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            border-radius: 16px;
            border: 1px solid var(--border-light);
            box-shadow: var(--shadow-md);
            margin-bottom: 20px;
            margin-top: -25px;
            position: relative;
            z-index: 10;
        }

        /* Style select minimal - tidak ganggu Bootstrap */
        .filter-card select {
            font-weight: 700 !important;
            color: #3B82F6 !important;
            font-size: 0.9rem !important;
            cursor: pointer !important;
            background-color: transparent !important;
            border: none !important;
            box-shadow: none !important;
            outline: none !important;
        }

        /* ========== SUMMARY CARD ========== */
        .summary-card {
            background: linear-gradient(135deg, #3B82F6 0%, #60A5FA 100%);
            border-radius: 20px;
            padding: 25px 20px;
            color: white;
            text-align: center;
            box-shadow: 0 15px 35px rgba(59, 130, 246, 0.25);
            margin-bottom: 20px;
        }

        .summary-card h1 {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 0;
            letter-spacing: -2px;
        }

        .summary-card p {
            font-size: 0.85rem;
            font-weight: 500;
            opacity: 0.9;
            margin-bottom: 0;
        }

        /* ========== STAT GRID ========== */
        .stat-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
            margin-bottom: 25px;
        }

        .stat-box {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-radius: 16px;
            padding: 15px;
            border: 1px solid var(--border-light);
            box-shadow: var(--shadow-sm);
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .stat-icon {
            width: 45px;
            height: 45px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.3rem;
        }

        .stat-box .title {
            font-size: 0.7rem;
            font-weight: 700;
            color: #64748B;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .stat-box .value {
            font-size: 1.2rem;
            font-weight: 700;
            color: #1E293B;
            line-height: 1;
            margin-top: 4px;
        }

        /* ========== SECTION TITLE ========== */
        .section-title {
            font-size: 0.7rem;
            font-weight: 700;
            color: var(--sky-blue);
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 12px;
            padding-left: 4px;
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

        /* ========== BREAKDOWN CARD ========== */
        .breakdown-card {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-radius: 16px;
            padding: 20px;
            border: 1px solid var(--border-light);
            box-shadow: var(--shadow-md);
        }

        .breakdown-item {
            margin-bottom: 15px;
        }

        .breakdown-item:last-child {
            margin-bottom: 0;
        }

        .progress {
            height: 8px;
            border-radius: 10px;
            background-color: #F1F5F9;
            margin-top: 8px;
        }

        .progress-bar {
            border-radius: 10px;
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

            .summary-card h1 {
                font-size: 2.8rem;
            }
        }
    </style>
</head>

<body>

    <!-- Awan dekoratif -->
    <div class="cloud cloud-1"></div>
    <div class="cloud cloud-2"></div>

    <!-- Header -->
    <div class="header-modern d-flex align-items-center justify-content-between">
        <div class="d-flex align-items-center">
            <div class="logo-box me-3">
                <img src="{{ asset('logo.png') }}" alt="Logo"
                    onerror="this.src='https://ui-avatars.com/api/?name=SMAN&background=ffffff&color=3b82f6'">
            </div>
            <div>
                <h6 class="fw-bold mb-0" style="font-size: 1.1rem;">SMAN 13 Semarang</h6>
                <small class="text-white text-opacity-75" style="font-weight: 500;">Laporan Kehadiran</small>
            </div>
        </div>
    </div>

    <div class="container px-4">

        <!-- Filter Bulan -->
        <form method="GET" action="{{ route('siswa.rekap') }}">
            <div class="filter-card p-3">
                <div class="row align-items-center g-0">
                    <div class="col-auto pe-2">
                        <i class="bi bi-calendar3 fs-5" style="color: #3B82F6;"></i>
                    </div>
                    <div class="col">
                        <select name="bulan" class="form-select" onchange="this.form.submit()">
                            @foreach($availableMonths as $month)
                                @php
                                    $monthName = \Carbon\Carbon::createFromDate($month->year, $month->month, 1)->locale('id')->isoFormat('MMMM Y');
                                    $monthValue = $month->month;
                                @endphp
                                <option value="{{ $monthValue }}" {{ $selectedMonth == $monthValue ? 'selected' : '' }}>
                                    {{ $monthName }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </form>

        <!-- Ringkasan Persentase Utama -->
        <div class="summary-card">
            <p>Total Persentase Kehadiran</p>
            <h1>{{ $persentase }}<span style="font-size: 2rem;">%</span></h1>
            <div class="d-inline-block bg-white bg-opacity-25 rounded-pill px-3 py-1 mt-2" style="font-size: 0.75rem;">
                Status: <span class="fw-bold">{{ $statusKehadiran }}</span>
            </div>
        </div>

        <!-- Grid Statistik 4 Kotak -->
        <div class="stat-grid">
            <div class="stat-box">
                <div class="stat-icon bg-success bg-opacity-10 text-success">
                    <i class="bi bi-check-circle-fill"></i>
                </div>
                <div>
                    <div class="title">Hadir</div>
                    <div class="value">{{ $totalHadir }} <span class="fw-normal text-secondary"
                            style="font-size: 0.7rem;">kali</span></div>
                </div>
            </div>
            <div class="stat-box">
                <div class="stat-icon bg-warning bg-opacity-10 text-warning">
                    <i class="bi bi-info-circle-fill"></i>
                </div>
                <div>
                    <div class="title">Izin</div>
                    <div class="value">{{ $totalIzin }} <span class="fw-normal text-secondary"
                            style="font-size: 0.7rem;">kali</span></div>
                </div>
            </div>
            <div class="stat-box">
                <div class="stat-icon" style="background: #fdf2f8; color: #db2777;">
                    <i class="bi bi-heart-pulse-fill"></i>
                </div>
                <div>
                    <div class="title">Sakit</div>
                    <div class="value">{{ $totalSakit }} <span class="fw-normal text-secondary"
                            style="font-size: 0.7rem;">kali</span></div>
                </div>
            </div>
            <div class="stat-box">
                <div class="stat-icon bg-danger bg-opacity-10 text-danger">
                    <i class="bi bi-x-circle-fill"></i>
                </div>
                <div>
                    <div class="title">Alpha</div>
                    <div class="value">{{ $totalAlpha }} <span class="fw-normal text-secondary"
                            style="font-size: 0.7rem;">kali</span></div>
                </div>
            </div>
        </div>

        <!-- Rincian Per Kegiatan -->
        <div class="section-title">RINCIAN PER KEGIATAN</div>

        <div class="breakdown-card mb-4">
            @forelse($rincianKegiatan as $kegiatan)
                @php
                    if ($kegiatan['persentase'] >= 90) {
                        $barColor = 'bg-success';
                    } elseif ($kegiatan['persentase'] >= 75) {
                        $barColor = 'bg-primary';
                    } elseif ($kegiatan['persentase'] >= 60) {
                        $barColor = 'bg-warning';
                    } else {
                        $barColor = 'bg-danger';
                    }

                    $icon = '';
                    $nama = strtolower($kegiatan['nama']);
                    if (strpos($nama, 'pagi') !== false)
                        $icon = '';
                    elseif (strpos($nama, 'dhuha') !== false)
                        $icon = '';
                    elseif (strpos($nama, 'dhuhur') !== false)
                        $icon = '';
                    elseif (strpos($nama, 'ashar') !== false)
                        $icon = '';
                @endphp

                <div class="breakdown-item">
                    <div class="d-flex justify-content-between align-items-center mb-1">
                        <span class="fw-bold text-dark" style="font-size: 0.85rem;">
                            {{ $icon }} {{ $kegiatan['nama'] }}
                        </span>
                        <span class="fw-bold"
                            style="font-size: 0.8rem; color: {{ $kegiatan['persentase'] >= 75 ? '#059669' : ($kegiatan['persentase'] >= 60 ? '#d97706' : '#dc2626') }};">
                            {{ $kegiatan['persentase'] }}%
                        </span>
                    </div>
                    <div class="progress">
                        <div class="progress-bar {{ $barColor }}" role="progressbar"
                            style="width: {{ $kegiatan['persentase'] }}%;"></div>
                    </div>
                </div>
            @empty
                <div class="text-center text-muted py-3">
                    <i class="bi bi-info-circle"></i> Belum ada data kegiatan
                </div>
            @endforelse
        </div>

    </div>

    <!-- Navigasi Bawah - Sky Pill -->
    <div class="bottom-nav">
        <a href="/siswa/dashboard" class="nav-link">
            <i class="bi bi-qr-code-scan"></i>
            <span>Beranda</span>
        </a>
        <a href="/siswa/riwayat" class="nav-link">
            <i class="bi bi-clock-history"></i>
            <span>Riwayat</span>
        </a>
        <a href="/siswa/rekap" class="nav-link active">
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