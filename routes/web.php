<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AboutController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

# Route Home
Route::get('/', [HomeController::class, '__invoke'])->name('home');

# Route Posts
Route::prefix('/posts')->group(function () {
    Route::get('/', [PostController::class, 'index'])->name('posts.index');
    Route::get('/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/store', [PostController::class, 'store'])->name('posts.store');
    Route::get('/{post:slug}', [PostController::class, 'show'])->name('posts.show');
    Route::get('/{post:slug}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::patch('/{post:slug}', [PostController::class, 'update'])->name('posts.update');
    Route::delete('/{post:slug}', [PostController::class, 'destroy'])->name('posts.delete');
});

# Route Projects
Route::get('/projects', function () {
    return view('projects.index');
})->name('projects');

# Route About
Route::get('/about', [AboutController::class, '__invoke'])->name('about');