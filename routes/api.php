<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiController;
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
Route::post('login', [ApiController::class, 'login']);
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('logout', [ApiController::class, 'logout']);
    Route::get('staff-list', [ApiController::class, 'staffList']); 
    Route::get('attendance', [ApiController::class, 'attendance']);   
});
