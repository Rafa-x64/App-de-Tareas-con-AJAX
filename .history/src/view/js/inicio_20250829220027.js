document.addEventListener("DOMContentLoaded", () => {

    const formulario = document.getElementById("formulario_inicio_sesion");

    formulario.addEventListener("submit", async (e) => {
        e.preventDefault();

        const usuario = document.getElementById("inicio_usuario").value.trim();
        const contraseña = document.getElementById("inicio_contraseña").value.trim();

        let datos = new FormData();
        datos.append("usuario", usuario);
        datos.append("contraseña", contraseña.value.trim());

        try {

            const respuesta = await fetch("php/controller/inicio_controller.php", {
                method: "POST",
                body: datos
            });

            const textoPlano = await respuesta.text();
            console.log("Respuesta cruda: " + textoPlano);
            const resultado = JSON.parse(textoPlano);

            if(!resultado.ok){
                alert(resultado.mensaje);
            }else{
                window.location.href = "index.php?page=dashboard";
            }

        } catch (error) {
            console.error("Error AJAX: " + error);
        }

    });

});