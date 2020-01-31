<?php	
	require_once('conexion.php');
	
	class HorarioDB
	{
		function generarHorario($curso)
 	{
    		$config=new conecta();
			$link=mysqli_connect($config->get_dbhost(),$config->get_dbuser(),$config->get_dbpass(),$config->get_dbname()) or die('No pudo conectarse : ' .mysqli_error());
    		$sql= "SELECT *FROM `asignatura` WHERE `ASIGNATURA_NIVEL`='$curso'";
			$result = mysqli_query($link,"SET NAMES 'utf8'");
			$result=mysqli_query($link, $sql) or die (mysqli_error($link));
	mysqli_close($link); 
	return $result;
	}
		function recuperarProfesor($mat,$dispo,$curso)
 	{
    		$config=new conecta();
			$link=mysqli_connect($config->get_dbhost(),$config->get_dbuser(),$config->get_dbpass(),$config->get_dbname()) or die('No pudo conectarse : ' .mysqli_error());
    		$sql= "SELECT  * FROM `profesor` WHERE `AREA_ID`='$mat'  AND `PROFESOR_HORASDISPONIBLES`>$dispo AND `PROFESOR_NIVEL`='$curso' ";
			$result = mysqli_query($link,"SET NAMES 'utf8'");
			$result=mysqli_query($link, $sql) or die (mysqli_error($link));
	mysqli_close($link); 
	return $result;
	}
		function verificarDisponibilidad($mat,$dispo)
 	{
    		$config=new conecta();
			$link=mysqli_connect($config->get_dbhost(),$config->get_dbuser(),$config->get_dbpass(),$config->get_dbname()) or die('No pudo conectarse : ' .mysqli_error());
    		$sql= "SELECT  * FROM `profesor` WHERE `AREA_ID`='$mat'  AND `PROFESOR_HORASDISPONIBLES`>$dispo ";
			$result = mysqli_query($link,"SET NAMES 'utf8'");
			$result=mysqli_query($link, $sql) or die (mysqli_error($link));
	mysqli_close($link); 
	return $result;
	}
			function verificarHora($prof_id,$hora,$dia)
 	{
    		$config=new conecta();
			$link=mysqli_connect($config->get_dbhost(),$config->get_dbuser(),$config->get_dbpass(),$config->get_dbname()) or die('No pudo conectarse : ' .mysqli_error());
    		$sql="SELECT  * FROM `horario` WHERE `PROFESOR_ID`='$prof_id' AND `HORARIO_HORA`='$hora' AND `HORARIO_DIA`='$dia'";
			$result = mysqli_query($link,"SET NAMES 'utf8'");
			$result=mysqli_query($link, $sql) or die (mysqli_error($link));
	mysqli_close($link); 
	return $result;
	}
	
	
	
			function guardarHorario($idProf,$idAsig,$i,$j,$curso)
 	{
    		$config=new conecta();
			$link=mysqli_connect($config->get_dbhost(),$config->get_dbuser(),$config->get_dbpass(),$config->get_dbname()) or die('No pudo conectarse : ' .mysqli_error());
    		$sql = "INSERT INTO `horario` (`PROFESOR_ID`, `ASIGNATURA_ID`, `HORARIO_HORA`, `HORARIO_DIA`, `HORARIO_CURSO`) VALUES ('$idProf', '$idAsig', '$i', '$j', '$curso')";
			$result = mysqli_query($link,"SET NAMES 'utf8'");
			$result=mysqli_query($link, $sql) or die (mysqli_error($link));
	mysqli_close($link); 
	return $result;
	
		
	}
				function seleccionarProfesor($idProf)
 	{
    		$config=new conecta();
			$link=mysqli_connect($config->get_dbhost(),$config->get_dbuser(),$config->get_dbpass(),$config->get_dbname()) or die('No pudo conectarse : ' .mysqli_error());
    		$sql = "SELECT PROFESOR_HORASDISPONIBLES FROM `profesor` WHERE `PROFESOR_ID`='$idProf'";
			$result = mysqli_query($link,"SET NAMES 'utf8'");
			$result=mysqli_query($link, $sql) or die (mysqli_error($link));
	mysqli_close($link); 
	return $result;
	
		
	}
		function actualizarHorasProfesor($idProf,$horasProfesor)
 	{
    		$config=new conecta();
			$link=mysqli_connect($config->get_dbhost(),$config->get_dbuser(),$config->get_dbpass(),$config->get_dbname()) or die('No pudo conectarse : ' .mysqli_error());
    		$sql = "UPDATE `profesor` SET `PROFESOR_HORASDISPONIBLES` = '$horasProfesor' WHERE `profesor`.`PROFESOR_ID` = '$idProf'";
			$result = mysqli_query($link,"SET NAMES 'utf8'");
			$result=mysqli_query($link, $sql) or die (mysqli_error($link));
	mysqli_close($link); 
	return $result;
	
		
	}
	
	function mostrarCursos(){
			$config=new conecta();
			$link=mysqli_connect($config->get_dbhost(),$config->get_dbuser(),$config->get_dbpass(),$config->get_dbname()) or die('No pudo conectarse : ' .mysqli_error());
    		$sql= "SELECT  HORARIO_CURSO FROM horario group by HORARIO_CURSO ";
			$result = mysqli_query($link,"SET NAMES 'utf8'");
			$result=mysqli_query($link, $sql) or die (mysqli_error($link));
	mysqli_close($link); 
	return $result;
		
		
	}
	
	
		function mostrarHorario($dia,$hora,$curso)
 	{
    		$config=new conecta();
			$link=mysqli_connect($config->get_dbhost(),$config->get_dbuser(),$config->get_dbpass(),$config->get_dbname()) or die('No pudo conectarse : ' .mysqli_error());
    		$sql= "SELECT asignatura.ASIGNATURA_NOMBRE FROM horario INNER JOIN asignatura on asignatura.ASIGNATURA_ID=horario.ASIGNATURA_ID WHERE HORARIO_HORA='$dia' AND HORARIO_DIA='$hora' AND HORARIO_CURSO='$curso'";
			$result = mysqli_query($link,"SET NAMES 'utf8'");
			$result=mysqli_query($link, $sql) or die (mysqli_error($link));
	mysqli_close($link); 
	return $result;
	}
	
	}
?>