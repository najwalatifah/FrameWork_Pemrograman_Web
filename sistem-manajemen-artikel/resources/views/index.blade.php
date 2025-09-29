<x-app-layout>
    <h1 class="text-xl font-bold mb-4">Daftar Artikel</h1>
    <a href="{{ route('articles.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Tambah Artikel</a>

    <ul class="mt-4">
        @foreach($articles as $article)
            <li class="border-b py-2">
                <a href="{{ route('articles.show', $article) }}" class="font-semibold">
                    {{ $article->title }}
                </a>
                <p class="text-sm text-gray-500">By: {{ $article->user->name }}</p>

                @if(auth()->user()->role === 'admin' || auth()->id() === $article->user_id)
                    <form action="{{ route('articles.destroy', $article) }}" method="POST" class="inline">
                        @csrf @method('DELETE')
                        <button class="text-red-500">Hapus</button>
                    </form>
                @endif
            </li>
        @endforeach
    </ul>
</x-app-layout>
