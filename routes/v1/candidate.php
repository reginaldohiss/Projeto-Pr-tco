<?php

use App\Http\Controllers\CandidateController;
use Illuminate\Support\Facades\Route;

Route::prefix('candidate')->name('candidate.')
    ->middleware('auth:sanctum')
    ->group(function () {
        Route::post('/create', [CandidateController::class, 'create'])->name('api.v1.candidate.create');
        Route::put('/update/{uuid}', [CandidateController::class, 'update'])->name('api.v1.candidate.update');
        Route::delete('/delete/{uuid}', [CandidateController::class, 'delete'])->name('api.v1.candidate.delete');
        Route::delete('/deleteAll', [CandidateController::class, 'deleleAll'])->name('api.v1.candidate.deleteAll');
    });

Route::prefix('candidate')->name('candidate.')
    ->middleware('auth:sanctum')
    ->group(function () {
        Route::get('/list', [CandidateController::class, 'list'])->name('api.v1.candidate.list');
        Route::get('/getOnly/{uuid}', [CandidateController::class, 'getOnly'])->name('api.v1.candidate.getOnly');
    });
