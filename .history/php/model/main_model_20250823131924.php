<?php

class main_model {
    
    protected static function conectarBD(){

        try{}catch(PDOException $e){
            echo "W" . $e->getMessage();
        };

        return;
    }

}
