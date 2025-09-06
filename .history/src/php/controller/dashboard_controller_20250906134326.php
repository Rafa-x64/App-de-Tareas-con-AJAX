<?php

session_start();
include_once("../model/tarea_model.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    //esto lo obtiene del envio del json a travez del metodo post por las cabeceras de ajax 
    $nombre = trim($_POST["nombre"] ?? "");
    $descripcion = trim($_POST["descripcion"] ?? "");
    print_r("session")
    $usuarioID = trim($_SESSION["usuario"]["id"]);

    // Si no se envió nombre, asumimos que es una carga inicial (recuerda que se envia un fetch vacio desde el dashboard.js) 
    if ($nombre === "") {
        $tareas = tarea_model::obtenerTareasUsuario($usuarioID);
    } else {
        // Si no hay descripción, asignar "Ninguna"
        if ($descripcion === "") {
            $descripcion = "Ninguna";
        }

        $guardado = tarea_model::guardarTarea($nombre, $descripcion, $usuarioID);

        if (!$guardado) {
            echo json_encode([
                "ok" => false,
                "mensaje" => "Error al guardar la tarea"
            ]);
            exit;
        }

        // Después de guardar, recargar lista
        $tareas = tarea_model::obtenerTareasUsuario($usuarioID);
    }

    // Renderizar HTML 
    $html = "";
    foreach ($tareas as $tarea) {
        $html .= "<tr> 
                            <td class='text-center align-middle'>{$tarea['nombre']}</td> 
                            <td class='text-center align-middle'>{$tarea['descripcion']}</td> 
                            <td class='text-center align-middle'> 
                                <div class='d-flex justify-content-center align-items-center gap-2'> 
                                    <button class='btn btn-sm btn-primary'> 
                                        <i class='bi bi-pencil-fill'></i> 
                                    </button> 
                                    <button class='btn btn-sm btn-danger'> 
                                        <i class='bi bi-trash3-fill'></i> 
                                    </button> 
                                </div> 
                            </td> 
                        </tr>";
    }
    echo json_encode(["ok" => true, "html" => $html]);
}
