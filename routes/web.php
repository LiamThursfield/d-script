<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes([
    'confirm'   => false,
    'register'  => true,
    'reset'     => true,
    'verify'    => false
]);


// App Routes
Route::get('/', 'AppController@index')->name('home');


// Admin Routes
Route::group([
    'namespace'  => 'Admin',
    'middleware' => 'auth',
    'prefix'     => 'admin',
    'as'         => 'admin.'
],function () {
    Route::get('/', 'AdminController@index')->name('index');
    Route::get('/about', 'AdminController@about')->name('about');

    Route::resource('sites', 'SiteController');
    Route::get('/sites/{site}/script', 'SiteController@showScript')->name('sites.show-script');
});
