<h4 class="mb-3">Acudiente</h4>
<hr class="dotted short">
<div class="row">
    <?php if (\Illuminate\Support\Facades\Blade::check('acudiente', $estudiante)): ?>
    <div class="mt-3">
        <a href="<?php echo e(route('secretaria.acudiente.create',$estudiante)); ?>" class="btn btn-primary ml-3"> Agregar acudiente</a>
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
        <div class="mt-3">
            <a href="<?php echo e(route('secretaria.acudiente.edit',$estudiante->acudiente)); ?>" class="btn btn-primary ml-3"> Editar</a>
        </div>
        <?php endif; ?>
</div>