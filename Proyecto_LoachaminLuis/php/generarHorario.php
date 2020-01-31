<?php
require ("../negocio/RN_Horario.php"); 
$matriz=array();
$idmateria=array();
$idAsignatura=array();
$materia=array();
$materia_area=array();
$materia_dispoHoras=array();
$matri_asig=array();
$horas=array();
$Obj_HorarioBT=new HorarioBT();
$curso=$_POST['curso'];
$result=$Obj_HorarioBT->generarHorario($curso);
 $cont=0;
$horario=array('7:00-7:40','7:40-8:20','8:20-9:00','9:00-9:40','9:40-10:10','10:10-10:50','10:50-11:30','11:30-12:10','12:10-12:50');
 //Recuperacion de los datos de la DB por curso
    while($ret = mysqli_fetch_array($result)){
		$idmateria[$cont]=$ret[0];
		$materia[$cont]=$ret[1];
		$horas[$cont]=$ret[3];
		$area[$cont]=$ret[6];		
		$cont++;	
	}
	echo $idmateria[3];


	$k=2;
	 for($i=0;$i<5;$i++){
         for($j=0;$j<9;$j++){
			 if($j==4){
				 $matriz[$j][$i] = "Recreo";
				 $Obj_HorarioBT->guardarHorario(1,$i,$j,$curso);
			 
			 }else{
			 
				if($k>10){
						$k=0;
				}
				if($horas[$k]<=0){									
					$k=rand (0,10);
						while($horas[$k]<=0){
							$k=rand (0,10);
						}
	
						$Obj_HorarioBT->guardarHorario($idmateria[$k],$i,$j,$curso); 
						$matriz[$j][$i] = $materia[$k];	
						$materia_area[$j][$i]=$area[$k];
						$materia_dispoHoras[$j][$i]=$horas_dispo[$k];							
						$horas[$k]--;
						
				}else{	
						
						$Obj_HorarioBT->guardarHorario($idmateria[$k],$i,$j,$curso);  												
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
    }
		
	echo "<table>";
	echo " <thead>
            <th>Horas</th>
		      <th>Lunes</th>
		      <th>Martes</th>
		      <th>Miercoles</th>
		      <th>Jueves </th>
		      <th>Viernes</th>
	        </thead>
			";
	  for($i=0;$i<9;$i++){
		  echo "<tr>";
		   echo '<td>'.$horario[$i].'</td>';
            for($j=0;$j<5;$j++){
                echo '<td>'.$matriz[$i][$j].'</td>';			
            }
		echo "</tr>";			
      }
	echo "</table>";
	

	
	
	  
	  
	  
		
	?>
   
	
	
 
