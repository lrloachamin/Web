<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Inicio</title>
    <link href="../css/principal.css" rel="stylesheet" type="text/css">
</head>
<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#crearUsuario').on('click', function() {
            $.ajax({
                type: "POST",
                url: "usuario/registrarse.php",
                success: function(response) {
                    $('#div-results').html(response);
                }
            });
        });

        $('#crearArea').on('click', function() {
            $.ajax({
                type: "POST",
                url: "area/registrar.php",
                success: function(response) {
                    $('#div-results').html(response);
                }
            });
        });

        $('#crearDocente').on('click', function() {
            $.ajax({
                type: "POST",
                url: "docente/registrar.php",
                success: function(response) {
                    $('#div-results').html(response);
                }
            });
        });
		  $('#generarHorario').on('click', function() {
            $.ajax({
                type: "POST",
                url: "generarHorarios.html",
                success: function(response) {
                    $('#div-results').html(response);
                }
            });
        });
		  $('#mostrarHorario').on('click', function() {
            $.ajax({
                type: "POST",
                url: "../php/mostrarHorario.php",
                success: function(response) {
                    $('#div-results').html(response);
                }
            });
        });
		

    });
	
	
	

</script>

<body>
    <div class="contenedor">
        <header class="header">
            <center>
                <h2>Generador de Horarios</h2>
            </center>
        </header>
        <main class="contenido">
            <ul class="nav">
                <li><a href="#">Usuario</a>
                    <ul>
                        <li><a class="crearUsuario" id="crearUsuario">Crear</a></li>
                        <li><a href="#">Modificar</a></li>
                    </ul>
                </li>
                <li><a href="#">Docente</a>
                    <ul>
                        <li><a class="crearDocente" id="crearDocente">Crear</a></li>
                        <li><a href="docente/modificarDatos.php">Modificar</a></li>
                    </ul>
                </li>
                <li><a href="#">Área</a>
                    <ul>
                        <li><a class="crearArea" id="crearArea">Crear</a></li>
                        <li><a href="#">Modificar</a></li>
                    </ul>
                </li>
                <li><a href="#">Materia</a>
                    <ul>
                        <li><a class="crearMateria">Crear</a></li>
                        <li><a href="materia/modificarDatos.php" id="modificarMateria">Modificar</a></li>
                    </ul>
                </li>
                   
                </li>
                    
                 <li><a href="#" id="generarHorario">Generar Horario</a>
                 <li><a href="#" id="mostrarHorario" >Mostrar Horario</a>
            </ul>
        </main>

        <div class="widget-1">
            <div id="div-results">
           <img src="../img/prin.jpg"  height="100%" width="100%"/>
            
            </div>
        </div>

        <footer class="footer">
            <center>
                <p>Derechos Reservados ©<p>
                        <p>Comunicarse al 234567 para mas información</p>
                        <p>Derechos Reservados</p>
            </center>
        </footer>
    </div>
</body>

</html>
