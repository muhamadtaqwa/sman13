<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Data Guru - Sistem Informasi Monitoring</title>

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

        .btn-add {
            background: #ffffff;
            color: #3B82F6;
            width: 42px;
            height: 42px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.12);
            border: none;
            transition: all 0.3s ease;
            position: relative;
            z-index: 1;
        }

        .btn-add:active {
            transform: scale(0.9);
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

        .avatar-circle {
            width: 45px;
            height: 45px;
            border-radius: 14px;
            background: linear-gradient(135deg, #EEF2FF, #E0E7FF);
            color: #6366F1;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.1rem;
            font-weight: 700;
            margin-right: 15px;
        }

        /* ========== FORM & MODAL ========== */
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

        #searchInput::placeholder {
            color: #94A3B8;
            font-size: 0.9rem;
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

    <!-- Header Modern -->
    <div class="header-modern d-flex justify-content-between align-items-center">
        <div>
            <h4 class="fw-bold mb-0" style="font-size: 1.25rem;">Data Guru</h4>
            <small class="text-white text-opacity-75" style="font-weight: 500;">Kelola Akun Pengajar</small>
        </div>
        <button class="btn-add" data-bs-toggle="modal" data-bs-target="#modalTambah">
            <i class="bi bi-plus-lg fs-5 fw-bold"></i>
        </button>
    </div>

    <!-- KOTAK DAFTAR GURU -->
    <div class="container px-4" style="margin-top: -20px; position: relative; z-index: 10;">

        <!-- Search Bar -->
        <div class="modern-card mb-3 d-flex align-items-center gap-2">
            <input type="text" id="searchInput" class="form-control border-0 shadow-none ps-3"
                placeholder="Cari Username Guru..." value="{{ request('search') }}" style="background: transparent;">
            @if (request('search'))
                <a href="{{ url('/admin/guru') }}" class="text-secondary fs-5">
                    <i class="bi bi-x-circle-fill"></i>
                </a>
            @endif
        </div>

        <!-- Info Hasil Pencarian -->
        @if (request('search'))
            <div class="mb-3 px-1">
                <small class="text-secondary">
                    Hasil pencarian untuk: <strong>"{{ request('search') }}"</strong>
                    ({{ $guru->count() }} data ditemukan)
                </small>
            </div>
        @endif

        @if ($errors->any())
            <div
                class="alert alert-danger rounded-3 py-2 px-3 small border-0 bg-danger bg-opacity-10 text-danger fw-bold mb-3">
                <ul class="mb-0 ps-3">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="row g-0 mt-1">
            @forelse($guru as $g)
                <div class="col-12">
                    <!-- Kartu Guru -->
                    <div class="modern-card d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <div class="avatar-circle">
                                {{ strtoupper(substr($g->username, 0, 1)) }}
                            </div>
                            <div>
                                <div class="fw-bold text-dark" style="font-size: 0.95rem;">{{ $g->username }}</div>
                                <div class="text-secondary" style="font-size: 0.8rem; font-weight: 500;">
                                    Role: Guru
                                </div>
                            </div>
                        </div>

                        <div class="dropdown">
                            <button class="btn btn-sm text-secondary border-0" type="button" data-bs-toggle="dropdown">
                                <i class="bi bi-three-dots-vertical fs-5"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0 rounded-3">
                                <li><a class="dropdown-item py-2" href="#" data-bs-toggle="modal"
                                        data-bs-target="#modalUbah{{ $g->id }}">Ganti Password</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item py-2 text-danger" href="#" data-bs-toggle="modal"
                                        data-bs-target="#modalHapus{{ $g->id }}">Hapus Guru</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5 mt-3">
                    <div style="color: #93C5FD; margin-bottom: 15px;"><i class="bi bi-person-video3"
                            style="font-size: 4rem;"></i></div>
                    <h6 class="fw-bold text-dark">
                        @if (request('search'))
                            Data tidak ditemukan
                        @else
                            Data pengajar belum ada
                        @endif
                    </h6>
                    <p class="small text-secondary mb-0">
                        @if (request('search'))
                            Coba kata kunci lain atau <a href="/admin/guru">tampilkan semua</a>
                        @else
                            Klik tombol + di pojok kanan atas untuk menambahkan akun guru baru.
                        @endif
                    </p>
                </div>
            @endforelse
        </div>
    </div>

    <!-- ==========================================
    KUMPULAN MODAL
    ========================================== -->

    @foreach ($guru as $g)
        <!-- MODAL GANTI PASSWORD -->
        <div class="modal fade" id="modalUbah{{ $g->id }}" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title fw-bold" style="font-size: 1.1rem;">Ganti Password</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <form action="/admin/guru/{{ $g->id }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label">Username</label>
                                <input type="text" class="form-control bg-light text-secondary"
                                    value="{{ $g->username }}" readonly>
                            </div>
                            <div class="mb-2 p-3 rounded-3"
                                style="background-color: #fef2f2; border: 1px dashed #fecdd3;">
                                <label class="form-label text-danger mb-2">Password Baru</label>
                                <input type="password" name="password" class="form-control" required
                                    placeholder="Masukkan password baru" autocomplete="new-password">
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

        <!-- MODAL HAPUS GURU -->
        <div class="modal fade" id="modalHapus{{ $g->id }}" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content text-center p-3">
                    <div class="modal-body py-4">
                        <div class="bg-danger bg-opacity-10 text-danger rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                            style="width: 70px; height: 70px;">
                            <i class="bi bi-trash3-fill fs-2"></i>
                        </div>
                        <h5 class="fw-bold text-dark mb-2">Hapus Akun?</h5>
                        <p class="text-secondary small mb-4">Akun <strong>{{ $g->username }}</strong> akan terhapus
                            permanen.</p>
                        <form action="/admin/guru/{{ $g->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <div class="d-flex gap-2">
                                <button type="button" class="btn-light-custom flex-fill"
                                    data-bs-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-danger rounded-3 fw-bold flex-fill"
                                    style="padding: 12px;">Ya, Hapus</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <!-- MODAL TAMBAH GURU -->
    <div class="modal fade" id="modalTambah" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold" style="font-size: 1.1rem;">Tambah Guru Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form action="/admin/guru" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" name="username" class="form-control" required
                                placeholder="Masukkan Username Guru">
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Password Login Awal</label>
                            <input type="password" name="password" class="form-control" required
                                placeholder="Minimal 6 karakter" autocomplete="new-password">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn-light-custom w-100 mb-2"
                            data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn-primary-custom w-100 m-0">Simpan Data Guru</button>
                    </div>
                </form>
            </div>
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
        <a href="/admin/guru" class="nav-link active">
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
        // ========== TOAST NOTIF ==========
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

        // ========== SEARCH ==========
        const searchInput = document.getElementById('searchInput');
        let debounceTimer;

        searchInput.addEventListener('input', function() {
            clearTimeout(debounceTimer);
            debounceTimer = setTimeout(() => {
                const searchValue = this.value.trim();
                if (searchValue) {
                    window.location.href = `/admin/guru?search=${encodeURIComponent(searchValue)}`;
                } else {
                    window.location.href = '/admin/guru';
                }
            }, 500);
        });
    </script>

</body>

</html>
