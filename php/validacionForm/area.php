<?php
require ("../../negocio/RN_Cliente.php"); 

 $area_nombre=$_POST["nombre"];
 
   $Obj_UsuarioBT=new UsuarioBT(); 
    if ($Obj_UsuarioBT->guardar_area($area_nombre))
    {
      echo '<script languaje="Javascript">location.href="../formulario/registrarMateria.php"</script>';
    }
    else
    {
      echo "<center><h1>ERROR</h1></center>"; 	  
    } 
?>