<?php

class 
{
    private $db;

    public function __construct()
    {
        // Conexión PDO (ajusta según tu config)
        $this->db = new PDO("mysql:host=localhost;dbname=mi_app", "usuario", "clave");
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function guardarTarea($nombre, $descripcion)
    {
        try {
            $sql = "INSERT INTO tareas (nombre, descripcion) VALUES (:nombre, :descripcion)";
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
