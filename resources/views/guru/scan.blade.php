<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemindai Guru - Sistem Informasi Monitoring</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

    <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>

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
            --shadow-lg: 0 15px 40px rgba(59, 130, 246, 0.12);
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(180deg, #EBF2FF 0%, #F0F4FF 30%, #FFFFFF 100%);
            color: var(--text-dark);
            min-height: 100vh;
            padding-bottom: 100px;
        }

        /* ========== AWAN & HEADER ========== */
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
        }

        .cloud-2 {
            width: 180px;
            height: 100px;
            bottom: 15%;
            left: -6%;
        }

        @keyframes floatCloud {

            0%,
            100% {
                transform: translateX(0) translateY(0);
            }

            50% {
                transform: translateX(-12px) translateY(6px);
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

        /* ========== SCANNER CARD & SELECT ========== */
        .scanner-card {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(15px);
            border-radius: 20px;
            border: 1px solid var(--border-light);
            box-shadow: var(--shadow-lg);
            padding: 20px;
            text-align: center;
            margin-top: -20px;
            position: relative;
            z-index: 10;
        }

        .form-select-custom {
            border-radius: 12px;
            background: #F8FAFC;
            border: 1.5px solid var(--border-light);
            font-size: 0.95rem;
            font-weight: 600;
            color: #3B82F6;
        }

        /* ========== AREA KAMERA ========== */
        #reader {
            width: 100%;
            border-radius: 16px;
            overflow: hidden;
            border: 2px solid #93C5FD;
            box-shadow: 0 4px 20px rgba(59, 130, 246, 0.1);
        }

        #reader video {
            border-radius: 14px;
        }

        #reader button {
            background: linear-gradient(135deg, #3B82F6 0%, #60A5FA 100%) !important;
            color: #ffffff !important;
            border: none !important;
            border-radius: 12px !important;
            padding: 8px 18px !important;
            font-size: 0.85rem !important;
            font-weight: 600 !important;
            margin: 5px !important;
            box-shadow: 0 4px 15px rgba(59, 130, 246, 0.3) !important;
        }

        /* ========== AREA USB SCANNER ========== */
        .divider-text {
            display: flex;
            align-items: center;
            text-align: center;
            color: var(--text-muted);
            font-size: 0.75rem;
            font-weight: 600;
            margin: 20px 0;
        }

        .divider-text::before,
        .divider-text::after {
            content: '';
            flex: 1;
            border-bottom: 1px solid var(--border-light);
        }

        .divider-text:not(:empty)::before {
            margin-right: .5em;
        }

        .divider-text:not(:empty)::after {
            margin-left: .5em;
        }

        .usb-scanner-area {
            background: rgba(59, 130, 246, 0.05);
            border: 2px dashed #93C5FD;
            border-radius: 16px;
            padding: 15px;
            transition: all 0.3s ease;
        }

        .usb-scanner-area:focus-within {
            border-color: #3B82F6;
            background: rgba(59, 130, 246, 0.1);
        }

        #usbScannerInput {
            border: 2px solid transparent;
            border-radius: 12px;
            background-color: #FFFFFF;
            font-size: 1.1rem;
            letter-spacing: 1px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        }

        #usbScannerInput:focus {
            border-color: #3B82F6;
            box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.15);
        }

        #usbScannerInput::placeholder {
            font-size: 0.75rem;
            font-weight: 400;
            letter-spacing: normal;
        }

        /* ========== NAV BAWAH & TOAST ========== */
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
        }

        .nav-link {
            text-decoration: none;
            color: #94A3B8;
            font-size: 0.62rem;
            text-align: center;
            font-weight: 600;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 3px;
            min-width: 52px;
        }

        .nav-link i {
            font-size: 1.3rem;
        }

        .nav-link.active {
            color: #3B82F6;
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
        }

        .nav-scan-btn i {
            color: white !important;
            font-size: 1.5rem !important;
        }

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
        }

        .toast-notif.success {
            background: #10B981;
        }

        .toast-notif.warning {
            background: #F59E0B;
        }

        .toast-notif.error {
            background: #EF4444;
        }

        .toast-notif.show {
            display: flex;
        }
    </style>
</head>

