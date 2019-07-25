var table = $('#estudiantes');
$(document).ready(function() {
    table.DataTable({
        search: {
            smart: true
        },
        lengthMenu: [[10, 25, 50,100, -1], [10, 25, 50,100, "All"]],
        responsive: true,
        processing: true,
        serverSide: true,
        select: true,
        sDom: '<"text-right mb-md"T><"row"<"col-lg-6"l><"col-lg-6"f>><"table-responsive"t>p',
        ajax: $('#inf').data('urltabla'),
        dom: 'Bfrtip',
        columns: [
            {   // Responsive control column
                data: null,
                defaultContent: '',
                className: 'control',
                orderable: false,
                searchable: false
            },
            { data: "id",editField: "id" ,className: 'never', orderable: false , visible: false, searchable: false },
            { data: "identification", orderable: true, searchable: true },
            { data: "name", orderable: true , searchable: true},
            { data: "lastname", orderable: true, searchable: true },
            { data: "stade", orderable: true, searchable: true },
            { data: "grupo", orderable: false },
            { data: "btn" }
        ],
        buttons: [
            {
                extend: 'collection',
                text: 'Export',
                buttons: [
                    'copy',
                    'excel',
                    'csv',
                    'pdf',
                    'print'
                ],
                className:'dropdown-toggle btn-primary'
            }
        ],
        language: {
            lengthMenu: "_MENU_ Alumnos por página",
            search: "_INPUT_",
            searchPlaceholder: "Buscar...",
            zeroRecords: "Nada encontrado, lo sentimos",
            info: "Mostrando página _PAGE_ de _PAGES_",
            infoEmpty: "No hay registros disponibles",
            infoFiltered: "(filtrado de _MAX_ registros totales)"
        }
    });

    $.fn.dataTable.ext.errMode = 'throw';
} );