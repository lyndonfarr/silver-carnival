<?php

Route::get('/', function () {
    return view('home');
});

Route::resource('/addresses', 'AddressController');
Route::resource('/contacts', 'ContactController');
Route::resource('/contact-extras', 'ContactExtraController');
Route::resource('/events', 'EventController');