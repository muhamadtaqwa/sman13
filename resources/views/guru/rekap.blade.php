<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Rekap Guru - Sistem Informasi Monitoring</title>

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
            padding: 25px 20px 35px 20px;
            border-bottom-left-radius: 28px;
            border-bottom-right-radius: 28px;
            color: white;
            box-shadow: 0 8px 35px rgba(59, 130, 246, 0.2);
            position: relative;
            overflow: hidden;
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

        .filter-card {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(15px);
            border-radius: var(--radius-lg);
            border: 1px solid var(--border-light);
            box-shadow: var(--shadow-md);
            padding: 16px;
            margin-top: -20px;
            position: relative;
            z-index: 10;
            margin-bottom: 20px;
        }

        .filter-tabs {
            display: flex;
            background: #F1F5F9;
            border-radius: 12px;
            padding: 4px;
            margin-bottom: 15px;
        }

        .f-tab {
            flex: 1;
            text-align: center;
            padding: 8px 0;
            font-size: 0.8rem;
            font-weight: 600;
            color: #64748B;
            border-radius: 10px;
            cursor: pointer;
            transition: 0.3s;
        }

        .f-tab.active {
            background: #FFFFFF;
            color: #3B82F6;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }

        .search-box {
            position: relative;
        }

        .search-box input {
            padding-left: 16px;
            border-radius: 12px;
            background: #F8FAFC;
            border: 1.5px solid var(--border-light);
            font-size: 0.85rem;
            padding: 10px 12px;
        }

        .student-card {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(10px);
            border-radius: 16px;
            padding: 12px;
            margin-bottom: 12px;
            border: 1px solid var(--border-light);
            box-shadow: var(--shadow-sm);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .student-avatar {
            width: 40px;
            height: 40px;
            border-radius: 14px;
            background: linear-gradient(135deg, #EFF6FF, #DBEAFE);
            color: #3B82F6;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 0.85rem;
            flex-shrink: 0;
        }

        /* MODE HARIAN - BADGE WARNA 2 KOLOM */
        .status-badges {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 8px;
            margin-top: 8px;
        }

        .badge-keg {
            font-size: 0.7rem;
            padding: 6px 8px;
            border-radius: 10px;
            font-weight: 600;
            text-align: center;
            display: block;
            color: white !important;
        }

        .keg-hadir {
            background: #22C55E !important;
        }

        .keg-izin {
            background: #EAB308 !important;
            color: #1E293B !important;
        }

        .keg-belum {
            background: #9CA3AF !important;
        }

        /* MODE BULANAN/TAHUNAN - STATISTIK 2 KOLOM */
        .status-statistik {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 8px;
            margin-top: 8px;
        }

        .stat-card {
            background: #F1F5F9;
            border-radius: 10px;
            padding: 8px 4px;
            text-align: center;
            font-size: 0.65rem;
            font-weight: 600;
        }

        .stat-nama {
            font-size: 0.6rem;
            color: #64748B;
            margin-bottom: 4px;
            font-weight: 600;
        }

        .stat-angka {
            font-size: 0.7rem;
            font-weight: 600;
            line-height: 1.4;
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
            border-radius: 24px;
            display: flex;
            justify-content: space-around;
            align-items: center;
            z-index: 1000;
            box-shadow: 0 10px 40px rgba(59, 130, 246, 0.15);
            border: 1px solid rgba(59, 130, 246, 0.1);
            padding: 0 8px;
        }

        .nav-link {
            text-decoration: none;
            color: #94A3B8;
            font-size: 0.62rem;
            text-align: center;
            font-weight: 600;
            padding: 6px 4px;
            border-radius: 16px;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 3px;
            min-width: 52px;
        }

        .nav-link i {
            font-size: 1.3rem;
        }

        .nav-link span {
            font-size: 0.6rem;
        }

        .nav-link.active {
            color: #3B82F6;
            background: rgba(59, 130, 246, 0.08);
        }

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
            animation: scanPulse 2.5s infinite;
        }

        .nav-scan-btn i {
            color: white !important;
            font-size: 1.5rem !important;
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

            .status-badges,
            .status-statistik {
                gap: 6px;
            }

            .badge-keg {
                font-size: 0.65rem;
                padding: 5px 6px;
            }

            .stat-card {
                padding: 6px 2px;
            }

            .stat-angka {
                font-size: 0.65rem;
            }
        }
    </style>
</head>

<body>

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
                <small class="text-white text-opacity-75" style="font-weight: 500;">Halo,
                    {{ Auth::user()->username ?? 'Guru' }}</small>
            </div>
        </div>
    </div>

    <div class="container px-4">
        <div class="filter-card">
            <div class="filter-tabs">
                <div class="f-tab active" id="tabHarian" onclick="setMode('harian')">Harian</div>
                <div class="f-tab" id="tabBulanan" onclick="setMode('bulanan')">Bulanan</div>
                <div class="f-tab" id="tabTahunan" onclick="setMode('tahunan')">Tahunan</div>
            </div>

            <div class="row g-2 mb-3">
                <div class="col-6">
                    <label class="form-label small fw-bold text-secondary mb-1">Pilih Waktu</label>
                    <input type="date" class="form-control form-control-sm py-2" id="inputHarian"
                        style="display: block;">
                    <input type="month" class="form-control form-control-sm py-2" id="inputBulanan"
                        style="display: none;">
                    <input type="number" class="form-control form-control-sm py-2" id="inputTahunan"
                        style="display: none;" placeholder="Tahun" min="2020" max="2030">
                </div>

                <div class="col-6">
                    <label class="form-label small fw-bold text-secondary mb-1">Pilih Kelas</label>
                    <select class="form-select form-select-sm py-2" id="filterKelas">
                        <option value="semua">Semua Kelas</option>
                        @foreach ($kelasList as $kelas)
                            <option value="{{ $kelas->kode_kelas }}">{{ $kelas->kode_kelas }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="search-box">
                <input type="text" class="form-control py-2" placeholder="Cari nama siswa ...">
            </div>
        </div>

        <div class="d-flex justify-content-between align-items-end mb-3 mt-2 px-1">
            <div>
                <div style="font-size: 0.7rem; font-weight: 700; color: var(--sky-blue);">HASIL REKAPITULASI</div>
                <div class="fw-bold text-primary" style="font-size: 0.9rem;" id="jumlahSiswaText">Menampilkan 0 Siswa
                </div>
            </div>
            <button class="btn btn-sm btn-outline-primary rounded-pill fw-bold" onclick="cetakPDF()"
                style="font-size: 0.75rem;">
                Cetak PDF
            </button>
        </div>

        <div id="dataRekapContainer">
            <div class="text-center py-4 text-secondary">Memuat data...</div>
        </div>
    </div>

    <div class="bottom-nav">
        <a href="{{ route('guru.dashboard') }}" class="nav-link"><i
                class="bi bi-house-door-fill"></i><span>Beranda</span></a>
        <a href="/guru/rekap" class="nav-link active"><i class="bi bi-clipboard-data-fill"></i><span>Rekap</span></a>
        <a href="{{ route('guru.scan.view') }}" class="nav-link nav-center">
            <div class="nav-scan-btn"><i class="bi bi-qr-code-scan"></i></div>
        </a>
        <a href="/guru/manual" class="nav-link"><i class="bi bi-journal-medical"></i><span>Manual</span></a>
        <a href="/guru/settings" class="nav-link"><i class="bi bi-gear-fill"></i><span>Profil</span></a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const inputHarian = document.getElementById('inputHarian');
        const inputBulanan = document.getElementById('inputBulanan');
        const inputTahunan = document.getElementById('inputTahunan');
        const filterKelas = document.getElementById('filterKelas');
        const searchInput = document.querySelector('.search-box input');
        const jumlahSiswaElem = document.getElementById('jumlahSiswaText');

        if (inputHarian) inputHarian.valueAsDate = new Date();
        if (inputTahunan) inputTahunan.value = new Date().getFullYear();

        let currentMode = 'harian';
        let currentWaktu = new Date().toISOString().split('T')[0];
        let currentKelas = 'semua';
        let currentDisplayMode = 'harian';

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

        function setMode(mode) {
            currentMode = mode;

            document.querySelectorAll('.f-tab').forEach(tab => tab.classList.remove('active'));

            if (inputHarian) inputHarian.style.display = 'none';
            if (inputBulanan) inputBulanan.style.display = 'none';
            if (inputTahunan) inputTahunan.style.display = 'none';

            if (mode === 'harian') {
                document.getElementById('tabHarian').classList.add('active');
                if (inputHarian) {
                    inputHarian.style.display = 'block';
                    currentWaktu = inputHarian.value || new Date().toISOString().split('T')[0];
                }
            } else if (mode === 'bulanan') {
                document.getElementById('tabBulanan').classList.add('active');
                if (inputBulanan) {
                    inputBulanan.style.display = 'block';
                    currentWaktu = inputBulanan.value || new Date().toISOString().slice(0, 7);
                }
            } else if (mode === 'tahunan') {
                document.getElementById('tabTahunan').classList.add('active');
                if (inputTahunan) {
                    inputTahunan.style.display = 'block';
                    currentWaktu = inputTahunan.value || new Date().getFullYear().toString();
                }
            }

            loadData();
        }

        if (inputHarian) inputHarian.addEventListener('change', function() {
            currentWaktu = this.value;
            loadData();
        });
        if (inputBulanan) inputBulanan.addEventListener('change', function() {
            currentWaktu = this.value;
            loadData();
        });
        if (inputTahunan) inputTahunan.addEventListener('change', function() {
            currentWaktu = this.value;
            loadData();
        });
        if (filterKelas) filterKelas.addEventListener('change', function() {
            currentKelas = this.value;
            loadData();
        });

        if (searchInput) {
            searchInput.addEventListener('keyup', function() {
                const keyword = this.value.toLowerCase();
                const cards = document.querySelectorAll('.student-card');
                cards.forEach(card => {
                    const nama = card.querySelector('h6')?.innerText.toLowerCase() || '';
                    card.style.display = nama.includes(keyword) ? 'flex' : 'none';
                });
            });
        }

        function loadData() {
            const container = document.getElementById('dataRekapContainer');
            if (container) container.innerHTML =
                '<div class="text-center py-4 text-secondary">Memuat data...</div>';

            fetch(`/guru/rekap/filter?mode=${currentMode}&waktu=${currentWaktu}&kelas=${currentKelas}`)
                .then(response => response.json())
                .then(result => {
                    if (result.status === 'success') {
                        currentDisplayMode = result.displayMode || 'harian';
                        renderRekapData(result.data, currentDisplayMode);
                        jumlahSiswaElem.innerHTML = `Menampilkan ${result.data.length} Siswa`;
                    } else {
                        if (container) container.innerHTML = '<div class="alert alert-danger">Gagal memuat data</div>';
                        showNotif('Gagal memuat data', 'error');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    if (container) container.innerHTML = '<div class="alert alert-danger">Terjadi kesalahan</div>';
                    showNotif('Terjadi kesalahan', 'error');
                });
        }

        function renderRekapData(dataSiswa, mode) {
            const container = document.getElementById('dataRekapContainer');
            if (!container) return;
            if (dataSiswa.length === 0) {
                container.innerHTML = '<div class="alert alert-warning text-center">Tidak ada data</div>';
                return;
            }

            let html = '';

            if (mode === 'harian') {
                // ========== MODE HARIAN = BADGE WARNA 2 KOLOM ==========
                const urutanKegiatan = ['Kehadiran Pagi', 'Sholat Dhuha', 'Sholat Dhuhur', 'Keputrian', 'Sholat Ashar',
                    'Sholat Maghrib', 'Sholat Isya', 'Sholat Subuh'
                ];

                for (let siswa of dataSiswa) {
                    let inisial = siswa.nama_lengkap.substring(0, 2).toUpperCase();
                    let badges = '';

                    for (let kegiatan of urutanKegiatan) {
                        let status = siswa.kegiatan[kegiatan] || 'Belum';
                        let statusClass = '';
                        let shortName = '';

                        if (kegiatan === 'Kehadiran Pagi') shortName = 'Pagi';
                        else if (kegiatan === 'Sholat Dhuha') shortName = 'Dhuha';
                        else if (kegiatan === 'Sholat Dhuhur') shortName = 'Dhuhur';
                        else if (kegiatan === 'Sholat Ashar') shortName = 'Ashar';
                        else if (kegiatan === 'Sholat Maghrib') shortName = 'Magrib';
                        else if (kegiatan === 'Sholat Isya') shortName = 'Isya';
                        else if (kegiatan === 'Sholat Subuh') shortName = 'Subuh';
                        else if (kegiatan === 'Keputrian') shortName = 'Keputrian';

                        if (status === 'Hadir') statusClass = 'keg-hadir';
                        else if (status === 'Izin' || status === 'Sakit') statusClass = 'keg-izin';
                        else statusClass = 'keg-belum';

                        badges += `<span class="badge-keg ${statusClass}">${shortName}</span>`;
                    }

                    html += `<div class="student-card">
                        <div class="student-avatar">${inisial}</div>
                        <div class="flex-fill">
                            <div class="d-flex justify-content-between">
                                <h6 class="fw-bold mb-1" style="font-size: 0.85rem;">${siswa.nama_lengkap}</h6>
                                <span class="badge bg-light text-secondary" style="font-size: 0.6rem;">${siswa.kode_kelas}</span>
                            </div>
                            <div class="status-badges">${badges}</div>
                        </div>
                    </div>`;
                }
            } else {
                // ========== MODE BULANAN/TAHUNAN = TEKS HADIR/IZIN/ALPA ==========
                const urutanKegiatan = ['Kehadiran Pagi', 'Sholat Dhuha', 'Sholat Dhuhur', 'Keputrian', 'Sholat Ashar',
                    'Sholat Maghrib', 'Sholat Isya', 'Sholat Subuh'
                ];

                for (let siswa of dataSiswa) {
                    let inisial = siswa.nama_lengkap.substring(0, 2).toUpperCase();
                    let badges = '';

                    for (let kegiatan of urutanKegiatan) {
                        let shortName = '';
                        if (kegiatan === 'Kehadiran Pagi') shortName = 'Pagi';
                        else if (kegiatan === 'Sholat Dhuha') shortName = 'Dhuha';
                        else if (kegiatan === 'Sholat Dhuhur') shortName = 'Dhuhur';
                        else if (kegiatan === 'Sholat Ashar') shortName = 'Ashar';
                        else if (kegiatan === 'Sholat Maghrib') shortName = 'Magrib';
                        else if (kegiatan === 'Sholat Isya') shortName = 'Isya';
                        else if (kegiatan === 'Sholat Subuh') shortName = 'Subuh';
                        else if (kegiatan === 'Keputrian') shortName = 'Keputrian';

                        let data = siswa.kegiatan[kegiatan] || {
                            Hadir: 0,
                            Izin: 0,
                            Sakit: 0,
                            Alpa: 0
                        };
                        let hadir = data.Hadir || 0;
                        let izin = (data.Izin || 0) + (data.Sakit || 0);
                        let alpa = data.Alpa || 0;

                        badges += `<div class="stat-card">
                            <div class="stat-nama">${shortName}</div>
                            <div class="stat-angka">
                                <span style="color:#22C55E;">Hadir ${hadir}</span><br>
                                <span style="color:#EAB308;">Izin ${izin}</span><br>
                                <span style="color:#EF4444;">Alpa ${alpa}</span>
                            </div>
                        </div>`;
                    }

                    html += `<div class="student-card">
                        <div class="student-avatar">${inisial}</div>
                        <div class="flex-fill">
                            <div class="d-flex justify-content-between">
                                <h6 class="fw-bold mb-1" style="font-size: 0.85rem;">${siswa.nama_lengkap}</h6>
                                <span class="badge bg-light text-secondary" style="font-size: 0.6rem;">${siswa.kode_kelas}</span>
                            </div>
                            <div class="status-statistik">${badges}</div>
                        </div>
                    </div>`;
                }
            }

            container.innerHTML = html;

            if (searchInput) {
                const keyword = searchInput.value.toLowerCase();
                const cards = document.querySelectorAll('.student-card');
                cards.forEach(card => {
                    const nama = card.querySelector('h6')?.innerText.toLowerCase() || '';
                    card.style.display = nama.includes(keyword) ? 'flex' : 'none';
                });
            }
        }

        function cetakPDF() {
            window.location.href = `/guru/rekap/cetak?mode=${currentMode}&waktu=${currentWaktu}&kelas=${currentKelas}`;
        }

        loadData();
    </script>
</body>

</html>
