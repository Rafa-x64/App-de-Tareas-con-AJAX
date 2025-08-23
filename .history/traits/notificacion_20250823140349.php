<?php

namespace traits\notificacion;

trait notificacion
{

    public function notificacion($titulo, $mensaje, $tipo)
    {
?>
        <div class="container-fluid d-flex flex-column justify-content-start align-items-center px-2">
            <div class="row d-flex flex-column justify-content-center align-items-start">
                <div class="w-auto bg-danger text-white rounded-top mb-1">
                    <h3 class="text-start mx-2">Error</h3>
                </div>
                <div class="w-auto bg-<?= $tipo?> text-white rounded-bottom">
                    <p class="text-center py-1 px-1 mb-0 fw-semibold"><?= $?></p>
                </div>
            </div>
        </div>
<?php
    }
}

?>