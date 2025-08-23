<?php

include("./php/includes/head.html");
//hacer un array de vistas que no llevan ciertos componentes
//si no estan en el array cargar solo la vista, de lo contrario cargar el include
include("./view/" . $pagina);
include("./php/includes/scripts.html");
