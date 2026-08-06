<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Pengaturan - Sistem Informasi Monitoring</title>

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
            overflow-x: hidden;
        }

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

        .profile-card {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            border-radius: 20px;
            border: 1px solid var(--border-light);
            box-shadow: var(--shadow-lg);
            padding: 20px;
            margin-bottom: 25px;
            display: flex;
            align-items: center;
        }

        .profile-avatar {
            width: 65px;
            height: 65px;
            border-radius: 18px;
            background: linear-gradient(135deg, #3B82F6 0%, #60A5FA 100%);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.8rem;
            font-weight: 700;
            margin-right: 18px;
            box-shadow: 0 8px 25px rgba(59, 130, 246, 0.35);
        }

        .section-title {
            font-size: 0.75rem;
            font-weight: 700;
            color: var(--sky-blue);
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 12px;
            padding-left: 10px;
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

        .menu-group {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            border-radius: var(--radius-lg);
            border: 1px solid var(--border-light);
            box-shadow: var(--shadow-md);
            overflow: hidden;
            margin-bottom: 25px;
        }

        .menu-item {
            padding: 16px 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            color: var(--text-dark);
            text-decoration: none;
            border-bottom: 1px solid var(--border-light);
            transition: all 0.2s ease;
            cursor: pointer;
        }

        .menu-item:active {
            background-color: rgba(59, 130, 246, 0.04);
        }

        .menu-item:last-child {
            border-bottom: none;
        }

        .menu-icon {
            width: 38px;
            height: 38px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            font-size: 1.1rem;
        }

        .btn-logout {
            background: #FEF2F2;
            color: #EF4444;
            border: 1px solid #FEE2E2;
            border-radius: 16px;
            padding: 16px;
            font-weight: 700;
            font-size: 1rem;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(239, 68, 68, 0.1);
        }

        .btn-logout:active {
            transform: scale(0.98);
            background: #FEE2E2;
        }

        /* ========== TOAST NOTIF ========== */
        .toast-notif {
            position: fixed;
            top: 20px;
            right: 20px;
            background: #1E293B;
            color: white;
            padding: 14px 24px;
            border-radius: 12px;
            font-weight: 600;
            font-size: 0.85rem;
            z-index: 1100;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
            transform: translateX(120%);
            transition: transform 0.4s cubic-bezier(0.22, 1, 0.36, 1);
            max-width: 320px;
            width: fit-content;
            min-width: 200px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            line-height: 1.4;
            pointer-events: none;
        }

        .toast-notif.show {
            transform: translateX(0);
        }

        .toast-notif.success {
            background: #10B981;
        }

        .toast-notif.error {
            background: #EF4444;
        }

        /* ========== MODAL ========== */
        .modal-content {
            border-radius: 20px;
            border: none;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
        }

        .modal-header {
            border-bottom: 1px solid var(--border-light);
            padding: 20px;
        }

        .modal-body {
            padding: 20px;
        }

        .modal-footer {
            border-top: 1px solid var(--border-light);
            padding: 15px 20px;
        }

        .form-label {
            font-size: 0.85rem;
            font-weight: 600;
            color: var(--text-dark);
            margin-bottom: 6px;
        }

        .form-control {
            background-color: #F8FAFC;
            border: 1.5px solid var(--border-light);
            border-radius: 12px;
            padding: 12px 16px;
            font-size: 0.95rem;
            color: var(--text-dark);
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: #3B82F6;
            box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.12);
            background-color: #FFFFFF;
        }

        .btn-primary-custom {
            background: linear-gradient(135deg, #3B82F6 0%, #60A5FA 100%);
            color: white;
            border: none;
            border-radius: 12px;
            padding: 12px 24px;
            font-weight: 600;
            box-shadow: 0 8px 25px rgba(59, 130, 246, 0.3);
            transition: all 0.3s ease;
        }

        .btn-primary-custom:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 35px rgba(59, 130, 246, 0.4);
        }

        .btn-light-custom {
            background: #F1F5F9;
            color: #475569;
            border: none;
            border-radius: 12px;
            padding: 12px 24px;
            font-weight: 600;
        }

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

        @media (max-width: 576px) {
            .toast-notif {
                top: 16px;
                right: 16px;
                max-width: 280px;
                font-size: 0.78rem;
                padding: 12px 18px;
                min-width: 160px;
            }
        }

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
        }
    </style>
</head>

