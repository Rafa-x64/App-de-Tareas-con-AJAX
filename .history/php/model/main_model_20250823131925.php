<?php

class main_model {
    
    protected static function conectarBD(){

        try{}catch(PDOException $e){
            echo "E" . $e->getMessage();
        };

        return;
    }

}
