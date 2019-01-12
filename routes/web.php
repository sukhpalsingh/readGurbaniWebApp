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

Route::get('/', function () {
    return view('home');
});

Route::resource('videos', 'VideoController');

Route::resource('read', 'ReadController');
Route::resource('shabads', 'ShabadController');
Route::resource('pothis', 'PothiController');
Route::resource('pothis.sections', 'PothiSectionController');

Route::resource('audios', 'AudioController');

Route::resource('videos-manager', 'VideoManagerController');
