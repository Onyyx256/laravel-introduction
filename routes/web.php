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

    return redirect("/posts");
});

Route::get("/posts/{id}", function (int $id) {
    $post = DB::selectOne('SELECT * from posts where id = ?', [$id]);

    if ($post == null) {
        abort(404);
    }

    return view('posts.show', ['post' => $post]);
})->whereNumber('id');

Route::put('/posts/{id}', function (Request $request, int $id) {
    $validated = $request->validate([
        'title' => 'required|max:255',
        'description' => 'nullable|min:10'
    ]);

    $post = DB::selectOne('SELECT * FROM posts WHERE id = ?', [$id]);

    if ($post == null) {
        abort(404);
    }

    DB::update("UPDATE posts SET title = ?, description = ? WHERE id = ?", [$validated['title'], $validated['description'], $id]);

    return redirect("/posts/$id");
})->whereNumber("id");

Route::delete("/posts/{id}", function (int $id) {
    DB::delete("DELETE FROM posts WHERE id = ?", [$id]);
    return redirect("/posts");
})->whereNumber("id");

Route::get("/posts/create", function () {
    return view("posts.create");
});

Route::get("/posts/{id}/edit", function (int $id) {
    $post = DB::selectOne("SELECT * FROM posts WHERE id = ?", [$id]);
    return view("posts.edit", ["post" => $post]);
});
