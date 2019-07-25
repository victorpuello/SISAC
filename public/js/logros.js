(function($) {

    'use strict';

    $(document).ready(function () {
        var ruta = $("#URL-LOAD").data('urlload');
        var userType = $("#URL-LOAD").data('user');
        $.get(ruta,function (data) {
            loadDataSelect('periodo', data.periodos,'Periodos');
            loadDataSelect('grado', data.grados,'Grado');
            loadDataSelect('asignatura', data.asignaturas,'Asignatura');
           /* loadDataSelect('periodo_id',data.periodos,'Periodo');
            loadDataSelect('asignatura_id',data.asignaturas,'Asignatura');
            loadDataSelect('grade',data.grados,'Grado');
            if (userType === 'admin'){loadDataSelect('docente_id',data.docentes,'Docente');}*/
        })
    });

    function loadDataSelect(_id,data,place) {
        var select =  $('select[name='+_id+']');
        select.empty();
        //select.attr("placeholder", place);
        select.append('<option value="">'+place+'</option>');
        $.each(data, function (key, value) {
            select.append('<option value=' + key + '>' + value + '</option>');
        });
    }


}).apply(this, [jQuery]);
