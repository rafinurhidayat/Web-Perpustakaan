@extends('layouts.admin')

@section('header','Data Peminjaman')

@section('content')

<a href="{{ route('peminjaman.create') }}"
    class="inline-block mb-4 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
    + Tambah Peminjaman
</a>

<div class="bg-white rounded-lg shadow overflow-hidden">
    <table class="w-full text-sm">
        <thead class="bg-gray-800 text-white">
            <tr>
                <th class="p-3">No</th>
                <th>Nama Peminjam</th>
                <th>Judul Buku</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th>Status</th>
                <th class="w-40">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y">
            @forelse($loans as $loan)
            <tr class="text-center hover:bg-gray-50">
                <td class="p-2">{{ $loop->iteration }}</td>
                <td>{{ $loan->user->name }}</td>
                <td>{{ $loan->book->judul }}</td>
                <td>{{ $loan->loan_date }}</td>
                <td>{{ $loan->return_date ?? '-' }}</td>
                <td>
                    <span class="px-2 py-1 text-xs rounded
                        {{ $loan->status == 'dipinjam'
                            ? 'bg-yellow-200 text-yellow-800'
                            : 'bg-green-200 text-green-800' }}">
                        {{ ucfirst($loan->status) }}
                    </span>
                </td>
                <td class="space-x-2">
                    @if($loan->status == 'dipinjam')
                    <form action="{{ route('peminjaman.kembali',$loan) }}"
                        method="POST"
                        class="inline">
                        @csrf
                        @method('PATCH')
                        <button class="text-green-600 hover:underline">
                            Kembalikan
                        </button>
                    </form>
                    @endif

                    <form action="{{ route('peminjaman.destroy',$loan) }}"
                        method="POST"
                        class="inline"
                        onsubmit="return confirm('Hapus data peminjaman?')">
                        @csrf
                        @method('DELETE')
                        <button class="text-red-600 hover:underline">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="p-4 text-center text-gray-500">
                    Belum ada data peminjaman
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection