document.addEventListener("DOMContentLoaded", () => {

    const form = document.getElementById("formulario_tareas");

    form.addEventListener("submit", async (e) => {
        e.preventDefault();
        
        const datos = {
            nombre: document.getElementById("nombre_tarea").value.trim(),
            descripcion: document.getElementById("descripcion_tarea").value.trim()
        };

        try{}catch(){}

    });

});

