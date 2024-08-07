<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 leading-tight">
            {{ __('Barang Masuk') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="{{ route('barang-masuks.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">
                        {{ __('Add New Barang Masuk') }}
                    </a>

                    <table class="min-w-full mt-4">
                        <thead>
                            <tr>
                                <th class="border px-4 py-2">{{ __('ID') }}</th>
                                <th class="border px-4 py-2">{{ __('Barang ID') }}</th>
                                <th class="border px-4 py-2">{{ __('Jumlah') }}</th>
                                <th class="border px-4 py-2">{{ __('Tanggal') }}</th>
                                <th class="border px-4 py-2">{{ __('Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($barangMasuks as $barangMasuk)
                                <tr>
                                    <td class="border px-4 py-2">{{ $barangMasuk->id }}</td>
                                    <td class="border px-4 py-2">{{ $barangMasuk->barang_id }}</td>
                                    <td class="border px-4 py-2">{{ $barangMasuk->jumlah }}</td>
                                    <td class="border px-4 py-2">{{ $barangMasuk->tanggal }}</td>
                                    <td class="border px-4 py-2">
                                        <a href="{{ route('barang-masuks.show', $barangMasuk) }}" class="bg-green-500 text-white px-2 py-1 rounded">{{ __('Show') }}</a>
                                        <a href="{{ route('barang-masuks.edit', $barangMasuk) }}" class="bg-yellow-500 text-white px-2 py-1 rounded">{{ __('Edit') }}</a>
                                        <form action="{{ route('barang-masuks.destroy', $barangMasuk) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded">{{ __('Delete') }}</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
