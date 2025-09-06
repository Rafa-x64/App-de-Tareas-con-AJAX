<?php 

if($_SERVER["REQUEST_METHOD"] === "POST"){

    $nombre = $_POST["nombre"] ?? "";
    $apellido = $_POST["apellido"] ?? "";
    $correo = $_POST["correo"] ?? "";
    $contraseña = $_POST["contraseña"] ?? "";

}

?>