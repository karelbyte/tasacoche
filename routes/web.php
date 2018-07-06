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


Route::get('/', 'FrontController@index');

Route::get('home', 'FrontController@index');

Route::post('email', 'FrontController@sendemail')->name('email');

Route::get('gan', 'HomeController@getData');

Route::get('url', 'FrontController@url');

Route::get('cita_confirm/{token}', 'FrontController@cita_confirm');

Auth::routes();


Route::middleware('auth')->group(function () {

    Route::get('/back', function () { return view('admin.home');})->name('back');

    // RUTA DE HEADERS
    Route::get('back/template', function () { return view('admin.template');})->name('template') ;

    // RUTA DE HEADERS
    Route::get('back/headers', function () { return view('admin.headers');})->name('headers') ;

    // RUTA DE COMO FUNCIONA
    Route::get('back/work', function () { return view('admin.work');})->name('work') ;

    // RUTA DE PREGUNTAS FRECUENTES
    Route::get('back/questions', function () { return view('admin.questions');})->name('questions') ;

    // RUTA DE CONTACTOS
    Route::get('back/contac', function () { return view('admin.contac');})->name('contac') ;

    // RUTA DE CONTACTOS
    Route::get('back/footer', function () { return view('admin.footer');})->name('footer') ;

    // RUTAS DE USUARIO
    Route::get('back/users', 'UsersController@index')->name('users') ;

    // RUTA DE MARCAS
    Route::get('back/makes', 'MarcasController@index')->name('makes') ;

    // RUTA DE MODELOS
    Route::get('back/models', 'ModelosController@index')->name('models') ;

    // RUTA DE CITAS
    Route::get('back/citas', 'CitasController@index')->name('citas') ;

    Route::get('back/citas_config', 'CitasconfigController@index')->name('citas_config') ;

    // RUTA DE GANVAM
    Route::get('back/ganvam', 'GanvamController@index')->name('ganvam') ;

});







