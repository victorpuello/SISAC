<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
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
<body style="font-size: 14.6px">
<?php $__currentLoopData = $reporte->getEstudiantesWithPuestos($periodo); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $estudiante): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="invoice page">
    <?php echo $__env->make('admin.reportes.partials.header', ['nameReporte' => 'Informe Academico'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="bill-info">
        <table class="table table-bordered" >
            <tbody>
            <tr class="p-0">
                <td class="p-1">Estudiante: <strong> <?php echo e($estudiante->full_name); ?> </strong> </td>
                <td class="p-1">Identificación: <strong><?php echo e($estudiante->identification); ?></strong></td>
                <td class="p-1" colspan="2">Puesto: <strong><?php echo e($estudiante->puesto); ?></strong></td>
            </tr>
            <tr class="p-0">
                <td class="p-1">Grupo: <strong><?php echo e($estudiante->grupo->name_aula); ?></strong> </td>
                <td class="p-1">Periodo: <strong><?php echo e($periodo->name); ?></strong></td>
                <td class="p-1">Año: <strong><?php echo e(date_format(new \Carbon\Carbon($periodo->datestart),"Y")); ?></strong></td>
                <td class="p-1">Fecha: <strong><?php echo e(\Carbon\Carbon::now()->toDateString()); ?></strong></td>
            </tr>
            <tr class="p-0">
                <td class="p-1" colspan="4">Director de grupo: <strong><?php echo e($grupo->director); ?></strong> </td>
            </tr>
            </tbody>
        </table>
        <table class="table table-bordered">
            <tbody>
                <tr class="p-0">
                    <td class="p-1" style=" width: 30%; vertical-align: middle" rowspan="2"><strong>AREAS - ASIGNATURAS / VALORACIONES</strong></td>
                    <td class="p-1 text-center text-uppercase" style="vertical-align: middle; width: 10%;" rowspan="2">Faltas</td>
                    <td class="p-1 text-center text-uppercase" colspan="5">Desarrollo anual / periodos</td>
                </tr>
                <tr class="p-0">
                    <td class="p-1 text-center " style="width: 12%;">1°</td>
                    <td class="p-1 text-center " style="width: 12%;">2°</td>
                    <td class="p-1 text-center " style="width: 12%;">3°</td>
                    <td class="p-1 text-center " style="width: 12%;">4°</td>
                    <td class="p-1 text-center " style="width: 12%;">Final</td>
                </tr>
            </tbody>
        </table>
    </div>
    <?php $__currentLoopData = $reporte->getAsignaturas(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $asignatura): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <table class="table table-bordered mb-0">
                    <tbody>
                    <tr class="table-bordered p-0">
                        <td class="p-2 text-left text-uppercase" style="width: 30%; vertical-align: middle;" rowspan="2" ><strong> <?php echo e($asignatura->name); ?></strong> </td>
                        <td class="p0 pl-1 text-center" style="border-left: none; width: 10%;" rowspan="2" > <?php echo e($reporte->getInasistencias($asignatura,$estudiante,$periodo)); ?> </td>
                        <?php $__currentLoopData = $periodo->anio->periodos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $_periodo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <td class="p-0 pl-1 text-center " style="width: <?php echo e(porcentajeStyle(count($periodo->anio->periodos))); ?>%;"><strong><?php echo e($reporte->getDefScore($asignatura,$estudiante,$_periodo)); ?></strong></td>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tr>
                    <tr class="text-dark">
                        <?php $__currentLoopData = $periodo->anio->periodos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $_periodo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <td class="p-0 pl-1 text-center" style="width: <?php echo e(porcentajeStyle(count($periodo->anio->periodos))); ?>%;"><strong><?php echo e($reporte->getDefIndicador($asignatura,$estudiante,$_periodo)); ?></strong> </td>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tr>
                    <?php $__currentLoopData = $reporte->notasInforme($asignatura,$estudiante,$periodo); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nota): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="table-bordered p-0">
                            <td class="p-0 pl-1" style="vertical-align: middle; width: 30%;"><?php echo e(ucwords($nota->indicador->category)); ?>  <small>(<?php echo e($nota->porcentaje); ?>)</small></td>
                            <td class="p-0 pl-1 text-center " style="vertical-align: middle; width: 10%;"><?php echo e($nota->score); ?></td>
                            <td class="font-weight-semibold text-left text-dark p-0 pl-1" style="vertical-align: middle; width: 60%;" colspan="9"><?php echo e($nota->indicador->description); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <table class="table table-bordered" style="margin-top: 10px; margin-bottom: 0px;">
        <tbody>
        <tr class="p-0">
            <td class="p-1" style=" width: 30%; vertical-align: middle" rowspan="2"><strong>AREAS  / VALORACIONES</strong></td>
            <td class="p-1 text-center text-uppercase" colspan="6">Desarrollo anual / periodos</td>
        </tr>
        <tr class="p-0">
            <td class="p-1 text-center " style="width: 12%;">1°</td>
            <td class="p-1 text-center " style="width: 12%;">2°</td>
            <td class="p-1 text-center " style="width: 12%;">3°</td>
            <td class="p-1 text-center " style="width: 12%;">4°</td>
            <td class="p-1 text-center " style="width: 12%;">Final</td>
        </tr>
        </tbody>
    </table>
    <?php $__currentLoopData = $reporte->getAreas(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $area): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <table class="table table-bordered mb-0">
            <tbody>
            <tr class="table-bordered p-0">
                <td class="p-2 text-left text-uppercase" style="width: 30%; vertical-align: middle;" rowspan="2" ><strong> <?php echo e($area->name); ?> </strong> </td>
            </tr>
            <tr class="text-dark">
                <?php $__currentLoopData = $periodo->anio->periodos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $_periodo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <td class="p-0 pl-1 text-center" style="width: <?php echo e(porcentajeStyle(count($periodo->anio->periodos))); ?>%; vertical-align: middle"><strong>Nota Periodo</strong> </td>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tr>
            </tbody>
        </table>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


    <div class="invoice-summary mt-5">
        <div class="row justify-content-end">
            <div class="col-sm-4 mt-5">
                <table class="table h6 text-dark">
                    <tbody class="mt-0 mb-0">
                    <tr>
                        <td colspan="3">Observaciones</td>
                        <td></td>
                        <td class="mt-4 pt-5 text-center"> <hr class="mt-5">Director de Grupo</td>
                    </tr>
                    </tbody>
                </table>
                <div>
                    <p class="text-center" style="font-size: 10px">Equivalencias escala institucional con la escala nacional: Bajo: 1.00 - 2.99, Básico: 3.00 - 3.99, Alto: 4.00 - 4.59, Superior: 4.60 - 5.00 </p>
                </div>
            </div>
        </div>
    </div>
</div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</body>
</html>
<?php /**PATH /var/www/SISAC/resources/views/admin/reportes/print/informeEstudiante.blade.php ENDPATH**/ ?>