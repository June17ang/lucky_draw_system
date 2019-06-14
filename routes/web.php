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
//     return view('welcome');
// });

Auth::routes(['register' => false]);


Route::get('/', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'web']], function(){
    Route::get('/draw/create', 'AdminController@create')->name('admin.draw.index');
    Route::post('/draw/insert', 'AdminController@store')->name('admin.draw.insert');
});

Route::group(['prefix' => 'member', 'middleware' => ['auth', 'web']], function(){
    Route::get('/number/create', 'MemberController@create')->name('member.create.winning_number');
    Route::post('/number/insert', 'MemberController@store')->name('member.store.winning_number');
});