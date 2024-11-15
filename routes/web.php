<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GoogleController;

// Redirect ke halaman login jika mengakses root ('/')
Route::get('/', function () {
    return redirect()->route('login');
})->name('home');

// Route untuk halaman utama setelah login
Route::get('/home', function () {
    return view('home');
})->middleware('auth');


Route::resource('categories', CategoryController::class);

// Route untuk tasks, dengan middleware auth
Route::middleware(['auth'])->group(function () {
    Route::resource('tasks', TaskController::class);
    Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
    Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');

    Route::resource('categories', CategoryController::class);

    
    // Contoh akses ke profil user
    Route::get('/user/{id}', function ($id) {
        return "Profil pengguna dengan ID: " . $id;
    });
});

// Route untuk akses khusus admin
Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('/users', function () {
        return "Daftar pengguna";
    });
    Route::get('/posts', function () {
        return "Daftar post";
    });
});

// Route untuk autentikasi
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

