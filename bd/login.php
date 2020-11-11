<?php
session_start();
    include_once 'conexion.php';
    $objeto=new conn();
    $conexion=$objeto->connect();
//recepcion de los datos en el medodo post desde ajax code 
$usuario=(isset($_POST['usuario'])) ? $_POST['usuario'] : '';
$password=(isset($_POST['password'])) ? $_POST['password'] : '';

$pass=md5($password);
$consulta="SELECT * FROM w_usuario where username='$usuario' AND password='$pass'";
$resultado=$conexion->prepare($consulta);
$resultado->execute();

if ($resultado->rowCount() >=1){
    $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
    $_SESSION['s_usuario']=$usuario;
    foreach ($data as $row){
        
        $_SESSION['s_id_usuario'] = $row['id_usuario'];
        $_SESSION['s_nombre'] = $row['nombre'];
        $_SESSION['s_rol']=$row ['rol_usuario'];
    }
    

}
else{
    $_SESSION['s_id_usuario']=null;
    $_SESSION['s_usuario']=null;
    $_SESSION['s_nombre'] = null;
    $_SESSION['s_rol']=$row =null;
    $data=null;
}
print json_encode($data);
$conexion=null;
