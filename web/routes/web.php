<?php

Auth::routes();

Route::get('/', 'Admin\AdminController@index')->middleware('admin')->name('home');

// Administration area routes
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'admin'], function() {
    Route::resource('admins', 'AdminController');
});

// Shared Routes
Route::group(['namespace' => 'Shared'], function() {
	Route::get('profile', 'SharedController@profile')->name('shared.profile');
});

