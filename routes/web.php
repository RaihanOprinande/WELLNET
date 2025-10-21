<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\TemaQuizController;
use App\Http\Controllers\Admin\PsychoeducationController;
use App\Http\Controllers\Admin\SoalQuizController;
use App\Http\Controllers\Admin\LogQuizController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\UserChildrenController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('admin/tema_quiz', TemaQuizController::class);
Route::resource('admin/psychoeducation', PsychoeducationController::class);
Route::resource('admin/soal_quiz', SoalQuizController::class);
Route::resource('admin/log_quiz', LogQuizController::class);
Route::resource('admin/users', UserController::class);
Route::resource('admin/user_children', UserChildrenController::class);


Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'register'])->name('register');





