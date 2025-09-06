document.addEventListener("DOMContentLoaded", () => {

    let form = document.getElementById("formulario_tareas");
    let table = document.getElementById("tabla_tarea");

    if (!form || !table) {
        console.log("no funciona una shit");
        return;
    }

    console.log("todo funciona bien");

});