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

//Authentication
Route::get('auth/login', 'Auth\LoginController@showLoginForm');
Route::post('auth/login', 'Auth\LoginController@login')->name('login');
Route::get('auth/logout', 'Auth\LoginController@logout');

//Registration routes
Route::get('auth/register', 'Auth\RegisterController@showRegistrationForm');
Route::post('auth/register', 'Auth\RegisterController@register');

//Homepage
Route::get('/', 'PostController@index')->name('index');

//Pages

//Slug URL Single Post
Route::get('/post/{slug}', ['as' => 'postSingle', 'uses' =>'PostController@postSingle'])
    ->where('slug', '[\w\d\-\_]+');


//Post CRUD
Route::get('/postcreate', 'PostController@postCreate')->name('postCreate');

Route::get('/poststore', 'PostController@postStore');

Route::post('/poststore', 'PostController@postStore')->name('postStore');

Route::get('/postsingle/{id}', 'PostController@postShow')->name('postShow');

Route::get('/postedit/{id}', 'PostController@postEdit')->name('postEdit');

Route::get('/posteupdate/{id}', 'PostController@postUpdate')->name('postUpdate');

Route::put('/posteupdate/{id}', 'PostController@postUpdate')->name('postUpdate');

Route::delete('/postdestroy/{id}', 'PostController@postDestroy')->name('postDestroy');