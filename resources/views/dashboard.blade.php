<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <style>
        .dashboard-container {
            padding: 48px 0;
            background: linear-gradient(135deg, #f5f7fa 0%, #e9ecef 100%);
            min-height: calc(100vh - 64px);
        }

        .welcome-card {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 16px;
            padding: 40px;
            margin-bottom: 32px;
            box-shadow: 0 10px 30px rgba(102, 126, 234, 0.3);
            color: white;
        }

        .welcome-title {
            font-size: 32px;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .welcome-subtitle {
            font-size: 16px;
            opacity: 0.95;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 24px;
            margin-bottom: 32px;
        }

        .stat-card {
            background: white;
            border-radius: 16px;
            padding: 28px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
        }

        .stat-icon {
            width: 56px;
            height: 56px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            margin-bottom: 16px;
        }

        .stat-icon.purple {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .stat-icon.blue {
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
        }

        .stat-icon.green {
            background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);
        }

        .stat-icon.orange {
            background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);
        }

        .stat-label {
            font-size: 14px;
            color: #6b7280;
            font-weight: 500;
            margin-bottom: 8px;
        }

        .stat-value {
            font-size: 32px;
            font-weight: 700;
            color: #1a1a1a;
        }

        .quick-actions {
            background: white;
            border-radius: 16px;
            padding: 32px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            margin-bottom: 32px;
        }

        .section-title {
            font-size: 20px;
            font-weight: 700;
            color: #1a1a1a;
            margin-bottom: 24px;
        }

        .action-buttons {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 16px;
        }

        .action-btn {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 16px 20px;
            border-radius: 12px;
            text-decoration: none;
            font-weight: 600;
            font-size: 15px;
            transition: all 0.3s ease;
            border: 2px solid #e5e7eb;
            background: white;
            color: #374151;
        }

        .action-btn:hover {
            border-color: #667eea;
            background: #f9fafb;
            transform: translateX(5px);
        }

        .action-btn-icon {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .recent-activity {
            background: white;
            border-radius: 16px;
            padding: 32px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        }

        .activity-list {
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        .activity-item {
            display: flex;
            align-items: center;
            gap: 16px;
            padding: 16px;
            border-radius: 12px;
            background: #f9fafb;
            transition: all 0.3s ease;
        }

        .activity-item:hover {
            background: #f3f4f6;
        }

        .activity-icon {
            width: 48px;
            height: 48px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            flex-shrink: 0;
        }

        .activity-content {
            flex: 1;
        }

        .activity-title {
            font-size: 15px;
            font-weight: 600;
            color: #1a1a1a;
            margin-bottom: 4px;
        }

        .activity-time {
            font-size: 13px;
            color: #9ca3af;
        }

        .status-badge {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            margin-left: 8px;
        }

        .status-pending {
            background: #fef3c7;
            color: #92400e;
        }

        .status-confirmed {
            background: #d1fae5;
            color: #065f46;
        }

        .status-completed {
            background: #dbeafe;
            color: #1e40af;
        }

        .empty-state {
            text-align: center;
            padding: 40px 20px;
            color: #9ca3af;
        }

        @media (max-width: 768px) {
            .welcome-card {
                padding: 24px;
            }

            .welcome-title {
                font-size: 24px;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }

            .action-buttons {
                grid-template-columns: 1fr;
            }
        }
    </style>

    <div class="dashboard-container">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            
            <!-- Welcome Card -->
            <div class="welcome-card">
                <h1 class="welcome-title">Selamat Datang, {{ Auth::user()->name }}!</h1>
                <p class="welcome-subtitle">Kelola reservasi Anda dengan mudah dan efisien.</p>
            </div>

            <!-- Stats Grid -->
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-icon purple">📅</div>
                    <div class="stat-label">Total Reservasi</div>
                    <div class="stat-value">{{ $totalReservations }}</div>
                </div>

                <div class="stat-card">
                    <div class="stat-icon blue">⏳</div>
                    <div class="stat-label">Menunggu</div>
                    <div class="stat-value">{{ $pendingReservations }}</div>
                </div>

                <div class="stat-card">
                    <div class="stat-icon green">✓</div>
                    <div class="stat-label">Selesai</div>
                    <div class="stat-value">{{ $completedReservations }}</div>
                </div>

                <div class="stat-card">
                    <div class="stat-icon orange">⭐</div>
                    <div class="stat-label">Rating Rata-rata</div>
                    <div class="stat-value">{{ $averageRating }}</div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="quick-actions">
                <h2 class="section-title">Aksi Cepat</h2>
                <div class="action-buttons">
                    <a href="{{ route('reservations.create') }}" class="action-btn">
                        <div class="action-btn-icon">➕</div>
                        <span>Buat Reservasi</span>
                    </a>

                    <a href="{{ route('reservations.index') }}" class="action-btn">
                        <div class="action-btn-icon">📋</div>
                        <span>Lihat Semua Reservasi</span>
                    </a>

                    <a href="#" class="action-btn">
                        <div class="action-btn-icon">📊</div>
                        <span>Laporan</span>
                    </a>

                    <a href="#" class="action-btn">
                        <div class="action-btn-icon">⚙</div>
                        <span>Pengaturan</span>
                    </a>
                </div>
            </div>

            <!-- Recent Activity -->
            <div class="recent-activity">
                <h2 class="section-title">Aktivitas Terakhir</h2>
                <div class="activity-list">
                    @forelse($recentActivities as $activity)
                        <div class="activity-item">
                            <div class="activity-icon">
                                @if($activity->status == 'pending')
                                    ⏳
                                @elseif($activity->status == 'confirmed')
                                    ✓
                                @elseif($activity->status == 'completed')
                                    🎉
                                @else
                                    📝
                                @endif
                            </div>
                            <div class="activity-content">
                                <div class="activity-title">
                                    Reservasi {{ $activity->item_name }}
                                    <span class="status-badge status-{{ $activity->status }}">
                                        {{ ucfirst($activity->status) }}
                                    </span>
                                </div>
                                <div class="activity-time">
                                    {{ $activity->reservation_date }} • {{ $activity->created_at->diffForHumans() }}
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="empty-state">
                            <div style="font-size: 48px; margin-bottom: 16px;">📭</div>
                            <p style="font-weight: 600; margin-bottom: 8px;">Belum ada aktivitas</p>
                            <p style="font-size: 14px;">Mulai dengan membuat reservasi pertama Anda!</p>
                        </div>
                    @endforelse
                </div>
            </div>

        </div>
    </div>
</x-app-layout>