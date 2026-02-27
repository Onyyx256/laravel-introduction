<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// when you wanna manipulate a table and have all possible data of a table
Route::resource('posts', PostController::class);

//Route::get('/posts', [PostController::class, "index"]);
//
//Route::post('/posts', [PostController::class, "store"]);
//
//Route::get("/posts/{post}", [PostController::class, "show"]);
//
//Route::put('/posts/{post}', [PostController::class, "update"]);
//
//Route::delete("/posts/{post}", [PostController::class, "destroy"]);
//
//Route::get("/posts/create", [PostController::class, "create"]);
//
//Route::get("/posts/{post}/edit", [PostController::class, "edit"]);
