<?php

include("co")
include("php/model/vista_model.php");
include("php/controller/vista_controller.php");

$mostrar = new vista_controller();
$mostrar->cargarVista();

?>