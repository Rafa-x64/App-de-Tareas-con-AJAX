<?php
session_start();
include_once("../model/tarea_model.php");

// Función para renderizar el HTML de la tabla
function renderizarHTML($tareas)
{
    $html = "";
    foreach ($tareas as $tarea) {
        $html .= "<tr data-id='{$tarea['id']}'> 
            <td class='text-center align-middle'>{$tarea['nombre']}</td> 
            <td class='text-center align-middle'>{$tarea['descripcion']}</td> 
            <td class='text-center align-middle'> 
                <div class='d-flex justify-content-center align-items-center gap-2'> 
                    <button class='btn btn-sm btn-primary btn-editar' 
                        data-id='{$tarea['id']}' 
                        data-nombre='{$tarea['nombre']}' 
                        data-descripcion='{$tarea['descripcion']}'>
                        <i class='bi bi-pencil-fill'></i>
                    </button> 
                    <button class='btn btn-sm btn-danger btn-eliminar' 
                        data-id='{$tarea['id']}'>
                        <i class='bi bi-trash3-fill'></i>
                    </button> 
                </div> 
            </td> 
        </tr>";
    }
    return $html;
}

// Validar sesión
if (!isset($_SESSION["usuario"]["id"])) {
    echo json_encode(["ok" => false, "mensaje" => "Sesión no iniciada"]);
    exit;
}

$usuarioID = trim($_SESSION["usuario"]["id"]);
$nombre = trim($_POST["nombre"] ?? "");
$descripcion = trim($_POST["descripcion"] ?? "");
$id = trim($_POST["id"] ?? "");

// Eliminar tarea
if (isset($_POST["eliminar"])) {
    $eliminado = tarea_model::eliminarTarea($id, $usuarioID);
    $tareas = tarea_model::obtenerTareasUsuario($usuarioID);
    echo json_encode([
        "ok" => $eliminado,
        "html" => renderizarHTML($tareas),
        "mensaje" => $eliminado ? "Tarea eliminada" : "Error al eliminar"
    ]);
    exit;
}

// Editar tarea
if (isset($_POST["editar"])) {
    if ($descripcion === "") $descripcion = "Ninguna";
    $editado = tarea_model::editarTarea($id, $nombre, $descripcion, $usuarioID);
    $tareas = tarea_model::obtenerTareasUsuario($usuarioID);
    echo json_encode([
        "ok" => $editado,
        "html" => renderizarHTML($tareas),
        "mensaje" => $editado ? "Tarea actualizada" : "Error al editar"
    ]);
    exit;
}

// Carga inicial o guardar nueva tarea
if ($nombre === "") {
    $tareas = tarea_model::obtenerTareasUsuario($usuarioID);
} else {
    if ($descripcion === "") $descripcion = "Ninguna";
    $guardado = tarea_model::guardarTarea($nombre, $descripcion, $usuarioID);
    if (!$guardado) {
        echo json_encode(["ok" => false, "mensaje" => "Error al guardar la tarea"]);
        exit;
    }
    $tareas = tarea_model::obtenerTareasUsuario($usuarioID);
}

echo json_encode(["ok" => true, "html" => renderizarHTML($tareas)]);