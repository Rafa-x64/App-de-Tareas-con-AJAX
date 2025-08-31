<?php
include_once("../model/");

class inicio_controller extends main_model
{

    //usar el trait
    use notificacionTrait;

    public static function validarConexion()
    {
        if (!(parent::conectarBD())) {
            return self::notificacion("Error", "Error al conectar a la base de datos", "danger");
        }

        return self::notificacion("Exito", "Conectado a la base de datos", "success");
    }
}
