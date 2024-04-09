<?php

use App\Http\Controllers\VacancyController;
use Illuminate\Support\Facades\Route;

Route::prefix('vacancy')->name('vacancy.')
    ->middleware('auth:sanctum')
    ->group(function () {
        Route::post('/create', [VacancyController::class, 'create'])->name('api.v1.vacancy.create');
        Route::put('/update/{uuid}', [VacancyController::class, 'update'])->name('api.v1.vacancy.update');
        Route::delete('/delete/{uuid}', [VacancyController::class, 'delete'])->name('api.v1.vacancy.delete');
        Route::delete('/deleteAll', [VacancyController::class, 'deleleAll'])->name('api.v1.vacancy.deleteAll');
    });

Route::prefix('vacancy')->name('vacancy.')
    ->middleware('auth:sanctum')
    ->group(function () {
        Route::get('/list', [VacancyController::class, 'list'])->name('api.v1.vacancy.list');
        Route::get('/getOnly/{uuid}', [VacancyController::class, 'getOnly'])->name('api.v1.vacancy.getOnly');
    });
