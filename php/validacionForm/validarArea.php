<?php
if(isset($_POST['Registrate'])){
    $cont=0;
    if(empty($nombre)){
        echo "<p class='error'>*Agrega una área</p>";
    }else{
        $cont=$cont+1;
    }
    if($cont==1){
        include("area.php");
    }
}
?>