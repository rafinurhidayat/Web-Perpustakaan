@extends('layouts.admin')
@section('title','Tambah Buku')

@section('content')

<div class="max-w-2xl mx-auto">

    {{-- CARD --}}
    <div class="bg-white rounded-xl shadow-lg border">

        {{-- HEADER --}}
        <div class="px-6 py-4 border-b bg-gradient-to-r from-blue-600 to-blue-700 rounded-t-xl">
            <h2 class="text-lg font-semibold text-white">
                📘 Tambah Data Buku
            </h2>
            <p class="text-sm text-blue-100">
                Isi informasi buku dengan lengkap
            </p>
        </div>

        {{-- FORM --}}
        <form method="POST" action="{{ route('books.store') }}" class="p-6 space-y-5">
            @csrf

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">
                    Judul Buku
                </label>
                <input name="judul" placeholder="Masukkan judul buku"
                    class="w-full rounded-lg border-gray-300 shadow-sm
                           focus:border-blue-500 focus:ring-blue-500">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">
                        Penulis
                    </label>
                    <input name="penulis" placeholder="Nama penulis"
                        class="w-full rounded-lg border-gray-300 shadow-sm
                               focus:border-blue-500 focus:ring-blue-500">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">
                        Penerbit
                    </label>
                    <input name="penerbit" placeholder="Nama penerbit"
                        class="w-full rounded-lg border-gray-300 shadow-sm
                               focus:border-blue-500 focus:ring-blue-500">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">
                        Tahun Terbit
                    </label>
                    <input name="tahun_terbit" placeholder="Contoh: 2024"
                        class="w-full rounded-lg border-gray-300 shadow-sm
                               focus:border-blue-500 focus:ring-blue-500">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">
                        Stok
                    </label>
                    <input name="stok" placeholder="Jumlah stok"
                        class="w-full rounded-lg border-gray-300 shadow-sm
                               focus:border-blue-500 focus:ring-blue-500">
                </div>
            </div>

            {{-- ACTION --}}
            <div class="flex justify-between items-center pt-4 border-t">
                <a href="{{ route('books.index') }}"
                    class="text-sm text-gray-600 hover:text-gray-900">
                    ← Kembali
                </a>

                <button
                    class="px-6 py-2 bg-blue-600 text-white rounded-lg
                           hover:bg-blue-700 shadow-md transition">
                    💾 Simpan Buku
                </button>
            </div>

        </form>
    </div>

</div>

@endsection