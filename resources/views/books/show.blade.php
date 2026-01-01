<x-app-layout>
<div class="max-w-xl mx-auto py-6">
<h2 class="text-xl font-bold">{{ $book->judul }}</h2>
<p>Penulis: {{ $book->penulis }}</p>
<p>Penerbit: {{ $book->penerbit }}</p>
<p>Tahun: {{ $book->tahun_terbit }}</p>
<p>Stok: {{ $book->stok }}</p>
</div>
</x-app-layout>
