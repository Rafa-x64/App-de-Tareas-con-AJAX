<?php

//incluye el main model para poder usar sus metodos
include_once("../model/tarea_model.php");

//si el server recibe una peticion post (del envio del json de dashboard.js)
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    //obtiene los datos del formdata que se creo envio
    $nombre = trim($_POST["nombre"] ?? "");
    $descripcion = trim($_POST["descripcion"] ?? "");

    //si alguno de los campos esta vacio entonces devuelve un error
    if ($nombre === "" || $descripcion === "") {
        //cuando se hace un envio al server (php) este deve devolver una respuesta en formato json para que pueda ser procesaod por el metodo .ok de js (en dashboard.js)
        echo json_encode([
            "ok" => false,
            "mensaje" => "Todos los campos son obligatorios"
        ]);
        //se termina la ejecucion del script
        exit;
    }

    //guarda la tarea en la base de datos
    $guardado = tarea_model::guardarTarea($nombre, $descripcion);

    if ($guardado) {//si el guardado es exitoso
        $tareas = tarea_model::obtenerTareas();//

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
