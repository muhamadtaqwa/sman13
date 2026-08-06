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
            margin-top: -35px;
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
            margin: 0 auto 15px auto;
            box-shadow: 0 8px 25px rgba(59, 130, 246, 0.3);
            border: 4px solid #ffffff;
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
        }

        .modal-footer {
            border-top: 1px solid var(--border-light);
        }

        .form-control {
            border-radius: 12px;
            border: 1.5px solid var(--border-light);
            background-color: #F8FAFC;
            padding: 12px 15px;
            font-size: 0.9rem;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: #3B82F6;
            box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.12);
            background-color: #FFFFFF;
        }

        .btn-primary {
            background: linear-gradient(135deg, #3B82F6 0%, #60A5FA 100%);
            border: none;
            box-shadow: 0 8px 25px rgba(59, 130, 246, 0.3);
        }

        .btn-light {
            background: #F1F5F9;
            border: none;
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

        /* Tombol Scan di tengah */
        .nav-center {
            margin-top: -22px;
        }

        .nav-scan-btn {
            width: 48px;
            height: 48px;
            background: linear-gradient(135deg, #3B82F6, #60A5FA);
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 8px 25px rgba(59, 130, 246, 0.4);
            transition: all 0.3s ease;
            animation: scanPulse 2.5s infinite;
        }

        .nav-scan-btn i {
            color: white !important;
            font-size: 1.5rem !important;
        }

        .nav-center:active .nav-scan-btn {
            transform: scale(0.9);
        }

        @keyframes scanPulse {

            0%,
            100% {
                box-shadow: 0 8px 25px rgba(59, 130, 246, 0.4);
            }

            50% {
                box-shadow: 0 12px 35px rgba(59, 130, 246, 0.6);
            }
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

            .nav-scan-btn {
                width: 44px;
                height: 44px;
            }
        }
    </style>
</head>

<body>

    <!-- Awan dekoratif -->
    <div class="cloud cloud-1"></div>
    <div class="cloud cloud-2"></div>

    <!-- Toast Notification -->
    <div id="toastNotif" class="toast-notif">
        <span id="toastMessage"></span>
    </div>

    <div class="header-modern d-flex align-items-center justify-content-between">
        <div class="d-flex align-items-center">
            <div class="logo-box me-3">
                <img src="{{ asset('logo.png') }}" alt="Logo"
                    onerror="this.src='https://ui-avatars.com/api/?name=SMAN&background=ffffff&color=3b82f6'">
            </div>
            <div>
                <h6 class="fw-bold mb-0" style="font-size: 1.1rem;">SMAN 13 Semarang</h6>
                <small class="text-white text-opacity-75" style="font-weight: 500;">Menu Pengaturan</small>
            </div>
        </div>
    </div>

    <div class="container px-4">

        <!-- Profil Akun -->
        <div class="profile-card" style="margin-top: -25px;">
            <div class="profile-avatar">
                {{ strtoupper(substr(Auth::user()->username ?? 'G', 0, 1)) }}
            </div>
            <h5 class="fw-bold text-dark mb-1">{{ Auth::user()->username ?? 'Nama Guru' }}</h5>
            <div class="badge bg-primary bg-opacity-10 text-primary px-3 py-2 rounded-pill fw-bold"
                style="font-size: 0.75rem;">
                Akses: {{ ucfirst(Auth::user()->role ?? 'Guru') }}
            </div>
        </div>

        <!-- Section Title -->
        <div class="section-title">Pengaturan Aplikasi</div>

        <!-- Menu Pengaturan -->
        <div class="settings-list">
            <a href="#" class="settings-item" data-target="profil">
                <div class="d-flex align-items-center">
                    <div class="settings-icon icon-blue"><i class="bi bi-person-badge"></i></div>
                    <div>
                        <div class="fw-bold" style="font-size: 0.95rem;">Profil Akun</div>
                    </div>
                </div>
                <i class="bi bi-chevron-right text-secondary"></i>
            </a>
            <a href="#" class="settings-item" data-target="password">
                <div class="d-flex align-items-center">
                    <div class="settings-icon icon-purple"><i class="bi bi-lock-fill"></i></div>
                    <div>
                        <div class="fw-bold" style="font-size: 0.95rem;">Ubah Password</div>
                    </div>
                </div>
                <i class="bi bi-chevron-right text-secondary"></i>
            </a>
            <a href="#" class="settings-item" data-target="tentang">
                <div class="d-flex align-items-center">
                    <div class="settings-icon icon-green"><i class="bi bi-info-circle-fill"></i></div>
                    <div>
                        <div class="fw-bold" style="font-size: 0.95rem;">Tentang Aplikasi</div>
                    </div>
                </div>
                <i class="bi bi-chevron-right text-secondary"></i>
            </a>
        </div>

        <!-- Tombol Logout -->
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-logout shadow-sm mb-4">
                Logout
            </button>
        </form>

    </div>

    <!-- Navigasi Bawah - Sky Pill -->
    <div class="bottom-nav">
        <a href="{{ route('guru.dashboard') }}" class="nav-link">
            <i class="bi bi-house-door-fill"></i>
            <span>Beranda</span>
        </a>
        <a href="/guru/rekap" class="nav-link">
            <i class="bi bi-clipboard-data-fill"></i>
            <span>Rekap</span>
        </a>
        <a href="{{ route('guru.scan.view') }}" class="nav-link nav-center">
            <div class="nav-scan-btn">
                <i class="bi bi-qr-code-scan"></i>
            </div>

        </a>
        <a href="/guru/manual" class="nav-link">
            <i class="bi bi-journal-medical"></i>
            <span>Manual</span>
        </a>
        <a href="/guru/settings" class="nav-link active">
            <i class="bi bi-gear-fill"></i>
            <span>Profil</span>
        </a>
    </div>

    <!-- Modal Profil Akun -->
    <div class="modal fade" id="modalProfil" tabindex="-1" data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-4 border-0 shadow">
                <form action="{{ route('guru.settings.profile') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-header border-0 pb-0">
                        <h5 class="modal-title fw-bold">Edit Profil</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body pt-0">
                        <div class="mb-3">
                            <label class="form-label small fw-bold text-secondary">Username</label>
                            <input type="text" name="username" class="form-control rounded-3"
                                value="{{ Auth::user()->username ?? '' }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label small fw-bold text-secondary">Email</label>
                            <input type="email" name="email" class="form-control rounded-3"
                                value="{{ Auth::user()->email ?? '' }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label small fw-bold text-secondary">Nama Lengkap</label>
                            <input type="text" name="nama_lengkap" class="form-control rounded-3"
                                value="{{ Auth::user()->nama_lengkap ?? (Auth::user()->username ?? '') }}">
                        </div>
                    </div>
                    <div class="modal-footer border-0 pt-0">
                        <button type="button" class="btn btn-light rounded-pill px-4"
                            data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary rounded-pill px-4">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Ubah Password -->
    <div class="modal fade" id="modalPassword" tabindex="-1" data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-4 border-0 shadow">
                <form action="{{ route('guru.settings.password') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-header border-0 pb-0">
                        <h5 class="modal-title fw-bold">Ubah Password</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body pt-0">
                        <div class="mb-3">
                            <label class="form-label small fw-bold text-secondary">Password Lama</label>
                            <input type="password" name="current_password" class="form-control rounded-3" required
                                autocomplete="current-password">
                        </div>
                        <div class="mb-3">
                            <label class="form-label small fw-bold text-secondary">Password Baru</label>
                            <input type="password" name="new_password" class="form-control rounded-3" required
                                autocomplete="new-password">
                        </div>
                        <div class="mb-3">
                            <label class="form-label small fw-bold text-secondary">Konfirmasi Password Baru</label>
                            <input type="password" name="new_password_confirmation" class="form-control rounded-3"
                                required autocomplete="new-password">
                        </div>
                    </div>
                    <div class="modal-footer border-0 pt-0">
                        <button type="button" class="btn btn-light rounded-pill px-4"
                            data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary rounded-pill px-4">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Tentang Aplikasi -->
    <div class="modal fade" id="modalTentang" tabindex="-1" data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-4 border-0 shadow">
                <div class="modal-header border-0 pb-0">
                    <h5 class="modal-title fw-bold">Tentang Aplikasi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body text-center pt-0">
                    <div class="mb-3">
                        <div class="bg-primary bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center mx-auto"
                            style="width: 70px; height: 70px;">
                            <i class="bi bi-qr-code-scan fs-1 text-primary"></i>
                        </div>
                    </div>
                    <h6 class="fw-bold">Sistem Informasi Monitoring</h6>
                    <p class="small text-secondary">Version 1.0.0</p>
                    <p class="small text-secondary mb-0">
                        Aplikasi pemantauan kehadiran siswa untuk kegiatan keagamaan dan kedisiplinan.
                    </p>
                    <hr class="my-3">
                    <p class="small text-secondary mb-0">
                        <i class="bi bi-building me-1"></i> SMAN 13 Semarang<br>
                        <i class="bi bi-envelope me-1"></i> support@sman13.sch.id
                    </p>
                </div>
                <div class="modal-footer border-0 justify-content-center pt-0">
                    <button type="button" class="btn btn-primary rounded-pill px-4"
                        data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
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

        @if ($errors->any())
            showNotif("{{ $errors->first() }}", 'error');
        @endif

        document.querySelectorAll('.settings-item').forEach((item) => {
            item.addEventListener('click', (e) => {
                e.preventDefault();
                const target = item.dataset.target;
                if (target === 'profil') {
                    const modalProfil = new bootstrap.Modal(document.getElementById('modalProfil'));
                    modalProfil.show();
                } else if (target === 'password') {
                    const modalPassword = new bootstrap.Modal(document.getElementById('modalPassword'));
                    modalPassword.show();
                } else if (target === 'tentang') {
                    const modalTentang = new bootstrap.Modal(document.getElementById('modalTentang'));
                    modalTentang.show();
                }
            });
        });
    </script>

</body>

</html>
