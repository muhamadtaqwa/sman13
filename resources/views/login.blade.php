<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistem Informasi Monitoring</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/fonts/bootstrap-icons.css">
    <link rel="manifest" href="{{ asset('manifest.json') }}">
    <meta name="theme-color" content="#000000">

    <script>
        if ('serviceWorker' in navigator) {
            window.addEventListener('load', () => {
                navigator.serviceWorker.register('/sw.js').then((registration) => {
                    console.log('SW terdaftar!');
                }).catch((error) => {
                    console.log('SW gagal:', error);
                });
            });
        }
    </script>

    <style>
        :root {
            --sky-blue: #3B82F6;
            --sky-light: #60A5FA;
            --sky-soft: #93C5FD;
            --cloud-white: #FFFFFF;
            --cloud-soft: #F8FAFC;
            --text-dark: #1E3A5F;
            --text-muted: #64748B;
            --border-light: rgba(59, 130, 246, 0.12);
            --shadow-sm: 0 2px 8px rgba(59, 130, 246, 0.08);
            --shadow-md: 0 8px 30px rgba(59, 130, 246, 0.12);
            --shadow-lg: 0 20px 60px rgba(59, 130, 246, 0.15);
            --radius-xl: 24px;
            --radius-lg: 16px;
            --radius-md: 12px;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(180deg, #EBF2FF 0%, #F0F4FF 40%, #FFFFFF 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
            position: relative;
            overflow: hidden;
        }

        /* ========== AWAN DEKORATIF ========== */
        .cloud {
            position: absolute;
            background: rgba(255, 255, 255, 0.7);
            border-radius: 50%;
            filter: blur(50px);
            z-index: 0;
            pointer-events: none;
            animation: floatCloud 20s infinite ease-in-out;
        }

        .cloud-1 {
            width: 250px;
            height: 140px;
            top: 5%;
            left: -10%;
            animation-delay: 0s;
        }

        .cloud-2 {
            width: 200px;
            height: 120px;
            top: 20%;
            right: -12%;
            animation-delay: -7s;
        }

        .cloud-3 {
            width: 220px;
            height: 130px;
            bottom: 10%;
            left: -8%;
            animation-delay: -14s;
        }

        .cloud-4 {
            width: 180px;
            height: 100px;
            bottom: 25%;
            right: -6%;
            animation-delay: -18s;
        }

        @keyframes floatCloud {

            0%,
            100% {
                transform: translateX(0) translateY(0);
            }

            25% {
                transform: translateX(30px) translateY(-15px);
            }

            50% {
                transform: translateX(-15px) translateY(8px);
            }

            75% {
                transform: translateX(20px) translateY(-10px);
            }
        }

        /* ========== AKSEN BIRU LANGIT ========== */
        .sky-accent {
            position: absolute;
            border-radius: 50%;
            opacity: 0.12;
            z-index: 0;
            pointer-events: none;
            filter: blur(60px);
        }

        .sky-accent-1 {
            width: 280px;
            height: 280px;
            background: #3B82F6;
            top: -12%;
            right: -15%;
        }

        .sky-accent-2 {
            width: 200px;
            height: 200px;
            background: #60A5FA;
            bottom: -8%;
            left: -10%;
        }

        /* ========== LOGIN WRAPPER ========== */
        .login-wrapper {
            width: 100%;
            max-width: 400px;
            padding: 20px;
            z-index: 10;
        }

        /* ========== LOGIN CARD ========== */
        .login-card {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-radius: var(--radius-xl);
            box-shadow: var(--shadow-lg);
            padding: 40px 30px;
            border: 1px solid var(--border-light);
            position: relative;
        }

        .login-card::before {
            content: '';
            position: absolute;
            inset: -1px;
            border-radius: var(--radius-xl);
            background: linear-gradient(135deg, rgba(59, 130, 246, 0.15), rgba(96, 165, 250, 0.1));
            z-index: -1;
            filter: blur(10px);
        }

        /* ========== LOGO CONTAINER ========== */
        .logo-container {
            text-align: center;
            margin-bottom: 30px;
        }

        .logo-container img {
            width: 70px;
            height: 70px;
            object-fit: contain;
            margin-bottom: 15px;
            border-radius: 18px;
            box-shadow: 0 8px 25px rgba(59, 130, 246, 0.15);
            padding: 8px;
            background: #fff;
            border: 2px solid rgba(59, 130, 246, 0.1);
        }

        .app-name {
            font-size: 1.15rem;
            font-weight: 700;
            color: var(--text-dark);
            letter-spacing: 0.3px;
            margin-bottom: 4px;
        }

        .app-sub {
            font-size: 0.9rem;
            color: var(--sky-blue);
            font-weight: 600;
            background: rgba(59, 130, 246, 0.08);
            display: inline-block;
            padding: 4px 16px;
            border-radius: 100px;
            margin-top: 4px;
        }

        /* ========== DIVIDER ========== */
        .divider {
            display: flex;
            align-items: center;
            gap: 12px;
            margin: 24px 0;
            color: var(--text-muted);
            font-size: 0.8rem;
            font-weight: 500;
        }

        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background: var(--border-light);
        }

        /* ========== FORM LABEL ========== */
        .form-label {
            font-size: 0.88rem;
            font-weight: 600;
            color: var(--text-dark);
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .form-label i {
            color: var(--sky-blue);
            font-size: 0.85rem;
        }

        /* ========== INPUT GROUP ========== */
        .input-group-custom {
            position: relative;
            margin-bottom: 20px;
        }

        .input-group-custom .input-icon {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: #94A3B8;
            font-size: 1.1rem;
            z-index: 5;
            transition: color 0.3s ease;
        }

        .form-control {
            background-color: var(--cloud-soft);
            border: 1.5px solid var(--border-light);
            border-radius: var(--radius-md);
            padding: 14px 16px 14px 46px;
            font-size: 0.95rem;
            color: var(--text-dark);
            transition: all 0.3s ease;
            font-weight: 500;
        }

        .form-control::placeholder {
            color: #B0BEC5;
            font-weight: 400;
        }

        .form-control:focus {
            background-color: #FFFFFF;
            border-color: var(--sky-blue);
            box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.12);
        }

        .input-group-custom:focus-within .input-icon {
            color: var(--sky-blue);
        }

        /* ========== ALERT ERROR ========== */
        .alert-danger {
            background: #FEF2F2 !important;
            border: 1px solid #FECACA !important;
            color: #DC2626 !important;
            border-radius: var(--radius-md) !important;
            font-weight: 600;
            font-size: 0.85rem;
        }

        /* ========== BUTTON ========== */
        .btn-primary-custom {
            background: linear-gradient(135deg, #3B82F6 0%, #60A5FA 100%);
            color: white;
            border: none;
            border-radius: var(--radius-md);
            padding: 14px;
            font-weight: 600;
            font-size: 1rem;
            width: 100%;
            margin-top: 10px;
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
            box-shadow: 0 8px 25px rgba(59, 130, 246, 0.3);
            letter-spacing: 0.3px;
            position: relative;
            overflow: hidden;
        }

        .btn-primary-custom::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s ease;
        }

        .btn-primary-custom:hover::before {
            left: 100%;
        }

        .btn-primary-custom:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 35px rgba(59, 130, 246, 0.45);
        }

        .btn-primary-custom:active {
            transform: translateY(0);
            box-shadow: 0 4px 15px rgba(59, 130, 246, 0.3);
        }

        /* ========== FOOTER TEXT ========== */
        .login-footer {
            text-align: center;
            margin-top: 20px;
            font-size: 0.78rem;
            color: var(--text-muted);
        }

        .login-footer span {
            color: var(--sky-blue);
            font-weight: 500;
        }
    </style>
