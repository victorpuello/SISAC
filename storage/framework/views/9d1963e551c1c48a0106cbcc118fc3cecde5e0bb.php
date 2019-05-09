<header class="clearfix">
    <div class="row justify-content-md-center">
        <div class="col-sm-1 mt-0 mb-0 position-absolute">
            <div class="ib ml-5">
                <img class="ml-5" src="<?php echo e(asset("storage/".$institucion->path)); ?>" alt="INELMU" />
            </div>
        </div>
        <div class="col-sm-6 text-right mt-1 mb-1">
            <p class="ib text-center mb-1" style="line-height: 1.2">
                <span class="text-uppercase"><?php echo e($institucion->name); ?></span><br>
                <?php echo e($institucion->address); ?><br>
                DANE Nº <?php echo e($institucion->dane); ?> - NIT <?php echo e($institucion->nit); ?> - 3<br>
                Correo electrónico: <?php echo e($institucion->email); ?><br>
                <span class="font-weight-light" style="font-size: 10px; line-height: 1">RESOLUCIÓN DE APROBACIÓN  DE LA INSTITUCIÓN EDUCATIVA <?php echo e($institucion->resolucion); ?></span></br>
            </p>
            <h4 class="ib text-center text-uppercase mt-1 mb-0"><?php echo e($nameReporte); ?></h4>
        </div>
    </div>
</header><?php /**PATH C:\xampp\htdocs\SISAC\resources\views/admin/reportes/partials/header.blade.php ENDPATH**/ ?>