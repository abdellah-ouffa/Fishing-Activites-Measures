<?php

Auth::routes();

Route::get('/home', 'Admin\AdminController@index')->middleware('admin')->name('main');
Route::get('/', 'Admin\AdminController@index')->middleware('admin')->name('home');

// Auth routes
Route::get('login', 'Admin\AuthController@login')->name('login');
Route::post('login', 'Admin\AuthController@authenticate')->name('login');


// Administration area routes
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'admin'], function() {
    Route::resource('admins', 'AdminController');
    Route::resource('agents', 'AgentController');
    Route::resource('rules', 'RulesAdministrationController');
    Route::resource('infractions', 'InfractionController');
    Route::resource('fishes', 'FishController');
    Route::resource('measures', 'MeasureController');
    Route::resource('zones', 'ZoneController');
});
