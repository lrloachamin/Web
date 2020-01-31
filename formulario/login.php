<?php
require ("../php/validarLogin.php"); 

    if(isset($_POST['Iniciar'])){
        $email=$_POST['email'];
        $contrasena=$_POST['passw'];
    }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <link href="../css/estiloLogin.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="../js/validacion.js"></script>
    <meta http-equiv="Content-Type" content="text/html; 
charset=utf-8" />
    <title>Login</title>
</head>

<body>
    <div1 class="login-box">
        <h1><img src="../img/logo-logi.png" width="135" height="135" alt="logo" /></h1>
        <h1>Iniciar Sesion</h1>
        <form id="form1" name="form1" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" onsubmit="return validarForm()" required />
        <label>Email</label>
        <input type="text" name="email" value="<?php if(isset($email)) echo $email ?>" placeholder="Ingrese su correo" id="email" onblur="correoVal('email')" required />
        <div id="demo" style="color:#900"></div>
        <label>Contraseña</label>
        <input type="password" name="passw" placeholder="Ingrese su contraseña" id="Contraseña" required />
        <input type="submit" name="Iniciar" value="Ingresar">
        <?php
        if(isset($_POST['Iniciar'])){
            if($array['contar']==0){
                echo "<p class='error'> Usuario o Contraseña  incorrecta </p>" ;
            }
        }
        ?>
        </form>
    </div1>
</body>

</html>
