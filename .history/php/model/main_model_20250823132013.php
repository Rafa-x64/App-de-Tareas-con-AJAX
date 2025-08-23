<?php

class main_model {
    
    protected static function conectarBD(){

        try{
            $con = new PDO(SGBD, USUARIO, Contr);
        }catch(PDOException $e){
            echo "Error de conexion: " . $e->getMessage();
        };

        return;
    }

}
