<?php

include_once(__DIR__ . "/../../config/APP.php");
include_once(__DIR__ . "/../../config/SERVER.php");
include_once(__DIR__ . "/main_model.php");

class usuario_model extends main_model
{

    public static function iniciarSesion($correo, $contraseña)
    {
        $conexion = parent::conectarBD();

        if (!$conexion) {
            return false;
        }

        $stmt = $conexion->prepare("SELECT * FROM usuarios WHERE correo = ?");
        $stmt->execute([$correo]);
        $stmt->fetch(PDO::FETCH_ASSOC);

        if ($correo == $stmt["correo"] && (parent::verificarContraseña($contr,$stmt["contraseña"]) == true)) {
        }
    }

    public static function registrar($nombre, $apellido, $correo, $contraseña)
    {
        $conexion = parent::conectarBD();

        if (!$conexion) {
            return false;
        }

        $contraseñaHash = parent::hashearContraseña($contraseña);

        $stmt = $conexion->prepare("INSERT INTO usuarios (nombre, apellido, correo, contraseña) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$nombre, $apellido, $correo, $contraseñaHash]);
    }

    public static function correoValido($correo): bool
    {
        $conexion = parent::conectarBD();

        if (!$conexion) {
            return false;
        }

        $stmt = $conexion->prepare("SELECT * FROM usuarios WHERE correo = ?");
        $stmt->execute([$correo]);
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($resultado["correo"] === $correo) {
            return false;
        }

        return true;
    }
}
