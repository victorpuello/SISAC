<?php if($errors->any()): ?>
    <input type="text" style="display: none" data-errores="<?php echo e($errors); ?>" id="errores">
<?php endif; ?>
