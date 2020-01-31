<?php
require ("../../negocio/RN_Cliente.php"); 

    $doc_nombre=$_POST['nombre'];
    $doc_email=$_POST['email'];
    $doc_fecha=$_POST['fechaNac'];
    $doc_horas=$_POST['horas'];
    $doc_nivel=$_POST['nivel'];
    $doc_area=$_POST['area'];
    $doc_estado=1;
 
   $Obj_UsuarioBT=new UsuarioBT(); 
    if ($Obj_UsuarioBT->guardar_docente($doc_area,$doc_nombre,$doc_email,$doc_fecha,$doc_horas,$doc_horas,$doc_nivel,$doc_estado))
    {
      echo '<script languaje="Javascript">location.href="../formulario/registrarMateria.php"</script>';
    }
    else
    {
      echo "<center><h1>ERROR</h1></center>"; 	  
    } 
?>