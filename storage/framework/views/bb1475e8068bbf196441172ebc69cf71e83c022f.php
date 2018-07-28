<?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="alert alert-<?php echo e($msg['type']); ?> alert-dismissible fade show" role="alert">
        <strong><?php echo e($msg['message']); ?></strong>
    <?php if(!empty ($msg['details'])): ?>
        <?php echo e($msg['details']); ?>

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
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
