<?php
$carga = fn($clase) => require("./clases/$clase.php");
spl_autoload_register($carga);
session_start();

$clave = Clave::obtener_clave();
$jugadas = $_SESSION['jugadas'];
$win = $_GET['win'] ?? "";
$intento = sizeof($_SESSION['jugadas']);

if ($win) {
    $msj = "<h1>Has acertado en $intento jugadas...</h1>";
} else {
    $msj = "<h1>Has agotado tus jugadas...</h1>";  
}

$html_clave = Clave::get_clave($clave);
$informacion = "$html_clave";
$informacion .= Jugada::obtener_historico_jugadas();

if(isset($_POST['submit'])) {
    session_destroy();
    header("location: index.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <title>Master Mind - Victoria</title>
</head>
<body>
<p><?= $msj ?></p>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10 col-md-5">
            <div>
                <form method="post" class="text-center pt-2 pb-5">
                    <input type="submit" name="submit" value="Volver al juego">
                </form>
            </div>
            <?= $informacion ?>
            </div>
        </div>
    </div>
    
</body>
</html>

