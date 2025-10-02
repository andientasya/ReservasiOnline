<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Detail Reservasi
        </h2>
    </x-slot>

    <style>
        .detail-container {
            padding: 48px 0;
            background: linear-gradient(135deg, #f5f7fa 0%, #e9ecef 100%);
            min-height: calc(100vh - 64px);
        }

        .detail-card {
            background: white;
            border-radius: 16px;
            padding: 0;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            overflow: hidden;
            max-width: 900px;
            margin: 0 auto;
        }

        .card-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 32px 40px;
            color: white;
        }

        .card-header-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 16px;
        }

        .reservation-id {
            font-size: 14px;
            opacity: 0.9;
            font-weight: 500;
        }

        .status-badge {
            padding: 6px 16px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: 600;
            display: inline-block;
        }

        .status-confirmed {
            background: #d1fae5;
            color: #065f46;
        }

        .status-pending {
            background: #fef3c7;
            color: #92400e;
        }

        .status-cancelled {
            background: #fee2e2;
            color: #991b1b;
        }

        .card-title {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .card-subtitle {
            font-size: 15px;
            opacity: 0.9;
        }

        .card-body {
            padding: 40px;
        }

        .info-section {
            margin-bottom: 32px;
        }

        .section-title {
            font-size: 18px;
            font-weight: 700;
            color: #1a1a1a;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 8px;
            padding-bottom: 12px;
            border-bottom: 2px solid #f3f4f6;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 24px;
        }

        .info-item {
            background: #f9fafb;
            padding: 16px 20px;
            border-radius: 12px;
            border-left: 4px solid #667eea;
        }

        .info-label {
            font-size: 12px;
            font-weight: 600;
            color: #6b7280;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 6px;
        }

        .info-value {
            font-size: 16px;
            color: #1a1a1a;
            font-weight: 600;
        }

        .notes-section {
            background: linear-gradient(135deg, #fef3c7 0%, #fde68a 100%);
            padding: 20px 24px;
            border-radius: 12px;
            border-left: 4px solid #f59e0b;
        }

        .notes-label {
            font-size: 13px;
            font-weight: 700;
            color: #92400e;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 8px;
        }

        .notes-text {
            font-size: 15px;
            color: #78350f;
            line-height: 1.6;
        }

        .card-footer {
            padding: 32px 40px;
            background: #f9fafb;
            border-top: 2px solid #f3f4f6;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 16px;
            flex-wrap: wrap;
        }

        .action-buttons {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }

        .btn {
            padding: 12px 24px;
            border-radius: 10px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            border: none;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-back {
            background: #f3f4f6;
            color: #374151;
            border: 2px solid #e5e7eb;
        }

        .btn-back:hover {
            background: #e5e7eb;
            transform: translateY(-2px);
        }

        .btn-edit {
            background: #10b981;
            color: white;
        }

        .btn-edit:hover {
            background: #059669;
            transform: translateY(-2px);
        }

        .btn-delete {
            background: #ef4444;
            color: white;
        }

        .btn-delete:hover {
            background: #dc2626;
            transform: translateY(-2px);
        }

        .timeline {
            margin-top: 32px;
            padding-top: 32px;
            border-top: 2px solid #f3f4f6;
        }

        .timeline-item {
            display: flex;
            gap: 16px;
            margin-bottom: 20px;
        }

        .timeline-icon {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            flex-shrink: 0;
        }

        .timeline-content {
            flex: 1;
        }

        .timeline-title {
            font-size: 14px;
            font-weight: 600;
            color: #1a1a1a;
            margin-bottom: 2px;
        }

        .timeline-time {
            font-size: 13px;
            color: #6b7280;
        }

        @media (max-width: 768px) {
            .card-header, .card-body, .card-footer {
                padding: 24px;
            }

            .card-title {
                font-size: 22px;
            }

            .info-grid {
                grid-template-columns: 1fr;
            }

            .card-footer {
                flex-direction: column;
                align-items: stretch;
            }

            .action-buttons {
                flex-direction: column;
            }

            .btn {
                width: 100%;
                justify-content: center;
            }
        }
    </style>

    <div class="detail-container">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="detail-card">
                
                <!-- Card Header -->
                <div class="card-header">
                    <div class="card-header-top">
                        <span class="reservation-id">ID: #{{ $reservation->id }}</span>
                        <span class="status-badge status-{{ $reservation->status }}">
                            @if($reservation->status == 'confirmed')
                                ✓ Confirmed
                            @elseif($reservation->status == 'pending')
                                ⏳ Pending
                            @else
                                ✕ Cancelled
                            @endif
                        </span>
                    </div>
                    <h1 class="card-title">{{ $reservation->name }}</h1>
                    <p class="card-subtitle">{{ $reservation->category->name }} - {{ $reservation->item_name }}</p>
                </div>

                <!-- Card Body -->
                <div class="card-body">
                    
                    <!-- Informasi Pribadi -->
                    <div class="info-section">
                        <h2 class="section-title">👤 Informasi Pribadi</h2>
                        <div class="info-grid">
                            <div class="info-item">
                                <div class="info-label">Nama Lengkap</div>
                                <div class="info-value">{{ $reservation->name }}</div>
                            </div>
                            <div class="info-item">
                                <div class="info-label">Jenis Kelamin</div>
                                <div class="info-value">
                                    {{ $reservation->gender == 'Laki-laki' ? '👨 Laki-laki' : '👩 Perempuan' }}
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Detail Reservasi -->
                    <div class="info-section">
                        <h2 class="section-title">📋 Detail Reservasi</h2>
                        <div class="info-grid">
                            <div class="info-item">
                                <div class="info-label">Kategori</div>
                                <div class="info-value">{{ $reservation->category->name }}</div>
                            </div>
                            <div class="info-item">
                                <div class="info-label">Nama Item</div>
                                <div class="info-value">{{ $reservation->item_name }}</div>
                            </div>
                            <div class="info-item">
                                <div class="info-label">Jumlah</div>
                                <div class="info-value">{{ $reservation->quantity }} Item</div>
                            </div>
                        </div>
                    </div>

                    <!-- Jadwal -->
                    <div class="info-section">
                        <h2 class="section-title">📅 Jadwal</h2>
                        <div class="info-grid">
                            <div class="info-item">
                                <div class="info-label">Tanggal Reservasi</div>
                                <div class="info-value">{{ $reservation->reservation_date->format('d F Y') }}</div>
                            </div>
                            <div class="info-item">
                                <div class="info-label">Waktu Reservasi</div>
                                <div class="info-value">{{ $reservation->reservation_time->format('H:i') }} WIB</div>
                            </div>
                        </div>
                    </div>

                    <!-- Preferensi -->
                    <div class="info-section">
                        <h2 class="section-title">⚙ Preferensi</h2>
                        <div class="info-grid">
                            <div class="info-item">
                                <div class="info-label">Preferensi Kamar</div>
                                <div class="info-value">
                                    @if($reservation->room_preference == 'bebas_asap')
                                        🚭 Bebas Asap
                                    @elseif($reservation->room_preference == 'merokok')
                                        🚬 Boleh Merokok
                                    @else
                                        - Tidak Ada
                                    @endif
                                </div>
                            </div>
                            <div class="info-item">
                                <div class="info-label">Konfigurasi Tempat Tidur</div>
                                <div class="info-value">
                                    @if($reservation->bed_config == 'besar')
                                        🛏 Tempat Tidur Besar
                                    @elseif($reservation->bed_config == 'twin')
                                        🛌 Twin Bed
                                    @else
                                        - Tidak Ada
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Catatan -->
                    @if($reservation->notes)
                        <div class="notes-section">
                            <div class="notes-label">💬 Catatan</div>
                            <div class="notes-text">{{ $reservation->notes }}</div>
                        </div>
                    @endif

                    <!-- Timeline -->
                    <div class="timeline">
                        <h2 class="section-title">⏱ Timeline</h2>
                        <div class="timeline-item">
                            <div class="timeline-icon">📝</div>
                            <div class="timeline-content">
                                <div class="timeline-title">Reservasi Dibuat</div>
                                <div class="timeline-time">{{ $reservation->created_at->format('d F Y, H:i') }} WIB</div>
                            </div>
                        </div>
                        @if($reservation->updated_at != $reservation->created_at)
                            <div class="timeline-item">
                                <div class="timeline-icon">✏</div>
                                <div class="timeline-content">
                                    <div class="timeline-title">Terakhir Diperbarui</div>
                                    <div class="timeline-time">{{ $reservation->updated_at->format('d F Y, H:i') }} WIB</div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Card Footer -->
                <div class="card-footer">
                    <a href="{{ route('reservations.index') }}" class="btn btn-back">
                        ← Kembali
                    </a>

                    <div class="action-buttons">
                        <a href="{{ route('reservations.edit', $reservation->id) }}" class="btn btn-edit">
                            ✏ Edit
                        </a>

                        @if($reservation->status == 'pending')
                            <form action="{{ route('reservations.destroy', $reservation) }}" method="POST" 
                                  onsubmit="return confirm('Yakin ingin membatalkan reservasi ini?');"
                                  style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-delete">
                                    🗑 Batalkan
                                </button>
                            </form>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>