<?php

class tarea_model extends main_model
{
    private $db;

    public static function guardarTarea($nombre, $descripcion)
    {
        try {
            
            $guardar = parent::conectarBD();
            $stmt = $guardar->prepare(""INSERT INTO tareas (nombre, descripcion) VALUES (:nombre, :descripcion)"")

            return ["estado" => "ok", "mensaje" => "Tarea guardada correctamente"];
        } catch (PDOException $e) {
            return ["estado" => "error", "mensaje" => "Error al guardar: " . $e->getMessage()];
        }
    }
}
