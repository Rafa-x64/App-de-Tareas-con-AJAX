<?php

include("config/APP.php");
include("config/SERVER.php");
include("php/model/main_model.php")
include("php/model/vista_model.php");
include("php/controller/vista_controller.php");

$mostrar = new vista_controller();
$mostrar->cargarVista();
