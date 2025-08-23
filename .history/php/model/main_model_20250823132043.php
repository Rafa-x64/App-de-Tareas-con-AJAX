<?php

class main_model
{

    protected static function conectarBD()
    {

        try {
            $con = new PDO(SGBD, USUARIO, CONTRASEÑA);
            return 
        } catch (PDOException $e) {
            echo "Error de conexion: " . $e->getMessage();
        };

        return;
    }
}
