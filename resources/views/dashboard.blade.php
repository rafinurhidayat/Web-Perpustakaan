<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <h3 class="text-lg font-bold mb-6">
                        Menu Utama
                    </h3>

                    <div class="flex gap-4">
                        <a href="{{ route('anggota.index') }}"
                           class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-3 rounded-lg shadow">
                            📋 Data Anggota
                        </a>

                        <a href="{{ route('peminjaman.index') }}"
                           class="bg-green-600 hover:bg-green-700 text-white px-5 py-3 rounded-lg shadow">
                            📚 Peminjaman Buku
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