</head>

<body>

    <div class="cloud cloud-1"></div>
    <div class="cloud cloud-2"></div>
    <div class="cloud cloud-3"></div>
    <div class="cloud cloud-4"></div>

    <div class="sky-accent sky-accent-1"></div>
    <div class="sky-accent sky-accent-2"></div>

    <main class="login-wrapper">
        <div class="login-card">

            <div class="logo-container">
                <img src="{{ asset('logo.png') }}" alt="Logo Sekolah">
                <div class="app-name">Sistem Informasi Monitoring</div>
                <div class="app-sub">SMAN 13 Semarang</div>
            </div>

            @if ($errors->any())
                <div
                    class="alert alert-danger rounded-3 py-2 px-3 small border-0 bg-danger bg-opacity-10 text-danger fw-bold text-center mb-3">
                    <i class="bi bi-exclamation-triangle-fill me-1"></i> Username atau Password salah!
                </div>
            @endif

            <form action="/login-web" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">
                        <i class="bi bi-person-fill"></i> Username
                    </label>
                    <div class="input-group-custom">
                        <i class="bi bi-person input-icon"></i>
                        <input type="text" name="username" class="form-control" placeholder="Masukkan username" required
                            autofocus>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="form-label">
                        <i class="bi bi-lock-fill"></i> Kata Sandi
                    </label>
                    <div class="input-group-custom">
                        <i class="bi bi-lock input-icon"></i>
                        <input type="password" name="password" class="form-control" placeholder="Masukkan kata sandi"
                            required>
                    </div>
                </div>

                <button type="submit" class="btn-primary-custom">
                    <i class="bi bi-box-arrow-in-right me-2"></i> Login
                </button>
            </form>

        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>