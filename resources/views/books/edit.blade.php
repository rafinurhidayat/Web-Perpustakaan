@extends('layouts.admin')
@section('title','Edit Buku')

@section('content')

<div class="max-w-2xl mx-auto">

    <div class="bg-white rounded-xl shadow-lg border">

        {{-- HEADER --}}
        <div class="px-6 py-4 border-b bg-gradient-to-r from-yellow-500 to-yellow-600 rounded-t-xl">
            <h2 class="text-lg font-semibold text-white">
                ✏️ Edit Data Buku
            </h2>
            <p class="text-sm text-yellow-100">
                Perbarui informasi buku
            </p>
        </div>

        {{-- FORM --}}
        <form method="POST" action="{{ route('books.update', $book) }}" class="p-6 space-y-5">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">
                    Judul Buku
                </label>
                <input name="judul"
                    value="{{ old('judul', $book->judul) }}"
                    class="w-full rounded-lg border-gray-300 shadow-sm focus:ring-yellow-500 focus:border-yellow-500">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">
                        Penulis
                    </label>
                    <input name="penulis"
                        value="{{ old('penulis', $book->penulis) }}"
                        class="w-full rounded-lg border-gray-300 shadow-sm focus:ring-yellow-500 focus:border-yellow-500">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">
                        Penerbit
                    </label>
                    <input name="penerbit"
                        value="{{ old('penerbit', $book->penerbit) }}"
                        class="w-full rounded-lg border-gray-300 shadow-sm focus:ring-yellow-500 focus:border-yellow-500">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">
                        Tahun Terbit
                    </label>
                    <input name="tahun_terbit"
                        value="{{ old('tahun_terbit', $book->tahun_terbit) }}"
                        class="w-full rounded-lg border-gray-300 shadow-sm focus:ring-yellow-500 focus:border-yellow-500">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">
                        Stok
                    </label>
                    <input name="stok"
                        value="{{ old('stok', $book->stok) }}"
                        class="w-full rounded-lg border-gray-300 shadow-sm focus:ring-yellow-500 focus:border-yellow-500">
                </div>
            </div>

            {{-- ACTION --}}
            <div class="flex justify-between items-center pt-4 border-t">
                <a href="{{ route('books.index') }}"
                    class="text-sm text-gray-600 hover:text-gray-900">
                    ← Kembali
                </a>

                <button class="px-6 py-2 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600 shadow-md">
                    💾 Update Buku
                </button>
            </div>

        </form>
    </div>

</div>

@endsection