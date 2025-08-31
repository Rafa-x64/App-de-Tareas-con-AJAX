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
            "mensaje" => "error en envio o no se ha enviado aun"
        ]);
    } else {

        $registro = usuario_model::registrar($nombre, $apellido, $correo, $contraseña)

        if ( == false) {
            echo json_encode([
                "ok" => false,
                "mensaje" => "error al registrar"
            ]);
        } else {
            guardarSesion($nombre, $apellido, $correo);

            echo json_encode([
                "ok" => true,
                "mensaje" => "registro exitoso"
            ]);
        }
    }
}

function guardarSesion($nombre, $apellido, $correo)
{
    session_start();
    $_SESSION["nombre"] = $nombre;
    $_SESSION["apellido"] = $apellido;
    $_SESSION["correo"] = $correo;
}
