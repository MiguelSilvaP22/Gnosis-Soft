//Marcar error de inputs.
function marcarErrorGeneral(id,idErr){
	document.getElementById(idErr).innerHTML='Campo Obligatorio';
	$('#'+id).parent().addClass('has-error');
}
function marcarErrorChar(id,idErr){
	document.getElementById(idErr).innerHTML='No se permiten caracteres especiales.';
	$('#'+id).parent().addClass('has-error');
}
function marcarErrorRut(id,idErr){
	document.getElementById(idErr).innerHTML='El dato ingresado no es valido.';
	$('#'+id).parent().addClass('has-error');
}
function marcarErrorDuplicado(id,idErr){
	document.getElementById(idErr).innerHTML='El dato ingresado ya existe.';
	$('#'+id).parent().addClass('has-error');
}

function marcarErrorFecha(id,idErr){
	document.getElementById(idErr).innerHTML='La fecha de termino no puede ser anterior a la de inicio.';
	$('#'+id).parent().addClass('has-error');
}

//Marcar error select
function marcarErrorSelect(idErr){
	document.getElementById(idErr).innerHTML='Seleccione una opción.';
	document.getElementById(idErr).style.color = '#FF3333';
}

//Desmarcar error.
function desmarcarError(id,idErr){
	document.getElementById(idErr).innerHTML='';
	$('#'+id).parent().removeClass('has-error').addClass('has-success');
}

//Desmarcar error select.
function desmarcarErrorSelect(idErr){
document.getElementById(idErr).innerHTML='';
}


//Validación de caracteres.
function validarChr(TCode){
	if( /^[a-zA-Z0-9-(ñÑáéíóúÁÉÍÓÚ)-\s]*$/.test( TCode ) ) 
	{return false;}
    return true;     
}

//Validación de caracteres con punto.
function validarChrPunto(TCode){
	if( /^[a-zA-Z0-9-(ñÑáéíóúÁÉÍÓÚ)-\s-(\.\,)]*$/.test( TCode ) ) 
	{return false;}
    return true;     
}

//Validación de rut.
function validarRut(TCode){
	if( /^[0-9]+[-|‐]{1}[0-9kK]{1}$/.test( TCode ) ) 
	{return false;}
    return true;     
}

//Validación del DV.
function validarDV(rut)
{
	var valor = rut;
    // Despejar Guión
    valor = valor.replace('-','');
    
    // Aislar Cuerpo y Dígito Verificador
    cuerpo = valor.slice(0,-1);
    dv = valor.slice(-1).toUpperCase();
    
    // Formatear RUN
    rut.value = cuerpo + '-'+ dv
    
    // Si no cumple con el mínimo ej. (n.nnn.nnn)
    if(cuerpo.length < 7) {return true;}
    
    // Calcular Dígito Verificador
    suma = 0;
    multiplo = 2;
    
    // Para cada dígito del Cuerpo
    for(i=1;i<=cuerpo.length;i++) {
    
        // Obtener su Producto con el Múltiplo Correspondiente
        index = multiplo * valor.charAt(cuerpo.length - i);
        
        // Sumar al Contador General
        suma = suma + index;
        
        // Consolidar Múltiplo dentro del rango [2,7]
        if(multiplo < 7) { multiplo = multiplo + 1; } else { multiplo = 2; }
  
    }
    
    // Calcular Dígito Verificador en base al Módulo 11
    dvEsperado = 11 - (suma % 11);
    
    // Casos Especiales (0 y K)
    dv = (dv == 'K')?10:dv;
    dv = (dv == 0)?11:dv;
    
    // Validar que el Cuerpo coincide con su Dígito Verificador
    if(dvEsperado != dv) { return true; }
    
    // Si todo sale bien, eliminar errores (decretar que es válido)
    return false;
}


function compararFechas(fecha, fecha2)  
{  
    var xMonth=fecha.substring(3, 5);  
    var xDay=fecha.substring(0, 2);  
    var xYear=fecha.substring(6,10);  
    var yMonth=fecha2.substring(3, 5);  
    var yDay=fecha2.substring(0, 2);  
    var yYear=fecha2.substring(6,10);  
    if (xYear> yYear)  
    {  
        return true  
    }  
    else  
    {  
      	if (xYear == yYear)  
      	{   
       		if (xMonth> yMonth)  
        	{  
            	return true  
        	}  
        	else  
        	{   
				if (xMonth == yMonth)  
				{  
					if (xDay> yDay)
					{
						return true;	
					}              	  
					else{return false;} 
				}  
				else{return false;} 
        	}  
      	}  
      	else{return false;} 
		  
    }  
}

