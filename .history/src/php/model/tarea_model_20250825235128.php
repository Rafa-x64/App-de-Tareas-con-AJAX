<?php

class tarea_model extends main_model
{
    private $db;

    public static function guardarTarea($nombre, $descripcion)
    {
        try {
            $sql = ;
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(":nombre", $nombre);
            $stmt->bindParam(":descripcion", $descripcion);
            $stmt->execute();

            return ["estado" => "ok", "mensaje" => "Tarea guardada correctamente"];
        } catch (PDOException $e) {
            return ["estado" => "error", "mensaje" => "Error al guardar: " . $e->getMessage()];
        }
    }
}
