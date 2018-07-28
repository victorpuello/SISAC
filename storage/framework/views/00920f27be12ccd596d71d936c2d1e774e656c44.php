<ul class="<?php echo e($class); ?>">
    <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li <?php if($item['class']): ?> class="<?php echo e($item['class']); ?>" <?php endif; ?> id="menu_<?php echo e($item['id']); ?>">
            <?php if(empty($item['submenu'])): ?>
                <a href="<?php echo e($item['url']); ?>">
                    <?php echo e($item['title']); ?>

                </a>
            <?php else: ?>
                <a href="<?php echo e($item['url']); ?>" class="dropdown-toggle" data-toggle="dropdown">
                    <?php echo e($item['title']); ?>

                    <b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                    <?php $__currentLoopData = $item['submenu']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subitem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li>
                            <a href="<?php echo e($subitem['url']); ?>"><?php echo e($subitem['title']); ?></a>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            <?php endif; ?>
        </li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>