//================================================================================================================================================================
//=====================================================================VALIDACION ORGANIGRAMA=====================================================================
//================================================================================================================================================================

//Validación Gerencia.
function validarGerencia (){
	var verificar = true;
	
	//Validar Nombre Gerencia.
	if($.trim( $("#nombre_gerencia").val()) == "" )
	{
		verificar = false; marcarErrorGeneral('nombre_gerencia','errNombreGerencia');
	}
	else
	{
		desmarcarError('nombre_gerencia','errNombreGerencia');	
		if(validarChr($("#nombre_gerencia").val()))
		{
			verificar = false; marcarErrorChar('nombre_gerencia','errNombreGerencia');			
		}else
		{
			desmarcarError('nombre_gerencia','errNombreGerencia');
		}	
	}

	return verificar;
	
};

//Validación Área.
function validarArea (){
	var verificar = true;
	
	//Validar Nombre Área.
	if($.trim( $("#nombre_area").val()) == "" )
	{
		verificar = false; marcarErrorGeneral('nombre_area','errNombreArea');
	}
	else
	{
		desmarcarError('nombre_area','errNombreArea');	
		if(validarChr($("#nombre_area").val()))
		{
			verificar = false; marcarErrorChar('nombre_area','errNombreArea');			
		}else
		{
			desmarcarError('nombre_area','errNombreArea');
		}	
	}

	return verificar;
	
};

//Validación Perfil ocupacional.
function validarPerfilOcupacional()
{
	var verificar = true;

	//Validar Nombre Perfil Ocupacional.
	if($.trim( $("#nombre_perfilOcu").val()) == "" )
	{
		verificar = false; marcarErrorGeneral('nombre_perfilOcu','errNombrePerfilOcu');
	}
	else
	{
		desmarcarError('nombre_perfilOcu','errNombrePerfilOcu');	
		if(validarChr($("#nombre_perfilOcu").val()))
		{
			verificar = false; marcarErrorChar('nombre_perfilOcu','errNombrePerfilOcu');			
		}else
		{
			desmarcarError('nombre_perfilOcu','errNombrePerfilOcu');
		}	
	}
	
	//Validar Select de Competencias.
	if($("#id_comp").val() == "")
	{verificar = false; marcarErrorSelect('errSelectComp');}
	else{desmarcarErrorSelect('errSelectComp');}

	return verificar;

}


//============================================================================================================================================================
//=====================================================================VALIDACION EMPRESA=====================================================================
//============================================================================================================================================================

