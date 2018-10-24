(function($) {
    'use strict';
    var table = $('#notas');
    const inf = $('#inf');
    var editor;
    //$.noConflict();
    $(document).ready(function() {
        var buttonCommon = {

            format: {
                body: function ( data, columnIdx, rowIdx ) {
                    var returnData = '';
                    switch (columnIdx) {
                        case 0: {
                            returnData = null;
                            break;
                        }
                    }
                    return returnData;
                }
            }

        };
        console.log($('#inf').data('urltabla'));
        console.log($('#inf').data('urlproces'));
        function trunc (x, posiciones = 0) {
            var s = x.toString();
            var l = s.length;
            var decimalLength = s.indexOf('.') + 1;
            var numStr = s.substr(0, decimalLength + posiciones);
            return Number(numStr);
        }
        function roundNumber(num, scale) {
            if(!("" + num).includes("e")) {
                return +(Math.round(num + "e+" + scale)  + "e-" + scale);
            } else {
                var arr = ("" + num).split("e");
                var sig = ""
                if(+arr[1] + scale > 0) {
                    sig = "+";
                }
                return +(Math.round(+arr[0] + "e" + sig + (+arr[1] + scale)) + "e-" + scale);
            }
        }
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        editor = new $.fn.dataTable.Editor( {
            ajax: $('#inf').data('urlproces'),
            type: 'POST',
            table: "#notas",
            idSrc: "id",
            fields: [
                {
                    type: "hidden",
                    name: "id"
                },
                {
                    label: "Nota cognitiva:",
                    name: "notas.data.0.cognitivo.score"
                },
                {
                    label: "Nota procedimental:",
                    name: "notas.data.1.procedimental.score"
                },
                {
                    label: "Nota actitudinal:",
                    name: "notas.data.2.actitudinal.score"
                },
                {
                    name: "notas.data.0.cognitivo.id",
                    type: "hidden"
                },
                {
                    name: "notas.data.1.procedimental.id",
                    type: "hidden",

                },
                {
                    name: "notas.data.2.actitudinal.id",
                    type: "hidden"
                },
                {
                    name: "inasistencias.data.id",
                    type: "hidden",

                },
                {
                    name: "inasistencias.data.numero",
                    label: "Inasistencias:"
                },
                {
                    name: 'planilla_id',
                    type: "hidden",

                }
            ],i18n: {
                edit: {
                    button: "Editar",
                    title:  "Editar notas",
                    submit: "Guardar"
                },
                error: {
                    system: "Se ha presentado un error en el sistema intentalo nuevamente"
                }
            }
        });
        // Activate an inline edit on click of a table cell
        // or a DataTables Responsive data cell
        $('#notas').on( 'click', 'tbody td:not(.child), tbody span.dtr-data', function (e) {
            // Ignore the Responsive control and checkbox columns
            if ( $(this).hasClass( 'control' ) || $(this).hasClass('select-checkbox') || $(this).hasClass('no-editable') ) {
                return;
            }
            editor.inline( this,{
                submit: 'allIfChanged'
            } );
        } );

        editor.on('preSubmit',function (e,o,action) {
            if (action !== 'remove'){
                var notaAct = this.field('notas.data.2.actitudinal.score');
                var notaCog = this.field('notas.data.0.cognitivo.score');
                var notaPro = this.field('notas.data.1.procedimental.score');
                console.log(notaAct.val(),notaCog.val(),notaPro.val());
                if (! notaAct.isMultiValue()){
                    if (! notaAct.val()){
                        notaAct.error( 'Debes ingresar una valoración');
                    }
                    if (notaAct.val() > 5 || notaAct.val() < 1){
                        notaAct.error( 'Solo se aceptan valores entre 1 y 5')
                    }
                }
                if (! notaCog.isMultiValue()){
                    if (! notaCog.val()){
                        notaCog.error( 'Debes ingresar una valoración');
                    }
                    if (notaCog.val() > 5 || notaCog.val() < 1){
                        notaCog.error( 'Solo se aceptan valores entre 1 y 5')
                    }

                }
                if (! notaPro.isMultiValue()){
                    if (! notaPro.val()){
                        notaPro.error( 'Debes ingresar una valoración');
                    }
                    if (notaPro.val() > 5 || notaPro.val() < 1){
                        notaPro.error( 'Solo se aceptan valores entre 1 y 5')
                    }

                }
                if (this.inError()){
                    return false;
                }
            }
        });


        table.DataTable( {
             responsive: true,
             paging: true,
             lengthChange: false,
             pageLength :10,
             processing: true,
             serverSide: true,
             search: {
                 smart: true,
             },
                ajax: inf.data('urltabla'),
                dom: "Bfrtip",
                columns: [
                    {
                        data: null,
                        defaultContent: '',
                        className: 'control',
                        orderable: false
                    },
                    {
                        data: null,
                        defaultContent: '',
                        className: 'select-checkbox',
                        orderable: false
                    },
                    { data: "id",editField: "id" ,className: 'never', orderable: false  },
                    { data: "planilla_id" ,className: 'never', orderable: false  },
                    { data: "name",className: 'no-editable' },
                    { data: "notas.data.0.cognitivo.id",className: 'never', orderable: false },
                    { data: "notas.data.0.cognitivo.score",className: 'editable', orderable: false },
                    { data: "notas.data.1.procedimental.id",className: 'never', orderable: false},
                    { data: "notas.data.1.procedimental.score",className: 'editable', orderable: false},
                    { data: "notas.data.2.actitudinal.id",className: 'never', orderable: false },
                    { data: "notas.data.2.actitudinal.score",className: 'editable', orderable: false },
                    { data: "inasistencias.data.id",className: 'never', orderable: false},
                    { data: "inasistencias.data.numero",className: 'editable', orderable: false},
                    { data: null,
                        render: function ( data, type, row ) {
                            var prom = parseFloat(row.notas.data[0].cognitivo.score) * 0.60 + parseFloat(row.notas.data[1].procedimental.score) * 0.30 + parseFloat(row.notas.data[2].actitudinal.score) * 0.10;
                            return roundNumber(prom,2);
                        },
                        orderable: false
                    },
                    { data: null,
                        render: function ( data, type, row ) {
                            var def = parseFloat(row.notas.data[0].cognitivo.score) * 0.60 + parseFloat(row.notas.data[1].procedimental.score) * 0.30 + parseFloat(row.notas.data[2].actitudinal.score) * 0.10;
                            if (roundNumber(def,2) < 3 ){
                                return "Bajo";
                            }
                            if (roundNumber(def,2) >= 3 && roundNumber(def,2) < 4){
                                return "Basico";
                            }
                            if (roundNumber(def,2) >= 4 && roundNumber(def,2) < 4.6){
                                return "Alto";
                            }
                            if (roundNumber(def,2) >= 4.6 && roundNumber(def,2) <= 5){
                                return "Superior";
                            }

                        },
                        orderable: false
                    },
                ],
                order: [ 2, 'asc' ],
                select: {
                    style:    'os',
                    selector: 'td.select-checkbox'
                },
            buttons: [
                { extend: "edit",   editor: editor, className: 'btn-info' },
                {
                    extend: 'collection',
                    text: 'Exportar',
                    buttons: [
                        'excel',
                        'csv',
                        'pdf',
                        'print'
                    ],
                    className:'dropdown-toggle btn-primary',
                    exportOptions: buttonCommon
                }
            ],
            language: {
                processing:     "Procesando...",
                lengthMenu:     "Afficher _MENU_ &eacute;l&eacute;ments",
                info:           "Mostrando _START_ de _END_ en _TOTAL_ Estudiantes",
                infoEmpty:      "Affichage de l'&eacute;lement 0 &agrave; 0 sur 0 &eacute;l&eacute;ments",
                infoFiltered:   "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
                infoPostFix:    "",
                loadingRecords: "Cargando...",
                zeroRecords:    "No hay elementos para mostrar",
                emptyTable:     "No hay datos disponibles",
                paginate: {
                    first:      "Primero",
                    previous:   "Anterior",
                    next:       "Siguiente",
                    last:       "Ultima"
                },
                aria: {
                    sortAscending:  ": Ordenar la columna en orden ascendente",
                    sortDescending: ": Ordenar la columna en orden decendente"
                }
            }

        });
    });
    // table.buttons().container().appendTo( $('.col-md-6:eq(0)', table.table().container() ) );
    $.fn.dataTable.ext.errMode = 'throw';
}).apply(this, [jQuery]);
