<?php
include_once 'conexion.php';

class Visitante extends conn{
    private $nombre;
    private $ine;
    private $licencia;
    private $pasaporte;
    private $otro;
    private $foto;

    public function getNombre(){
        return $this->nombre;
    }
    public function getIne(){
        return $this->ine;
    }
    public function GetLicencia(){
        return $this->licencia;
    }
    public function getPasaporte(){
        return $this->pasaporte;
    }
    public function getOtro(){
        return $this->otro;
    }
    
    public function getFoto(){
        return $this->foto;
    }

    public function buscarVisitante($id){
        $query = $this->connect()->prepare('SELECT * FROM visitante where id=:id order by id');
        
        if ($query->execute(['id' => $id])){
            foreach ($query as $currentUser) {
                $this->nombre = $currentUser['nombre'];
                $this->ine = $currentUser['ine'];
                $this->licencia = $currentUser['licencia'];
                $this->pasaporte = $currentUser['pasaporte'];
                $this->otro = $currentUser['otro'];
                $this->foto = $currentUser['foto'];
            }    
            return true;
            }
            else{
                $this->nombre = "";
                $this->ine = "";
                $this->licencia = "";
                $this->pasaporte = "";
                $this->otro = "";
                $this->foto = "";
                return false;
            }

        
    }

   
   

    

    public function saveVisitante($nombre,$ine,$licencia,$pasaporte,$otro,$foto){
        if(!empty($nombre) && (!empty($ine) || !empty($licencia) || !empty($pasaporte) || !empty($otro))){
            $sql="INSERT INTO visitante (nombre,ine,licencia,pasaporte,otro,foto) values(:nombre,:ine,:licencia,:pasaporte,:otro,:foto)";
            $stmt=$this->connect()->prepare("$sql");
            $stmt->bindParam(':ine',$ine);
            $stmt->bindParam(':nombre',$nombre);
            $stmt->bindParam(':licencia',$licencia);
            $stmt->bindParam(':pasaporte',$pasaporte);
            $stmt->bindParam(':otro',$otro);
            $stmt->bindParam(':foto',$foto);
            
            if ($stmt->execute()){
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

public function actVisitante($id,$nombre,$ine,$licencia,$pasaporte,$otro,$foto){
    if(!empty($nombre) && (!empty($ine) || !empty($licencia) || !empty($pasaporte) || !empty($otro)) ){
        $sql="Update visitante SET  nombre= :nombre, ine= :ine, licencia= :licencia, pasaporte= :pasaporte, otro= :otro, foto= :foto where id= :id";
        $stmt=$this->connect()->prepare("$sql");
        $stmt->bindParam(':id',$id);
        $stmt->bindParam(':ine',$ine);
        $stmt->bindParam(':nombre',$nombre);
        $stmt->bindParam(':licencia',$licencia);
        $stmt->bindParam(':pasaporte',$pasaporte);
        $stmt->bindParam(':otro',$otro);
        $stmt->bindParam(':foto',$foto);
        
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
