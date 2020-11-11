<?php
include_once 'conexion.php';
$objeto = new conn();
$conexion = $objeto->connect();

// Recepción de los datos enviados mediante POST desde el JS   

$nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : '';
$ine = (isset($_POST['ine'])) ? $_POST['ine'] : '';
$licencia = (isset($_POST['licencia'])) ? $_POST['licencia'] : '';
$pasaporte = (isset($_POST['pasaporte'])) ? $_POST['pasaporte'] : '';
$otro = (isset($_POST['otro'])) ? $_POST['otro'] : '';
$id = (isset($_POST['id'])) ? $_POST['id'] : '';

$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';

switch ($opcion) {
    case 1: //alta
        $consulta = "INSERT INTO visitante (nombre, ine, licencia, pasaporte, otro) VALUES('$nombre', '$ine', '$licencia','$pasaporte','$otro') ";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();

        $consulta = "SELECT id, nombre, ine, licencia, pasaporte, otro FROM visitante ORDER BY id DESC LIMIT 1";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 2: //modificación
        $consulta = "UPDATE visitante SET nombre='$nombre', ine='$ine', licencia='$licencia', pasaporte='$pasaporte', otro='$otro' WHERE id='$id' ";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();

        $consulta = "SELECT id, nombre, ine, licencia, pasaporte, otro FROM visitante WHERE id='$id' ";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 3: //baja
        $consulta = "DELETE FROM w_usuario WHERE id_usuario='$id' ";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        break;
    case 4:
        $consulta = "SELECT * FROM visitante";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
}

print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
$conexion = NULL;