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
    if(empty($fecha)){
        echo "<p class='error'>*Agrega una área</p>";
    }else{
        $cont=$cont+1;
    }
    if(empty($horas)){
        echo "<p class='error'>*Agrega una área</p>";
    }else{
        $cont=$cont+1;
    }
    if(empty($nivel)){
        echo "<p class='error'>*Agrega una área</p>";
    }else{
        $cont=$cont+1;
    }
    if(empty($area)){
        echo "<p class='error'>*Agrega una área</p>";
    }else{
        $cont=$cont+1;
    }
    if($cont==6){
        include("docente.php");
    }
}
?>