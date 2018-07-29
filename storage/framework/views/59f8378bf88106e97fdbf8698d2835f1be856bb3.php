<?php if(\Illuminate\Support\Facades\Auth::user()->type === 'docente'): ?>
    <?php echo Form::hidden('docente_id', \Illuminate\Support\Facades\Auth::user()->docente->id,['id'=>'docente_id']); ?>

<?php else: ?>
    <?php echo Form::select('docente_id',$docentes, null, ['placeholder'=>'Docente','class' => 'form-control mb-3', 'id'=>'docente_id','required']); ?>

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
    <div class="col-lg-4">
        <div class="form-group">
            <?php echo Form::select('category',['cognitivo'=>'Cognitivo','procedimental'=>'Procedimental','actitudinal'=>'Actitudinal'], null, ['placeholder'=>'Tipo de logro','class' => 'form-control mb-3', 'id'=>'category','required']); ?>

        </div>
    </div>
    <div class="col-lg-4">
        <div class="form-group">
            <?php echo Form::select('indicador',['bajo'=>'Bajo','basico'=>'Basico','alto'=>'Alto', 'superior' => 'Superior'], null, ['placeholder'=>'Indicador de logro','class' => 'form-control mb-3', 'id'=>'indicador','required']); ?>

        </div>
    </div>
    <div class="col-lg-4">
        <div class="form-group">
            <?php if(Request::path() === 'admin/logros/create'): ?>
                <?php echo Form::text('codeUser', null,['placeholder'=>'Codigo Identificador','class' => 'form-control mb-3', 'id'=>'codeUser','required']); ?>

            <?php else: ?>
                <?php echo Form::text('codeUser', null,['placeholder'=>'Codigo Identificador','class' => 'form-control mb-3','readonly'=>'readonly', 'id'=>'codeUser','required']); ?>

            <?php endif; ?>
                <?php echo Form::hidden('code',null,['id'=>'code']); ?>

        </div>
    </div>

</div>
<div class="form-group row">
    <div class="col-lg-12">
        <?php echo Form::textarea('description',null, array('class'=>'form-control','id' => 'description','rows' => 3, 'cols' => 50,'placeholder'=>'Descripción del Logro')); ?>

    </div>
</div>