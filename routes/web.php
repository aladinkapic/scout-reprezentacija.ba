<?php

use Illuminate\Support\Facades\Route;

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

Route::group(['namespace' => 'Home', 'prefix' => '/'], function(){
    Route::get ('/',                                     'HomepageController@home')->name('homepage');
});


Route::group(['namespace' => 'Auth', 'prefix' => '/'], function(){
    Route::get ('/login-page',                           'AuthController@login')->name('auth.login');
    Route::post('/log-me-in',                            'AuthController@logMeIn')->name('auth.logMeIn');

    /*
     *  Logout
     */
    Route::get ('/logout',                               'AuthController@logout')->name('auth.logout');
});

Route::group(['namespace' => 'System', 'prefix' => '/', 'middleware' => 'isAuthenticated'], function(){

    /*
     *  Dashboard -- simple homepage for logged users
     */

    Route::get ('/home',                                 'HomeController@home')->name('system.home');

    /*
     *  Users graphical interface
     */
    Route::group(['namespace' => 'Users', 'prefix' => '/users'], function(){
        /*
         *  Admin access to users
         */
        Route::group(['prefix' => '/', 'middleware' => 'isRoot'], function(){
            Route::get ('/',                                 'UsersController@index')->name('system.users.index');
            Route::get ('/create',                           'UsersController@create')->name('system.users.create');
            Route::get ('/preview/{id}',                     'UsersController@preview')->name('system.users.preview');
            Route::post('/save',                             'UsersController@save')->name('system.users.save');
            Route::get ('/edit/{id}',                        'UsersController@edit')->name('system.users.edit');
            Route::put ('/update',                           'UsersController@update')->name('system.users.update');
        });

        /*
         *  My profile -- user data for currently logged user
         */
        Route::get ('/my-profile',                       'UsersController@profile')->name('system.users.profile');
        Route::put ('/update-profile',                   'UsersController@updateProfile')->name('system.users.update-profile');
    });
});

//Route::get('/', function () {
//    return view('welcome');
//});
