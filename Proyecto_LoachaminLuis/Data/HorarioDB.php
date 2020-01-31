<?php	
	require_once('conexion.php');
	
	class HorarioDB
	{
		function generarHorario($curso)
 	{
    		$config=new conecta();
			$link=mysqli_connect($config->get_dbhost(),$config->get_dbuser(),$config->get_dbpass(),$config->get_dbname()) or die('No pudo conectarse : ' .mysqli_error());
    		$sql= "SELECT *FROM `asignatura` WHERE `ASIGNATURA_CURSO`='$curso'";
			$result = mysqli_query($link,"SET NAMES 'utf8'");
			$result=mysqli_query($link, $sql) or die (mysqli_error($link));
	mysqli_close($link); 
	return $result;
	}
			function guardarHorario($idmateria,$dia,$hora,$curso)
 	{
    		$config=new conecta();
			$link=mysqli_connect($config->get_dbhost(),$config->get_dbuser(),$config->get_dbpass(),$config->get_dbname()) or die('No pudo conectarse : ' .mysqli_error());
    		$sql = "INSERT INTO `horario` (`ASIGNATURA_ID`, `PROFESOR_ID`, `HORA`, `HORARI_DIA`, `HORARIO_CURSO`) VALUES ( '$idmateria', NULL, '$hora', '$dia', '$curso')";
			$result = mysqli_query($link,"SET NAMES 'utf8'");
			$result=mysqli_query($link, $sql) or die (mysqli_error($link));
	mysqli_close($link); 
	return $result;
	
		
	}
		function mostrarHorario($dia,$hora)
 	{
    		$config=new conecta();
			$link=mysqli_connect($config->get_dbhost(),$config->get_dbuser(),$config->get_dbpass(),$config->get_dbname()) or die('No pudo conectarse : ' .mysqli_error());
    		$sql= "SELECT asignatura.ASIGNATURA_NOMBRE FROM horario INNER JOIN asignatura on asignatura.ASIGNATURA_ID=horario.ASIGNATURA_ID WHERE HORA='$hora' AND HORARI_DIA='$dia'";
			$result = mysqli_query($link,"SET NAMES 'utf8'");
			$result=mysqli_query($link, $sql) or die (mysqli_error($link));
	mysqli_close($link); 
	return $result;
	}
	
	}
?>