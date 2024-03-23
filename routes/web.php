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

Route::get('/', function () {
     return view('welcome');
 });
//Route::get('/home', 'HomeController@index')->name('home');

//Auth::routes();


//ログアウト中のページ
Route::get('/login', 'Auth\LoginController@login')->name('login');
Route::post('/login', 'Auth\LoginController@login');

Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register', 'Auth\RegisterController@register');

Route::get('/added', 'Auth\RegisterController@added');
Route::post('/added', 'Auth\RegisterController@added');

//ログイン中のページ
Route::get('/top','PostsController@index')->middleware('auth');
Route::post('/createpost','PostsController@postCreate')->middleware('auth');
Route::post('/post/{id}/update','PostsController@postUpdate')->middleware('auth');
Route::get('/post/{id}/delete','PostsController@delete')->middleware('auth');

Route::get('/profile','UsersController@profile')->middleware('auth');

//↓検索ページ
Route::get('/search','UsersController@search')->middleware('auth');
Route::post('/search','UsersController@search')->middleware('auth');
//Route::post('/searching','UsersController@searching')->middleware('auth');

//フォローするしない
Route::post('/users/{user}/follow','FollowsController@follow')->name('follow')->middleware('auth');
Route::delete('/users/{user}/unfollow','FollowsController@unfollow')->name('unfollow')->middleware('auth');

//フォローリスト、フォロワーリスト
Route::get('/followList','FollowsController@followList')->middleware('auth');
Route::get('/followerList','FollowsController@followerList')->middleware('auth');

//プロフィール
Route::get('/profile','UsersController@profile');//プロフィール画面を表示させる
Route::post('/profileupdate','UsersController@profileupdate');//プロフィール更新押したあとの処理

//他の人のプロフィール
Route::get('/users/{id}/userProfile','UsersController@userProfile');

//ログアウトを行う
Route::get('/logout','Auth\LoginController@logout')->middleware('auth');
