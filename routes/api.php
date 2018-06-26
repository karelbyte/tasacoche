<?php

use Illuminate\Http\Request;

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

Route::get('users/list', 'UsersController@getlist');
Route::resource('users', 'UsersController');


Route::prefix('headers')->group(function () {

    Route::get('options', 'CmsController@getHeadersOptions');

    Route::post('options/save', 'CmsController@saveHeadersOptions');

    Route::post('options/save/img', 'CmsController@saveHeadersImg');

});


Route::prefix('work')->group(function () {

    Route::get('options', 'CmsController@getWorkOptions');

    Route::post('options/save', 'CmsController@saveWorkOptions');

    Route::post('options/save/img', 'CmsController@saveWorkImg');

});


Route::prefix('questions')->group(function () {

    Route::get('options', 'CmsController@getQuestionsOptions');

    Route::post('options/save', 'CmsController@saveQuestionsOptions');

});



Route::prefix('contac')->group(function () {

    Route::get('options', 'CmsController@getContacOptions');

    Route::post('options/save', 'CmsController@saveContacOptions');

});



Route::prefix('footer')->group(function () {

    Route::get('options', 'CmsController@getFooterOptions');

    Route::post('options/save', 'CmsController@saveFooterOptions');

    Route::post('options/save/img', 'CmsController@saveFooterImg');

});


Route::prefix('template')->group(function () {

    Route::get('options', 'CmsController@getTemplateOptions');

    Route::post('options/save', 'CmsController@saveTemplateOptions');

    Route::post('options/save/img', 'CmsController@saveTemplateImg');

});


// RUTAS DE MARCAS
Route::prefix('makes')->group(function () {

    Route::get('list', 'MarcasController@getlist');

    Route::get('ganmakes', 'MarcasController@getData');

    Route::post('save/img', 'MarcasController@saveImg');

});

Route::resource('/makes', 'MarcasController');


// RUTAS DE MODELOS
Route::prefix('models')->group(function () {

    Route::get('list', 'ModelosController@getlist');

    Route::get('ganmakes', 'ModelosController@getData');

});

Route::resource('/models', 'ModelosController');


// RUTAS DE ADMINISTRAR API GANVAM
Route::prefix('ganvam')->group(function () {

    Route::get('data', 'GanvamController@getData');

    Route::get('test', 'GanvamController@testgan');

    Route::post('save', 'GanvamController@store');

    Route::get('getmake', 'GanvamController@getmake');

    Route::get('getmodel', 'GanvamController@getModel');

});