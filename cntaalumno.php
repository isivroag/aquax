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

$sqlc = "SELECT alumno.id_alumno,alumno.nombre,alumno.id_tgpo,alumno.id_sub,alumno.id_nivel,alumno.nacimiento,alumno.edad,nivel.nivel as nomnivel 
        from alumno join nivel on alumno.id_nivel=nivel.id_nivel order by alumno.id_alumno";

 $sqlc= "SELECT * from vdatosevaluacion order by id_alumno";     

$consulta = $sqlc;
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data = $resultado->fetchAll(PDO::FETCH_ASSOC);
?>

<header>
    <!--         <h3 class="text-center text-light">Tutorial</h3>-->
    <h4 class="text-center">Alumnos</h4>
</header>


<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table id="tablavis" class="table table-striped table-bordered text-nowrap w-auto mx-auto" style="width:100%">
                        <thead class="text-center">
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Estado</th>
                                <th>ID Nivel</th>
                                <th>Nivel</th>
                                <th>ID Etapa</th>
                                <th>Etapa</th>
                                <th>Instructor Asignado</th>
                                <th>Acciones</th>
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
                                    <td><?php echo $dat['id_nivel'] ?></td>
                                    <td><?php echo $dat['ncorto'] ?></td>
                                    <td><?php echo $dat['id_etapa'] ?></td>
                                    <td><?php echo $dat['nom_etapa'] ?></td>
                                    <td><?php echo $dat['nominstructor'] ?></td>
                                   
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


<script src="js/alumno.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js" type="text/javascript"></script>