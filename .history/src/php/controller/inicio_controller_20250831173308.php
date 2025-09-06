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

        $inciarSesion = usuario_model::iniciarSesion($correo, $contraseña);

        if ($inciarSesion["ok"] == false) {
            echo json_encode([
                "ok" => false,
                "mensaje" => "correo o contraseña incorrectos"
            ]);
            exit();
        }

        echo json_encode([
            "ok" => true,
            "mensaje" => $
        ]);
    }

    function guardarSesion($usuario)
    {
        session_start();
        $_SESSION["usuario"] = [
            "nombre" => $usuario["nombre"],
            "apellido" => $usuario["apellido"],
            "correo" => $usuario["correo"]
        ];
    }
}
