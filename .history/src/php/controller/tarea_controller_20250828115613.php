<?php

require_once("../model/tarea_model.php");
require_once("../../traits/notificacion.php");

class tarea_controller extends tarea_model
{
    use notificacionTrait;

    public static function agregarTarea() {
        $nombreTarea = $_POST["nombreTarea"];
        $descripcionTarea = $_POST['descripcion_tarea'];

        if(empty($nombreTarea) || empty($descripcion_tarea)){
            echo self::notificacion("ERROR!", "los campos no pueden estar vacios", "danger");
            exit();
        }

        $datosTarea = ["nombre_tarea" => $nombreTarea, "descripcion_tarea" => $descripcionTarea];

        $agregar_tare
    }
}
