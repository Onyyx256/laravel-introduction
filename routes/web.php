<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/posts', function () {
    $posts = DB::select('select * from posts');
    return view('posts.index', ['posts' => $posts]);
});

Route::get('/posts/{id}', function (string $id) {
    $post = DB::selectOne('select * from posts where id = ?', [$id]);

    if ($post == null) {
        abort(404);
    }

    return view('posts.show', ['post' => $post]);
});
