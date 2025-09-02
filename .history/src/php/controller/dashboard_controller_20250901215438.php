<?php

session_start();
include_once("../model/tarea_model.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    //esto lo obtiene del envio del json a travez del metodo post por las cabeceras de ajax 
    $nombre = trim($_POST["nombre"] ?? "");
    $descripcion = trim($_POST["descripcion"] ?? "");
    $usuarioID = trim($_SESSION["usuario"]["id"]);

    // Si no se envió nombre, asumimos que es una carga inicial (recuerda que se envia un fetch vacio desde el dashboard.js) 
    if ($nombre === "") {
        $tareas = tarea_model::obtenerTareasUsuario($usuarioID);
    }else if{} else {
        // Guardar nueva tarea 
        $guardado = tarea_model::guardarTarea($nombre, $descripcion, $usuarioID);

        if (!$guardado) {
            //si hubo error en el guardado entonces regresa un error en formato json 
            echo json_encode(["ok" => false, "mensaje" => "Error al guardar la tarea"]);
            //termina la ejecucion 
            exit;
        }

        $tareas = tarea_model::obtenerTareasUsuario($usuarioID); // Recargar lista
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
