<x-layout>
    <h1>Posts List</h1>
    <ul>
        @foreach($posts as $post)
            <li>
                <a href="/posts/{{ $post -> id }}">{{ $post -> title }}</a>
            </li>
        @endforeach
    </ul>
</x-layout>
