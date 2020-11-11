<?php
include_once 'conexion.php';

class Alumno extends conn{
    private $nom_alumno;
    private $id_nivel;
    private $nom_nivel;
    private $nacimiento;
    private $edad;
    private $sexo;
    private $obs;
    private $id_sub;
    private $id_etapa;

    public function getnom_alumno(){
        return $this->nom_alumno;
    }
    public function getid_nivel(){
        return $this->id_nivel;
    }
    public function Getnom_nivel(){
        return $this->nom_nivel;
    }
    public function getnacimiento(){
        return $this->nacimiento;
    }
    public function getedad(){
        return $this->edad;
    }
    
    public function getsexo(){
        return $this->sexo;
    }

    public function getobs(){
        return $this->obs;
    }

    public function getid_sub(){
        return $this->id_sub;
    }

    public function getid_etapa(){
        return $this->id_etapa;
    }

    public function buscar($id){
        $query = $this->connect()->prepare('SELECT alumno.id_alumno,alumno.nombre,alumno.id_tgpo,alumno.id_sub,alumno.id_nivel,alumno.nacimiento,alumno.edad,nivel.nivel as nomnivel ,alumno.sexo,alumno.obs,vdatosevaluacion.id_etapa 
        from alumno join nivel on alumno.id_nivel=nivel.id_nivel join vdatosevaluacion on alumno.id_alumno=vdatosevaluacion.id_alumno where alumno.id_alumno=:id order by alumno.id_alumno');
        
        if ($query->execute(['id' => $id])){
            foreach ($query as $currentUser) {
                $this->nom_alumno = $currentUser['nombre'];
                $this->id_nivel = $currentUser['id_nivel'];
                $this->nom_nivel = $currentUser['nomnivel'];
                $this->nacimiento = $currentUser['nacimiento'];
                $this->edad = $currentUser['edad'];
                $this->sexo = $currentUser['sexo'];
                $this->id_sub = $currentUser['id_sub'];
                $this->obs = $currentUser['obs'];
                $this->id_etapa = $currentUser['id_etapa'];
            }    
            return true;
            }
            else{
                $this->nom_alumno = "";
                $this->id_nivel = "";
                $this->nom_nivel = "";
                $this->nacimiento = "";
                $this->edad = "";
                $this->sexo = "";
                $this->id_sub ="";
                $this->obs = "";
                $this->id_etapa = "";

                return false;
            }

        
    }

   
   

    

  
 

}

