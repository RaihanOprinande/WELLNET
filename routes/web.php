<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\TemaQuizController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('admin/tema_quiz', TemaQuizController::class);


