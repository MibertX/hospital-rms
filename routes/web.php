<?php
Route::group(['middleware' => ['auth', 'web']], function () {
	Route::get('patients', 'PatientController@index')->name('patients.all');
	Route::get('doctors', 'DoctorController@index')->name('doctors.all');

	Route::get('departments', 'DepartmentController@index')->name('departments.all');
	Route::get('departments/create', 'DepartmentController@create')->name('departments.create');
	Route::post('departments/store', 'DepartmentController@store')->name('departments.store');
	Route::get('departments/{department}/edit', 'DepartmentController@edit')->name('departments.edit');
	Route::post('departments/{department}/update', 'DepartmentController@update')->name('departments.update');
	Route::delete('departments/{department}/destroy', 'DepartmentController@destroy')->name('departments.destroy');

	Route::get('/', function () {
		return redirect()->route('patients.all');
	})->name('home');
});

Auth::routes();
