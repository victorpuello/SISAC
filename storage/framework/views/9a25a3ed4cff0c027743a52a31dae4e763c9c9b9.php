<?php echo Form::label('name', 'Nombre de Asignatura',['class'=>'col-lg-4 control-label text-lg-right pt-2']); ?>

<div class="col-lg-8">
<?php echo Form::text('name', null, ['class' => 'form-control', 'id' =>'nameEditAsg', 'placeholder' => 'Por favor introduzca el nombre de la asignatura', 'requiered']); ?>

<?php echo Form::number('id', null, ['class' => 'form-control', 'id' =>'idEditAsg', 'style'=>'display:none']); ?>

