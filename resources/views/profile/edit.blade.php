<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Profile
        </h2>
    </x-slot>

    <style>
        .profile-container {
            padding: 48px 0;
            background: linear-gradient(135deg, #f5f7fa 0%, #e9ecef 100%);
            min-height: calc(100vh - 64px);
        }

        .profile-header {
            background: white;
            border-radius: 16px;
            padding: 32px 40px;
            margin-bottom: 24px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            display: flex;
            align-items: center;
            gap: 24px;
        }

        .profile-avatar {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 36px;
            color: white;
            font-weight: 700;
            box-shadow: 0 8px 20px rgba(102, 126, 234, 0.3);
            flex-shrink: 0;
        }

        .profile-info {
            flex: 1;
        }

        .profile-name {
            font-size: 24px;
            font-weight: 700;
            color: #1a1a1a;
            margin-bottom: 4px;
        }

        .profile-email {
            font-size: 14px;
            color: #6b7280;
        }

        .section-card {
            background: white;
            border-radius: 16px;
            padding: 32px 40px;
            margin-bottom: 24px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        }

        .section-header {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 24px;
            padding-bottom: 16px;
            border-bottom: 2px solid #f3f4f6;
        }

        .section-icon {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
        }

        .section-title {
            font-size: 20px;
            font-weight: 700;
            color: #1a1a1a;
            margin: 0;
        }

        .section-subtitle {
            font-size: 13px;
            color: #6b7280;
            margin-top: 4px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            font-size: 14px;
            font-weight: 600;
            color: #374151;
            margin-bottom: 8px;
        }

        .form-input {
            width: 100%;
            padding: 12px 16px;
            border: 2px solid #e5e7eb;
            border-radius: 10px;
            font-size: 15px;
            transition: all 0.3s ease;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .form-input:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        .form-input:disabled {
            background: #f9fafb;
            color: #9ca3af;
            cursor: not-allowed;
        }

        .error-message {
            color: #dc2626;
            font-size: 13px;
            margin-top: 6px;
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .success-message {
            background: linear-gradient(135deg, #d1fae5 0%, #a7f3d0 100%);
            color: #065f46;
            padding: 12px 16px;
            border-radius: 10px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 8px;
            border-left: 4px solid #10b981;
            font-size: 14px;
            font-weight: 500;
        }

        .form-actions {
            display: flex;
            justify-content: flex-end;
            gap: 12px;
            margin-top: 24px;
            padding-top: 24px;
            border-top: 2px solid #f3f4f6;
        }

        .btn {
            padding: 12px 28px;
            border-radius: 10px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            border: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(102, 126, 234, 0.4);
        }

        .btn-danger {
            background: #ef4444;
            color: white;
        }

        .btn-danger:hover {
            background: #dc2626;
            transform: translateY(-2px);
        }

        .danger-zone {
            border: 2px solid #fee2e2;
            background: #fef2f2;
        }

        .danger-zone .section-header {
            border-bottom-color: #fee2e2;
        }

        .danger-zone .section-icon {
            background: #ef4444;
        }

        .danger-text {
            color: #991b1b;
            font-size: 14px;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        @media (max-width: 768px) {
            .profile-header {
                flex-direction: column;
                text-align: center;
                padding: 24px;
            }

            .section-card {
                padding: 24px;
            }

            .form-actions {
                flex-direction: column;
            }

            .btn {
                width: 100%;
                justify-content: center;
            }
        }
    </style>

    <div class="profile-container">
        <div class="max-w-4xl mx-auto px-6 lg:px-8">
            
            <!-- Profile Header -->
            <div class="profile-header">
                <div class="profile-avatar">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </div>
                <div class="profile-info">
                    <h1 class="profile-name">{{ Auth::user()->name }}</h1>
                    <p class="profile-email">{{ Auth::user()->email }}</p>
                </div>
            </div>

            <!-- Update Profile Information -->
            <div class="section-card">
                <div class="section-header">
                    <div class="section-icon">👤</div>
                    <div>
                        <h2 class="section-title">Informasi Profile</h2>
                        <p class="section-subtitle">Update informasi akun dan alamat email Anda</p>
                    </div>
                </div>

                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <!-- Update Password -->
            <div class="section-card">
                <div class="section-header">
                    <div class="section-icon">🔐</div>
                    <div>
                        <h2 class="section-title">Update Password</h2>
                        <p class="section-subtitle">Pastikan akun Anda menggunakan password yang kuat</p>
                    </div>
                </div>

                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <!-- Delete Account -->
            <div class="section-card danger-zone">
                <div class="section-header">
                    <div class="section-icon">⚠</div>
                    <div>
                        <h2 class="section-title">Hapus Akun</h2>
                        <p class="section-subtitle">Hapus akun Anda secara permanen</p>
                    </div>
                </div>

                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>

        </div>
    </div>
</x-app-layout>