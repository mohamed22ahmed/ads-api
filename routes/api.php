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

Route::get('/categories', [\App\Http\Controllers\Api\CategoriesController::class, 'index']);
Route::get('/categories/{id}', [\App\Http\Controllers\Api\CategoriesController::class, 'show']);
Route::post('/categories/store', [\App\Http\Controllers\Api\CategoriesController::class, 'store']);
Route::put('/categories/update/{id}', [\App\Http\Controllers\Api\CategoriesController::class, 'update']);
Route::delete('/categories/delete/{id}', [\App\Http\Controllers\Api\CategoriesController::class, 'destroy']);
