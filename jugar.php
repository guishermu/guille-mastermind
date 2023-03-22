<?php
require_once "controlador.php";
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <title>Master Mind - Jugar</title>
</head>

<body>
    <main>
        <h1 class="d-none">Master Mind</h1>
        <div class="container">
            <div class="row justify-content-evenly">
                <div class="col-md-5 jugar">
                    <h2 class="pb-2">Opciones</h2>
                    <fieldset>
                        <legend>Selecciona cuatro colores...</legend>
                        <form action="jugar.php" method="POST">
                            <div class="row pb-3">
                                <?= Plantilla::genera_formulario_juego() ?>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-lg d-grid pb-2">
                                    <input type="submit" name="submit" value="Jugar">
                                </div>
                                <div class="col-lg d-grid pb-2">
                                    <input type="submit" name="submit" value="<?= $mostrar_ocultar_clave ?>">
                                </div>
                                <div class="col-lg d-grid pb-2">
                                    <input type="submit" name="submit" id="reset_clave" value="Resetear clave">
                                </div>
                            </div>
                            <hr>
                            <?= $informacion_clave ?>
                        </form>
                    </fieldset>
                </div>
                <div class="col-md-5 jugar">
                    <?= $informacion ?>
                </div>
            </div>
        </div>
    </main>
    <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
</body>

</html>