
<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;


Route::get('/', [PostController::class, 'index'])->name('blog.posts.index');

Route::prefix('blog')->name("blog.")->group(function(){

    Route::get('/', [PostController::class, 'index'])->name('posts.index');
    Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
    Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
});




