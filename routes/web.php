<?php

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/addresses', 'AddressController');
Route::resource('/contacts', 'ContactController');
Route::resource('/contact-extras', 'ContactExtraController');

// Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
