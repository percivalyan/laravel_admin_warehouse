<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 leading-tight">
            {{ __('Show Barang Keluar') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">{{ __('Barang ID') }}</label>
                        <p class="mt-1 text-gray-900">{{ $barangKeluar->barang_id }}</p>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">{{ __('Jumlah') }}</label>
                        <p class="mt-1 text-gray-900">{{ $barangKeluar->jumlah }}</p>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">{{ __('Tanggal') }}</label>
                        <p class="mt-1 text-gray-900">{{ $barangKeluar->tanggal }}</p>
                    </div>

                    <a href="{{ route('barang-keluars.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">
                        {{ __('Back to List') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
