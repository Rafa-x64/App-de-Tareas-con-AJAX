<?php

//incluye el main model para poder usar sus metodos
include_once("../model/tarea_model.php");

//si el server recibe una peticion post (del envio del dashboar)
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nombre = trim($_POST["nombre"] ?? "");
    $descripcion = trim($_POST["descripcion"] ?? "");

    if ($nombre === "" || $descripcion === "") {
        echo json_encode([
            "ok" => false,
            "mensaje" => "Todos los campos son obligatorios"
        ]);
        exit;
    }

    $guardado = tarea_model::guardarTarea($nombre, $descripcion);

    if ($guardado) {
        $tareas = tarea_model::obtenerTareas();

        $html = "";
        foreach ($tareas as $tarea) {
            $html .=
                "<tr>
                    <td>{$tarea['id']}</td>
                    <td>{$tarea['nombre']}</td>
                    <td>{$tarea['descripcion']}</td>
                    <td>
                        <button class='btn btn-sm btn-primary'>Editar</button>
                        <button class='btn btn-sm btn-danger'>Eliminar</button>
                    </td>
                </tr>";
        }

        echo json_encode([
            "ok" => true,
            "html" => $html
        ]);
    } else {
        echo json_encode([
            "ok" => false,
            "mensaje" => "Error al guardar la tarea"
        ]);
    }
}
