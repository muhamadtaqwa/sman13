<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Rekap Data - Sistem Informasi Monitoring</title>

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
            padding: 35px 20px 50px 20px;
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

        .header-icon {
            background: rgba(255, 255, 255, 0.2);
            width: 48px;
            height: 48px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            backdrop-filter: blur(5px);
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
            margin-bottom: 12px;
            padding: 16px;
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .form-select-custom {
            border-radius: 12px;
            background-color: #F8FAFC;
            border: 1.5px solid var(--border-light);
            padding: 12px 16px;
            font-size: 0.9rem;
            font-weight: 600;
            color: var(--text-dark);
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .form-select-custom:focus {
            border-color: #3B82F6;
            box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.12);
        }

        .avatar-circle {
            width: 42px;
            height: 42px;
            border-radius: 14px;
            background: linear-gradient(135deg, #F0FDF4, #DCFCE7);
            color: #10B981;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1rem;
            font-weight: 700;
            margin-right: 15px;
        }

        .stat-badge {
            font-size: 0.7rem;
            padding: 6px 10px;
            border-radius: 10px;
            font-weight: 700;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 4px;
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
                padding: 25px 15px 45px 15px;
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

            .stat-badge {
                font-size: 0.65rem;
                padding: 5px 8px;
            }
        }
    </style>
</head>

<body>

    <!-- Awan dekoratif -->
    <div class="cloud cloud-1"></div>
    <div class="cloud cloud-2"></div>

    <div class="header-modern d-flex justify-content-between align-items-center">
        <div>
            <h4 class="fw-bold mb-0" style="font-size: 1.25rem;">Rekapitulasi</h4>
            <small class="text-white text-opacity-75" style="font-weight: 500;">Pantau Laporan Kehadiran</small>
        </div>
        <div class="header-icon">
            <i class="bi bi-file-earmark-bar-graph fs-4 text-white"></i>
        </div>
    </div>

    <div class="container px-4" style="margin-top: -20px; position: relative; z-index: 10;">

        <!-- Filter Kelas -->
        <div class="modern-card p-3 mb-3">
            <form action="/admin/rekap" method="GET" class="d-flex gap-2 m-0">
                <div class="flex-grow-1">
                    <select name="kelas" class="form-select form-select-custom" onchange="this.form.submit()">
                        <option value="">Semua Kelas</option>
                        @foreach($daftar_kelas as $kls)
                            <option value="{{ $kls }}" {{ request('kelas') == $kls ? 'selected' : '' }}>{{ $kls }}</option>
                        @endforeach
                    </select>
                </div>
                <a href="/admin/rekap" class="btn btn-light rounded-3 d-flex align-items-center justify-content-center"
                    style="border: 1px solid var(--border-light); width: 48px; color: #64748b;">
                    <i class="bi bi-arrow-clockwise fs-5"></i>
                </a>
            </form>
        </div>

        <!-- Info -->
        <div class="d-flex justify-content-between align-items-end mb-3 px-1">
            <div>
                <div style="font-size: 0.7rem; font-weight: 700; color: var(--sky-blue); letter-spacing: 0.5px;">
                    MENAMPILKAN
                </div>
                <div class="fw-bold" style="color: var(--sky-blue); font-size: 0.95rem;">{{ $kelas_terpilih }}</div>
            </div>
            <div class="badge bg-white text-secondary border shadow-sm rounded-pill px-3 py-2 fw-bold"
                style="font-size: 0.75rem; border-color: var(--border-light) !important;">
                {{ $students->count() }} Siswa
            </div>
        </div>

        <!-- Daftar Siswa -->
        <div class="row g-0">
            @forelse($students as $student)
                <div class="col-12">
                    <div class="modern-card p-3">
                        <div class="d-flex align-items-center mb-3">
                            <div class="avatar-circle">
                                {{ strtoupper(substr($student->nama_lengkap, 0, 1)) }}
                            </div>
                            <div>
                                <div class="fw-bold text-dark" style="font-size: 0.9rem;">{{ $student->nama_lengkap }}</div>
                                <div class="text-secondary" style="font-size: 0.75rem; font-weight: 500;">
                                    {{ $student->nis }} <span class="mx-1">•</span> {{ $student->kode_kelas }}
                                </div>
                            </div>
                        </div>

                        <div class="d-flex gap-2 border-top pt-3" style="border-color: var(--border-light) !important;">
                            <div class="bg-success bg-opacity-10 text-success stat-badge flex-fill">
                                <i class="bi bi-check-circle-fill"></i> {{ $rekap[$student->nis]['hadir'] ?? 0 }} Hadir
                            </div>
                            <div class="bg-warning bg-opacity-10 stat-badge flex-fill" style="color: #d97706 !important;">
                                <i class="bi bi-envelope-fill"></i> {{ $rekap[$student->nis]['izin'] ?? 0 }} Izin
                            </div>
                            <div class="bg-danger bg-opacity-10 text-danger stat-badge flex-fill">
                                <i class="bi bi-x-circle-fill"></i> {{ $rekap[$student->nis]['alpa'] ?? 0 }} Alpa
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5 mt-2">
                    <div style="color: #93C5FD; margin-bottom: 15px;"><i class="bi bi-search" style="font-size: 4rem;"></i>
                    </div>
                    <h6 class="fw-bold text-dark">Data tidak ditemukan</h6>
                    <p class="small text-secondary mb-0">Belum ada siswa di kelas ini atau filter yang Anda cari kosong.</p>
                </div>
            @endforelse
        </div>
    </div>

    <!-- Navigasi Bawah - Sky Pill -->
    <div class="bottom-nav">
        <a href="/admin/dashboard" class="nav-link">
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
        <a href="/admin/rekap" class="nav-link active">
            <i class="bi bi-clipboard-data-fill"></i>
            <span>Rekap</span>
        </a>
        <a href="/admin/settings" class="nav-link">
            <i class="bi bi-gear-fill"></i>
            <span>Profil</span>
        </a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>