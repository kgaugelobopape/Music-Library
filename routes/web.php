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

Route::get('/', ['as' => 'list', 'uses' => 'AlbumController@index']);
Route::get('/{id}/show', ['as' => 'show', 'uses' => 'AlbumController@show']);
Route::get('/create', ['as' => 'create', 'uses' => 'AlbumController@create']);
Route::post('/store', ['as' => 'store', 'uses' => 'AlbumController@store']);
Route::get('/{id}/edit', ['as' => 'edit', 'uses' => 'AlbumController@edit']);
Route::get('/{id}/destroy', ['as' => 'destroy', 'uses' => 'AlbumController@destroy']);
Route::put('/{id}/update', ['as' => 'update', 'uses' => 'AlbumController@update']);
Route::post('/review', ['as' => 'review', 'uses' => 'ReviewController@store']);