function validarEmpresa(tipo)
{
	var verificar = true;

	//Validar Nombre Empresa.
	if($.trim( $("#nombre_empresa").val()) == "" )
	{
		verificar = false; marcarErrorGeneral('nombre_empresa','errNombreEmpresa');
	}
	else
	{
		desmarcarError('nombre_empresa','errNombreEmpresa');	
		if(validarChr($("#nombre_empresa").val()))
		{
			verificar = false; marcarErrorChar('nombre_empresa','errNombreEmpresa');			
		}else
		{
			desmarcarError('nombre_empresa','errNombreEmpresa');
		}	
	}

	//Validar Razon Social Empresa.
	if($.trim( $("#razon_social_empresa").val()) == "" )
	{
		verificar = false; marcarErrorGeneral('razon_social_empresa','errRazonSocial');
	}
	else
	{
		desmarcarError('razon_social_empresa','errRazonSocial');	
		if(validarChrPunto($("#razon_social_empresa").val()))
		{
			verificar = false; marcarErrorChar('razon_social_empresa','errRazonSocial');			
		}else
		{
			desmarcarError('razon_social_empresa','errRazonSocial');
		}	
	}

	//Validar Rut Matriz.
	if(tipo == '1')
	{
		if($.trim( $("#rut_matriz_empresa").val()) == "" )
		{
			verificar = false; marcarErrorGeneral('rut_matriz_empresa','errRutMatriz');
		}
		else
		{
			desmarcarError('rut_matriz_empresa','errRutMatriz');	
			if(validarRut($("#rut_matriz_empresa").val()))
			{
				verificar = false; marcarErrorRut('rut_matriz_empresa','errRutMatriz');			
			}else
			{
				desmarcarError('rut_matriz_empresa','errRutMatriz');
				if(validarDV($("#rut_matriz_empresa").val()))
				{
					verificar = false; marcarErrorRut('rut_matriz_empresa','errRutMatriz');	
				}
				else
				{
					desmarcarError('rut_matriz_empresa','errRutMatriz');
					if(validarRutAdd()!= "false")
					{
						verificar = false; marcarErrorDuplicado('rut_matriz_empresa','errRutMatriz');
					}
					else{desmarcarError('rut_matriz_empresa','errRutMatriz');}
													
				}
			}	
		}
	}
	

	//Validar Select Giro Empresa.
	if($("#id_giro").val().length == 0)
	{verificar = false; marcarErrorSelect('errSelectGiro');}
	else{desmarcarErrorSelect('errSelectGiro');}

	//Validar Región Empresa y Comuna.
	if($("#id_region").val() == "")
	{
		verificar = false; marcarErrorSelect('errSelectRegion');
	}
	else
	{
		desmarcarErrorSelect('errSelectRegion');		
	}
	if($("#idComuna").val() == "")
	{verificar = false; marcarErrorSelect('errSelectComuna');}
	else
	{desmarcarErrorSelect('errSelectComuna');} 

	//Validar Dirrección Empresa.
	if($.trim( $("#direccion_empresa").val()) == "" )
	{
		verificar = false; marcarErrorGeneral('direccion_empresa','errDirrecionEmpresa');
	}
	else
	{
		desmarcarError('direccion_empresa','errDirrecionEmpresa');	
		if(validarChrPunto($("#direccion_empresa").val()))
		{
			verificar = false; marcarErrorChar('direccion_empresa','errDirrecionEmpresa');			
		}else
		{
			desmarcarError('direccion_empresa','errDirrecionEmpresa');
		}	
	}

	//Validar E-mail.
	if($.trim( $("#email_empresa").val()) == "" )
	{
		verificar = false; marcarErrorGeneral('email_empresa','errEmailEmpresa');
	}
	else
	{desmarcarError('email_empresa','errEmailEmpresa');}

	//Validar Select Empresas Holding.
	var check = $('input[name=tipo_empresa]:checked').val();
	if(check == 1)
	{
		if($("#id_empresa").val() == "")
		{verificar = false; marcarErrorSelect('errSelectEmpresaHolding');}
		else{desmarcarErrorSelect('errSelectEmpresaHolding');}
	}
	else{desmarcarErrorSelect('errSelectEmpresaHolding');}

	return verificar;
	
}

function validarRutAdd()
{
	var verificar;
	$.ajax({
		url: "/validarRutAdd/"+$("#rut_matriz_empresa").val(),
		type: "GET",
		async: false,
		success: function (datos) {
			verificar = datos;
			}
		});
	return verificar;	
}


//============================================================================================================================================================
//=====================================================================VALIDACION USUARIO=====================================================================
//============================================================================================================================================================

