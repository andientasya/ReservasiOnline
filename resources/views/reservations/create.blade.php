<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Buat Reservasi Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('reservations.store') }}">
                        @csrf

                        <!-- Nama -->
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
                            <input type="text" id="name" name="name" value="{{ old('name') }}"
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                   required>
                            @error('name')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Jenis Kelamin -->
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Jenis Kelamin</label>
                            <div class="flex space-x-6 mt-2">
                                <label class="inline-flex items-center">
                                    <input type="radio" name="gender" value="Laki-laki" 
                                           class="text-indigo-600 focus:ring-indigo-500" 
                                           {{ old('gender') == 'Laki-laki' ? 'checked' : '' }} required>
                                    <span class="ml-2">👨 Laki-laki</span>
                                </label>
                                <label class="inline-flex items-center">
                                    <input type="radio" name="gender" value="Perempuan" 
                                           class="text-indigo-600 focus:ring-indigo-500"
                                           {{ old('gender') == 'Perempuan' ? 'checked' : '' }} required>
                                    <span class="ml-2">👩 Perempuan</span>
                                </label>
                            </div>
                            @error('gender')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Kategori -->
                        <div class="mb-4">
                            <label for="category_id" class="block text-sm font-medium text-gray-700">Kategori</label>
                            <select id="category_id" name="category_id" 
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                    required>
                                <option value="">Pilih Kategori</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Nama Item -->
                        <div class="mb-4">
                            <label for="item_name" class="block text-sm font-medium text-gray-700">Nama Item</label>
                            <input type="text" id="item_name" name="item_name" value="{{ old('item_name') }}" 
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                   placeholder="Contoh: Kursi A1, Kamar 101, Meja 5" required>
                            @error('item_name')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Tanggal Reservasi -->
                        <div class="mb-4">
                            <label for="reservation_date" class="block text-sm font-medium text-gray-700">Tanggal Reservasi</label>
                            <input type="date" id="reservation_date" name="reservation_date" value="{{ old('reservation_date') }}" 
                                   min="{{ date('Y-m-d') }}"
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                   required>
                            @error('reservation_date')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Waktu Reservasi -->
                        <div class="mb-4">
                            <label for="reservation_time" class="block text-sm font-medium text-gray-700">Waktu Reservasi</label>
                            <input type="time" id="reservation_time" name="reservation_time" value="{{ old('reservation_time') }}" 
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                   required>
                            @error('reservation_time')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Jumlah -->
                        <div class="mb-4">
                            <label for="quantity" class="block text-sm font-medium text-gray-700">Jumlah</label>
                            <input type="number" id="quantity" name="quantity" value="{{ old('quantity', 1) }}" min="1"
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                   required>
                            @error('quantity')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Preferensi Kamar -->
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Preferensi Kamar</label>
                            <div class="flex space-x-8 mt-2">
                                <label class="inline-flex items-center">
                                    <input type="radio" name="room_preference" value="bebas_asap" 
                                           class="text-indigo-600 focus:ring-indigo-500"
                                           {{ old('room_preference') == 'bebas_asap' ? 'checked' : '' }} required>
                                    <span class="ml-2">🚭 Bebas Asap</span>
                                </label>
                                <label class="inline-flex items-center">
                                    <input type="radio" name="room_preference" value="merokok" 
                                           class="text-indigo-600 focus:ring-indigo-500"
                                           {{ old('room_preference') == 'merokok' ? 'checked' : '' }} required>
                                    <span class="ml-2">🚬 Boleh Merokok</span>
                                </label>
                            </div>
                            @error('room_preference')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Konfigurasi Tempat Tidur -->
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Konfigurasi Tempat Tidur</label>
                            <div class="flex space-x-8 mt-2">
                                <label class="inline-flex items-center">
                                    <input type="radio" name="bed_config" value="besar" 
                                           class="text-indigo-600 focus:ring-indigo-500"
                                           {{ old('bed_config') == 'besar' ? 'checked' : '' }} required>
                                    <span class="ml-2">🛏️ Besar</span>
                                </label>
                                <label class="inline-flex items-center">
                                    <input type="radio" name="bed_config" value="twin" 
                                           class="text-indigo-600 focus:ring-indigo-500"
                                           {{ old('bed_config') == 'twin' ? 'checked' : '' }} required>
                                    <span class="ml-2">🛌 Twin</span>
                                </label>
                            </div>
                            @error('bed_config')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Catatan -->
                        <div class="mb-6">
                            <label for="notes" class="block text-sm font-medium text-gray-700">Catatan (Opsional)</label>
                            <textarea id="notes" name="notes" rows="3" 
                                      class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                      placeholder="Tambahkan catatan khusus untuk reservasi Anda">{{ old('notes') }}</textarea>
                            @error('notes')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Tombol -->
                        <div class="flex items-center justify-between">
                            <a href="{{ route('reservations.index') }}" 
                               class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                                Kembali
                            </a>
                            <button type="submit" 
                                    class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                                Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
