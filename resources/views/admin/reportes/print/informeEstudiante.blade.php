<html>
<head>
    <title>{{$institucion->name}} - Informe Academico</title>
    <!-- Web Fonts  -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet" type="text/css">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="{{asset('vendor/bootstrap/css/bootstrap.css')}}" />

    <!-- Invoice Print Style -->
    <link rel="stylesheet" href="{{asset('css/invoice-print.css')}}" />
    <style type="text/css" media="print">
        .page
        {
            page-break-after: always;
            page-break-inside: avoid;
        }
    </style>
</head>
<body>
@foreach($estudiantes as $estudiante)
<div class="invoice page">
    <header class="clearfix">
        <div class="row">
            <div class="col-sm-6 mt-3">
                <h2 class="h2 mt-0 mb-1 text-dark font-weight-bold">Informe Academico</h2>
                <h4 class="h4 m-0 text-dark font-weight-bold">{{$periodo->name}}</h4>
            </div>
            <div class="col-sm-6 text-right mt-3 mb-3">
                <address class="ib mr-5">
                    {{$institucion->name}}
                    <br/>
                    {{$institucion->address}}
                    <br/>
                    Tel. {{$institucion->phone}}
                    <br/>
                    Resolución De Aprobación. {{$institucion->resolucion}}
                </address>
                <div class="ib mr-5">
                    <img src="{{asset('img/escudo.png')}}" alt="INELMU" />
                </div>
            </div>
        </div>
    </header>
    <div class="bill-info">
        <div class="row">
            <div class="col-md-6">
                <div class="bill-to">
                    <p class="h5 mb-1 text-dark font-weight-semibold">Nombre: {{$estudiante->full_name}}</p>
                    <address>
                        ID: {{$estudiante->identification}}
                        <br/>
                        Grupo: {{$estudiante->salon->full_name}}
                        <br/>
                        Puesto: {{$estudiante->puesto}}
                        <br/>
                        Director: {{$estudiante->salon->director}}
                    </address>
                </div>
            </div>
            <div class="col-md-6">
                <div class="bill-data text-right">
                    <p class="m-2">
                        <span class="text-dark">Inicio de periodo: </span>
                        <span class="value">{{$periodo->datestart}}</span>
                    </p>
                    <p class="m-2">
                        <span class="text-dark">Fin de Periodo:</span>
                        <span class="value">{{$periodo->dateend}}</span>
                    </p>
                </div>
            </div>
        </div>
    </div>
    @foreach($estudiante->salon->asignaturas as $asignatura)
    <table class="table table-responsive-md invoice-items">
        <thead>
        <tr style="width: 100%; background-color: #A9E2F3;">
            <th>Asignatura: {{$asignatura->name}} </th>
            <th>Nota: {{$estudiante->getDef($asignatura->id,$periodo->id)}}</th>
            <th>Indicador: {{indicador($estudiante->getDef($asignatura->id,$periodo->id))}} </th>
        </tr>
        <tr class="text-dark">
            <th id="cell-id"     class="font-weight-semibold">Categoria</th>
            <th id="cell-item"   class="font-weight-semibold">Logro</th>
            <th id="cell-qty"    class="text-center font-weight-semibold">Nota</th>
        </tr>
        </thead>
        <tbody>
        @foreach($estudiante->NotasInforme($asignatura->id,$periodo->id) as $nota)
            <tr>
                <td>{{ucwords($nota->logro->category)}}</td>
                <td class="font-weight-semibold text-left text-dark">{{$nota->logro->description}}</td>
                <td>{{$nota->score}}</td>
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
                    <tr class=" b-top-0">
                            <td colspan="2">Director de grupo</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<br><br><br><br><br>
    @endforeach
</body>
</html>
