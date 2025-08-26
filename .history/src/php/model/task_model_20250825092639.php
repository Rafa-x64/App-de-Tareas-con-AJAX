<?php 

class task_model extends main_model{

    public static function crear($nombre, $descripcion){
        $crear = parent::conectarBD();
        $stmt = $crear->prepare("INSERT INTO (tareas) VALUES (?, ?)");
        $stmt->execute([$nombre, $descripcion]);
        return["id" =>]
    }

}

?>