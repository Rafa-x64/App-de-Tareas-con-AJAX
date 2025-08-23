<?php

include_once("./");

class inicio_controller extends main_model
{

    use notificacionTrait;

    public static function validar($numero1, $numero2)
    {

        if (!is_int($numero1) || !is_int($numero2)) {
            self::notificacion("Error", "ambos numeros deben ser enteros", "danger");
        }

        return self::notificacion("Exito", "los numeros son validos", "success");
    }
}
