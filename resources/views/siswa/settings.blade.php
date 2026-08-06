<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Pengaturan Siswa - Sistem Informasi Monitoring</title>

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

        /* ========== PROFILE CARD ========== */
        .profile-card {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            border-radius: 20px;
            border: 1px solid var(--border-light);
            box-shadow: var(--shadow-lg);
            padding: 30px 20px;
            text-align: center;
            margin-bottom: 20px;
            margin-top: -25px;
            position: relative;
            z-index: 10;
        }

        .profile-avatar {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #3B82F6 0%, #60A5FA 100%);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.5rem;
            font-weight: 700;
            margin: 0 auto 15px auto;
            box-shadow: 0 8px 25px rgba(59, 130, 246, 0.3);
            border: 4px solid #ffffff;
            outline: 2px dashed #93C5FD;
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
            width: 3px;
            height: 16px;
            background: var(--sky-blue);
            border-radius: 2px;
        }

        /* ========== SETTINGS LIST ========== */
        .settings-list {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            border-radius: 20px;
            border: 1px solid var(--border-light);
            box-shadow: var(--shadow-md);
            overflow: hidden;
            margin-bottom: 25px;
        }

        .settings-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 18px 20px;
            border-bottom: 1px solid var(--border-light);
            text-decoration: none;
            color: var(--text-dark);
            transition: 0.3s ease;
            cursor: pointer;
        }

        .settings-item:last-child {
            border-bottom: none;
        }

        .settings-item:active {
            background-color: rgba(59, 130, 246, 0.04);
        }

        .settings-icon {
            width: 40px;
            height: 40px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            margin-right: 15px;
        }

        .icon-blue {
            background: linear-gradient(135deg, #EFF6FF, #DBEAFE);
            color: #3B82F6;
        }

        .icon-purple {
            background: linear-gradient(135deg, #FAF5FF, #F3E8FF);
            color: #A855F7;
        }

        .icon-green {
            background: linear-gradient(135deg, #F0FDF4, #DCFCE7);
            color: #22C55E;
        }

        /* ========== LOGOUT BUTTON ========== */
        .btn-logout {
            background: #FEF2F2;
            color: #DC2626;
            border: 1px solid #FECACA;
            border-radius: 16px;
            padding: 16px;
            width: 100%;
            font-weight: 700;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
            transition: 0.3s ease;
            text-decoration: none;
            box-shadow: 0 4px 15px rgba(239, 68, 68, 0.1);
        }

        .btn-logout:active {
            background: #FEE2E2;
            transform: scale(0.98);
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

    <!-- Header -->
    <div class="header-modern d-flex align-items-center justify-content-between">
        <div class="d-flex align-items-center">
            <div class="logo-box me-3">
                <img src="{{ asset('logo.png') }}" alt="Logo"
                    onerror="this.src='https://ui-avatars.com/api/?name=SMAN&background=ffffff&color=3b82f6'">
            </div>
            <div>
                <h6 class="fw-bold mb-0" style="font-size: 1.1rem;">SMAN 13 Semarang</h6>
                <small class="text-white text-opacity-75" style="font-weight: 500;">Pengaturan Akun</small>
            </div>
        </div>
    </div>

    <div class="container px-4">

        <!-- Profil Akun Siswa -->
        <div class="profile-card">
            <div class="profile-avatar">
                {{ strtoupper(substr($siswa->nama_lengkap ?? Auth::user()->username ?? 'S', 0, 1)) }}
            </div>
            <h5 class="fw-bold text-dark mb-1">{{ $siswa->nama_lengkap ?? Auth::user()->username ?? 'Nama Siswa' }}</h5>
            <p class="text-secondary mb-2" style="font-size: 0.85rem;">NIS: {{ $siswa->nis ?? Auth::user()->username }}
            </p>
            <div class="badge bg-primary bg-opacity-10 text-primary px-3 py-2 rounded-pill fw-bold"
                style="font-size: 0.75rem;">
                Kelas {{ $siswa->kode_kelas ?? 'Belum diatur' }}
            </div>
        </div>

        <!-- Section Title -->
        <div class="section-title">MENU PENGATURAN</div>

        <!-- List Menu -->
        <div class="settings-list">
            <a href="#" class="settings-item">
                <div class="d-flex align-items-center">
                    <div class="settings-icon icon-blue"><i class="bi bi-person-vcard"></i></div>
                    <div>
                        <div class="fw-bold" style="font-size: 0.95rem;">Biodata Diri</div>
                        <div class="text-secondary" style="font-size: 0.7rem;">Lihat detail profil kamu</div>
                    </div>
                </div>
                <i class="bi bi-chevron-right text-secondary"></i>
            </a>
            <a href="#" class="settings-item">
                <div class="d-flex align-items-center">
                    <div class="settings-icon icon-purple"><i class="bi bi-shield-lock-fill"></i></div>
                    <div>
                        <div class="fw-bold" style="font-size: 0.95rem;">Ubah Password</div>
                        <div class="text-secondary" style="font-size: 0.7rem;">Ganti kata sandi akunmu</div>
                    </div>
                </div>
                <i class="bi bi-chevron-right text-secondary"></i>
            </a>
            <a href="#" class="settings-item">
                <div class="d-flex align-items-center">
                    <div class="settings-icon icon-green"><i class="bi bi-info-circle-fill"></i></div>
                    <div>
                        <div class="fw-bold" style="font-size: 0.95rem;">Tentang Aplikasi</div>
                        <div class="text-secondary" style="font-size: 0.7rem;">Sistem Informasi Monitoring v1.0</div>
                    </div>
                </div>
                <i class="bi bi-chevron-right text-secondary"></i>
            </a>
        </div>

        <!-- Logout -->
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-logout shadow-sm mb-4">
                <i class="bi bi-box-arrow-right fs-5"></i> Keluar Aplikasi
            </button>
        </form>

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
        <a href="/siswa/rekap" class="nav-link">
            <i class="bi bi-clipboard-data-fill"></i>
            <span>Rekap</span>
        </a>
        <a href="/siswa/settings" class="nav-link active">
            <i class="bi bi-gear-fill"></i>
            <span>Profil</span>
        </a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>