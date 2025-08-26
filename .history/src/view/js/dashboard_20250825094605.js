document.addEventListener("DOMContentLoaded", () => {

    const formulario = document.getElementById("formulario_tarea");

    formulario.addEventListener("submit", (e)=>{
        e.preventDefault();

        const data = {
            "nombre": document.getElementById("nombre_tarea").value.
            "descripcion": document.getElementById("descripcion_tarea").value;
        }
    });

});