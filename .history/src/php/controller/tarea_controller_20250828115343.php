<?php

require_once("../model/tarea_model.php");
require_once("../../traits/notificacion.php");

class tarea_controller extends tarea_model
{
    use notificacionTrait;

    public static function agregarTarea() {
        $nombreTarea = $_POST["nombreTarea"];
        $descripcion_tarea = $_POST['descripcion_tarea'];

        if(empty($nombreTarea) || empty($descripcion_tarea)){
            echo self::notificacion("", "", "");
        }
    }
}
