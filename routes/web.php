<?php

use App\Role;
use App\User;

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route::get('create', function () {

//     // Role::create(['name' => 'administrator']);
//     // Role::create(['name' => 'author']);
//     // Role::create(['name' => 'subscriber']);
//     // Role::create(['name' => 'guest']);
// });

Route::get('admin', function () {

    return view('admin.index');

});

// Route::resource('admin/users', 'AdminUserController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'admin'], function () {

    Route::resource('admin/users', 'AdminUserController');

});
