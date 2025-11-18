<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\TemaQuizController;
use App\Http\Controllers\Admin\PsychoeducationController;
use App\Http\Controllers\Admin\SoalQuizController;
use App\Http\Controllers\Admin\LogQuizController;
use App\Http\Controllers\Admin\LogPelanggaranController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\UserChildrenController;
use App\Http\Controllers\Admin\UserSettingController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Api\SocialLoginController;
use App\Http\Controllers\ChildVerificationController;

// ========================
// 🏠 Dashboard (halaman setelah login)
// ========================
// Route::get('/admin/dashboard', function () {
//     return view('welcome'); // nanti buat file resources/views/dashboard.blade.php
// })->name('admin.dashboard')->middleware('auth');

Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard')->middleware('auth');



// ========================
// 🔐 Authentication Routes
// ========================
Route::get('/', [AuthController::class, 'login']);
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginProcess'])->name('login.process');

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'registerProcess'])->name('register.process');
Route::get('auth/google-redirect',[SocialLoginController::class,'googleredirect']);
Route::get('auth/google-callback',[SocialLoginController::class,'googleLogin']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');


// ========================
// ⚙️ Admin Routes (protected area)
// ========================
Route::middleware(['auth'])->prefix('admin')->group(function () {

    Route::resource('tema_quiz', TemaQuizController::class);
    Route::resource('psychoeducation', PsychoeducationController::class);
    Route::resource('soal_quiz', SoalQuizController::class);
    Route::resource('log_quiz', LogQuizController::class);
    Route::resource('log_pelanggaran', LogPelanggaranController::class);
    Route::resource('users', UserController::class);
    Route::resource('user_children', UserChildrenController::class);
    Route::get('akun', [UserController::class, 'akun'])->name('users.akun');
    Route::get('profile', [UserController::class, 'profile'])->name('users.profile');
    Route::put('profile', [UserController::class, 'updateProfile'])->name('users.updateProfile');

    // Subgroup untuk user_setting
    Route::prefix('user_setting')->group(function () {
        Route::get('/', [UserSettingController::class, 'index'])->name('user_setting.index');
        Route::get('/create/personal', [UserSettingController::class, 'createPersonal'])->name('user_setting.createPersonal');
        Route::get('/create/children', [UserSettingController::class, 'createChildren'])->name('user_setting.createChildren');
        Route::post('/store', [UserSettingController::class, 'store'])->name('user_setting.store');
        Route::get('/{user_setting}/edit', [UserSettingController::class, 'edit'])->name('user_setting.edit');
        Route::put('/{user_setting}', [UserSettingController::class, 'update'])->name('user_setting.update');
        Route::get('/{user_setting}', [UserSettingController::class, 'show'])->name('user_setting.show');
        Route::delete('/{user_setting}', [UserSettingController::class, 'destroy'])->name('user_setting.destroy');
    });
});

Route::get('/child-verify/{id}/{hash}', [ChildVerificationController::class, 'verifyAndRedirect'])
    ->name('child.verify.deep_link')
    ->middleware(['signed']);
