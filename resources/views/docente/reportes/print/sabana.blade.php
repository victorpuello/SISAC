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
                    <p class="text-center"><span class="ib text-center text-uppercase">Ficha de seguimiento, evaluación y promoción de estudiantes</span></p>
                </div>
            </div>
        </header>
        <section>
            <table class="table" style="border: none; border-color: #ffffff;">
                <tbody>
                <tr>
                    <td>Grupo:  <strong>{{$salon->full_name}}</strong></td>
                    <td>Periodo:  <strong>{{$periodo->name}}</strong></td>
                    <td>Año lectivo: <strong>{{date_format(new \Carbon\Carbon($periodo->datestart),"Y")}}</strong></td>
                    <td>Director de grupo:  <strong>{{$salon->director}}</strong></td>
                    <td>Fecha:  <strong>{{\Carbon\Carbon::now()->toDateString()}}</strong></td>
                </tr>
                </tbody>
            </table>
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <td rowspan="2">N°</td>
                        <td rowspan="2">APELLIDOS NOMBRE(S)</td>
                        <td class="text-center" colspan="11">AREAS Y ASIGNATURAS</td>
                    </tr>
                    <tr>
                        @foreach($salon->asignaturas as $asignatura)
                            <td>{{substr($asignatura->name,0,4)}}</td>
                        @endforeach
                    </tr>
                    @foreach($salon->estudiantes as $estudiante)
                        <tr class="m-0">
                            <td class="m-0">{{$estudiante->numero}}</td>
                            <td class="m-0">{{$estudiante->apellido_name}}</td>
                            @foreach($salon->asignaturas as $asignatura)
                                <td class="m-0">{{$estudiante->getDefInforme($asignatura->id,$periodo->id)}}</td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
    </div>
</body>
</html>
