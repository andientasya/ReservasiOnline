<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Reservasi Saya') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <!-- Notifikasi -->
                    @if(session('success'))
                        <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- Tombol buat reservasi baru -->
                    <div class="mb-4 flex justify-end">
                        <a href="{{ route('reservations.create') }}"
                           class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded">
                            + Buat Reservasi
                        </a>
                    </div>

                    <!-- Tabel Reservasi -->
                    @if($reservations->count() > 0)
                        <div class="overflow-x-auto">
                            <table class="min-w-full bg-white border border-gray-200">
                                <thead class="bg-gray-100">
                                    <tr>
                                        <th class="px-4 py-2 border">No</th>
                                        <th class="px-4 py-2 border">Nama</th>
                                        <th class="px-4 py-2 border">Gender</th>
                                        <th class="px-4 py-2 border">Kategori</th>
                                        <th class="px-4 py-2 border">Item</th>
                                        <th class="px-4 py-2 border">Tanggal</th>
                                        <th class="px-4 py-2 border">Waktu</th>
                                        <th class="px-4 py-2 border">Jumlah</th>
                                        <th class="px-4 py-2 border">Kamar</th>
                                        <th class="px-4 py-2 border">Tempat Tidur</th>
                                        <th class="px-4 py-2 border">Catatan</th>
                                        <th class="px-4 py-2 border">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($reservations as $reservation)
                                        <tr>
                                            <td class="px-4 py-2 border text-center">{{ $loop->iteration }}</td>
                                            <td class="px-4 py-2 border">{{ $reservation->name }}</td>
                                            <td class="px-4 py-2 border">{{ $reservation->gender }}</td>
                                            <td class="px-4 py-2 border">{{ $reservation->category->name ?? '-' }}</td>
                                            <td class="px-4 py-2 border">{{ $reservation->item_name }}</td>
                                            <td class="px-4 py-2 border">{{ $reservation->reservation_date }}</td>
                                            <td class="px-4 py-2 border">{{ $reservation->reservation_time }}</td>
                                            <td class="px-4 py-2 border text-center">{{ $reservation->quantity }}</td>
                                            <td class="px-4 py-2 border">
                                                {{ $reservation->room_preference == 'bebas_asap' ? '🚭 Bebas Asap' : '🚬 Merokok' }}
                                            </td>
                                            <td class="px-4 py-2 border">
                                                {{ $reservation->bed_config == 'besar' ? '🛏️ Besar' : '🛌 Twin' }}
                                            </td>
                                            <td class="px-4 py-2 border">{{ $reservation->notes ?? '-' }}</td>
                                            <td class="px-4 py-2 border text-center">
                                                <form action="{{ route('reservations.destroy', $reservation->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin membatalkan reservasi ini?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded">
                                                        Batalkan
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p class="text-gray-600">Belum ada reservasi.</p>
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
