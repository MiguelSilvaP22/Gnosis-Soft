
//Marcar error de inputs
function marcarErrorGeneral(id,idErr){
	/*document.getElementById(id).style.background='#FFEEEE'; document.getElementById(id).style.borderColor='#FF3333'; 
	document.getElementById(idErr).style.color = '#FF3333';*/
	document.getElementById(idErr).innerHTML='Campo Obligatorio';

	$('#'+id).parent().addClass('has-error');

}
function marcarErrorChar(id,idErr){
	/*document.getElementById(id).style.background='#FFEEEE'; document.getElementById(id).style.borderColor='#FF3333'; 
	document.getElementById(idErr).innerHTML='No se permiten caracteres especiales.';
	document.getElementById(idErr).style.color = '#FF3333';*/
	document.getElementById(idErr).innerHTML='No se permiten caracteres especiales.';
	$('#'+id).parent().addClass('has-error');
}
function desmarcarError(id,idErr){
	/*document.getElementById(id).style.background="";
	document.getElementById(id).style.borderColor="";	*/
	document.getElementById(idErr).innerHTML='';
	$('#'+id).parent().removeClass('has-error').addClass('has-success');
}

//Marcar error select
function marcarErrorSelect(idErr){
	document.getElementById(idErr).innerHTML='Campo Obligatorio';
	document.getElementById(idErr).style.color = '#FF3333';

}
function desmarcarErrorSelect(idErr){
	document.getElementById(idErr).innerHTML='';
}

//Validación de caracteres
function validarChr(TCode){
	if( /^[a-zA-Z0-9- ]*$/.test( TCode ) ) 
	{return false;}
    return true;     
}

//Validación Gerencia.
function validarGerencia (){
	var verificar = true;
	var error = 0;

	if($.trim( $("#nombre_gerencia").val()) == "" )
	{error = 1;}
	else{desmarcarError('nombre_gerencia','errNombreGerencia');}
	
	if(validarChr($("#nombre_gerencia").val()))
	{error = 2;}
	else{desmarcarError('nombre_gerencia','errNombreGerencia');}
	
	if(error == 1)
	{verificar = false; marcarErrorGeneral('nombre_gerencia','errNombreGerencia');}

	if(error == 2)
	{verificar = false; marcarErrorChar('nombre_gerencia','errNombreGerencia');}

	return verificar;
    	
};

//Validación Área.
function validarArea (){
	var verificar = true;
	var error = 0;

	if($.trim( $("#nombre_area").val()) == "" )
	{error = 1;}
	else{desmarcarError('nombre_area','errNombreArea');}
	
	if(validarChr($("#nombre_area").val()))
	{error = 2;}
	else{desmarcarError('nombre_area','errNombreArea');}
	
	if(error == 1)
	{verificar = false; marcarErrorGeneral('nombre_area','errNombreArea');}

	if(error == 2)
	{verificar = false; marcarErrorChar('nombre_area','errNombreArea');}

	return verificar;
    	
};

function validarPerfilOcupacional()
{
	var verificar = true;

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
			//if()
		}	
	}
	
	if($("#id_comp").val() == "")
	{verificar = false; marcarErrorSelect('errSelectComp');}
	else{desmarcarErrorSelect('errSelectComp');}

	return verificar;

}
