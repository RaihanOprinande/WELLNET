<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\TemaQuizController;
use App\Http\Controllers\Admin\PsychoeducationController;
use App\Http\Controllers\Admin\SoalQuizController;
use App\Http\Controllers\Admin\LogQuizController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\UserChildrenController;
use App\Http\Controllers\Admin\UserSettingController;
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
Route::prefix('admin/user_setting')->group(function () {
    Route::get('/', [UserSettingController::class, 'index'])->name('user_setting.index');
    Route::get('/create/personal', [UserSettingController::class, 'createPersonal'])->name('user_setting.createPersonal');
    Route::get('/create/children', [UserSettingController::class, 'createChildren'])->name('user_setting.createChildren');
    Route::post('/store', [UserSettingController::class, 'store'])->name('user_setting.store');
    Route::get('/{user_setting}/edit', [UserSettingController::class, 'edit'])->name('user_setting.edit');
    Route::put('/{user_setting}', [UserSettingController::class, 'update'])->name('user_setting.update');
    Route::get('/{user_setting}', [UserSettingController::class, 'show'])->name('user_setting.show');
    Route::delete('/{user_setting}', [UserSettingController::class, 'destroy'])->name('user_setting.destroy');
});



Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'register'])->name('register');





