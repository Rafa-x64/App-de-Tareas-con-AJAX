document.addEventListener("DOMContentLoaded", () => {

    const formulario = document.getElementById("formulario_registro");

    formulario.addEventListener("submit", async(e) => {
        e.preventDefault();

        const nombre = document.getElementById("inicio_nombre").value.;
        const apellido = document.getElementById("inicio_apellido").value.;
        const correo = document.getElementById("inicio_correo").value.;
        const contraseña = document.getElementById("inicio_contraseña").value.;

    });

});