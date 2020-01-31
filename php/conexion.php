<?

$mysqli = new mysqli("localhost","admin","admin","proyecto_f");

if(mysqli_connect_errno()){
    echo 'Comexion Fallidad : ',mysqli_connect_error();
    exit();
}

?>