$(document).ready(function() {
    var id, visitante, ine, opcion;
    var id2, numofi, titular;

    opcion = 4;

    tablaPersonas = $("#tablaV").DataTable({



        "columnDefs": [{
            "targets": -1,
            "data": null,
            "defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary  btnAgregar'><i class='fas fa-edit'></i> Agregar</button></div></div>"
        }],

        //Para cambiar el lenguaje a español
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros",
            "zeroRecords": "No se encontraron resultados",
            "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sSearch": "Buscar:",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
            },
            "sProcessing": "Procesando...",
        }
    });

    tablaOFICINA = $("#tablaO").DataTable({



        "columnDefs": [{
            "targets": -1,
            "data": null,
            "defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary  btnAgregarO'><i class='fas fa-edit'></i> Agregar</button></div></div>"
        }],

        //Para cambiar el lenguaje a español
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros",
            "zeroRecords": "No se encontraron resultados",
            "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sSearch": "Buscar:",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
            },
            "sProcessing": "Procesando...",
        }
    });


    $("#btnNuevo").click(function() {

        $(".modal-header").css("background-color", "#28a745");
        $(".modal-header").css("color", "white");
        $(".modal-title").text("Agregar Visitante");
        $("#modalCRUD").modal("show");
        id = null;

    });

    $("#btnOficina").click(function() {

        $(".modal-header").css("background-color", "#28a745");
        $(".modal-header").css("color", "white");
        $(".modal-title").text("Agregar Visitante");
        $("#modalOfi").modal("show");
        id2 = null;

    });
    var fila; //capturar la fila para editar o borrar el registro

    $(document).on("click", ".btnAgregar", function() {
        fila = $(this).closest("tr");
        id = parseInt(fila.find('td:eq(0)').text());
        visitante = fila.find('td:eq(1)').text();
        ine = fila.find('td:eq(2)').text();
        $("#idvisitante").val(id);
        $("#visitante").val(visitante);
        $("#ine").val(ine);
        $("#modalCRUD").modal("hide");
        //poner la ruta del formulario de registro
        //window.location.href = "modalvisitante.php?id=" + id;


    });
    var fila2; //capturar la fila para editar o borrar el registro

    //botón EDITAR    
    $(document).on("click", ".btnAgregarO", function() {
        fila2 = $(this).closest("tr");
        id2 = parseInt(fila2.find('td:eq(0)').text());
        numofi = fila2.find('td:eq(1)').text();
        titular = fila2.find('td:eq(2)').text();

        $("#idoficina").val(id2);
        $("#numofi").val(numofi);
        $("#titularofi").val(titular);
        $("#modalOfi").modal("hide");
        //poner la ruta del formulario de registro
        //window.location.href = "modalvisitante.php?id_o=" + id2;


    });


});