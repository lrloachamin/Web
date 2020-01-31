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
        
    function guardar_area($area_nombre)
 	{
    $Obj_config=new conecta();
	$link=mysqli_connect($Obj_config->get_dbhost(),$Obj_config->get_dbuser(),$Obj_config->get_dbpass(),$Obj_config->get_dbname()) or die('No pudo conectarse : ' .mysqli_error());
    $sql= "INSERT INTO area (AREA_NOMBRE)
    VALUES('$area_nombre')";
    $result = mysqli_query($link,"SET NAMES 'utf8'");
    $result=mysqli_query($link, $sql) or die (mysqli_error($link));
	mysqli_close($link); 
	return $result;
	}
        
    function guardar_docente($doc_area,$doc_nombre,$doc_email,$doc_fecha,$doc_horas,$doc_horas,$doc_nivel,$doc_estado)
 	{
    $Obj_config=new conecta();
	$link=mysqli_connect($Obj_config->get_dbhost(),$Obj_config->get_dbuser(),$Obj_config->get_dbpass(),$Obj_config->get_dbname()) or die('No pudo conectarse : ' .mysqli_error());
    $sql= "INSERT INTO profesor (AREA_ID,PROFESOR_NOMBRE,PROFESOR_EMAIL,PROFESOR_FECHANAC,PROFESOR_HORAS,PROFESOR_HORASDISPONIBLES,PROFESOR_NIVEL,PROFESOR_ESTADO)
    VALUES('$doc_area','$doc_nombre','$doc_email','$doc_fecha','$doc_horas','$doc_horas','$doc_nivel','$doc_estado')";
    $result = mysqli_query($link,"SET NAMES 'utf8'");
    $result=mysqli_query($link, $sql) or die (mysqli_error($link));
	mysqli_close($link); 
	return $result;
	}
        
    function guardar_usuario($usu_nombre,$usu_email,$usu_password)
 	{
    $Obj_config=new conecta();
	$link=mysqli_connect($Obj_config->get_dbhost(),$Obj_config->get_dbuser(),$Obj_config->get_dbpass(),$Obj_config->get_dbname()) or die('No pudo conectarse : ' .mysqli_error());
    $sql= "INSERT INTO usuario (USUARIO_NOMBRE,USUARIO_EMAIL,USUARIO_PASSWORD)
    VALUES('$usu_nombre','$usu_email','$usu_password')";
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
	function verifica_usuario($usu_email,$usu_pass){
  	 $config=new conecta();
    $link=mysqli_connect($config->get_dbhost(),$config->get_dbuser(),$config->get_dbpass(),$config->get_dbname()) or die('No pudo conectarse : ' .mysqli_error());
	$sql = "SELECT * FROM usuarios WHERE Correo='$usu_email' and Password='$usu_pass'";
    $result = mysqli_query($link,"SET NAMES 'utf8'");
    $result=mysqli_query($link, $sql) or die (mysqli_error());
	mysqli_close($link); 
	return $result;
	}
	
	
		
 }
?>
