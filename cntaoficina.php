<?php require_once('vistas/header.php') ?>

<!-- Inicio del contenido principal -->
<?php
include_once 'bd/conexion.php';
$objeto = new conn();
$conexion = $objeto->connect();

$consulta = "SELECT * FROM oficina order by id_oficina";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data = $resultado->fetchAll(PDO::FETCH_ASSOC);
?>

<header>
    <!--         <h3 class="text-center text-light">Tutorial</h3>-->
    <h4 class="text-center">Consulta de Oficinas</h4>
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
                <table id="tablaO" class="table table-striped table-bordered table-condensed" style="width:100%">
                    <thead class="text-center">
                        <tr>
                            <th>Id</th>
                            <th>Numero</th>
                            <th>Titular o Razon</th>
                            
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($data as $dat) {
                        ?>
                            <tr>
                                <td><?php echo $dat['id_oficina'] ?></td>
                                <td><?php echo $dat['nom_oficina'] ?></td>
                                <td><?php echo $dat['titular_oficina'] ?></td>
                                
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
<script src="js/oficina.js"></script>