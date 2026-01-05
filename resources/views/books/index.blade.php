@extends('layouts.admin') {{-- Bisa juga layouts.user jika mau layout khusus user --}}

@section('header','Data Buku')

@section('content')

{{-- Tombol tambah hanya muncul untuk admin --}}
@if(Auth::user()->role === 'admin')
<a href="{{ route('books.create') }}"
    class="inline-block mb-4 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
    + Tambah Buku
</a>
@endif

<div class="bg-white rounded shadow overflow-x-auto">
    <table class="w-full text-sm">
        <thead class="bg-gray-800 text-white">
            <tr class="text-center">
                <th class="p-3">Judul</th>
                <th>Penulis</th>
                <th>Penerbit</th>
                <th>Stok</th>
                @if(Auth::user()->role === 'admin')
                <th>Aksi</th>
                @endif
            </tr>
        </thead>
        <tbody class="divide-y">
            @forelse($books as $book)
            <tr class="text-center hover:bg-gray-50">
                <td class="p-2">{{ $book->judul }}</td>
                <td>{{ $book->penulis }}</td>
                <td>{{ $book->penerbit ?? '-' }}</td>
                <td>
                    <span class="px-2 py-1 text-xs rounded
                        {{ $book->stok > 0
                            ? 'bg-green-200 text-green-800'
                            : 'bg-red-200 text-red-800' }}">
                        {{ $book->stok }}
                    </span>
                </td>
                @if(Auth::user()->role === 'admin')
                <td class="space-x-2">
                    <a href="{{ route('books.edit',$book) }}" class="text-blue-600 hover:underline">Edit</a>
                    <form action="{{ route('books.destroy',$book) }}" method="POST" class="inline"
                        onsubmit="return confirm('Hapus buku ini?')">
                        @csrf @method('DELETE')
                        <button class="text-red-600 hover:underline">Hapus</button>
                    </form>
                </td>
                @endif
            </tr>
            @empty
            <tr>
                <td colspan="{{ Auth::user()->role === 'admin' ? 5 : 4 }}" class="p-4 text-center text-gray-500">
                    Data belum ada
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection