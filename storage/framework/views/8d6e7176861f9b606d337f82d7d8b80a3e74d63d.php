<html>
<head>
    <title><?php echo e($institucion->name); ?> - Informe Academico</title>
    <!-- Web Fonts  -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet" type="text/css">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('vendor/bootstrap/css/bootstrap.css')); ?>" />

    <!-- Invoice Print Style -->
    <link rel="stylesheet" href="<?php echo e(asset('css/invoice-print.css')); ?>" />
</head>
<body>
<?php $__currentLoopData = $estudiantes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $estudiante): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="invoice">
    <header class="clearfix">
        <div class="row">
            <div class="col-sm-6 mt-3">
                <h2 class="h2 mt-0 mb-1 text-dark font-weight-bold">Informe Academico</h2>
                <h4 class="h4 m-0 text-dark font-weight-bold"><?php echo e($periodo->name); ?></h4>
            </div>
            <div class="col-sm-6 text-right mt-3 mb-3">
                <address class="ib mr-5">
                    <?php echo e($institucion->name); ?>

                    <br/>
                    <?php echo e($institucion->address); ?>

                    <br/>
                    Tel. <?php echo e($institucion->phone); ?>

                    <br/>
                    Resolución De Aprobación. <?php echo e($institucion->resolucion); ?>

                </address>
                <div class="ib mr-5">
                    <img src="<?php echo e(asset('img/escudo.png')); ?>" alt="INELMU" />
                </div>
            </div>
        </div>
    </header>
    <div class="bill-info">
        <div class="row">
            <div class="col-md-6">
                <div class="bill-to">
                    <p class="h5 mb-1 text-dark font-weight-semibold">Nombre: <?php echo e($estudiante->full_name); ?></p>
                    <address>
                        ID: <?php echo e($estudiante->identification); ?>

                        <br/>
                        Grupo: <?php echo e($estudiante->salon->full_name); ?>

                        <br/>
                        Puesto:
                        <br/>
                        Director: <?php echo e($estudiante->salon->director); ?>

                    </address>
                </div>
            </div>
            <div class="col-md-6">
                <div class="bill-data text-right">
                    <p class="m-2">
                        <span class="text-dark">Inicio de periodo: </span>
                        <span class="value"><?php echo e($periodo->datestart); ?></span>
                    </p>
                    <p class="m-2">
                        <span class="text-dark">Fin de Periodo:</span>
                        <span class="value"><?php echo e($periodo->dateend); ?></span>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <?php $__currentLoopData = $estudiante->salon->asignaturas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $asignatura): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <table class="table table-responsive-md invoice-items">
        <thead>
        <tr style="width: 100%">
            <th>Asignatura: <?php echo e($asignatura->name); ?> </th>
            <th>Nota</th>
            <th>Indicador</th>
        </tr>
        <tr class="text-dark">
            <th id="cell-id"     class="font-weight-semibold">Categoria</th>
            <th id="cell-item"   class="font-weight-semibold">Logro</th>
            <th id="cell-qty"    class="text-center font-weight-semibold">Nota</th>
        </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $estudiante->NotasInforme($asignatura->id,$periodo->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nota): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
            <td><?php echo e(ucwords($nota->logro->category)); ?></td>
            <td class="font-weight-semibold text-left text-dark"><?php echo e($nota->logro->description); ?></td>
            <td><?php echo e($nota->score); ?></td>
        </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</body>
</html>
