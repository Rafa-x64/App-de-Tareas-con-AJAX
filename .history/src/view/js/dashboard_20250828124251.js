document.addEventListener("DOMContentLoaded", ()=>{

    const formulario = document.getElementById("formulario_tareas");

    if(formulario){
        console.log("todo bien");
        exit();
    }

    console.log("");

    formulario.addEventListener("submit", async (e) => {

        e.preventDefault();

    });

});