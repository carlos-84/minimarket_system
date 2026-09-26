let tblUsuarios;
$(function () {
    tblUsuarios = $("#tblUsuario").DataTable({
        ajax: {
            url: `${base_url}/usuarios/all`,
            dataSrc: "",
        },
        columns: [
            { data: "id_usuario" },
            { data: "nom_user" },
            { data: "email" },
            { data: "rol" },
            { data: "is_activo" },
            {
                defaultContent:
                    '<div> <button type="button" class="editarFnt btn btn-primary" title="Editar" ><i class="fas fa-edit"></i></button> <button type="button" class="btn btn-danger" title="Eliminar"> <i class="fas fa-trash-alt"></i></button><button type="button" class=" btn btn-secondary"title="Ver detalles"><i class="fas fa-clipboard-list"></i></button></div>',

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


//CACTURAR EL ROL SELECCIONADO EN EL SELECT DINAMICO
$(document).ready(function () {
    $('.custom-select').select2();

    // Escuchamos la apertura del modal en AdminLTE 3.2
    $('#mdlUser').on('show.bs.modal', function () {
        const select = $('#selectDinamico');
        const selectStatus = $('#selectStatus');

        if (select.length === 0) {
            console.error("Error: No se encontró ningún elemento con el ID #selectDinamico en el DOM.");
            return; // Detiene la ejecución para evitar el crash de 'isConnected'
        }
     

        // Hacemos la petición a tu archivo PHP puro
        fetch(base_url + "/Usuarios/lisRoles")
            .then(response => response.json())
            .then(data => {
                // 1. Vaciamos las opciones viejas
                select.empty();

                // 2. Añadimos la opción por defecto limpia
                select.append('<option value="">-- Seleccione un Rol --</option>');

                // 3. Recorremos el JSON enviado por PHP y añadimos los <option>
                data.forEach(item => {
                    select.append(`<option value="${item.id}">${item.nombre}</option>`);
                });

                // 4. CONFIGURACIÓN OPTIMIZADA PARA TAMAÑO Y BÚSQUEDA
                select.select2({
                    theme: 'bootstrap4',
                    width: '90%',        // <-- SOLUCIÓN AL TAMAÑO PEQUEÑO: Forzar ancho completo
                    placeholder: '-- Seleccione un Rol --',
                    allowClear: true
                    // Quitamos 'dropdownParent' para solucionar el bloqueo de escritura (Camino B)
                });

                selectStatus.select2({
                    theme: 'bootstrap4',
                    width: '90%',        // <-- SOLUCIÓN AL TAMAÑO PEQUEÑO: Forzar ancho completo
                    placeholder: '-- Seleccione un Estado --',
                    allowClear: true
                    // Quitamos 'dropdownParent' para solucionar el bloqueo de escritura (Camino B)
                });

                select.trigger('change.select2');
                // 4. EL PASO CLAVE: Forzamos a Select2 a actualizarse visualmente
                //select.trigger('change');
            })
            .catch(error => {
                console.error('Error al cargar Select2:', error);
                select.html('<option value="">Error al cargar los datos</option>').trigger('change');
            });

    });

});

//NUEVO USUARIO

$(document).ready(function() {
    
    // Escuchamos el envío del formulario del modal
    $('#frmNewUser').on('submit', function(e) {
        e.preventDefault(); // Evitamos que la página se recargue

        // Creamos el objeto FormData pasando el formulario nativo de HTML
        const datosFormulario = new FormData(this);
       
        // OPCIONAL: También puedes capturar el valor del Select2 manualmente si lo necesitas para validar:
        const valorSelect = $('#selectDinamico').val();
        if (!valorSelect) {
            alert('Por favor, selecciona una opción válida antes de enviar.');
            return;
        }

        // Enviamos los datos a la acción de guardar en tu MVC
        fetch(base_url + "/Usuarios/store", {
            method: 'POST',
            body: datosFormulario // FormData empaqueta automáticamente el valor del Select2
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                new Noty({
                    type: 'success',
                    text: `${data.msg}`,
                    layout: "topCenter",
                    theme: "metroui",
                    timeout: 1500
                }).show();
                $('#frmNewUser')[0].reset(); // Limpiamos el Formulario despues de registro exitoso              
                $('#selectDinamico').val(null).trigger('change'); // Resetea Select2 visualmente
                $('#selectStatus').val(null).trigger('change'); // Resetea Select2 visualmente
                $('#mdlUser').modal('hide'); // Cerramos el modal de forma limpia usando Bootstrap 4
                tblUsers.ajax.reload(); //Recargamos la tabla 
                
            } else {
                new Noty({
                    type: 'error',
                    text: `${data.msg}`,
                    layout: "topCenter",
                    theme: "metroui",
                    timeout: 1500
                }).show();
            }
        })
        .catch(error => {
            console.error('Error al enviar el formulario:', error);
        });
    });

});

//Editar
$("#tblUsuario tbody").on("click", "button.editarFnt", function () {
    let data_tabla = tblUsuarios.row($(this).parents("tr")).data();
    let id_user = data_tabla.id_usuario;

    // 2. Definir la ruta de la carpeta donde está tu modal (puedes pasarle variables por la URL)
    var rutaModal = base_url + "/Views/Modal/modalEditUser.php/" + id_user;

    $('#contenedorModalEditarUser').load(rutaModal, function (response, status, xhr) {
        if (status === "success") {


            // Intentar buscar el modal usando jQuery directamente en el contenedor
            let modaljQuery = $('#contenedorModalEditarUser').find('#mdlEditUser');

            if (modaljQuery.length > 0) {

                // 1. Rellenar los campos
                $("#name").val(data_tabla.nom_user);
                $("#email").val(data_tabla.email);
                $("#idUsuarioModal").val(data_tabla.id_usuario); // Campo oculto para el ID del usuario

                if (data_tabla.is_activo !== undefined && data_tabla.is_activo !== null) {

                    // 1. Convertimos el HTML en texto plano (quedará solo la palabra "Activo" o "Inactivo")
                    let textoLimpio = $('<div>').html(data_tabla.is_activo).text().trim();

                    // 2. Evaluamos la palabra para saber qué valor asignarle a tu HTML
                    let valorSelect = "";
                    if (textoLimpio === "Activo") {
                        valorSelect = "1"; // O el valor que tengas en tu <option> para Activo (ej: "activo" o "1")
                    } else if (textoLimpio === "Inactivo") {
                        valorSelect = "0"; // O el valor que tengas en tu <option> para Inactivo (ej: "inactivo" o "0")
                    }

                    // 3. Asignamos el valor correspondiente al select estático
                    $("#selectStatus").val(valorSelect).trigger('change');

                    //console.log("Texto extraído:", textoLimpio, "-> Valor asignado al select:", valorSelect);
                }

                // 3. CARGAR EL SELECT DINÁMICO PRIMERO
                // Reemplaza 'obtener_roles.php' por la ruta real con la que llenas tu select
                $.ajax({
                    url: base_url + "/Usuarios/lisRoles",
                    type: 'GET',
                    dataType: 'json',
                    success: function (roles) {
                        // Vaciar el select y poner la opción por defecto
                        $("#selectDinamico").empty().append('<option value="">Seleccione un rol...</option>');

                        // Construir las opciones dinámicamente
                        roles.forEach(function (rol) {
                            $("#selectDinamico").append(`<option value="${rol.id}">${rol.nombre}</option>`);
                        });

                        // ESPERA HASTA ESTE PUNTO PARA ASIGNAR EL VALOR
                        // Como los <option> ya existen en el DOM, ahora sí hará match perfectamente
                        let idRolString = data_tabla.id + "";
                        $("#selectDinamico").val(idRolString).trigger('change');
                    },
                    error: function (err) {
                        console.error("Error al cargar los roles dinámicos:", err);
                    }
                });

                // 4. CONFIGURACIÓN OPTIMIZADA PARA TAMAÑO Y BÚSQUEDA
                $("#selectDinamico").select2({
                    theme: 'bootstrap4',
                    width: '90%',        // <-- SOLUCIÓN AL TAMAÑO PEQUEÑO: Forzar ancho completo

                });

                $("#selectStatus").select2({
                    theme: 'bootstrap4',
                    width: '90%',        // <-- SOLUCIÓN AL TAMAÑO PEQUEÑO: Forzar ancho completo

                });



                // 2. Mostrar el modal
                modaljQuery.modal('show');


                // 3. Limpiar contenedor al cerrar
                modaljQuery.on('hidden.bs.modal', function () {
                    $('#contenedorModalEditarUser').empty();
                });

            } else {
                console.error("ERROR CRÍTICO: El ID 'mdlEditUser' NO existe dentro del texto descargado. Revisa la consola arriba.");
            }

        } else {
            console.error("Error al cargar el modal: " + xhr.status + " " + xhr.statusText);
        }
    });

});

//guardar cambios de edicion
// Escuchar el envío del formulario de manera dinámica
$(document).on('click', '#btnGuardarCambios', function(e) {
    e.preventDefault(); // Evita que la página se recargue
   console.log("¡El formulario se interceptó correctamente y va a enviar!");

   let form = $('#frmEditUser')

    // Recolectar todos los datos del formulario de forma automática
    var datosFormulario = form.serialize(); 

    $.ajax({
        url: base_url + "/Usuarios/update", // <-- REEMPLAZA por la ruta real de tu archivo PHP
        type: 'POST',
        data: datosFormulario,
        dataType: 'json', // Esperamos una respuesta estructurada
        success: function(respuesta) {
            
            if (respuesta.status === 'success') {
                
                new Noty({
                    type: 'success',
                    text: `${respuesta.msg}`,
                    layout: "topCenter",
                    theme: "metroui",
                    timeout: 1500
                }).show();
                // 1. Cerrar el modal en Bootstrap 4
                $('#mdlEditUser').modal('hide');

                // 2. Refrescar la DataTable en tiempo real sin perder la paginación actual
                // Reemplaza 'table' por el nombre de tu variable DataTable
                if (typeof table !== 'undefined') {
                    table.ajax.reload(null, false); 
                } else {
                    location.reload(); // Fallback por si la variable no es global
                }

            } else {
                new Noty({
                    type: 'error',
                    text: `${respuesta.msg}`,
                    layout: "topCenter",
                    theme: "metroui",
                    timeout: 1500
                }).show();
            }
        },
        error: function(xhr, status, error) {
            console.error('Error en la petición:', error);
            alert('Ocurrió un error de comunicación con el servidor.');
        }
    });
});


// Eliminar usuario
$("#tblUsuario tbody").on("click", "button.btn-danger", function () {
    // 1. Guardamos la referencia de la fila (TR) antes de entrar a Noty
    // Usamos 'this' aquí porque representa legítimamente al botón presionado
    let elementRow = $(this).closest("tr"); 
    
    // Obtenemos los datos de la fila desde tu DataTable
    let data_tabla = tblUsuarios.row(elementRow).data();
    let id_user = data_tabla.id_usuario;
   
    // Creamos la alerta de tipo "warning" con botones de confirmación
    var n = new Noty({
        text: '¿Estás seguro de que deseas eliminar este registro? Esta acción no se puede deshacer.',
        type: 'warning',
        layout: 'center', // Se muestra al centro de la pantalla como un modal
        modal: true,      // Bloquea el fondo para capturar la atención del usuario
        theme: 'bootstrap-v4', // Se adapta perfectamente a tu AdminLTE 3.2
        buttons: [
            // BOTÓN SÍ (CONFIRMAR)
            Noty.button('Sí, eliminar', 'btn btn-danger mr-2', function () {
                n.close(); // Cerramos la alerta de confirmación
                
                // Ejecutamos la petición asíncrona al backend mediante POST o GET
                fetch(base_url + "/Usuarios/delete/" + id_user, {
                    method: 'POST'
                })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        // Alerta de éxito flotante (se cierra sola)
                        new Noty({
                            text: data.msg,
                            type: 'success',
                            layout: 'topRight',
                            timeout: 3000
                        }).show();

                        // Opcional: Remueve visualmente la fila de la tabla sin recargar la página
                        elementRow.fadeOut(400, function() {
                            tblUsuarios.row(elementRow).remove().draw(false);
                        });

                    } else {
                        // Alerta de error si el backend falla
                        new Noty({
                            text: 'Error: ' + data.msg,
                            type: 'error',
                            layout: 'topRight',
                            timeout: 4000
                        }).show();
                    }
                })
                .catch(error => {
                    console.error('Error en la petición de eliminación:', error);
                });
            }),

            // BOTÓN NO (CANCELAR)
            Noty.button('Cancelar', 'btn btn-light', function () {
                n.close(); // Simplemente cierra la alerta sin hacer nada
            })
        ]
    });
    
    // Mostramos la alerta en pantalla
    n.show();

});