document.addEventListener("DOMContentLoaded", () => {

    const form = document.getElementById("formulario_tareas");

    form.addEventListener("submit", async (e) => {
        e.preventDefault();
        
        const datos = {
            nombre: document.getElementById("nombre_tarea"),
            descripcion: document.getElementById("descripcion_tarea"),
            fecha: document.getElementById("fecha_tarea"),

        }

    });

});

