<?php

use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\LogPelanggaranController;
use App\Http\Controllers\Api\LogQuizController;
use App\Http\Controllers\Api\OpsiQuizController;
use App\Http\Controllers\Api\PsychoeducationController;
use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\Api\SoalQuizController;
use App\Http\Controllers\Api\SocialLoginController;
use App\Http\Controllers\Api\TemaQuizController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\UserSettingController;
use App\Http\Controllers\Api\AppLimitController;
use App\Http\Controllers\Api\AppUsageController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// API TEMA QUIZ CRUD

Route::get('TemaQuiz/{id}',[TemaQuizController::class,'show']);
Route::get('TemaQuiz/index/{SettingId}',[TemaQuizController::class,'index']);
Route::get('TemaQuiz/check/{SettingId}',[TemaQuizController::class,'getTemaStatus']);
Route::post('TemaQuiz/store',[TemaQuizController::class,'store']);
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
Route::post('log_quiz/store',[LogQuizController::class,'store']);
Route::get('log_quiz/{id}',[LogQuizController::class,'show']);
Route::get('log_quiz/user/{id}',[LogQuizController::class,'showuser']);


// END API LOG QUIZ

// API LOG PELANGGARAN

Route::get('log_pelanggaran',[LogPelanggaranController::class,'index']);
Route::post('log_pelanggaran/store/{settingId}',[LogPelanggaranController::class,'store']);
Route::get('log_pelanggaran/{id}',[LogPelanggaranController::class,'show']);
Route::get('log_pelanggaran/user/{id}',[LogPelanggaranController::class,'showuser']);


// END API PELANGGARAN

// API LOGIN

Route::get('google-redirect',[SocialLoginController::class,'googleredirect']);
Route::post('login',[LoginController::class,'store']);
Route::post('/auth/google/mobile', [SocialLoginController::class, 'mobileGoogleLogin']);


// END API LOGIN

// API REGISTER

Route::post('register',[RegisterController::class,'store']);
Route::post('register/children',[RegisterController::class,'child']);


// END API REGISTER

// API USER SETTING

Route::get('usersetting',[UserSettingController::class,'index']);
Route::get('usersetting/{id}',[UserSettingController::class,'show']);
Route::post('usersetting/store',[UserSettingController::class,'store']);
Route::put('usersetting/update/{id}',[UserSettingController::class,'update']);

Route::put('/usersetting/{id}/update-usage', [UserSettingController::class, 'updateUsage']);
Route::get('/usersetting/{id}/usage-status', [UserSettingController::class, 'getUsageStatus']);

// ========== APP LIMITS ==========
Route::prefix('app-limits')->group(function () {
    Route::post('/store', [AppLimitController::class, 'store']);
    Route::get('/{userId}', [AppLimitController::class, 'getUserLimits']);
    Route::post('/sync-usage', [AppLimitController::class, 'syncUsage']);
    Route::post('/check-block', [AppLimitController::class, 'checkAppBlock']);
});

// ========== VIOLATIONS ==========
Route::prefix('violations')->group(function () {
    Route::post('/log', [AppLimitController::class, 'logViolation']);
    Route::get('/summary/{userId}', [AppLimitController::class, 'getViolationSummary']);
});

// ========== SLEEP SCHEDULE ==========
// Route::prefix('sleep-schedule')->group(function () {
//     Route::post('/store', [SleepScheduleController::class, 'store']);
//     Route::get('/{userId}', [SleepScheduleController::class, 'show']);
//     Route::post('/check-active', [SleepScheduleController::class, 'checkIfActive']);
// });

// // ========== DIGITAL FREE TIME ==========
// Route::prefix('digital-freetime')->group(function () {
//     Route::post('/store', [DigitalFreeTimeController::class, 'store']);
//     Route::get('/{userId}', [DigitalFreeTimeController::class, 'show']);
//     Route::post('/check-active', [DigitalFreeTimeController::class, 'checkIfActive']);
// });

// ========== MONITORING & ANALYTICS ==========
Route::prefix('analytics')->group(function () {
    // Weekly insights
    Route::get('/weekly/{userId}', [UserSettingController::class, 'getWeeklyInsights']);

    // Daily summary
    Route::get('/daily/{userId}', [UserSettingController::class, 'getDailySummary']);

    // App usage trends
    Route::get('/app-trends/{userId}', [AppLimitController::class, 'getUsageTrends']);
});

// ========== PARENT NOTIFICATIONS ==========
// Untuk user di bawah 14 tahun
Route::prefix('parent-notify')->group(function () {
    Route::post('/send-email', [UserSettingController::class, 'sendParentNotification']);
    Route::get('/violation-report/{childId}', [UserSettingController::class, 'getChildViolationReport']);
});

//  // Sync usage data dari Flutter
//  Route::post('/app-usage/sync', [AppUsageController::class, 'syncUsageData']);

//  // Get statistics
//  Route::get('/app-usage/statistics', [AppUsageController::class, 'getStatistics']);

//  // Get favorite apps
//  Route::get('/app-usage/favorites', [AppUsageController::class, 'getFavoriteApps']);

//  // Get usage by date
//  Route::get('/app-usage/daily/{date}', [AppUsageController::class, 'getDailyUsage']);

//  // Get weekly chart data
//  Route::get('/app-usage/weekly-chart', [AppUsageController::class, 'getWeeklyChart']);

// // END API USER SETTING
Route::prefix('app-usage')->group(function () {
    Route::post('/sync', [AppUsageController::class, 'syncUsageData']);
    Route::get('/statistics', [AppUsageController::class, 'getStatistics']);
    Route::get('/favorites', [AppUsageController::class, 'getFavoriteApps']);
    Route::get('/daily/{date}', [AppUsageController::class, 'getDailyUsage']);
    Route::get('/weekly-chart', [AppUsageController::class, 'getWeeklyChart']);
});

// API USER
Route::get('user',[UserController::class,'index']);
Route::get('user/{id}',[UserController::class,'show']);
Route::put('user/update/{id}',[UserController::class,'update']);

// END API USER

