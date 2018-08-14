<div id="custom-content" class="modal-block modal-block-primary modal-header-color">
    <section class="card">
        <header class="card-header">
            <h2 class="card-title">Acudiente de: <strong><?php echo e($estudiante->full_name); ?></strong> </h2>
        </header>
        <div class="card-body">
            <div class="row">
                <?php if (\Illuminate\Support\Facades\Blade::check('acudiente', $estudiante)): ?>
                <div class="mt-3">
                    <a href="<?php echo e(route('docente.acudiente.create',$estudiante)); ?>" class="btn btn-primary ml-3"> Agregar acudiente</a>
                </div>
                <?php else: ?>
                    <table class=" ml-3 mr-3 table table-responsive-lg table-bordered table-striped table-sm mb-0">
                        <tbody>
                        <tr>
                            <td><strong>Nombre: </strong></td>
                            <td><?php echo e($estudiante->acudiente->name); ?></td>
                        </tr>
                        <tr>
                            <td><strong>Apellidos: </strong></td>
                            <td><?php echo e($estudiante->acudiente->lastname); ?></td>
                        </tr>
                        <tr>
                            <td><strong>Parentesco: </strong></td>
                            <td><?php echo e($estudiante->acudiente->relationship); ?></td>
                        </tr>
                        <tr>
                            <td><strong>Tel. : </strong></td>
                            <td><?php echo e($estudiante->acudiente->phone); ?></td>
                        </tr>
                        <tr>
                            <td><strong>Email: </strong></td>
                            <td><?php echo e($estudiante->acudiente->email); ?></td>
                        </tbody>
                    </table>
                    <?php endif; ?>
            </div>
        </div>
        <footer class="card-footer">
            <div class="row">
                <div class="col-md-12 text-right">
                    <?php if (\Illuminate\Support\Facades\Blade::check('acudiente', $estudiante)): ?>
                    <div></div>
                    <?php else: ?>
                         <a class="btn btn-primary" href="<?php echo e(route('docente.acudiente.edit',$estudiante->acudiente)); ?>" class="btn btn-primary ml-3"> Editar</a>
                    <?php endif; ?>
                    <button class="btn btn-default modal-dismiss">Close</button>
                </div>
            </div>
        </footer>
    </section>
</div>



