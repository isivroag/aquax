<?php require_once('vistas/header.php') ?>

<!-- Inicio del contenido principal -->
<?php


include_once 'bd/conexion.php';
$objeto = new conn();
$conexion = $objeto->connect();


$id = "";
$id_nivel = "";
$nom_nivel = "";
$nom_alumno = "";
$id_etapa = "";
$nom_etapa = "";
$id_instructor = "";
$nom_instructor = "";

if (!empty($_GET['id'])) {

    $id = $_GET['id'];


    $consulta1 = "SELECT * from vdatosevaluacion where id_alumno='" . $id . "' order by id_alumno";

    $resultado1 = $conexion->prepare($consulta1);
    $resultado1->execute();
    $data = $resultado1->fetchAll(PDO::FETCH_ASSOC);
    if ($resultado1->rowCount() >= 1) {
        foreach ($data as $dtvin) {

            $nom_alumno = $dtvin['nombre'];
            $id_nivel = $dtvin['id_nivel'];
            $nom_nivel = $dtvin['ncorto'];
            $id_etapa = $dtvin['id_etapa'];
            $nom_etapa = $dtvin['nom_etapa'];
            $id_instructor = $dtvin['id_instructor'];
            $nom_instructor = $dtvin['nominstructor'];
        }
    }

    $consulta2 = "SELECT id_etapa,nom_etapa FROM etapa WHERE id_nivel='" . $id_nivel . "' order by id_etapa";
    $resultado2 = $conexion->prepare($consulta2);
    $resultado2->execute();
    $data2 = $resultado2->fetchAll(PDO::FETCH_ASSOC);


    $consulta3 = "SELECT id_instructor,instructor FROM vlistas WHERE id_alumno='" . $id . "' and status=1 and estado=1 and id_act=0 group by id_alumno,id_instructor order by instructor";
    $resultado3 = $conexion->prepare($consulta3);
    $resultado3->execute();
    $data3 = $resultado3->fetchAll(PDO::FETCH_ASSOC);




    $consulta4 = "SELECT * FROM evalgeneral where id_alumno='" . $id . "' and id_nivel='" . $id_nivel . "' and id_etapa='" . $id_etapa . "'";
    $resultado4 = $conexion->prepare($consulta4);
    $resultado4->execute();
    $data4 = $resultado4->fetchAll(PDO::FETCH_ASSOC);
} else {
    echo "<script> window.location='cntaalumno.php'; </script>";
}

?>


<div class="" id="modalCRUD" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="container" role="document">
        <div class="modal-content">
            <div class="modal-header bg-gradient-primary">
                <h5 class="modal-title" id="exampleModalLabel">INFORMACION DEL ALUMNO</h5>
            </div>
            <form id="formPersonas" action="" method="POST">
                <div class="modal-body row">
                    <div class="col-sm-12">
                        <label for="nombre" class="col-form-label">Nombre:</label>
                        <input type="text" class="form-control" name="nombre" id="nombre" value="<?php echo $nom_alumno; ?>">
                        
                        <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $id; ?>">
                    </div>

                    <div class="col-sm-4">

                        <label for="nivel" class="col-form-label">Nivel:</label>
                        <input type="text" class="form-control" name="nivel" id="nivel" value="<?php echo $nom_nivel; ?>">

                        <input type="hidden" class="form-control" name="id_nivel" id="id_nivel" value="<?php echo $id_nivel; ?>">
                    </div>
                    <div class="col-sm-4">

                        <label for="etapa" class="col-form-label">Etapa:</label>
                        <select class="form-control" name="etapa" id="etapa">

                            <?php
                            if ($resultado3->rowCount() >= 1) {
                                foreach ($data2 as $dtdat) {

                            ?>

                                    <option value="<?php echo $dtdat['id_etapa']; ?>" <?php if ($dtdat['id_etapa'] == $id_etapa) { ?> selected <?php } ?>><?php echo $dtdat['nom_etapa']; ?></option>

                            <?php
                                }
                            }
                            ?>
                        </select>


                    </div>
                    <div class="col-sm-4">
                        <label for="instructor" class="col-form-label">Instructor:</label>
                        <select class="form-control" name="instructor" id="instructor">

                            <?php
                            if ($resultado3->rowCount() >= 1) {
                                foreach ($data3 as $dtdat) {

                            ?>

                                    <option value="<?php echo $dtdat['id_instructor']; ?>" <?php if ($dtdat['id_instructor'] == $id_instructor) { ?> selected <?php } ?>><?php echo $dtdat['instructor']; ?></option>

                            <?php
                                }
                            }
                            ?>
                        </select>
                    </div>

                    <div class="col-sm-12">
                        <div class="content" role="document">
                            <div class="content">
                                <br>

                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="table-responsive table-striped table-bordered">
                                                <table class="table" id="tablaobjetivos">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center"><strong>ID</strong></th>
                                                            <th class="text-center"><strong>OBJETIVO</strong></th>
                                                            <th class="text-center" style="width:10%"><strong>ESTADO</strong></th>
                                                            <th class="text-center"><strong>VALOR</strong></th>
                                                            <th class="text-center"><strong>EVAL</strong></th>
                                                        </tr>
                                                    </thead>

                                                    <tbody id="tbody">

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

            </form>

            
        </div>
        <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="window.location.href='cntaalumno.php'"><i class="fas fa-backward"></i> Regresar</button>
                <button type="button" class="btn btn-success" onclick="window.location.href='cntaalumno.php'"><i class="fas fa-save"></i> Guardar</button>
            </div>
    </div>
</div>





<?php require_once('vistas/footer.php') ?>
<script src="js/evalini.js"></script>
