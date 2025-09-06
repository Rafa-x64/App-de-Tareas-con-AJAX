<?php

class vista_model
{

    protected static function obtenerVista($pagina)
    {

        $paginasExistentes = ["404", "inicio", "dashboard", ];

        if (!in_array($pagina, $paginasExistentes)) {
            return "404-view.php";
            exit;
        }

        return $pagina . "-view.php";
    }
}