function validarUsuario(tipo)
{
	var verificar = true;

	//Validar run usuario
	if(tipo == '1')
	{
		if($.trim( $("#run_usuario").val()) == "" )
		{
			verificar = false; marcarErrorGeneral('run_usuario','errRunUsuario');
		}
		else
		{
			desmarcarError('run_usuario','errRunUsuario');	
			if(validarRut($("#run_usuario").val()))
			{
				verificar = false; marcarErrorRut('run_usuario','errRunUsuario');			
			}else
			{
				desmarcarError('run_usuario','errRunUsuario');
				if(validarDV($("#run_usuario").val()))
				{
					verificar = false; marcarErrorRut('run_usuario','errRunUsuario');	
				}
				else
				{
					desmarcarError('run_usuario','errRunUsuario');
					if(validarRunUsuario()!= "false")
					{
						verificar = false; marcarErrorDuplicado('run_usuario','errRunUsuario');
					}
					else{desmarcarError('run_usuario','errRunUsuario');}	
				}
			}	
		}
	}
	

	//Validar Nombre
	if($.trim( $("#nombre_usuario").val()) == "" )
	{
		verificar = false; marcarErrorGeneral('nombre_usuario','errNombreUsuario');
	}
	else
	{
		desmarcarError('nombre_usuario','errNombreUsuario');	
		if(validarChr($("#nombre_usuario").val()))
		{
			verificar = false; marcarErrorChar('nombre_usuario','errNombreUsuario');			
		}else
		{
			desmarcarError('nombre_usuario','errNombreUsuario');
		}	
	}

	//Validar Apellido Paterno
	if($.trim( $("#apellidopat_usuario").val()) == "" )
	{
		verificar = false; marcarErrorGeneral('apellidopat_usuario','errApellidoP');
	}
	else
	{
		desmarcarError('apellidopat_usuario','errApellidoP');	
		if(validarChr($("#apellidopat_usuario").val()))
		{
			verificar = false; marcarErrorChar('apellidopat_usuario','errApellidoP');			
		}else
		{
			desmarcarError('apellidopat_usuario','errApellidoP');
		}	
	}

	//Validar Apellido Materno
	if($.trim( $("#apellidomat_usuario").val()) == "" )
	{
		verificar = false; marcarErrorGeneral('apellidomat_usuario','errApellidoM');
	}
	else
	{
		desmarcarError('apellidomat_usuario','errApellidoM');	
		if(validarChr($("#apellidomat_usuario").val()))
		{
			verificar = false; marcarErrorChar('apellidomat_usuario','errApellidoM');			
		}else
		{
			desmarcarError('apellidomat_usuario','errApellidoM');
		}	
	}

	//Validar Fecha Nacimiento.
	if($.trim( $("#fechaUsuario").val()) == "" )
	{
		verificar = false; marcarErrorGeneral('fechaUsuario','errFechaUsuario');
	}
	else
	{
		desmarcarError('fechaUsuario','errFechaUsuario');		
	}

	//Validar Sexo.
	var check = $('input[name=sexo_usuario]:checked').val();
	if(check == null)
	{
		verificar = false; marcarErrorSelect('errSexo');
	}
	else
	{desmarcarErrorSelect('errSexo');}

	//Validar e-mail.
	if($.trim( $("#email_usuario").val()) == "" )
	{
		verificar = false; marcarErrorGeneral('email_usuario','errEmail');
	}
	else
	{desmarcarError('email_usuario','errEmail');}

	//Validar Select nacionalidad.
	if($("#id_nacionalidad").val() == "")
	{verificar = false; marcarErrorSelect('errNacionalidad');}
	else{desmarcarErrorSelect('errNacionalidad');}

	//Validar Select Gerencia, Area, Perfil Ocupacional Usuario.
	//Validar Select Perfil
	if($("#id_perfil").val() == "")
	{verificar = false; marcarErrorSelect('errPerfilUsuario');}
	else{desmarcarErrorSelect('errPerfilUsuario');}

	//Validar Select Perfil -> Empresa 
	if($("#id_perfil").val() == 3)
	{	
		//Validar Select Empresa
		if($("#id_empresa").val() == "")
		{
			verificar = false; marcarErrorSelect('errEmpresaUsuario');			
		}
		else
		{
			desmarcarErrorSelect('errEmpresaUsuario');
			//Validar Select Gerencia
			if($("#select_gerencia").val() == null)
			{
			verificar = false; marcarErrorSelect('errGerenciaUsuario');			
			}	
			else
			{
				desmarcarErrorSelect('errGerenciaUsuario');
				//Validar Select Area
				if($("#select_area").val() == null)
				{
				verificar = false; marcarErrorSelect('errAreaUsuario');			
				}	
				else
				{
					desmarcarErrorSelect('errAreaUsuario');
					//Validar Select Perfil Ocupacional
					if($("#select_perfilOcupacional").val() == null)
					{
					verificar = false; marcarErrorSelect('errPerfilOcupacionalUsuario');			
					}	
					else
					{
						desmarcarErrorSelect('errPerfilOcupacionalUsuario');						
					}
				}
			}
		}
	}

	return verificar;

	
}

function validarRunUsuario()
{
	var verificar;
	$.ajax({
		url: "/validarRunUsuario/"+$("#run_usuario").val(),
		type: "GET",
		async: false,
		success: function (datos) {
			verificar = datos;
			}
		});
	return verificar;	
}

//================================================================================================================================================================
//=====================================================================VALIDACION COLABORADOR=====================================================================
//================================================================================================================================================================

