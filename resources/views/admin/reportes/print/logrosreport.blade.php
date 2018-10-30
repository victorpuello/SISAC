<!doctype html>
<html lang="es">
<head>
    <title> Informe Logros</title>
    <!-- Web Fonts  -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet" type="text/css">
    <!-- Vendor CSS -->
    <link rel="stylesheet" href="{{asset('vendor/bootstrap/css/bootstrap.css')}}" />
    <!-- Invoice Print Style -->
    <style>
        div.page
        {
            overflow: hidden;
            page-break-after: always;
        }
        .page
        {
            page-break-after: always;
            page-break-inside: avoid;
        }
        thead {
            display: table-header-group;
        }
        tfoot {
            display: table-row-group;
        }
        tr {
            page-break-inside: avoid;
        }
        table thead {
            display: table-row-group;
        }
    </style>

</head>
<body>
<div class="invoice">
    @include('admin.reportes.partials.header', ['nameReporte' => 'Reporte de Indicadores'])
    @if (count($indicadores) > 0)
        <div class="bill-info">
            <table class="table d-block border-dark">
                <tbody>
                <tr>
                    <td>Docente: <strong>{{$docente->name}}</strong> </td>
                    <td>Periodo: <strong>{{$indicadores->first()->periodo->name}}</strong> </td>
                    <td>Grado: <strong>{{$indicadores->first()->grado->name}}°</strong> </td>
                    <td colspan="2">Total logros: <strong>{{$indicadores->count()}}</strong> </td>
                </tr>
                </tbody>
            </table>
            <div class="page">
                <table class="table table-responsive-md invoice-items mb-5">
                    <thead>
                    <tr class="text-dark">
                        <th id="cell-item"   class="font-weight-semibold">Indicador</th>
                        <th id="cell-desc"   class="font-weight-semibold">Logro</th>
                        <th id="cell-price"  class="text-center font-weight-semibold">Categoria</th>
                        <th id="cell-price"  class="text-center font-weight-semibold">Grado</th>
                        <th id="cell-qty"    class="text-center font-weight-semibold">Asignatura</th>
                        <th id="cell-total"  class="text-center font-weight-semibold">Periodo</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($indicadores as $indicador)
                        <tr>
                            <td class="font-weight-semibold text-dark">{{ucwords($indicador->indicator)}}</td>
                            <td>{{$indicador->description}}</td>
                            <td class="text-center">{{ucwords($indicador->category)}}</td>
                            <td class="text-center">{{$indicador->grado->name}}</td>
                            <td class="text-center">{{$indicador->asignatura->name}}</td>
                            <td class="text-center">{{$indicador->periodo->name}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @else
        <h4 class="ib text-center text-uppercase">No tiene indicadores registrados...</h4>
    @endif

</div>

</body>
</html>
