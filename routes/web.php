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
Route::get('auth/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('auth/login', 'Auth\LoginController@login');
Route::get('auth/logout', 'Auth\LoginController@logout')->name('logout');

//Registration
Route::get('auth/register', 'Auth\RegisterController@showRegistrationForm');
Route::post('auth/register', 'Auth\RegisterController@register');

//Password reset
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

//Homepage
Route::get('/', 'PagesController@index')->name('index');

//Pages


//Slug URL Single Post
Route::get('/post/{slug}', ['as' => 'postSingle', 'uses' =>'PagesController@postSingle'])
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