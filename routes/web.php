<?php


Route::get('/', 'RoomController@index');
Route::get('booking/{id}', 'RoomController@booking')->name('booking.get');
Route::post('booking/{id}', 'RoomController@booking')->name('booking.post');


Auth::routes();

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'auth'], function (){
    Route::group(['prefix' => 'rooms', 'as' => 'rooms.'], function (){
        Route::get('/', 'Admin\\RoomController@index')->name('index');
        Route::get('/booking', 'Admin\\RoomController@booking_index')->name('booking.index');
        Route::get('/edit/{id}', 'Admin\\RoomController@edit')->name('edit');
        Route::get('/show/{id}', 'Admin\\RoomController@show')->name('show');
        Route::get('/create', 'Admin\\RoomController@create')->name('create');
        Route::post('/update/{id}', 'Admin\\RoomController@update')->name('update');
        Route::post('/store', 'Admin\\RoomController@store')->name('store');
    });

});

Route::get('/home', 'HomeController@index')->name('home');
