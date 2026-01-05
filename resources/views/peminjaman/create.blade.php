@extends('layouts.admin')

@section('header','Tambah Peminjaman')

@section('content')
<div class="max-w-xl mx-auto bg-white p-6 rounded-lg shadow">
    <form action="{{ route('peminjaman.store') }}" method="POST" class="space-y-4">
        @csrf

        {{-- Peminjam --}}
        <div>
            <label class="block text-sm font-semibold mb-1">Peminjam</label>
            <select name="user_id" class="w-full rounded border-gray-300" required>
                <option value="">-- Pilih Peminjam --</option>
                @foreach($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>

        {{-- Buku --}}
        <div>
            <label class="block text-sm font-semibold mb-1">Buku</label>
            <select name="book_id" class="w-full rounded border-gray-300" required>
                <option value="">-- Pilih Buku --</option>
                @foreach($books as $book)
                <option value="{{ $book->id }}">
                    {{ $book->judul }} (Stok: {{ $book->stok }})
                </option>
                @endforeach
            </select>
        </div>

        {{-- Tanggal Pinjam --}}
        <div>
            <label class="block text-sm font-semibold mb-1">Tanggal Pinjam</label>
            <input type="date" name="loan_date"
                value="{{ old('loan_date', date('Y-m-d')) }}"
                class="w-full rounded border-gray-300" required>
        </div>

        <div class="flex justify-end gap-2">
            <a href="{{ route('peminjaman.index') }}" class="px-4 py-2 text-gray-600">
                Batal
            </a>
            <button class="px-4 py-2 bg-blue-600 text-white rounded">
                Simpan
            </button>
        </div>
    </form>
</div>
@endsection