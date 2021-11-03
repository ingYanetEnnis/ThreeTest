<?php

use Illuminate\Support\Facades\Route;

//Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('login');
Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
