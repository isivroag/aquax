<?php require_once('vistas/header.php') ?>

<!-- Inicio del contenido principal -->
<?php



include_once 'bd/dboficina.php';


$nom_oficina = "";

$titular_oficina = "";

$message = "";


if (!empty($_GET['id']) && empty($_POST['btnGuardar'])) {
    $oficina = new Oficina();
    if ($oficina->buscarOficina($_GET['id'])) {

        $nom_oficina = $oficina->getnom_oficina();
        
        $titular_oficina = $oficina->GetTitular_oficina();
       
    }
} else {

    if (isset($_POST['btnGuardar'])) {

        $nom_oficina = $_POST['nom_oficina'];

        $titular_oficina = $_POST['titular_oficina'];

        if (!empty($_POST['nom_oficina']) && !empty($_POST['titular_oficina'])) {


            $Oficina = new oficina();

            $nom_oficina = $_POST['nom_oficina'];

            $titular_oficina = $_POST['titular_oficina'];

            if ($Oficina->actOficina($_GET['id'],$nom_oficina, $titular_oficina)) {

                echo "<script> window.location='cntaoficina.php'; </script>";
            } else {
                $message = "Error de Registro";
            }
        } else {
            $message = "El formulario de Registro no cumple con toda la información";
        }
    }
}


?>



<div class="" id="modalCRUD" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-gradient-primary">
                <h5 class="modal-title" id="exampleModalLabel">Actualizar Oficina</h5>

            </div>
            <form id="formPersonas" action="" method="POST">
                <div class="modal-body">


                    <div class="form-group">
                        <label for="nom_oficina" class="col-form-label">Número de Oficina:</label>
                        <input type="text" class="form-control" name="nom_oficina" id="nom_oficina"
                         value=<?php echo $nom_oficina; 
                         ?>>
                    </div>


                    <div class="form-group">
                        <label for="titular_oficina" class="col-form-label">Razón o Titular:</label>
                        <input type="text" class="form-control" name="titular_oficina" id="titular_oficina" 
                        value="<?php echo ($titular_oficina);?>"
                        >
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
                    <button type="button" class="btn btn-danger" onclick="window.location.href='cntaoficina.php'"><i class="fas fa-ban"></i> Cancelar</button>
                    <button type="submit" id="btnGuardar" name="btnGuardar" class="btn btn-success" value="btnGuardar"><i class="far fa-save"></i> Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>


<?php require_once('vistas/footer.php') ?>
<script src="js/oficina.js"></script>