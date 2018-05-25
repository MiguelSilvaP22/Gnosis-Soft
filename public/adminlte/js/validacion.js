
function marcarErrorGeneral(id,idErr){
	document.getElementById(id).style.background='#FFEEEE'; document.getElementById(id).style.borderColor='#FF3333'; 
	document.getElementById(idErr).innerHTML='Campo Obligatorio';
	document.getElementById(idErr).style.color = '#FF3333';

}
function desmarcarErrorGeneral(id,idErr){
	document.getElementById(id).style.background="";
	document.getElementById(id).style.borderColor="";
	document.getElementById(idErr).innerHTML='';
}

function validarGerencia (){
	var verificar = true;
	if($.trim( $("#nombre_gerencia").val()) == "" ){verificar = false; marcarErrorGeneral('nombre_gerencia','errNombreGerencia');}
	else{desmarcarErrorGeneral('nombre_gerencia','errNombreGerencia');}
	return verificar;
    	
};
