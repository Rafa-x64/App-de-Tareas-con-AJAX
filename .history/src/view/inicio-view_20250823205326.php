<section class="container-fluid mt-5">
    <div class="row d-flex flex-colum justify-content-center align-items-center">
        <div class="col-6 bg-light bg-opacity-75 p-4 border-1 border-white rounded shadow" id="formulario_inicio_sesion_fondo">
            <h1 class="text-center fw-semibold">Iniciar Sesion</h1>
            <form action="" method="post" class="form-control bg-transparent border-0" id="formulario_inicio_sesion">
                div.row.d-flex.flex-row>(div.col-11+div.col-1)*2
                <input type="text" name="" id="" class="form-control bg-transparent h-80" placeholder="Email">
                <input type="password" name="" id="" class="form-control bg-transparent h-80 mt-3" placeholder="Contraseña">
            </form>
        </div>
    </div>
</section>

<?php

include("php/controller/inicio_controller.php");

//hacer echo al llamar un metodo
echo inicio_controller::validarConexion();

?>