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
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', function () {
    return view('index');
});

Route::get('/products', 'ProductController@index');
Route::get('/products/show/{id}', 'ProductController@show');


Route::group(['middleware' => 'auth'], function(){

  //Product controler function
  Route::get('/products/create', 'ProductController@create');
  Route::get('/products/edit/{id}', 'ProductController@edit');
  Route::put('/products/update/{id}', 'ProductController@update');
  Route::delete('/products/destroy/{id}', 'ProductController@destroy');










});
