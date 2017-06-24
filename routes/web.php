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

// General routes
Auth::routes();

// Mainstage routes
Route::get('/', 'HomeController@index')->name('home');

Route::get('build/{build}', 'BuildController@show')->name('showBuild');

Route::get('milestones', 'MilestoneController@index')->name('milestones');

Route::get('rings', 'RingController@index')->name('rings');

Route::get('year', 'YearController@index')->name('year');

Route::get('settings', 'SettingsController@index')->name('settings');
Route::get('privacy', 'PrivacyController@index')->name('privacy');
Route::get('about', 'AboutController@index')->name('about');

// Backstage routes
Route::get('backstage', 'BackstageController@index')->name('backstage');

Route::get('backstage/builds', 'BuildController@index')->name('managBuild');
Route::get('backstage/builds/create', 'BuildController@create')->name('createBuild');
Route::get('backstage/builds/{build}', 'BuildController@edit')->name('editBuild');
Route::get('backstage/builds/delete/{build}', 'BuildController@delete')->name('deleteBuild');
Route::post('backstage/builds', 'BuildController@store')->name('storeBuild');
Route::patch('backstage/builds', 'BuildController@patch')->name('patchBuild');
Route::delete('backstage/builds', 'BuildController@destroy')->name('destroyBuild');

Route::get('backstage/releases', 'ReleaseController@index')->name('manageRelease');

Route::get('backstage/milestones', 'MilestoneController@index')->name('manageMilestone');

Route::get('backstage/stats', 'StatsController@index')->name('manageStat');
