<?php

class vista_controller extends vista_model
{
    static function cargarVista() {
        if (isset($_GET["page"])) {
            $vista = self::obtenerVista($_GET["page"]);
            $vista = "inicio-view.php"; //se muestra el inicio si no esta establecido el parametro en la url
        }

        require("view/plantilla.php");
    }
}
