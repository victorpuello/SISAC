<span class="alternative-font"><?php echo e($estudiante->FullName); ?></span>
<hr class="dotted short">
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
        <?php if(!$estudiante->getActiveAttribute()): ?>
            <tr>
                <td><strong>Fecha de Retiro: </strong></td>
                <td><?php echo e($estudiante->dateout); ?></td>
            </tr>
        <?php endif; ?>
        <tr>
            <td><strong>Estado en Sistema: </strong></td>
            <td><?php echo e($estudiante->stade); ?></td>
        </tr>
        <tr>
            <td><strong>Situación academica: </strong></td>
            <td><?php echo e($estudiante->situation); ?></td>
        </tr>
        <tr>
            <td><strong>Grupo: </strong></td>
            <td><?php echo e($estudiante->grupo->name_aula); ?></td>
        </tr>
        </tbody>
    </table>
</div>