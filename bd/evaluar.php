<?php
include_once 'conexion.php';
$objeto = new conn();
$conexion = $objeto->connect();

// Recepción de los datos enviados mediante POST desde el JS   


$id = (isset($_POST['id'])) ? $_POST['id'] : '';

$eval = (isset($_POST['eval'])) ? $_POST['eval'] : '';

echo $id;
echo "<br>";
echo $eval;

//$consulta = "SELECT * FROM evalgeneral where id_alumno='" . $id . "' and id_nivel='" . $id_nivel . "' and id_etapa='" . $id_etapa . "'";
//$resultado = $conexion->prepare($consulta);
//$resultado->execute();
//$data = $resultado->fetchAll(PDO::FETCH_ASSOC);
$data=$id." ". $eval;

print json_encode($data, JSON_UNESCAPED_UNICODE);
$conexion = NULL;
?>