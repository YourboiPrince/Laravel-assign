<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;

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
Route::resource('posts', PostController::class);
// Route::get('/dashboard', function () { return view('dashboard'); })->


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Laravel, Destinations, Blog, About, Login links
Route::get('/laravel', function () {
    return view('laravel');
})->name('laravel');

Route::get('/destinations', function () {
    return view('destinations');
})->name('destinations');

// Blog routes
Route::get('/blog', [BlogController::class, 'dashboard'])->name('blog.dashboard');
Route::resource('blogs', BlogController::class);

require __DIR__.'/auth.php';
