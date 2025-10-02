<x-guest-layout>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 40px 20px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            position: relative;
            overflow-x: hidden;
            overflow-y: auto;
        }

        /* Animated background shapes */
        body::before {
            content: '';
            position: absolute;
            width: 500px;
            height: 500px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            top: -250px;
            right: -250px;
            animation: float 6s ease-in-out infinite;
        }

        body::after {
            content: '';
            position: absolute;
            width: 400px;
            height: 400px;
            background: rgba(255, 255, 255, 0.08);
            border-radius: 50%;
            bottom: -200px;
            left: -200px;
            animation: float 8s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0px);
            }
            50% {
                transform: translateY(-20px);
            }
        }

        .auth-container {
            background: rgba(255, 255, 255, 0.95);
            padding: 50px 45px;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            backdrop-filter: blur(10px);
            max-width: 450px;
            width: 90%;
            position: relative;
            z-index: 10;
            animation: slideUp 0.8s ease-out;
            margin: 20px auto;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .logo {
            width: 70px;
            height: 70px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 18px;
            margin: 0 auto 25px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 35px;
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.4);
        }

        .auth-header {
            text-align: center;
            margin-bottom: 35px;
        }

        .auth-title {
            font-size: 28px;
            font-weight: 700;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 10px;
        }

        .auth-subtitle {
            font-size: 14px;
            color: #666;
        }

        .success-message {
            background: rgba(16, 185, 129, 0.1);
            color: #059669;
            padding: 12px 16px;
            border-radius: 12px;
            font-size: 14px;
            margin-bottom: 24px;
            border: 1px solid rgba(16, 185, 129, 0.3);
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            font-size: 14px;
            font-weight: 600;
            color: #333;
            margin-bottom: 8px;
        }

        .form-input {
            width: 100%;
            padding: 14px 16px;
            border: 2px solid #e0e0e0;
            border-radius: 12px;
            font-size: 15px;
            transition: all 0.3s ease;
            background: #fff;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .form-input:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        .error-message {
            color: #dc2626;
            font-size: 13px;
            margin-top: 6px;
        }

        .form-checkbox-wrapper {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .form-checkbox {
            width: 18px;
            height: 18px;
            cursor: pointer;
        }

        .form-checkbox-label {
            font-size: 14px;
            color: #666;
            cursor: pointer;
        }

        .form-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 28px;
            flex-wrap: wrap;
            gap: 15px;
        }

        .forgot-link {
            color: #667eea;
            font-size: 14px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .forgot-link:hover {
            color: #764ba2;
        }

        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: #fff;
            padding: 14px 30px;
            border: none;
            border-radius: 12px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 8px 20px rgba(102, 126, 234, 0.4);
            position: relative;
            overflow: hidden;
        }

        .btn-primary::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.2);
            transition: left 0.5s ease;
        }

        .btn-primary:hover::before {
            left: 100%;
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 30px rgba(102, 126, 234, 0.5);
        }

        .divider {
            display: flex;
            align-items: center;
            margin: 30px 0;
            color: #999;
            font-size: 13px;
        }

        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background: #e0e0e0;
        }

        .divider::before {
            margin-right: 16px;
        }

        .divider::after {
            margin-left: 16px;
        }

        .register-link {
            text-align: center;
            font-size: 14px;
            color: #666;
        }

        .register-link a {
            color: #667eea;
            font-weight: 600;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .register-link a:hover {
            color: #764ba2;
        }

        @media (max-width: 480px) {
            .auth-container {
                padding: 40px 30px;
            }

            .auth-title {
                font-size: 24px;
            }

            .form-footer {
                flex-direction: column;
                align-items: stretch;
            }

            .btn-primary {
                width: 100%;
            }
        }
    </style>

    <div class="auth-container">
        <div class="logo">🔐</div>
        
        <div class="auth-header">
            <h2 class="auth-title">Masuk ke Akun</h2>
            <p class="auth-subtitle">Selamat datang kembali! Silakan login untuk melanjutkan.</p>
        </div>

        <!-- Session Status -->
        @if (session('status'))
            <div class="success-message">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div class="form-group">
                <label for="email" class="form-label">📧 Email</label>
                <input id="email" 
                       class="form-input" 
                       type="email" 
                       name="email" 
                       value="{{ old('email') }}" 
                       required 
                       autofocus 
                       autocomplete="username"
                       placeholder="nama@email.com">
                @error('email')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password -->
            <div class="form-group">
                <label for="password" class="form-label">🔑 Password</label>
                <input id="password" 
                       class="form-input"
                       type="password"
                       name="password"
                       required 
                       autocomplete="current-password"
                       placeholder="Masukkan password">
                @error('password')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>

            <!-- Remember Me -->
            <div class="form-group">
                <div class="form-checkbox-wrapper">
                    <input id="remember_me" 
                           type="checkbox" 
                           class="form-checkbox" 
                           name="remember">
                    <label for="remember_me" class="form-checkbox-label">Ingat saya</label>
                </div>
            </div>

            <!-- Submit Button & Forgot Password -->
            <div class="form-footer">
                @if (Route::has('password.request'))
                    <a class="forgot-link" href="{{ route('password.request') }}">
                        Lupa password?
                    </a>
                @endif
                <button type="submit" class="btn-primary">
                    ✨ Masuk
                </button>
            </div>
        </form>

        <div class="divider">atau</div>

        <div class="register-link">
            Belum punya akun? <a href="{{ route('register') }}">🚀 Daftar Sekarang</a>
        </div>
    </div>
</x-guest-layout>