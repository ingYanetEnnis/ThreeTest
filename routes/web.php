<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('home');

Route::post('/login', [\App\Http\Controllers\LoginController::class, 'login'])->name('login');
Route::post('/logout', [\App\Http\Controllers\LoginController::class, 'logout'])->name('logout');
Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
