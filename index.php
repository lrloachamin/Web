<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Index</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>

<body>
    <?php
    date_default_timezone_set("America/Guayaquil");
    $inicio= 11; # Desde las ocho de la mañana.
    $fin= 16; # Hasta las 16 horas de la tarde.

    $HoraActual = intval(date("H"));// Hora actual del Pais de residencia.
    if ($HoraActual >=  $inicio && $HoraActual < $fin) {
        # Aquí mostrara el acceso permitido al sistema
        header("Location: formulario/login.php");
    } else {
        # Mostrar mensaje de sistema bloqueado, etc.
        echo "<h1 class='texto'>No podemos continuar, consulte con su administrador <br> o inténtelo mas tarde
        <br><br><br>Gracias por visitarnos</h1>";
    }
    ?>
</body>

</html>