<?php

use \App\Http\Controllers\PostsController;

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

Route::get('/posts', ['as' => 'all-posts', 'uses' => 'PostsController@index']);

Route::get('/posts/{id}', ['as' => 'single-post', 'uses' => 'PostsController@show']);