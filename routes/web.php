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



Auth::routes();

Route::post('/tasks','ProjectController@store');
Route::patch('/tasks/{task}','ProjectController@store');

Route::match(['get', 'post'],'/sendemail', 'SendEmailController@index')->name('sendemail');
Route::post('/sendemail/send', 'SendEmailController@send');



Route::get('/start', 'OrderController@start');
Route::get('/ship', 'OrderController@ship');
Route::get('/complete', 'OrderController@complete');





Route::get('/home', 'HomeController@index')->name('home');


Route::post('/create','PostController@store')->name('post.store');


Route::get('/create','PostController@create')->name('post.create')->middleware('role:writer');
Route::get('/post','PostController@show')->name('post.show');
Route::get('/edit/{id}','PostController@edit')->name('post.edit');
Route::get('/delete/{id}','PostController@destroy')->name('delete')->middleware('role:delete');
Route::match(['get', 'post'],'/description/{id}','PostController@showdescription')->name('showdescription');

Route::match(['get', 'post'],'/update/{id}','PostController@update')->name('post.update');
Route::post('/post','PostController@search')->name('search');
