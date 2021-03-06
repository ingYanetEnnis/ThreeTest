<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
//Route::post('login', [\App\Http\Controllers\Api\AuthController::class, 'login']);
//Route::post('logout', [\App\Http\Controllers\Api\AuthController::class, 'logout']);

Route::middleware('auth:api')->group( function () {
    Route::get('quotes', [\App\Http\Controllers\Api\QuoteController::class, 'index']);
    Route::get('quote', [\App\Http\Controllers\Api\QuoteController::class, 'quoteBySymbol']);
    Route::get('symbols/{match}', [\App\Http\Controllers\Api\QuoteController::class, 'symbols']);
});
