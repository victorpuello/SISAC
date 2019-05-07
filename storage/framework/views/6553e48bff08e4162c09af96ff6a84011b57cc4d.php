<?php $__env->startSection('contenido'); ?>
    <form method="POST" action="<?php echo e(route('login')); ?>" aria-label="<?php echo e(__('Login')); ?>">
        <?php echo csrf_field(); ?>
        <div class="form-group mb-3">
            <label>Usuario</label>
            <div class="input-group">
                <input name="username" type="text"
                       class="form-control form-control-lg <?php echo e($errors->has('username') ? ' is-invalid' : ''); ?>"
                       name="username" value="<?php echo e(old('username')); ?>" required autofocus>
                <span class="input-group-append">
                    <span class="input-group-text">
                         <i class="fas fa-user"></i>
                     </span>
                 </span>
            </div>
            <?php if($errors->has('username')): ?>
                <span class="invalid-feedback"role="alert">
                    <strong><?php echo e($errors->first('username')); ?></strong>
                </span>
            <?php endif; ?>
        </div>

        <div class="form-group mb-3">
            <div class="clearfix">
                <label class="float-left">Contraseña</label>
                <a href="<?php echo e(route('password.request')); ?>" class="float-right">Olvido la Contraseña?</a>
            </div>
            <div class="input-group">
                <input name="password" type="password"
                       class="form-control form-control-lg<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>"
                       name="password" required>
                <span class="input-group-append">
                <span class="input-group-text">
                    <i class="fas fa-lock"></i>
                </span>
                </span>
                <?php if($errors->has('password')): ?>
                    <span class="invalid-feedback" role="alert">
                        <strong><?php echo e($errors->first('password')); ?></strong>
                    </span>
                <?php endif; ?>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-8">
                <div class="checkbox-custom checkbox-default">
                    <input id="RememberMe" type="checkbox" name="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>>
                    <label for="RememberMe">Recordarme</label>
                </div>
            </div>
            <div class="col-sm-4 text-right">
                <button type="submit" class="btn btn-primary mt-2">Iniciar</button>
            </div>
        </div>

        <span class="mt-3 mb-3 line-thru text-center text-uppercase"></span>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.login', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>