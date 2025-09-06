document.addEventListener("DOMContentLoaded", () => {

    const formulario = document.getElementById("formulario_registro");

    formulario.addEventListener("submit", async (e) => {
        e.preventDefault();

        const nombre = document.getElementById("inicio_nombre").value.trim();
        const apellido = document.getElementById("inicio_apellido").value.trim();
        const correo = document.getElementById("inicio_correo").value.trim();
        const contraseña = document.getElementById("inicio_contraseña").value.trim();

        let datos = new FormData();
        datos.append("nombre", nombre);
        datos.append("apellido", apellido);
        datos.append("correo", correo);
        datos.append("contraseña", contraseña);

        try{
            const respuesta = await fetch("php/controller/registro_controller.php", {
                method: "POST"
            });

            const resultado = respuesta.text();


        }catch(error){
            console.error("Error AJAX: " + error)
        }

    });

});