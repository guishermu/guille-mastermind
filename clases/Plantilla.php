<?php

class Plantilla {
    static public function genera_formulario_juego() {
        $html_select="";
        $colores=Clave::COLORES;

        for ($n=0; $n<4; $n++) {
            $html_select.="<div class='col-lg'>";
            $html_select.="<select class='form-select' name='combinacion[]'>";
            foreach ($colores as $color) {
                $html_select.="<option value='$color' class='$color'>$color</option>";
            }
            $html_select.="</select>";
            $html_select.="</div>";
        }
        return $html_select;
    }
}
?>