<x-layout>
    <h1>Posts List</h1>
    @if(count($posts) > 0)
        <ul>
            @foreach($posts as $post)
                <li>
                    <a href="/posts/{{ $post -> id }}">{{ $post -> title }}</a>
                </li>
            @endforeach
        </ul>
    @else
        <p>So empty... <a href="/posts/create">wanna try to post something?</a></p>
    @endif
</x-layout>
