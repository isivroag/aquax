$(document).ready(function() {
    var id, opcion;
    opcion = 4;

    tablaVis = $("#tablaR").DataTable({



        "columnDefs": [{
            "targets": -1,
            "data": null,
            "defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-danger btnSalir'><i class='fas fa-sign-out-alt'></i> Salida</button></div></div>"
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

        window.location.href = "modalvisitante.php";
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


    //botón BORRAR
    $(document).on("click", ".btnSalir", function() {
        fila = $(this);

        id = parseInt($(this).closest("tr").find('td:eq(0)').text());
        opcion = 3 //borrar

        //agregar codigo de sweatalert2
        var respuesta = confirm("¿Está seguro registrar la Salida del registro: " + id + "?");



        if (respuesta) {
            $.ajax({

                url: "bd/crudreg.php",
                type: "POST",
                dataType: "json",
                data: { id: id, opcion: opcion },

                success: function() {


                    tablaVis.row(fila.parents('tr')).remove().draw();
                }
            });
        }
    });

    function startTime() {
        var today = new Date();
        var hr = today.getHours();
        var min = today.getMinutes();
        var sec = today.getSeconds();
        //Add a zero in front of numbers<10
        min = checkTime(min);
        sec = checkTime(sec);
        document.getElementById("clock").innerHTML = hr + " : " + min + " : " + sec;
        var time = setTimeout(function() { startTime() }, 500);
    }

    function checkTime(i) {
        if (i < 10) {
            i = "0" + i;
        }
        return i;
    }
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