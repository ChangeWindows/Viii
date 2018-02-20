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
Route::get('/', 'TimelineController@index')->name('home');

Route::get('build/{build}', 'ReleaseController@index')->name('build');

Route::get('milestones', 'MilestoneController@index')->name('milestones');

Route::get('rings', 'RingController@index')->name('rings');

Route::get('year', 'YearController@index')->name('year');

Route::get('about', 'AboutController@index')->name('about');
Route::get('privacy', 'AboutController@privacy')->name('privacy');

// Backstage routes
Route::get('backstage', 'BackstageController@index')->name('manageHome');

Route::get('backstage/builds', 'BuildController@index')->name('manageBuild');
Route::get('backstage/builds/{build}', 'BuildController@show')->name('showBuild');
Route::get('backstage/builds/edit/{build}', 'BuildController@edit')->name('editBuild');
Route::get('backstage/builds/delete/{build}', 'BuildController@delete')->name('deleteBuild');
Route::patch('backstage/builds/promoteNow/{build}', 'BuildController@promoteNow')->name('promoteBuildNow');
Route::post('backstage/builds', 'BuildController@store')->name('storeBuild');
Route::patch('backstage/builds', 'BuildController@patch')->name('patchBuild');
Route::delete('backstage/builds', 'BuildController@destroy')->name('destroyBuild');

Route::get('backstage/milestones', 'MilestoneController@index')->name('manageMilestone');
Route::get('backstage/milestones/{milestone}', 'MilestoneController@edit')->name('editMilestone');
Route::get('backstage/milestones/delete/{milestone}', 'MilestoneController@delete')->name('deleteMilestone');
Route::post('backstage/milestones', 'MilestoneController@store')->name('storeMilestone');
Route::patch('backstage/milestones', 'MilestoneController@patch')->name('patchMilestone');
Route::delete('backstage/milestones', 'MilestoneController@destroy')->name('destroyMilestone');

Route::get('backstage/settings', 'BackstageController@settings')->name('manageSettings');