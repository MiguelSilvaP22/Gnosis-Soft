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
	if( /^[a-zA-Z0-9- -ñ]*$/.test( TCode ) ) 
	{return false;}
    return true;     
}

//Validación de caracteres con punto.
function validarChrPunto(TCode){
	if( /^[a-zA-Z0-9- -.-ñ]*$/.test( TCode ) ) 
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


//=====================================================================VALIDACION ORGANIGRAMA=====================================================================
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

//=====================================================================VALIDACION EMPRESA=====================================================================
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
				if(tipo == '1')
				{
					if(validarRutAdd()!= "false")
					{
						verificar = false; marcarErrorDuplicado('rut_matriz_empresa','errRutMatriz');
					}
					else{desmarcarError('rut_matriz_empresa','errRutMatriz');}
				}
				if(tipo == '2')
				{
					if(validarRutEdit()!= "false")
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

function validarRutEdit()
{
	var verificar;
	$.ajax({
		url: "/validarRutEdit/"+$("#rut_matriz_empresa").val(),
		type: "GET",
		async: false,
		success: function (datos) {
			verificar = datos;
			}
		});
	return verificar;	
}

//=====================================================================VALIDACION USUARIO=====================================================================
function validarUsuario()
{
	var verificar = true;

	//Validar run usuario
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
			/*
			if($("#select_gerencia").val() == "")
			{
			verificar = false; marcarErrorSelect('errGerenciaUsuario');			
			}	
			else
			{
				desmarcarErrorSelect('errGerenciaUsuario');
				//Validar Select Area
				if($("#select_area").val() == "")
				{
				verificar = false; marcarErrorSelect('errAreaUsuario');			
				}	
				else
				{
					desmarcarErrorSelect('errAreaUsuario');
					//Validar Select Perfil Ocupacional
					if($("#id_perfilocu").val() == "")
					{
					verificar = false; marcarErrorSelect('errPerfilOcupacionalUsuario');			
					}	
					else
					{
						desmarcarErrorSelect('errPerfilOcupacionalUsuario');						
					}
				}
			}*/
		}
	}

	return verificar;
}

//=====================================================================VALIDACION COLABORADOR=====================================================================
function validarColaborador()
{
	
}
