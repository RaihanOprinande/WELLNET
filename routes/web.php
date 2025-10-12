<?php

use Illuminate\Support\Facades\Route;
 tema-quiz
use App\Http\Controllers\Admin\TemaQuizController;

use App\Http\Controllers\AuthController;

 main

Route::get('/', function () {
    return view('welcome');
});

tema-quiz
Route::resource('admin/tema_quiz', TemaQuizController::class);

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'register'])->name('register');
main


