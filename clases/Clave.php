<?php

class Clave {
    public const COLORES = ["Azul", "Rojo", "Naranja", "Verde", "Violeta", "Amarillo", "Marron", "Rosa"];

    private static $clave = [];

    public static function obtener_clave() {
        if(isset($_SESSION['clave'])) {
            self::$clave = $_SESSION['clave'];
        } else {
            self::$clave = self::genera_clave();
            $_SESSION['clave']=self::$clave;
        }
        return self::$clave;
    }

    private static function genera_clave() {
        $colores = self::COLORES;
        $posiciones = array_rand($colores, 4);

        foreach ($posiciones as $posicion) {
            self::$clave[] = $colores[$posicion];
        }

        return self::$clave;
    }

    public static function get_clave(array $clave) {
        $muestra = "";
        $muestra .= "<div class='row'>";
        foreach(self::$clave as $color) {
            $muestra .= "<div class='col-lg $color text-center pt-2 pb-2'>";
            $muestra.="<span class='$color'>$color</span>";
            $muestra .= "</div>";
        }
        $muestra .= "</div>";
        return $muestra;
    }

}
?>