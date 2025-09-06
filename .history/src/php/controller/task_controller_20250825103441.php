<?php

require_once("model/task_model.php");
require_once("helpers/respuesta.php");

$action = $_GET['action'] ?? '';

if ($action === 'create') {
    $input = json_decode(file_get_contents('php://input'), true);
    $nombre = trim($input['nombre_tarea'] ?? '');
    $descripcion = trim($input['descripcion'] ?? '');

    if ($nombre === '' || $descripcion === '') {
        respuesta::json(false, 'Campos obligatorios');
    }

    $tarea = task_model::crearTarea($nombre, $descripcion);
    respuesta::json(true, 'Tarea creada correctamente', $tarea);
}
