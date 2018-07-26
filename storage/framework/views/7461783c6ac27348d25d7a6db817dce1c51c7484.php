<!-- Start Modal agregar -->
<div id="modalAdd" class="modal-block modal-block-warning mfp-hide">
    <section class="card">
        <header class="card-header">
              <div class="col-lg-2 offset-lg-9 position-absolute align-top">
                  <div class="thumb-info mb-3">
                      <img src="" id="imgEstudiante" class="rounded img-fluid" alt="">
                  </div>
              </div>
            <h2 class="card-title" id="nameEstudiante">Agregar Nota</h2>
        </header>
        <div class="card-body">
            <?php echo Form::model($estudiante,['route' => 'notas.store', 'method' => 'post','class' => 'form-horizontal form-bordered', 'validate'=>"novalidate",'id' => 'form-create']); ?>

            <div class="modal-wrapper p-0">
                <?php echo Form::hidden('estudiante_id',null,['id'=>'estudiante_id']); ?>

                <?php echo Form::hidden('salon_id',$Idsalon,['id'=>'salon_id']); ?>

                <?php echo Form::hidden('docente_id',$Iddocente,['id'=>'docente_id']); ?>

                <?php echo Form::hidden('asignatura_id',$Idasignatura,['id'=>'asignatura_id']); ?>

                <?php echo Form::hidden('periodo_id',$Idperiodo,['id'=>'periodo_id']); ?>

                <div class="modal-text">
                    <?php echo $__env->make('admin.asignaturas.partials.messages', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <div class="row">
                        <div class="col-md-6">
                            <?php echo Form::label('logro_cog', 'Nota Cognitiva',['class'=>'control-label text-lg-right pt-2']); ?>

                            <?php echo Form::number('logro_cog', null, ['class' => 'form-control', 'required', 'min'=> 1, 'step'=>'.01']); ?>

                        </div>
                        <div class="col-md-6 col-md-offset-6">
                            <?php echo Form::label('logro_pro', 'Nota Procedimental',['class'=>' control-label text-lg-right pt-2']); ?>

                            <?php echo Form::number('logro_pro', null, ['class' => 'form-control', 'required', 'min'=> 1, 'step'=>'.01']); ?>

                        </div>
                        <div class="col-md-6">
                            <?php echo Form::label('logro_ac', 'Nota Actitudinal',['class'=>' control-label text-lg-right pt-2']); ?>

                            <?php echo Form::number('logro_ac', null, ['class' => 'form-control',  'required', 'min'=> 1, 'step'=>'.01']); ?>

                        </div>
                        <div class="col-md-6 col-md-offset-6">
                            <?php echo Form::label('fallas', 'N° de Inasistencias',['class'=>'control-label text-lg-right pt-2']); ?>

                            <?php echo Form::number('fallas', 0, ['class' => 'form-control', 'min'=> 0, ]); ?>

                        </div>
                    </div>
                </div>
            </div>
            <footer class="card-footer">
                <div class="row">
                    <div class="col-md-12 text-right">
                        <button type="submit" class="btn btn-primary addAsignatura">Guardar</button>
                        <button class="btn btn-default modal-dismiss">Cancelar</button>
                    </div>
                </div>
            </footer>
            <?php echo Form::close(); ?>

        </div>
    </section>
</div>
<!-- End Modal Agregar-->
