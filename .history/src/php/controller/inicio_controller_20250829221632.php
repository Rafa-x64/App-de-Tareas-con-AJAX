<?php
include_once("../model/usuario_model.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $correo = trim($_POST["usuario"] ?? "");
    $contraseña = trim($_POST["contraseña"] ?? "");

    if (!$correo || !isset($correo) || !$contraseña || !isset($contraseña)) {
        echo json_encode([
            "ok" => false,
            "mensaje" => "error en envio o no se ha enviado aun"
        ]);
    } else {

        if

        echo json_encode([
            "ok" => true,
            "mensaje" => ""
        ]);
    }
}
