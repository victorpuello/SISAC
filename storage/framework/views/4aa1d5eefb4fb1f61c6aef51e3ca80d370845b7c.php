<?php $__currentLoopData = $checkboxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $checkbox): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <label class="checkbox-inline">
        <?php echo Form::checkbox(
            $checkbox['name'],
            $checkbox['value'],
            $checkbox['checked'],
            ['id' => $checkbox['id']]
        ); ?>

        <?php echo e($checkbox['label']); ?>

    </label>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>