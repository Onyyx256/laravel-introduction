@push('stylesheets')
    <link rel="stylesheet" href="{{ asset("stylesheets/posts/create.css") }}">
@endpush

<x-layout>
    <h1>Create a Post</h1>
    <p>This page allows you to create a post!</p>
    <form method="POST" action="/posts">
        @csrf

        <div>
            <label for="Title">Title</label>
            <input
                type="text"
                id="title"
                placeholder="My first post"
                name="title"
                value="{{ old('title') }}"
                class="@error('title') is-invalid @enderror"
            >
            @error('title')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="description">Description</label>
            <textarea
                name="description"
                id="description"
                placeholder="..."
                class="@error('description') is-invalid @enderror"
            >{{ old('description') }}</textarea>
            @error('description')
            <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <button>Submit</button>
    </form>
</x-layout>
