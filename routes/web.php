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

Route::get('privacy', 'PrivacyController@index')->name('privacy');
Route::get('about', 'AboutController@index')->name('about');

// Backstage routes
Route::get('backstage', 'BuildController@index')->name('manageBuild');
Route::get('backstage/builds/create', 'BuildController@create')->name('createBuild');
Route::get('backstage/builds/{build}', 'BuildController@show')->name('showBuild');
Route::get('backstage/builds/edit/{build}', 'BuildController@edit')->name('editBuild');
Route::get('backstage/builds/delete/{build}', 'BuildController@delete')->name('deleteBuild');
Route::post('backstage/builds', 'BuildController@store')->name('storeBuild');
Route::patch('backstage/builds', 'BuildController@patch')->name('patchBuild');
Route::delete('backstage/builds', 'BuildController@destroy')->name('destroyBuild');

Route::get('backstage/deltas', 'DeltaController@index')->name('manageDelta');
Route::get('backstage/deltas/create/{build}', 'DeltaController@create')->name('createDelta');
Route::get('backstage/deltas/{delta}', 'DeltaController@edit')->name('editDelta');
Route::get('backstage/deltas/delete/{delta}', 'DeltaController@delete')->name('deleteDelta');
Route::get('backstage/deltas/promote/{flight}', 'DeltaController@promote')->name('promoteDelta');
Route::post('backstage/deltas', 'DeltaController@store')->name('storeDelta');
Route::patch('backstage/deltas', 'DeltaController@patch')->name('patchDelta');
Route::delete('backstage/deltas', 'DeltaController@destroy')->name('destroyDelta');

Route::get('backstage/milestones', 'MilestoneController@index')->name('manageMilestone');
Route::get('backstage/milestones/create', 'MilestoneController@create')->name('createMilestone');
Route::get('backstage/milestones/{milestone}', 'MilestoneController@edit')->name('editMilestone');
Route::get('backstage/milestones/delete/{milestone}', 'MilestoneController@delete')->name('deleteMilestone');
Route::post('backstage/milestones', 'MilestoneController@store')->name('storeMilestone');
Route::patch('backstage/milestones', 'MilestoneController@patch')->name('patchMilestone');
Route::delete('backstage/milestones', 'MilestoneController@destroy')->name('destroyMilestone');