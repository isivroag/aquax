<?php require_once('vistas/header.php') ?>

<!-- Inicio del contenido principal -->
<?php
include_once 'bd/conexion.php';
$objeto = new conn();
$conexion = $objeto->connect();

$consulta = "SELECT * FROM visitante order by id";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data = $resultado->fetchAll(PDO::FETCH_ASSOC);
?>

<header>
    <!--         <h3 class="text-center text-light">Tutorial</h3>-->
    <h4 class="text-center">Consulta de Visitantes</h4>
</header>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <button id="btnNuevo" type="button" class="btn btn-success btn-lg" data-toggle="modal"><i class="fas fa-user-plus"></i> Nuevo</button>
        </div>
    </div>
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
                            <th>Foto</th>
                            <th>Nombre</th>
                            <th>INE</th>
                            <th>Licencia</th>
                            <th>Pasaporte</th>
                            <th>Otra Identificación</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($data as $dat) {
                        ?>
                            <tr>
                                <td><?php echo $dat['id'] ?></td>
                                <td><img  class="img-profile rounded-circle" style="width: 80px ; height:80px"src="<?php echo $dat['foto'] ?>" alt="FOTO"></td>
                                <td><?php echo $dat['nombre'] ?></td>
                                <td><?php echo $dat['ine'] ?></td>
                                <td><?php echo $dat['licencia'] ?></td>
                                <td><?php echo $dat['pasaporte'] ?></td>
                                <td><?php echo $dat['otro'] ?></td>
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




<?php require_once('vistas/footer.php') ?>
<script src="js/visitante.js"></script>