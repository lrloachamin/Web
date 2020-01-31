<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../css/estilo.css" rel="stylesheet" type="text/css">
<script src='https://www.google.com/recaptcha/api.js?hl=es'></script>
<script type="text/javascript" src="../js/validacion.js"></script>

<title>Registro</title>
</head>

<body>
<div class="register-box">
<form id="form1" name="form1" method="post" action="">
    <h1><img src="../img/Register.png" width="170" height="135" alt="regi" /></h1>
    <h1>Registro</h1>
       <label>Nombre</label><input type="text" name="nombre" id="nombre" placeholder="Ingrese su nombre" onkeypress="return validarCara(event)"  style="color:#CCC" required/>
        <label>Apellido</label><input type="text" name="apellido" id="apellido" placeholder="Ingrese su apellido" onkeypress="return validarCara(event)" required/>
     <label>Contraseña</label><input type="password" name="pass" id="pass" placeholder="Ingrese su contraseña" required/>
      <label>Confirmar Contraseña</label><input type="password" name="passCon" id="passCon" placeholder="Ingrese nuevamente su contraseña" onblur="confirmarContra()" required/>
      <div id="demo2" style="color:#900"></div>
      
     <label>Email</label><input type="text" name="email" id="email" placeholder="Ingrese su correo" onblur="correoVal('email')" required/>
      <div id="demo" style="color:#900"></div>
     <label>Fecha de Nacimiento</label><input type="date" name="fechaNac" id="FechaNac" placeholder="user" required/>
    

	<center class="g-recaptcha" data-sitekey="6Le2UM0UAAAAAKHgfQ6S-eNcpnyKSlSEj3bSrg5J"></center>
    <p>
      <?php
	require('captcha.php');
	?>
    </p>
    <p>&nbsp;</p>
    <p>
      <input type="submit" value="Registrar">
    </p>
  </form> 
  <br>¿Ya tienes una cuenta?, <a href="../index.html">Iniciar Sesion</a></br>
  
</div>