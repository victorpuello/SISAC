<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Sabana de notas</title>
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
    <div class="invoice page">
        <?php echo $__env->make('admin.reportes.partials.header', ['nameReporte' => 'Sabana de notas'], \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <section>
            <table class="table" style="border: none; border-color: #ffffff;">
                <tbody>
                <tr>
                    <td>Grupo:  <strong><?php echo e($reporte->getGrupo()->name_aula); ?></strong></td>
                    <td>Periodo:  <strong><?php echo e($periodo->name); ?></strong></td>
                    <td>Año lectivo: <strong><?php echo e(date_format(new \Carbon\Carbon($periodo->datestart),"Y")); ?></strong></td>
                    <td>Director de grupo:  <strong><?php echo e($reporte->getGrupo()->director); ?></strong></td>
                    <td>Fecha:  <strong><?php echo e(\Carbon\Carbon::now()->toDateString()); ?></strong></td>
                </tr>
                </tbody>
            </table>
            <table class="table table-bordered">
                <tbody>
                    <tr class="text-center " >
                        <td class="p-0" rowspan="2" style="vertical-align: middle"><strong>N°</strong></td>
                        <td class="p-0" rowspan="2" style="vertical-align: middle"><strong>APELLIDOS NOMBRE(S)</strong></td>
                        <td class="text-center p-0" colspan="12"><strong>AREAS Y ASIGNATURAS</strong></td>
                    </tr>
                    <tr>
                        <?php $__currentLoopData = $reporte->getAsignaturas(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $asignatura): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <td class="p-0 text-center"><strong><?php echo e($asignatura->short_name); ?></strong></td>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tr>
                    <?php $__currentLoopData = $reporte->getEstudiantes(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $estudiante): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="m-0 p-0">
                            <td class="text-center m-0 p-0"><?php echo e($estudiante->numero); ?></td>
                            <td class="m-0 pl-1 pt-0 pb-0 pr-0"><?php echo e($estudiante->apellido_name); ?></td>
                            <?php $__currentLoopData = $reporte->getAsignaturas(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $asignatura): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <td class="text-center m-0 p-0"><?php echo e($reporte->getDefScore($asignatura,$estudiante,$periodo)); ?></td>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </section>
    </div>
</body>
</html>
