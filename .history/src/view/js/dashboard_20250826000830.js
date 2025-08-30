document.addEventListener("DOMContentLoaded", () => {

    const form = document.getElementById("formulario_tarea");

    form.addEventListener("submit", async (e) => {
        e.preventDefault();

        const datos = {
            nombre: document.getElementById("nombre_tarea").value.trim(),
            descripcion: document.getElementById("descripcion_tarea").value.trim()
        };

        try {
            const respuesta = await fetch("php/controller/ajax_controller.php", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify(datos)
            });

            const texto = await respuesta.text(); // ahora sí, respuesta existe
            console.log("Respuesta cruda del servidor:", texto);

            const resultado = JSON.parse(texto);
            console.log("JSON parseado:", resultado);
        } catch (error) {
            console.error("Error al parsear JSON:", error);
        }
    });

});

