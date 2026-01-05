@extends('layouts.admin')

@section('header','Data Anggota')

@section('content')

<a href="{{ route('anggota.create') }}"
    class="inline-block mb-4 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
    + Tambah Anggota
</a>

<div class="bg-white rounded shadow overflow-x-auto">
    <table class="w-full text-sm">
        <thead class="bg-gray-800 text-white">
            <tr>
                <th class="p-3">Nama</th>
                <th>No Anggota</th>
                <th>No HP</th>
                <th>Alamat</th>
                <th class="p-3">Aksi</th>
            </tr>
        </thead>

        <tbody>
            @forelse($anggotas as $anggota)
            <tr class="text-center border-t hover:bg-gray-50">
                <td class="p-2">{{ $anggota->nama }}</td>
                <td>{{ $anggota->no_anggota }}</td>
                <td>{{ $anggota->no_hp }}</td>
                <td class="text-left px-3">{{ $anggota->alamat }}</td>
                <td class="space-x-2">
                    <a href="{{ route('anggota.edit', $anggota) }}"
                        class="text-blue-600 hover:underline">
                        Edit
                    </a>

                    <form action="{{ route('anggota.destroy', $anggota) }}"
                        method="POST"
                        class="inline">
                        @csrf
                        @method('DELETE')
                        <button class="text-red-600 hover:underline"
                            onclick="return confirm('Hapus anggota ini?')">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="p-4 text-center text-gray-500">
                    Data belum ada
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection