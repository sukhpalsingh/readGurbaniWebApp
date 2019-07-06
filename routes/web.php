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
Route::resource('videos/artists', 'ArtistController');

Route::resource('read', 'ReadController');
Route::resource('shabads', 'ShabadController');
Route::resource('pothis', 'PothiController');
Route::resource('pothis.sections', 'PothiSectionController');
Route::resource('sundar-gutka', 'SundarGutkaController');
Route::resource('sundar-gutka.shabads', 'SundarGutkaShabadController');

Route::resource('videos-manager', 'VideoManagerController');

// Route::resource('sundar-gutka-import', 'SundarGutkaImportController');

// Auth::routes();
// Authentication Routes...
$this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
$this->post('login', 'Auth\LoginController@login');
$this->post('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('learn', 'LearnController');
Route::resource('training-manager/courses', 'CourseManagerController');
Route::resource('training-manager/courses.lessons.videos', 'LessonVideoManagerController');
Route::resource('training-manager/courses.lessons', 'LessonManagerController');
Route::resource('training-manager', 'TrainingManagerController');

Route::middleware(['auth'])->group(function() {
    Route::resource('dashboard', 'DashboardController');
});
