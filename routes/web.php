<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;


Route::get('/', [HomeController::class, 'homepage']);

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified', 'normal'])
    ->name('dashboard');

Route::view('admin', 'admin')
    ->middleware(['auth', 'verified', 'admin'])
    ->name('admin');

Route::view('superadmin', 'superadmin')
    ->middleware(['auth', 'verified', 'superadmin'])
    ->name('superadmin');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('home', [HomeController::class, 'index']);
require __DIR__ . '/auth.php';

use Illuminate\Support\Facades\Auth;

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

Route::get('/post_page', [AdminController::class, 'post_page']);

Route::post('/add_post', [AdminController::class, 'add_post']);

Route::get('/show_post', [AdminController::class, 'show_post']);

Route::get('/delete_post/{id}', [AdminController::class, 'delete_post']);

Route::get('/edit_page/{id}', [AdminController::class, 'edit_page']);

Route::post('/update_post/{id}', [AdminController::class, 'update_post']);

Route::get('/post_details/{id}', [HomeController::class, 'post_details']);
