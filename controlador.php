<?php
$carga = fn($clase)=>require("./clases/$clase.php");
spl_autoload_register($carga);
session_start();

// Imprimimos la clave:
$clave=Clave::obtener_clave();

// Imprimimos la jugada:
if(isset($jugada)) {
    $jugada = $_POST['combinacion'];
}

if(isset($informacion)) {
    $informacion = Jugada::obtener_historico_jugadas();
} else {
    $informacion = "";
}

if(isset($_SESSION['jugadas'])) {
    $informacion = Jugada::obtener_historico_jugadas();
} 

$mostrar_ocultar_clave="Mostrar clave";
$informacion_clave = "";

$opcion = $_POST['submit'] ?? "";
switch ($opcion) {
    case "Mostrar clave":
        $mostrar_ocultar_clave = "Ocultar clave";
        $informacion_clave = Clave::get_clave($clave);
        break;
    case "Ocultar clave":
        $mostrar_ocultar_clave = "Mostrar clave";
        $informacion_clave = "";
        break;
    case "Resetear clave":
        session_destroy();
        $informacion = "¿Otra clave...?";
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