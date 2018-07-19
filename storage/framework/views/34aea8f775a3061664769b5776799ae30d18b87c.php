<?php echo Form::open(['route' => 'findNotes', 'method' => 'post', 'class' => 'form-horizontal', 'novalidate' => "novalidate"]); ?>

<div class="row">
    <div class="col-lg-3">
        <div class="form-group">
            <?php echo Form::select('periodo',$periodos, null, ['placeholder'=>'Periodo','class' => 'form-control mb-3', 'id'=>'coordinator','required']); ?>

        </div>
    </div>
    <div class="col-lg-2">
        <div class="form-group">
            <?php echo Form::select('grado',$grados, null, ['placeholder'=>'Grado','class' => 'form-control mb-3', 'id'=>'coordinator','required']); ?>

        </div>
    </div>
    <div class="col-lg-4">
        <div class="form-group">
            <?php echo Form::select('asignatura',$asignaturas, null, ['placeholder'=>'Asignatura','class' => 'form-control mb-3', 'id'=>'coordinator','required']); ?>

        </div>
    </div>
    <div class="col-lg-1">
        <button class="mb-1 mr-1 btn btn-primary" type="submit">Buscar</button>
    </div>
    <div class="col-sm-2">
        <div class="mb-3">
            <a  href="#modalAdd" class="btn btn-success modal-basic">Agregar logro <i class="fas fa-plus"></i></a>
        </div>
    </div>
</div>
<?php echo Form::close(); ?>

