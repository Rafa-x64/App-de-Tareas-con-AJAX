<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $json = file_get_contents("php://input");
    $datos = json_decode($json, true); // true = array asociativo

    if (json_last_error() === JSON_ERROR_NONE) {
        // Puedes imprimir para debug
        echo json_encode([
            "estado" => "ok",
            "recibido" => $datos
        ]);
    } else {
        echo json_encode([
            "estado" => "error",
            "mensaje" => "JSON inválido"
        ]);
    }
}

?>