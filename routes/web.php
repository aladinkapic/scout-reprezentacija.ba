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
    Route::get ('/pretraga',                             'HomepageController@searchResults')->name('searchResults');

    Route::group(['namespace' => 'Players', 'prefix' => '/players'], function(){
        Route::get ('/preview',                          'PlayersController@preview')->name('home.players.preview');
    });
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
        Route::post('/change-profile-image',             'UsersController@changeProfileImage')->name('system.users.change-profile-image');

        Route::get ('/image-crop',                       'UsersController@imageCrop')->name('system.users.image-crop');
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
            Route::put ('/update',                           'ClubsController@update')->name('system.additional.clubs.update');
        });
        /*
         *  Clubs data
         */
        Route::group(['prefix' => '/clubs-data'], function(){
            Route::get ('/',                                 'ClubDataController@index')->name('system.additional.club-data.index');
            Route::get ('/create',                           'ClubDataController@create')->name('system.additional.club-data.create');
            Route::post('/save',                             'ClubDataController@save')->name('system.additional.club-data.save');
            Route::get ('/preview/{id}',                     'ClubDataController@preview')->name('system.additional.club-data.preview');
            Route::get ('/edit/{id}',                        'ClubDataController@edit')->name('system.additional.club-data.edit');
            Route::put ('/update',                           'ClubDataController@update')->name('system.additional.club-data.update');
            Route::get ('/delete/{id}',                      'ClubDataController@delete')->name('system.additional.club-data.delete');
        });
        /*
         *  Nationality team data
         */
        Route::group(['prefix' => '/nationality-team-data'], function(){
            Route::get ('/',                                 'NatTeamDataController@index')->name('system.additional.nat-team-data.index');
            Route::get ('/create',                           'NatTeamDataController@create')->name('system.additional.nat-team-data.create');
            Route::post('/save',                             'NatTeamDataController@save')->name('system.additional.nat-team-data.save');
            Route::get ('/preview/{id}',                     'NatTeamDataController@preview')->name('system.additional.nat-team-data.preview');
            Route::get ('/edit/{id}',                        'NatTeamDataController@edit')->name('system.additional.nat-team-data.edit');
            Route::put ('/update',                           'NatTeamDataController@update')->name('system.additional.nat-team-data.update');
            Route::get ('/delete/{id}',                      'NatTeamDataController@delete')->name('system.additional.nat-team-data.delete');
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
