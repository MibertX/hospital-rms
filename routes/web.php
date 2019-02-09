<?php
Route::group(['middleware' => ['auth', 'web']], function () {
	Route::get('patients', 'PatientController@index')->name('patients.all');
	Route::get('patients/create', 'PatientController@create')->name('patients.create');
	Route::post('patients/store', 'PatientController@store')->name('patients.store');
	Route::get('patients/{patient}', 'PatientController@show')->name('patients.show');
	Route::get('patients/{patient}/edit', 'PatientController@edit')->name('patients.edit');
	Route::post('patients/{patient}/update', 'PatientController@update')->name('patients.update');
	Route::post('patients/{patient}/status/update', 'PatientController@updateStatus')->name('patients.status.update');
	Route::delete('patients/{patient}/destroy', 'PatientController@destroy')->name('patients.destroy');

	Route::get('doctors', 'DoctorController@index')->name('doctors.all');
	Route::get('doctors/create', 'DoctorController@create')->name('doctors.create');
	Route::post('doctors/store', 'DoctorController@store')->name('doctors.store');
	Route::get('doctors/{doctor}', 'DoctorController@show')->name('doctors.show');
	Route::get('doctors/{doctor}/edit', 'DoctorController@edit')->name('doctors.edit');
	Route::post('doctors/{doctor}/update', 'DoctorController@update')->name('doctors.update');
	Route::post('doctors/{doctor}/status/update', 'DoctorController@updateStatus')->name('doctors.status.update');
	Route::delete('doctors/{doctor}/destroy', 'DoctorController@destroy')->name('doctors.destroy');

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
