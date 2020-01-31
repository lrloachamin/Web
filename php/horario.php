
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
			Ingrese Nombre del curso<input type="text" id="nombre" />
            Ingrese el Curso
            <select id="curso">
  				<option value="1ero">1ero de Basica</option>
  				<option value="2do Basica">2do de Basica</option>
                <option value="3ero Basica">3ero de Basica</option>
                <option value="4to Basica">4to de Basica</option>
                <option value="5to Basica">5to de Basica</option>
                <option value="6to Basica">6to de Basica</option>
                <option value="7mo Basica">7mo de Basica</option>
			</select>
        <input type="button" name="enviar" value="Enviar" href="javascript:;" onclick="imprimir($('#nombre').val(),$('#curso').val());">
            
		</main>
		<div class="widget-1" id="resultado">
<?php
require ("../negocio/RN_Horario.php"); 
echo "<table>";
	echo " <thead>
            <th>Horas</th>
		      <th>Lunes</th>
		      <th>Martes</th>
		      <th>Miercoles</th>
		      <th>Jueves </th>
		      <th>Viernes</th>
	        </thead>
			";
	  for($i=0;$i<9;$i++){
		  echo "<tr>";
		   echo '<td>'.$horario[$i].'</td>';
            for($j=0;$j<5;$j++){
				
				if($i==4){
					echo '<td>'."Recreo".'</td>';
					
				}else{
				$Obj_HorarioBT=new HorarioBT();
				$result=$Obj_HorarioBT->mostrarHorario($j,$i);
 				while($ret = mysqli_fetch_array($result)){
				$idmateria[0]=$ret[0];	
				}			
                echo '<td>'.$idmateria[0].'</td>';	
			}
            }
		echo "</tr>";			
      }
	echo "</table>"; 

?>
       
			
		</div>
		<footer class="footer">
			<h3>FOOTER</h3>
		</footer>
	</div>

</body>
</html>



