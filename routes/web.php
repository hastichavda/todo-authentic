<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('tasks', 'TaskController@index');
Route::post('tasks', 'TaskController@store');
Route::delete('tasks/{id}', 'TaskController@destroy');