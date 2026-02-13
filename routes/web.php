<?php

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/posts', function () {
    $posts = Post::all();
    return view('posts.index', ['posts' => $posts]);
});

Route::post('/posts', function (Request $request) {
    $validated = $request->validate([
        'title' => 'required|max:255',
        'description' => 'nullable|min:10'
    ]);

    Post::query()->create($validated);

    return redirect("/posts");
});

Route::get("/posts/{post}", function (Post $post) {
    return view('posts.show', ['post' => $post]);
});

Route::put('/posts/{post}', function (Request $request, Post $post) {
    $validated = $request->validate([
        'title' => 'required|max:255',
        'description' => 'nullable|min:10'
    ]);

   $post->update($validated);

    return redirect("/posts/$post->id");
});

Route::delete("/posts/{post}", function (Post $post) {
    $post->delete();
    return redirect("/posts");
});

Route::get("/posts/create", function () {
    return view("posts.create");
});

Route::get("/posts/{post}/edit", function (Post $post) {
    return view("posts.edit", ["post" => $post]);
});
