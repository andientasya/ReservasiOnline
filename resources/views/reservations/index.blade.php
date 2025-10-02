<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Reservasi Saya
        </h2>
    </x-slot>

    <style>
        .reservations-container {
            padding: 48px 0;
            background: linear-gradient(135deg, #f5f7fa 0%, #e9ecef 100%);
            min-height: calc(100vh - 64px);
        }

        .content-card {
            background: white;
            border-radius: 16px;
            padding: 32px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 32px;
            flex-wrap: wrap;
            gap: 16px;
        }

        .page-title {
            font-size: 24px;
            font-weight: 700;
            color: #1a1a1a;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .success-alert {
            background: linear-gradient(135deg, #d1fae5 0%, #a7f3d0 100%);
            color: #065f46;
            padding: 16px 20px;
            border-radius: 12px;
            margin-bottom: 24px;
            display: flex;
            align-items: center;
            gap: 12px;
            border-left: 4px solid #10b981;
            font-weight: 500;
            animation: slideIn 0.3s ease-out;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .btn-create {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 12px 24px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: 600;
            font-size: 15px;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
        }

        .btn-create:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(102, 126, 234, 0.4);
        }

        .table-container {
            overflow-x: auto;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .data-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            background: white;
        }

        .data-table thead {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .data-table thead th {
            padding: 16px 12px;
            text-align: left;
            font-size: 13px;
            font-weight: 600;
            color: white;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            white-space: nowrap;
        }

        .data-table thead th:first-child {
            border-top-left-radius: 12px;
        }

        .data-table thead th:last-child {
            border-top-right-radius: 12px;
        }

        .data-table tbody tr {
            border-bottom: 1px solid #f3f4f6;
            transition: all 0.2s ease;
        }

        .data-table tbody tr:hover {
            background: #f9fafb;
        }

        .data-table tbody td {
            padding: 16px 12px;
            font-size: 14px;
            color: #374151;
        }

        .table-number {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            width: 32px;
            height: 32px;
            border-radius: 8px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            font-size: 13px;
        }

        .action-buttons {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
        }

        .btn-action {
            padding: 8px 16px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            white-space: nowrap;
        }

        .btn-detail {
            background: #6b7280;
            color: white;
        }

        .btn-detail:hover {
            background: #4b5563;
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

        .empty-state {
            text-align: center;
            padding: 80px 20px;
        }

        .empty-state-icon {
            font-size: 64px;
            margin-bottom: 20px;
            opacity: 0.5;
        }

        .empty-state-title {
            font-size: 20px;
            font-weight: 600;
            color: #1a1a1a;
            margin-bottom: 8px;
        }

        .empty-state-text {
            font-size: 14px;
            color: #6b7280;
            margin-bottom: 24px;
        }

        @media (max-width: 768px) {
            .content-card {
                padding: 20px;
            }

            .page-header {
                flex-direction: column;
                align-items: stretch;
            }

            .btn-create {
                justify-content: center;
            }

            .data-table {
                font-size: 12px;
            }

            .data-table thead th,
            .data-table tbody td {
                padding: 12px 8px;
            }

            .action-buttons {
                flex-direction: column;
            }

            .btn-action {
                width: 100%;
                justify-content: center;
            }
        }
    </style>

    <div class="reservations-container">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="content-card">
                
                <!-- Success Alert -->
                @if(session('success'))
                    <div class="success-alert">
                        <span style="font-size: 20px;">✓</span>
                        <span>{{ session('success') }}</span>
                    </div>
                @endif

                <!-- Page Header -->
                <div class="page-header">
                    <div class="page-title">
                        <span style="font-size: 28px;">📋</span>
                        <span>Daftar Reservasi</span>
                    </div>
                    <a href="{{ route('reservations.create') }}" class="btn-create">
                        <span style="font-size: 18px;">+</span>
                        <span>Buat Reservasi</span>
                    </a>
                </div>

                <!-- Table or Empty State -->
                @if($reservations->count() > 0)
                    <div class="table-container">
                        <table class="data-table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Gender</th>
                                    <th>Kategori</th>
                                    <th>Item</th>
                                    <th>Tanggal</th>
                                    <th>Waktu</th>
                                    <th>Jumlah</th>
                                    <th>Kamar</th>
                                    <th>Tempat Tidur</th>
                                    <th>Catatan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($reservations as $reservation)
                                    <tr>
                                        <td style="text-align: center;">
                                            <span class="table-number">{{ $loop->iteration }}</span>
                                        </td>
                                        <td><strong>{{ $reservation->name }}</strong></td>
                                        <td>{{ $reservation->gender }}</td>
                                        <td>{{ $reservation->category->name ?? '-' }}</td>
                                        <td>{{ $reservation->item_name ?? '-' }}</td>
                                        <td>{{ \Carbon\Carbon::parse($reservation->reservation_date)->format('Y-m-d') }}</td>
                                        <td>{{ $reservation->reservation_time ? \Carbon\Carbon::parse($reservation->reservation_time)->format('H:i') : '-' }}</td>
                                        <td style="text-align: center;"><strong>{{ $reservation->quantity }}</strong></td>
                                        <td>
                                            @if($reservation->room_preference == 'bebas_asap')
                                                🚭 Bebas Asap
                                            @elseif($reservation->room_preference == 'merokok')
                                                🚬 Merokok
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td>
                                            @if($reservation->bed_config == 'besar')
                                                🛏 Besar
                                            @elseif($reservation->bed_config == 'twin')
                                                🛌 Twin
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td>{{ Str::limit($reservation->notes ?? '-', 30) }}</td>
                                        <td>
                                            <div class="action-buttons">
                                                <a href="{{ route('reservations.show', $reservation->id) }}" 
                                                   class="btn-action btn-detail">
                                                    👁 Detail
                                                </a>
                                                <a href="{{ route('reservations.edit', $reservation->id) }}" 
                                                   class="btn-action btn-edit">
                                                    ✏ Edit
                                                </a>
                                                <form action="{{ route('reservations.destroy', $reservation->id) }}" 
                                                      method="POST"
                                                      onsubmit="return confirm('Apakah Anda yakin ingin menghapus reservasi ini?');"
                                                      style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn-action btn-delete">
                                                        🗑 Hapus
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="empty-state">
                        <div class="empty-state-icon">📭</div>
                        <h3 class="empty-state-title">Belum Ada Reservasi</h3>
                        <p class="empty-state-text">Mulai buat reservasi pertama Anda dengan klik tombol di atas</p>
                        <a href="{{ route('reservations.create') }}" class="btn-create">
                            <span style="font-size: 18px;">+</span>
                            <span>Buat Reservasi Sekarang</span>
                        </a>
                    </div>
                @endif

            </div>
        </div>
    </div>
</x-app-layout>