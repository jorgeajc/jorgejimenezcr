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
use App\Http\Controllers\Colors\LogicColorsController;
use App\Http\Controllers\ProgrammingLanguages\LogicProgrammingLanguagesController;
use App\Http\Controllers\Levels\LogicLevelsController;
use App\Http\Controllers\User\Skills\LogicUserSkillsController;
use App\Http\Controllers\User\ProgrammingLanguages\LogicUserProgramLangController;
use App\Http\Controllers\User\SocialsMedias\LogicSocialsMediasController;
use App\Http\Controllers\User\Educations\LogicEducationsController;
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

    Route::group(['prefix' => 'logic'],function (){
        /**
         * apis skill
         */
        Route::get('skills', [LogicSkillsController::class, "all"]);
        Route::get('skills/active', [LogicSkillsController::class, "getActive"]);
        Route::get('skills/{id}', [LogicSkillsController::class, "find"]);
        Route::post('skills', [LogicSkillsController::class, "create"]);
        Route::put('skills/{id}', [LogicSkillsController::class, "update"]);
        Route::patch('skills/{id}/status', [LogicSkillsController::class, "changeStatus"]);

        /**
         * apis Colors
         */
        Route::get('colors', [LogicColorsController::class, "all"]);
        Route::get('colors/active', [LogicColorsController::class, "getActive"]);
        Route::get('colors/{id}', [LogicColorsController::class, "find"]);
        Route::post('colors', [LogicColorsController::class, "create"]);
        Route::put('colors/{id}', [LogicColorsController::class, "update"]);
        Route::patch('colors/{id}/status', [LogicColorsController::class, "changeStatus"]);

        /**
         * apis Programming languages
         */
        Route::get('programming/languages', [LogicProgrammingLanguagesController::class, "all"]);
        Route::get('programming/languages/active', [LogicProgrammingLanguagesController::class, "getActive"]);
        Route::get('programming/languages/{id}', [LogicProgrammingLanguagesController::class, "find"]);
        Route::post('programming/languages', [LogicProgrammingLanguagesController::class, "create"]);
        Route::put('programming/languages/{id}', [LogicProgrammingLanguagesController::class, "update"]);
        Route::patch('programming/languages/{id}/status', [LogicProgrammingLanguagesController::class, "changeStatus"]);

        /**
         * apis Programming languages
         */
        Route::get('level', [LogicLevelsController::class, "all"]);
        Route::get('level/active', [LogicLevelsController::class, "getActive"]);
        Route::get('level/{id}', [LogicLevelsController::class, "find"]);
        Route::post('level', [LogicLevelsController::class, "create"]);
        Route::put('level/{id}', [LogicLevelsController::class, "update"]);
        Route::patch('level/{id}/status', [LogicLevelsController::class, "changeStatus"]);

        Route::group(['prefix' => 'user'],function (){
            /**
             * User skill
             */
            Route::get('skills', [LogicUserSkillsController::class, "all"]);
            Route::get('skills/{s_id}', [LogicUserSkillsController::class, "find"]);
            Route::post('skills', [LogicUserSkillsController::class, "create"]);
            Route::delete('skills/{s_id}', [LogicUserSkillsController::class, "remove"]);
            Route::patch('skills/{s_id}', [LogicUserSkillsController::class, "changeStatus"]);

            /**
             * apis user Programming languages
             */

            Route::get('programming/languages', [LogicUserProgramLangController::class, "all"]);
            Route::get('programming/languages/{s_id}', [LogicUserProgramLangController::class, "find"]);
            Route::post('programming/languages', [LogicUserProgramLangController::class, "create"]);
            Route::delete('programming/languages/{s_id}', [LogicUserProgramLangController::class, "remove"]);
            Route::patch('programming/languages/{s_id}', [LogicUserProgramLangController::class, "changeStatus"]);

            /**
             * apis user Social medias
             */
            Route::get('socials/medias', [LogicSocialsMediasController::class, "all"]);
            Route::get('socials/medias/{s_id}', [LogicSocialsMediasController::class, "find"]);
            Route::post('socials/medias', [LogicSocialsMediasController::class, "create"]);
            Route::put('socials/medias/{s_id}', [LogicSocialsMediasController::class, "update"]);
            Route::patch('socials/medias/{s_id}', [LogicSocialsMediasController::class, "changeStatus"]);

            /**
             * apis user educaction
             */
            Route::get('education', [LogicEducationsController::class, "all"]);
            Route::get('education/{s_id}', [LogicEducationsController::class, "find"]);
            Route::post('education', [LogicEducationsController::class, "create"]);
            Route::put('education/{s_id}', [LogicEducationsController::class, "update"]);
            Route::patch('education/{s_id}', [LogicEducationsController::class, "changeStatus"]);
        });
   });
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
