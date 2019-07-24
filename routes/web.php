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
    return view('newwelcome');
});

Route::get('/admin', function () {
    return view('layouts.app-layout');
});

Route::get('/test','Admin\ACL\AccessControlListController@index');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



Route::get('/dealer/index','DealerController@index')->name('dealer.index');
Route::get('/dealer/create','DealerController@getcreate')->name('dealer.getcreate');
Route::post('/dealer/create','DealerController@postcreate')->name('dealer.postcreate');


// Dealer Zone
Route::get('dealersettings/zone/create','DealerZoneController@getCreate')->name('dealersettings.zone.create');
Route::post('dealersettings/zone/create','DealerZoneController@postCreate')->name('dealersettings.zone.postcreate');
Route::DELETE('dealersettings/zone/delete/{id}','DealerZoneController@destroy')->name('dealersettings.zone.delete');
Route::PATCH('dealersettings/zone/update/{id}','DealerZoneController@update')->name('dealersettings.zone.update');


// Dealer Type
Route::get('dealersettings/type/create','DealerTypeController@getCreate')->name('dealersettings.type.create');
Route::post('dealersettings/type/create','DealerTypeController@postCreate')->name('dealersettings.type.postcreate');
Route::DELETE('dealersettings/type/delete/{id}','DealerTypeController@destroy')->name('dealersettings.type.delete');
Route::PATCH('dealersettings/type/update/{id}','DealerTypeController@update')->name('dealersettings.type.update');


// Dealer Area
Route::get('dealersettings/area/create','DealerAreaController@getCreate')->name('dealersettings.area.create');
Route::post('dealersettings/area/create','DealerAreaController@postCreate')->name('dealersettings.area.postcreate');
Route::DELETE('dealersettings/area/delete/{id}','DealerAreaController@destroy')->name('dealersettings.area.delete');
Route::PATCH('dealersettings/area/update/{id}','DealerAreaController@update')->name('dealersettings.area.update');


// Dealer SPO
Route::get('dealersettings/spo/index','DealerSpoController@index')->name('dealersettings.spo.index');
Route::get('dealersettings/spo/create','DealerSpoController@getCreate')->name('dealersettings.spo.create');
Route::post('dealersettings/spo/create','DealerSpoController@postCreate')->name('dealersettings.spo.postcreate');


// Dealer Line Manager
Route::get('dealersettings/linemanager/index','DealerLineManagerController@index')->name('dealersettings.linemanager.index');
Route::get('dealersettings/linemanager/create','DealerLineManagerController@getCreate')->name('dealersettings.linemanager.create');
Route::post('dealersettings/linemanager/create','DealerLineManagerController@postCreate')->name('dealersettings.linemanager.postcreate');


