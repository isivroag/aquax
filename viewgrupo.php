<?php require_once('vistas/header.php') ?>

<!-- Inicio del contenido principal -->
<?php


include_once 'bd/conexion.php';
$objeto = new conn();
$conexion = $objeto->connect();


$id = "";
$id_alumno = "";
$nombre = "";
$dataeval = "";
$ncorto = "";
$nom_etapa = "";


if (!empty($_GET['id'])) {

    $id = $_GET['id'];


    $consulta1 = "SELECT wvlistas.id_grupo,wvlistas.id_alumno,vdatosevaluacion.nombre,vdatosevaluacion.dataeval,vdatosevaluacion.ncorto,vdatosevaluacion.nom_etapa
        FROM wvlistas JOIN vdatosevaluacion ON wvlistas.id_alumno = vdatosevaluacion.id_alumno where wvlistas.id_grupo='" . $id . "' order by wvlistas.id_alumno";

    $resultado1 = $conexion->prepare($consulta1);
    $resultado1->execute();
    $data = $resultado1->fetchAll(PDO::FETCH_ASSOC);
} else {
    echo "<script> window.location='cntagpo.php'; </script>";
}



?>
<div class="container" id="modalCRUD" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="" role="document">
        <div class="">
            <div class="modal-header bg-gradient-primary">
                <h5 class="modal-title" id="exampleModalLabel">DETALLE DEL GRUPO</h5>
            </div>


            <div class="content">
                <div class="modal-body row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table id="tablaV" class="table table-striped table-bordered text-nowrap w-auto mx-auto" style="width:100%">
                                <thead class="text-center">
                                    <tr>
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th>Estado</th>
                                        <th>Nivel</th>
                                        <th>Etapa</th>
                                        <th>Info</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    foreach ($data as $dat) {
                                    ?>
                                        <tr>
                                            <td><?php echo $dat['id_alumno'] ?></td>
                                            <td><?php echo $dat['nombre'] ?></td>
                                            <td><?php echo $dat['dataeval'] ?></td>
                                            <td><?php echo $dat['ncorto'] ?></td>
                                            <td><?php echo $dat['nom_etapa'] ?></td>
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
                <button type="button" class="btn btn-primary" onclick="window.location.href='cntagpo.php'"><i class="fas fa-backward"></i> Regresar</button>

            </div>

        </div>

    </div>
</div>
<!--
<div class="fade" id="modalgpo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detalle de Grupos</h5>
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
                                        <th>Id Dia</th>
                                        <th>Día</th>
                                        <th>Hora</th>
                                        <th>Instructor</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($data2 as $dat) {
                                    ?>
                                        <tr>
                                            <td><?php echo $dat['id_grupo'] ?></td>
                                            <td><?php echo $dat['id_dia'] ?></td>
                                            <td><?php echo $dat['dia'] ?></td>
                                            <td><?php echo $dat['hora'] ?></td>
                                            <td><?php echo $dat['instructor'] ?></td>

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
                <button type="button" class="btn btn-light" data-dismiss="modal">Cerrar</button>

            </div>
            </form>
        </div>
    </div>
</div>
                                -->

<?php require_once('vistas/footer.php') ?>
<script src="js/viewgrupo.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js" type="text/javascript"></script>