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

Route::get('/', function () {
    return view('login');
});

//Rutas Administrador
Route::resource("Users","DifUserController");
Route::resource("RegUser","DifUserAdminController");
Route::resource("difEncuesta","DifEncController");

//Rutas de Administrador
//Rutas de User
Route::get('Users/delete/{id}','DifUserController@destroy');

//Rutas de RegUser
Route::get("RegUser/create","DifUserAdminController@create");
Route::get('RegUser/delete/{id}','DifUserAdminController@destroy');


//Añadido el 06-11-22
Route::get('Users', array('uses' =>'DifUserController@index', 'as' => 'Users'));
Route::get('mostraruser', array('uses' =>'DifUserController@mostrar', 'as' => 'mostraruser'));
Route::get('Users/create', array('uses' =>'DifUserController@create', 'as' => 'users.create'));
Route::get('RegUsmostrar', array('uses' =>'DifUserAdminController@mostrar', 'as' => 'mostrarReguser'));
Route::get('/', array('uses' =>'HomeController@index', 'as' => '/'));
Route::get('difEncuesta/create', array('uses' =>'DifEncController@create', 'as' => 'EncuestaDif'));
Route::get('difEncuesta/show', array('uses' =>'DifEncController@index', 'as' => 'EncuestaDif.show'));
Route::get('Main', array('uses' =>'DifUserController@mostrar2', 'as' => 'Main'));

//Añadido el 09-11-22
Route::get('UserDownload','DifUserAdminController@pdf')->name('ListadoUsuarios.pdf');

//Añadido el 09-11-22
Route::get('EncuestasDownload','DifEncController@pdf')->name('ListadoEncuestas.pdf');

//Algolia
Route::resource('/search', 'ApiSearchController');
Route::get('/search1',['uses' => 'ApiSearchController@search','as' => 'search']);

// --------------------------------------------------------------------------------------------------------------------------------------------------------------
// --------------------------------------------------------------------------------------------------------------------------------------------------------------
// --------------------------------------------------------------------------------------------------------------------------------------------------------------


//Rutas Beneficiarios
Route::resource('/DifAdmin','DifAdminController');
Route::resource('/beneficiarios','BeneficiariosController');
Route::resource('/almacen','AlmacenController');
Route::resource('/apvigentes','APvigentesController');
Route::resource('/inventario','InventarioController');

Route::get('/Beneficiarios', array('uses' =>'BeneficiariosController@index', 'as' => 'beneficiarios.principal'));
Route::get('/almacen', array('uses' =>'AlmacenController@index', 'as' => 'almacen.principal'));
Route::get('/apvigentes', array('uses' =>'APvigentesController@index', 'as' => 'apoyos.principal'));
Route::get('/inventario', array('uses' =>'InventarioController@index', 'as' => 'agregarI.principal'));
Route::get('/principal', array('uses' =>'BeneficiariosController@mostrar', 'as' => 'principal'));
Route::get('/apvigentes/create', array('uses' =>'APvigentesController@create', 'as' => 'agregar.principal'));
Route::get('/beneficiarios/create', array('uses' =>'BeneficiariosController@create', 'as' => 'agre.principal'));
Route::get('/almacen/create', array('uses' =>'AlmacenController@create', 'as' => 'agreGar.principal'));
Route::get('/inventario/create', array('uses' =>'InventarioController@create', 'as' => 'AgreGar.principal'));

Route::get('/deleteB/{id}','BeneficiariosController@destroy');
Route::get('/deleteA/{id}','AlmacenController@destroy');
Route::get('/deleteI/{id}','InventarioController@destroy');
Route::get('/deleteAP/{id}','APvigentesController@destroy');
Route::get('descargar-entrenadores', 'BeneficiariosController@pdf')->name('listado.pdf');
Auth::routes();





