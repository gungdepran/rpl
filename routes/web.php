<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;

// Home route
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Authentication routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::get('/profile', [AuthController::class, 'showProfile'])->name('profile.form')->middleware('auth');
Route::post('/profile', [AuthController::class, 'profile'])->name('profile')->middleware('auth');

// Admin routes for managing destinasi wisata
Route::get('/wisata/add', [AdminController::class, 'create'])->name('pages.create');
Route::get('/wisata', [AdminController::class, 'index'])->name('pages.index');
Route::post('/wisata', [AdminController::class, 'store'])->name('pages.store');
Route::get('/wisata/{id}/edit', [AdminController::class, 'edit'])->name('pages.edit'); // Updated route
Route::put('/wisata/{id}', [AdminController::class, 'update'])->name('pages.update');
Route::delete('/wisata/{id}', [AdminController::class, 'destroy'])->name('pages.destroy');

// Route::get('/wisata', [AdminController::class, 'index']);
// Route::get('/wisata/add', [AdminController::class, 'create'])->name('wisata.create');
// Route::POST('/wisata', [AdminController::class, 'store']);
// Route::get('/wisata/{id}', [AdminController::class, 'edit'])->name('wisata.edit');
// Route::put('/wisata/{id}', [AdminController::class, 'update'])->name('wisata.update');
// Route::delete('/wisata/{id}', [AdminController::class, 'destroy'])->name('wisata.destroy');