function validarColaborador(tipo)
{
	var verificar = true;

	//Validar run Colaborador
	if(tipo == '1')
	{
		if($.trim( $("#run_usuario").val()) == "" )
		{
			verificar = false; marcarErrorGeneral('run_usuario','errRunUsuario');
		}
		else
		{
			desmarcarError('run_usuario','errRunUsuario');	
			if(validarRut($("#run_usuario").val()))
			{
				verificar = false; marcarErrorRut('run_usuario','errRunUsuario');			
			}else
			{
				desmarcarError('run_usuario','errRunUsuario');
				if(validarDV($("#run_usuario").val()))
				{
					verificar = false; marcarErrorRut('run_usuario','errRunUsuario');	
				}
				else
				{
					desmarcarError('run_usuario','errRunUsuario');
					if(validarRunColaborador()!= "false")
					{
						verificar = false; marcarErrorDuplicado('run_usuario','errRunUsuario');
					}
					else{desmarcarError('run_usuario','errRunUsuario');}	
				}
			}	
		}
	}

	//Validar Nombre
	if($.trim( $("#nombre_usuario").val()) == "" )
	{
		verificar = false; marcarErrorGeneral('nombre_usuario','errNombreUsuario');
	}
	else
	{
		desmarcarError('nombre_usuario','errNombreUsuario');	
		if(validarChr($("#nombre_usuario").val()))
		{
			verificar = false; marcarErrorChar('nombre_usuario','errNombreUsuario');			
		}else
		{
			desmarcarError('nombre_usuario','errNombreUsuario');
		}	
	}

	//Validar Apellido Paterno
	if($.trim( $("#apellidopat_usuario").val()) == "" )
	{
		verificar = false; marcarErrorGeneral('apellidopat_usuario','errApellidoP');
	}
	else
	{
		desmarcarError('apellidopat_usuario','errApellidoP');	
		if(validarChr($("#apellidopat_usuario").val()))
		{
			verificar = false; marcarErrorChar('apellidopat_usuario','errApellidoP');			
		}else
		{
			desmarcarError('apellidopat_usuario','errApellidoP');
		}	
	}

	//Validar Apellido Materno
	if($.trim( $("#apellidomat_usuario").val()) == "" )
	{
		verificar = false; marcarErrorGeneral('apellidomat_usuario','errApellidoM');
	}
	else
	{
		desmarcarError('apellidomat_usuario','errApellidoM');	
		if(validarChr($("#apellidomat_usuario").val()))
		{
			verificar = false; marcarErrorChar('apellidomat_usuario','errApellidoM');			
		}else
		{
			desmarcarError('apellidomat_usuario','errApellidoM');
		}	
	}

	//Validar Fecha Nacimiento.
	if($.trim( $("#fechaUsuario").val()) == "" )
	{
		verificar = false; marcarErrorGeneral('fechaUsuario','errFechaUsuario');
	}
	else
	{desmarcarError('fechaUsuario','errFechaUsuario');}

	//Validar Sexo.
	var check = $('input[name=sexo_usuario]:checked').val();
	if(check == null)
	{
		verificar = false; marcarErrorSelect('errSexo');
	}
	else
	{desmarcarErrorSelect('errSexo');}

	//Validar e-mail.
	if($.trim( $("#email_usuario").val()) == "" )
	{
		verificar = false; marcarErrorGeneral('email_usuario','errEmail');
	}
	else
	{desmarcarError('email_usuario','errEmail');}

	//Validar Select nacionalidad.
	if($("#id_nacionalidad").val() == "")
	{verificar = false; marcarErrorSelect('errNacionalidad');}
	else{desmarcarErrorSelect('errNacionalidad');}

	//Validar Select Gerencia, Area, Perfil Ocupacional Usuario.
	//Validar Select Empresa
	if($("#id_empresa").val() == "")
	{
		verificar = false; marcarErrorSelect('errEmpresaUsuario');			
	}
	else
	{
		desmarcarErrorSelect('errEmpresaUsuario');
		//Validar Select Gerencia
		if($("#select_gerencia").val() == null)
		{
		verificar = false; marcarErrorSelect('errGerenciaUsuario');			
		}	
		else
		{
			desmarcarErrorSelect('errGerenciaUsuario');
			//Validar Select Area
			if($("#select_area").val() == null)
			{
			verificar = false; marcarErrorSelect('errAreaUsuario');			
			}	
			else
			{
				desmarcarErrorSelect('errAreaUsuario');
				//Validar Select Perfil Ocupacional
				if($("#select_perfilOcupacional").val() == null)
				{
				verificar = false; marcarErrorSelect('errPerfilOcupacionalUsuario');			
				}	
				else
				{
					desmarcarErrorSelect('errPerfilOcupacionalUsuario');						
				}
			}
		}
	}
	
	return verificar;
}

