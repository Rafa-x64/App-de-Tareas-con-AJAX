<?php

require_once("model/task_model.php");
require_once("helpers/respuesta.php");

$action = $_GET['action'] ?? '';

if ($action === 'create') {
    $input = json_decode(file_get_contents('php://input'), true);
    $nombre = trim($input['nombre'] ?? '');
    $descripcion = trim($input['descripcion'] ?? '');

    if ($nombre === '' || $descripcion === '') {
        Response::json(false, 'Campos obligatorios');
    }

    $tarea = task_model::crear($nombre, $descripcion);
    Response::json(true, 'Tarea creada correctamente', $tarea);
}
