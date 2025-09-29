<x-app-layout>
    <h1 class="text-2xl font-bold">{{ $article->title }}</h1>
    <p class="mt-2 text-gray-600">By: {{ $article->user->name }}</p>
    <div class="mt-4">{{ $article->content }}</div>
</x-app-layout>

