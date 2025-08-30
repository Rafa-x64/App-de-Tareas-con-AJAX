<?php

require_once "../model/tarea_model.php";

// Leer el JSON recibido
$datos = json_decode(file_get_contents("php://input"), true);

// Validación básica
if (!isset($datos["nombre"]) || !isset($datos["descripcion"])) {
    echo json_encode(["estado" => "error", "mensaje" => "Datos incompletos"]);
    exit;
}

// Guardar usando el modelo
$tarea = new tarea_model();
$resultado = $tareaModel->guardarTarea($datos["nombre"], $datos["descripcion"]);

echo json_encode($resultado);
