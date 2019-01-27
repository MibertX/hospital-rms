<?php
Route::get('/', function () {
    return view('welcome');
    Route::group(['prefix' => 'admin', 'middleware' => ['web', 'auth']], function () {
        Route::get('/', function () {
            return redirect()->route('vanilo.order.index');
        })->name('admin.dashboard');
    });
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
