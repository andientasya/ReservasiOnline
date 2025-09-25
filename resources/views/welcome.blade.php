<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }} - Sistem Reservasi Online</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700" rel="stylesheet" />
    
    <!-- Styles -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <style>
            /* Tambahkan CSS Tailwind atau custom CSS di sini */
            * { margin: 0; padding: 0; box-sizing: border-box; }
            body { 
                font-family: 'Inter', system-ui, sans-serif;
                background: linear-gradient(135deg, #667eea 0%, #764ba2 50%, #f093fb 100%);
                background-size: 400% 400%;
                animation: gradientShift 8s ease infinite;
                min-height: 100vh;
                display: flex;
                align-items: center;
                justify-content: center;
                overflow-x: hidden;
            }
            @keyframes gradientShift {
                0% { background-position: 0% 50%; }
                50% { background-position: 100% 50%; }
                100% { background-position: 0% 50%; }
            }
            .container {
                max-width: 600px;
                width: 90%;
                background: rgba(255, 255, 255, 0.95);
                backdrop-filter: blur(20px);
                border-radius: 24px;
                box-shadow: 0 32px 64px -12px rgba(0,0,0,0.3);
                overflow: hidden;
                border: 1px solid rgba(255, 255, 255, 0.2);
            }
            .header {
                background: linear-gradient(135deg, #667eea 0%, #764ba2 50%, #f093fb 100%);
                padding: 50px 40px;
                text-align: center;
                color: white;
                position: relative;
                overflow: hidden;
            }
            .header::before {
                content: '';
                position: absolute;
                top: -50%;
                left: -50%;
                width: 200%;
                height: 200%;
                background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
                animation: float 6s ease-in-out infinite;
            }
            @keyframes float {
                0%, 100% { transform: translate(0, 0) rotate(0deg); }
                33% { transform: translate(10px, -10px) rotate(120deg); }
                66% { transform: translate(-10px, 10px) rotate(240deg); }
            }
            .header h1 {
                font-size: 32px;
                font-weight: 700;
                margin-bottom: 10px;
                text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
                position: relative;
                z-index: 2;
            }
            .header p {
                font-size: 18px;
                opacity: 0.95;
                position: relative;
                z-index: 2;
            }
            .content {
                padding: 50px 40px;
                text-align: center;
                position: relative;
            }
            .welcome-text {
                font-size: 28px;
                font-weight: 700;
                background: linear-gradient(135deg, #667eea 0%, #764ba2 50%, #f093fb 100%);
                background-clip: text;
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                margin-bottom: 20px;
                text-align: center;
                line-height: 1.3;
            }
            .description {
                color: #6b7280;
                font-size: 16px;
                line-height: 1.6;
                margin-bottom: 40px;
                max-width: 480px;
                margin-left: auto;
                margin-right: auto;
            }
            .auth-section {
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                margin-bottom: 40px;
            }
            .buttons {
                display: flex;
                gap: 20px;
                flex-direction: row;
                justify-content: center;
                flex-wrap: wrap;
            }
            .btn {
                padding: 16px 32px;
                border-radius: 16px;
                font-weight: 600;
                font-size: 16px;
                text-decoration: none;
                transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
                border: none;
                cursor: pointer;
                display: inline-flex;
                align-items: center;
                justify-content: center;
                min-width: 140px;
                position: relative;
                overflow: hidden;
                transform: translateY(0);
                box-shadow: 0 10px 25px -5px rgba(102, 126, 234, 0.3);
            }
            .btn::before {
                content: '';
                position: absolute;
                top: 0;
                left: -100%;
                width: 100%;
                height: 100%;
                background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
                transition: left 0.6s;
            }
            .btn:hover::before {
                left: 100%;
            }
            .btn-primary {
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                color: white;
                border: 2px solid transparent;
            }
            .btn-primary:hover {
                transform: translateY(-3px);
                box-shadow: 0 20px 40px -10px rgba(102, 126, 234, 0.5);
                background: linear-gradient(135deg, #5a6fd8 0%, #6a4190 100%);
            }
            .btn-secondary {
                background: rgba(255, 255, 255, 0.9);
                color: #667eea;
                border: 2px solid #667eea;
                backdrop-filter: blur(10px);
            }
            .btn-secondary:hover {
                background: #667eea;
                color: white;
                transform: translateY(-3px);
                box-shadow: 0 20px 40px -10px rgba(102, 126, 234, 0.4);
            }
            .features {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(130px, 1fr));
                gap: 24px;
                margin-top: 40px;
                padding-top: 40px;
                border-top: 1px solid rgba(229, 231, 235, 0.5);
            }
            .feature {
                text-align: center;
                padding: 20px;
                border-radius: 16px;
                background: rgba(255, 255, 255, 0.5);
                backdrop-filter: blur(10px);
                border: 1px solid rgba(255, 255, 255, 0.3);
                transition: all 0.3s ease;
                cursor: pointer;
            }
            .feature:hover {
                transform: translateY(-5px);
                box-shadow: 0 15px 35px -5px rgba(0,0,0,0.15);
                background: rgba(255, 255, 255, 0.8);
            }
            .feature-icon {
                width: 56px;
                height: 56px;
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                border-radius: 16px;
                display: flex;
                align-items: center;
                justify-content: center;
                margin: 0 auto 16px;
                color: white;
                font-size: 28px;
                box-shadow: 0 8px 20px -5px rgba(102, 126, 234, 0.4);
                transition: all 0.3s ease;
            }
            .feature:hover .feature-icon {
                transform: scale(1.1) rotate(5deg);
                box-shadow: 0 12px 30px -5px rgba(102, 126, 234, 0.6);
            }
            .feature-title {
                font-weight: 600;
                font-size: 16px;
                color: #1f2937;
                margin-bottom: 6px;
            }
            .feature-desc {
                font-size: 13px;
                color: #6b7280;
                line-height: 1.4;
            }
            @media (min-width: 640px) {
                .buttons {
                    flex-direction: row;
                }
            }
        </style>
    @endif
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <h1>Reservasi Online</h1>
            <p>Platform booking terpercaya</p>
        </div>
        
        <!-- Content -->
        <div class="content">
            <h2 class="welcome-text">Selamat Datang di Reservasi Online</h2>
            <p class="description">
                Nikmati kemudahan booking hotel, restoran, bioskop, dan meeting room 
                dalam satu platform. Reservasi cepat, aman, dan terpercaya.
            </p>
            
            <!-- Auth Buttons -->
            @if (Route::has('login'))
                <div class="auth-section">
                    <div class="buttons">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="btn btn-primary">
                                🏠 Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-primary">
                                🔑 Login
                            </a>
                            
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="btn btn-secondary">
                                    ✨ Register
                                </a>
                            @endif
                        @endauth
                    </div>
                </div>
            @endif
            
            <!-- Features -->
            <div class="features">
                <div class="feature">
                    <div class="feature-icon">🏨</div>
                    <div class="feature-title">Hotel</div>
                    <div class="feature-desc">Booking kamar hotel</div>
                </div>
                <div class="feature">
                    <div class="feature-icon">🍽</div>
                    <div class="feature-title">Restoran</div>
                    <div class="feature-desc">Reservasi meja</div>
                </div>
                <div class="feature">
                    <div class="feature-icon">🎬</div>
                    <div class="feature-title">Bioskop</div>
                    <div class="feature-desc">Tiket film</div>
                </div>
                <div class="feature">
                    <div class="feature-icon">🏢</div>
                    <div class="feature-title">Meeting</div>
                    <div class="feature-desc">Ruang rapat</div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>