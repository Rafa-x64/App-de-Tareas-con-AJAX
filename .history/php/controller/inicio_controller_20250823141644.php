<?php

use traits\notificacion\notificacion;

class inicio_controller extends main_model {

    use notificacion;

    public static function validar($numero1, $numero2){
        if(!is_int($numero1) || !is_int($numero2){
            return $this->notificacion("Error", "ambos numeros deben ser enteros");
        }
    }

}
