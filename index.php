<?php
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <title>Master Mind</title>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-11 col-md-8">
                <hr>
                <h1>Master Mind</h1>
                <hr>
                <br>
                <ul>
                    <li>Te damos la bienvenida a Master Mind, donde tendrás que adivinar una secuencia de cuatro colores diferentes.</li>
                    <li>Los colores se establecerán aleatoriamente de entre 10 colores preestablecidos.</li>
                    <li>Durante cada jugada se informará de cuántos colores has acertado de la combinación y cuántos están en la posición correcta.</li>
                    <li>En caso de acierto, no sabrás cuáles son las posiciones acertadas.</li>
                    <li>Tendrás un total de diez intentos para adivinar la clave.</li>
                    <li class="text-center pt-2 pb-3">¿Te atreves?</li>
                </ul>
                <form action="jugar.php" class="text-center pt-3 pb-2">
                    <input class="" type="submit" value="Empezar a jugar">
                </form>
            </div>
        </div>
    </div>
</body>
</html>