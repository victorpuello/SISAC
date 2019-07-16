<?php if($errors->any()): ?>
    <input type="text" style="display: none" data-errores="<?php echo e($errors); ?>" id="errores">
<?php endif; ?>
<?php if(isset($data)): ?>
    <input type="text" style="display: none" data-error="El logro se encuentra duplicado, y no será guardado." id="duplicado">
<?php endif; ?><?php /**PATH C:\xampp\htdocs\SISAC\resources\views/docente/indicadores/partials/messages.blade.php ENDPATH**/ ?>