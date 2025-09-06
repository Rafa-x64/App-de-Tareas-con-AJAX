document.addEventListener("DOMContentLoaded", () => {

    //se obtiene el formulario una vez el contenido de la pagina este cargado
    const formulario = document.getElementById("formulario_tareas");

    //se le agregaa un event listener para cuando se le de en submit
    formulario.addEventListener("submit", async (e) => { //pasamos el evento como parametro 
        e.preventDefault();//prevenimos que se recargue la pagina

        //obtenemos los campos de nombre y descripcion de la tarea
        const nombre = document.getElementById("nombre_tarea").value.trim();
        const descripcion = document.getElementById("descripcion_tarea").value.trim();

        //creamos un nuevo objeto form data llamado datos
        const datos = new FormData();
        datos.append("nombre", nombre);//agregamos nombre y descripcion al objeto form data
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