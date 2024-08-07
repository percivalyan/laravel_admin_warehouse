<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 leading-tight">
            {{ __('Add New Barang Keluar') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('barang_keluars.store') }}">
                        @csrf

                        <div class="mb-4">
                            <label for="barang_id" class="block text-sm font-medium text-gray-700">{{ __('Barang') }}</label>
                            <select id="barang_id" name="barang_id" class="mt-1 block w-full" required>
                                <option value="">{{ __('Select Barang') }}</option>
                                @foreach($barangs as $barang)
                                    <option value="{{ $barang->id }}" {{ old('barang_id') == $barang->id ? 'selected' : '' }}>{{ $barang->nama_barang }}</option>
                                @endforeach
                            </select>
                            @error('barang_id')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="jumlah" class="block text-sm font-medium text-gray-700">{{ __('Jumlah') }}</label>
                            <input type="number" id="jumlah" name="jumlah" class="mt-1 block w-full" value="{{ old('jumlah') }}" required>
                            @error('jumlah')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="tanggal" class="block text-sm font-medium text-gray-700">{{ __('Tanggal') }}</label>
                            <input type="date" id="tanggal" name="tanggal" class="mt-1 block w-full" value="{{ old('tanggal') }}" required>
                            @error('tanggal')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
                            {{ __('Save') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
