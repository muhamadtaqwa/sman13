<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Halaman Tidak Ditemukan | Sistem Informasi Monitoring</title>
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

        /* ========== ICON BINGUNG ========== */
        .lost-icon {
            font-size: 75px;
            display: inline-block;
            animation: wander 2s infinite ease-in-out;
            filter: drop-shadow(0 8px 15px rgba(59, 130, 246, 0.25));
            margin-bottom: 10px;
        }

        @keyframes wander {
            0% {
                transform: translateX(0) rotate(0deg);
            }

            15% {
                transform: translateX(-25px) rotate(-10deg);
            }

            30% {
                transform: translateX(20px) rotate(8deg);
            }

            45% {
                transform: translateX(-15px) rotate(-5deg);
            }

            60% {
                transform: translateX(10px) rotate(5deg);
            }

            75% {
                transform: translateX(-5px) rotate(-3deg);
            }

            90% {
                transform: translateX(5px) rotate(2deg);
            }

            100% {
                transform: translateX(0) rotate(0deg);
            }
        }

        /* Tanda tanya melayang */
        .question-marks {
            position: relative;
            display: inline-block;
        }

        .qm {
            position: absolute;
            font-size: 18px;
            opacity: 0;
            animation: floatUp 2s infinite;
        }

        .qm-1 {
            top: -10px;
            right: -15px;
            animation-delay: 0s;
        }

        .qm-2 {
            top: -20px;
            right: -30px;
            animation-delay: 0.6s;
        }

        .qm-3 {
            top: -5px;
            right: -40px;
            animation-delay: 1.2s;
        }

        @keyframes floatUp {
            0% {
                opacity: 0;
                transform: translateY(0) scale(0.5);
            }

            30% {
                opacity: 1;
                transform: translateY(-15px) scale(1);
            }

            60% {
                opacity: 0.6;
                transform: translateY(-30px) scale(0.8);
            }

            100% {
                opacity: 0;
                transform: translateY(-45px) scale(0.5);
            }
        }

        /* ========== ERROR CODE ========== */
        .error-code {
            font-size: 75px;
            font-weight: 900;
            background: linear-gradient(135deg, #EF4444, #F59E0B);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin: 0;
            line-height: 1;
            animation: glitch 3s infinite;
        }

        @keyframes glitch {

            0%,
            90%,
            100% {
                transform: translateX(0);
            }

            92% {
                transform: translateX(-3px);
            }

            94% {
                transform: translateX(3px);
            }

            96% {
                transform: translateX(-2px);
            }

            98% {
                transform: translateX(2px);
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

        .btn-home {
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
        }

        .btn-home:hover {
            transform: translateY(-3px);
            box-shadow: 0 14px 40px rgba(59, 130, 246, 0.5);
        }

        .btn-home:active {
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

        /* Jejak kaki */
        .footprints {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-bottom: 5px;
            opacity: 0.4;
        }

        .fp {
            font-size: 14px;
            animation: stepFade 2s infinite;
        }

        .fp:nth-child(1) {
            animation-delay: 0s;
        }

        .fp:nth-child(2) {
            animation-delay: 0.3s;
        }

        .fp:nth-child(3) {
            animation-delay: 0.6s;
        }

        .fp:nth-child(4) {
            animation-delay: 0.9s;
        }

        .fp:nth-child(5) {
            animation-delay: 1.2s;
        }

        @keyframes stepFade {

            0%,
            100% {
                opacity: 0.2;
                transform: translateY(0);
            }

            50% {
                opacity: 0.7;
                transform: translateY(-5px);
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
        <!-- Jejak kaki -->
        <div class="footprints">
            <span class="fp">👣</span>
            <span class="fp">👣</span>
            <span class="fp">👣</span>
            <span class="fp">👣</span>
            <span class="fp">👣</span>
        </div>

        <!-- Icon bingung + tanda tanya -->
        <div class="question-marks">
            <span class="lost-icon">🗺️</span>
            <span class="qm qm-1">❓</span>
            <span class="qm qm-2">❔</span>
            <span class="qm qm-3">❓</span>
        </div>

        <h1 class="error-code">404</h1>
        <h2 class="error-title">Waduh! Halaman Nyasar</h2>
        <p class="error-message">
            Si peta udah muter-muter bingung, tapi halamannya tetap gak ketemu. Mungkin salah alamat atau udah dihapus.
        </p>

        <a href="{{ url('/') }}" class="btn-home">Kembali ke Beranda</a>

       
    </div>

</body>

</html>