document.addEventListener("DOMContentLoaded", () => {

    const form = document.getElementById("formulario_tareas");

    form.addEventListener("submit", async (e) => {
        e.preventDefault();

        const datos = {
            nombre: document.getElementById("nombre_tarea").value.trim(),
            descripcion: document.getElementById("descripcion_tarea").value.trim()
        };

        try {
            const texto = await respuesta.text(); // ← capturamos el texto sin parsear
            console.log("Respuesta cruda del servidor:", texto);

            const resultado = JSON.parse(texto); // ahora intentamos parsear manualmente
            console.log("JSON parseado:", resultado);
        } catch (error) {
            console.error("Error al parsear JSON:", error);

    });

});

