<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LeadController;
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
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');

Route::resource('leads', LeadController::class); // Added LeadController resource route
Route::get('/leads/create', [LeadController::class, 'create'])->name('leads.create'); // Added lead create route

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

Route::get('/laravel', function () {
    return view('laravel');
})->name('laravel');

Route::get('/destinations', function () {
    return view('destinations');
})->name('destinations');

Route::get('/blog', function () {
    return view('index');
});

Route::resource('blogs', BlogController::class);
Route::get('/blogs/create', [BlogController::class, 'create'])->name('blogs.create');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');

require __DIR__.'/auth.php';
