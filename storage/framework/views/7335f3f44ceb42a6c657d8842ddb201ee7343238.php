<h4<?php echo Html::classes(['text-danger' => $hasErrors]); ?>>
    <?php echo e($label); ?>

<?php if($required): ?>
    <span class="badge badge-info">Required</span>
<?php endif; ?>
</h4>
<?php echo $input; ?>

<?php $__currentLoopData = $errors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <p class="text-danger"><?php echo e($error); ?></p>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<br>