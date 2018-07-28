<div id="field_<?php echo e($id); ?>" class="form-check">
    <?php echo $input; ?>

    <label class="form-check-label" for="<?php echo e($id); ?>">
        <?php echo e($label); ?>

<?php if($required): ?>
        <span class="badge badge-info">Required</span>
<?php endif; ?>
    </label>
<?php $__currentLoopData = $errors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="invalid-feedback"><?php echo e($error); ?></div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
