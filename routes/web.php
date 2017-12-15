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

use Illuminate\Support\Facades\Route;

Route::get('/', 'PostController@index')->name('homepage');

//Post CRUD
Route::get('/postcreate', 'PostController@postCreate')->name('postCreate');

Route::get('/poststore', 'PostController@postStore');

Route::post('/poststore', 'PostController@postStore')->name('postStore');
