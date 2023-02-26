<?php
$carga = fn($clase)=>require("./clases/$clase.php");
spl_autoload_register($carga);
session_start();

// Imprimimos la clave:
$clave=Clave::obtener_clave();

// Imprimimos la jugada:
$jugada = $_POST['combinacion'];

$mostrar_ocultar_clave="Mostrar clave";

$opcion = $_POST['submit'] ?? "";
switch ($opcion) {
    case "Mostrar clave":
        $mostrar_ocultar_clave = "Ocultar clave";
        $informacion = Clave::get_clave($clave);
        break;
    case "Ocultar clave":
        $mostrar_ocultar_clave = "Mostrar clave";
        $informacion = "Nada que mostrar.";
        break;
    case "Resetear clave":
        session_destroy();
        break;
    case "Jugar":
        $jugada = new Jugada ($_POST['combinacion']);
        $_SESSION['jugadas'][] = serialize($jugada);
        evaluar_fin_juego($jugada);
        $informacion = Jugada::obtener_historico_jugadas();
        break;
}

function evaluar_fin_juego(Jugada $jugada){
    if ($jugada -> get_posiciones_acertadas() == 4) {
        $win = true;
        header("location:fin.php?win=$win");
        exit();
    } if (sizeof($_SESSION['jugadas']) >= 10) {
        $win = false;
        header("location:fin.php?win=$win");
        exit();
    }
}

?>