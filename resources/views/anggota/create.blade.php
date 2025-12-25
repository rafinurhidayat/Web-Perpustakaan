@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto mt-6 bg-white p-6 rounded shadow">
    <h2 class="text-xl font-bold mb-4">Tambah Anggota</h2>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-3 mb-4 rounded">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>• {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('anggota.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="block">Nama</label>
            <input type="text" name="nama" class="w-full border rounded p-2">
        </div>

        <div class="mb-3">
            <label class="block">No Anggota</label>
            <input type="text" name="no_anggota" class="w-full border rounded p-2">
        </div>

        <div class="mb-3">
            <label class="block">Alamat</label>
            <textarea name="alamat" class="w-full border rounded p-2"></textarea>
        </div>

        <div class="mb-3">
            <label class="block">No HP</label>
            <input type="text" name="no_hp" class="w-full border rounded p-2">
        </div>

        <div class="flex justify-between">
            <a href="{{ route('anggota.index') }}" class="text-gray-600">Kembali</a>
            <button class="bg-blue-600 text-white px-4 py-2 rounded">
                Simpan
            </button>
        </div>
    </form>
</div>
@endsection
