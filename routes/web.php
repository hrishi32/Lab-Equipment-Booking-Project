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
    return view('/ldapLogin');
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
    return view('dashboard.calendar');
});
Route::get('/myBookings', function () {
    return view('events.booking');
});
Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('getevents', 'EventsController@getEvent')->name('events.get');
Route::get('/dashboard/table', 'EventsController@allEvents');
Route::get('/toolsTable', 'ToolsController@allTools');
Route::get('/usersTable', 'UserController@allUsers');
Route::get('gettools', 'ToolsController@gettools');
Route::get('toolsColor', 'ToolsController@toolsColor');

Route::get('/dashboard/myBooking', 'EventsController@userEvent');
// Route::get('/dashboard/myBooking/download', 'EventsController@downloadPDF');
// Route::get('/dashboard/myBooking/postPDF', 'EventsController@postPDFprint');
Route::get('/mybookings', 'EventsController@booking');
Route::get('gettoolsname','ToolsController@gettoolsname');
Route::get('getuserid', 'UserController@getUserId');

// Route::post('/ldapAuth','UserController@ldapAuth');
Route::get('/ldapLogin', function () {
    return view('ldapLogin');
});
// Route::get('protected', ['middleware' => 
//             ['auth', 'admin'], function(){
//                 return "this page requires that you are logged in as admin.";
//             }]);
Route::resource('events', 'EventsController');
Route::resource('users', 'UserController');
Route::resource('tools', 'ToolsController');
Route::get('admin', ['middleware' => 'admin', function () {
    // return "Logged as Admin";
    return Redirect("/");
}]);

