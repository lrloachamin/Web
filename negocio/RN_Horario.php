
<?

require_once("../Data/HorarioDB.php");

class HorarioBT
{

	function generarHorario($curso)
	{
    $Obj_horario=new HorarioDB();
	return $Obj_horario->generarHorario($curso);
	}
	function guardarHorario($idmateria,$dia,$hora,$curso)
 	{
	$Obj_horario=new HorarioDB();
	return $Obj_horario->guardarHorario($idmateria,$dia,$hora,$curso);		
	}
	function mostrarHorario($hora,$dia)
 	{
		$Obj_horario=new HorarioDB();
		return $Obj_horario->mostrarHorario($hora,$dia);
		
	}
	
	
}

?>