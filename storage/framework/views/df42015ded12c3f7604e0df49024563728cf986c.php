<!doctype html>
<html lang="es">
<head>
    <title> Informe Logros</title>
    <!-- Web Fonts  -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet" type="text/css">
    <!-- Vendor CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('vendor/bootstrap/css/bootstrap.css')); ?>" />
    <!-- Invoice Print Style -->
    <link rel="stylesheet" href="<?php echo e(asset('css/invoice-print.css')); ?>" />

</head>
<body>
<div class="invoice">
    <header class="clearfix">
        <div class="row justify-content-md-center">
            <div class="col-sm-1 mt-0 position-absolute">
                <div class="ib ml-5">
                    <img class="ml-5" src="<?php echo e(asset('img/escudo_100x100.png')); ?>" alt="INELMU" />
                </div>
            </div>
            <div class="col-sm-6 text-right mt-3 mb-3">
                <p class="ib text-center" style="line-height: 1.2">
                    <span class="text-uppercase">Institución  Educativa Las Mujeres</span><br>
                    Las Mujeres – Moñitos<br>
                    DANE Nº 223500000863 - NIT 900127736 - 3<br>
                    Correo electrónico: ee_22350000086301@hotmail.com<br>
                    <span class="font-weight-light" style="font-size: 10px; line-height: 1">RESOLUCIÓN DE APROBACIÓN  DE LA INSTITUCIÓN EDUCATIVA 349 DE 28 DE JULIO DE 2011 Y 661 DE DICIEMBRE DE 2011</span></br>
                </p>
                <br>
                <h4 class="ib text-center text-uppercase">Reporte de logros</h4>
            </div>
        </div>
    </header>
    <div class="page">
        <table class="table">
            <tbody>
            <tr>
                <td>Docente: <strong><?php echo e($docente->name); ?></strong> </td>
                <td>Periodo: <strong><?php echo e($periodo->name); ?></strong> </td>
                <td>Docente: <strong><?php echo e($asignatura->name); ?></strong> </td>
                <td>Grado: <strong><?php echo e($grado); ?>°</strong> </td>
                <td>Total logros: <strong><?php echo e($logros->count()); ?></strong> </td>
            </tr>
            </tbody>
        </table>
        <table class="table table-responsive-md invoice-items mb-5">
            <thead>
            <tr class="text-dark">
                <th id="cell-id"     class="font-weight-semibold">Codigo</th>
                <th id="cell-item"   class="font-weight-semibold">Indicador</th>
                <th id="cell-desc"   class="font-weight-semibold">Logro</th>
                <th id="cell-price"  class="text-center font-weight-semibold">Categoria</th>
                <th id="cell-price"  class="text-center font-weight-semibold">Grado</th>
                <th id="cell-qty"    class="text-center font-weight-semibold">Asignatura</th>
                <th id="cell-total"  class="text-center font-weight-semibold">Periodo</th>
            </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $logros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $logro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($logro->code); ?></td>
                    <td class="font-weight-semibold text-dark"><?php echo e(ucwords($logro->indicador)); ?></td>
                    <td><?php echo e($logro->description); ?></td>
                    <td class="text-center"><?php echo e(ucwords($logro->category)); ?></td>
                    <td class="text-center"><?php echo e($logro->grade); ?></td>
                    <td class="text-center"><?php echo e($logro->asignatura->name); ?></td>
                    <td class="text-center"><?php echo e($logro->periodo->name); ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
