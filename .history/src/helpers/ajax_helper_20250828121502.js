// Función para obtener y mostrar tareas
async func obtenerTareas (){
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