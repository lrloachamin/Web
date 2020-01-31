<?php
    if(isset($_POST['Registra'])){
        $area=$_POST['area'];
        $asignatura=$_POST['asignatura'];
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Formulario</title>
    <link rel="stylesheet" href="../../css/estiloForm.css">
</head>

<body>
   <?php
    $id=$_REQUEST['id'];
    $conexion=mysqli_connect("localhost","admin","admin","proyecto_webfinal");
    $consulta="SELECT * FROM asignatura WHERE ASIGNATURA_ID = '$id'";
    $resultado=mysqli_query($conexion,$consulta);
    $fila = $resultado->fetch_assoc();
    ?>
   
    <h1 style="text-align: center;">Modificar Materia</h1>
    <form method="post" action="../../php/modificar/modificarMateria.php?id=<?php echo $fila['ASIGNATURA_ID']; ?>">
        <p>Nombre</p>
        <input type="text" name="nombre" value="<?php echo $fila['ASIGNATURA_NOMBRE']; ?>" class="field"> <br />

        <p>Nivel</p>
        <input type="text" name="nivel" value="<?php echo $fila['ASIGNATURA_NIVEL']; ?>" class="field"> <br />

        <p>Estado</p>
        <input type="text" name="estado" value="<?php echo $fila['ASIGNATURA_ESTADO']; ?>" class="field"> <br />

        <p class="center-content">
            <input type="submit" name="Registra" class="btn btn-green" value="Enviar Datos">
        </p>

    </form>
</body>

</html>
