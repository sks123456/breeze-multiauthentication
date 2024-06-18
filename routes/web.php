<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;


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
