<?php

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('article', 'ArticleController@index')->name('article.index')->middleware('auth');
Route::get('article/create', 'ArticleController@create')->name('article.create')->middleware('auth');
Route::get('article/{id}/edit', 'ArticleController@edit')->name('article.edit')->middleware('auth');
Route::put('article/{id}/edit', 'ArticleController@update')->name('article.update')->middleware('auth');
Route::post('article', 'ArticleController@store')->name('article.store');
// Route::get('article/{id}/delete', 'ArticleController@destroy')->name('article.delete');
