<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Mails\MailContactController;
use App\Http\Controllers\Portfolio\PortfolioController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', [PortfolioController::class, 'index']);
Route::get('/portfolio', [PortfolioController::class, 'index']);
Route::get('/portfolio/details', [PortfolioController::class, 'portfolioDetails']);

Route::post('mail/send', [MailContactController::class, 'send']);
