<x-app-layout>
    <h1 class="text-xl font-bold mb-4">Tambah Artikel</h1>

    <form action="{{ route('articles.store') }}" method="POST" class="space-y-4">
        @csrf
        <input type="text" name="title" placeholder="Judul" class="w-full border p-2">
        <textarea name="content" placeholder="Isi artikel" class="w-full border p-2"></textarea>
        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Simpan</button>
    </form>
</x-app-layout>