function validarRunColaborador()
{
	var verificar;
	$.ajax({
		url: "/validarRunColaborador/"+$("#run_usuario").val(),
		type: "GET",
		async: false,
		success: function (datos) {
			verificar = datos;
			}
		});
	return verificar;	
}

//==========================================================================================================================================================
//=====================================================================VALIDACION CURSO=====================================================================
//==========================================================================================================================================================

function validarCurso()
{
	var verificar = true;

	//Validar Codigo Curso Interno
	if($.trim( $("#cod_interno_curso").val()) == "" )
	{
		verificar = false; marcarErrorGeneral('cod_interno_curso','errCodigoCurso');
	}
	else
	{
		desmarcarError('cod_interno_curso','errCodigoCurso');	
		if(validarChr($("#cod_interno_curso").val()))
		{
			verificar = false; marcarErrorChar('cod_interno_curso','errCodigoCurso');			
		}else
		{
			desmarcarError('cod_interno_curso','errCodigoCurso');
		}	
	}

	//Validar Codigo Curso SENCE
	if($.trim( $("#cod_sence_curso").val()) == "" )
	{
		verificar = false; marcarErrorGeneral('cod_sence_curso','errCodigoSenceCurso');
	}
	else
	{
		desmarcarError('cod_sence_curso','errCodigoSenceCurso');	
		if(validarChr($("#cod_sence_curso").val()))
		{
			verificar = false; marcarErrorChar('cod_sence_curso','errCodigoSenceCurso');			
		}else
		{
			desmarcarError('cod_sence_curso','errCodigoSenceCurso');
		}	
	}

	//Validar Nombre Curso 
	if($.trim( $("#nombre_curso").val()) == "" )
	{
		verificar = false; marcarErrorGeneral('nombre_curso','errNombreCurso');
	}
	else
	{
		desmarcarError('nombre_curso','errNombreCurso');	
		if(validarChr($("#nombre_curso").val()))
		{
			verificar = false; marcarErrorChar('nombre_curso','errNombreCurso');			
		}else
		{
			desmarcarError('nombre_curso','errNombreCurso');
		}	
	}

	//Validar Objetivo Curso 
	if($.trim( $("#objetivo_curso").val()) == "" )
	{
		verificar = false; marcarErrorGeneral('objetivo_curso','errObjetivoCurso');
	}
	else
	{
		desmarcarError('objetivo_curso','errObjetivoCurso');	
		if(validarChr($("#objetivo_curso").val()))
		{
			verificar = false; marcarErrorChar('objetivo_curso','errObjetivoCurso');			
		}else
		{
			desmarcarError('objetivo_curso','errObjetivoCurso');
		}	
	}

	//Validar Descripción Curso 
	if($.trim( $("#desc_curso").val()) == "" )
	{
		verificar = false; marcarErrorGeneral('desc_curso','errDescripcionCurso');
	}
	else
	{
		desmarcarError('desc_curso','errDescripcionCurso');	
		if(validarChr($("#desc_curso").val()))
		{
			verificar = false; marcarErrorChar('desc_curso','errDescripcionCurso');			
		}else
		{
			desmarcarError('desc_curso','errDescripcionCurso');
		}	
	}

	//Validar Horas Curso 
	if($.trim( $("#cant_hora_curso").val()) == "" )
	{
		verificar = false; marcarErrorGeneral('cant_hora_curso','errHorasCurso');
	}
	else
	{
		desmarcarError('cant_hora_curso','errHorasCurso');	
		if(validarChr($("#cant_hora_curso").val()))
		{
			verificar = false; marcarErrorChar('cant_hora_curso','errHorasCurso');			
		}else
		{
			desmarcarError('cant_hora_curso','errHorasCurso');
		}	
	}

	//Validar Modalidad 
	if($("#id_modalidad").val() == "")
	{verificar = false; marcarErrorSelect('errModalidad');}
	else{desmarcarErrorSelect('errModalidad');}

	//Validar Area Curso 
	if($("#id_areacurso").val() == "")
	{verificar = false; marcarErrorSelect('errAreaCurso');}
	else{desmarcarErrorSelect('errAreaCurso');}

	//Validar Area Curso 
	if($("#id_competencia").val().length == 0)
	{verificar = false; marcarErrorSelect('errCompetencias');}
	else{desmarcarErrorSelect('errCompetencias');}

	//Validar Contenido Curso 

	//Validar Temario 
	

	return verificar;
}


