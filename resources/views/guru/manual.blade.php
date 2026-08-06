<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Input Manual - Sistem Informasi Monitoring</title>

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
            padding: 25px 20px 35px 20px;
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

        /* ========== FORM CARD ========== */
        .form-card {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            border-radius: 20px;
            border: 1px solid var(--border-light);
            box-shadow: var(--shadow-lg);
            padding: 25px 20px;
            margin-top: -20px;
            position: relative;
            z-index: 10;
            margin-bottom: 20px;
        }

        .form-label {
            font-size: 0.8rem;
            font-weight: 700;
            color: var(--text-muted);
            margin-bottom: 8px;
            letter-spacing: 0.5px;
        }

        .form-control,
        .form-select {
            border-radius: 12px;
            border: 1.5px solid var(--border-light);
            background-color: #F8FAFC;
            padding: 12px 15px;
            font-size: 0.9rem;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #3B82F6;
            box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.12);
            background-color: #FFFFFF;
        }

        /* ========== KETERANGAN RADIO ========== */
        .btn-check-keterangan+.btn {
            border-radius: 12px;
            font-weight: 600;
            padding: 10px;
            border: 2px solid transparent;
            background: #F1F5F9;
            color: #64748B;
            transition: all 0.3s ease;
        }

        #izin:checked+.btn {
            background: #FFFBEB;
            border-color: #F59E0B;
            color: #D97706;
        }

        #sakit:checked+.btn {
            background: #FEF2F2;
            border-color: #EF4444;
            color: #DC2626;
        }

        #alpha:checked+.btn {
            background: #FEF2F2;
            border-color: #DC2626;
            color: #DC2626;
        }

        /* ========== KEGIATAN CHECK ========== */
        .kegiatan-check {
            background: #F8FAFC;
            border: 1px solid var(--border-light);
            border-radius: 12px;
            padding: 12px 15px;
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            transition: 0.3s ease;
        }

        .kegiatan-check:has(input:checked) {
            background: #EFF6FF;
            border-color: #93C5FD;
        }

        .form-check-input {
            width: 1.2em;
            height: 1.2em;
            margin-top: 0;
            cursor: pointer;
        }

        /* ========== TEXT SEHARIAN ========== */
        .info-box {
            background: #F0F4FF;
            border: 1px solid #DBEAFE;
            border-radius: 12px;
        }

        /* ========== SUBMIT BUTTON ========== */
        .btn-submit {
            background: linear-gradient(135deg, #3B82F6 0%, #60A5FA 100%);
            color: white;
            border: none;
            border-radius: 100px;
            padding: 14px;
            font-weight: 700;
            font-size: 1rem;
            box-shadow: 0 8px 25px rgba(59, 130, 246, 0.35);
            transition: all 0.3s ease;
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 35px rgba(59, 130, 246, 0.5);
        }

        .btn-submit:active {
            transform: translateY(0);
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

        /* ========== TOAST ========== */
        .toast-notif {
            position: fixed;
            bottom: 100px;
            left: 50%;
            transform: translateX(-50%);
            background: #1E293B;
            color: white;
            padding: 10px 20px;
            border-radius: 40px;
            font-weight: 600;
            font-size: 0.8rem;
            z-index: 1100;
            display: none;
            align-items: center;
            gap: 8px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2);
            max-width: 90%;
            text-align: center;
            line-height: 1.4;
        }

        .toast-notif.success {
            background: #10B981;
        }

        .toast-notif.error {
            background: #EF4444;
        }

        .toast-notif.show {
            display: flex;
            animation: fadeInUp 0.3s ease;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateX(-50%) translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateX(-50%) translateY(0);
            }
        }

        /* ========== RESPONSIVE ========== */
        @media (max-width: 576px) {
            .toast-notif {
                font-size: 0.75rem;
                padding: 8px 16px;
                bottom: 100px;
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

    <div class="header-modern d-flex align-items-center justify-content-between">
        <div class="d-flex align-items-center">
            <div class="logo-box me-3">
                <img src="{{ asset('logo.png') }}" alt="Logo"
                    onerror="this.src='https://ui-avatars.com/api/?name=SMAN&background=ffffff&color=3b82f6'">
            </div>
            <div>
                <h6 class="fw-bold mb-0" style="font-size: 1.1rem;">SMAN 13 Semarang</h6>
                <small class="text-white text-opacity-75" style="font-weight: 500;">Input Absensi Manual</small>
            </div>
        </div>
    </div>

    <div class="container px-4">
        <div class="form-card">
            <form action="{{ route('guru.manual.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">TANGGAL</label>
                    <input type="date" name="tanggal" class="form-control" id="tanggal" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">KELAS</label>
                    <select name="kode_kelas" class="form-select" id="pilihKelas" required>
                        <option value="" selected disabled>-- Pilih Kelas --</option>
                        @foreach($kelasList as $kelas)
                            <option value="{{ $kelas->kode_kelas }}">{{ $kelas->kode_kelas }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label class="form-label">NAMA SISWA</label>
                    <select name="nis" class="form-select" id="pilihSiswa" required disabled>
                        <option value="" selected disabled>-- Pilih Kelas Terlebih Dahulu --</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label class="form-label">KETERANGAN</label>
                    <div class="d-flex gap-2">
                        <input type="radio" class="btn-check btn-check-keterangan" name="keterangan" id="izin"
                            value="izin" autocomplete="off" checked>
                        <label class="btn flex-fill" for="izin">Izin</label>

                        <input type="radio" class="btn-check btn-check-keterangan" name="keterangan" id="sakit"
                            value="sakit" autocomplete="off">
                        <label class="btn flex-fill" for="sakit">Sakit</label>

                        <input type="radio" class="btn-check btn-check-keterangan" name="keterangan" id="alpha"
                            value="alpha" autocomplete="off">
                        <label class="btn flex-fill" for="alpha">Alpa</label>
                    </div>
                </div>

                <div class="mb-4">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <label class="form-label mb-0">KEGIATAN</label>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="switchSeharian" checked>
                            <label class="form-check-label small fw-bold text-primary"
                                for="switchSeharian">Seharian</label>
                        </div>
                    </div>

                    <div id="listKegiatan" style="display: none;">
                        @foreach($kegiatanList as $kegiatan)
                            <label class="kegiatan-check">
                                <span class="fw-bold text-dark" style="font-size: 0.9rem;">
                                    {{ $kegiatan->nama_kegiatan }}
                                </span>
                                <input class="form-check-input" type="checkbox" name="kegiatan[]"
                                    value="{{ $kegiatan->nama_kegiatan }}" checked>
                            </label>
                        @endforeach
                    </div>
                    <div id="textSeharian" class="p-3 info-box text-center">
                        <small class="text-secondary fw-semibold"><i class="bi bi-info-circle me-1"></i>Siswa ditandai
                            untuk <b>seluruh kegiatan</b> hari ini.</small>
                    </div>
                </div>

                <button type="submit" class="btn btn-submit w-100">
                    <i class="bi bi-save me-1"></i> Simpan Data Absensi
                </button>
            </form>
        </div>
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
        <a href="/guru/manual" class="nav-link active">
            <i class="bi bi-journal-medical"></i>
            <span>Manual</span>
        </a>
        <a href="/guru/settings" class="nav-link">
            <i class="bi bi-gear-fill"></i>
            <span>Profil</span>
        </a>
    </div>

    <div id="toastNotif" class="toast-notif">
        <i id="toastIcon" class="bi bi-check-circle-fill"></i>
        <span id="toastMessage"></span>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('tanggal').valueAsDate = new Date();

        const pilihKelas = document.getElementById('pilihKelas');
        const pilihSiswa = document.getElementById('pilihSiswa');
        const switchSeharian = document.getElementById('switchSeharian');
        const listKegiatan = document.getElementById('listKegiatan');
        const textSeharian = document.getElementById('textSeharian');

        function toggleKegiatan() {
            const isSeharian = switchSeharian.checked;
            const checkboxes = document.querySelectorAll('#listKegiatan .form-check-input');

            if (isSeharian) {
                if (listKegiatan) listKegiatan.style.display = 'none';
                if (textSeharian) textSeharian.style.display = 'block';
                checkboxes.forEach(cb => cb.checked = true);
            } else {
                if (listKegiatan) listKegiatan.style.display = 'block';
                if (textSeharian) textSeharian.style.display = 'none';
            }
        }

        switchSeharian.addEventListener('change', toggleKegiatan);

        pilihKelas.addEventListener('change', function () {
            const kodeKelas = this.value;

            if (!kodeKelas) {
                pilihSiswa.disabled = true;
                pilihSiswa.innerHTML = '<option value="" selected disabled>-- Pilih Kelas Terlebih Dahulu --</option>';
                return;
            }

            pilihSiswa.disabled = true;
            pilihSiswa.innerHTML = '<option value="" selected disabled>Memuat data...</option>';

            fetch(`/guru/manual/siswa/${encodeURIComponent(kodeKelas)}`)
                .then(response => response.json())
                .then(data => {
                    pilihSiswa.disabled = false;

                    if (data.length === 0) {
                        pilihSiswa.innerHTML = '<option value="" selected disabled>-- Tidak ada siswa di kelas ini --</option>';
                        return;
                    }

                    let options = '<option value="" selected disabled>-- Pilih Siswa --</option>';
                    data.forEach(siswa => {
                        options += `<option value="${siswa.nis}">${siswa.nama_lengkap}</option>`;
                    });
                    pilihSiswa.innerHTML = options;
                })
                .catch(error => {
                    console.error('Error:', error);
                    pilihSiswa.disabled = false;
                    pilihSiswa.innerHTML = '<option value="" selected disabled>-- Gagal memuat data --</option>';
                });
        });

        toggleKegiatan();

        function showNotif(message, type = 'success') {
            const toast = document.getElementById('toastNotif');
            const icon = document.getElementById('toastIcon');
            const msg = document.getElementById('toastMessage');

            toast.classList.remove('success', 'error', 'show');

            if (type === 'success') {
                toast.classList.add('success');
                icon.className = 'bi bi-check-circle-fill';
            } else if (type === 'warning') {
                toast.classList.add('error');
                icon.className = 'bi bi-exclamation-triangle-fill';
            } else {
                toast.classList.add('error');
                icon.className = 'bi bi-x-circle-fill';
            }

            msg.innerText = message;
            toast.classList.add('show');

            setTimeout(() => {
                toast.classList.remove('show');
            }, 3000);
        }

        @if(session('success'))
            showNotif("{{ session('success') }}", 'success');
        @endif

        @if(session('error'))
            showNotif("{{ session('error') }}", 'error');
        @endif

        @if(session('warning'))
            showNotif("{{ session('warning') }}", 'warning');
        @endif

        @if($errors->any())
            showNotif("{{ $errors->first() }}", 'error');
        @endif
    </script>

</body>

</html>