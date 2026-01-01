<x-app-layout>
<div class="max-w-xl mx-auto py-6">
<form method="POST" action="{{ route('books.update', $book->id) }}">
@csrf
@method('PUT')

<input name="judul" value="{{ $book->judul }}" class="w-full mb-2 border p-2">
<input name="penulis" value="{{ $book->penulis }}" class="w-full mb-2 border p-2">
<input name="penerbit" value="{{ $book->penerbit }}" class="w-full mb-2 border p-2">
<input name="tahun_terbit" value="{{ $book->tahun_terbit }}" class="w-full mb-2 border p-2">
<input name="stok" value="{{ $book->stok }}" class="w-full mb-2 border p-2">

<button class="bg-green-600 text-white px-4 py-2 rounded">
Update
</button>
</form>
</div>
</x-app-layout>
