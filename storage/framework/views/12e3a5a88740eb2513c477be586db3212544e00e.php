<?php $__env->startSection('titulo', "Perfil"); ?>
<?php $__env->startSection('namePage', "Perfil  de usuario:  ". $user->full_name); ?>
<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('vendor/bootstrap-fileupload/bootstrap-fileupload.min.css')); ?>" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-2 col-xl-2 mb-3 mb-xl-0 col-sm-12">
            <section class="card">
                <div class="card-body">
                    <div class="thumb-info mb-3">
                        <img src="<?php echo e(asset("storage/usersdata/img/users/".Auth::user()->path)); ?>" class="rounded img-fluid" alt="<?php echo e(Auth::user()->name); ?>">
                        <div class="thumb-info-title">
                            <span class="thumb-info-inner"><?php echo e(Auth::user()->name); ?></span>
                            <span class="thumb-info-type"><?php echo e(Auth::user()->type); ?></span>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="col-lg-10 col-xl-10">
            <section class="card card-featured card-featured-info mb-4">
                <header class="card-header">
                    <div class="card-actions">
                        <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
                        <a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
                    </div>

                    <h2 class="card-title">Información de Usuario</h2>
                </header>
                <?php echo Form::model($user,['route'=>['user.update',$user],'method' => 'PUT','class' => 'form-horizontal form-bordered', 'files' =>true ,'id'=>'form-edit']); ?>

                    <div class="card-body">
                        <?php echo $__env->make('users.partials.fields', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                <?php echo Form::close(); ?>

            </section>
            <?php if (\Illuminate\Support\Facades\Blade::check('docente')): ?>
            <section class="card card-featured card-featured-info mb-4">
                <header class="card-header">
                    <div class="card-actions">
                        <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
                        <a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
                    </div>

                    <h2 class="card-title">Datos del Docente</h2>
                </header>
                <div class="card-body">
                    <?php echo $__env->make('users.partials.partials-docente', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </section>
            <?php endif; ?>
        </div>

    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <?php echo $__env->make('partials.scriptdt', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scriptfin'); ?>
    <script src="<?php echo e(asset('vendor/bootstrap-fileupload/bootstrap-fileupload.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/examples/examples.notifications.js')); ?>"></script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SISAC\resources\views/users/show.blade.php ENDPATH**/ ?>