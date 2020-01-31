<?php
//require ("../data/conexion.php");
$conexion=mysqli_connect("localhost","admin","admin","proyecto_webfinal");
session_start();

$email=$_POST["email"];
$contrasena=$_POST["passw"];

$consulta="SELECT COUNT(*) as contar from usuario where USUARIO_EMAIL='$email' and USUARIO_PASSWORD='$contrasena'";
$resultado=mysqli_query($conexion,$consulta);
$array=mysqli_fetch_array($resultado);

if(isset($_POST['Iniciar'])){
    if($array['contar']>0){
        $_SESSION['USUARIO_EMAIL']=$email;
        header("location:../formulario/principal.php");
    }
}
?>