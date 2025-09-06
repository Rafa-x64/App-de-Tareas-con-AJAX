<?php 

include_once(__DIR__ . "../../config/APP.php");
include_once(__DIR__ . "../../config/SERVER.php");
include_once(__DIR__ . "/main_model.php");

class usuario_model extends main_model 
{

    public static function iniciarSesion($correo, $contraseña){

        $conexion = parent::conectarBD();

        if(!$conexion){
            
        }

        $stmt = parent::conectarBD()->prepare("SELECT * FROM usuarios WHERE correo = ? AND contraseña = ?");
        $stmt->execute([$correo, $contraseña]);

        if(!)

    }

}

?>