<?php

require ("../negocio/RN_Cliente.php");

$usu_user=$_POST["Usuario"];
$usu_pass=$_POST["Contraseña"];

$Obj_UsuarioBT=new UsuarioBT();
   
if ($result = $Obj_UsuarioBT->verifica_usuario($usu_user,$usu_pass))
{
  if ($result->num_rows > 0) {
    echo '<script languaje="Javascript">location.href="../formularios/inicio2.php"</script>';
  }else{
	  ini_set('error_reporting', E_ALL);
	 echo "El usuario <strong>".$usu_user."</strong> no está registrado.";  
	 echo "<p class='error'>*Agrega un nombre</p>";
    echo '<script languaje="Javascript">location.href="../formularios/descarga.jpg"</script>';
  } 
}
?>