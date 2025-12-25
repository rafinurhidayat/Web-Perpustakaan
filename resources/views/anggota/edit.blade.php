@extends('layouts.app')

@section('content')
<div class="p-6 max-w-xl mx-auto text-white">
    <h1 class="text-2xl font-bold mb-6">Edit Anggota</h1>

    <form action="{{ route('anggota.update', $anggota->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label>Nama</label>
            <input type="text" name="nama"
                value="{{ old('nama', $anggota->nama) }}"
                class="w-full px-3 py-2 text-black rounded">
        </div>

        <div class="mb-4">
            <label>No Anggota</label>
            <input type="text" name="no_anggota"
                value="{{ old('no_anggota', $anggota->no_anggota) }}"
                class="w-full px-3 py-2 text-black rounded">
        </div>

        <div class="mb-4">
            <label>Alamat</label>
            <textarea name="alamat"
                class="w-full px-3 py-2 text-black rounded">{{ old('alamat', $anggota->alamat) }}</textarea>
        </div>

        <div class="mb-4">
            <label>No HP</label>
            <input type="text" name="no_hp"
                value="{{ old('no_hp', $anggota->no_hp) }}"
                class="w-full px-3 py-2 text-black rounded">
        </div>

        <div class="flex gap-3">
            <button type="submit"
                class="bg-green-600 hover:bg-green-700 px-4 py-2 rounded">
                Update
            </button>

            <a href="{{ route('anggota.index') }}"
               class="bg-gray-600 hover:bg-gray-700 px-4 py-2 rounded">
                Kembali
            </a>
        </div>
    </form>
</div>
@endsection
