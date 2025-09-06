<?php
include_once("../model/usuario_model.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $nombre = trim($_POST["nombre"] ?? "");
    $apellido = trim($_POST["apellido"] ?? "");
    $correo = trim($_POST["correo"] ?? "");
    $contraseña = trim($_POST["contraseña"] ?? "");

    if (!$nombre || !$apellido || !$correo || !$contraseña) {
        echo json_encode([
            "ok" => false,
            "mensaje" => "Faltan campos obligatorios"
        ]);
    } else {

        $registro = usuario_model::registrar($nombre, $apellido, $correo, $contraseña);

        if ($registro["ok"] == false) {
            echo json_encode($registro);
            exit();
        }

        $inciarSesion = usuario_model::iniciarSesion($correo, $contraseña);

        guardarSesion($inciarSesion["usuario"]);

        echo json_encode([
            "ok" => true,
            "mensaje" => ""
        ]);
    }
}

function guardarSesion($usuario)
{
    session_start();
    $_SESSION["usuario"] = [
        "id" => $usuario["id"],
        "nombre" => $usuario["nombre"],
        "apellido" => $usuario["apellido"],
        "correo" => $usuario["correo"]
    ];
}
