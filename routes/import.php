<?php

use App\Http\Controllers\Import\Sipuni\SipuniImportController;
use App\Http\Controllers\SipuniImportUsersController;
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

Route::prefix('sipuni')->group(function () {
    Route::get('/calls', SipuniImportController::class);
    Route::get('/users', SipuniImportUsersController::class);
});
