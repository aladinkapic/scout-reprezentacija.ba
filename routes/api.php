<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['namespace' => 'API'], function (){
    /*
     *  Keywords API
     */
    Route::group(['prefix' => '/keywords'], function (){
        Route::get('/get-keyword',              'KeywordsAPIController@getKeyword');
        Route::post('/get-countries',           'KeywordsAPIController@getCountries');

        Route::post('/get-positions',           'KeywordsAPIController@getPositions');
    });

    /*
     *  Users routes
     */
    Route::group(['prefix' => '/users'], function (){
        Route::post('/create-profile',           'UsersApiController@createProfile');
    });
    /*
     *  Additional data
     */
    Route::group(['prefix' => '/additional'], function (){
        Route::post('/get-clubs',                'AdditionalController@getClubs')->name('api.additional.get-clubs');
    });

    /*
     *  Players & Posts API system
     */
    Route::group(['namespace' => 'Players', 'prefix' => '/players'], function (){
        /*
         *  Post API system
         */
        Route::post('/like-post',                'PostsController@like')->name('api.players.posts.like');
        /*
         *  Players API system
         */
        Route::post('/rate-player',              'PlayersController@rate')->name('api.players.players.rate');
        /*
         *  Get post image
         */
        Route::post('/get-image',               'PlayersController@getImage')->name('api.players.players.get-image');
    });
});
