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

Route::get('testCon/{id}', 'TestController@hello');

// Route::get('tweets', function()
// {
// 	return Twitter::getSearch(['q' => 'dc', 'count' => 4]);
// });

Route::get('testmap', 'TestController@index');

Route::get('getTweets/{cityName}', 'TestController@getTweets');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
