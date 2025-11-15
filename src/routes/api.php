<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\MeController;
use App\Http\Controllers\Auth\RefreshController;
use App\Http\Controllers\Cake\GetCakeListController;
use App\Http\Controllers\User\EmailVerification\ResendController;
use App\Http\Controllers\User\EmailVerification\VerifyController;
use App\Http\Controllers\User\RegisterController;
use App\Http\Controllers\User\Step1Controller;
use App\Http\Controllers\User\Step2Controller;
use App\Http\Controllers\Allergie\GetAllergieListController;
use App\Http\Controllers\User\Step3Controller;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// 認証が不要なルート
Route::group([], function () {
    Route::post('login', LoginController::class);

    Route::prefix('emails')->group(function () {
        Route::get('verify', VerifyController::class);
        Route::post('resend', ResendController::class);
    });

    Route::prefix('cakes')->group(function () {
        Route::get('/', GetCakeListController::class);
    });

    Route::prefix('users')->group(function () {
        Route::post('register', RegisterController::class);
    });

    Route::prefix('allergies')->group(function () {
        Route::get('/', GetAllergieListController::class);
    });
});

// 認証が必要なルート
Route::middleware(['jwt.auth'])->group(function () {
    Route::post('logout', LogoutController::class);
    Route::get('me', MeController::class);
    Route::post('refresh', RefreshController::class);

    Route::prefix('users')->group(function () {
        Route::post('step1', Step1Controller::class);
        Route::post('step2', Step2Controller::class);
        Route::post('step3', Step3Controller::class);
    });
});
