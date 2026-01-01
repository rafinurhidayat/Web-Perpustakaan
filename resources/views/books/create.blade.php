<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">➕ Tambah Buku</h2>
    </x-slot>

    <div class="py-6 max-w-xl mx-auto">
        <form method="POST" action="{{ route('books.store') }}">
            @csrf

            <input name="judul" placeholder="Judul" class="w-full mb-2 p-2 border">
            <input name="penulis" placeholder="Penulis" class="w-full mb-2 p-2 border">
            <input name="penerbit" placeholder="Penerbit" class="w-full mb-2 p-2 border">
            <input name="tahun_terbit" type="number" placeholder="Tahun" class="w-full mb-2 p-2 border">
            <input name="stok" type="number" placeholder="Stok" class="w-full mb-4 p-2 border">

            <button class="bg-blue-600 text-white px-4 py-2 rounded">
                Simpan
            </button>
        </form>
    </div>
</x-app-layout>
