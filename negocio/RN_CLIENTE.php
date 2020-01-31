<?

require_once("../../Data/ClienteDB.php");

class UsuarioBT
{
	function verifica_usuario($usu_email,$usu_pass)
	{
    $Obj_usuario=new UsuarioDB();
	return $Obj_usuario->verifica_usuario($usu_email,$usu_pass);
    }
    
    function guardar_area($area_nombre)
	{
    $Obj_usuario=new UsuarioDB();
	return $Obj_usuario->guardar_area($area_nombre);
	}
    
    function guardar_docente($doc_area,$doc_nombre,$doc_email,$doc_fecha,$doc_horas,$doc_horas,$doc_nivel,$doc_estado)
	{
    $Obj_usuario=new UsuarioDB();
	return $Obj_usuario->guardar_docente($doc_area,$doc_nombre,$doc_email,$doc_fecha,$doc_horas,$doc_horas,$doc_nivel,$doc_estado);
	}
    
    function guardar_usuario($usu_nombre,$usu_email,$usu_password)
	{
    $Obj_usuario=new UsuarioDB();
	return $Obj_usuario->guardar_usuario($usu_nombre,$usu_email,$usu_password);
	}
}

?>