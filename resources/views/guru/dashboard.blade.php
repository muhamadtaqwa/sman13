<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Beranda Guru - Sistem Informasi Monitoring</title>

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
            padding: 25px 20px 30px 20px;
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

        /* ========== MODERN CARD ========== */
        .modern-card {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            border-radius: var(--radius-lg);
            border: 1px solid var(--border-light);
            box-shadow: var(--shadow-md);
            margin-top: -20px;
            position: relative;
            z-index: 10;
        }

        /* ========== TAB SCROLL ========== */
        .tab-scroll-container {
            display: flex;
            overflow-x: auto;
            gap: 10px;
            padding-bottom: 10px;
            scrollbar-width: none;
        }

        .tab-scroll-container::-webkit-scrollbar {
            display: none;
        }

        .tab-kegiatan {
            background: rgba(255, 255, 255, 0.8);
            border: 1px solid var(--border-light);
            color: var(--text-muted);
            padding: 10px 20px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
            white-space: nowrap;
            cursor: pointer;
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
        }

        .tab-kegiatan.active {
            background: linear-gradient(135deg, #3B82F6, #60A5FA);
            color: white;
            border-color: #3B82F6;
            box-shadow: 0 6px 20px rgba(59, 130, 246, 0.3);
        }

        /* ========== CLASS CARD ========== */
        .class-card {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            border-radius: var(--radius-lg);
            border: 1px solid var(--border-light);
            box-shadow: var(--shadow-md);
            padding: 16px;
            margin-bottom: 12px;
        }

        .stat-item {
            text-align: center;
            background: #F8FAFC;
            border-radius: 12px;
            padding: 10px 5px;
            flex: 1;
        }

        .stat-value {
            font-size: 1.1rem;
            font-weight: 700;
            margin-bottom: 2px;
            line-height: 1;
        }

        .stat-label {
            font-size: 0.65rem;
            font-weight: 600;
            color: var(--text-muted);
            text-transform: uppercase;
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

        .nav-center.active .nav-scan-btn {
            background: linear-gradient(135deg, #2563EB, #3B82F6);
            box-shadow: 0 8px 30px rgba(37, 99, 235, 0.5);
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

        /* ========== LOADING ========== */
        .loading {
            text-align: center;
            padding: 20px;
            color: var(--text-muted);
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
                    onerror="this.src='https://ui-avatars.com/api/?name=SMK&background=ffffff&color=3b82f6'">
            </div>
            <div>
                <h6 class="fw-bold mb-0" style="font-size: 1.1rem;">SMAN 13 Semarang</h6>
                <small class="text-white text-opacity-75" style="font-weight: 500;">Halo,
                    {{ Auth::user()->username ?? 'Guru' }}</small>
            </div>
        </div>
    </div>

    <div class="container px-4">

        <div class="modern-card clock-card d-flex justify-content-center align-items-center gap-3 py-3 mb-4">
            <h2 id="liveClock" class="fw-bold text-dark mb-0" style="font-size: 2.2rem; letter-spacing: -0.5px;">00:00
            </h2>
            <div
                style="width: 2px; height: 35px; background: linear-gradient(180deg, #3B82F6, #93C5FD); border-radius: 2px;">
            </div>
            <div class="text-start">
                <div class="text-secondary" style="font-size: 0.65rem; font-weight: 700; letter-spacing: 1px;">HARI
                    INI
                </div>
                <div id="liveDate" style="color: #3b82f6; font-size: 0.85rem; font-weight: 600;">Memuat tanggal...
                </div>
            </div>
        </div>

        <!-- TAB KEGIATAN - Tanpa Ikon -->
        <div class="tab-scroll-container" id="activityTabs">
            @foreach ($kegiatan as $item)
                <div class="tab-kegiatan {{ $loop->first ? 'active' : '' }}"
                    onclick="changeTab('{{ $item->nama_kegiatan }}', this, {{ $item->id }})">
                    {{ $item->nama_kegiatan }}
                </div>
            @endforeach
        </div>

        <div class="d-flex justify-content-between align-items-end mb-3 mt-2 px-1">
            <div>
                <div style="font-size: 0.7rem; font-weight: 700; color: var(--sky-blue); letter-spacing: 0.5px;">REKAP
                    HARI INI
                </div>
                <div class="fw-bold text-primary" id="judulKegiatan" style="font-size: 1.05rem;">
                    {{ $kegiatan->first()->nama_kegiatan ?? 'Kehadiran Pagi' }}
                </div>
            </div>
        </div>

        <div id="dataKelasContainer">
            @foreach ($dataKelas as $kelas)
                <div class="class-card">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="fw-bold text-dark" style="font-size: 1.1rem;">{{ $kelas->nama_kelas }}</div>
                        <div class="badge bg-primary bg-opacity-10 text-primary px-3 py-2 rounded-pill fw-bold">
                            {{ $kelas->total_siswa }} Siswa
                        </div>
                    </div>
                    <div class="d-flex gap-2">
                        <div class="stat-item">
                            <div class="stat-value text-success">{{ $kelas->hadir }}</div>
                            <div class="stat-label">Hadir</div>
                        </div>
                        <div class="stat-item" style="background: #fffbeb;">
                            <div class="stat-value text-warning" style="color: #d97706 !important;">
                                {{ $kelas->izin_sakit }}
                            </div>
                            <div class="stat-label">Izin/Sakit</div>
                        </div>
                        <div class="stat-item" style="background: #fef2f2;">
                            <div class="stat-value text-danger">{{ $kelas->belum }}</div>
                            <div class="stat-label">Belum</div>
                        </div>
                    </div>
                </div>
            @endforeach

            @if (count($dataKelas) == 0)
                <div class="alert alert-warning text-center">Belum ada data kelas</div>
            @endif
        </div>

    </div>

    <!-- Navigasi Bawah - Sky Pill -->
    <div class="bottom-nav">
        <a href="{{ route('guru.dashboard') }}" class="nav-link active">
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
        <a href="/guru/settings" class="nav-link">
            <i class="bi bi-gear-fill"></i>
            <span>Profil</span>
        </a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        let currentKegiatanId = {{ $kegiatan->first()->id ?? 1 }};

        function showNotif(message, type = 'error') {
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

        function updateClock() {
            const now = new Date();
            const hours = String(now.getHours()).padStart(2, '0');
            const minutes = String(now.getMinutes()).padStart(2, '0');
            document.getElementById('liveClock').textContent = `${hours}:${minutes}`;
            const dateOptions = {
                weekday: 'long',
                day: 'numeric',
                month: 'long',
                year: 'numeric'
            };
            document.getElementById('liveDate').textContent = now.toLocaleDateString('id-ID', dateOptions);
        }

        setInterval(updateClock, 1000);
        updateClock();

        function changeTab(kegiatanName, element, kegiatanId) {
            document.querySelectorAll('.tab-kegiatan').forEach(tab => {
                tab.classList.remove('active');
            });
            element.classList.add('active');
            document.getElementById('judulKegiatan').textContent = kegiatanName;
            currentKegiatanId = kegiatanId;
            loadDataByKegiatan(kegiatanId);
        }

        function loadDataByKegiatan(kegiatanId) {
            document.getElementById('dataKelasContainer').innerHTML = '<div class="loading">Memuat data...</div>';

            fetch(`/guru/dashboard/data/${kegiatanId}`)
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        renderKelasData(data.dataKelas);
                    } else {
                        document.getElementById('dataKelasContainer').innerHTML =
                            '<div class="alert alert-danger">Gagal memuat data</div>';
                        showNotif('Gagal memuat data', 'error');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    document.getElementById('dataKelasContainer').innerHTML =
                        '<div class="alert alert-danger">Terjadi kesalahan</div>';
                    showNotif('Terjadi kesalahan', 'error');
                });
        }

        function renderKelasData(dataKelas) {
            if (dataKelas.length === 0) {
                document.getElementById('dataKelasContainer').innerHTML =
                    '<div class="alert alert-warning text-center">Belum ada data kelas</div>';
                return;
            }

            let html = '';
            for (let kelas of dataKelas) {
                html += `
                    <div class="class-card">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div class="fw-bold text-dark" style="font-size: 1.1rem;">${kelas.nama_kelas}</div>
                            <div class="badge bg-primary bg-opacity-10 text-primary px-3 py-2 rounded-pill fw-bold">${kelas.total_siswa} Siswa</div>
                        </div>
                        <div class="d-flex gap-2">
                            <div class="stat-item">
                                <div class="stat-value text-success">${kelas.hadir}</div>
                                <div class="stat-label">Hadir</div>
                            </div>
                            <div class="stat-item" style="background: #fffbeb;">
                                <div class="stat-value text-warning" style="color: #d97706 !important;">${kelas.izin_sakit}</div>
                                <div class="stat-label">Izin/Sakit</div>
                            </div>
                            <div class="stat-item" style="background: #fef2f2;">
                                <div class="stat-value text-danger">${kelas.belum}</div>
                                <div class="stat-label">Belum</div>
                            </div>
                        </div>
                    </div>
                `;
            }
            document.getElementById('dataKelasContainer').innerHTML = html;
        }
    </script>

</body>

</html>
