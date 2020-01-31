<?php
require('../../php/conexion.php');
$queryArea = "SELECT AREA_ID, AREA_NOMBRE FROM area";
$resultadoArea = $mysqli->query($queryArea);
   
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
    <link rel="stylesheet" href="../css/estiloForm.css">
    <script>
        function sololetra(evento) {
            var key = evento.keyCode || evento.which;
            var teclado = String.fromCharCode(key).toLocaleLowerCase();
            var letras = "abcdefghijklmnñopqrstuvwxyz";

            var teclado_especial = false;
            if (letras.indexOf(teclado) == -1 && !teclado_especial) {
                return false;
            }
        }

        onkeypress = "return sololetra(event)"
    </script>
</head>

<body>
    <h1>Registar Docente</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>">
        <p>Nombre</p>
        <input type="text" class="field" name="nombre" placeholder="Escriba el nombre y apellido" onkeypress = "return sololetra(event)" required> <br />

        <p>Correo electrónico</p>
        <input type="text" class="field" name="email" placeholder="Escriba el correo" required> <br />

        <p>Fecha de nacimiento</p>
        <input type="date" class="field" name="fechaNac" required> <br />

        <p>Horas de trabajo</p>
        <input type="text" class="field" name="horas" placeholder="Escriba las horas de trabajo" required> <br />

        <p>Nivel de Curso</p>
        <input type="text" class="field" name="nivel" placeholder="Escriba " required onkeypress = "return sololetra(event)"> <br />

        <p>Área</p>
        <select id="area" name="area" class="form-control">
            <option value="0">Seleccionar Área</option>
            <?php while($rowArea = $resultadoArea->fetch_assoc()){ ?>
            <option value="<?php echo $rowArea['AREA_ID']; ?>"><?php echo $rowArea['AREA_NOMBRE']; ?></option>
            <?php } ?>
        </select>

        <p class="center-content">
            <input type="submit" name="Registrate" class="btn btn-green" value="Enviar Datos">
        </p>

        <?php
            include("../../php/validacionForm/validarProfesor.php");
            ?>

    </form>
</body>

</html>
