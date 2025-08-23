<?php

namespace traits\notificacion;

trait notificacion
{

    public function notificacion($titulo, $mensaje, $tipo)
    {
?>
        <div class="container-fluid px-2">
            <div class="row d-flex flex-row justify-content-center align-items-center">
                <div class="col-8 bg-<?= $tipo?> text-white">
                    <p class="text-center py-0 mb-0"><?= ?></p>
                </div>
            </div>
        </div>
<?php
    }
}

?>