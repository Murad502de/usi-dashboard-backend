<?php

use App\Http\Controllers\Api\SipuniCallsController;
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

Route::get('/users', [SipuniCallsController::class, 'users']);
Route::get('/users/calls', [SipuniCallsController::class, 'usersCalls']);

Route::get('/users/{id}', [SipuniCallsController::class, 'usersId']);
Route::get('/users/{id}/calls', [SipuniCallsController::class, 'usersIdCalls']);
