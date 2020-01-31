<?php
require ("../../negocio/RN_Cliente.php"); 

    $usu_nombre=$_POST['nombre'];
    $usu_email=$_POST['email'];
    $usu_password=$_POST['password'];
 
   $Obj_UsuarioBT=new UsuarioBT(); 
    if ($Obj_UsuarioBT->guardar_usuario($usu_nombre,$usu_email,$usu_password))
    {
      echo '<script languaje="Javascript">location.href="../formulario/registrarMateria.php"</script>';
    }
    else
    {
      echo "<center><h1>ERROR</h1></center>"; 	  
    } 
?>