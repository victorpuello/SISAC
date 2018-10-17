<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Sabana de notas</title>
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
    <div class="invoice page">
        @include('admin.reportes.partials.header', ['nameReporte' => 'Sabana de notas'])
        <section>
            <table class="table" style="border: none; border-color: #ffffff;">
                <tbody>
                <tr>
                    <td>Grupo:  <strong>{{$reporte->getGrupo()->name_aula}}</strong></td>
                    <td>Periodo:  <strong>{{$periodo->name}}</strong></td>
                    <td>Año lectivo: <strong>{{date_format(new \Carbon\Carbon($periodo->datestart),"Y")}}</strong></td>
                    <td>Director de grupo:  <strong>{{$reporte->getGrupo()->director}}</strong></td>
                    <td>Fecha:  <strong>{{\Carbon\Carbon::now()->toDateString()}}</strong></td>
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
                        @foreach($reporte->getAsignaturas() as $asignatura)
                            <td class="p-0 text-center"><strong>{{$asignatura->short_name}}</strong></td>
                        @endforeach
                    </tr>
                    @foreach($reporte->getEstudiantes() as $estudiante)
                        <tr class="m-0 p-0">
                            <td class="text-center m-0 p-0">{{$estudiante->numero}}</td>
                            <td class="m-0 pl-1 pt-0 pb-0 pr-0">{{$estudiante->apellido_name}}</td>
                            @foreach($reporte->getAsignaturas() as $asignatura)
                                <td class="text-center m-0 p-0">{{ $reporte->getDefScore($asignatura,$estudiante,$periodo)}}</td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
    </div>
</body>
</html>
