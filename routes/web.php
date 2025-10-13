<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TemaQuizController;

use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('admin/tema_quiz', TemaQuizController::class);

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'register'])->name('register');





