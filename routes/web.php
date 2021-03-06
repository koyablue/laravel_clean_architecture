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

Auth::routes();
Route::group(['middleware' => ['auth']], function(){
    Route::get('/', 'MemoController@index')->name('index');
    Route::post('/create', 'MemoController@create')->name('create');
    Route::get('/show/{memoId}', 'MemoController@show')->name('show');
    Route::get('/edit/{memoId}', 'MemoController@edit')->name('edit');
    Route::post('/update/{memoId}', 'MemoController@update')->name('update');
    Route::post('/delete/{memoId}', 'MemoController@Delete')->name('delete');
});

