<?php

class vista_model
{

    protected static function obtenerVista($pagina)
    {

        $paginasExistentes = ["404", "inicio", "tarea"];

        if (!in_array($pagina, $paginasExistentes)) {
            return "404-view.php";
            exit;
        }

        return $pagina . "-view.php";
    }
}
