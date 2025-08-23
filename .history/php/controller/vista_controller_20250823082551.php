<?php

class vista_controller extends vista_model
{
    static function cargarVista()
    {
        if (isset($_GET["page"])) {
            $vista = self::obtenerVista($_GET["page"]);
        } else {
            $vista = "inicio-view.php";
        }

        require("view/template/plantilla.php");
    }
}
