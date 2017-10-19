<?php
//文章列表
Route::get('/posts','\App\Http\Controllers\PostController@index');
//创建文章
Route::get('/posts/create','\App\Http\Controllers\PostController@create');
//文章页
Route::get('/posts/{post}','\App\Http\Controllers\PostController@show');

Route::post('/posts','\App\Http\Controllers\PostController@store');
//更新文章
Route::put('/posts/{post}','\App\Http\Controllers\PostController@update');
//编辑文章
Route::get('/posts/{post}/edit','\App\Http\Controllers\PostController@edit');
Route::get('/posts/delete','\App\Http\Controllers\PostController@delete');