<body>

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
                <small class="text-white text-opacity-75" style="font-weight: 500;">Menu Kamera Pemindai</small>
            </div>
        </div>
    </div>

    <main class="container px-4">
        <div class="scanner-card">

            <div class="mb-4 text-start">
                <label class="form-label fw-bold small text-secondary">Pilih Jenis Kegiatan:</label>
                <select id="pilihanKegiatan"
                    class="form-select form-select-lg rounded-3 fs-6 bg-light fw-bold text-primary border-primary">
                    <option value="Kehadiran Pagi">Kehadiran Pagi</option>
                    <option value="Sholat Dhuha">Sholat Dhuha</option>
                    <option value="Sholat Dhuhur">Sholat Dhuhur</option>
                    <option value="Keputrian">Keputrian</option>
                    <option value="Sholat Ashar">Sholat Ashar</option>
                    <option value="Sholat Maghrib">Sholat Maghrib</option>
                    <option value="Sholat Isya">Sholat Isya</option>
                    <option value="Sholat Subuh">Sholat Subuh</option>
                </select>
            </div>

            <div class="text-start mb-2">
                <label class="form-label fw-bold small text-primary">
                    <i class="bi bi-camera-video me-1"></i> Gunakan Kamera HP
                </label>
            </div>
            <div id="reader"></div>

            <div class="divider-text">ATAU</div>

            <div class="usb-scanner-area text-start">
                <label for="usbScannerInput" class="form-label fw-bold small text-primary mb-2">
                    <i class="bi bi-usb-symbol me-1"></i> Gunakan Scanner Fisik (USB)
                </label>
                <input type="text" id="usbScannerInput" class="form-control text-center fw-bold"
                    placeholder="Pastikan kursor di sini lalu tembak..." autofocus autocomplete="off" inputmode="none">
            </div>

        </div>
    </main>

    <div class="bottom-nav">
        <a href="{{ route('guru.dashboard') }}" class="nav-link">
            <i class="bi bi-house-door-fill"></i>
            <span>Beranda</span>
        </a>
        <a href="/guru/rekap" class="nav-link">
            <i class="bi bi-clipboard-data-fill"></i>
            <span>Rekap</span>
        </a>
        <a href="{{ route('guru.scan.view') }}" class="nav-link nav-center active">
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

    <div id="toastNotif" class="toast-notif">
        <i id="toastIcon" class="bi bi-check-circle-fill"></i>
        <span id="toastMessage"></span>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        let isProcessing = false;
        let html5QrcodeScanner;
        const scannerInput = document.getElementById('usbScannerInput');
        const dropdownKegiatan = document.getElementById('pilihanKegiatan');

        // Fungsi Notifikasi Toast
        function showNotif(message, type = 'success') {
            const toast = document.getElementById('toastNotif');
            const icon = document.getElementById('toastIcon');
            const msg = document.getElementById('toastMessage');

            toast.classList.remove('success', 'warning', 'error', 'show');

            if (type === 'success') {
                toast.classList.add('success');
                icon.className = 'bi bi-check-circle-fill';
            } else if (type === 'warning') {
                toast.classList.add('warning');
                icon.className = 'bi bi-exclamation-triangle-fill';
            } else {
                toast.classList.add('error');
                icon.className = 'bi bi-x-circle-fill';
            }

            msg.innerText = message;
            toast.classList.add('show');
            setTimeout(() => { toast.classList.remove('show'); }, 3000);
        }

        // FUNGSI UTAMA: Mengolah data yang didapat dari Kamera MAUPUN Scanner USB
        function prosesDataScan(decodedText) {
            if (isProcessing) return;
            isProcessing = true;

            let jenisKegiatan = dropdownKegiatan.value;

            fetch("{{ route('guru.scan.store') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                },
                body: JSON.stringify({
                    kode_qr: decodedText,
                    kegiatan: jenisKegiatan
                })
            })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        showNotif(data.message, 'success');
                    } else if (data.status === 'warning') {
                        showNotif(data.message, 'warning');
                    } else {
                        showNotif(data.message, 'error');
                    }
                    isProcessing = false;
                })
                .catch(error => {
                    console.error('Error:', error);
                    showNotif('Terjadi kesalahan pada server', 'error');
                    isProcessing = false;
                });
        }

        // --- LOGIKA 1: KAMERA ---
        function onScanSuccess(decodedText, decodedResult) {
            prosesDataScan(decodedText);
        }

        document.addEventListener("DOMContentLoaded", function () {
            html5QrcodeScanner = new Html5QrcodeScanner("reader", {
                fps: 10,
                qrbox: { width: 250, height: 250 },
                aspectRatio: 1.0,
                supportedScanTypes: [Html5QrcodeScanType.SCAN_TYPE_CAMERA]
            }, false);

            html5QrcodeScanner.render(onScanSuccess, function (error) { });
        });

        // --- LOGIKA 2: SCANNER USB FISIK ---
        // Memastikan kursor otomatis kembali ke kolom input USB jika klik di tempat kosong
        document.addEventListener('click', function (e) {
            const isClickInsideReader = document.getElementById('reader').contains(e.target);
            const isDropdown = e.target.id === 'pilihanKegiatan';

            if (!isClickInsideReader && !isDropdown) {
                scannerInput.focus();
            }
        });

        scannerInput.addEventListener('keypress', function (e) {
            if (e.key === 'Enter') {
                e.preventDefault();
                let decodedText = scannerInput.value.trim();

                if (decodedText !== "") {
                    scannerInput.value = ""; // Kosongkan kotak
                    prosesDataScan(decodedText); // Kirim ke server
                }
            }
        });
    </script>

</body>

</html>