<?php

include_once(__DIR__ . "/../../config/APP.php");
include_once(__DIR__ . "/../../config/SERVER.php");

class main_model
{

    public static function conectarBD()
    {

        try {
            $con = new PDO(SGBD, USUARIO, CONTRASEÑA, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false
            ]);
            return $con;
        } catch (PDOException $e) {
            error_log("Error de conexion: " . $e->getMessage());
            return false;
        };
    }

    public static function hashearContraseña($contraseña){
        return password_hash($contraseña, PASSWORD_DEFAULT);
    }

    public static function verificarContraseña($contraseña, $contraseñaHash)
}
