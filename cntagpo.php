<?php require_once('vistas/header.php') ?>


<style>
    #tablaRpt tfoot input {
        width: 100% !important;
    }

    #tablaRpt tfoot {
        display: table-header-group !important;
    }
</style>


<!-- Inicio del contenido principal -->
<?php
include_once 'bd/conexion.php';
$objeto = new conn();
$conexion = $objeto->connect();

$sqlc = "SELECT grupo.id_grupo,grupo.id_gpo,grupo.id_subgpo,grupo.grupo,grupo.id_instructor,instructor.nombre,nivel.nivel , niv.nivel as nivel2,
        grupo.alumnos,(cast(grupo.cupomax as decimal(10,0))  -cast(grupo.alumnos as decimal(10,0))) as disp, grupo.cupomax,grupo.id_dia, grupo.dia, grupo.hora
        From grupo
        JOIN instructor ON grupo.id_instructor =instructor.id_instructor
        join nivel on grupo.nivel1=nivel.ID_NIVEL 
        join nivel  as niv on grupo.nivel2=niv.id_nivel 
        Where grupo.Status = 1 And grupo.id_act = 0  order by grupo.id_dia,grupo.hora";

$consulta = $sqlc;
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data = $resultado->fetchAll(PDO::FETCH_ASSOC);



?>

<header>
    <!--         <h3 class="text-center text-light">Tutorial</h3>-->
    <h4 class="text-center">Grupos</h4>
</header>



<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table id="tablaRpt" class="table table-striped table-bordered text-nowrap w-auto mx-auto" style="width:100%" >
                        <thead class="text-center">
                            <tr>
                                <th>ID</th>
                                <th>Id dia</th>
                                <th>Dia</th>
                                <th>Hora</th>
                                <th>ID Gpo</th>
                                <th>Sub Gpo</th>
                                <th>Nombre</th>
                                <th>Id Ins</th>
                                <th>Instructor</th>
                                <th>Nivel 1</th>
                                <th>Nivel 2</th>
                                <th>Alumnos</th>
                                <th>Disp</th>
                                <th>Max</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th class="invisible"></th>
                        </tfoot>
                        <tbody>
                            <?php
                            foreach ($data as $dat) {
                            ?>
                                <tr>
                                    <td><?php echo $dat['id_grupo'] ?></td>
                                    <td><?php echo $dat['id_dia'] ?></td>
                                    <td><?php echo $dat['dia'] ?></td>
                                    <td><?php echo $dat['hora'] ?></td>
                                    <td><?php echo $dat['id_gpo'] ?></td>
                                    <td><?php echo $dat['id_subgpo'] ?></td>
                                    <td><?php echo $dat['grupo'] ?></td>
                                    <td><?php echo $dat['id_instructor'] ?></td>
                                    <td><?php echo $dat['nombre'] ?></td>
                                    <td><?php echo $dat['nivel'] ?></td>
                                    <td><?php echo $dat['nivel2'] ?></td>
                                    <td><?php echo $dat['alumnos'] ?></td>
                                    <td><?php echo $dat['disp'] ?></td>
                                    <td><?php echo $dat['cupomax'] ?></td>
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
</div>




<?php require_once('vistas/footer.php') ?>


<script src="js/grupo.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js" type="text/javascript"></script>