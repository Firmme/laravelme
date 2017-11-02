<?php

//用户模块
Route::get('/', function () {
    return redirect("/login");
});
//注册页面
Route::get('/register', '\App\Http\Controllers\RegisterController@index');
//注册行为
Route::post('/register', '\App\Http\Controllers\RegisterController@register');
//登录页面
Route::get('/login', '\App\Http\Controllers\LoginController@index');
//登录行为
Route::post('/login', '\App\Http\Controllers\LoginController@login');

ROute::group(['middleware' => 'auth:web'], function () {
    //文章列表
    Route::get('/posts', '\App\Http\Controllers\PostController@index');
    //创建文章
    Route::get('/posts/create', '\App\Http\Controllers\PostController@create');
    Route::get('/posts/search', '\App\Http\Controllers\PostController@search');
    //文章页
    Route::get('/posts/{post}', '\App\Http\Controllers\PostController@show');
    //文章保存
    Route::post('/posts', '\App\Http\Controllers\PostController@store');
    //更新文章
    Route::put('/posts/{post}', '\App\Http\Controllers\PostController@update');
    //编辑文章
    Route::get('/posts/{post}/edit', '\App\Http\Controllers\PostController@edit');
    Route::get('/posts/{post}/delete', '\App\Http\Controllers\PostController@delete');
    //图片上传
    Route::post('/posts/image/upload', '\App\Http\Controllers\PostController@imageUpload');
    //登出行为
    Route::get('/logout', '\App\Http\Controllers\LoginController@logout');
    //个人设置页面
    Route::get('/user/{user}/setting', '\App\Http\Controllers\UserController@setting');
    //个人设置行为
    Route::post('/user/me/setting', '\App\Http\Controllers\UserController@settingStore');
    Route::post('/posts/{post}/comment', '\App\Http\Controllers\PostController@comment');
    Route::get('/posts/{post}/zan', '\App\Http\Controllers\PostController@zan');
    Route::get('/posts/{post}/unzan', '\App\Http\Controllers\PostController@unzan');
    Route::get('/user/{user}', '\App\Http\Controllers\UserController@profile');
    Route::get('/user/{user}/fan', '\App\Http\Controllers\UserController@fan');
    Route::get('/user/{user}/unfan', '\App\Http\Controllers\UserController@unfan');

});

