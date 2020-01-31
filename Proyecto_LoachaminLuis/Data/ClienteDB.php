<?php	
	require_once('conexion.php');
  
	class UsuarioDB
	{


 	function guardar($curso)
 	{
    $config=new conecta();
	$link=mysqli_connect($config->get_dbhost(),$config->get_dbuser(),$config->get_dbpass(),$config->get_dbname()) or die('No pudo conectarse : ' .mysqli_error());
    $sql= "SELECT *FROM `asignatura` WHERE `ASIGNATURA_CURSO`='1ero'";
$result = mysqli_query($link,"SET NAMES 'utf8'");
$result=mysqli_query($link, $sql) or die (mysqli_error($link));
	mysqli_close($link); 
	return $result;
	}
	
	function recuperar($usu_email)
 	{
    $config=new conecta();
	$link=mysqli_connect($config->get_dbhost(),$config->get_dbuser(),$config->get_dbpass(),$config->get_dbname()) or die('No pudo conectarse : ' .mysqli_error());
    $sql= "SELECT *FROM personal WHERE Email='$usu_email'";
$result = mysqli_query($link,"SET NAMES 'utf8'");
$result=mysqli_query($link, $sql) or die (mysqli_error($link));
	mysqli_close($link); 
	return $result;
	}
	function mostrar()
 	{
    $config=new conecta();
	$link=mysqli_connect($config->get_dbhost(),$config->get_dbuser(),$config->get_dbpass(),$config->get_dbname()) or die('No pudo conectarse : ' .mysqli_error());
    $sql= "SELECT *FROM personal";
$result = mysqli_query($link,"SET NAMES 'utf8'");
$result=mysqli_query($link, $sql) or die (mysqli_error($link));
	mysqli_close($link); 
	return $result;
	}
	
		
 }
?>
