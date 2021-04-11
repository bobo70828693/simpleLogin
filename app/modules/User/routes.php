<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'UserController@index')->name('login');
Route::post('/login', 'UserController@login');
Route::post('/logout', 'UserController@logout');
Route::get('/register', 'UserController@register')->name('register');
Route::post('/doRegister', 'UserController@doRegister');
