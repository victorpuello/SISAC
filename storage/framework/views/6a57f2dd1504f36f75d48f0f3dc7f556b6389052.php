<?php $__currentLoopData = $radios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $radio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="radio">
        <label>
            <?php echo Form::radio(
                $radio['name'],
                $radio['value'],
                $radio['selected'],
                ['id' => $radio['id']]); ?>

            <?php echo e($radio['label']); ?>

        </label>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>