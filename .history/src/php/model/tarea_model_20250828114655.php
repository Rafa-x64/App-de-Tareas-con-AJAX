<?php

require_once("main_model");

class tarea_model extends main_model {
    protected static function agregarTarea($datos){
        $agregar = parent::conectarBD()->prepare("INSERT INTO (tareas) VALUES (?,?)");
        $agregar->execute([$datos["nombre_tarea"], $datos["descripcion_tarea"]]);
        return $agregar;
    }

    protected static function obtenerTareas()
    {
        $sql = self::conectarBD()->prepare("SELECT * FROM Tareas ORDER BY tarea_id DESC");
        $sql->execute();

        return $sql->fetchAll();
    }
}
