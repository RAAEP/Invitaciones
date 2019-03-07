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
    return view('auth/login');
});

/**Crear un grupo para que solo los que estan registrados puedan entrar a crear un invitado*/
Route::group(['middleware' => 'auth'], function () {




    /********************************Rutas de invitaciones************************ */


    /**Esta ruta nos redirecciona a la página RegistrarInvitacion. es de tipo url  */
    Route::get('registroinvitacion',function(){
        return view('menu/RegistrarInvitacion');
    });

    /**Esta ruta nos redirecciona a la página MuestraInvitaciones */
    Route::get('invitaciones','InvitacionesController@Mostrar')->name('Tinvitaciones');


    /********************************** Rutas de Invitados************************ */

    /**Esta ruta nos redirecciona a la página CrearInvitados. es de tipo url */
    Route::get('registroinvitado',function(){
        return view('menu/RegistrarInvitados');
    });

    /**Esta ruta nos redirecciona al controlador para acceder al método mostrar */

    Route::get('invitados','InvitadosController@Mostrar')->name('Tinvitados');

    /********************************* Rutas para crear Invitaciones con invitados y un tipo de invitación. ************************************/

    /**1.- Ruta para seleccionar invitación, utilizado en la vista SeleccionarInvitacion  */
    Route::get('Invitacion','CrearInvitacionesController@seleccionarInvitacion')->name('next');
    /**2.- Ruta con un parámetro, para acceder al método seleccionarInvitados del controller CrearInvitacionesController  */
    Route::get('Invitados/{id}','CrearInvitacionesController@seleccionarInvitados')->name('next2');
    /**Ruta con 2 parámetros , para acceder al método vizualizar del controller CrearInvitacionesController  */
    Route::get('Creacion/{id}/{ds}','CrearInvitacionesController@visualizar')->name('visualizar');
    /**Ruta con 2 parámetros, para acceder al método pdf del controller CrearInvitacionesController  */
    Route::get('Imprimir/{id}/{ds}','CrearInvitacionesController@pdf')->name('imprimir');
    /**Ruta para acceder a todos los recursos del controller CrearInvitacionesController */
    Route::resource('creaciones', 'CrearInvitacionesController');
    /**Ruta con un parámetro, para acceder al método multiple del controller CrearInvitacionesController*/
    Route::post('creacion/{id}','CrearInvitacionesController@multiple')->name('multi');











    /**Ruta para acceder a los recursos del controlador InvitadosController. */
    Route::resource('registro', 'InvitadosController');

    Route::resource('registroInvitacion','InvitacionesController');

    /**Ruta para poder mostrar los datos de la tabla en la pantalla index, esta ruta accede au nmétodo del controlador
    */
    Route::get('index','InvitadosController@mostrartabla')->name('mostrar');

    /** Esta ruta es para poder acceder al método del controlador y mandar a descargar en formato PDF.*/
    Route::get('descargar-invitacion/{id}/{ds}', 'InvitadosController@pdf')->name('invitacion.pdf');
    Route::get('usar-invitacion/{id}', 'InvitacionesController@usarInvitacion')->name('usar.invitacion');
  });


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
