<?php

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\OAuthController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\Settings\PasswordController;
use App\Http\Controllers\Settings\ProfileController;
use App\Http\Controllers\Skills\LogicSkillsController;
use App\Http\Controllers\Color\LogicColorController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => 'auth:api'], function () {
    Route::post('logout', [LoginController::class, 'logout']);

    Route::get('user', [UserController::class, 'current']);

    Route::patch('settings/profile', [ProfileController::class, 'update']);
    Route::patch('settings/password', [PasswordController::class, 'update']);

    /**
     * apis skill
     */
    Route::get('/skills', [LogicSkillsController::class, "all"]);
    Route::get('/skills/active', [LogicSkillsController::class, "getActive"]);
    Route::get('/skills/{id}', [LogicSkillsController::class, "find"]);
    Route::post('/skills', [LogicSkillsController::class, "create"]);
    Route::put('/skills/{id}', [LogicSkillsController::class, "update"]);
    Route::patch('/skills/{id}/status', [LogicSkillsController::class, "changeStatus"]);

    /**
     * apis skill
     */
    Route::get('/colors', [LogicColorController::class, "all"]);
    Route::get('/colors/active', [LogicColorController::class, "getActive"]);
    Route::get('/colors/{id}', [LogicColorController::class, "find"]);
    Route::post('/colors', [LogicColorController::class, "create"]);
    Route::put('/colors/{id}', [LogicColorController::class, "update"]);
    Route::patch('/colors/{id}/status', [LogicColorController::class, "changeStatus"]);

});

Route::group(['middleware' => 'guest:api'], function () {
    Route::post('login', [LoginController::class, 'login']);
    Route::post('register', [RegisterController::class, 'register']);

    Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail']);
    Route::post('password/reset', [ResetPasswordController::class, 'reset']);

    Route::post('email/verify/{user}', [VerificationController::class, 'verify'])->name('verification.verify');
    Route::post('email/resend', [VerificationController::class, 'resend']);

    Route::post('oauth/{driver}', [OAuthController::class, 'redirect']);
    Route::get('oauth/{driver}/callback', [OAuthController::class, 'handleCallback'])->name('oauth.callback');
});