//==============================================================================================================================================================
//=====================================================================VALIDACION ACTIVIDAD=====================================================================
//==============================================================================================================================================================

function validarActividad()
{
	var verificar = true;

	//Validar Select Curso 
	if($("#id_curso").val() == "")
	{verificar = false; marcarErrorSelect('errIdCurso');}
	else{desmarcarErrorSelect('errIdCurso');}

	//Validar Codigo interno Curso 
	if($.trim( $("#cod_interno_actividad").val()) == "" )
	{
		verificar = false; marcarErrorGeneral('cod_interno_actividad','errCodigoInternoActividad');
	}
	else
	{
		desmarcarError('cod_interno_actividad','errCodigoInternoActividad');	
		if(validarChr($("#cod_interno_actividad").val()))
		{
			verificar = false; marcarErrorChar('cod_interno_actividad','errCodigoInternoActividad');			
		}else
		{
			desmarcarError('cod_interno_actividad','errCodigoInternoActividad');
		}	
	}

	//Validar Codigo Sence Curso 
	if($.trim( $("#cod_sence_actividad").val()) == "" )
	{
		verificar = false; marcarErrorGeneral('cod_sence_actividad','errCodigoSenceActividad');
	}
	else
	{
		desmarcarError('cod_sence_actividad','errCodigoSenceActividad');	
		if(validarChr($("#cod_sence_actividad").val()))
		{
			verificar = false; marcarErrorChar('cod_sence_actividad','errCodigoSenceActividad');			
		}else
		{
			desmarcarError('cod_sence_actividad','errCodigoSenceActividad');
		}	
	}

	//Validar Lugar Curso 
	if($.trim( $("#lugar_realizacion_actividad").val()) == "" )
	{
		verificar = false; marcarErrorGeneral('lugar_realizacion_actividad','errLugarActividad');
	}
	else
	{
		desmarcarError('lugar_realizacion_actividad','errLugarActividad');	
		if(validarChrPunto($("#lugar_realizacion_actividad").val()))
		{
			verificar = false; marcarErrorChar('lugar_realizacion_actividad','errLugarActividad');			
		}else
		{
			desmarcarError('lugar_realizacion_actividad','errLugarActividad');
		}	
	}

	//Validar Fecha Inicio Actividad
	if($.trim( $("#fechaIniActv").val()) == "" )
	{
		verificar = false; marcarErrorGeneral('fechaIniActv','errFechaInicioActividad');
	}
	else
	{desmarcarError('fechaIniActv','errFechaInicioActividad');}

	//Validar Fecha Termino Actividad
	if($.trim( $("#fechaTermActv").val()) == "" )
	{
		verificar = false; marcarErrorGeneral('fechaTermActv','errFechaTerminoActividad');
	}
	else
	{
		desmarcarError('fechaTermActv','errFechaTerminoActividad');
		if(compararFechas( $("#fechaIniActv").val(),$("#fechaTermActv").val() ))
		{
			verificar = false; marcarErrorFecha('fechaTermActv','errFechaTerminoActividad');
		}
		else
		{
			desmarcarError('fechaTermActv','errFechaTerminoActividad');
		}				
	}

	//Validar Observación
	if($.trim( $("#observacion_actividad").val()) == "" )
	{
		verificar = false; marcarErrorGeneral('observacion_actividad','errObservacionActividad');
	}
	else
	{
		desmarcarError('observacion_actividad','errObservacionActividad');	
		if(validarChrPunto($("#observacion_actividad").val()))
		{
			verificar = false; marcarErrorChar('observacion_actividad','errObservacionActividad');			
		}else
		{
			desmarcarError('observacion_actividad','errObservacionActividad');
		}	
	}


	return verificar;
}

//=================================================================================================================================================================
//=====================================================================VALIDACION COMPETENCIAS=====================================================================
//=================================================================================================================================================================

