<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::group(['prefix' => 'progress', 'middleware' => 'auth'], function(){
    Route::get('index', 'ProgressController@index')->name('progress.index');
    Route::get('create', 'ProgressController@create')->name('progress.create');
    Route::post('store', 'ProgressController@store')->name('progress.store');
    Route::get('show/{id}', 'ProgressController@show')->name('progress.show');
    Route::get('edit/{id}', 'ProgressController@edit')->name('progress.edit');
    Route::post('update/{id}', 'ProgressController@update')->name('progress.update');
    Route::post('destroy/{id}', 'ProgressController@destroy')->name('progress.destroy');
});


