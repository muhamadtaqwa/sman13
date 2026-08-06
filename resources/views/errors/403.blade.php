<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>403 - Akses Ditolak | Sistem Informasi Monitoring</title>
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
                transform: scale(0.3) rotate(-5deg);
                opacity: 0;
            }

            50% {
                transform: scale(1.08) rotate(2deg);
            }

            70% {
                transform: scale(0.95) rotate(-1deg);
            }

            100% {
                transform: scale(1) rotate(0deg);
                opacity: 1;
            }
        }

        /* ========== KUNCI NARI ========== */
        .lock-dancer {
            font-size: 70px;
            display: inline-block;
            animation: dance 0.8s infinite ease-in-out;
            filter: drop-shadow(0 8px 15px rgba(59, 130, 246, 0.3));
            margin-bottom: 5px;
        }

        @keyframes dance {

            0%,
            100% {
                transform: rotate(0deg) translateY(0);
            }

            15% {
                transform: rotate(-15deg) translateY(-15px);
            }

            30% {
                transform: rotate(15deg) translateY(-25px);
            }

            45% {
                transform: rotate(-10deg) translateY(-10px);
            }

            60% {
                transform: rotate(10deg) translateY(-20px);
            }

            75% {
                transform: rotate(-5deg) translateY(-5px);
            }

            90% {
                transform: rotate(5deg) translateY(-10px);
            }
        }

        /* Bayangan kunci */
        .lock-shadow {
            width: 50px;
            height: 8px;
            background: rgba(59, 130, 246, 0.15);
            border-radius: 50%;
            margin: 0 auto 15px;
            animation: shadowPulse 0.8s infinite ease-in-out;
        }

        @keyframes shadowPulse {

            0%,
            100% {
                transform: scaleX(1);
                opacity: 0.3;
            }

            30% {
                transform: scaleX(0.6);
                opacity: 0.1;
            }

            60% {
                transform: scaleX(1.1);
                opacity: 0.4;
            }
        }

        /* ========== ERROR CODE ========== */
        .error-code {
            font-size: 75px;
            font-weight: 900;
            background: linear-gradient(135deg, #F59E0B, #EF4444);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin: 0;
            line-height: 1;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {

            0%,
            100% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.06);
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

        /* ========== NOTE KECIL LUCU ========== */
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
        <!-- Kunci Nari -->
        <div class="lock-dancer">🔐</div>
        <div class="lock-shadow"></div>

        <h1 class="error-code">403</h1>
        <h2 class="error-title">Akses Ditolak!</h2>
        <p class="error-message">
            Si kunci udah nari-nari, tapi kamu tetap gak bisa masuk. Area ini cuma untuk <strong>Guru</strong> atau
            <strong>Administrator</strong>.
        </p>

        <a href="{{ url('/') }}" class="btn-home">Kembali ke Beranda</a>

    </div>

</body>

</html>