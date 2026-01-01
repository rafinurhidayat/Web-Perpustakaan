<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">Peminjaman Buku</h2>
    </x-slot>

    <div class="p-6">
        <a href="{{ route('peminjaman.create') }}"
           class="bg-blue-600 text-white px-4 py-2 rounded">
            + Pinjam Buku
        </a>
    </div>
</x-app-layout>
