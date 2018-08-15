<?php echo Form::open(['route' => 'docente.logros.findnotes', 'method' => 'post', 'class' => 'form-horizontal', 'validate' => "novalidate" ,"id"=>"form-busqueda" ]); ?>

<div id="URL-LOAD" data-user="<?php echo e(currentPerfil()); ?>" data-urlload = "<?php echo e(route('docente.logros.loaddata',1)); ?>" style="display: none"></div>
<div class="row">
    <div class="col-lg-3">
        <div class="form-group">
            <?php echo Form::select('periodo',[], null, ['placeholder'=>'Periodo','class' => 'form-control mb-3', 'id'=>'periodo','required']); ?>

        </div>
    </div>
    <div class="col-lg-2">
        <div class="form-group">
            <?php echo Form::select('grado',[], null, ['placeholder'=>'Grado','class' => 'form-control mb-3', 'id'=>'grado','required']); ?>

        </div>
    </div>
    <div class="col-lg-4">
        <div class="form-group">
            <?php echo Form::select('asignatura',[], null, ['placeholder'=>'Asignatura','class' => 'form-control mb-3', 'id'=>'asignatura','required']); ?>

        </div>
    </div>
    <div class="col-lg-1">
        <button class="mb-1 mr-1 btn btn-primary" type="submit">Buscar</button>
    </div>
    <div class="col-sm-2">
        <div class="mb-3">
            <a  href="<?php echo e(route('docente.logros.create')); ?>" class="btn btn-success ">Agregar logro <i class="fas fa-plus"></i></a>
        </div>
    </div>
</div>
<?php echo Form::close(); ?>

