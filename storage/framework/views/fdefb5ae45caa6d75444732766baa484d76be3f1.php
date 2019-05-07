<?php echo $__env->make('admin.estudiantes.partials.messages', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo Form::open(['route' => 'docente.anotaciones.store', 'method' => 'post','files' => true,'class' => 'form-horizontal form-bordered']); ?>

<?php echo $__env->make('docente.observador.partials.fields', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="card-footer">
    <button type="submit" class="btn btn-primary">Guardar</button>
</div>
<?php echo Form::close(); ?>