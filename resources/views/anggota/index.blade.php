@extends('layouts.app')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold mb-4 text-white">Data Anggota</h1>

    <!-- Tombol Tambah -->
    <div class="mb-6">
        <a href="{{ route('anggota.create') }}"
           class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
            + Tambah Anggota
        </a>
    </div>

    @if (session('success')) <div class="mb-4 bg-green-600 text-white px-4 py-2 rounded"> {{ session('success') }} </div> @endif
    
    <table class="w-full border border-gray-700 text-white">
        <thead class="bg-gray-800">
            <tr>
                <th class="border px-4 py-2 text-gray-200">No</th>
                <th class="border px-4 py-2 text-gray-200">Nama</th>
                <th class="border px-4 py-2 text-gray-200">No Anggota</th>
                <th class="border px-4 py-2 text-gray-200">Alamat</th>
                <th class="border px-4 py-2 text-gray-200">No HP</th>
                <th class="border px-4 py-2 text-gray-200">Aksi</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($anggotas as $index => $anggota)
            <tr class="hover:bg-gray-700">
                <td class="border px-4 py-2">{{ $index + 1 }}</td>
                <td class="border px-4 py-2">{{ $anggota->nama }}</td>
                <td class="border px-4 py-2">{{ $anggota->no_anggota }}</td>
                <td class="border px-4 py-2">{{ $anggota->alamat }}</td>
                <td class="border px-4 py-2">{{ $anggota->no_hp }}</td>

                <!-- Aksi -->
                <td class="border px-4 py-2 text-center">
                    <div class="flex justify-center gap-2">
                        <!-- Edit -->
                        <a href="{{ route('anggota.edit', $anggota->id) }}"
                           class="bg-yellow-500 hover:bg-yellow-600 text-black px-3 py-1 rounded text-sm">
                            Edit
                        </a>

                        <!-- Hapus -->
                        <form action="{{ route('anggota.destroy', $anggota->id) }}"
                              method="POST"
                              onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="bg-red-600 hover:bg-red-700 px-3 py-1 rounded text-sm">
                                Hapus
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
