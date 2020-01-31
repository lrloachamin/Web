<?php

$conexion=mysqli_connect("localhost","admin","admin","proyecto_webfinal");

 $id=$_REQUEST['id'];
 $mat_nombre=$_POST["nombre"];
 $mat_nivel=$_POST["nivel"];
 $mat_estado=$_POST["estado"];

 $consulta="UPDATE asignatura SET ASIGNATURA_NOMBRE='$mat_nombre', ASIGNATURA_NIVEL='$mat_nivel', ASIGNATURA_ESTADO='$mat_estado' WHERE ASIGNATURA_ID='$id'";
 $resultado=mysqli_query($conexion,$consulta);

    if($resultado)
    {
      header("Location: ../../formulario/materia/modificarDatos.php");
    }
    else
    {
      echo "<center><h1>ERROR</h1></center>"; 	  
    } 
?>