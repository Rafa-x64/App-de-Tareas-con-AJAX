<h1>este es el inicio</h1>

<button>Hello World!</button>

<?php

include_once("./traits/notificacion.php");
include("php/controller/inicio_controller.php");

echo inicio_controller::validar(1.21, 2.21);

?>