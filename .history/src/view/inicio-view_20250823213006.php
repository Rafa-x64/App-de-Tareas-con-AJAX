<section class="container-fluid mt-5">
    <div class="row d-flex flex-colum justify-content-center align-items-center">
        <!--fondo-->
        <div class="col-6 bg-light bg-opacity-75 p-4 border-1 border-white rounded shadow" id="formulario_inicio_sesion_fondo">
            <!--texto-->
            <h1 class="text-center fw-semibold">Iniciar Sesion</h1>
            <!--formulario-->
            <form action="" method="post" class="form-control bg-transparent border-0" id="formulario_inicio_sesion">
                <!--email-->
                <div class="row d-flex flex-row justify-content-center align-items-end">
                    <div class="col-11 px-0">
                        <input type="email" name="" id="" class="form-control bg-transparent fw-medium h-80 mt-4" placeholder="Email">
                    </div>
                    <div class="col-1 d-flex flex-row justify-content-center formulario_inicio_sesion_icono">
                        <i class="bi bi-envelope fs-4"></i>
                    </div>
                </div>
                <!--contraseña-->
                <div class="row d-flex flex-row justify-content-center align-items-end">
                    <div class="col-11 px-0">
                        <input type="password" name="" id="" class="form-control bg-transparent fw-medium h-80 mt-4" placeholder="Contraseña">
                    </div>
                    <div class="col-1 d-flex flex-row justify-content-center formulario_inicio_sesion_icono">
                        <i class="bi bi-lock-fill fs-4"></i>
                    </div>
                </div>
                <!--opciones-->
                <div class="row d-flex flex-row justify-content-betwen align-content-center mt-3">
                    <div class="col-6 d-flex flex-row justify-content-start align-items-center">
                        <input type="checkbox" name="" id="" class="form-check-input my-0">
                        <p class="my-0 ms-2 fw-medium">Recuerdame</p>
                    </div>
                    <div class="col-6 d-flex flex-row justify-content-end align-items-center">
                        <a href="" class="text-decoration-none">
                            <p class="my-0 fw-medium">Olvidaste tu contraseña?</p>
                        </a>
                    </div>
                </div>
                <!--botones-->
                <div class="row">
                    <div class="col mx-0 px-0">
                        <button type="submit" class="btn rounded w-100 text-center  mx-0 px-0 py-0">
                            <h3 class="text-white fw-semibold w-100 h-100 mb-0 my-2">Iniciar Sesion</h3>
                        </button>
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