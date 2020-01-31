<?php
    if(isset($_POST['Registrate'])){
        $nombre=$_POST['nombre'];
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
    </script>
</head>

<body>
    <h1>Registar Área</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>">
        <p>Área</p>
        <input type="text" name="nombre" class="field" required placeholder="Escriba el nombre del Área" onkeypress="return sololetra(event)"> <br />

        <p class="center-content">
            <input type="submit" name="Registrate" class="btn btn-green" value="Enviar Datos">
        </p>

        <?php
            include("../../php/validacionForm/validarArea.php");
            ?>

    </form>
</body>

</html>
