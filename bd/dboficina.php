<?php
include_once 'conexion.php';

class Oficina extends conn{
    private $nom_oficina;
    
    private $titular_oficina;
   

    public function getnom_oficina(){
        return $this->nom_oficina;
    }
   
    public function Gettitular_oficina(){
        return $this->titular_oficina;
    }
   
    
   

    public function buscarOficina($id){
        $query = $this->connect()->prepare('SELECT * FROM oficina where id_oficina=:id order by id_oficina');
        
        if ($query->execute(['id' => $id])){
            foreach ($query as $currentUser) {
                $this->nom_oficina = $currentUser['nom_oficina'];
              
                $this->titular_oficina = $currentUser['titular_oficina'];
                
            }    
            return true;
            }
            else{
                $this->nom_oficina = "";
               
                $this->titular_oficina = "";
               
                return false;
            }

        
    }

   
   

    

    public function saveOficina($nom_oficina,$titular_oficina){
        if(!empty($nom_oficina) && !empty($titular_oficina) ){
            $sql="INSERT INTO oficina (nom_oficina,titular_oficina) values(:nom_oficina,:titular_oficina)";
            $stmt=$this->connect()->prepare("$sql");
            
            $stmt->bindParam(':nom_oficina',$nom_oficina);
            $stmt->bindParam(':titular_oficina',$titular_oficina);
            
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

public function actOficina($id,$nom_oficina,$titular_oficina){
    if(!empty($nom_oficina) &&  !empty($titular_oficina)  ){
        $sql="Update oficina SET  nom_oficina= :nom_oficina,  titular_oficina= :titular_oficina where id_oficina= :id";
        $stmt=$this->connect()->prepare("$sql");
        $stmt->bindParam(':id',$id);
       
        $stmt->bindParam(':nom_oficina',$nom_oficina);
        $stmt->bindParam(':titular_oficina',$titular_oficina);
      
        
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
