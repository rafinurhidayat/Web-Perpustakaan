<x-app-layout>
    <div class="max-w-7xl mx-auto py-6">

        <div class="flex justify-between mb-4">
            <h1 class="text-xl font-bold">Data Buku</h1>
            <a href="{{ route('books.create') }}"
               class="bg-blue-600 text-white px-4 py-2 rounded">
                + Tambah Buku
            </a>
        </div>

        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-3 mb-4 rounded">
                {{ session('success') }}
            </div>
        @endif

        <table class="w-full border">
            <thead class="bg-gray-200">
                <tr>
                    <th class="border p-2">No</th>
                    <th class="border p-2">Judul</th>
                    <th class="border p-2">Penulis</th>
                    <th class="border p-2">Tahun</th>
                    <th class="border p-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $book)
                <tr>
                    <td class="border p-2">{{ $loop->iteration }}</td>
                    <td class="border p-2">{{ $book->judul }}</td>
                    <td class="border p-2">{{ $book->penulis }}</td>
                    <td class="border p-2">{{ $book->tahun_terbit }}</td>
                    <td class="border p-2 flex gap-2">

                        <!-- SHOW -->
                        <a href="{{ route('books.show', $book->id) }}"
                           class="bg-green-500 text-white px-2 py-1 rounded">
                            Detail
                        </a>

                        <!-- EDIT -->
                        <a href="{{ route('books.edit', $book->id) }}"
                           class="bg-yellow-500 text-white px-2 py-1 rounded">
                            Edit
                        </a>

                        <!-- DELETE -->
                        <form action="{{ route('books.destroy', $book->id) }}"
                              method="POST"
                              onsubmit="return confirm('Yakin hapus buku ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="bg-red-600 text-white px-2 py-1 rounded">
                                Hapus
                            </button>
                        </form>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</x-app-layout>
