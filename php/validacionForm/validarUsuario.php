<?php
if(isset($_POST['Registrate'])){
    $cont=0;
    if(empty($nombre)){
        echo "<p class='error'>*Agrega una área</p>";
    }else{
        $cont=$cont+1;
    }
    if(empty($email)){
        echo "<p class='error'>*Agrega una área</p>";
    }else{
        $cont=$cont+1;
    }
    if(empty($password)){
        echo "<p class='error'>*Agrega una área</p>";
    }else{
        $cont=$cont+1;
    }
    if($cont==3 && $password==$password2){
        include("usuario.php");
    }else{
        echo "<p class='error'>*Contraseñas Incorrectas</p>";
    }
}
?>