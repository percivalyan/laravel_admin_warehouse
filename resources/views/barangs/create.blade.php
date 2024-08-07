<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 leading-tight">
            {{ __('Add New Barang') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('barangs.store') }}">
                        @csrf

                        <div class="mb-4">
                            <label for="nama_barang" class="block text-sm font-medium text-gray-700">{{ __('Nama Barang') }}</label>
                            <input type="text" id="nama_barang" name="nama_barang" class="mt-1 block w-full" value="{{ old('nama_barang') }}" required>
                            @error('nama_barang')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="stok" class="block text-sm font-medium text-gray-700">{{ __('Stok') }}</label>
                            <input type="number" id="stok" name="stok" class="mt-1 block w-full" value="{{ old('stok') }}" required>
                            @error('stok')
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
