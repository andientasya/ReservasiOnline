<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Reservasi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-6">
                        <h3 class="text-lg font-medium mb-4">Informasi Reservasi</h3>
                        
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-500">ID Reservasi</label>
                                <p class="mt-1 text-sm text-gray-900">#{{ $reservation->id }}</p>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-500">Status</label>
                                <span class="mt-1 px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                    @if($reservation->status == 'confirmed') bg-green-100 text-green-800
                                    @elseif($reservation->status == 'pending') bg-yellow-100 text-yellow-800
                                    @else bg-red-100 text-red-800 @endif">
                                    {{ ucfirst($reservation->status) }}
                                </span>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-500">Kategori</label>
                                <p class="mt-1 text-sm text-gray-900">{{ $reservation->category->name }}</p>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-500">Item</label>
                                <p class="mt-1 text-sm text-gray-900">{{ $reservation->item_name }}</p>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-500">Tanggal</label>
                                <p class="mt-1 text-sm text-gray-900">{{ $reservation->reservation_date->format('d/m/Y') }}</p>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-500">Waktu</label>
                                <p class="mt-1 text-sm text-gray-900">{{ $reservation->reservation_time->format('H:i') }}</p>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-500">Jumlah</label>
                                <p class="mt-1 text-sm text-gray-900">{{ $reservation->quantity }}</p>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-500">Dibuat</label>
                                <p class="mt-1 text-sm text-gray-900">{{ $reservation->created_at->format('d/m/Y H:i') }}</p>
                            </div>
                        </div>
                        
                        @if($reservation->notes)
                            <div class="mt-4">
                                <label class="block text-sm font-medium text-gray-500">Catatan</label>
                                <p class="mt-1 text-sm text-gray-900">{{ $reservation->notes }}</p>
                            </div>
                        @endif
                    </div>

                    <div class="flex items-center justify-between">
                        <a href="{{ route('reservations.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                            Kembali
                        </a>
                        
                        @if($reservation->status == 'pending')
                            <form action="{{ route('reservations.destroy', $reservation) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" 
                                        onclick="return confirm('Yakin ingin membatalkan reservasi ini?')">
                                    Batalkan Reservasi
                                </button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>