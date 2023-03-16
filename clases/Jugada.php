<?php

class Jugada {
    private $colores;
    private $posiciones_acertadas;
    private $colores_acertados;

    public function __construct(array $jugada) {
        $this -> posiciones_acertadas = 0;
        $this -> colores_acertados = 0;
        $this -> colores = $jugada;
        $clave = Clave::obtener_clave();
        $this -> evalua_jugada($clave);
    }

    private function evalua_jugada(array $clave) {
        $jugada = array_unique($this -> colores);
        
        foreach ($jugada as $color) {
            if (in_array($color, $clave)) {
                $this -> colores_acertados++;
            }
        }

        foreach ($this->colores as $posicion => $color) {
            if ($color === $clave[$posicion]) {
                $this -> posiciones_acertadas++;
            }
        }
    }

    public function get_posiciones_acertadas() {
        return $this -> posiciones_acertadas;
    }

    public function get_colores_acertados() {
        return $this -> colores_acertados;
    }

    public function __toString():string {
        $html_jugada = "";

        for ($n = 0; $n < $this -> posiciones_acertadas; $n++) {
            $html_jugada .= "<span class='negro'>$n</span>";
        }

        for ($n = $this -> posiciones_acertadas; $n < $this -> colores_acertados; $n++) {
            $html_jugada .= "<span class='blanco'>$n</span>";
        }
        $html_jugada .= "<div class='row pt-2 pb-3'>";
        foreach ($this -> colores as $color) {
            $html_jugada .= "<div class='col-lg $color text-center pt-2 pb-2'>";
            $html_jugada .= "<span class='$color'>$color</span>";
            $html_jugada .= "</div>";
        }
        $html_jugada .= "</div>";
        return $html_jugada;
    }

    public static function obtener_historico_jugadas() {
        $html = "";
        $jugadas = $_SESSION['jugadas'];
        $html .= '<fieldset><h2>Información</h2><legend>Sección de información</legend><div class="container"><div class="row"><h3>';

        foreach ($jugadas as $posicion => $jugada) {
            $posicion = $posicion + 1;
            $jugada = unserialize($jugada);
            $html .= "Jugada $posicion: $jugada"; 
        }

        $html .= '</h3></div></div></fieldset>';
        
        return $html;
    }
    
}
?>