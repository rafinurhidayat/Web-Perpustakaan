@extends('layouts.admin')
@section('title','Edit Anggota')

@section('content')

<div class="max-w-2xl mx-auto">

    <div class="bg-white rounded-xl shadow-lg border">

        {{-- HEADER --}}
        <div class="px-6 py-4 border-b bg-gradient-to-r from-yellow-500 to-yellow-600 rounded-t-xl">
            <h2 class="text-lg font-semibold text-white">
                ✏️ Edit Data Anggota
            </h2>
            <p class="text-sm text-yellow-100">
                Perbarui informasi anggota
            </p>
        </div>

        {{-- FORM --}}
        <form method="POST"
            action="{{ route('anggota.update', $anggota) }}"
            class="p-6 space-y-5">
            @csrf
            @method('PUT')

            {{-- Nama --}}
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">
                    Nama Anggota
                </label>
                <input name="nama"
                    value="{{ old('nama', $anggota->nama) }}"
                    class="w-full rounded-lg border-gray-300 shadow-sm
                              focus:border-yellow-500 focus:ring-yellow-500">
            </div>

            {{-- Alamat --}}
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">
                    Alamat
                </label>
                <textarea name="alamat" rows="3"
                    class="w-full rounded-lg border-gray-300 shadow-sm
                           focus:border-yellow-500 focus:ring-yellow-500">{{ old('alamat', $anggota->alamat) }}</textarea>
            </div>

            {{-- No HP --}}
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">
                    No Handphone
                </label>
                <input name="no_hp"
                    value="{{ old('no_hp', $anggota->no_hp) }}"
                    class="w-full rounded-lg border-gray-300 shadow-sm
                              focus:border-yellow-500 focus:ring-yellow-500">
            </div>

            {{-- ACTION --}}
            <div class="flex justify-between items-center pt-4 border-t">
                <a href="{{ route('anggota.index') }}"
                    class="text-sm text-gray-600 hover:text-gray-900">
                    ← Kembali
                </a>

                <button class="px-6 py-2 bg-yellow-500 text-white rounded-lg
                               hover:bg-yellow-600 shadow-md transition">
                    💾 Update Anggota
                </button>
            </div>

        </form>

    </div>

</div>

@endsection