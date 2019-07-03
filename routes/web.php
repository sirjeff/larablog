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

    Route::get('auth/login', 'Auth\LoginController@showLoginForm');
    Route::post('auth/login', 'Auth\LoginController@login');
    Route::post('login', 'Auth\LoginController@login')->name('login');
    Route::get('login', 'Auth\LoginController@showLoginForm');
    Route::get('auth/logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);
    Route::get('auth/register', 'Auth\RegisterController@showRegistrationForm');
    Route::post('auth/register', 'Auth\RegisterController@register');

    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('auth.password.request');
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('auth.password.email');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset');

  	Route::get('blog/archives', 'BlogController@getArchives');
  	Route::get('blog/{slug}', ['as' => 'blog.single', 'uses' => 'BlogController@getSingle'])->where('slug', '[\w\d\-\_]+');
  	Route::get('about', 'PagesController@getAbout');
    Route::get('contact', 'PagesController@getContact');
    Route::post('contact', 'PagesController@postContact');
  	Route::get('about', 'PagesController@getAbout');
  	Route::get('/', 'PagesController@getIndex');
  	Route::get('/home', 'PagesController@getIndex');
  	Route::resource('posts', 'PostController');
  	Route::resource('categories', 'CategoryController', ['except' => ['create']]);
  	Route::resource('tags', 'TagController');
  	
    Route::post('comments/{post_id}', ['uses' => 'CommentsController@store', 'as' => 'comments.store']);
    Route::get('comments/{id}/edit', ['uses' => 'CommentsController@edit', 'as' => 'comments.edit']);
    Route::put('comments/{id}', ['uses' => 'CommentsController@update', 'as' => 'comments.update']);
    Route::delete('comments/{id}', ['uses' => 'CommentsController@destroy', 'as' => 'comments.destroy']);
    Route::get('comments/{id}/delete', ['uses' => 'CommentsController@delete', 'as' => 'comments.delete']);


