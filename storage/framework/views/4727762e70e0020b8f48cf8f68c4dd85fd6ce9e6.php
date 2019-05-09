<?php
    $classes = 'form-check-input';
    if ($hasErrors) {
        $classes .= ' is-invalid';
    }
?>
<?php $__currentLoopData = $radios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $radio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="form-check">
        <?php echo Form::radio(
            $radio['name'],
            $radio['value'],
            $radio['selected'],
            ['class' => $classes, 'id' => $radio['id']]); ?>

        <label class="form-check-label" for="<?php echo e($radio['id']); ?>">
            <?php echo e($radio['label']); ?>

        </label>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH C:\xampp\htdocs\SISAC\resources\views/themes/bootstrap4/forms/radios.blade.php ENDPATH**/ ?>