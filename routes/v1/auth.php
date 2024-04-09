<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->name('auth.')
    ->group(function () {
        Route::post('/login', [AuthController::class, 'login'])->name('api.v1.auth.login');
    });

