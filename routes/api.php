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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// List the articles
Route::get('articles', 'ArticleController@index');

// Show an article
Route::get('article/{id}', 'ArticleController@show');

// Store an article
Route::post('article', 'ArticleController@store');

// Update an article
Route::put('articles/{id}', 'ArticleController@update');

// Delete an article
Route::delete('articles/{id}', 'ArticleController@destroy');