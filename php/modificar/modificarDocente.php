<?php

$conexion=mysqli_connect("localhost","admin","admin","proyecto_webfinal");

    $id=$_REQUEST['id'];
    $doc_nombre=$_POST['nombre'];
    $doc_email=$_POST['email'];
    $doc_fecha=$_POST['fechaNac'];
    $doc_horas=$_POST['horas'];
    $doc_nivel=$_POST['nivel'];
    $doc_estado=$_POST['estado'];

 $consulta="UPDATE profesor SET PROFESOR_NOMBRE='$doc_nombre', PROFESOR_EMAIL='$doc_email', PROFESOR_FECHANAC='$doc_fecha', PROFESOR_HORAS='$doc_horas', PROFESOR_NIVEL='$doc_nivel', PROFESOR_ESTADO='$doc_estado'  WHERE PROFESOR_ID='$id'";
 $resultado=mysqli_query($conexion,$consulta);

    if($resultado)
    {
      header("Location: ../../formulario/docente/modificarDatos.php");
    }
    else
    {
      echo "<center><h1>ERROR</h1></center>"; 	  
    } 
?>