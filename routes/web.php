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

//Perfiles

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
  })
  ->name('perfil.show');


Route::get('/editarPerfil/{id}', 'PerfilController@edit',function($id) {
    return  $id;
  })
  ->name('perfil.edit');
  
Route::resource('perfil', 'PerfilController');




//Competencias

Route::resource('competencia', 'CompetenciaController');

Route::get('/crearCompetencia', 'CompetenciaController@create')->name('competencia.crear');


//Empresas

Route::get('empresa/{estado?}', 'EmpresaController@index',function($estado = null)
{
    return $estado;
});

Route::get('/crearEmpresa', 'EmpresaController@create')->name('empresa.crear');

Route::get('/verComuna/{id}', 'ComunaController@comunas',function($id) {
    return  $id;
  });

Route::get('/editarEmpresa/{id}', 'EmpresaController@edit',function($id) {
    return  $id;
  })
  ->name('empresa.edit');

Route::resource('empresa', 'EmpresaController');

// Oganigrama Empresa
Route::get('/organigrama/{id}', 'OrganigramaController@index',function($id)
{
    return $id;
})->name('organigrama.index');

Route::get('/gerencia/{id}', 'GerenciaController@index',function($id)
{
    return $id;
})->name('gerencia.index');

Route::get('/crearGerencia/{id}', 'GerenciaController@create',function($id)
{
    return $id;
})->name('gerencia.crearGerencia');

Route::get('/editarGerencia/{id}', 'GerenciaController@edit',function($id) {
    return  $id;
  })
  ->name('gerencia.edit');
Route::post('gerenciaGerencia', [
    'uses' => 'GerenciaController@store'
  ]);
