<?php

class main_model {
    
    protected static function conectarBD(){

        try{}catch(PDOException $e){
            echo "ero" . $e->getMessage();
        };

        return;
    }

}
