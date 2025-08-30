<?php

class main_model
{

    protected static function conectarBD()
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
}
