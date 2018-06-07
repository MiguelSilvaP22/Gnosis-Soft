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

Route::get('/editarCompetencia/{id}', 'CompetenciaController@edit',function($id) {
    return  $id;
  })->name('competencia.edit');

  Route::get('/verCompetencia/{id}', 'CompetenciaController@show',function($id) {
    return  $id;
  })->name('competencia.ver');

  Route::get('/eliminarCompetencia/{id}', 'CompetenciaController@destroy',function($id) {
    return  $id;
  })->name('competencia.eliminar');

Route::get('/crearCompetencia', 'CompetenciaController@create')->name('competencia.crear');
Route::get('/exportarcompetencias', 'CompetenciaController@exportar')->name('competencia.exportar');
Route::get('/importarcompetencias', 'CompetenciaController@importar')->name('competencia.importar');




//categoriaComp

Route::resource('categoriacompetencia', 'CategoriaCompetenciaController');

/*Route::get('/editarCompetencia/{id}', 'CompetenciaController@edit',function($id) {
    return  $id;
  })->name('competencia.edit');

  Route::get('/verCompetencia/{id}', 'CompetenciaController@show',function($id) {
    return  $id;
  })->name('competencia.ver');

  Route::get('/eliminarCompetencia/{id}', 'CompetenciaController@destroy',function($id) {
    return  $id;
  })->name('competencia.eliminar');

Route::get('/crearCompetencia', 'CompetenciaController@create')->name('competencia.crear');

*/

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

Route::get('/desactivarEmpresa/{id}', 'EmpresaController@confirmDestroy',function($id) {
    return  $id;
    })
->name('empresa.delete');  

Route::get('/eliminarEmpresa/{id}', 'EmpresaController@destroy',function($id) {
    return  $id;
    })
->name('empresa.destroy');  
    
Route::get('/validarNombre/{id}', 'EmpresaController@validarNombre',function($nombre) {
    return  $nombre;
  })
  ->name('empresa.validarNombre');
Route::resource('empresa', 'EmpresaController');

// Organigrama Empresa


Route::get('/organigrama/{id}', 'OrganigramaController@index',function($id)
{
    return $id;
})->name('organigrama.index');

//---------------------------------------------------------------------------------------------------------
//Gerencia

Route::get('/selectGerencia/{id}', 'GerenciaController@selectGerencia',function($id) {
    return  $id;
    })
    ->name('gerencia.select');  

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

Route::get('/desactivarGerencia/{id}', 'GerenciaController@confirmDestroy',function($id) {
return  $id;
})
->name('gerencia.delete');  

Route::get('/eliminarGerencia/{id}', 'GerenciaController@destroy',function($id) {
    return  $id;
    })
    ->name('gerencia.destroy');  

Route::resource('gerencia', 'GerenciaController');

//---------------------------------------------------------------------------------------------------------
//Areas


Route::get('/selectArea/{id}', 'AreaController@selectArea',function($id) {
    return  $id;
    })
    ->name('area.select');

Route::get('/area/{id}', 'AreaController@index',function($id)
{
    return $id;
})->name('area.index');

Route::get('/crearArea/{id}', 'AreaController@create',function($id)
{
    return $id;
})->name('area.crearArea');


Route::get('/editarArea/{id}', 'AreaController@edit',function($id) {
    return  $id;
  })
  ->name('area.edit');

  
Route::get('/desactivarArea/{id}', 'AreaController@confirmDestroy',function($id) {
    return  $id;
    })
    ->name('area.delete');  
    
    Route::get('/eliminarArea/{id}', 'AreaController@destroy',function($id) {
        return  $id;
        })
        ->name('area.destroy');  

Route::resource('area', 'AreaController');
//-----------------------------------------------------------------------------------------------------------
//Perfil Ocupacional

Route::get('/selectPerfilOcupacional/{id}', 'PerfilOcupacionalController@selectPerfilOcupacional',function($id) {
    return  $id;
    })
    ->name('perfilOcupacional.select');  

Route::get('/perfilOcupacional/{id}', 'PerfilOcupacionalController@index',function($id)
{
    return $id;
})->name('perfilOcupacional.index');

Route::get('/crearPerfilOcupacional/{id}', 'PerfilOcupacionalController@create',function($id)
{
    return $id;
})->name('perfilOcupacional.crearPerfilOcupacional');


Route::get('/editarPerfilOcupacional/{id}', 'PerfilOcupacionalController@edit',function($id) {
    return  $id;
  })
  ->name('perfilOcupacional.edit');

  
Route::get('/desactivarPerfilOcupacional/{id}', 'PerfilOcupacionalController@confirmDestroy',function($id) {
    return  $id;
    })
    ->name('perfilOcupacional.delete');  
    
    Route::get('/eliminarPerfilOcupacional/{id}', 'PerfilOcupacionalController@destroy',function($id) {
        return  $id;
        })
        ->name('perfilOcupacional.destroy');  

Route::resource('perfilOcupacional', 'PerfilOcupacionalController');

//-------------------------------------------------------------------------------------------------------------------------
//Colaboradores

Route::get('/colaborador', 'ColaboradorController@index');

Route::get('/crearColaborador', 'ColaboradorController@create')
->name('colaborador.crear');

Route::get('/editarColaborador/{id}', 'ColaboradorController@edit',function($id) {
    return  $id;
  })
  ->name('colaborador.edit');

Route::get('/desactivarColaborador/{id}', 'ColaboradorController@confirmDestroy',function($id) {
    return  $id;
    })
->name('colaborador.delete');  

