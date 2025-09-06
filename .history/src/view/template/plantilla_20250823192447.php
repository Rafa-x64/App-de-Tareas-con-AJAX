<?php

if($vista == "inicio-view.php"){
    include("./php/includes/header.php");
}

include("./php/includes/head.php");
//hacer un array de vistas que no llevan ciertos componentes
//si no estan en el array cargar solo la vista, de lo contrario cargar el include necesario y la vista
include("./view/" . $vista);
include("./php/includes/scripts.html");
