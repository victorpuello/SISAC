<?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="alert alert-block alert-<?php echo e($msg['type']); ?> fade in">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <p>
            <strong><?php echo e($msg['message']); ?></strong>
        </p>
        
        <?php if(!empty ($msg['details'])): ?>
            <p><?php echo e($msg['details']); ?></p>
        <?php endif; ?>
        
        <?php echo $msg['html']; ?>

        
        <?php if(!empty ($msg['items'])): ?>
            <ul>
              <?php $__currentLoopData = $msg['items']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($item); ?></li>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        <?php endif; ?>
        
        <?php if( ! empty ($msg['buttons'])): ?>
            <p>
                <?php $__currentLoopData = $msg['buttons']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $btn): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a class="btn btn-<?php echo e($btn['class']); ?>" href="<?php echo e($btn['url']); ?>"><?php echo e($btn['text']); ?></a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </p>
        <?php endif; ?>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>