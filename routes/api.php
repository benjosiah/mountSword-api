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
Route::prefix('article')->group(function(){
    Route::post('/post', 'App\Http\Controllers\ArticlesController@writeArticle');
    Route::post('/edit/{article_id}', 'App\Http\Controllers\ArticlesController@editArticle');
    Route::delete('/delete/{article_id}', 'App\Http\Controllers\ArticlesController@deleteArticle');
    Route::get('/', 'App\Http\Controllers\ArticlesController@getArticles');
    Route::get('/{article_id}', 'App\Http\Controllers\ArticlesController@getArticle');
    Route::get('/{user_id}', 'App\Http\Controllers\ArticlesController@userArticles');
});

Route::prefix('comment')->group(function(){
    Route::post('/post/{article_id}', 'App\Http\Controllers\CommentController@writeComment');
    Route::post('/edit/{comment_id}', 'App\Http\Controllers\CommentController@editComment');
    Route::delete('/delete/{comment_id}', 'App\Http\Controllers\CommentController@deleteComment');
    Route::get('/all/{article_id}', 'App\Http\Controllers\CommentController@getComments');
    Route::get('/{comment_id}', 'App\Http\Controllers\CommentController@getComment');
    Route::get('/{user_id}', 'App\Http\Controllers\CommentController@userComments');
});

