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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::group(['namespace' => 'Frontend'], function () {

    Route::get('login', 'SiteController@login')->name('site.login');
    Route::post('login-store', 'SiteController@loginStore')->name('site.login-store');
    Route::get('register', 'SiteController@register')->name('site.register');
    Route::post('register-store', 'SiteController@registerStore')->name('site.register-store');

    Route::group(['middleware' => 'check.login'], function () {
        Route::get('logout', 'SiteController@logout')->name('site.logout');
        Route::get('/', 'MainController@index')->name('index');
        Route::get('chat', 'ChatController@index')->name('chat.index');
        Route::post('main/like', 'MainController@like')->name('main.like');
        Route::get('comment/index', 'CommentController@index')->name('comment.index');
        Route::post('comment/store', 'CommentController@store')->name('comment.store');
        Route::get('publish', 'PublishController@index')->name('publish.index');
    });
});

//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
