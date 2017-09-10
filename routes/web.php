<?php

/********************************************SUTVARKYTA************************************************/

/********************************************RUOSIAMA************************************************/

/*Welcome puslapis */
Route::get('/', 'WelcomeController@getIndex');

/* Autentikacijos valdymas */
Auth::routes();

/* Prisijungusio userio puslapis */
Route::get('/home', 'HomeController@index')->name('home');
