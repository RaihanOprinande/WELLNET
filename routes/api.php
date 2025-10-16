<?php

use App\Http\Controllers\Api\LogQuizController;
use App\Http\Controllers\Api\OpsiQuizController;
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

// API OPSI QUIZ

Route::get('opsi_quiz',[OpsiQuizController::class,'index']);
Route::get('opsi_quiz/{id}',[OpsiQuizController::class,'show']);
Route::get('opsi_quiz/quiz/{id}',[OpsiQuizController::class,'showcustom']);


// END API OPSI QUIZ

// API LOG QUIZ

Route::get('log_quiz',[LogQuizController::class,'index']);
Route::get('log_quiz/store',[LogQuizController::class,'store']);
Route::get('log_quiz/{id}',[LogQuizController::class,'show']);
Route::get('log_quiz/user/{id}',[LogQuizController::class,'showuser']);


// END API LOG QUIZ
