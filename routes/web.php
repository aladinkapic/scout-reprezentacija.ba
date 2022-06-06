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
    Route::get ('/registracija',                         'HomepageController@register')->name('register');
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
    /*
     *  Clubs, national teams;
     */
    Route::group(['namespace' => 'Additional', 'prefix' => '/additional'], function(){
        /*
         *  Clubs - CRUD
         */
        Route::group(['prefix' => '/clubs'], function(){
            Route::get ('/',                                 'ClubsController@index')->name('system.additional.clubs.index');
            Route::get ('/create',                           'ClubsController@create')->name('system.additional.clubs.create');
            Route::post('/save',                             'ClubsController@save')->name('system.additional.clubs.save');
            Route::get ('/preview/{id}',                     'ClubsController@preview')->name('system.additional.clubs.preview');
            Route::get ('/edit/{id}',                        'ClubsController@edit')->name('system.additional.clubs.edit');
            Route::put ('/update',                           'ClubsController@save')->name('system.additional.clubs.update');
        });
    });
    /*
     *  Those are core routes for keywords
     */
    Route::group(['namespace' => 'Core', 'prefix' => '/settings/core', 'middleware' => 'isRoot'], function(){
        Route::get ('/',                                 'KeywordsController@index')->name('system.settings.core.keywords.index');
        Route::get ('/preview/{keyword}',                'KeywordsController@preview')->name('system.settings.core.keywords.preview');
        Route::get ('/create/{keyword}',                 'KeywordsController@create')->name('system.settings.core.keywords.create');
        Route::post('/save',                             'KeywordsController@save')->name('system.settings.core.keywords.save');
        Route::get ('/edit/{id}',                        'KeywordsController@edit')->name('system.settings.core.keywords.edit');
        Route::put ('/update',                           'KeywordsController@update')->name('system.settings.core.keywords.update');
        Route::delete('/delete',                         'KeywordsController@delete')->name('system.settings.core.keywords.delete');
    });
});

//Route::get('/', function () {
//    return view('welcome');
//});
