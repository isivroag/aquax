<?php require_once('vistas/header.php') ?>

<!-- Inicio del contenido principal -->
<?php



include_once 'bd/dbregistro.php';

$objeto=new conn();
$conexion= $objeto->connect();

$consulta3 = "SELECT * FROM visitante order by id";
$resultado3 = $conexion->prepare($consulta3);
$resultado3->execute();
$data = $resultado3->fetchAll(PDO::FETCH_ASSOC);


$consulta2 = "SELECT * FROM oficina order by id_oficina";
$resultado2 = $conexion->prepare($consulta2);
$resultado2->execute();
$data2 = $resultado2->fetchAll(PDO::FETCH_ASSOC);





$idvisitante = "";
$visitante = "";
$identificacion = "";

$idoficina = "";
$nomoficina = "";
$titular = "";
$asunto = "";
$entrada = "";
$message="";

if (isset($_POST['btnGuardar'])) {

   

    if (!empty($_POST['idvisitante']) && !empty($_POST['visitante'])  && !empty($_POST['idoficina']) && !empty($_POST['asunto']) ) {


        $registro = new Registro();

        $idvisitante = $_POST['idvisitante'];
        $visitante =$_POST['visitante'];
        $identificacion = $_POST['ine'];

        $idoficina =$_POST['idoficina'];
        $nomoficina = $_POST['numofi'];
        $titular = $_POST['titularofi'];
        $asunto = $_POST['asunto'];
        $time = time();
        $entrada =date("Y-m-d H:i:s", $time);
        $message=$entrada;
        

        if ($registro->salva_registro($idvisitante, $idoficina,  $asunto, $entrada, $_SESSION['s_id_usuario'])) {

            echo "<script> window.location='home.php'; </script>";
        } else {
            $message = "Error de Registro";
        }
    } else {
        $message = "El formulario de Registro no cumple con toda la información";
    }
}



?>

<div class="" id="" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-h bg-gradient-primary">
                <h5 class="title" id="exampleModalLabel">Registro de Visitantes</h5>

            </div>

            <form id="formRegistro" action="" method="POST">
                <div class="modal-body row">
                    <div class="col-sm-6">


                        <div class="form-group">
                            <label for="visitante" class="col-form-label">Visitante:</label>
                            <input type="hidden" class="form-control" name="idvisitante" id="idvisitante">
                            <input type="text" class="form-control" name="visitante" id="visitante">
                            <button style="margin-top:5px" id="btnNuevo" type="button" class="btn btn-success" data-toggle="modal">Buscar</button>
                        </div>

                        <div class="form-group">
                            <label for="ine" class="col-form-label">Identificacion:</label>
                            <input type="text" class="form-control" name="ine" id="ine">
                        </div>


                    </div>

                    <div class="col-sm-6">

                        <div class="form-group">
                            <label for="numofi" class="col-form-label"> Num Oficina:</label>
                            <input type="hidden" class="form-control" name="idoficina" id="idoficina">
                            <input type="text" class="form-control" name="numofi" id="numofi">
                            <button style="margin-top:5px" id="btnOficina" type="button" class="btn btn-success" data-toggle="modal">Buscar</button>
                        </div>

                        <div class="form-group">
                            <label for="titularofi" class="col-form-label">Oficina:</label>
                            <input type="text" class="form-control" name="titularofi" id="titularofi">
                        </div>


                    </div>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label for="asunto" class="col-form-label">Motivo de Visita:</label>
                        <input type="textarea" class="form-control" name="asunto" id="asunto">
                    </div>

                    <div class="clock form-group">
                        <label for="" class="col-form-label"> Hora de Entrada: </label>
                        <span id="hours" class="hours"></span> :
                        <span id="minutes" class="minutes"></span> :
                        <span id="seconds" class="seconds"></span>
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
                    <button type="button" class="btn btn-danger" onclick="window.location.href='home.php'"><i class="fas fa-ban"></i> Cancelar</button>
                    <button type="submit" id="btnGuardar" name="btnGuardar" class="btn btn-success" value="btnGuardar"><i class="far fa-save"></i> Guardar</button>
                </div>
            </form>

        </div>
    </div>
</div>

<!-- MODEL DE VISITANTE-->

<div class="modal fade" id="modalCRUD" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar Of al Registro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>

            <br>

            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table id="tablaV" class="table table-striped table-bordered table-condensed" style="width:100%">
                                <thead class="text-center">
                                    <tr>
                                        <th>Id</th>
                                        <th>Nombre</th>
                                        <th>INE</th>

                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($data as $dat) {
                                    ?>
                                        <tr>
                                            <td><?php echo $dat['id'] ?></td>
                                            <td><?php echo $dat['nombre'] ?></td>
                                            <td><?php echo $dat['ine'] ?></td>

                                            <td></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>

            </div>
            </form>
        </div>
    </div>
</div>


<!-- MODAL DE OFICINA -->

<div class="modal fade" id="modalOfi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Oficina de Visita</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>

            <br>

            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table id="tablaO" class="table table-striped table-bordered table-condensed" style="width:100%">
                                <thead class="text-center">
                                    <tr>
                                        <th>Id</th>
                                        <th>Nombre</th>
                                        <th>Titular o Razon</th>

                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($data2 as $dat2) {
                                    ?>
                                        <tr>
                                            <td><?php echo $dat2['id_oficina'] ?></td>
                                            <td><?php echo $dat2['nom_oficina'] ?></td>
                                            <td><?php echo $dat2['titular_oficina'] ?></td>

                                            <td></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>

            </div>
            </form>
        </div>
    </div>
</div>

<?php require_once('vistas/footer.php') ?>
<script src="js/modalvisitante.js"></script>
<script src="js/clock.js"></script>