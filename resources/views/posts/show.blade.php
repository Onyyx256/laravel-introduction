<x-layout>
    <h1>{{ $post->title }}</h1>
    @if($post -> description)
        <p>{{ $post->description }}</p>
    @else
        <p>no description...</p>
    @endif
</x-layout>
