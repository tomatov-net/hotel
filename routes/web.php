<?php

#Страница «Список номеров»:
Route::get('/', 'RoomController@index');

#Страница бронирования
Route::get('booking/{id}', 'RoomController@booking')->name('booking.get');

Route::post('booking/{id}', 'RoomController@booking')->name('booking.post');


Auth::routes();

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'auth'], function (){
    Route::group(['prefix' => 'rooms', 'as' => 'rooms.'], function (){
        #Страница «Справочник номеров гостиницы»
        Route::get('/', 'Admin\\RoomController@index')->name('index');

        #Страница «Список забронированных номеров»
        Route::get('/booking', 'Admin\\RoomController@booking_index')->name('booking.index');

        #Страница «Справочник номеров гостиницы (редактирование)»
        Route::get('/edit/{id}', 'Admin\\RoomController@edit')->name('edit');

        #Страница просмотра номера
        Route::get('/show/{id}', 'Admin\\RoomController@show')->name('show');

        Route::get('/create', 'Admin\\RoomController@create')->name('create');
        Route::post('/update/{id}', 'Admin\\RoomController@update')->name('update');
        Route::post('/store', 'Admin\\RoomController@store')->name('store');
    });

});
