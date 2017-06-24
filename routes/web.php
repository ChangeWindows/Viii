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
Route::get('milestones', 'MilestoneController@index')->name('milestones');
Route::get('rings', 'RingController@index')->name('rings');
Route::get('year', 'YearController@index')->name('year');
Route::get('settings', 'SettingsController@index')->name('settings');
Route::get('privacy', 'PrivacyController@index')->name('privacy');
Route::get('about', 'AboutController@index')->name('about');

// Backstage routes
Route::get('backstage', 'BackstageController@index')->name('backstage');
