document.addEventListener("DOMContentLoaded", () => {

    const formulario = document.getElementById("formulario_inicio_sesion");

    formulario.addEventListener("submit", async (e) =>{
        e.preventDefault();

        const usuario = document.getElementById("inicio_usuario");
        const contraseña = document.getElementById("inicio_contraseña");

        let datos = new FormData();
        datos.append("usuario", usuario.value.trim());
        datos.append("contraseña", contraseña.value.trim());

        try{

            const respuesta = await fetch 

        }catch(error){
            console.error("Error AJAX: " + error);
        }

    });

});