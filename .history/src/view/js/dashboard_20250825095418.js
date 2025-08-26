document.addEventListener("DOMContentLoaded", () => {

    const formulario = document.getElementById("formulario_tarea");

    formulario.addEventListener("submit", async (e) => {
        e.preventDefault();

        const data = {
            "nombre": document.getElementById("nombre_tarea").value.trim(),
            "descripcion": document.getElementById("descripcion_tarea").value.trim()
        }

        const respuesta = await postData("php/controller/task_controller.php?action=create", data);

        if (respuesta.success) {
            formulario.reset();
            console.log('Tarea creada:', res.data);
        } else {
            console.warn('Error:', res.message);
        }
    });

});