<?php if(\Illuminate\Support\Facades\Auth::user()->type === 'docente'): ?>
    <?php echo Form::hidden('docente_id', \Illuminate\Support\Facades\Auth::user()->docente->id); ?>

<?php else: ?>
    <?php echo Form::select('docente_id',array_pluck($logros,'name','docente_id'), null, ['placeholder'=>'Docente','class' => 'form-control mb-3', 'id'=>'periodo_id','required']); ?>

<?php endif; ?>
<div class="form-group row">
    <div class="col-lg-4">
        <div class="form-group">
            <?php echo Form::select('periodo_id',$periodos, null, ['placeholder'=>'Periodo','class' => 'form-control mb-3', 'id'=>'periodo_id','required']); ?>

        </div>
    </div>
    <div class="col-lg-4">
        <div class="form-group">
            <?php echo Form::select('asignatura_id',$asignaturas, null, ['placeholder'=>'Asignatura','class' => 'form-control mb-3', 'id'=>'asignatura_id','required']); ?>

        </div>
    </div>
    <div class="col-lg-4">
        <div class="form-group">
            <?php echo Form::select('grade',$grados, null, ['placeholder'=>'Grado','class' => 'form-control mb-3', 'id'=>'grade','required']); ?>

        </div>
    </div>
</div>
<div class="form-group row">
    <div class="col-lg-6">
        <?php echo Form::text('code', null, ['class' => 'form-control','id'=>'code', 'placeholder' => 'Codigo identificador de logro']); ?>

    </div>
    <div class="col-lg-6">
        <?php echo Form::select('category',['cognitivo'=>'Cognitivo','procedimental'=>'Procedimental','actitudinal'=>'Actitudinal'], null, ['placeholder'=>'Tipo de logro','class' => 'form-control mb-3', 'id'=>'category','required']); ?>

    </div>
</div>
<div class="form-group row">
    <div class="col-lg-12">
        <?php echo Form::textarea('description',null, array('class'=>'form-control','id' => 'description','rows' => 3, 'cols' => 50,'placeholder'=>'Descripción del Logro')); ?>

    </div>
</div>
