<?php
include_once("../model/usuario_model.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $nombre = trim($_POST["nombre"] ?? "");
    $apellido = trim($_POST["apellido"] ?? "");
    $correo = trim($_POST["correo"] ?? "");
    $contraseña = trim($_POST["contraseña"] ?? "");

    if (!$nombre || !isset($nombre) || !$apellido || !isset($apellido) || !$correo || !isset($correo) || !$contraseña || !isset($contraseña)) {
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

            guardarSesion($nombre, $apellido, $correo);
            echo json_encode($registro);
    }
}

function guardarSesion($nombre, $apellido, $correo)
{
    session_start();
    $_SESSION["nombre"] = $nombre;
    $_SESSION["apellido"] = $apellido;
    $_SESSION["correo"] = $correo;
}
