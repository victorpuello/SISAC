<div class="form-group row">
    <div class="col-lg-4">
        <div class="form-group">
            <?php echo Form::select('docente_id',$docentes, null, ['class' => 'form-control mb-3','placeholder'=>'Seleccione un Docente', 'id'=>'docente_id','required']); ?>

        </div>
    </div>
    <div class="col-lg-4">
        <div class="form-group">
            <?php echo Form::select('asignatura_id',$asignaturas, null, ['class' => 'form-control mb-3','placeholder'=>'Seleccione una Asignatura', 'id'=>'asignatura_id','required']); ?>

        </div>
    </div>
    <div class="col-lg-4">
        <div class="form-group">
            <?php echo Form::select('periodo_id',$periodos, null, ['class' => 'form-control mb-3','placeholder'=>'Seleccione un Periodo', 'id'=>'periodo_id','required']); ?>

        </div>
    </div>
</div>
<div class="form-group row">
    <div class="col-lg-4">
        <div class="form-group">
            <?php echo Form::select('grado_id',$grados, null, ['class' => 'form-control mb-3','placeholder'=>'Seleccione un Grado', 'id'=>'grado_id','required']); ?>

        </div>
    </div>
    <div class="col-lg-4">
        <div class="form-group">
            <?php echo Form::select('category',['cognitivo' => 'Cognitivo','procedimental' => 'Procedimental','actitudinal' => 'Actitudinal'], null, ['class' => 'form-control mb-3','placeholder'=>'Seleccione una Categoria', 'id'=>'grado_id','required']); ?>

        </div>
    </div>
    <div class="col-lg-4">
        <div class="form-group">
            <?php echo Form::select('indicator',['bajo' => 'Bajo','basico' => 'Basico','alto' => 'Alto','superior' => 'Superior'], null, ['class' => 'form-control mb-3','placeholder'=>'Seleccione un Desempeño', 'id'=>'grado_id','required']); ?>

        </div>
    </div>
</div>
<div class="form-group row">
    <div class="col-lg-12">
        <?php echo Form::textarea('description',null, array('class'=>'form-control','id' => 'description','rows' => 3, 'cols' => 50,'placeholder'=>'Descripción del indicador')); ?>

    </div>
</div>
<?php echo Form::hidden('code',null); ?>