<body>

    <div class="cloud cloud-1"></div>
    <div class="cloud cloud-2"></div>

    <div id="toastNotif" class="toast-notif">
        <span id="toastMessage"></span>
    </div>

    <div class="header-modern d-flex justify-content-between align-items-center">
        <div>
            <h4 class="fw-bold mb-0" style="font-size: 1.25rem;">Pengaturan</h4>
            <small class="text-white text-opacity-75" style="font-weight: 500;">Konfigurasi Sistem & Akun</small>
        </div>
        <div class="header-icon">
            <i class="bi bi-gear-fill fs-4 text-white"></i>
        </div>
    </div>

    <div class="container px-4" style="margin-top: -25px; position: relative; z-index: 10;">

        <div class="profile-card">
            <div class="profile-avatar">
                {{ strtoupper(substr($user->username ?? 'A', 0, 1)) }}
            </div>
            <div>
                <h5 class="fw-bold text-dark mb-1" style="font-size: 1.15rem;">{{ $user->username ?? 'Administrator' }}
                </h5>
                <div class="badge bg-primary bg-opacity-10 text-primary px-3 py-2 rounded-pill fw-bold text-capitalize"
                    style="font-size: 0.75rem;">
                    {{ $user->role ?? 'admin' }}
                </div>
            </div>
        </div>

        <div class="section-title">Sistem Aplikasi</div>
        <div class="menu-group">
            <a href="#" class="menu-item">
                <div class="d-flex align-items-center">
                    <div class="menu-icon bg-primary bg-opacity-10 text-primary">
                        <i class="bi bi-calendar-event-fill"></i>
                    </div>
                    <span class="fw-semibold" style="font-size: 0.95rem;">Tahun Ajaran</span>
                </div>
                <div class="d-flex align-items-center text-secondary">
                    <i class="bi bi-chevron-right small"></i>
                </div>
            </a>
            <a class="menu-item" data-bs-toggle="modal" data-bs-target="#modalGantiPassword">
                <div class="d-flex align-items-center">
                    <div class="menu-icon bg-success bg-opacity-10 text-success">
                        <i class="bi bi-key-fill"></i>
                    </div>
                    <span class="fw-semibold" style="font-size: 0.95rem;">Ganti Password</span>
                </div>
                <i class="bi bi-chevron-right text-secondary small"></i>
            </a>
        </div>

        <div class="section-title">Bantuan & Informasi</div>
        <div class="menu-group">
            <a href="#" class="menu-item">
                <div class="d-flex align-items-center">
                    <div class="menu-icon bg-info bg-opacity-10 text-info">
                        <i class="bi bi-question-circle-fill"></i>
                    </div>
                    <span class="fw-semibold" style="font-size: 0.95rem;">Panduan Penggunaan</span>
                </div>
                <i class="bi bi-chevron-right text-secondary small"></i>
            </a>
            <a href="#" class="menu-item">
                <div class="d-flex align-items-center">
                    <div class="menu-icon bg-secondary bg-opacity-10 text-secondary">
                        <i class="bi bi-info-circle-fill"></i>
                    </div>
                    <span class="fw-semibold" style="font-size: 0.95rem;">Tentang Aplikasi</span>
                </div>
                <div class="d-flex align-items-center text-secondary">
                    <i class="bi bi-chevron-right small"></i>
                </div>
            </a>
        </div>

        <form action="{{ route('logout') }}" method="POST" class="mb-4">
            @csrf
            <button type="submit" class="btn-logout">
                Logout
            </button>
        </form>

    </div>

    <div class="modal fade" id="modalGantiPassword" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold" style="font-size: 1.1rem;">Ganti Password</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form action="/admin/settings/password" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Password Lama</label>
                            <input type="password" name="password_lama" class="form-control" required
                                placeholder="Masukkan password lama" autocomplete="current-password">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password Baru</label>
                            <input type="password" name="password_baru" class="form-control" required
                                placeholder="Minimal 6 karakter" autocomplete="new-password">
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Konfirmasi Password Baru</label>
                            <input type="password" name="password_baru_confirmation" class="form-control" required
                                placeholder="Ulangi password baru" autocomplete="new-password">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn-light-custom w-100 mb-2"
                            data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn-primary-custom w-100 m-0">Simpan Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

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
        <a href="/admin/rekap" class="nav-link">
            <i class="bi bi-clipboard-data-fill"></i>
            <span>Rekap</span>
        </a>
        <a href="/admin/settings" class="nav-link active">
            <i class="bi bi-gear-fill"></i>
            <span>Profil</span>
        </a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function showNotif(message, type = 'success') {
            const toast = document.getElementById('toastNotif');
            const msg = document.getElementById('toastMessage');

            toast.classList.remove('success', 'error', 'show');

            if (type === 'success') {
                toast.classList.add('success');
            } else {
                toast.classList.add('error');
            }

            msg.innerText = message;
            toast.classList.add('show');

            clearTimeout(window.toastTimeout);
            window.toastTimeout = setTimeout(() => {
                toast.classList.remove('show');
            }, 3000);
        }

        @if (session('success'))
            showNotif("{{ session('success') }}", 'success');
        @endif

        @if (session('error'))
            showNotif("{{ session('error') }}", 'error');
        @endif

        @if ($errors->any())
            showNotif("{{ $errors->first() }}", 'error');
        @endif
    </script>

</body>

</html>
