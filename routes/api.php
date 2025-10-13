<?php

use App\Http\Controllers\Api\TemaQuizController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// API TEMA QUIZ CRUD
Route::get('TemaQuiz',[TemaQuizController::class,'index']);
Route::get('TemaQuiz/{id}',[TemaQuizController::class,'show']);
Route::post('TemaQuiz',[TemaQuizController::class,'store']);
Route::put('TemaQuiz/{id}',[TemaQuizController::class,'update']);

// END API TEMA QUIZ
