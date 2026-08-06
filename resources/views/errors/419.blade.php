<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>419 - Sesi Kedaluwarsa | Sistem Informasi Monitoring</title>
    <style>
        :root {
            --sky-blue: #3B82F6;
            --sky-light: #60A5FA;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(180deg, #EBF2FF 0%, #F0F4FF 50%, #FFFFFF 100%);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            text-align: center;
            overflow: hidden;
            position: relative;
        }

        /* ========== AWAN ========== */
        .cloud {
            position: absolute;
            background: rgba(255, 255, 255, 0.7);
            border-radius: 50%;
            filter: blur(45px);
            z-index: 0;
            animation: floatCloud 22s infinite ease-in-out;
        }

        .cloud-1 {
            width: 200px;
            height: 100px;
            top: 5%;
            left: -6%;
            animation-delay: 0s;
        }

        .cloud-2 {
            width: 160px;
            height: 80px;
            top: 22%;
            right: -8%;
            animation-delay: -8s;
        }

        .cloud-3 {
            width: 140px;
            height: 70px;
            bottom: 18%;
            left: 8%;
            animation-delay: -15s;
        }

        @keyframes floatCloud {

            0%,
            100% {
                transform: translateX(0) translateY(0);
            }

            25% {
                transform: translateX(35px) translateY(-18px);
            }

            50% {
                transform: translateX(-15px) translateY(10px);
            }

            75% {
                transform: translateX(25px) translateY(-12px);
            }
        }

        /* ========== ERROR CONTAINER ========== */
        .error-container {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            padding: 35px 30px;
            border-radius: 24px;
            box-shadow: 0 20px 60px rgba(59, 130, 246, 0.15);
            max-width: 420px;
            width: 90%;
            position: relative;
            z-index: 10;
            border: 1px solid rgba(59, 130, 246, 0.1);
            animation: bounceIn 0.7s cubic-bezier(0.16, 1, 0.3, 1);
        }

        @keyframes bounceIn {
            0% {
                transform: scale(0.3);
                opacity: 0;
            }

            50% {
                transform: scale(1.08);
            }

            70% {
                transform: scale(0.95);
            }

            100% {
                transform: scale(1);
                opacity: 1;
            }
        }

        /* ========== JAM PASIR ========== */
        .hourglass-wrapper {
            display: inline-block;
            position: relative;
            margin-bottom: 10px;
        }

        .hourglass {
            font-size: 70px;
            display: inline-block;
            animation: shake 0.6s infinite ease-in-out;
            filter: drop-shadow(0 8px 20px rgba(245, 158, 11, 0.35));
        }

        @keyframes shake {

            0%,
            100% {
                transform: rotate(0deg);
            }

            25% {
                transform: rotate(-8deg);
            }

            50% {
                transform: rotate(0deg);
            }

            75% {
                transform: rotate(8deg);
            }
        }

        /* Pasir jatuh */
        .sand-particles {
            position: absolute;
            top: 30px;
            left: 50%;
            transform: translateX(-50%);
            font-size: 10px;
            animation: sandFall 1.5s infinite;
            opacity: 0;
        }

        .sand-particles:nth-child(2) {
            animation-delay: 0.3s;
            left: 40%;
        }

        .sand-particles:nth-child(3) {
            animation-delay: 0.7s;
            left: 60%;
        }

        .sand-particles:nth-child(4) {
            animation-delay: 1.1s;
            left: 35%;
        }

        @keyframes sandFall {
            0% {
                opacity: 0;
                transform: translateX(-50%) translateY(0);
            }

            20% {
                opacity: 1;
            }

            80% {
                opacity: 0.5;
                transform: translateX(-50%) translateY(30px);
            }

            100% {
                opacity: 0;
                transform: translateX(-50%) translateY(35px);
            }
        }

        /* ========== ERROR CODE ========== */
        .error-code {
            font-size: 75px;
            font-weight: 900;
            background: linear-gradient(135deg, #F59E0B, #F97316);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin: 0;
            line-height: 1;
            animation: fadeBlink 2s infinite;
        }

        @keyframes fadeBlink {

            0%,
            100% {
                opacity: 1;
            }

            50% {
                opacity: 0.7;
            }
        }

        .error-title {
            font-size: 20px;
            color: #1E3A5F;
            margin-top: 10px;
            margin-bottom: 10px;
            font-weight: 700;
        }

        .error-message {
            color: #64748B;
            margin-bottom: 25px;
            font-size: 14px;
            line-height: 1.6;
            font-weight: 500;
        }

        .btn-refresh {
            display: inline-block;
            background: linear-gradient(135deg, #3B82F6 0%, #60A5FA 100%);
            color: white;
            text-decoration: none;
            padding: 14px 30px;
            border-radius: 50px;
            font-weight: 700;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            box-shadow: 0 8px 25px rgba(59, 130, 246, 0.35);
            border: none;
            cursor: pointer;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .btn-refresh:hover {
            transform: translateY(-3px);
            box-shadow: 0 14px 40px rgba(59, 130, 246, 0.5);
        }

        .btn-refresh:active {
            transform: scale(0.95);
        }

        .footer-text {
            margin-top: 15px;
            font-size: 0.7rem;
            color: #93C5FD;
            font-weight: 500;
        }

        /* Note kecil */
        .small-note {
            display: inline-block;
            background: #FEF3C7;
            color: #D97706;
            font-size: 0.65rem;
            font-weight: 700;
            padding: 4px 12px;
            border-radius: 50px;
            margin-top: 10px;
            animation: fadeInUp 1s ease 0.5s backwards;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body>

    <!-- Awan -->
    <div class="cloud cloud-1"></div>
    <div class="cloud cloud-2"></div>
    <div class="cloud cloud-3"></div>

    <div class="error-container">
        <!-- Jam Pasir -->
        <div class="hourglass-wrapper">
            <span class="hourglass">⏳</span>
            <span class="sand-particles">•</span>
            <span class="sand-particles">•</span>
            <span class="sand-particles">•</span>
            <span class="sand-particles">•</span>
        </div>

        <h1 class="error-code">419</h1>
        <h2 class="error-title">Sesi Telah Berakhir</h2>
        <p class="error-message">
            Halaman ini sudah terbuka terlalu lama. Token akses kamu sudah kedaluwarsa demi keamanan. Yuk, muat ulang!
        </p>

        <a href="{{ url('/') }}" class="btn-home">Kembali ke Halaman Login</a>

    </div>

</body>

</html>