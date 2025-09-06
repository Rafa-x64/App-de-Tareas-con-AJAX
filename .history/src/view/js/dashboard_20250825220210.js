document.addEventListener("DOMContentLoaded", () => {

    alert("form");

    const form = document.getElementById("formulario_tareas");

    form.addEventListener("submit", async (e)=>{
        e.preventDefault();
        console.log("funciona");
    });

});

