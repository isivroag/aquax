<?php require_once('vistas/header.php') ?>
<style>
    @media only screen and (max-width: 480px) {
        video {
            max-width: 100%;
        }

    }
</style>
<!-- Inicio del contenido principal -->
<?php



include_once 'bd/dbvisitante.php';


$nombre = "";
$ine = "";
$licencia = "";
$pasaporte = "";
$otro = "";
$message = "";
$foto="img/no-image.png";

if (isset($_POST['btnGuardar'])) {

    $nombre = $_POST['nombre'];
    $ine = $_POST['ine'];
    $licencia = $_POST['licencia'];
    $pasaporte = $_POST['pasaporte'];
    $otro = $_POST['otro'];
    $foto=$_POST['idfoto'];

    if (!empty($_POST['nombre']) && (!empty($_POST['ine'])  || !empty($_POST['pasaporte']) || !empty($_POST['licencia']) || !empty($_POST['otro']))) {


        $user = new Visitante();

        $nombre = $_POST['nombre'];
        $ine = $_POST['ine'];
        $licencia = $_POST['licencia'];
        $pasaporte = $_POST['pasaporte'];
        $otro = $_POST['otro'];
        $foto=$_POST['idfoto'];

        if ($user->saveVisitante($nombre, $ine,  $licencia, $pasaporte, $otro, $foto)) {

            echo "<script> window.location='cntavisitante.php'; </script>";
        } else {
            $message = "Error de Registro";
        }
    } else {
        $message = "El formulario de Registro no cumple con toda la información";
    }
}
?>


<div class="" id="modalCRUD" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-gradient-primary">
                <h5 class="modal-title" id="exampleModalLabel">NUEVO VISITANTE</h5>

            </div>
            <form id="formPersonas" action="" method="POST">
                <div class="modal-body row">
                    <div class="col-sm-6">

                        <div class="form-group">
                            <label for="nombre" class="col-form-label">Nombre:</label>
                            <input type="text" class="form-control" name="nombre" id="nombre">
                        </div>

                        <div class="form-group">
                            <label for="ine" class="col-form-label">Identificación INE:</label>
                            <input type="text" class="form-control" name="ine" id="ine">
                        </div>

                        <div class="form-group">
                            <img class="form-control " src="<?php echo $foto ?>" name="imgfoto" id="imgfoto" alt="FOTO" style="width:350px; height:350px; margin: 0 auto">
                            <input class="form-control" type="text" id="idfoto" name="idfoto" value=<?php echo $foto?>>
                            <button type="button" id="btntomarfoto" name="btntomarfoto" class="btn btn-primary" data-toggle="modal"><i class="fas fa-camera"></i> Foto</button>

                        </div>


                    </div>
                    <div class="col-sm-6">

                        <div class="form-group">
                            <label for="licencia" class="col-form-label">Licencia:</label>
                            <input type="text" class="form-control" name="licencia" id="licencia">
                        </div>
                        <div class="form-group">
                            <label for="pasaporte" class="col-form-label">Pasaporte:</label>
                            <input type="pasaporte" class="form-control" name="pasaporte" id="pasaporte">
                        </div>

                        <div class="form-group">
                            <label for="otro" class="col-form-label">Otra Identificación:</label>
                            <input type="text" class="form-control" name="otro" id="otro">
                        </div>
                    </div>
                </div>
                <?php
                if ($message != "") {
                ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <span class="badge "><?php echo ($message); ?></span>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>

                    </div>

                <?php
                }
                ?>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" onclick="window.location.href='cntavisitante.php'"><i class="fas fa-ban"></i> Cancelar</button>
                    <button type="submit" id="btnGuardar" name="btnGuardar" class="btn btn-success" value="btnGuardar"><i class="far fa-save"></i> Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modalFOTO" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-m" role="document">
        <div class="modal-content">
            <div class="modal-header bg-gradient-primary">
                <h5 class="modal-title" id="exampleModalLabel">FOTO</h5>

            </div>
            <form id="formFoto" action="" method="POST">
                <div class="modal-body row">
                    <div class="col-sm-12">

                        <div class="form-group">
                            <video class="form-control" style="width: 350px; height:350px; margin: 0 auto" muted="muted" id="video"></video>
                        </div>
                        <div class="form-group">
                            <canvas id="canvas" style="display:none"></canvas>
                            <br>
                            <select class="form-control" name="listaDeDispositivos" id="listaDeDispositivos"></select>
                            
                            <button type="button" id="boton" class="btn btn-success" data-dismiss="modal">Tomar foto</button>
                            <p id="estado"></p>
                        </div>



                    </div>

            </form>
        </div>
    </div>
</div>


<?php require_once('vistas/footer.php') ?>
<script src="js/visitante.js"></script>
<script src="script.js"></script>