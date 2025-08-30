document.addEventListener("DOMContentLoaded", () => {

    const form = document.getElementById("formulario_tareas");

    form.addEventListener("submit", async (e) => {
        e.preventDefault();

        const datos = {
            nombre: document.getElementById("nombre_tarea").value.trim(),
            descripcion: document.getElementById("descripcion_tarea").value.trim()
        };

        console.loh(datos);

        try {
            const respuesta = await fetch("php/controller/ajax_controller.php", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify(datos)
            });
            const resultado = await respuesta.json();
            console.log("Respuesta del servidor:", resultado);
        } catch (error) {
            console.error("Error en la solicitud AJAX:", error);
        };

    });

});

