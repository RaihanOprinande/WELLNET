<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\TemaQuizController;
use App\Http\Controllers\Admin\PsychoeducationController;
use App\Http\Controllers\Admin\SoalQuizController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('admin/tema_quiz', TemaQuizController::class);
Route::resource('admin/psychoeducation', PsychoeducationController::class);
Route::resource('admin/soal_quiz', SoalQuizController::class);
Route::resource('admin/log_quiz', App\Http\Controllers\Admin\LogQuizController::class);

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'register'])->name('register');





