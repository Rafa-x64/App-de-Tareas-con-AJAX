document.addEventListener("DOMContentLoaded", () => {

    let form = document.getElementById("formulario_tareas");
    let table = document.getElementById("tabla_tareas");

    // Función para obtener y mostrar tareas
    const obtenerTareas = async () => {
        try {
            const res = await fetch(`${SERVERURL}php/controller/tarea_controller.php?accion=obtener_tareas`);
            const tareas = await res.json();
            tablaTareas.innerHTML = ""; // Limpia la tabla
            tareas.forEach(tarea => {
                const fila = document.createElement("tr");
                fila.innerHTML = `
                    <td>${tarea.tarea_id}</td>
                    <td>${tarea.tarea_nombre}</td>
                    <td>${tarea.tarea_descripcion}</td>
                    <td>
                        <button class="btn btn-sm btn-primary">Editar</button>
                        <button class="btn btn-sm btn-danger">Eliminar</button>
                    </td>
                `;
                tablaTareas.appendChild(fila);
            });
        } catch (error) {
            console.error("Error al obtener las tareas:", error);
        }
    };

    // Envío del formulario
    formularioTareas.addEventListener("submit", async (e) => {
        e.preventDefault();

        const datos = new FormData(formularioTareas);
        const nombreTarea = document.getElementById("nombre_tarea").value;
        const descripcionTarea = document.getElementById("descripcion_tarea").value;

        datos.append('nombre_tarea', nombreTarea);
        datos.append('descripcion_tarea', descripcionTarea);

        try {
            const res = await fetch(`${SERVERURL}php/controller/tarea_controller.php`, {
                method: "POST",
                body: datos,
            });
            const mensaje = await res.text();

            document.getElementById("notificaciones").innerHTML = mensaje; // Asume que hay un div con este id para las notificaciones
            formularioTareas.reset();
            obtenerTareas(); // Vuelve a cargar las tareas para ver la nueva
        } catch (error) {
            console.error("Error al agregar la tarea:", error);
        }

        
        