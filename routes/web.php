<?php
Route::get('/', 'RadioController@index');


Route::get('/admin', 'AdminController@index');
Route::post('/admin', 'AdminController@store');
Route::delete('/admin', 'AdminController@delete');
Route::get('/admin/create', 'AdminController@create');
 
Auth::routes();

Route::get('/home', 'HomeController@index');