Route::get('/eliminarColaborador/{id}', 'ColaboradorController@destroy',function($id) {
    return  $id;
    })
->name('colaborador.destroy');  
    

Route::resource('colaborador', 'ColaboradorController');

//-------------------------------------------------------------------------------------------------------------------------
//Evaluacion

Route::get('/evaluacion', 'EvaluacionController@index');

Route::get('/crearEvaluacionDNC', 'EvaluacionController@create')
->name('evaluacion.crear');


Route::get('/infoColaborador/{id}', 'EvaluacionController@infocolaborador',function($id) {
    return  $id;
  })
  ->name('evaluacion.infoColaborador');

Route::get('/datosEvaluacion/{id}', 'EvaluacionController@datosEvaluacion',function($id) {
    return  $id;
    })
    ->name('evaluacion.datosEvaluacion');

Route::resource('evaluaciondnc', 'EvaluacionController');
/*
Route::get('/editarColaborador/{id}', 'ColaboradorController@edit',function($id) {
    return  $id;
  })
  ->name('colaborador.edit');

Route::get('/desactivarColaborador/{id}', 'ColaboradorController@confirmDestroy',function($id) {
    return  $id;
    })
->name('colaborador.delete');  

Route::get('/eliminarColaborador/{id}', 'ColaboradorController@destroy',function($id) {
    return  $id;
    })
->name('colaborador.destroy');  
    

Route::resource('colaborador', 'ColaboradorController');*/

//-------------------------------------------------------------------------------------------------------------------------
//Usuarios

Route::get('/usuario', 'UsuarioController@index');
Route::get('/login', 'LoginController@login');

Route::get('/crearUsuario', 'UsuarioController@create')
->name('usuario.crear');

Route::get('/editarUsuario/{id}', 'UsuarioController@edit',function($id) {
    return  $id;
  })
  ->name('usuario.edit');

Route::get('/desactivarUsuario/{id}', 'UsuarioController@confirmDestroy',function($id) {
    return  $id;
    })
->name('usuario.delete');  

Route::get('/eliminarUsuario/{id}', 'UsuarioController@destroy',function($id) {
    return  $id;
    })
->name('usuario.destroy');  
    

Route::resource('usuario', 'UsuarioController');

//-------------------------------------------------------------------------------------------------------------------------
//Curso

Route::get('/curso', 'CursoController@index');

Route::get('/crearCurso', 'CursoController@create')
->name('curso.crear');

Route::get('/editarCurso/{id}', 'CursoController@edit',function($id) {
    return  $id;
  })
  ->name('curso.edit');

Route::get('/desactivarCurso/{id}', 'CursoController@confirmDestroy',function($id) {
    return  $id;
    })
->name('curso.delete');  

Route::get('/eliminarCurso/{id}', 'CursoController@destroy',function($id) {
    return  $id;
    })
->name('curso.destroy');  
    

Route::resource('curso', 'CursoController');

//-------------------------------------------------------------------------------------------------------------------------
//Actividad

Route::get('/actividad', 'ActividadController@index');

Route::get('/crearActividad', 'ActividadController@create')
->name('actividad.crear');

Route::get('/editarActividad/{id}', 'ActividadController@edit',function($id) {
    return  $id;
  })
  ->name('actividad.edit');

Route::get('/desactivarActividad/{id}', 'ActividadController@confirmDestroy',function($id) {
    return  $id;
    })
->name('actividad.delete');  

Route::get('/eliminarActividad/{id}', 'ActividadController@destroy',function($id) {
    return  $id;
    })
->name('actividad.destroy');  


Route::get('/crearHorario/{id}', 'ActividadController@createHorario',function($id)
{
    return $id;
})->name('actividad.createHorario'); 

Route::get('/formHorario/{id}', 'ActividadController@formHorario',function($id)
{
    return $id;
})->name('actividad.formHorario'); 

Route::post('storeHorario', [
    'uses' => 'ActividadController@storeHorario'
  ]);
Route::post('updateHorario', [
    'uses' => 'ActividadController@updateHorario'
  ]);
Route::resource('actividad', 'ActividadController');

//-------------------------------------------------------------------------------------------------------------------------
//Horario

Route::get('/asignarHorario/{id}', 'HorarioController@create',function($id) {
    return  $id;
  })
  ->name('horario.create');

 Route::get('/selectColaboradores/{id}', 'ColaboradorController@selectColaboradores',function($id) {
    return  $id;
  })
  ->name('colaborador.selectColaboradores'); 


Route::post('storeAsignarHorario', [
    'uses' => 'HorarioController@store'
  ]);

Route::resource('horario', 'HorarioController');

//-------------------------------------------------------------------------------------------------------------------------

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


/*

================================
VISTA DE LA EMPRESA
================================

*/

//-------------------------------------------------------------------------------------------------------------------------
//Competencia

Route::resource('vistacompetencia', 'vistaCompetenciaController');
Route::get('/vercompetencias/{id}', 'vistaCompetenciaController@vistacompetencias',function($id) {
    return  $id;
  });

  Route::get('/infocompetencia/{id}', 'vistaCompetenciaController@infocompetencia',function($id) {
    return  $id;
  });

//-------------------------------------------------------------------------------------------------------------------------
//Curso

  Route::resource('vistacurso', 'vistaCursoController');

Route::get('/vercursos/{id}', 'vistaCursoController@vistacursos',function($id) {
    return  $id;
  });

  Route::get('/infocurso/{id}', 'vistaCursoController@infocurso',function($id) {
    return  $id;
  });


