
<?

require_once("../Data/HorarioDB.php");

class HorarioBT
{

	function generarHorario($curso)
	{
    $Obj_horario=new HorarioDB();
	return $Obj_horario->generarHorario($curso);
	}
	function mostrarHorario($hora,$dia,$curso)
 	{
		$Obj_horario=new HorarioDB();
		return $Obj_horario->mostrarHorario($hora,$dia,$curso);
		
	}
		function recuperarProfesor($mat,$dispo,$curso)
 	{
			$Obj_horario=new HorarioDB();
		return $Obj_horario->recuperarProfesor($mat,$dispo,$curso);
		
	}
		function verificarDisponibilidad($mat,$dispo)
 	{
		$Obj_horario=new HorarioDB();
		return $Obj_horario->verificarDisponibilidad($mat,$dispo);
		
	}
			function verificarHora($prof_id,$hora,$dia)			
 	{
		$Obj_horario=new HorarioDB();
		return $Obj_horario->verificarHora($prof_id,$hora,$dia);
	}
			function guardarHorario($idProf,$idAsig,$i,$j,$curso)
 	{
		$Obj_horario=new HorarioDB();
		return $Obj_horario->guardarHorario($idProf,$idAsig,$i,$j,$curso);
		
	}
	function seleccionarProfesor($idProf)
 	{
		$Obj_horario=new HorarioDB();
		return $Obj_horario->seleccionarProfesor($idProf);
		
	}
		function actualizarHorasProfesor($idProf,$horasProfesor)
 	{
		$Obj_horario=new HorarioDB();
		return $Obj_horario->actualizarHorasProfesor($idProf,$horasProfesor);
		
	}
	function mostrarCursos(){
		$Obj_horario=new HorarioDB();
		return $Obj_horario->mostrarCursos();
	}
	
    	
	
	
}

?>