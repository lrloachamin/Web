<?php
require ("../negocio/RN_Horario.php"); 
//conexion
$config["sql_host"] = "localhost";  
$config["sql_user"] = "admin";  
$config["sql_pass"] = "admin";  
$config["sql_database"] = "proyecto_f";  
$sql_link = mysql_connect($config['sql_host'], $config['sql_user'], $config['sql_pass']) or die(mysql_error($sql_link));  
mysql_select_db($config['sql_database'],$sql_link); 
    global $config, $sql_link;
//variables 
$cont=0;
$matriz=array();
$idmateria=array();
$idmateria1=array();
$materia=array();
$materia_area=array();
$materia_dispoHoras=array();
$matri_asig=array();
$horas=array();
$areaMat=array();
$config = array();
$idprofesor_asig=array();  
$conf=true;
$curso=$_POST['curso'];
//$curso='1ero Bachillerato';
$nombre=$_POST['nombre'];
$nomParalelo=array('A','B','C');
$paralelo=$_POST['paralelo'];
$nombre=$nombre." ".$nomParalelo[$paralelo];
$horario=array('7:00-7:40','7:40-8:20','8:20-9:00','9:00-9:40','10:10-10:50','10:50-11:30','11:30-12:10','12:10-12:50');
$Obj_HorarioBT=new HorarioBT();
    $result = $Obj_HorarioBT->generarHorario($curso);
	$cont=0;
    while($ret = mysqli_fetch_array($result)){
		$idmateria[$cont]=$ret[0];//ide materia
		$areaMat[$cont]=$ret[1];//id del area
		$materia[$cont]=$ret[2];//nombre materia
		$horas[$cont]=$ret[4];//horas
		$horas_dispo[$cont]=$ret[4];//aux horas			
		$cont++;	
	} 
	
    mysqli_free_result($result);
	
	$k=$paralelo;
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
							$idAreaMateria[$j][$i]=$areaMat[$k];
							$materia_dispoHoras[$j][$i]=$horas_dispo[$k];
							$horas[$k]--;
						
					}else{											
							$matriz[$j][$i] = $materia[$k];
							$materia_area[$j][$i]=$area[$k];
							$materia_dispoHoras[$j][$i]=$horas_dispo[$k];
							$idAreaMateria[$j][$i]=$areaMat[$k];
							$idmateria1[$j][$i]=$idmateria[$k];
							
							$horas[$k]--;
								if($j % 2!=0){
								$k++;
							}
							
					}
			
           }
    }
	  
	    for($i=0;$i<5;$i++){
            for($j=0;$j<8;$j++){
				$mat=$idAreaMateria[$j][$i];
				$dispo=$materia_dispoHoras[$j][$i];	
				$result1 = $Obj_HorarioBT->recuperarProfesor($mat,$dispo,$curso);		
				$cont1=0;				
				    while($ret1 = mysqli_fetch_array($result1)){
						$profesor_horas[$cont1]=$ret1[4];
						$profesor_id[$cont1]=$ret1[0];
						$prof_id=$profesor_id[$cont1];//recupero el id del profesor  
						$result2 =$Obj_HorarioBT->verificarHora($prof_id,$j,$i);				
						if(mysqli_num_rows($result2)==0){
						$profesor[$cont1]=$ret1[2];
						$profesor_area[$cont1]=$ret1[6];
						$idprofesor_asig[$j][$i]=$ret1[0];
						$matri_asig[$j][$i]= $profesor[$cont1];				
						}
						
						$cont1++;
						
					} 
    				mysqli_free_result($result1);
			
            }		
      	}
		//verificar si se creo correctamente	
	  for($i=0;$i<8;$i++){
            for($j=0;$j<5;$j++){
                if($matri_asig[$i][$j]==""){
					$conf=false;
					
				}
           }
      }

		
		
	if($conf){	
echo "<table width='100%'>";
	echo " <thead>
            <th>Horas</th>
		      <th>Lunes</th>
		      <th>Martes</th>
		      <th>Miercoles</th>
		      <th>Jueves </th>
		      <th>Viernes</th>
	        </thead>
			";
	  for($i=0;$i<8;$i++){
		  echo "<tr>";
		   echo '<td>'.$horario[$i].'</td>';
            for($j=0;$j<5;$j++){
                echo '<td>'.$matriz[$i][$j]."<br><b>Profesor</b>: ".$matri_asig[$i][$j].'</td>';			
            }
		echo "</tr>";			
      }
	echo "</table>";
	
	
		
	
	  
	   for($i=0;$i<8;$i++){
            for($j=0;$j<5;$j++){
				$idProf=$idprofesor_asig[$i][$j];
				$idAsig=$idmateria1[$i][$j];
              $sql = "INSERT INTO `horario` (`PROFESOR_ID`, `ASIGNATURA_ID`, `HORARIO_HORA`, `HORARIO_DIA`, `HORARIO_CURSO`) VALUES ('$idProf', '$idAsig', '$i', '$j', '$nombre')"; 			  
    $result1 = mysql_query($sql, $sql_link) or die (mysqli_error()); 
	$sql="SELECT PROFESOR_HORASDISPONIBLES FROM `profesor` WHERE `PROFESOR_ID`='$idProf' ";
	$result1 = mysql_query($sql, $sql_link) or die (mysqli_error()); 
	$ret = mysql_fetch_array($result1);
	$horasProfesor=$ret[0]-1;	
	$sql="UPDATE `profesor` SET `PROFESOR_HORASDISPONIBLES` = '$horasProfesor' WHERE `profesor`.`PROFESOR_ID` = '$idProf'";
	  $result1 = mysql_query($sql, $sql_link) or die (mysqli_error()); 

            }			
      }
	}else{
		echo "<div id='error'>
		Corrige los siguientes errores:
		<li>El paralelo ya no esta disponible</li>
		<li>No exiten profesores suficientes para crear el horario</li>
		
		
	</div>";
		
		
	}

	  ?>
      <style>
	  #error {
		font-size:16px;
	background-color:#f1e5e6;
	color:#000;
	height:40%;
}
	  </style>
	  
	  
	
 
