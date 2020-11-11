$(document).ready(function() {
    var id, opcion;
    opcion = 4;

    $('#tablaRpt tfoot th').each(function() {
        var title = $(this).text();
        $(this).html('<input type="text" placeholder="Filtrar.." />');
    });



    var tablaVis = $("#tablaRpt").DataTable({


        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ],
        "responsive": false,




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
        },

        "order": [
            [0, "desc"]
        ],
        "initComplete": function() {
            this.api().columns().every(function() {
                var that = this;

                $('input', this.footer()).on('keyup change', function() {
                    if (that.search() !== this.value) {
                        that
                            .search(this.value)
                            .draw();
                    }
                });
            })
        }


    });

    $("#btnNuevo").click(function() {

        window.location.href = "visitante.php";
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

        window.location.href = "actvisitante.php?id=" + id;
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

                url: "bd/crudvis.php",
                type: "POST",
                dataType: "json",
                data: { id: id, opcion: opcion },

                success: function() {
                    console.log(data);

                    tablaVis.row(fila.parents('tr')).remove().draw();
                }
            });
        }
    });



    /*

        $('#tablaRpt thead th').each(function() {
            var title = $(this).text();
            $(this).html('<input type="text" placeholder="Buscar ' + title + '" class=""/>');
        });
        tablaVis.colums().every(function() {
            var that = this;
            $('input', this.header()).on('keyup change', function() {
                if (that.search() !== this.value) {
                    that.search(this.value).draw();
                }
            })


        })*/




});