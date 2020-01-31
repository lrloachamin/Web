<?php   
    if(isset($_POST['Registrate'])){
        $nombre=$_POST['nombre'];
        $email=$_POST['email'];
        $fecha=$_POST['fechaNac'];
        $horas=$_POST['horas'];
        $nivel=$_POST['nivel'];
        $area=$_POST['area'];
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
    $conexion=mysqli_connect("localhost","admin","admin","proyecto_f");
    $consulta="SELECT * FROM profesor WHERE PROFESOR_ID = '$id'";
    $resultado=mysqli_query($conexion,$consulta);
    $fila = $resultado->fetch_assoc();
    ?>

    <h1 style="text-align: center;">Modificar Docente</h1>
    <form method="post" action="../../php/modificar/modificarDocente.php?id=<?php echo $fila['PROFESOR_ID']; ?>">
        <p>Nombre</p>
        <input type="text" class="field" name="nombre" value="<?php echo $fila['PROFESOR_NOMBRE']; ?>" placeholder="Escriba el nombre y apellido" required> <br />

        <p>Correo electrónico</p>
        <input type="text" class="field" name="email" value="<?php echo $fila['PROFESOR_EMAIL']; ?>" placeholder="Escriba el correo" required> <br />

        <p>Fecha de nacimiento</p>
        <input type="date" class="field" name="fechaNac" value="<?php echo $fila['PROFESOR_FECHANAC']; ?>" required> <br />

        <p>Horas de trabajo</p>
        <input type="text" class="field" name="horas" value="<?php echo $fila['PROFESOR_HORAS']; ?>" placeholder="Escriba las horas de trabajo" required> <br />

        <p>Nivel de Curso</p>
        <input type="text" class="field" name="nivel" value="<?php echo $fila['PROFESOR_NIVEL']; ?>" placeholder="Escriba " required> <br />

        <p>Estado</p>
        <input type="text" class="field" name="estado" value="<?php echo $fila['PROFESOR_ESTADO']; ?>" placeholder="Escriba " required> <br />

        <p class="center-content">
            <input type="submit" name="Registrate" class="btn btn-green" value="Enviar Datos">
        </p>

    </form>
</body>

</html>
