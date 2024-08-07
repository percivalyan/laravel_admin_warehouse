<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 leading-tight">
            {{ __('Barangs') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="{{ route('barangs.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">
                        {{ __('Add New Barang') }}
                    </a>

                    <table class="min-w-full mt-4">
                        <thead>
                            <tr>
                                <th class="border px-4 py-2">{{ __('ID') }}</th>
                                <th class="border px-4 py-2">{{ __('Nama Barang') }}</th>
                                <th class="border px-4 py-2">{{ __('Stok') }}</th>
                                <th class="border px-4 py-2">{{ __('Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($barangs as $barang)
                                <tr>
                                    <td class="border px-4 py-2">{{ $barang->id }}</td>
                                    <td class="border px-4 py-2">{{ $barang->nama_barang }}</td>
                                    <td class="border px-4 py-2">{{ $barang->stok }}</td>
                                    <td class="border px-4 py-2">
                                        <a href="{{ route('barangs.show', $barang) }}" class="bg-green-500 text-white px-2 py-1 rounded">{{ __('Show') }}</a>
                                        <a href="{{ route('barangs.edit', $barang) }}" class="bg-yellow-500 text-white px-2 py-1 rounded">{{ __('Edit') }}</a>
                                        <form action="{{ route('barangs.destroy', $barang) }}" method="POST" style="display:inline;">
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
