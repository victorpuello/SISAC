<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>{{$institucion->name}} - Informe Academico</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{asset('vendor/bootstrap/css/bootstrap.css')}}" />
    <link rel="stylesheet" href="{{asset('css/invoice-print.css')}}" />
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
@foreach($reporte->getEstudiantesWithPuestos($periodo) as $estudiante)
<div class="invoice page">
    @include('admin.reportes.partials.header', ['nameReporte' => 'Informe Academico'])
    <div class="bill-info">
        <table class="table table-bordered" >
            <tbody>
            <tr class="p-0">
                <td class="p-1">Estudiante: <strong> {{$estudiante->full_name}} </strong> </td>
                <td class="p-1">Identificación: <strong>{{$estudiante->identification}}</strong></td>
                <td class="p-1" colspan="2">Puesto: <strong>{{$estudiante->puesto}}</strong></td>
            </tr>
            <tr class="p-0">
                <td class="p-1">Grupo: <strong>{{$estudiante->grupo->name_aula}}</strong> </td>
                <td class="p-1">Periodo: <strong>{{$periodo->name}}</strong></td>
                <td class="p-1">Año: <strong>{{date_format(new \Carbon\Carbon($periodo->datestart),"Y")}}</strong></td>
                <td class="p-1">Fecha: <strong>{{ \Carbon\Carbon::now()->toDateString() }}</strong></td>
            </tr>
            <tr class="p-0">
                <td class="p-1" colspan="4">Director de grupo: <strong>{{$grupo->director}}</strong> </td>
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
    @foreach($reporte->getAsignaturas() as $asignatura)
                <table class="table table-bordered mb-0">
                    <tbody>
                    <tr class="table-bordered p-0">
                        <td class="p-2 text-left text-uppercase" style="width: 30%; vertical-align: middle;" rowspan="2" ><strong> {{$asignatura->name}}</strong> </td>
                        <td class="p0 pl-1 text-center" style="border-left: none; width: 10%;" rowspan="2" > {{$reporte->getInasistencias($asignatura,$estudiante,$periodo)}} </td>
                        @foreach($periodo->anio->periodos as $_periodo)
                           <td class="p-0 pl-1 text-center " style="width: {{porcentajeStyle(count($periodo->anio->periodos))}}%;"><strong>{{$reporte->getDefScore($asignatura,$estudiante,$_periodo)}}</strong></td>
                        @endforeach
                    </tr>
                    <tr class="text-dark">
                        @foreach($periodo->anio->periodos as $_periodo)
                                <td class="p-0 pl-1 text-center" style="width: {{porcentajeStyle(count($periodo->anio->periodos))}}%;"><strong>{{$reporte->getDefIndicador($asignatura,$estudiante,$_periodo)}}</strong> </td>
                        @endforeach
                    </tr>
                    @foreach($reporte->notasInforme($asignatura,$estudiante,$periodo) as $nota)
                        <tr class="table-bordered p-0">
                            <td class="p-0 pl-1" style="vertical-align: middle; width: 30%;">{{ucwords($nota->indicador->category)}}  <small>({{$nota->porcentaje}})</small></td>
                            <td class="p-0 pl-1 text-center " style="vertical-align: middle; width: 10%;">{{$nota->score}}</td>
                            <td class="font-weight-semibold text-left text-dark p-0 pl-1" style="vertical-align: middle; width: 60%;" colspan="9">{{$nota->indicador->description}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
    @endforeach
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
            </div>
        </div>
    </div>
</div>
    @endforeach
</body>
</html>
