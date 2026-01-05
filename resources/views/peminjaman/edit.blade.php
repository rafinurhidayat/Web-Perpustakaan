@extends('layouts.admin')

@section('header','Edit Peminjaman')

@section('content')
<div class="max-w-xl mx-auto bg-white p-6 rounded-lg shadow">
    <form action="{{ route('peminjaman.update',$loan) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        {{-- Peminjam --}}
        <div>
            <label class="block text-sm font-semibold mb-1">Peminjam</label>
            <select name="user_id" class="w-full rounded border-gray-300" required>
                @foreach($users as $user)
                <option value="{{ $user->id }}" {{ $loan->user_id == $user->id ? 'selected' : '' }}>
                    {{ $user->name }}
                </option>
                @endforeach
            </select>
        </div>

        {{-- Buku --}}
        <div>
            <label class="block text-sm font-semibold mb-1">Buku</label>
            <select name="book_id" class="w-full rounded border-gray-300" required>
                @foreach($books as $book)
                <option value="{{ $book->id }}" {{ $loan->book_id == $book->id ? 'selected' : '' }}>
                    {{ $book->judul }} (Stok: {{ $book->stok }})
                </option>
                @endforeach
            </select>
        </div>

        {{-- Tanggal Pinjam --}}
        <div>
            <label class="block text-sm font-semibold mb-1">Tanggal Pinjam</label>
            <input type="date" name="loan_date"
                value="{{ old('loan_date', $loan->loan_date) }}"
                class="w-full rounded border-gray-300" required>
        </div>

        {{-- Tanggal Kembali --}}
        <div>
            <label class="block text-sm font-semibold mb-1">Tanggal Kembali</label>
            <input type="date" name="return_date"
                value="{{ old('return_date', $loan->return_date) }}"
                class="w-full rounded border-gray-300">
        </div>

        {{-- Status --}}
        <div>
            <label class="block text-sm font-semibold mb-1">Status</label>
            <select name="status" class="w-full rounded border-gray-300" required>
                <option value="dipinjam" {{ $loan->status == 'dipinjam' ? 'selected' : '' }}>
                    Dipinjam
                </option>
                <option value="dikembalikan" {{ $loan->status == 'dikembalikan' ? 'selected' : '' }}>
                    Dikembalikan
                </option>
            </select>
        </div>

        <div class="flex justify-end gap-2">
            <a href="{{ route('peminjaman.index') }}" class="px-4 py-2 text-gray-600">
                Batal
            </a>
            <button class="px-4 py-2 bg-yellow-500 text-white rounded">
                Update
            </button>
        </div>
    </form>
</div>
@endsection