<x-app-layout>
    <x-slot name="header">
<<<<<<< HEAD
        <h2 class="font-semibold text-xl">
=======
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
>>>>>>> 715afd8e830119d6f1af8fb1f1ba4ecc1eaa919d
            Dashboard
        </h2>
    </x-slot>

<<<<<<< HEAD
    <div class="py-6">
        <div class="max-w-7xl mx-auto">
            <div class="bg-white p-6 rounded shadow">
                Selamat datang di sistem perpustakaan
=======
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
>>>>>>> 715afd8e830119d6f1af8fb1f1ba4ecc1eaa919d
            </div>
        </div>
    </div>
</x-app-layout>
