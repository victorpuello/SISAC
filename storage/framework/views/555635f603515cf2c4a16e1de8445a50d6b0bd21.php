<!-- Start Modal Sabana -->
<div id="modalSabana" class="modal-block modal-block-sm modal-header-color modal-block-danger  mfp-hide">
    <section class="card">
        <header class="card-header">
            <h2 class="card-title">Generar Sabana de Notas</h2>
        </header>
        <div class="card-body">
            <?php echo Form::open(['route' => 'docente.reportes.academico.sabana', 'method' => 'POST','class' => 'form-horizontal form-bordered', 'id' => 'form-create']); ?>

            <div class="modal-wrapper pt-0">
                <div class="modal-icon mt-3">
                    <i class="fas fa-print mt-2"></i>
                </div>
                <div class="modal-text ">
                    <?php echo $__env->make('admin.asignaturas.partials.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <div class="form-group mb-0 pb-0">
                        <label class=" control-label text-sm-right " for="w1-username">Periodo: </label>
                        <?php echo Form::select('periodo',$periodos, null, ['class' => 'form-control ', 'id'=>'w1-username','required', 'placeholder'=>'Seleccione un periodo']); ?>

                    </div>
                </div>
            </div>
        </div>
        <footer class="card-footer">
            <div class="row">
                <div class="col-md-12 text-right">
                    <button type="submit" class="btn btn-primary ">Descargar</button>
                    <button class="btn btn-default modal-dismiss">Cancelar</button>
                </div>
            </div>
        </footer>
        <?php echo Form::close(); ?>

    </section>
</div>
<!-- End Modal Sabana-->

<!-- Start Modal Logros -->
<div id="modalLogros" class="modal-block modal-block-sm modal-header-color modal-block-primary mfp-hide">
    <section class="card">
        <header class="card-header">
            <h2 class="card-title">Generar reporte de logros</h2>
        </header>
        <div class="card-body">
            <?php echo Form::open(['route' => 'docente.reportes.academico.logros', 'method' => 'POST','class' => 'form-horizontal form-bordered', 'id' => 'form-create']); ?>

            <div class="modal-wrapper pt-0">
                <div class="modal-icon mt-5">
                    <i class="fas fa-print mt-2"></i>
                </div>
                <div class="modal-text ">
                    <?php echo $__env->make('docente.reportes.partials.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <div class="form-group mb-0 pb-0">
                        <label class=" control-label text-sm-right " for="w1-username">Periodo: </label>
                        <?php echo Form::select('periodo',$periodos, null, ['class' => 'form-control ', 'id'=>'w1-username','required', 'placeholder'=>'Seleccione un periodo']); ?>

                    </div>
                    <div class="form-group mb-0 pb-0">
                        <label class="control-label text-sm-right " for="w1-username">Grado: </label>
                        <?php echo Form::select('grade',$grados, null, ['class' => 'form-control', 'id'=>'w1-username','required', 'placeholder'=>'Seleccione un grado']); ?>

                    </div>
                    <div class="form-group mb-0 pb-0">
                        <label class="control-label text-sm-right " for="w1-username">Asignatura: </label>
                        <?php echo Form::select('asignatura',$asignaturas, null, ['class' => 'form-control', 'id'=>'w1-username','required', 'placeholder'=>'Seleccione una Asignatura']); ?>

                    </div>
                </div>
            </div>
        </div>
        <footer class="card-footer">
            <div class="row">
                <div class="col-md-12 text-right">
                    <button type="submit" class="btn btn-primary ">Descargar</button>
                    <button class="btn btn-default modal-dismiss">Cancelar</button>
                </div>
            </div>
        </footer>
        <?php echo Form::close(); ?>

    </section>
</div>
<!-- End Modal Logros-->
<?php /**PATH C:\xampp\htdocs\SISAC\resources\views/docente/reportes/partials/modals.blade.php ENDPATH**/ ?>