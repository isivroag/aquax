$(document).ready(function() {
    var id, opcion;
    opcion = 4;

    tablaO = $("#tablaO").DataTable({



        "columnDefs": [{
            "targets": -1,
            "data": null,
            "defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary  btnEditar'><i class='fas fa-edit'></i> Editar</button><button class='btn btn-danger btnBorrar'><i class='fas fa-trash-alt'></i> Borrar</button></div></div>"
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

        window.location.href = "oficina.php";
        //$("#formPersonas").trigger("reset");
        //$(".modal-header").css("background-color", "#28a745");
        //$(".modal-header").css("color", "white");
        //$(".modal-title").text("Nuevo Visitante");
        //$("#modalCRUD").modal("show");
        //id = null;
        //opcion = 1; //alta
    });

    var fila; //capturar la fila para editar o borrar el registro

    //botón EDITAR    
    $(document).on("click", ".btnEditar", function() {
        fila = $(this).closest("tr");
        id = parseInt(fila.find('td:eq(0)').text());

        window.location.href = "actoficina.php?id=" + id;
        // nombre = fila.find('td:eq(1)').text();
        // ine = fila.find('td:eq(2)').text();
        // licencia = parseInt(fila.find('td:eq(3)').text());
        // pasaporte = parseInt(fila.find('td:eq(4)').text());
        // otro = parseInt(fila.find('td:eq(5)').text());

        // $("#nombre").val(nombre);
        // $("#ine").val(ine);
        // $("#licencia").val(licencia);
        // $("#pasaporte").val(pasaporte);
        // $("#otro").val(otro);
        // opcion = 2; //editar

        // $(".modal-header").css("background-color", "#007bff");
        // $(".modal-header").css("color", "white");
        // $(".modal-title").text("Editar Visitante");
        //$("#modalCRUD").modal("show");

    });

    //botón BORRAR
    $(document).on("click", ".btnBorrar", function() {
        fila = $(this);

        id = parseInt($(this).closest("tr").find('td:eq(0)').text());
        opcion = 3 //borrar

        //agregar codigo de sweatalert2
        var respuesta = confirm("¿Está seguro de eliminar el registro: " + id + "?");



        if (respuesta) {
            $.ajax({

                url: "bd/crudofi.php",
                type: "POST",
                dataType: "json",
                data: { id: id, opcion: opcion },

                success: function(data) {
                    console.log(data);

                    tablaO.row(fila.parents('tr')).remove().draw();
                }
            });
        }
    });
    /*
        $("#formPersonas").submit(function(e) {
            e.preventDefault();
            nombre = $.trim($("#nombre").val());
            ine = $.trim($("#ine").val());
            licencia = $.trim($("#licencia").val());
            pasaporte = $.trim($("#pasaporte").val());
            otro = $.trim($("#otro").val());


            $.ajax({
                url: "bd/crud.php",
                type: "POST",
                dataType: "json",
                data: { nombre: nombre, ine: ine, licencia: licencia, id: id, pasaporte: pasaporte, otro: otro, opcion: opcion },
                success: function(data) {
                    console.log(data);

                    //tablaPersonas.ajax.reload(null, false);
                    id = data[0].id;
                    nombre = data[0].nombre;
                    ine = data[0].ine;
                    licencia = data[0].licencia;
                    pasaporte = data[0].pasaporte;
                    otro = data[0].otro;
                    if (opcion == 1) { tablaPersonas.row.add([id, nombre, ine, licencia, pasaporte, otro]).draw(); } else { tablaPersonas.row(fila).data([id, nombre, ine, licencia, pasaporte, otro]).draw(); }
                }
            });
            $("#modalCRUD").modal("hide");

        });*/

});