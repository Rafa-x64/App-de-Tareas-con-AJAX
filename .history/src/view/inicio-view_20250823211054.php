<section class="container-fluid mt-5">
    <div class="row d-flex flex-colum justify-content-center align-items-center">
        <div class="col-6 bg-light bg-opacity-75 p-4 border-1 border-white rounded shadow" id="formulario_inicio_sesion_fondo">
            <h1 class="text-center fw-semibold">Iniciar Sesion</h1>
            <form action="" method="post" class="form-control bg-transparent border-0" id="formulario_inicio_sesion">
                <div class="row d-flex flex-row justify-content-center align-items-end">
                    <div class="col-11 px-0">
                        <input type="text" name="" id="" class="form-control bg-transparent fw-medium h-80 mt-4" placeholder="Email">
                    </div>
                    <div class="col-1 d-flex flex-row justify-content-center formulario_inicio_sesion_icono">
                        <i class="bi bi-envelope fs-4"></i>
                    </div>
                </div>
                <div class="row d-flex flex-row justify-content-center align-items-end">
                    <div class="col-11 px-0">
                        <input type="password" name="" id="" class="form-control bg-transparent fw-medium h-80 mt-4" placeholder="Contraseña">
                    </div>
                    <div class="col-1 d-flex flex-row justify-content-center formulario_inicio_sesion_icono">
                        <i class="bi bi-lock-fill fs-4"></i>
                    </div>
                </div>
                <div class="row d-flex flex-row justify-content-betwen align-items-center">
                    <div class="col-6 d-flex flex-row justify-content-betwen align-items-center">
                        
                    </div>
                    <div class="col-6 d-flex flex-row justify-content-betwen align-items-center">

                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

<?php

include("php/controller/inicio_controller.php");

//hacer echo al llamar un metodo
echo inicio_controller::validarConexion();

?>