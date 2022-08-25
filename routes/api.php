<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\RegisterController;

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


Route::post('register', [RegisterController::class, 'register']);
Route::post('login', [RegisterController::class, 'login']);
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware(['auth:api', 'throttle:60,1'])->group(function () {



    Route::get('/category/{id}', 'API\Categories\CategoryController@show')->name('category.show');
    Route::get('/product/{id}', 'API\Products\ProductController@show')->name('product.show');


    Route::put('/category/{id}', 'API\Categories\CategoryController@edit')->name('category.edit');
    Route::put('/product/{id}', 'API\Products\ProductController@edit')->name('product.edit');


    Route::post('/category', 'API\Categories\CategoryController@store')->name('category.store');
    Route::post('/product', 'API\Products\ProductController@store')->name('product.store');

    Route::get('/category', 'API\Categories\CategoryController@index')->name('category.index');
    Route::get('/product', 'API\Products\ProductController@index')->name('product.index');
    //
});
