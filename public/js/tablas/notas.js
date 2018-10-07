(function($) {
    'use strict';
    var table = $('#notas');
    const inf = $('#inf');
    var editor;
    //$.noConflict();
    $(document).ready(function() {
        console.log($('#inf').data('urltabla'));
        console.log($('#inf').data('urlproces'));
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
                    { data: "name",className: 'no-editable' }
                ],
                order: [ 2, 'asc' ],
                select: {
                    style:    'os',
                    selector: 'td.select-checkbox'
                },

        });
    });

    console.log(table);
}).apply(this, [jQuery]);
