<?php

require_once("main_model");

class tarea_model extends main_model
{
    protected static function POS($datos)
    {
        $agregar = parent::conectarBD()->prepare("INSERT INTO (tareas) VALUES (?,?)");
        $agregar->execute([$datos["nombre_tarea"], $datos["descripcion_tarea"]]);
        return $agregar;
    }

    protected static function obtenerTareas()
    {
        $obtener = self::conectarBD()->prepare("SELECT * FROM tareas ORDER BY tarea_id DESC");
        $obtener->execute();
        return $obtener->fetchAll();
    }
}
