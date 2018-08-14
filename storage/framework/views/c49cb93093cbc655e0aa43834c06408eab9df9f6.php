<div id="custom-content" class="modal-block modal-block-primary modal-header-color">
    <section class="card">
        <header class="card-header">
            <h2 class="card-title">Ficha de matricula: <strong><?php echo e($estudiante->full_name); ?></strong> </h2>
        </header>
        <div class="card-body">
            <div class="row">
                <table class=" ml-3 mr-3 table table-responsive-lg table-bordered table-striped table-sm mb-0">
                    <tbody>
                    <tr>
                        <td><strong>Nombre: </strong></td>
                        <td><?php echo e($estudiante->name); ?></td>
                    </tr>
                    <tr>
                        <td><strong>Apellidos: </strong></td>
                        <td><?php echo e($estudiante->lastname); ?></td>
                    </tr>
                    <tr>
                        <td><strong>Tipo de ID: </strong></td>
                        <td><?php echo e($estudiante->typeid); ?></td>
                    </tr>
                    <tr>
                        <td><strong>Número de ID: </strong></td>
                        <td><?php echo e($estudiante->identification); ?></td>
                    </tr>
                    <tr>
                        <td><strong>Fecha de Nacimiento: </strong></td>
                        <td><?php echo e($estudiante->birthday); ?></td>
                    </tr>
                    <tr>
                        <td><strong>Dpto. de Nacimiento: </strong></td>
                        <td><?php echo e($municipio->departamento->name); ?></td>
                    </tr>
                    <tr>
                        <td><strong>Mpio. de Nacimiento: </strong></td>
                        <td><?php echo e($municipio->name); ?></td>
                    </tr>
                    <tr>
                        <td><strong>Sexo: </strong></td>
                        <td><?php echo e($estudiante->gender); ?></td>
                    </tr>
                    <tr>
                        <td><strong>Dirección: </strong></td>
                        <td><?php echo e($estudiante->address); ?></td>
                    </tr>
                    <tr>
                        <td><strong>Fecha de Ingreso: </strong></td>
                        <td><?php echo e($estudiante->datein); ?></td>
                    </tr>
                    <tr>
                        <td><strong>Estado en Sistema: </strong></td>
                        <td><?php echo e($estudiante->stade); ?></td>
                    </tr>
                    <tr>
                        <td><strong>Situación academica: </strong></td>
                        <td><?php echo e($estudiante->situation); ?></td>
                    </tr>
                    <tr>
                        <td><strong>Salón: </strong></td>
                        <td><?php echo e($estudiante->salon->full_name); ?></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <footer class="card-footer">
            <div class="row">
                <div class="col-md-12 text-right">
                        <a class="btn btn-primary" href="<?php echo e(route('docente.estudiantes.edit',$estudiante)); ?>" class="btn btn-primary ml-3"> Editar</a>
                        <button class="btn btn-default modal-dismiss">Close</button>
                </div>
            </div>
        </footer>
    </section>
</div>
