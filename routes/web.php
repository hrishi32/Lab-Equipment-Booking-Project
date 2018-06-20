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
    return view('welcome');
});
Route::get('/dashboard', function () {
    return view('dashboard.dashboard');
});
Route::get('/dashboard/icons', function () {
    return view('dashboard.icons');
});
Route::get('/dashboard/maps', function () {
    return view('dashboard.maps');
});
Route::get('/dashboard/notifications', function () {
    return view('dashboard.notifications');
});
Route::get('/dashboard/calendar', function () {
    return view('dashboard.calendar');
});
Route::get('/dashboard/user', function () {
    return view('dashboard.user');
});
Route::get('/dashboard/template', function () {
    return view('dashboard.template');
});
Route::get('/dashboard/upgrade', function () {
    return view('dashboard.upgrade');
});
Route::get('/dashboard/typography', function () {
    return view('dashboard.typography');
});

Route::get('/home', function () {
    return view('dashboard.dashboard');
});
Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('getevents', 'EventsController@getEvent')->name('events.get');
Route::get('/dashboard/table', 'EventsController@allEvents');
Route::get('gettools', 'ToolsController@gettools');
Route::get('userevents', 'EventsController@userEvent');
Route::get('gettoolsname','ToolsController@gettoolsname');
Route::get('getuserid', 'UserController@getUserId');


Route::resource('events', 'EventsController');
Route::resource('users', 'UserController');
Route::resource('tools', 'ToolsController');

