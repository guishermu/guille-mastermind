<?php
require_once "controlador.php";

?>

<!--

RF1 Mostramos la pantalla según estilo (Opciones, Información, Jugada)
RF1.1 Mostrar opciones en Opciones
RF1.2 Mostrar menú de jugada
RF1.3 Mostrar información jugada
RF1 Generamos una clave y la guardamos en sesión  (usa un var_dump para verificar su funcionamiento )
RF2 Botón de reiniciar la clave (guardándola en sesión) (usa un var_dump para verificar su funcionamiento)
RF3 Leer jugada
RF4 evaluar jugada y obtener resultado (posiciones y colores=
RF6 Mostrar / ocular clave
RF7 Mostrar Jugadas
RF7.1 Mostrar Jugada actual
RF7.2 Mostrar Jugadas anteriores ordenadas

-->



<!doctype html>
<html lang="es">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <title>Master Mind - Jugar</title>
    <script>
        function cambia_color(numero) {
            color = document.getElementById("combinacion" + numero).value;
            elemento = document.getElementById("combinacion" + numero);
            elemento.className = color;
        }
    </script>
</head>
<body>


<div class="container">
    <div class="row justify-content-evenly">
        <div class="col-md-5 jugar">
            <h2>OPCIONES</h2>
            <fieldset>
                <legend>Selecciona cuatro colores...</legend>
                <form action="jugar.php" method="POST">
                    <div class="row pb-3">
                        <?= Plantilla::genera_formulario_juego() ?>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-lg d-grid pb-2">
                        <input type="submit" value="Jugar" name="submit">
                        </div>
                        <div class="col-lg d-grid pb-2">
                        <input type="submit" value="<?= $mostrar_ocultar_clave ?>" name="submit">
                        </div>
                        <div class="col-lg d-grid pb-2">
                        <input type="submit" value="Resetear clave" name="submit">
                        </div>
                    </div>
                    <hr>
                    <div class="container">
                            <?= $informacion_clave ?>
                    </div>
                </form>
            </fieldset>
        </div>
        
        <div class="col-md-5 jugar">
            <fieldset>
                <h2>INFORMACIÓN</h2>
                <legend>Sección de información</legend>
                <div class="container">
                    <div class="row">
                        <h3><?= $informacion ?></h3>
                    </div>
                </div>
            </fieldset>
        </div>
    </div>
</div>
</body>

</html>
