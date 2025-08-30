document.addEventListener("DOMContentLoaded", () => {

    const formulario = document.getElementById("formulario_tareas");

    formulario.addEventListener("submit", async (e) => {

        e.preventDefault();

        const nombre = document.getElementById("nombre_tarea").value.trim();
        const descripcion = document.getElementById("descripcion_tarea").value.trim();

        const datos = new FormData();
        datos.append("nombre", nombre);
        datos.append("descripcion", descripcion);

        try {

            const respuesta = await fetch("php/controller/dashboard_controller.php", {
                method: "POST",
                body: datos
            });

            const resultado = await respuesta.json();

            if (!resultado.ok) {
                alert(resultado.mensaje);
            } else {
                document.getElementById("tareas").innerHTML = resultado.html;
            }

        } catch (error) {
            console.error("error AJAX: " + error);
        }

    });

});