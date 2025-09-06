document.addEventListener("DOMContentLoaded", () => {

    const formulario = document.getElementById("formulario_registro");

    formulario.addEventListener("submit", async(e) => {
        e.preventDefault();

        const nombre = document.getElementById("inicio_nombre").val;
        const apellido = document.getElementById("inicio_apellido").val;
        const correo = document.getElementById("inicio_correo").val;
        const contraseña = document.getElementById("inicio_contraseña").val;

    });

});