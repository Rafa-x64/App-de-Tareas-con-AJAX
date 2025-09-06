<?php

include("../model/main_model.php");
include("../traits/notificacionTrait.php");

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

    $conexion = main_model::conectarBD();

    if ($conexion) {
        $sql = "INSERT INTO tareas (nombre, descripcion) VALUES (?,?)";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(":nombre", $nombre);
        $stmt->bindParam(":descripcion", $descripcion);

        if ($stmt->execute()) {
            $tareas = $conexion->query("SELECT * FROM tareas")->fetchAll();

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
    } else {
        echo json_encode([
            "ok" => false,
            "mensaje" => "Error de conexión"
        ]);
    }
}
