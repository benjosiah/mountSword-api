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

Route::post('/article/post', 'App\Http\Controllers\ArticlesController@writeArticle');
Route::post('/article/edit/{article_id}', 'App\Http\Controllers\ArticlesController@editArticle');
Route::delete('/article/delete/{article_id}', 'App\Http\Controllers\ArticlesController@deleteArticle');
Route::get('/articles', 'App\Http\Controllers\ArticlesController@getArticles');
Route::get('/article/{article_id}', 'App\Http\Controllers\ArticlesController@getArticle');
Route::get('/article/{user_id}', 'App\Http\Controllers\ArticlesController@userArticles');