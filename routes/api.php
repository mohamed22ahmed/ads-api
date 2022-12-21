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

Route::controller(\App\Http\Controllers\Api\CategoriesController::class)
    ->prefix('categories')
    ->name('categories.')
    ->group(function(){
        Route::get('/', 'index')->name('index');
        Route::get('/{id}', 'show')->name('show');
        Route::post('/store', 'store')->name('store');
        Route::put('/update/{id}', 'update')->name('update');
        Route::delete('/destroy/{id}', 'destroy')->name('destroy');

    });

Route::controller(\App\Http\Controllers\Api\TagsController::class)
    ->prefix('tags')
    ->name('tags.')
    ->group(function(){
        Route::get('/', 'index')->name('index');
        Route::get('/{id}', 'show')->name('show');
        Route::post('/store', 'store')->name('store');
        Route::put('/update/{id}', 'update')->name('update');
        Route::delete('/destroy/{id}', 'destroy')->name('destroy');

    });

Route::controller(\App\Http\Controllers\Api\AdsController::class)
    ->prefix('ads')
    ->name('ads.')
    ->group(function(){
        Route::get('/', 'index')->name('index');
        Route::get('/{id}', 'show')->name('show');
        Route::post('/store', 'store')->name('store');
        Route::put('/update/{id}', 'update')->name('update');
        Route::delete('/destroy/{id}', 'destroy')->name('destroy');

        // get ads by its tags and categories(filtering)
        Route::get('/category/{id}', 'getByCategory')->name('getByCategory');
        Route::get('/tag/{id}', 'getByTag')->name('getByTag');
    });

Route::controller(\App\Http\Controllers\Api\AdvertisersController::class)
    ->prefix('advertisers')
    ->name('advertisers.')
    ->group(function(){
        Route::get('/', 'index')->name('index');
        Route::get('/{id}', 'show')->name('show');
        Route::post('/store', 'store')->name('store');
        Route::put('/update/{id}', 'update')->name('update');
        Route::delete('/destroy/{id}', 'destroy')->name('destroy');

    });
