$.extend( true, $.fn.dataTable.defaults, {
    "language": {
        "decimal": ",",
        "thousands": ".",
        "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
        "infoPostFix": "",
        "infoFiltered": "(filtrado de un total de _MAX_ registros)",
        "loadingRecords": "Cargando...",
        "lengthMenu": "Mostrar _MENU_ registros",
        "paginate": {
            "first": "Primero",
            "last": "Último",
            "next": "Siguiente",
            "previous": "Anterior"
        },
        "processing": "Procesando...",
        "search": "Buscar:",
        "searchPlaceholder": "Término de búsqueda",
        "zeroRecords": "No se encontraron resultados",
        "emptyTable": "Ningún dato disponible en esta tabla",
        "aria": {
            "sortAscending":  ": Activar para ordenar la columna de manera ascendente",
            "sortDescending": ": Activar para ordenar la columna de manera descendente"
        },
        //only works for built-in buttons, not for custom buttons
        "buttons": {
            "create": "Nuevo",
            "edit": "Cambiar",
            "remove": "Borrar",
            "copy": "Copiar",
            "csv": "Exportar CSV",
            "excel": "Exportar Excel",
            "pdf": "Exportar PDF",
            "print": "Imprimir",
            "colvis": "Visibilidad columnas",
            "collection": "Colección",
            "upload": "Seleccione fichero...."
        },
        "select": {
            "rows": {
                _: '%d filas seleccionadas',
                0: 'clic fila para seleccionar',
                1: 'una fila seleccionada'
            }
        }
    }           
} );       








$(document).ready(function() {
    $('#table2').DataTable( {
        "paging":   true,
        "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "todos"] ],
        'iDisplayLength': 10,
        scrollX: true,
        "columnDefs": [
            { "width": "8%", "targets": 0 }
          ]
    } );
} );



$(document).ready(function() {
    $('#table5').DataTable( {
        "searching":   false,
        scrollX: true,
        "ordering": false,
        dom: 'Bfrtip',
        buttons: [{
            extend: 'excel',
            footer : true,
            title: 'Orbis Logistics: Reporte Colocación'
        },  {
            extend: 'pdf',
            footer : true,
            orientation: 'landscape',
            pageSize: 'A4',
            title: 'Orbis Logistics: Reporte Colocación'
        },{
            extend: 'print',
            footer : true,
            title: 'Orbis Logistics: Reporte Colocación'
           
        }]

    } );
} );



$(document).ready(function() {
    $('#tabletrans').DataTable( {
        "searching":   false,
        scrollX: true,
        dom: 'Bfrtip',
        "ordering": false,
        buttons: [{
            extend: 'excel',
            footer : true,
            title: 'Orbis Logistics: Reporte facturacion transportistas'
        },  {
            extend: 'pdf',
            footer : true,
            orientation: 'landscape',
            pageSize: 'A4',
            title: 'Orbis Logistics: Reporte facturacion transportistas'
        },{
            extend: 'print',
            footer : true,
            title: 'Orbis Logistics: Reporte facturacion transportistas'
           
        }]

    } );
} );

$(document).ready(function() {
    $('#tabletransfer').DataTable( {
        "searching":   false,
        scrollX: true,
        "ordering": false,
        dom: 'Bfrtip',
        buttons: [{
            extend: 'excel',
            footer : true,
            title: 'Orbis Logistics: Reporte facturación transfer'
        },  {
            extend: 'pdf',
            footer : true,
            orientation: 'landscape',
            pageSize: 'A4',
            title: 'Orbis Logistics: Reporte facturación transfer'
        },{
            extend: 'print',
            footer : true,
            title: 'Orbis Logistics: Reporte facturación transfer'
           
        }]

    } );
} );

$(document).ready(function() {
    $('#tableorbis').DataTable( {
        "searching":   false,
        scrollX: true,
        "ordering": false,
        dom: 'Bfrtip',
        buttons: [{
            extend: 'excel',
            footer : true,
            title: 'Orbis Logistics: Reporte facturación Orbis'
        },  {
            extend: 'pdf',
            footer : true,
            orientation: 'landscape',
            pageSize: 'A4',
            title: 'Orbis Logistics: Reporte facturación Orbis'
        },{
            extend: 'print',
            footer : true,
            title: 'Orbis Logistics: Reporte facturación Orbis'
           
        }]

    } );
} );

$(document).ready(function() {
    $('#tablemodal').DataTable( {
        "paging":   true,
        "lengthMenu": [ [5, 10, 25, 50, -1], [5, 10, 25, 50, "todos"] ],
        'iDisplayLength': 5,
       
    } );
} );