<?php if($errors->any()): ?>
    <input type="text" style="display: none" data-errores="<?php echo e($errors); ?>" id="errores">
<?php endif; ?>
<?php if(isset($mensaje)): ?>
    <input type="text" style="display: none" data-msg="<?php echo e($mensaje); ?>" id="msg">
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\SISAC\resources\views/docente/reportes/partials/messages.blade.php ENDPATH**/ ?>