<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Admin Perpustakaan')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">

    <div class="flex min-h-screen">

        {{-- SIDEBAR --}}
        <aside class="w-64 bg-blue-900 text-white flex flex-col">
            <div class="p-4 text-xl font-bold border-b border-blue-700">
                Admin Perpustakaan
            </div>

            <nav class="flex-1 p-4 space-y-2">
                <a href="{{ route('dashboard') }}"
                    class="block px-4 py-2 rounded hover:bg-blue-700">
                    Dashboard
                </a>

                <a href="{{ route('books.index') }}"
                    class="block px-4 py-2 rounded hover:bg-blue-700">
                    Buku
                </a>

                <a href="{{ route('anggota.index') }}"
                    class="block px-4 py-2 rounded hover:bg-blue-700">
                    Anggota
                </a>

                <a href="{{ route('peminjaman.index') }}"
                    class="block px-4 py-2 rounded hover:bg-blue-700">
                    Peminjaman
                </a>
            </nav>

            <form method="POST" action="{{ route('logout') }}" class="p-4 border-t border-blue-700">
                @csrf
                <button type="submit"
                    class="w-full text-left px-4 py-2 rounded hover:bg-red-600">
                    Logout
                </button>
            </form>
        </aside>

        {{-- CONTENT --}}
        <main class="flex-1 p-6">
            <h1 class="text-2xl font-semibold mb-4">
                @yield('header')
            </h1>

            @yield('content')
        </main>

    </div>

</body>

</html>