
function marcarErrorGeneral(id,idErr){
	document.getElementById(id).style.background='#FFEEEE'; document.getElementById(id).style.borderColor='#FF3333'; 
	document.getElementById(idErr).innerHTML='Campo Obligatorio';
	document.getElementById(idErr).style.color = '#FF3333';
}

function marcarErrorCharGer(id,idErr){
	document.getElementById(id).style.background='#FFEEEE'; document.getElementById(id).style.borderColor='#FF3333'; 
	document.getElementById(idErr).innerHTML='No se permiten caracteres especiales.';
	document.getElementById(idErr).style.color = '#FF3333';
}

function desmarcarErrorGeneral(id,idErr){
	document.getElementById(id).style.background="";
	document.getElementById(id).style.borderColor="";
	document.getElementById(idErr).innerHTML='';
}

function validarGerencia (){
	var verificar = true;
	var error = 0;

	if($.trim( $("#nombre_gerencia").val()) == "" )
	{error = 1;}
	else{desmarcarErrorGeneral('nombre_gerencia','errNombreGerencia');}
	
	if(validarChr($("#nombre_gerencia").val()))
	{error = 2;}
	else{desmarcarErrorGeneral('nombre_gerencia','errNombreGerencia');}
	
	if(error == 1)
	{verificar = false; marcarErrorGeneral('nombre_gerencia','errNombreGerencia');}

	if(error == 2)
	{verificar = false; marcarErrorCharGer('nombre_gerencia','errNombreGerencia');}

	return verificar;
    	
};

function validarChr(TCode){
	if( /^[a-zA-Z0-9- ]*$/.test( TCode ) ) 
	{return false;}
    return true;     
}