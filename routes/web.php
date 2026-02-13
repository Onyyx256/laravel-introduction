<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/posts', function () {
    $posts = DB::select('select * from posts');
    return view('posts.index', ['posts' => $posts]);
});

Route::post('/posts', function (Request $request) {
    $validated = $request->validate([
        'title' => 'required|max:255',
        'description' => 'nullable|min:10'
    ]);

    DB::insert("INSERT INTO posts (title, description) VALUES (?, ?)", [$validated['title'], $validated['description']]);

    return redirect('/posts');
});

Route::get('/posts/{id}', function (string $id) {
    $post = DB::selectOne('select * from posts where id = ?', [$id]);

    if ($post == null) {
        abort(404);
    }

    return view('posts.show', ['post' => $post]);
})->whereNumber('id');

Route::get('/posts/create', function () {
    return view('posts.create');
});
