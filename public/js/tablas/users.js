var editor;
$(document).ready(function() {
    const inf = $('#inf');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    editor = new $.fn.dataTable.Editor( {
        ajax: {
            create: {
                type: 'POST',
                url:  inf.data('urlcreate')
            },
            edit: {
                type: 'PUT',
                url:  inf.data('urledit')
            },
            remove: {
                type: 'DELETE',
                url:  inf.data('urlremove')
            }
        },
        table: "#users",
        idSrc: "id",
        fields: [
            {
                type: "hidden",
                name: "id"
            },
            {
                label: "Nombres:",
                name: "name"
            },
            {
                label: "Apellidos:",
                name: "lastname"
            },
            {
                label: "Usuario:",
                name: "username"
            },
            {
                label: "Contraseña:",
                name: "password",
                type: "password"
            },
            {
                label: "Email:",
                name: "email"
            },
            {
                label: "Perfil",
                type:  "select",
                options: [
                    { label: "Docente", value: "docente" },
                    { label: "Coordinador",           value: "coordinador" },
                    { label: "Secretaria",           value: "secretaria" },
                    { label: "Administrador",           value: "admin" },
                ],
                name: "type"
            },
            {
                name: "path",
                type:    "hidden",
                default: null
            }
        ],i18n: {
            edit: {
                button: "Editar",
                title:  "Editar usuario",
                submit: "Guardar"
            },
            create: {
                button: "Crear",
                title:  "Crear nuevo usuario",
                submit: "Guardar"
            },
            remove: {
                button: "Eliminar",
                title:  "Eliminar usuario",
                submit: "Eliminar"
            },
            error: {
                system: "Se ha presentado un error en el sistema intentalo nuevamente"
            }
        }
    } );
    $('#users').on( 'click', 'tbody td:not(.child), tbody span.dtr-data', function (e) {
        // Ignore the Responsive control and checkbox columns
        if ( $(this).hasClass( 'control' ) || $(this).hasClass('select-checkbox') ) {
            return;
        }
        editor.inline( this, {
            submit: 'allIfChanged'
        } );
    } );
    var table = $('#users').DataTable({
        pageLength: 10,
        paging: true,
        responsive: true,
        processing: true,
        serverSide: true,
        ajax: $('#inf').data('urltabla'),
        dom: "Bfrtip",
        columns: [
            {   // Responsive control column
                data: null,
                defaultContent: '',
                className: 'control',
                orderable: false
            },
            {   // Checkbox select column
                data: null,
                defaultContent: '',
                className: 'select-checkbox',
                orderable: false
            },
            { data: "id",editField: "id" ,className: 'never', orderable: false  },
            { data: "name" },
            { data: "lastname" },
            { data: "username" },
            { data: "email" },
            { data: "type" }
        ],
        select: {
            style:    'os',
            selector: 'td.select-checkbox'
        },
        buttons: [
            { extend: "create", editor: editor ,className: 'btn-primary'},
            { extend: "edit",   editor: editor ,className: 'btn-info' },
            { extend: "remove", editor: editor, className:'btn-info' },
            {
                extend: 'collection',
                text: 'Exportar',
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
    });
    table.buttons().container().appendTo( $('.col-md-6:eq(0)', table.table().container() ) );
    $.fn.dataTable.ext.errMode = 'throw';
} );