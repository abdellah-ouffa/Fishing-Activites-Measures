<?php

Auth::routes();

Route::get('/home', 'Admin\AdminController@index')->middleware('admin')->name('main');
Route::get('/', 'Admin\AdminController@index')->middleware('admin')->name('home');

// Administration area routes
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'admin'], function() {
    Route::resource('admins', 'AdminController');
    Route::resource('rules', 'RulesAdministrationController');
});

Route::get('test', function () {
	$studyCases = App\Models\StudyCase::all();
    $studyCaseElements = App\Models\StudyCaseElement::all();

    foreach ($studyCaseElements as $key => $value) {
    	dump(optional($value->getContentBySudyCaseId(1))->content);
    }
});
