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

Route::get('/twitter', 'TwitterController@index')->name('add_hashtag');
Route::post('/twitter','TwitterController@store_hashtag')->name('store_hashtag');

Route::get('/twitter/list', 'TwitterController@listAll');

Route::get('twitter/following','TwitterController@follow');

Route::get('twitter/autorun', 'TwitterController@autoRun');