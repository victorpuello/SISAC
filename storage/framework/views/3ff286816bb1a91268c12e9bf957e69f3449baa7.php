<?php $__currentLoopData = $radios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $radio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <label class="radio-inline">
        <?php echo Form::radio(
            $radio['name'],
            $radio['value'],
            $radio['selected'],
            ['id' => $radio['id']]
        ); ?>

        <?php echo e($radio['label']); ?>

    </label>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
