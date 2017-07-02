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

Route::get('backstage/builds', 'BuildController@index')->name('manageBuild');
Route::get('backstage/builds/create', 'BuildController@create')->name('createBuild');
Route::get('backstage/builds/{build}', 'BuildController@show')->name('showBuild');
Route::get('backstage/builds/edit/{build}', 'BuildController@edit')->name('editBuild');
Route::get('backstage/builds/delete/{build}', 'BuildController@delete')->name('deleteBuild');
Route::post('backstage/builds', 'BuildController@store')->name('storeBuild');
Route::patch('backstage/builds', 'BuildController@patch')->name('patchBuild');
Route::delete('backstage/builds', 'BuildController@destroy')->name('destroyBuild');

Route::get('backstage/releases', 'ReleaseController@index')->name('manageRelease');
Route::get('backstage/releases/create/{build}', 'ReleaseController@create')->name('createRelease');
Route::get('backstage/releases/{release}', 'ReleaseController@edit')->name('editRelease');
Route::get('backstage/releases/delete/{release}', 'ReleaseController@delete')->name('deleteRelease');
Route::get('backstage/releases/promote/{release}', 'ReleaseController@promote')->name('promoteRelease');
Route::post('backstage/releases', 'ReleaseController@store')->name('storeRelease');
Route::patch('backstage/releases', 'ReleaseController@patch')->name('patchRelease');
Route::delete('backstage/releases', 'ReleaseController@destroy')->name('destroyRelease');

Route::get('backstage/milestones', 'MilestoneController@index')->name('manageMilestone');
Route::get('backstage/milestones/create', 'MilestoneController@create')->name('createMilestone');
Route::get('backstage/milestones/{milestone}', 'MilestoneController@edit')->name('editMilestone');
Route::get('backstage/milestones/delete/{milestone}', 'MilestoneController@delete')->name('deleteMilestone');
Route::post('backstage/milestones', 'MilestoneController@store')->name('storeMilestone');
Route::patch('backstage/milestones', 'MilestoneController@patch')->name('patchMilestone');
Route::delete('backstage/milestones', 'MilestoneController@destroy')->name('destroyMilestone');

Route::get('backstage/rings', 'RingController@index')->name('manageRing');
Route::get('backstage/rings/create', 'RingController@create')->name('createRing');
Route::get('backstage/rings/{ring}', 'RingController@edit')->name('editRing');
Route::get('backstage/rings/delete/{ring}', 'RingController@delete')->name('deleteRing');
Route::post('backstage/rings', 'RingController@store')->name('storeRing');
Route::patch('backstage/rings', 'RingController@patch')->name('patchRing');
Route::delete('backstage/rings', 'RingController@destroy')->name('destroyRing');

Route::get('backstage/platforms', 'PlatformController@index')->name('managePlatform');
Route::get('backstage/platforms/create', 'PlatformController@create')->name('createPlatform');
Route::get('backstage/platforms/{platform}', 'PlatformController@edit')->name('editPlatform');
Route::get('backstage/platforms/delete/{platform}', 'PlatformController@delete')->name('deletePlatform');
Route::post('backstage/platforms', 'PlatformController@store')->name('storePlatform');
Route::patch('backstage/platforms', 'PlatformController@patch')->name('patchPlatform');
Route::delete('backstage/platforms', 'PlatformController@destroy')->name('destroyPlatform');

Route::get('backstage/stats', 'StatsController@index')->name('manageStat');
