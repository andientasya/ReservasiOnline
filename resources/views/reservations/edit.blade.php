<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Reservasi
        </h2>
    </x-slot>

    <style>
        .form-container {
            padding: 48px 0;
            background: linear-gradient(135deg, #f5f7fa 0%, #e9ecef 100%);
            min-height: calc(100vh - 64px);
        }

        .form-card {
            background: white;
            border-radius: 16px;
            padding: 40px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            max-width: 800px;
            margin: 0 auto;
        }

        .form-header {
            text-align: center;
            margin-bottom: 40px;
            padding-bottom: 24px;
            border-bottom: 2px solid #f3f4f6;
        }

        .form-header-icon {
            width: 64px;
            height: 64px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 32px;
            margin: 0 auto 16px;
            box-shadow: 0 8px 20px rgba(102, 126, 234, 0.3);
        }

        .form-header-title {
            font-size: 24px;
            font-weight: 700;
            color: #1a1a1a;
            margin-bottom: 8px;
        }

        .form-header-subtitle {
            font-size: 14px;
            color: #6b7280;
        }

        .form-section {
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
        }

        .form-group {
            margin-bottom: 24px;
        }

        .form-label {
            display: block;
            font-size: 14px;
            font-weight: 600;
            color: #374151;
            margin-bottom: 8px;
        }

        .form-input, .form-select, .form-textarea {
            width: 100%;
            padding: 12px 16px;
            border: 2px solid #e5e7eb;
            border-radius: 10px;
            font-size: 15px;
            transition: all 0.3s ease;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .form-input:focus, .form-select:focus, .form-textarea:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        .radio-group {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
            margin-top: 8px;
        }

        .radio-label {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 12px 20px;
            border: 2px solid #e5e7eb;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 15px;
            background: white;
        }

        .radio-label:hover {
            border-color: #667eea;
            background: #f9fafb;
        }

        .radio-label input[type="radio"] {
            width: 18px;
            height: 18px;
            cursor: pointer;
        }

        .radio-label input[type="radio"]:checked ~ .radio-text {
            font-weight: 600;
            color: #667eea;
        }

        .error-message {
            color: #dc2626;
            font-size: 13px;
            margin-top: 6px;
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .form-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 16px;
            padding-top: 32px;
            border-top: 2px solid #f3f4f6;
            margin-top: 32px;
        }

        .btn {
            padding: 14px 32px;
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

        .btn-secondary {
            background: #f3f4f6;
            color: #374151;
            border: 2px solid #e5e7eb;
        }

        .btn-secondary:hover {
            background: #e5e7eb;
            transform: translateY(-2px);
        }

        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            box-shadow: 0 8px 20px rgba(102, 126, 234, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 28px rgba(102, 126, 234, 0.4);
        }

        @media (max-width: 768px) {
            .form-card {
                padding: 24px;
            }

            .form-actions {
                flex-direction: column;
                gap: 12px;
            }

            .btn {
                width: 100%;
                justify-content: center;
            }

            .radio-group {
                flex-direction: column;
            }

            .radio-label {
                width: 100%;
            }
        }
    </style>

    <div class="form-container">
        <div class="max-w-4xl mx-auto px-6 lg:px-8">
            <div class="form-card">
                <!-- Form Header -->
                <div class="form-header">
                    <div class="form-header-icon">✏</div>
                    <h1 class="form-header-title">Edit Reservasi</h1>
                    <p class="form-header-subtitle">Perbarui informasi reservasi Anda</p>
                </div>

                <form action="{{ route('reservations.update', $reservation->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Informasi Pribadi -->
                    <div class="form-section">
                        <h2 class="section-title">👤 Informasi Pribadi</h2>

                        <div class="form-group">
                            <label for="name" class="form-label">Nama Lengkap</label>
                            <input type="text" id="name" name="name" 
                                   value="{{ old('name', $reservation->name) }}"
                                   class="form-input"
                                   placeholder="Masukkan nama lengkap"
                                   required>
                            @error('name')
                                <p class="error-message">⚠ {{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label">Jenis Kelamin</label>
                            <select name="gender" class="form-select" required>
                                <option value="">-- Pilih Jenis Kelamin --</option>
                                <option value="Laki-laki" {{ old('gender', $reservation->gender) == 'Laki-laki' ? 'selected' : '' }}>
                                    👨 Laki-laki
                                </option>
                                <option value="Perempuan" {{ old('gender', $reservation->gender) == 'Perempuan' ? 'selected' : '' }}>
                                    👩 Perempuan
                                </option>
                            </select>
                            @error('gender')
                                <p class="error-message">⚠ {{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Detail Reservasi -->
                    <div class="form-section">
                        <h2 class="section-title">📋 Detail Reservasi</h2>

                        <div class="form-group">
                            <label for="category_id" class="form-label">Kategori</label>
                            <select id="category_id" name="category_id" class="form-select" required>
                                <option value="">-- Pilih Kategori --</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id', $reservation->category_id) == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <p class="error-message">⚠ {{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="item_name" class="form-label">Nama Item</label>
                            <input type="text" id="item_name" name="item_name" 
                                   value="{{ old('item_name', $reservation->item_name) }}" 
                                   class="form-input"
                                   placeholder="Contoh: Kamar 101, Meja 5"
                                   required>
                            @error('item_name')
                                <p class="error-message">⚠ {{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="quantity" class="form-label">Jumlah</label>
                            <input type="number" id="quantity" name="quantity" 
                                   value="{{ old('quantity', $reservation->quantity) }}" 
                                   min="1"
                                   class="form-input"
                                   required>
                            @error('quantity')
                                <p class="error-message">⚠ {{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Jadwal -->
                    <div class="form-section">
                        <h2 class="section-title">📅 Jadwal</h2>

                        <div class="form-group">
                            <label for="reservation_date" class="form-label">Tanggal Reservasi</label>
                            <input type="date" id="reservation_date" name="reservation_date" 
                                   value="{{ old('reservation_date', $reservation->reservation_date) }}"
                                   class="form-input"
                                   required>
                            @error('reservation_date')
                                <p class="error-message">⚠ {{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="reservation_time" class="form-label">Waktu Reservasi</label>
                            <input type="time" id="reservation_time" name="reservation_time" 
                                   value="{{ old('reservation_time', $reservation->reservation_time) }}"
                                   class="form-input"
                                   required>
                            @error('reservation_time')
                                <p class="error-message">⚠ {{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Preferensi -->
                    <div class="form-section">
                        <h2 class="section-title">⚙ Preferensi (Opsional)</h2>

                        <div class="form-group">
                            <label class="form-label">Preferensi Kamar</label>
                            <div class="radio-group">
                                <label class="radio-label">
                                    <input type="radio" name="room_preference" value="bebas_asap" 
                                           {{ old('room_preference', $reservation->room_preference) == 'bebas_asap' ? 'checked' : '' }}>
                                    <span class="radio-text">🚭 Bebas Asap</span>
                                </label>
                                <label class="radio-label">
                                    <input type="radio" name="room_preference" value="merokok" 
                                           {{ old('room_preference', $reservation->room_preference) == 'merokok' ? 'checked' : '' }}>
                                    <span class="radio-text">🚬 Boleh Merokok</span>
                                </label>
                            </div>
                            @error('room_preference')
                                <p class="error-message">⚠ {{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label">Konfigurasi Tempat Tidur</label>
                            <div class="radio-group">
                                <label class="radio-label">
                                    <input type="radio" name="bed_config" value="besar" 
                                           {{ old('bed_config', $reservation->bed_config) == 'besar' ? 'checked' : '' }}>
                                    <span class="radio-text">🛏 Tempat Tidur Besar</span>
                                </label>
                                <label class="radio-label">
                                    <input type="radio" name="bed_config" value="twin" 
                                           {{ old('bed_config', $reservation->bed_config) == 'twin' ? 'checked' : '' }}>
                                    <span class="radio-text">🛌 Twin Bed</span>
                                </label>
                            </div>
                            @error('bed_config')
                                <p class="error-message">⚠ {{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="notes" class="form-label">Catatan Tambahan</label>
                            <textarea id="notes" name="notes" rows="4" 
                                      class="form-textarea"
                                      placeholder="Tambahkan catatan atau permintaan khusus...">{{ old('notes', $reservation->notes) }}</textarea>
                            @error('notes')
                                <p class="error-message">⚠ {{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Form Actions -->
                    <div class="form-actions">
                        <a href="{{ route('reservations.index') }}" class="btn btn-secondary">
                            ← Batal
                        </a>
                        <button type="submit" class="btn btn-primary">
                            ✓ Update Reservasi
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>