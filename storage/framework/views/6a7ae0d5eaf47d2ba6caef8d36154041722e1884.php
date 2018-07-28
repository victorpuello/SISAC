<?php
    $classes = 'form-check-input';
    if ($hasErrors) {
        $classes .= ' is-invalid';
    }
?>
<?php $__currentLoopData = $checkboxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $checkbox): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="form-check form-check-inline">
        <?php echo Form::checkbox(
            $checkbox['name'],
            $checkbox['value'],
            $checkbox['checked'],
            ['class' => $classes, 'id' => $checkbox['id']]
        ); ?>

        <label class="form-check-label" for="<?php echo e($checkbox['id']); ?>">
            <?php echo e($checkbox['label']); ?>

        </label>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
