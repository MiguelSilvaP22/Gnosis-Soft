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
Route::get('index', function () {
    return view('index.layoutindex');
});

Route::get('/', function () {
    return view('index.layoutindex');
});

Route::get('admin', function () {
    return view('admin.dashboard');
});

Route::get('usuario', function () {
    return view('admin.usuario');
});



Route::get('perfil/{estado?}', 'PerfilController@index',function($estado = null)
{
    return $estado;
});

Route::get('/crearPerfil', 'PerfilController@create');

Route::get('/eliminarPerfil/{id}', 'PerfilController@destroy',function($id) {
  return  $id;
});
Route::get('/verPerfil/{id}', 'PerfilController@show',function($id) {
    return  $id;
  });
  Route::get('/modificarPerfil/{id}', 'PerfilController@edit',function($id) {
    return  $id;
  })
  ->name('perfil.edit');
Route::resource('perfil', 'PerfilController');