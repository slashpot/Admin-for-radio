<?php

Route::get('/admin', 'AdminController@index');
Route::post('/admin', 'AdminController@store');
Route::delete('/admin', 'AdminController@delete');
Route::get('/admin/create', 'AdminController@create');
 