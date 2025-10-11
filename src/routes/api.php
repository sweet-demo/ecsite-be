<?php

use App\Http\Controllers\Auth\CsrfTokenController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\MeController;
use App\Http\Controllers\Auth\RefreshController;
use App\Http\Controllers\Cake\GetCakeListController;
use App\Http\Controllers\User\EmailVerification\ResendController;
use App\Http\Controllers\User\EmailVerification\VerifyController;
use App\Http\Controllers\User\RegisterController;
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

Route::prefix('csrf')->group(function () {
    Route::get('token', CsrfTokenController::class);
});

Route::prefix('auth')->group(function () {
    Route::post('login', LoginController::class)->middleware('csrf');
});

Route::prefix('user')->group(function () {
    Route::post('register', RegisterController::class)->middleware('csrf');
});

Route::prefix('cake')->group(function () {
    Route::get('/', GetCakeListController::class);
});

// メール認証関連のルート（認証前の処理）
Route::prefix('email')->group(function () {
    Route::get('verify', VerifyController::class);
    Route::post('resend', ResendController::class)->middleware('csrf');
});

Route::middleware(['jwt.auth', 'csrf'])->prefix('auth')->group(function () {
    Route::post('logout', LogoutController::class);
    Route::get('me', MeController::class);
    Route::post('refresh', RefreshController::class);
});
