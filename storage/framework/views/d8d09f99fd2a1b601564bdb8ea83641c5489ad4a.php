<div id="custom-content" class="modal-block modal-block-xs modal-block-primary modal-header-color">
    <section class="card">
        <?php echo Form::model($observacion,['route' => ['docente.observacions.update',$observacion], 'method' => 'PUT','class' => 'form-horizontal form-bordered']); ?>

        <header class="card-header">
            <div class="card-actions">
                <a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
            </div>
            <h2 class="card-title">Valorar </h2>
        </header>
        <div class="card-body">
            <?php echo $__env->make('docente.observaciones.partials.fields', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
        <footer class="card-footer">
            <div class="row">
                <div class="col-md-12 text-right">
                    
                    <button type="submit" class="btn  btn-sm btn-primary">Guardar</button>
                </div>
            </div>
        </footer>
        <?php echo Form::close(); ?>

    </section>
</div>