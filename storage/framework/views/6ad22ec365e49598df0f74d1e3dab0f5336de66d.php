<?php if($errors->any()): ?>
    <input type="text" style="display: none" data-errores="<?php echo e($errors); ?>" id="errores">
<?php endif; ?>
<?php if(isset($data)): ?>
    <input type="text" style="display: none" data-success="<?php echo e(dd($data)); ?>" id="success">
<?php endif; ?>
<?php /**PATH /var/www/SISAC/resources/views/admin/users/partials/messages.blade.php ENDPATH**/ ?>