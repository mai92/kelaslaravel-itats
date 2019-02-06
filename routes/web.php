<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', function() {
   return view('admin', [
       'title' => 'Artikel 1'
   ]);
});

Route::get('/test', function() {
    return view('test', [
        'title' => 'Artikel Test'
    ]);
 });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('article/create', 'ArticleController@create')->name('article.create')->middleware('auth');
Route::post('article', 'ArticleController@store')->name('article.store');
