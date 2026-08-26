let tblUsuarios;
$(function () {
  tblUsuarios = $("#tblUsuario").DataTable({
        ajax: {
            url: `${base_url}/usuarios/all`,
            dataSrc: "",
        },
        columns:[
            {data: "id_usuario"},
            {data: "nom_user"},
            {data: "email"},
            {data: "rol"},
            {data: "is_activo"},
            {
                defaultContent:
                '<div> <button type="button" class="editarFnt btn btn-primary" title="Editar" ><i class="fas fa-edit"></i></button> <button type="button" class="btn btn-danger" title="Eliminar"><i class="fas fa-trash-alt"></i></button><button type="button" class=" btn btn-success"title="Reingresar"><i class="fas fa-reply-all"></i></button></div>',

            },
        ],
        responsive: true, 
        lengthChange: true, 
        autoWidth: false,
        // Configuración nativa del menú desplegable
        lengthMenu: [[5, 10, 25, 50, 100, -1], [5, 10, 25, 50, 100, "Todos"]],

         // MODIFICADO: 'l' agrega el select clásico, 'B' los botones, 'f' el buscador
        dom: "<'row'<'col-sm-12 col-md-3'l><'col-sm-12 col-md-5'B><'col-sm-12 col-md-4'f>>" +
             "<'row'<'col-sm-12'tr>>" +
             "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",

        // 2. Definición de botones con colores oficiales de AdminLTE / Bootstrap 4
        buttons: [
            {
                
                extend: 'copy',
                text: '<i class="fas fa-copy"></i> Copiar',
                className: ' btn btn-secondary' // Gris oscuro
            },
            {
                extend: 'csv',
                text: '<i class="fas fa-file-csv"></i> CSV',
                className: ' btn btn-warning text-white' // Amarillo
            },
            {
                extend: 'excel',
                text: '<i class="fas fa-file-excel"></i> Excel',
                className: ' btn btn-success' // Verde Excel
            },
            {
                extend: 'pdf',
                text: '<i class="fas fa-file-pdf"></i> PDF',
                className: ' btn btn-danger' // Rojo PDF
            },
            {
                extend: 'print',
                text: '<i class="fas fa-print"></i> Imprimir',
                className: ' btn btn-info' // Azul Info
            }
        ],
        language: { //Idioma español
            decimal: "",
            emptyTable: "No hay información disponible en la tabla",
            info: "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
            infoEmpty: "Mostrando 0 a 0 de 0 Entradas",
            infoFiltered: "(Filtrado de _MAX_ total entradas)",
            thousands: ",",
            lengthMenu: "Mostrar _MENU_ Entradas",
            loadingRecords: "Cargando...",
            processing: "Procesando...",
            search: "Buscar:",
            zeroRecords: "Sin resultados encontrados",
            paginate: {
                first: "Primero",
                last: "Último",
                next: "Siguiente",
                previous: "Anterior"
            },
            // 3. Traducción interna para el botón de cantidad de filas
            "buttons": {
                "pageLength": {
                    "_": '<i class="fas fa-list"></i> Mostrar %d filas',
                    "-1": '<i class="fas fa-list"></i> Mostrar todo'
                }
            }

        },
        // CORRECTO: Ejecutar el appendTo solo cuando la tabla esté 100% lista
        initComplete: function () {
            var api = this.api();
            api.buttons().container().appendTo('#tblUsuario_wrapper .col-md-6:eq(0)');
            // Limpia contenedores previos si AdminLTE duplicó el contenedor por defecto
            $('#tblUsuario_wrapper .col-md-6:eq(0)').empty();
            api.buttons().container().appendTo('#tblUsuario_wrapper .col-md-6:eq(0)');
        }
      
     });


});

//Editar
$("#tblUsuario tbody").on("click","button.editarFnt", async function(){
let data_tabla = tblUsuarios.row($(this).parents("tr")).data();
let id_user = data_tabla.id_usuario;
window.location.href = `${base_url}/usuarios/editar/${id_user}`;
console.log(data_tabla);


});