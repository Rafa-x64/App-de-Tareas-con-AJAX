<?php

//incluye el main model para poder usar sus metodos
include_once("../model/tarea_model.php");

//si el server recibe una peticion post (del envio del json de dashboard.js)
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    //obtiene los datos del formdata que se creo envio
    $nombre = trim($_POST["nombre"] ?? "");
    $descripcion = trim($_POST["descripcion"] ?? "");

    // Si no se envió nombre, asumimos que es una carga inicial
    if ($nombre === "") {
        $tareas = tarea_model::obtenerTareas();
    } else {
        // Registrar nueva tarea
        tarea_model::registrarTarea($nombre, $descripcion);
        $tareas = tarea_model::obtenerTareas(); // Recargar lista
    }

    //guarda la tarea en la base de datos
    $guardado = tarea_model::guardarTarea($nombre, $descripcion);

    if ($guardado) { //si el guardado es exitoso
        $tareas = tarea_model::obtenerTareas(); //obtiene todas las tareas de la base de datos

        //hacemos un foreach para cada tarea de la tabla y generamos un campo de tabla con los valores obtenidos
        $html = "";
        foreach ($tareas as $tarea) {
            $html .=
                "<tr>
                    <td>{$tarea['id']}</td>
                    <td>{$tarea['nombre']}</td>
                    <td>{$tarea['descripcion']}</td>
                    <td>
                    <div class='d-flex flex-row justify-content-between align-items-center'>
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

        //devolvemos una respuesta para hacer entender que fue exitoso
        echo json_encode([
            "ok" => true,
            "html" => $html
        ]);
    } else {
        //si el guardado no fue exitoso devuelve un error
        echo json_encode([
            "ok" => false,
            "mensaje" => "Error al guardar la tarea"
        ]);
    }
}
