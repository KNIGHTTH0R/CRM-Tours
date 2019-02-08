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

Route::group(['prefix'=>'admin'], function () {
    Route::resource('agencies', 'AgencyController')->middleware('admin');
    Route::resource('tours', 'TourController')->middleware('admin', 'agent');
    Route::resource('users', 'UserController')->middleware('admin');
    Route::get('agency/tours/{agency}', 'AgencyController@allTours')->name('agency.tours')->middleware('admin');
});

Route::group(['prefix'=>'agent'], function (){
   Route::get('tours', 'AgencyController@agentTours')->name('agent.tours');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
