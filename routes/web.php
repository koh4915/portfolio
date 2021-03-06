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

Route::get('/','PostsController@index');

// ユーザ登録
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

// ログイン認証
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');

// ユーザ機能
Route::group(['middleware' => ['auth']], function () {
    Route::resource('users', 'UsersController', ['only' => ['index', 'show']]);
    
    Route::group(['prefix' => 'users/{id}'], function() {
        // フォロー・アンフォロー
        Route::post('follow' , 'UserFollowController@store')->name('user.follow');
        Route::delete('unfollow' , 'UserFollowController@destroy')->name('user.unfollow');
        
        // フォロー・フォロワー一覧表示
        Route::get('followings' , 'UsersController@followings')->name('users.followings');
        Route::get('followers' , 'UsersController@followers')->name('users.followers');
    });

    Route::post('posts' , 'PostsController@store')->name('posts.store');
    Route::post('posts/update' , 'PostsController@update')->name('posts.update');
    Route::delete('posts/{date}/{user}' , 'PostsController@destroy')->name('posts.destroy');
    // 補助ページ
    Route::get('posts/create' , 'PostsController@create')->name('posts.create');
    Route::get('posts/{date}/{user}/edit' , 'PostsController@edit')->name('posts.edit');
});
