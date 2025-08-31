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

        $stmt = $conexion->prepare("SELECT * FROM usuarios WHERE correo = ? AND contraseña = ?");
        $stmt->execute([$correo, $contraseña]);
        return $stmt->fetchAll();
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

    public static function validarCorreo($correo):bool{
        $conexion = parent::conectarBD();

        if(!$conexion){
            return false;
        }

        $stmt = $conexion->prepare("SELECT * FROM usuarios WHERE correo = ?");
        $stmt->execute([$correo]);
        
    }
}
