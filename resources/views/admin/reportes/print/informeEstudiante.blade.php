<html>
<head>
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
@foreach($estudiantes as $estudiante)
<div class="invoice page">
    <header class="clearfix">
        <div class="row justify-content-md-center">
            <div class="col-sm-1 mt-0 position-absolute">
                <div class="ib ml-5">
                    <img class="ml-5" src="{{asset('img/escudo_100x100.png')}}" alt="INELMU" />
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
                <td class="p-1">Estudiante: <strong> {{$estudiante->full_name}} </strong> </td>
                <td class="p-1">Identificación: <strong>{{$estudiante->identification}}</strong></td>
                <td class="p-1" colspan="2">Puesto: <strong>{{$estudiante->puesto}}</strong></td>
            </tr>
            <tr class="p-0">
                <td class="p-1">Grupo: <strong>{{$estudiante->salon->full_name}}</strong> </td>
                <td class="p-1">Periodo: <strong>{{$periodo->name}}</strong></td>
                <td class="p-1">Año: <strong>{{date_format(new \Carbon\Carbon($periodo->datestart),"Y")}}</strong></td>
                <td class="p-1">Fecha: <strong>{{ \Carbon\Carbon::now()->toDateString() }}</strong></td>
            </tr>
            <tr class="p-0">
                <td class="p-1" colspan="4">Director de grupo: <strong>{{$estudiante->salon->director}}</strong> </td>
            </tr>
            </tbody>
        </table>
    </div>
    @foreach($estudiante->salon->asignaturas as $asignatura)
        <section class="card card-featured card-featured-primary mb-4">
            <div class="card-body">
                <table class="table table-responsive-md invoice-items">
                    <thead>
                    <tr class="table-bordered p-0">
                        <th class="p-2 text-left text-uppercase " rowspan="2" colspan="6">{{$asignatura->name}} </th>
                        <th style="border-left: none" rowspan="2"></th>
                        <th class="p-1">{{$estudiante->getDef($asignatura->id,1)}}</th>
                        <th class="p-1">{{$estudiante->getDef($asignatura->id,2)}}</th>
                        <th class="p-1">{{$estudiante->getDef($asignatura->id,3)}}</th>
                        <th class="p-1">{{$estudiante->getDef($asignatura->id,4)}}</th>
                    </tr>
                    <tr class="text-dark">
                        <th class="p-1" >{{indicador($estudiante->getDef($asignatura->id,1))}} </th>
                        <th class="p-1" >{{indicador($estudiante->getDef($asignatura->id,2))}} </th>
                        <th class="p-1" >{{indicador($estudiante->getDef($asignatura->id,3))}} </th>
                        <th class="p-1" >{{indicador($estudiante->getDef($asignatura->id,4))}} </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($estudiante->NotasInforme($asignatura->id,$periodo->id) as $nota)
                        <tr class="table-bordered p-0">
                            <td>{{ucwords($nota->logro->category)}}</td>
                            <td>{{$nota->score}}</td>
                            <td class="font-weight-semibold text-left text-dark" colspan="9">{{$nota->logro->description}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </section>
    @endforeach
    <div class="invoice-summary mt-5">
        <div class="row justify-content-end">
            <div class="col-sm-4 mt-5">
                <table class="table h6 text-dark">
                    <tbody>
                    <tr class=" b-top-0">
                        &nbsp;&nbsp;
                    </tr>
                    <tr>
                        <td colspan="2">Observaciones</td>
                    </tr>
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>
    @endforeach
</body>
</html>
