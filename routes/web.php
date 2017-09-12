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

/*Route::get('/', function () {
    return view('index');
});




Route::group (['middleware'=>'Auth'], function (){
    Route::get('/my/account', 'Controllers/AccountController@index')->name('account');
});*/

Route::group (['middleware'=>'guest'], function (){
    Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('/register', 'Auth\RegisterController@register');
});

Route::get('/', "PostsController@index");

Route::get('/posts/create',"PostsController@create");

Route::get('/posts/{post}', "PostsController@show");

Route::post('/post',"PostsController@store");

Route::get('/posts/{post}/edit', "PostsController@edit");

Route::patch('/posts/{post}', "PostsController@update");

Route::delete('/posts/{post}', "PostsController@destroy");

/*
 * GET /posts
 * GET /posts/create
 * POST /posts
 * GET /posts/{id}/edit
 * PATCH /posts/{id}
 * GET /posts/{id}
 * DELETE /posts/{ID}
 */