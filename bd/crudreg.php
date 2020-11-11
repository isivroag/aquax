<?php
include_once 'conexion.php';
$objeto = new conn();
$conexion = $objeto->connect();

// Recepción de los datos enviados mediante POST desde el JS   


$id = (isset($_POST['id'])) ? $_POST['id'] : '';

$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
//$time = time();
//$salida = date("Y-m-d H:i:s", $time);
date_default_timezone_set('America/Mexico_City');
$salida=date('Y-m-d H:i:s');;
switch ($opcion) {
    case 1: //alta

        break;
    case 2: //modificación

        break;
    case 3: //baja
        $consulta = "update registro set estado='2', salida='$salida' WHERE id_registro='$id'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();

       // $consulta = "SELECT registro.id_registro,registro.id_visitante,visitante.nombre,registro.id_oficina,oficina.nom_oficina,registro.entrada 
        //    FROM registro join visitante on registro.id_visitante=visitante.id 
         //   join oficina on registro.id_oficina=oficina.id_oficina where registro.id_registro='$id' and registro.estado=1 order by id_registro";


       
        //$resultado = $conexion->prepare($consulta);
        //$resultado->execute();
        //$data = $resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 4:

        break;
}

print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
$conexion = NULL;
