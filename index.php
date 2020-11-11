<?php
session_start();

if(isset($_SESSION["s_usuario"])){
    header("Location:home.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Control de Visitantes</title>

    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="plugins/sweetalert2/sweetalert2.min.css">
</head>
<body>
  
    <div id="login">
    <h3 class="text-center text-white display-4">Sistema de Control de Visitantes</h3>

    <div class="container">
        <div id="login-row" class="row justify-content-center align-items-center">
            <div id="login-column" class="col-md-6">
                
            <div id="login-box" class="col-md-12 bg-light text-dark">
                <form id="formlogin" class="form" action="" method="post">
                    <h3> Iniciar Sessión</h3>
                    <div class="form-group">
                        <label for="username" class="text-dark">Usuario</label>
                        <input type="text" id="username" name="username" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="pass" class="text-dark">Contraseña</label>
                        <input type="password" id="pass" name="pass" class="form-control">
                    </div>

                    <div class="form-group text-center">
                        <input type="submit" name="submit" class="btn btn-primary btn-lg btn-block" value="Ingresar" >

                    </div>
            
                    </form>

                </div>

            </div>
        
        </div>
</div>

    <script src="jquery/jquery-3.5.1.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--<script src="popper/popper.min.js"></script>-->

    <script src="plugins/sweetalert2/sweetalert2.all.min.js"></script>
    <script src="js/codigo.js"></script>
</body>
</html>