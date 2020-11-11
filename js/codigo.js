$('#formlogin').submit(function(e) {
    e.preventDefault();
    var usuario = $.trim($('#username').val());
    var password = $.trim($('#pass').val());
    if (usuario.length == 0 || password.length == 0) {
        Swal.fire({
            title: 'Usuario y/o Contraseña faltantes',
            text: "Debe ingresar un usuario y contraseña",
            icon: 'warning',
        })
        return false;
    } else {
        $.ajax({
            url: "bd/login.php",
            type: "POST",
            datatype: "json",
            data: { usuario: usuario, password: password },
            success: function(data) {

                if (data == "null") {
                    Swal.fire({
                        title: 'Usuario no identificado',
                        text: "El usuario y/o la contraseña ingresado no coinciden",
                        icon: 'error',
                    })
                } else {
                    Swal.fire({
                        title: 'Conexion Exitosa',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'Ingresar',
                        icon: 'success',
                    }).then((result) => {
                        if (result.value) {
                            window.location.href = "home.php";
                        }
                    })
                }
            }

        });
    }
});


$(document).ready(function() {

    //--------------------- SELECCIONAR FOTO PRODUCTO ---------------------
    $("#foto").on("change", function() {
        var uploadFoto = document.getElementById("foto").value;
        var foto = document.getElementById("foto").files;
        var nav = window.URL || window.webkitURL;
        var contactAlert = document.getElementById('form_alert');

        if (uploadFoto != '') {
            var type = foto[0].type;
            var name = foto[0].name;
            if (type != 'image/jpeg' && type != 'image/jpg' && type != 'image/png') {
                contactAlert.innerHTML = '<p class="errorArchivo">El archivo no es válido.</p>';
                $("#img").remove();
                $(".delPhoto").addClass('notBlock');
                $('#foto').val('');
                return false;
            } else {
                contactAlert.innerHTML = '';
                $("#img").remove();
                $(".delPhoto").removeClass('notBlock');
                var objeto_url = nav.createObjectURL(this.files[0]);
                $(".prevPhoto").append("<img id='img' src=" + objeto_url + ">");
                $(".upimg label").remove();

            }
        } else {
            alert("No selecciono foto");
            $("#img").remove();
        }
    });

    $('.delPhoto').click(function() {
        $('#foto').val('');
        $(".delPhoto").addClass('notBlock');
        $("#img").remove();

    });

});