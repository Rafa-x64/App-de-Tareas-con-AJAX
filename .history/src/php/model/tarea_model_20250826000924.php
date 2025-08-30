<?php

include_once("")

class tarea_model extends main_model
{

    public static function guardarTarea($nombre, $descripcion)
    {
        try {

            $guardar = parent::conectarBD();
            $stmt = $guardar->prepare("INSERT INTO tareas (nombre, descripcion) VALUES (?,?)");
            $stmt->execute([$nombre, $descripcion]);
            return ["estado" => "ok", "mensaje" => "Tarea guardada correctamente"];
        } catch (PDOException $e) {
            return ["estado" => "error", "mensaje" => "Error al guardar: " . $e->getMessage()];
        }
    }
}
