<?php
    if(isset($_POST['Registrate'])){
        $nombre=$_POST['nombre'];
        $email=$_POST['email'];
        $password=$_POST['password'];
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

        function validarForm() {
            var texto = [];
            texto = document.getElementById("email");
            var x;
            x = texto.value;
            if (correoVal()) {
                return true;
            } else {
                alert("Datos Erroneos");
                return false;
            }
        }

        function validarCorreo(email) {
            r = email;
            var emailVal = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
            if (emailVal.test(r)) {
                conf = true;
            } else {
                conf = false;
            }
            return conf;
        }

        function correoVal(id) {
            var texto;
            texto = document.getElementById(id);
            var x;
            x = texto.value;
            if (!validarCorreo(x)) {
                texto.style.backgroundColor = "#900";
                texto.style.color = "white";
                document.getElementById("demo").innerHTML = "*Ingrese un correo valido";
                conf = false;
            } else {
                texto.style.backgroundColor = "black";
                texto.style.color = "white";
                document.getElementById("demo").innerHTML = "";
                conf = true;
            }
            return conf;
        }

    </script>
</head>

<body>
    <h1>Registar Usuario</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" onsubmit="return validarForm()" required>
        <p>Nombre</p>
        <input type="text" name="nombre" class="field" placeholder="Escriba su nombre y apellido" onkeypress="return sololetra(event)" required> <br />

        <p>Correo electrónico</p>
        <input type="text" name="email" id="email" class="field" placeholder="Escriba su correo" onblur="correoVal('email')" required> <br />
        <div id="demo" style="color:#900"></div>
        <p>Contraseña</p>
        <input type="text" name="password" class="field" placeholder="Escriba su contraseña" required> <br />

        <p class="center-content">
            <input type="submit" name="Registrate" class="btn btn-green" value="Enviar Datos">
        </p>

        <?php
            include("../../php/validacionForm/validarUsuario.php");
            ?>

    </form>
</body>

</html>
