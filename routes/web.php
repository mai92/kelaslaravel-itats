<?php

Route::get('/', 'Frontend\\ArticleController@index')->name('homepage');

Route::get('/article/{id}', 'Frontend\\ArticleController@show')->name('frontend.article.show');
Route::post('/article/{id}', 'Frontend\\ArticleCommentController@store')->name('frontend.article.comment')->middleware('auth');
Route::get('article/{articleId}/comment/{commentId}/edit', 'Frontend\\ArticleCommentController@edit')->name('frontend.article.comment.edit')->middleware('auth');
Route::post('article/{articleId}/comment/{commentId}/edit', 'Frontend\\ArticleCommentController@update')->name('frontend.article.comment.update')->middleware('auth');


Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/user', 'UserController@index')->name('user.index');
Route::get('/user/{id}', 'UserController@show')->name('user.show');

// Route::get('article', 'ArticleController@index')->name('article.index')->middleware('auth');
// Route::get('article/create', 'ArticleController@create')->name('article.create')->middleware('auth');
// Route::get('article/{id}/edit', 'ArticleController@edit')->name('article.edit')->middleware('auth');
// Route::put('article/{id}/edit', 'ArticleController@update')->name('article.update')->middleware('auth');
// Route::post('article', 'ArticleController@store')->name('article.store');
// Route::delete('article/{id}/delete', 'ArticleController@destroy')->name('article.delete');
//
Route::resource('admin/article', 'ArticleController')->middleware('auth');
