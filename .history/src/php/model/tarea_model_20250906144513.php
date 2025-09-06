<?php
include_once(__DIR__ . "/../../config/APP.php");
include_once(__DIR__ . "/../../config/SERVER.php");
include_once(__DIR__ . "/main_model.php");

class tarea_model extends main_model
{
    public static function guardarTarea($nombre, $descripcion, $usuarioID)
    {
        $conexion = self::conectarBD();
        if (!$conexion) return false;

        $stmt = $conexion->prepare("INSERT INTO tareas (nombre, descripcion, usuario_id) VALUES (?, ?, ?)");
        return $stmt->execute([$nombre, $descripcion, $usuarioID]);
    }

    public static function obtenerTareasUsuario($usuarioID)
    {
        $conexion = self::conectarBD();
        if (!$conexion) return [];

        $stmt = $conexion->prepare("SELECT * FROM tareas WHERE usuario_id = ?");
        $stmt->execute([$usuarioID]);
        return $stmt->fetchAll();
    }

    public static function editarTarea($id, $nombre, $descripcion, $usuarioID)
    {
        $conexion = self::conectarBD();
        if (!$conexion) return false;

        $stmt = $conexion->prepare("UPDATE tareas SET nombre = ?, descripcion = ? WHERE id = ? AND usuario_id = ?");
        return $stmt->execute([$nombre, $descripcion, $id, $usuarioID]);
    }

    public static function eliminarTarea($id, $usuarioID)
    {
        $conexion = self::conectarBD();
        if (!$conexion) return false;

        $stmt = $conexion->prepare("DELETE FROM tareas WHERE id = ? AND usuario_id = ?");
        return $stmt->execute([$id, $usuarioID]);
    }
}
