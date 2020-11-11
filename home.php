<?php require_once('vistas/header.php') ?>

<!-- Inicio del contenido principal 
  <div  class="container">
    <h1>Contenido principal</h1>

  </div>
 Fin del contenido principal -->




<!-- Inicio del contenido principal -->
<?php
include_once 'bd/conexion.php';
$objeto = new conn();
$conexion = $objeto->connect();


//BUSCAR AL ALUMNO POR MEDIO DE LA TABLA VINCULACION
$id_usuario = $_SESSION['s_id_usuario'];
$id_alumno = "";
$alumno = "";
$id_nivel = "";
$nivel = "";
$agrupador = "";
$id_etapa = "";

$cntavinculo = "SELECT alumno.id_alumno, alumno.nombre 
FROM w_vinculo join alumno on w_vinculo.id_alumno = alumno.id_alumno where w_vinculo.id_usuario='" . $id_usuario . "'";
$resvinculo = $conexion->prepare($cntavinculo);
$resvinculo->execute();
$datavinculo = $resvinculo->fetchAll(PDO::FETCH_ASSOC);
if ($resvinculo->rowCount() >= 1) {
    foreach ($datavinculo as $dtvin) {
        $id_alumno = $dtvin['id_alumno'];
        $alumno = $dtvin['nombre'];
    }
}

$consulta = "SELECT * FROM vlistas where id_alumno='" . $id_alumno . "'";
$reslitas = $conexion->prepare($consulta);
$reslitas->execute();
$datalistas = $reslitas->fetchAll(PDO::FETCH_ASSOC);
if ($reslitas->rowCount() >= 1) {
    $dias = $reslitas->rowCount();
    $j = 0;

    $dia = array();
    $hora = array();
    $instructor=array();

    foreach ($datalistas as $dtlistas) {
        $dia[$j] = $dtlistas['dia'];
        $hora[$j] = $dtlistas['hora'];
        $instructor[$j] = $dtlistas['instructor'];
        $j++;
    }
}


//BUSCAR EL NIVEL Y LOS OBJETIVOS DEL ALUMNO EN LA TABLA EVALUACION DATOSEVAL




$consulta = "SELECT datoseval.id_alumno,datoseval.id_instructor,
            datoseval.id_nivel,datoseval.id_etapa ,nivel.nivel,nivel.agrupador 
            FROM datoseval join nivel on datoseval.id_nivel =nivel.ID_NIVEL where datoseval.id_alumno='" . $id_alumno . "'";
$resdatoseval = $conexion->prepare($consulta);
$resdatoseval->execute();
$datadatoseval = $resdatoseval->fetchAll(PDO::FETCH_ASSOC);
if ($resdatoseval->rowCount() >= 1) {
    foreach ($datadatoseval as $dteval) {
        $id_alumno = $dteval['id_alumno'];
        $id_nivel = $dteval['id_nivel'];
        $nivel = $dteval['nivel'];
        $agrupador = $dteval['agrupador'];
        $id_etapa = $dteval['id_etapa'];
    }
}


?>

<header>
    <!--         <h3 class="text-center text-light">Tutorial</h3>-->
    <h3 class="text-center">Bienvenido <?php echo $alumno ?></h3>
</header>

<?php

$folder_path = 'promos/';
$num_files = glob($folder_path . "*.{JPG,jpeg,gif,png,bmp}", GLOB_BRACE);
$folder = opendir($folder_path);
$nombres = array();

// for para el numero de imagenes


if ($num_files > 0) {
    $i = 0;
    while (false !== ($file = readdir($folder))) {

        $file_path = $folder_path . $file;
        $extension = strtolower(pathinfo($file, PATHINFO_EXTENSION));
        if ($extension == 'jpg' || $extension == 'png' || $extension == 'gif' || $extension == 'bmp') {
            $nombres[$i] = $file_path;
            $i++;
        }
    }
}
closedir($folder);

?>

<section class="content">


    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-gradient-primary">
                    <div class="inner">
                        <div class="text-s font-weight-bold text-white text-uppercase mb-1">HORARIO</div>
                        <?php
                        for ($x = 0; $x < $j; $x++) {
                        ?>
                            <div class="text-xs mb-0 font-weight-bold text-white"><?php echo $dia[$x]. ': '. $hora[$x] .' INST: '. $instructor[$x] ?></div>
                        <?php
                        
                        }
                        for ($x;$x<5;$x++){
                            ?>
                            <div class="text-xs mb-0 font-weight-bold text-white"><br></div>
                            <?php

                        }
                        ?>

                    </div>
                    <div class="icon">
                        <i class="far fa-clock fa-2x text-gray-300"></i>
                    </div>
                    <a href="#" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>


            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-gradient-success">
                    <div class="inner">
                        <div class="text-s font-weight-bold text-white text-uppercase mb-1">NIVEL ACTUAL</div>


                        <div class="text-xs mb-0 font-weight-bold text-white"><?php echo $nivel ?></div>
                        <div class="text-xs mb-0 font-weight-bold text-white">ETAPA <?php echo $id_etapa ?></div>
                        <div class="text-xs mb-0 font-weight-bold text-white"><br> </div>
                        <div class="text-xs mb-0 font-weight-bold text-white"><br> </div>

                    </div>
                    <div class="icon">
                        <i class="far fa-clock fa-2x text-gray-300"></i>
                    </div>
                    <a href="eval.php" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-gradient-warning">
                    <div class="inner">
                        <div class="text-s font-weight-bold text-white text-uppercase mb-1">CUOTA</div>

                        <div class="text-xs mb-0 font-weight-bold text-white">NATACION 3 DIAS</div>
                        <div class="text-xs mb-0 font-weight-bold text-white"><br></div>
                        <div class="text-xs mb-0 font-weight-bold text-white">$ 1,250.00 </div>
                        <div class="text-xs mb-0 font-weight-bold text-white"><br> </div>

                    </div>
                    <div class="icon">
                        <i class="far fa-clock fa-2x text-gray-300"></i>
                    </div>
                    <a href="#" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-gradient-info">
                    <div class="inner">
                        <div class="text-s font-weight-bold text-white text-uppercase mb-1">FECHA DE INSCRIPCIÓN</div>

                        <div class="text-xs mb-0 font-weight-bold text-white">2020-01-01</div>
                        <div class="text-xs mb-0 font-weight-bold text-white"><br></div>
                        <div class="text-xs mb-0 font-weight-bold text-white"><br> </div>
                        <div class="text-xs mb-0 font-weight-bold text-white"><br> </div>

                    </div>
                    <div class="icon">
                        <i class="fas fa-calendar-alt text-xs text-gray-300"></i>
                    </div>
                    <a href="#" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>

    </div>


    <br>
    <div class="wrapper">
        <div class="col-md-12 d-block">
            <div class="card ">
                <div class="card-header">
                    <h3 class="card-title">NOTICIAS</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">

                    <div class="row ">
                        <div class="col-md-6 mx-auto">
                            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <?php
                                    for ($x = 0; $x < $i; $x++) {
                                    ?>
                                        <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $x ?>" class="<?php echo ($x == 0) ? 'active' : '' ?>"></li>

                                    <?php
                                    }
                                    ?>
                                </ol>
                                <div class="carousel-inner">
                                    <?php
                                    for ($x = 0; $x < $i; $x++) {
                                    ?>
                                        <div class="carousel-item <?php echo ($x == 0) ? 'active' : '' ?>">
                                            <img class="d-block w-100" src="<?php echo $nombres[$x] ?>" alt="First slide">
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </div>

                                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>

</section>

<?php require_once('vistas/footer.php') ?>