<?php

//rutas para los archivos que usa este modelo
include_once(__DIR__ . "/../../config/APP.php");
include_once(__DIR__ . "/../../config/SERVER.php");
include_once(__DIR__ . "/main_model.php");

class tarea_model extends main_model
{
    //esto ya lo saben todos como funciona
    public static function guardarTarea($nombre, $descripcion)
    {
        $conexion = main_model::conectarBD();

        if (!$conexion) return false;

        $stmt = $conexion->prepare("INSERT INTO tareas (nombre, descripcion) VALUES (?,?)");
        return $stmt->execute([$nombre, $descripcion]);//retornar esto es obligatorio
    }

    //esto ya lo saben todos como funciona x2
    public static function obtenerTareas()
    {
        $conexion = main_model::conectarBD();
        if (!$conexion) return [];

        return $conexion->query("SELECT * FROM tareas")->fetchAll();
    }

    public static function obtener
}

?>