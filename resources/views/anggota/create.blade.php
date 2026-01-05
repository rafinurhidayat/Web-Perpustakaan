@extends('layouts.admin')
@section('title','Tambah Anggota')

@section('content')

<div class="max-w-2xl mx-auto">

    {{-- CARD --}}
    <div class="bg-white rounded-xl shadow-lg border">

        {{-- HEADER --}}
        <div class="px-6 py-4 border-b bg-gradient-to-r from-blue-600 to-blue-700 rounded-t-xl">
            <h2 class="text-lg font-semibold text-white">
                👤 Tambah Data Anggota
            </h2>
            <p class="text-sm text-blue-100">
                Isi informasi anggota dengan lengkap
            </p>
        </div>

        {{-- FORM --}}
        <form method="POST" action="{{ route('anggota.store') }}" class="p-6 space-y-5">
            @csrf

            {{-- Nama --}}
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">
                    Nama Anggota
                </label>
                <input name="nama" value="{{ old('nama') }}"
                    placeholder="Masukkan nama anggota"
                    class="w-full rounded-lg border-gray-300 shadow-sm
                           focus:border-blue-500 focus:ring-blue-500">
            </div>
            {{-- No Anggota --}}
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">
                    No Anggota
                </label>
                <input name="no_anggota" value="{{ old('no_anggota') }}"
                    placeholder="Contoh: AGT-001"
                    class="w-full rounded-lg border-gray-300 shadow-sm
               focus:border-blue-500 focus:ring-blue-500">
            </div>

            {{-- Alamat --}}
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">
                    Alamat
                </label>
                <textarea name="alamat" rows="3"
                    placeholder="Masukkan alamat anggota"
                    class="w-full rounded-lg border-gray-300 shadow-sm
                           focus:border-blue-500 focus:ring-blue-500">{{ old('alamat') }}</textarea>
            </div>

            {{-- No HP --}}
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">
                    No Handphone
                </label>
                <input name="no_hp" value="{{ old('no_hp') }}"
                    placeholder="Contoh: 08xxxxxxxxxx"
                    class="w-full rounded-lg border-gray-300 shadow-sm
                           focus:border-blue-500 focus:ring-blue-500">
            </div>

            {{-- ACTION --}}
            <div class="flex justify-between items-center pt-4 border-t">
                <a href="{{ route('anggota.index') }}"
                    class="text-sm text-gray-600 hover:text-gray-900">
                    ← Kembali
                </a>

                <button
                    class="px-6 py-2 bg-blue-600 text-white rounded-lg
                           hover:bg-blue-700 shadow-md transition">
                    💾 Simpan Anggota
                </button>
            </div>

        </form>
    </div>

</div>

@endsection