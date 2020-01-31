<?php
$cont=0;
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
    // obtener datos del usuario  
$q = "SELECT *FROM `asignatura` WHERE `ASIGNATURA_CURSO`='1ero'"; 
	
    $result = mysql_query($q, $sql_link) or die (mysqli_error());
	$cont=0;
    while($ret = mysql_fetch_array($result)){
		$idmateria[$cont]=$ret[0];
		$materia[$cont]=$ret[1];
		$horas[$cont]=$ret[3];
		$horas_dispo[$cont]=$ret[3];
		$area[$cont]=$ret[6];
			
		$cont++;	
	} 
    mysql_free_result($result);
	echo "la materia es".$idmateria[3];
	
	$sql = "SELECT *FROM `profesor` WHERE `PROFESOR_CURSO`='1ero'"; 
	
    $result1 = mysql_query($sql, $sql_link) or die (mysqli_error());
	$cont1=0;
    while($ret1 = mysql_fetch_array($result1)){
		$profesor_id[$cont1]=$ret1[0];
		$profesor[$cont1]=$ret1[1];
		$profesor_horas[$cont1]=$ret1[4];
		$profesor_area[$cont1]=$ret1[6];
		$cont1++;	
	} 
    mysql_free_result($result1);
	
	

	
	
	$k=4;
	 for($i=0;$i<5;$i++){
            for($j=0;$j<8;$j++){
					//$k=rand (0,9);					
					if($k>10){
						$k=0;
					}
					if($horas[$k]<=0){
										
						$k=rand (0,10);
						while($horas[$k]<=0){
							$k=rand (0,10);
						}
							$idmateria1[$j][$i]=$idmateria[$k];

							$matriz[$j][$i] = $materia[$k];	
							$materia_area[$j][$i]=$area[$k];
							$materia_dispoHoras[$j][$i]=$horas_dispo[$k];
									
							
							$horas[$k]--;
						
					}else{
							
													
							$matriz[$j][$i] = $materia[$k];
							$materia_area[$j][$i]=$area[$k];
							$materia_dispoHoras[$j][$i]=$horas_dispo[$k];
							
							$horas[$k]--;
								if($j % 2!=0){
								$k++;
							}
							
					}
			
           }
    }
	
	

	  
	    for($i=0;$i<5;$i++){
            for($j=0;$j<8;$j++){
				$mat=$materia_area[$j][$i];
				$dispo=$materia_dispoHoras[$j][$i];			
				$sql = "SELECT  * FROM `profesor` WHERE `PROFESOR_AREA`='$mat'  AND `PROFESOR_HORASDISPONIBLES`>$dispo "; 
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
						$matri_asig[$j][$i]= $profesor[$cont1];
						
						}
						
						$cont1++;
						
					} 
    				mysql_free_result($result1);
			
            }		
      	}
		
		
	  for($i=0;$i<8;$i++){
            for($j=0;$j<5;$j++){
                if($matri_asig[$i][$j]==""){
					echo "No se pudo generar el profesor" ;
					
				}
           }
      }

		
		
		
	echo "<table width='auto' border='1'>";
	  for($i=0;$i<8;$i++){
		  echo "<tr>";
            for($j=0;$j<5;$j++){
				
                echo '<td>'.$matriz[$i][$j]."<br>".$matri_asig[$i][$j].'</td>';
            }
		echo "</tr>";			
      }
	echo "</table>";
		
/*
	  
	   for($i=0;$i<8;$i++){
            for($j=0;$j<5;$j++){
                $sql = "INSERT INTO `horario` (`ASIGNATURA_ID`, `PROFESOR_ID`, `HORA`, `HORARI_DIA`, `HORARIO_CURSO`) VALUES ( '1', NULL, '4', '7', '1ero b ')"; 
	
    $result1 = mysql_query($sql, $sql_link) or die (mysqli_error()); 

            }

			
      }
	  */
	 
	 
	  
	
	  
	 
	//insert
						
						
	//update



							
								
//obtener ("asignatura", "ASIGNATURA_ID",$cont, "ASIGNATURA_NOMBRE"); 



?>



 