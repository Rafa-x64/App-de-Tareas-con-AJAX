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
            //hacemos await para que la pagina espere mientras se hace el fetch (se envia el json al controlador)
            const respuesta = await fetch("php/controller/tarea_controller.php", { //ruta donde se va a enviar el json y cuerpo del envio
                method: "POST",
                body: datos
            });

            //convertimos a texto lo que devuelve la respuesta y lo mostramos por consola
            const textoPlano = await respuesta.text();
            console.log("Respuesta cruda:", textoPlano);
            //convertimos el estado del retorno a json
            const resultado = JSON.parse(textoPlano);

            //si el resultado del retorno es ok=false
            if (!resultado.ok) {
                alert(resultado.mensaje);
            //si el resultado del retorno es ok=true
            } else {
                //se agrega un 
                document.getElementById("tareas").innerHTML = resultado.html;
            }

        } catch (error) {
            console.error("error AJAX: " + error);
        }
    });
});