<div class="form-group row">
    <?php echo Form::label('name', 'Nombre del área',['class'=>'col-lg-4 control-label text-lg-right pt-2']); ?>

    <div class="col-lg-8">
        <?php echo Form::text('name', null, ['class' => 'form-control','id'=>'name', 'placeholder' => 'Nombre del área','required']); ?>

    </div>
</div>
<div class="form-group row">
    <?php echo Form::label('porcentaje', 'Porcentaje: ',['class'=>'col-lg-4 control-label text-lg-right pt-2']); ?>

    <div class="col-lg-8">
        <?php echo Form::number('porcentaje',null,['class' => 'form-control','id'=>'porcentaje', 'placeholder' => 'Porcentaje','required']); ?>

    </div>
</div><?php /**PATH C:\xampp\htdocs\SISAC\resources\views/admin/areas/partials/fields.blade.php ENDPATH**/ ?>