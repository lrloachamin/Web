  <?
  $cont=0;
  $datosPro=array();
  $datosArea=array();
  $datos=array();
  $lista_area=array();
  $lista_profesor=array();
$matriz=array();
$idmateria=array();
$idmateria1=array();
$materia=array();
$materia_area=array();
$materia_dispoHoras=array();
$matri_asig=array();
$horas=array();
$config = array();  
$config["sql_host"] = "localhost";  
$config["sql_user"] = "admin";  
$config["sql_pass"] = "admin";  
$config["sql_database"] = "proyecto_f";  
$sql_link = mysql_connect($config['sql_host'], $config['sql_user'], $config['sql_pass']) or die(mysql_error($sql_link));  
mysql_select_db($config['sql_database'],$sql_link); 
    global $config, $sql_link; 
		$cont=0;
		$cont3=0;
		
		//disponibilidad de los profesores 
  
   for($i=0;$i<5;$i++){
            for($j=0;$j<9;$j++){
				$horario = "SELECT asignatura.ASIGNATURA_AREA,asignatura.ASIGNATURA_HORAS FROM horario INNER JOIN asignatura on asignatura.ASIGNATURA_ID=horario.ASIGNATURA_ID WHERE HORARIO_CURSO='1ero' AND HORA='$j' AND HORARI_DIA='$i'";
				$result3 = mysql_query($horario, $sql_link) or die (mysqli_error());
				$cont2=0; 	
				while($ret3 = mysql_fetch_array($result3)){
					$mat[0]=$ret3[0];
					$dispo[0]=$ret3[1];		
				}
				
				$mat1=$mat[0];
				$dispo1=$dispo[0];			
				$sql = "SELECT  * FROM `profesor` WHERE `PROFESOR_AREA`='$mat1'  AND `PROFESOR_HORASDISPONIBLES`>$dispo1 "; 
    			$result1 = mysql_query($sql, $sql_link) or die (mysqli_error());
				$cont1=0;
				
				    while($ret1 = mysql_fetch_array($result1)){
						$profesor_horas[$cont1]=$ret1[4];
						$profesor_id[$cont1]=$ret1[0];
						$prof_id=$profesor_id[$cont1];//recupero el id del profesor 
						$hora = "SELECT  * FROM `horario` WHERE `PROFESOR_ID`='$prof_id' AND `HORA`='$j' AND `HORARI_DIA`='$i'"; 
						$result2 = mysql_query($hora, $sql_link) or die (mysqli_error());
						
						if(mysql_num_rows($result2)==0){
						$profesor[$cont1]=$ret1[1];
						$profesor_area[$cont1]=$ret1[6];
						$datosPro[$cont3]=$profesor[$cont1];
						$datosArea[$cont3]=$profesor_area[$cont1];
						$cont3++;					
						}
						
						$cont1++;
						
					} 
    				mysql_free_result($result1);
			
            }			
      	}
		//recuperar los profesores disponibles 
	$lista_area = array_values(array_unique($datosArea));
	$lista_profesor = array_values(array_unique($datosPro));		
		$max = sizeof($lista_area);
		$max1 = sizeof($lista_profesor);

	echo	"<select>";
	for($i=0;$i<$max;$i++){
		
		echo "<option value='$lista_area[$i]'>".$lista_area[$i]."</option>";
	}
	echo "</select>";
	
	

	

	/*
		for($i=0;$i<$max1;$i++){
		echo $lista_profesor[$i].$i."<br>";
	}
	*/
//	"UPDATE `horario` SET `PROFESOR_ID` = '0' WHERE `horario`.`ASIGNATURA_ID` = 1 AND HORARIO_CURSO='1ero'";
		
?>