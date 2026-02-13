<x-layout>
    <h1>{{ $post->title }}</h1>
    <p>{{ $post->description ?? "No description..." }}</p>
    <form method="POST" action="/posts/{{ $post->id }}">
        @method('DELETE')
        @csrf

        <button>Delete</button>
    </form>
</x-layout>
