<ul class="<?php echo e($class); ?>">
<?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if(empty($item['submenu'])): ?>
        <li id="menu_<?php echo e($item['id']); ?>" <?php echo Html::classes('nav-item', $item['class']); ?>>
            <a href="<?php echo e($item['url']); ?>" class="nav-link">
                <?php echo e($item['title']); ?>

            </a>
        </li>
    <?php else: ?>
        <li id="menu_<?php echo e($item['id']); ?>" <?php echo Html::classes('nav-item', $item['class']); ?>>
            <a href="<?php echo e($item['url']); ?>" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                <?php echo e($item['title']); ?>

            </a>
            <div class="dropdown-menu">
                <?php $__currentLoopData = $item['submenu']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subitem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="<?php echo e($subitem['url']); ?>" class="dropdown-item"><?php echo e($subitem['title']); ?></a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </li>
    <?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>
