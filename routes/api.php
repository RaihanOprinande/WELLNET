<?php

use App\Http\Controllers\Api\PsychoeducationController;
use App\Http\Controllers\Api\SoalQuizController;
use App\Http\Controllers\Api\TemaQuizController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// API TEMA QUIZ CRUD

Route::get('TemaQuiz/{id}',[TemaQuizController::class,'show']);
Route::post('TemaQuiz',[TemaQuizController::class,'store']);
Route::put('TemaQuiz/{id}',[TemaQuizController::class,'update']);
Route::delete('TemaQuiz/{id}',[TemaQuizController::class,'destroy']);

// END API TEMA QUIZ

// API PSYCOEDUCATION

Route::get('psycoedu',[PsychoeducationController::class,'index']);
Route::get('psycoedu/{id}',[PsychoeducationController::class,'show']);

// END API PSYCOEDUCATION

// API SOAL QUIZ

Route::get('soal_quiz',[SoalQuizController::class,'index']);
Route::get('soal_quiz/{id}',[SoalQuizController::class,'show']);


// END API SOAL QUIZ
