<?php 

session_start()

?>
<section class="container-fluid mt-4">
    <div class="row">
        <div class="col-5">
            <div class="card">
                <div class="card-body">
                    <form id="formulario_tareas">
                        <div class="form-group">
                            <input type="text" id="nombre_tarea" class="form-control" placeholder="Nombre de la tarea">
                        </div>
                        <div class="form-group mt-3">
                            <textarea rows="8" id="descripcion_tarea" class="form-control" placeholder="Descripción de la tarea"></textarea>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary mt-3 w-100">Agregar tarea</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-7">
            <table class="table table-striped table-bordered table-hover" id="tabla_tareas">
                <thead class="thead-dark">
                    <tr>
                        <th>
                            ID
                        </th>
                        <th>
                            Nombre
                        </th>
                        <th>
                            Descripción
                        </th>
                        <th>
                            Acciones
                        </th>
                    </tr>
                </thead>
                <tbody id="tareas">
                    <tr>
                        <td>
                            1
                        </td>
                        <td>
                            Tarea 1
                        </td>
                        <td>
                            Descripcion tarea 1
                        </td>
                        <td>
                            <button class="btn btn-sm btn-primary">Editar</button>
                            <button class="btn btn-sm btn-danger">Eliminar</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>

<script type="module" src="view/js/dashboard.js"></script>