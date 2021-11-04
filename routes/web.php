<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::post('/login', [\App\Http\Controllers\LoginController::class, 'login'])->name('login');
Route::post('/logout', [\App\Http\Controllers\LoginController::class, 'logout'])->name('logout');

//Route::get('/login', [App\Http\Controllers\HomeController::class, 'index'])->name('login');
Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
