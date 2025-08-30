document.addEventListener("DOMContentLoaded", () => {

    //se obtiene el formulario una vez el contenido de la pagina este cargado
    const formulario = document.getElementById("formulario_tareas");

    //se le agregaa un event listener para cuando se le de en submit
    formulario.addEventListener("submit", async (e) => { //pasamos el evento como parametro 
        e.preventDefault();//prevenimos que se recargue la pagina

        //
        const nombre = document.getElementById("nombre_tarea").value.trim();
        const descripcion = document.getElementById("descripcion_tarea").value.trim();

        const datos = new FormData();
        datos.append("nombre", nombre);
        datos.append("descripcion", descripcion);

        try {
            const respuesta = await fetch("php/controller/tarea_controller.php", {
                method: "POST",
                body: datos
            });

            const textoPlano = await respuesta.text();
            console.log("Respuesta cruda:", textoPlano);

            const resultado = JSON.parse(textoPlano);

            if (!resultado.ok) {
                alert(resultado.mensaje);
            } else {
                document.getElementById("tareas").innerHTML = resultado.html;
            }

        } catch (error) {
            console.error("error AJAX: " + error);
        }
    });
});