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

Route::resource('/', 'PostsController');
Route::get('/post/{id}', 'PostsController@show');
Route::get('/delete/{id}', 'PostsController@destroy');
Route::get('/post/{id}/edit', 'PostsController@edit');
Route::delete('delete/{id}', [
    'uses' => 'PostsController@destroy',
    'as' => 'delete.route'
]);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

