<?
require ("../negocio/RN_Horario.php"); 
$Obj_HorarioBT=new HorarioBT();
$result=$Obj_HorarioBT->mostrarCursos();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Generar Horarios</title>
<script type="text/javascript" src="../js/impresion.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<link href="../css/horario.css" rel="stylesheet" type="text/css">
</head>

<body>
<div class="contenedor">
		<header class="header">
			<h2>Mostrar Horario</h2>
		</header>
		<main class="contenido">
		
        <form>
        <label>Seleccione</label>
		<select id="curso" name="curso" class="form-control">
                        <option value="0">Seleccionar Curso</option>
                        <?php while($mostrar = mysqli_fetch_assoc($result)){ ?>
                        <option value="<?php echo $mostrar['HORARIO_CURSO']; ?>"><?php echo $mostrar['HORARIO_CURSO']; ?></option>
                        <?php 
						
						} ?>
                        
     </select>
</form>
            
		</main>
		<div class="widget-1" id="resultado">
		 </div>
			<footer class="footer">
            <center>
			<p>Derechos Reservados ©<p>
            <p>Comunicarse al 234567 para mas información</p>
            <p>Derechos Reservados</p>
            </center>
		</footer>
	</div>
    
    <script type="text/javascript">
	$(document).ready(function(){
		//$('#curso').val(1);
		//recargarLista();

		$('#curso').change(function(){
			recargarLista();
		});
	})
</script>
<script type="text/javascript">
	function recargarLista(){
		$.ajax({
			type:"POST",
			url:"horario.php",
			data:"curso=" + $('#curso').val(),
			success:function(r){
				$('#resultado').html(r);
			}
		});
	}
</script>

</body>
</html>