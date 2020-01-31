// JavaScript Document
function validarLogin(){
	var nombre=document.getElementById("Usuario").value;
	var pass=document.getElementById("Contraseña").value;
	validarCaracter(nombre);
}
//funcion que valida solo caracteres
function validarCaracter(caracter){
	var conf;
	r=caracter;
	if (/^([A-Za-z\s])*$/.test(r)){
		conf=true;
	}
	else{
		conf=false;
	}
	return conf;
		
}
function textoVacio(num){
	var texto=[];
	texto=document.getElementsByTagName("input");
	var x;
	x=texto[num].value;
	if(!validarCaracter(x)){
	texto[num].style.backgroundColor="#900";
	texto[num].style.color="white";
	document.getElementById("demo").innerHTML = "*Ingrese solo caracteres";
	}else{
	texto[num].style.backgroundColor="black";
	texto[num].style.color="white";
	document.getElementById("demo").innerHTML = "";
		
	}
	
}
function validarForm(){
	var texto=[];
	texto=document.getElementById("email");
	var x;
	x=texto.value;
	if(correoVal()){
		return true;	
	}else{
		alert("Datos Erroneos");
		return false;	
	}
}
function validarCara(e)
{
    tecla = (document.all) ? e.keyCode : e.which;
    if (tecla == 8) return true;
    patron =/[A-Za-z\s]/g;
    te = String.fromCharCode(tecla);
    return patron.test(te);
}


function validarCorreo(email){
	r=email;
	var emailVal=/^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
	if (emailVal.test(r)){
		conf=true;
	}
	else{
		conf=false;
	}
	return conf;
}
function correoVal(id){
	var texto;
	texto=document.getElementById(id);
	var x;
	x=texto.value;
	if(!validarCorreo(x)){
	texto.style.backgroundColor="#900";
	texto.style.color="white";
	document.getElementById("demo").innerHTML = "*Ingrese un correo valido";
	conf=false;
	}else{
	texto.style.backgroundColor="black";
	texto.style.color="white";
	document.getElementById("demo").innerHTML = "";
	conf=true;		
	}
	return conf;	
}

function confirmarContra(){
	var contraseña=document.getElementById("pass").value;
	var texto=document.getElementById("passCon");
	var contraseñaCon=texto.value;
	
	if(contraseña!=contraseñaCon){
		texto.style.backgroundColor="#900";
		texto.style.color="white";
		document.getElementById("demo2").innerHTML = "*Las contraseñas no coinciden";
		conf=false;	
	}else{
		texto.style.backgroundColor="black";
		texto.style.color="white";
		document.getElementById("demo2").innerHTML = "";
		conf=true;	
	}
return conf;
	
}
