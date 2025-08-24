<section class="container-fluid mt-5">
    <div class="row d-flex flex-colum justify-content-center align-items-center">
        <div class="col-6 bg-light bg-opacity-75 p-4 border-1 border-white rounded shadow" id="formulario_inicio_sesion_fondo">
            <h1 class="text-center fw-semibold">Iniciar Sesion</h1>
            <form action="" method="post" class="">

            </form>
        </div>
    </div>
</section>

<?php

include("php/controller/inicio_controller.php");

//hacer echo al llamar un metodo
echo inicio_controller::validarConexion();

?>