function validarCompetencias()
{
	var verificar = true;

	//Validar Nombre Competencia.
	if($.trim( $("#nombre_comp").val()) == "" )
	{
		verificar = false; marcarErrorGeneral('nombre_comp','errNombreCompetencia');
	}
	else
	{
		desmarcarError('nombre_comp','errNombreCompetencia');	
		if(validarChr($("#nombre_comp").val()))
		{
			verificar = false; marcarErrorChar('nombre_comp','errNombreCompetencia');			
		}else
		{
			desmarcarError('nombre_comp','errNombreCompetencia');
		}	
	}

	//Validar Descripción Competencia.
	if($.trim( $("#desc_comp").val()) == "" )
	{
		verificar = false; marcarErrorGeneral('desc_comp','errDescripcionCompetencia');
	}
	else
	{
		desmarcarError('desc_comp','errDescripcionCompetencia');	
		if(validarChrPunto($("#desc_comp").val()))
		{
			verificar = false; marcarErrorChar('desc_comp','errDescripcionCompetencia');			
		}else
		{
			desmarcarError('desc_comp','errDescripcionCompetencia');
		}	
	}

	//Validar Select Categoria Competencia
	if($("#id_categoriacomp").val() == "")
	{verificar = false; marcarErrorSelect('errCategoriaCompetencia');}
	else{desmarcarErrorSelect('errCategoriaCompetencia');}

	//Validar Nivel Competencia SUPERLATIVO.
	if($.trim( $("#superlativo").val()) == "" )
	{
		verificar = false; marcarErrorGeneral('superlativo','errSuperlativo');
	}
	else
	{
		desmarcarError('superlativo','errSuperlativo');	
		if(validarChrPunto($("#superlativo").val()))
		{
			verificar = false; marcarErrorChar('superlativo','errSuperlativo');			
		}else
		{
			desmarcarError('superlativo','errSuperlativo');
		}	
	}

	//Validar Nivel Competencia EFICIENTE.
	if($.trim( $("#eficiente").val()) == "" )
	{
		verificar = false; marcarErrorGeneral('eficiente','errEficiente');
	}
	else
	{
		desmarcarError('eficiente','errEficiente');	
		if(validarChrPunto($("#eficiente").val()))
		{
			verificar = false; marcarErrorChar('eficiente','errEficiente');			
		}else
		{
			desmarcarError('eficiente','errEficiente');
		}	
	}

	//Validar Nivel Competencia PROMEDIO SUFICIENTE.
	if($.trim( $("#promedioSuficiente").val()) == "" )
	{
		verificar = false; marcarErrorGeneral('promedioSuficiente','errPromedioSuficiente');
	}
	else
	{
		desmarcarError('promedioSuficiente','errPromedioSuficiente');	
		if(validarChrPunto($("#promedioSuficiente").val()))
		{
			verificar = false; marcarErrorChar('promedioSuficiente','errPromedioSuficiente');			
		}else
		{
			desmarcarError('promedioSuficiente','errPromedioSuficiente');
		}	
	}

	//Validar Nivel Competencia POR DEBAJO DE LO ESPERADO.
	if($.trim( $("#porDebajoEsperado").val()) == "" )
	{
		verificar = false; marcarErrorGeneral('porDebajoEsperado','errDebajoEsperado');
	}
	else
	{
		desmarcarError('porDebajoEsperado','errDebajoEsperado');	
		if(validarChrPunto($("#porDebajoEsperado").val()))
		{
			verificar = false; marcarErrorChar('porDebajoEsperado','errDebajoEsperado');			
		}else
		{
			desmarcarError('porDebajoEsperado','errDebajoEsperado');
		}	
	}

	//Validar Nivel Competencia INSUFICIENTE.
	if($.trim( $("#insuficiente").val()) == "" )
	{
		verificar = false; marcarErrorGeneral('insuficiente','errInsuficiente');
	}
	else
	{
		desmarcarError('insuficiente','errInsuficiente');	
		if(validarChrPunto($("#insuficiente").val()))
		{
			verificar = false; marcarErrorChar('insuficiente','errInsuficiente');			
		}else
		{
			desmarcarError('insuficiente','errInsuficiente');
		}	
	}


	return verificar;
}
//============================================================================================================================================================
//=====================================================================VALIDACION HORARIO=====================================================================
//============================================================================================================================================================

function validarHorario()
{
	var verificar = true;


	return verificar;
}


//========================================================================================================================================================================
//=====================================================================VALIDACION ASIGNACIÓN RECURSOS=====================================================================
//========================================================================================================================================================================

function validarAsigRecursos()
{
	var verificar = true;


	return verificar;
}


