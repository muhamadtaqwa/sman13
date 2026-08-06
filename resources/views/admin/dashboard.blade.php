@php
    /** @var array $ringkasanPerKegiatan */
    /** @var int|null $firstActivityId */
    /** @var array $chartData */
@endphp
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Beranda Admin - Sistem Informasi Monitoring</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>

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
            padding-bottom: 90px;
            position: relative;
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
            padding: 35px 20px 55px 20px;
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

        .logo-box {
            background: #ffffff;
            width: 50px;
            height: 50px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.12);
            position: relative;
            z-index: 1;
        }

        .logo-box img {
            max-width: 34px;
            max-height: 34px;
            object-fit: contain;
        }

        .header-text {
            position: relative;
            z-index: 1;
        }

        /* ========== MODERN CARD SKYEDU ========== */
        .modern-card {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            border-radius: var(--radius-lg);
            border: 1px solid var(--border-light);
            box-shadow: var(--shadow-md);
            padding: 16px;
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .clock-card {
            margin-top: -35px;
            position: relative;
            z-index: 10;
        }

        /* ========== SECTION TITLE ========== */
        .section-title {
            font-size: 0.8rem;
            font-weight: 700;
            color: var(--sky-blue);
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 12px;
            padding-left: 4px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .section-title::before {
            content: '';
            width: 4px;
            height: 18px;
            background: var(--sky-blue);
            border-radius: 2px;
        }

        /* ========== SHORTCUT ITEM ========== */
        .shortcut-item {
            text-decoration: none;
            color: var(--text-dark);
            display: block;
            padding: 10px 5px;
            transition: transform 0.2s ease;
        }

        .shortcut-item:active {
            transform: scale(0.95);
        }

        .icon-circle {
            width: 52px;
            height: 52px;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            margin: 0 auto 8px auto;
            transition: all 0.3s ease;
        }

        .icon-blue {
            background: linear-gradient(135deg, #EFF6FF, #DBEAFE);
            color: #3B82F6;
        }

        .icon-indigo {
            background: linear-gradient(135deg, #EEF2FF, #E0E7FF);
            color: #6366F1;
        }

        .icon-teal {
            background: linear-gradient(135deg, #F0FDF4, #DCFCE7);
            color: #10B981;
        }

        .shortcut-item:hover .icon-circle {
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(59, 130, 246, 0.15);
        }

        /* ========== BOTTOM NAV - SKY PILL ========== */
        .bottom-nav {
            position: fixed;
            bottom: 16px;
            left: 50%;
            transform: translateX(-50%);
            width: 92%;
            max-width: 450px;
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
            padding: 0 8px;
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
            min-width: 52px;
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

        /* Active state */
        .nav-link.active {
            color: #3B82F6;
            background: rgba(59, 130, 246, 0.08);
            font-weight: 700;
        }

        .nav-link.active i {
            color: #3B82F6;
        }

        /* ========== TAB STYLING ========== */
        .nav-tabs {
            border-bottom: 2px solid var(--border-light);
            flex-wrap: nowrap;
            overflow-x: auto;
            gap: 4px;
        }

        .nav-tabs .nav-link {
            border: none;
            color: #94A3B8;
            font-size: 0.72rem;
            font-weight: 600;
            padding: 10px 14px;
            white-space: nowrap;
            border-radius: 10px 10px 0 0;
            transition: all 0.3s ease;
            background: transparent;
        }

        .nav-tabs .nav-link.active {
            color: var(--sky-blue);
            background: rgba(255, 255, 255, 0.9);
            border-bottom: 3px solid var(--sky-blue);
            font-weight: 700;
        }

        .nav-tabs .nav-link:hover {
            color: var(--sky-blue);
            background: rgba(59, 130, 246, 0.04);
        }

        /* ========== RINGKASAN CARD ========== */
        .ringkasan-label {
            font-size: 0.78rem;
            font-weight: 600;
            color: var(--text-muted);
        }

        .ringkasan-value {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--text-dark);
        }

        /* ========== RESPONSIVE TOUCH ========== */
        @media (max-width: 400px) {
            .header-modern {
                padding: 25px 15px 45px 15px;
            }

            .icon-circle {
                width: 44px;
                height: 44px;
                font-size: 18px;
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

    <!-- Header Modern SkyEdu -->
    <div class="header-modern d-flex align-items-center justify-content-between">
        <div class="d-flex align-items-center">
            <div class="logo-box me-3">
                <img src="{{ asset('logo.png') }}" alt="Logo">
            </div>
            <div class="header-text">
                <h6 class="fw-bold mb-0" style="font-size: 1.1rem;">SMAN 13 Semarang</h6>
                <small class="text-white text-opacity-75" style="font-weight: 500;">Halo,
                    {{ Auth::user()->username ?? 'Admin' }}</small>
            </div>
        </div>
    </div>

    <div class="container px-4">

        <!-- Kartu Jam & Tanggal -->
        <div class="modern-card clock-card d-flex justify-content-center align-items-center gap-3 py-3 mb-4">
            <h2 id="liveClock" class="fw-bold text-dark mb-0" style="font-size: 2rem; letter-spacing: -0.5px;">00:00
            </h2>
            <div
                style="width: 2px; height: 35px; background: linear-gradient(180deg, #3B82F6, #93C5FD); border-radius: 2px;">
            </div>
            <div class="text-start">
                <div class="text-secondary" style="font-size: 0.65rem; font-weight: 700; letter-spacing: 1px;">HARI
                    INI
                </div>
                <div id="liveDate" style="color: #3b82f6; font-size: 0.85rem; font-weight: 600;">Memuat tanggal...</div>
            </div>
        </div>

        <!-- Ringkasan Statistik -->
        <div class="section-title">Ringkasan Kehadiran</div>
        <div class="row g-3 mb-4">
            <div class="col-6">
                <div class="modern-card h-100 d-flex flex-column justify-content-center">
                    <div class="d-flex justify-content-between align-items-center mb-1">
                        <span class="ringkasan-label">Hadir</span>
                        <i class="bi bi-check-circle-fill" style="color: #10b981; font-size: 1.1rem;"></i>
                    </div>
                    <h3 class="ringkasan-value mb-0" id="ringkasan-hadir">
                        {{ $ringkasanPerKegiatan[$firstActivityId]['hadir'] ?? 0 }}
                    </h3>
                </div>
            </div>
            <div class="col-6">
                <div class="modern-card h-100 d-flex flex-column justify-content-center">
                    <div class="d-flex justify-content-between align-items-center mb-1">
                        <span class="ringkasan-label">Belum</span>
                        <i class="bi bi-clock-fill" style="color: #f59e0b; font-size: 1.1rem;"></i>
                    </div>
                    <h3 class="ringkasan-value mb-0" id="ringkasan-belum">
                        {{ $ringkasanPerKegiatan[$firstActivityId]['belum'] ?? 0 }}
                    </h3>
                </div>
            </div>
        </div>

        <!-- Grafik Kehadiran per Kegiatan (TAB) -->
        <div class="section-title mt-3">Grafik Kehadiran per Kegiatan</div>
        <div class="modern-card mb-4 p-0">
            <!-- Tab Navigasi -->
            <ul class="nav nav-tabs px-3 pt-3" id="kegiatanTab" role="tablist">
                @foreach($chartData as $index => $activity)
                    <li class="nav-item" role="presentation">
                        <button class="nav-link {{ $index === 0 ? 'active' : '' }}" id="tab-{{ $activity['id'] }}"
                            data-bs-toggle="tab" data-bs-target="#panel-{{ $activity['id'] }}" type="button" role="tab">
                            📊 {{ $activity['nama'] }}
                        </button>
                    </li>
                @endforeach
            </ul>

            <!-- Tab Content -->
            <div class="tab-content p-3" id="kegiatanTabContent">
                @foreach($chartData as $index => $activity)
                    <div class="tab-pane fade {{ $index === 0 ? 'show active' : '' }}" id="panel-{{ $activity['id'] }}"
                        role="tabpanel">
                        <canvas id="chart-{{ $activity['id'] }}" height="200"></canvas>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Menu Utama -->
        <div class="section-title mt-2">Menu Utama</div>
        <div class="modern-card mb-4">
            <div class="row text-center g-2">
                <div class="col-4">
                    <a href="/admin/students" class="shortcut-item">
                        <div class="icon-circle icon-blue"><i class="bi bi-people-fill"></i></div>
                        <span style="font-size: 0.75rem; font-weight: 600;">Data Siswa</span>
                    </a>
                </div>
                <div class="col-4">
                    <a href="/admin/guru" class="shortcut-item">
                        <div class="icon-circle icon-indigo"><i class="bi bi-person-badge-fill"></i></div>
                        <span style="font-size: 0.75rem; font-weight: 600;">Data Guru</span>
                    </a>
                </div>
                <div class="col-4">
                    <a href="/admin/rekap" class="shortcut-item">
                        <div class="icon-circle icon-teal"><i class="bi bi-clipboard-data-fill"></i></div>
                        <span style="font-size: 0.75rem; font-weight: 600;">Rekap</span>
                    </a>
                </div>
            </div>
        </div>

    </div>

    <!-- Navigasi Bawah -->
    <!-- Navigasi Bawah - Sky Pill -->
    <div class="bottom-nav">
        <a href="/admin/dashboard" class="nav-link active">
            <i class="bi bi-house-door-fill"></i>
            <span>Beranda</span>
        </a>
        <a href="/admin/students" class="nav-link">
            <i class="bi bi-people-fill"></i>
            <span>Siswa</span>
        </a>
        <a href="/admin/guru" class="nav-link">
            <i class="bi bi-person-badge-fill"></i>
            <span>Guru</span>
        </a>
        <a href="/admin/rekap" class="nav-link">
            <i class="bi bi-clipboard-data-fill"></i>
            <span>Rekap</span>
        </a>
        <a href="/admin/settings" class="nav-link">
            <i class="bi bi-gear-fill"></i>
            <span>Profil</span>
        </a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Jam Digital
        function updateClock() {
            const now = new Date();
            const timeOptions = { hour: '2-digit', minute: '2-digit', hour12: false };
            document.getElementById('liveClock').textContent = now.toLocaleTimeString('id-ID', timeOptions).replace(/\./g, ':');
            const dateOptions = { weekday: 'long', day: 'numeric', month: 'short', year: 'numeric' };
            document.getElementById('liveDate').textContent = now.toLocaleDateString('id-ID', dateOptions);
        }
        updateClock();
        setInterval(updateClock, 1000);

        // Data dari Controller
        const chartData = @json($chartData);
        const ringkasanPerKegiatan = @json($ringkasanPerKegiatan);

        // Render grafik
        function renderChart(activityId) {
            const activity = chartData.find(a => a.id == activityId);
            if (!activity) return;

            const canvas = document.getElementById('chart-' + activityId);
            if (!canvas || canvas.chartInstance) return;

            const ctx = canvas.getContext('2d');
            canvas.chartInstance = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: activity.labels,
                    datasets: [{
                        label: 'Jumlah Kehadiran',
                        data: activity.data,
                        backgroundColor: [
                            'rgba(59, 130, 246, 0.85)',
                            'rgba(96, 165, 250, 0.85)',
                            'rgba(147, 197, 253, 0.85)',
                            'rgba(59, 130, 246, 0.7)',
                            'rgba(96, 165, 250, 0.7)',
                        ],
                        borderRadius: 10,
                        borderSkipped: false,
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                stepSize: 1,
                                precision: 0,
                                color: '#64748B',
                                font: {
                                    size: 11
                                }
                            },
                            grid: {
                                color: 'rgba(59, 130, 246, 0.06)',
                            }
                        },
                        x: {
                            ticks: {
                                color: '#64748B',
                                font: {
                                    size: 10
                                }
                            },
                            grid: {
                                display: false
                            }
                        }
                    }
                }
            });
        }

        // Render tab pertama saat halaman load
        const firstTab = chartData[0];
        if (firstTab) {
            renderChart(firstTab.id);
        }

        // Event saat tab diklik
        document.querySelectorAll('#kegiatanTab button[data-bs-toggle="tab"]').forEach(tabEl => {
            tabEl.addEventListener('shown.bs.tab', function (event) {
                const targetId = event.target.getAttribute('data-bs-target').replace('#panel-', '');

                // Update grafik
                renderChart(targetId);

                // Update ringkasan
                if (ringkasanPerKegiatan[targetId]) {
                    document.getElementById('ringkasan-hadir').textContent = ringkasanPerKegiatan[targetId].hadir;
                    document.getElementById('ringkasan-belum').textContent = ringkasanPerKegiatan[targetId].belum;
                }
            });
        });
    </script>

</body>

</html>