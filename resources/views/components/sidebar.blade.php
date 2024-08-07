<!-- resources/views/components/sidebar.blade.php -->
<aside class="fixed inset-0 top-0 left-0 z-50 w-64 bg-white text-gray-800 min-h-screen shadow-lg transform -translate-x-full transition-transform duration-300 ease-in-out md:translate-x-0 md:w-64" id="sidebar">
    <div class="py-4 px-3">
        <!-- Logo -->
        <div class="shrink-0 flex items-center">
            <a href="{{ route('dashboard') }}" class="flex items-center">
                <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                <span class="ml-3 text-xl font-semibold text-gray-800">WereDash Laravel</span>
            </a>
        </div>

        <!-- Navigation -->
        <nav class="mt-10">
            <ul>
                <li class="mb-4">
                    <a href="{{ route('dashboard') }}" class="flex items-center text-sm font-medium text-gray-800 hover:text-gray-600 transition-colors duration-200">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M13 5v12m7 7H4a2 2 0 01-2-2V7a2 2 0 012-2h3m13 0a2 2 0 012 2v11a2 2 0 01-2 2z"></path>
                        </svg>
                        <span class="ml-3">Dashboard</span>
                    </a>
                </li>
                <!-- Dropdown Barang -->
                <li class="mb-4 relative">
                    <button class="flex items-center text-sm font-medium text-gray-800 hover:text-gray-600 transition-colors duration-200 w-full text-left" id="barangDropdownButton">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path>
                        </svg>
                        <span class="ml-3">Barang</span>
                        <svg class="ml-auto h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <ul class="absolute left-0 mt-2 w-full bg-white border border-gray-200 shadow-lg rounded-lg hidden" id="barangDropdownMenu">
                        <li>
                            <a href="{{ route('barangs.index') }}" class="block px-4 py-2 text-sm text-gray-800 hover:bg-gray-100">{{ __('Barang') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('barang-masuks.index') }}" class="block px-4 py-2 text-sm text-gray-800 hover:bg-gray-100">{{ __('Masuk') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('barang-keluars.index') }}" class="block px-4 py-2 text-sm text-gray-800 hover:bg-gray-100">{{ __('Keluar') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('barang-pendings.index') }}" class="block px-4 py-2 text-sm text-gray-800 hover:bg-gray-100">{{ __('Pending') }}</a>
                        </li>
                    </ul>
                </li>
                
                <!-- Other navigation items -->
            </ul>
        </nav>
    </div>
</aside>
