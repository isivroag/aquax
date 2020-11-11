<?php
include_once 'conexion.php';

class Registro extends conn{
    private $id_visitante;
    private $id_oficina;
    private $asunto;
    private $entrada;
    private $salida;
    private $estado;
    private $id_usuario;


    public function g_id_visitante(){
        return $this->id_visitante;
    }
    public function g_id_oficina(){
        return $this->id_oficina;
    }
    public function g_asunto(){
        return $this->asunto;
    }
    public function g_entrada(){
        return $this->entrada;
    }
    public function g_salida(){
        return $this->salida;
    }
    public function g_estado(){
        return $this->estado;
    }
    public function g_id_usuario(){
        return $this->id_usuario;
    }
   
 
   

    

    public function salva_registro($id_visitante,$id_oficina,$asunto,$entrada,$id_usuario){
        if(!empty($id_visitante) && !empty($id_oficina) && !empty($asunto) && !empty($entrada) && !empty($id_usuario)){
            $sql="INSERT INTO registro (id_visitante,id_oficina,asunto,entrada,id_usuario) values(:id_visitante,:id_oficina,:asunto,:entrada,:id_usuario)";
            $stmt=$this->connect()->prepare("$sql");
            $stmt->bindParam(':id_visitante',$id_visitante);
            $stmt->bindParam(':id_oficina',$id_oficina);
            $stmt->bindParam(':asunto',$asunto);
            $stmt->bindParam(':entrada',$entrada);
            $stmt->bindParam(':id_usuario',$id_usuario);
            
            if ($stmt->execute()){
            return "Exitoso";
            }
            else{
                return $stmt->errorCode();
            }
        }
    else{
        return "falta datos";
    }
}

public function actVisitante($id,$salida){
    if(!empty($id) && !empty($salida) ){
        $sql="Update registro SET  estado= :estado, salida= :salida where id_registro= :id_registro";
        $stmt=$this->connect()->prepare("$sql");
        $stmt->bindParam(':id_registro',$id);
        $estado=2;
        $stmt->bindParam(':estado',$estado);
        $stmt->bindParam(':salida',$salida);

        
        if ($stmt->execute() ) {
        return true;
        }
        else{
            return false;
        }
    }
else{
    return false;
}
}
}
