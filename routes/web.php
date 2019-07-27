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

Route::resource('videos', 'VideoController', ['only' => ['index', 'show']]);
Route::resource('artists.videos', 'ArtistVideoController', ['only' => ['index']]);

Route::resource('read', 'ReadController', ['only' => ['index']]);
Route::resource('shabads', 'ShabadController', ['only' => ['show']]);
Route::resource('pothis', 'PothiController', ['only' => ['index']]);
Route::resource('pothis.sections', 'PothiSectionController', ['only' => ['index', 'show']]);
Route::resource('sundar-gutka', 'SundarGutkaController', ['only' => ['index']]);
Route::resource('sundar-gutka.shabads', 'SundarGutkaShabadController', ['only' => ['show']]);

// Auth::routes();
// Authentication Routes...
$this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
$this->post('login', 'Auth\LoginController@login');
$this->post('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth'])->group(function() {
    Route::resource('dashboard', 'DashboardController', ['only' => 'index']);
    Route::resource('dashboard/analytics/requests', 'RequestController', ['only' => 'index']);

    Route::resource('dashboard/albums-manager', 'AlbumManagerController');

    Route::resource('learn', 'LearnController');
    Route::resource('training-manager/courses', 'CourseManagerController');
    Route::resource('training-manager/courses.lessons.videos', 'LessonVideoManagerController');
    Route::resource('training-manager/courses.lessons', 'LessonManagerController');
    Route::resource('training-manager', 'TrainingManagerController');

    Route::resource('videos-manager', 'VideoManagerController');
    // Route::resource('sundar-gutka-import', 'SundarGutkaImportController');
});
