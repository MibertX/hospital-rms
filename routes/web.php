<?php
Route::group(['middleware' => ['web', 'auth']], function () {
	Route::get('patients', 'PatientController@index')->name('patients.all');
	Route::get('doctors', 'DoctorController@index')->name('doctors.all');

	Route::get('/', function () {
		return redirect()->route('patients.all');
	})->name('home');
});

Auth::routes();
