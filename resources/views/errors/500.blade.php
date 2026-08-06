<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>500 - Gangguan Server | Sistem Informasi Monitoring</title>
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

        /* ========== ROBOT + PERALATAN ========== */
        .robot-area {
            position: relative;
            display: inline-block;
            margin-bottom: 5px;
        }

        .robot {
            font-size: 65px;
            display: inline-block;
            animation: robotWork 1.5s infinite ease-in-out;
            filter: drop-shadow(0 8px 20px rgba(239, 68, 68, 0.25));
        }

        @keyframes robotWork {

            0%,
            100% {
                transform: translateY(0) rotate(0deg);
            }

            15% {
                transform: translateY(-8px) rotate(-3deg);
            }

            30% {
                transform: translateY(0) rotate(3deg);
            }

            45% {
                transform: translateY(-5px) rotate(-2deg);
            }

            60% {
                transform: translateY(0) rotate(2deg);
            }

            75% {
                transform: translateY(-3px) rotate(-1deg);
            }
        }

        /* Tools berterbangan */
        .tool {
            position: absolute;
            font-size: 18px;
            opacity: 0;
            animation: toolFly 2.5s infinite;
        }

        .tool-1 {
            top: -5px;
            right: -10px;
            animation-delay: 0s;
        }

        .tool-2 {
            top: -15px;
            right: -30px;
            animation-delay: 0.6s;
        }

        .tool-3 {
            top: 5px;
            right: -40px;
            animation-delay: 1.2s;
        }

        .tool-4 {
            top: -10px;
            right: -50px;
            animation-delay: 1.8s;
        }

        @keyframes toolFly {
            0% {
                opacity: 0;
                transform: translateY(0) rotate(0deg) scale(0.5);
            }

            20% {
                opacity: 1;
                transform: translateY(-10px) rotate(20deg) scale(1);
            }

            40% {
                opacity: 1;
                transform: translateY(-20px) rotate(-20deg) scale(1.1);
            }

            60% {
                opacity: 0.5;
                transform: translateY(-25px) rotate(10deg) scale(0.8);
            }

            100% {
                opacity: 0;
                transform: translateY(-35px) rotate(0deg) scale(0.5);
            }
        }

        /* Percikan api */
        .spark {
            position: absolute;
            font-size: 12px;
            opacity: 0;
            animation: sparkle 1s infinite;
        }

        .spark-1 {
            top: 15px;
            right: -5px;
            animation-delay: 0s;
        }

        .spark-2 {
            top: 20px;
            right: -15px;
            animation-delay: 0.4s;
        }

        .spark-3 {
            top: 10px;
            right: -20px;
            animation-delay: 0.8s;
        }

        @keyframes sparkle {
            0% {
                opacity: 0;
                transform: scale(0);
            }

            30% {
                opacity: 1;
                transform: scale(1);
            }

            60% {
                opacity: 0.6;
                transform: scale(0.6);
            }

            100% {
                opacity: 0;
                transform: scale(0);
            }
        }

        /* ========== ERROR CODE ========== */
        .error-code {
            font-size: 75px;
            font-weight: 900;
            background: linear-gradient(135deg, #DC2626, #EF4444);
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
                transform: translateX(-4px);
            }

            94% {
                transform: translateX(4px);
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
            background: #FEE2E2;
            color: #DC2626;
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

        /* Loading dots */
        .loading-dots {
            margin-top: 8px;
            font-size: 20px;
            letter-spacing: 5px;
            animation: loadingDot 1.5s infinite;
        }

        @keyframes loadingDot {

            0%,
            20% {
                opacity: 0.2;
            }

            50% {
                opacity: 1;
            }

            80%,
            100% {
                opacity: 0.2;
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
        <!-- Robot + Tools -->
        <div class="robot-area">
            <span class="robot">🤖</span>
            <span class="tool tool-1">🔧</span>
            <span class="tool tool-2">🔩</span>
            <span class="tool tool-3">🪛</span>
            <span class="tool tool-4">⚙️</span>
            <span class="spark spark-1">✨</span>
            <span class="spark spark-2">💥</span>
            <span class="spark spark-3">⚡</span>
        </div>

        <h1 class="error-code">500</h1>
        <h2 class="error-title">Server Lagi Sibuk</h2>
        <p class="error-message">
            Si robot udah kerja keras betulin server, tools beterbangan, tapi masih error juga. Tim teknis kami sedang
            memperbaikinya. Coba lagi nanti ya!
        </p>

        <a href="{{ url('/') }}" class="btn-home">Kembali ke Beranda</a>

    </div>

</body>

</html>