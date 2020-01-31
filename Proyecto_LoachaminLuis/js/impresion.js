// JavaScript Document
function imprimir(nombre,curso) { 
	 var parametros = {"nombre":nombre,"curso":curso};
$.ajax({
    data:parametros,
    url:'../php/generarHorario.php',
    type: 'post',
    beforeSend: function () {
        $("#resultado").html("Procesando, espere por favor");
    },
    success: function (response) {   
        $("#resultado").html(response);
    }
});
	 
}
 