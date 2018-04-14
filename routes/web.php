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

Route::get('/', function () {
    return view('welcome');
});

Route::get('posts','PostsController@index')->name('posts.index');

Route::get('posts/create', 'PostsController@create')->name('posts.create');

Route::post('posts', 'PostsController@store');

Route::get('posts/{id}/edit', 'PostsController@edit')->name('posts.edit');

Route::get('posts/{id}', 'PostsController@show')->name('posts.show');

Route::post('posts/{id}', 'PostsController@update')->name('posts.update');

//Route::post('posts/delete', 'PostsController@delete')->name('posts.delete');