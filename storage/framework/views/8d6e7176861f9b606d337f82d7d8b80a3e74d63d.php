<html>
<head>
    <title><?php echo e($institucion->name); ?> - Informe Academico</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="<?php echo e(asset('vendor/bootstrap/css/bootstrap.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('css/invoice-print.css')); ?>" />
    <style>
        .table thead th{
            border-bottom: none;
        }
        .card-body{
            border-radius: 0;
        }
        .card{
            border-radius: 0;
        }

    </style>
</head>
<body>
<?php $__currentLoopData = $estudiantes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $estudiante): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="invoice page">
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
                <h4 class="ib text-center text-uppercase">Informe Academico</h4>
            </div>
        </div>
    </header>
    <div class="bill-info">
        <table class="table table-bordered" >
            <tbody>
            <tr class="p-0">
                <td class="p-1">Estudiante: <strong> <?php echo e($estudiante->full_name); ?> </strong> </td>
                <td class="p-1">Identificación: <strong><?php echo e($estudiante->identification); ?></strong></td>
                <td class="p-1" colspan="2">Puesto: <strong><?php echo e($estudiante->puesto); ?></strong></td>
            </tr>
            <tr class="p-0">
                <td class="p-1">Grupo: <strong><?php echo e($estudiante->salon->full_name); ?></strong> </td>
                <td class="p-1">Periodo: <strong><?php echo e($periodo->name); ?></strong></td>
                <td class="p-1">Año: <strong><?php echo e(date_format(new \Carbon\Carbon($periodo->datestart),"Y")); ?></strong></td>
                <td class="p-1">Fecha: <strong><?php echo e(\Carbon\Carbon::now()->toDateString()); ?></strong></td>
            </tr>
            <tr class="p-0">
                <td class="p-1" colspan="4">Director de grupo: <strong><?php echo e($estudiante->salon->director); ?></strong> </td>
            </tr>
            </tbody>
        </table>
        <table class="table table-bordered">
            <tbody>
                <tr class="p-0">
                    <td class="p-1" style=" width: 30%; vertical-align: middle" rowspan="2"><strong>AREAS - ASIGNATURAS / VALORACIONES</strong></td>
                    <td class="p-1 text-center text-uppercase" style="vertical-align: middle" rowspan="2">Faltas</td>
                    <td class="p-1 text-center text-uppercase" colspan="4">Desarrollo anual / periodos</td>
                </tr>
                <tr class="p-0">
                    <td class="p-1 text-center">1°</td>
                    <td class="p-1 text-center">2°</td>
                    <td class="p-1 text-center">3°</td>
                    <td class="p-1 text-center">4°</td>
                </tr>
            </tbody>
        </table>
    </div>
    <?php $__currentLoopData = $estudiante->salon->asignaturas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $asignatura): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <table class="table table-bordered mb-0">
                    <tbody>
                    <tr class="table-bordered p-0">
                        <td class="p-2 text-left text-uppercase" style="width: 30%; vertical-align: middle;" rowspan="2" ><strong> <?php echo e($asignatura->name); ?></strong> </td>
                        <td style="border-left: none" rowspan="2"> <?php echo e(count($estudiante->currentInasistencias($asignatura->id,$periodo->id))); ?> </td>
                        <?php $__currentLoopData = $periodos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $_periodo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <td class="p-1 text-center"><?php echo e($estudiante->getDefInforme($asignatura->id,$_periodo->id)); ?></td>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tr>
                    <tr class="text-dark">
                        <?php $__currentLoopData = $periodos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $_periodo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <td class="p-1 text-center"><?php echo e(indicador($estudiante->getDefInforme($asignatura->id,$_periodo->id))); ?> </td>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tr>
                    <?php $__currentLoopData = $estudiante->NotasInforme($asignatura->id,$periodo->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nota): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="table-bordered p-0">
                            <td><?php echo e(ucwords($nota->logro->category)); ?></td>
                            <td><?php echo e($nota->score); ?></td>
                            <td class="font-weight-semibold text-left text-dark" colspan="9"><?php echo e($nota->logro->description); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <div class="invoice-summary mt-5">
        <div class="row justify-content-end">
            <div class="col-sm-4 mt-5">
                <table class="table h6 text-dark">
                    <tbody>
                    <tr>
                        <td colspan="3">Observaciones</td>
                        <td></td>
                        <td class="mt-5 pt-5 text-center"> <hr class="mt-5">Director de Grupo</td>
                    </tr>

                    </tbody>
                </table>
                <div>
                    <p class="text-center" style="font-size: 13px">Equivalencias escala institucional con la escala nacional: Bajo: 1.00 - 5.99, Básico: 6.00 - 7.99, Alto: 8.00 - 9.49, Superior: 9.50 - 10.00 </p>
                </div>
                <div class="col-sm-4">

                </div>
            </div>
        </div>
    </div>
</div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</body>
</html>
