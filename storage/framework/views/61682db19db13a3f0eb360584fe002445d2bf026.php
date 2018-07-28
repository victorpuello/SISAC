<div id="field_<?php echo e($id); ?>"<?php echo Html::classes(['checkbox', 'error' => $hasErrors]); ?>>
    <label>
        <?php echo $input; ?>

        <?php echo e($label); ?>

    </label>
    
    <?php if($required): ?>
        <span class="label label-info">Required</span>
    <?php endif; ?>
    
    <?php if(!empty($errors)): ?>
        <div class="controls">
            <?php $__currentLoopData = $errors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <p class="help-block"><?php echo e($error); ?></p>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php endif; ?>
</div>
