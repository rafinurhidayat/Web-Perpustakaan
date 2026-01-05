<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Admin Perpustakaan</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 font-sans">

    <div class="flex min-h-screen">

        {{-- Sidebar --}}
        @include('layouts.sidebar')

        {{-- Content --}}
        <main class="flex-1 p-6">
            @yield('content')
        </main>

    </div>

</body>

</html>