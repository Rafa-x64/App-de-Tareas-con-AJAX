document.addEventListener("DOMContentLoaded", () => {

    const formulario = document.getElementById("formulario_tareas");

    formulario.addEventListener("submit", async (e) => {

        e.preventDefault();

        const nombre = document.getElementById("nombre_tarea").value.trim();
        const descripcion = document.getElementById("descripcion_tarea").value.trim();

        const datos = new FormData();
        datos.append("nombre", nombre);
        datos.append("descripcion", descripcion);

        try{}catch(){}

    });

});