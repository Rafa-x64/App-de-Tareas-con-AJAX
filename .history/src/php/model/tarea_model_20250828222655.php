<?php

//rutas para los archivos que usa este modelo
include_once(__DIR__ . "/../../config/APP.php");
include_once(__DIR__ . "/../../config/SERVER.php");
include_once(__DIR__ . "/main_model.php");

class tarea_model extends main_model
{
    public static function guardarTarea($nombre, $descripcion)
    {
        $conexion = main_model::conectarBD();

        if (!$conexion) return false;

        $sql = "INSERT INTO tareas (nombre, descripcion) VALUES (?,?)";
        $stmt = $conexion->prepare($sql);
        return $stmt->execute([$nombre, $descripcion]);
    }

    public static function obtenerTareas()
    {
        $conexion = main_model::conectarBD();
        if (!$conexion) return [];

        return $conexion->query("SELECT * FROM tareas")->fetchAll();
    }
}

?>