<?php

use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', [\App\Http\Controllers\Api\LoginController::class,'login']);

Route::post('ganga', [\App\Http\Controllers\Api\GangaController::class, 'store'])->middleware('auth:sanctum');

Route::middleware(['auth:sanctum', 'CheckGangaOwnership'])->group(function () {
    Route::put('ganga/{id}', [\App\Http\Controllers\Api\GangaController::class, 'update']);
    Route::delete('ganga/{id}', [\App\Http\Controllers\Api\GangaController::class, 'destroy']);
});

Route::apiResource('ganga', \App\Http\Controllers\Api\GangaController::class)->only(['index', 'show']);
