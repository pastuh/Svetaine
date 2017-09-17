<?php

/******************************************************************************************************/
/********************************************SUTVARKYTA************************************************/
/* WELCOME puslapis */
Route::get('/', 'PagesController@getIndex');
Route::get('error', 'PagesController@getError')->name('error.403');

/* Svarbiausia autentikacija */
Route::get('steamlink', 'AuthController@redirectToSteam')->name('link.steam');
Route::get('steamloged', 'AuthController@handle')->name('steam.handle');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
Auth::routes();

/* DEFAULT kad galetu uzeiti i Dashboard */
Route::prefix('manage')->middleware('auth')->group(function () {
    Route::get('/', 'ManageController@index');
    Route::get('/dashboard', 'ManageController@dashboard')->name('manage.dashboard');
});

/* USER valdymas */
Route::prefix('manage')->middleware('role:superadministrator|administrator')->group(function () {
    Route::resource('/users', 'UserController');
});

Route::prefix('manage')->middleware('role:superadministrator')->group(function () {
    /* PERMISSIONS valdymas */
    Route::resource('permissions', 'PermissionController', ['except' => ['destroy']]);
    /* ROLES valdymas */
    Route::resource('roles', 'RoleController', ['except' => ['destroy']]);
});

/* Perziura visiems, bet valdymas tik adminams */
/*-----------------------------------------------*/
/* IRAŠŲ valdymas */
Route::resource('posts', 'PostController');

/* TAGU valdymas */
Route::get('tags/{slug}', 'TagController@getSingle')->name('tags.slug')->where('slug', '[\w\d\-\_]+');
Route::resource('tags', 'TagController', ['except' => ['create']]);

/* KATEGORIJU valdymas */
Route::get('categories/{slug}', 'CategoryController@getSingle')->name('categories.slug')->where('slug', '[\w\d\-\_]+');
Route::resource('categories', 'CategoryController', ['except' => ['create']]);

/* BLOG valdymas */
Route::get('blog/{slug}','BlogController@getSingle')->name('blog.slug')->where('slug', '[\w\d\-\_]+');
Route::get('blog','BlogController@getIndex')->name('blog.index');

Route::group(['middleware' => ['auth']], function () {
    /* KOMENTARU valdymas */
    Route::post('comments/{post_id}', 'CommentsController@store')->name('comments.store');
    Route::get('comments/{post_id}/edit', 'CommentsController@edit')->name('comments.edit');
    Route::put('comments/{post_id}', 'CommentsController@update')->name('comments.update');
    Route::delete('comments/{post_id}', 'CommentsController@destroy')->name('comments.destroy');
});

/* CONTACTS valdymas */
Route::get('contact', 'PagesController@getContact')->name('contact.index')->middleware('auth');
Route::post('contact', 'PagesController@postContact')->name('contact.store')->middleware('auth');

/* PROFILE valdymas */
Route::get('/profile', function () {
    return view('pages.profile');
})->name('profile')->middleware('auth');

/******************************************************************************************************/
/*****************************************REIKIA TVARKYTI**********************************************/

Route::resource('video', 'VideoController');


/*
 * Route::get('trophies', function () {
    return view('pages.trophies');
});
*/

Route::get('trophies/single', function () {
    return view('trophies.single');
})->name('trophies.single');

/*
Route::get('locations', function () {
    return view('pages.locations');
});
*/

/* Gal suristi Steam naujienas su blog */
/*
 * Route::get('news', function () {
    return view('pages.news');
});
*/

Route::get('info', function () {
    return view('pages.info');
});
