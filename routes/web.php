<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'ArticleController@viewArticleList');
Route::get('/article/add', 'ArticleController@viewAddArticle');
Route::get('/article/view/{id}', 'ArticleController@viewArticle');
Route::get('/article/edit/{id}', 'ArticleController@viewEditArticle');
Route::get('/article/delete/{id}', 'ArticleController@viewDeleteArticle');

Route::post('/article/addArticle', 'ArticleController@addArticle');
Route::post('/article/editArticle', 'ArticleController@editArticle');
Route::post('/article/deleteArticle', 'ArticleController@deleteArticle');

Auth::routes();
