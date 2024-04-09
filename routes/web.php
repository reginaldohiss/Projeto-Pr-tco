<?php

use App\Http\Controllers\CandidateController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\VacancyController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
})->name('login');


Route::get('/home', [HomeController::class, 'home'])->name('home');


Route::get('/vacancy', [VacancyController::class, 'home'])->name('vacancy.home');
Route::get('/vacancy/new', [VacancyController::class, 'new'])->name('vacancy.new');
Route::get('/vacancy/edit/{uuid?}', [VacancyController::class, 'edit'])->name('vacancy.edit');

Route::get('/candidate', [CandidateController::class, 'home'])->name('candidate.home');
Route::get('/candidate/new', [CandidateController::class, 'new'])->name('candidate.new');
Route::get('/candidate/edit/{uuid?}', [CandidateController::class, 'edit'])->name('candidate.edit');

