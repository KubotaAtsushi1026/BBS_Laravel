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

// Route::get('/', function () {
//     return view('hello');
// });
// プレビューした瞬間に選択する道を指定
Route::get('/', 'MessagesController@index');
//MessagesControllerの７つのアクションに至る道筋を自動生成
Route::resource('messages', 'MessagesController');

