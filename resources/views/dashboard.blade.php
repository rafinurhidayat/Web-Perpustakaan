@extends('layouts.admin')

@section('title', 'Dashboard')

@section('header')
Dashboard
@endsection

@section('content')

{{-- INFO ROLE --}}
<div class="mb-6">
    <h2 class="text-lg font-semibold text-gray-700">
        Selamat datang, {{ auth()->user()->name }}
    </h2>
    <p class="text-sm text-gray-500">
        Role: {{ ucfirst(auth()->user()->role) }}
    </p>
</div>

{{-- DASHBOARD ADMIN --}}
@if(auth()->user()->role === 'admin')
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

    {{-- TOTAL BUKU --}}
    <div class="bg-white rounded-xl shadow hover:shadow-lg transition p-6 border-l-4 border-blue-600">
        <div class="flex items-center justify-between">
            <div>
                <h3 class="text-sm text-gray-500 uppercase tracking-wide">
                    Total Buku
                </h3>
                <p class="text-3xl font-bold text-blue-600 mt-2">
                    {{ $totalBuku }}
                </p>
            </div>
            <div class="text-blue-600 text-4xl">📚</div>
        </div>
    </div>

    {{-- TOTAL ANGGOTA --}}
    <div class="bg-white rounded-xl shadow hover:shadow-lg transition p-6 border-l-4 border-green-600">
        <div class="flex items-center justify-between">
            <div>
                <h3 class="text-sm text-gray-500 uppercase tracking-wide">
                    Total Anggota
                </h3>
                <p class="text-3xl font-bold text-green-600 mt-2">
                    {{ $totalAnggota }}
                </p>
            </div>
            <div class="text-green-600 text-4xl">👥</div>
        </div>
    </div>

    {{-- TOTAL PEMINJAMAN --}}
    <div class="bg-white rounded-xl shadow hover:shadow-lg transition p-6 border-l-4 border-indigo-600">
        <div class="flex items-center justify-between">
            <div>
                <h3 class="text-sm text-gray-500 uppercase tracking-wide">
                    Total Peminjaman
                </h3>
                <p class="text-3xl font-bold text-indigo-600 mt-2">
                    {{ $totalPeminjaman }}
                </p>
            </div>
            <div class="text-indigo-600 text-4xl">🔄</div>
        </div>
    </div>

</div>
@endif

{{-- DASHBOARD USER --}}
@if(auth()->user()->role === 'user')
<div class="bg-white rounded-xl shadow p-6">
    <h3 class="text-lg font-semibold text-gray-700 mb-2">
        Informasi
    </h3>
    <p class="text-gray-600">
        Anda login sebagai <strong>User</strong>.
        Silakan melihat daftar buku yang tersedia di menu <strong>Buku</strong>.
    </p>
</div>
@endif

@endsection