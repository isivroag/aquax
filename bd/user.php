<?php
include_once 'conexion.php';

class User extends conn{
    private $nombre;
    private $username;
    private $email;
    private $password;
    private $rol;

    public function getNombre(){
        return $this->nombre;
    }
    public function getUsername(){
        return $this->username;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getPassword(){
        return $this->password;
    }
    public function getRol(){
        return $this->rol;
    }
    
    public function userExists($user, $pass){
        
        $query = $this->connect()->prepare('SELECT * FROM w_usuario WHERE username = :user');
        $query->execute(['user' => $user]);
        
        
    if ($query->rowCount()) { // Record found.
        foreach ($query as $currentUser) {
            
            $hash = $currentUser['password'];
        }

        // Compare the posted password with the password hash fetched from db.
        if (password_verify($pass, $hash)) {
           return true;
        } else {
           return false;
        }
    } else {
        return false;
    }
    }

    public function buscarUser($id){
        $query = $this->connect()->prepare('SELECT w_usuario.id_usuario, w_usuario.nombre,w_usuario.username,w_usuario.password, w_usuario.email, rol.rol FROM w_usuario join rol on w_usuario.rol_usuario=rol.id where w_usuario.id_usuario=:id order by w_usuario.id_usuario');
        
        if ($query->execute(['id' => $id])){
            foreach ($query as $currentUser) {
                $this->nombre = $currentUser['nombre'];
                $this->username = $currentUser['username'];
                $this->email = $currentUser['email'];
                $this->password = $currentUser['password'];
                $this->rol = $currentUser['rol'];
            }    
            return true;
            }
            else{
                $this->nombre = "";
                $this->username = "";
                $this->mail = "";
                $this->password ="";
                $this->rol = "";
                return false;
            }

        
    }

   
    public function setUser($user){
        $query = $this->connect()->prepare('SELECT * FROM w_usuario WHERE username = :user');
        $query->execute(['user' => $user]);
        
        foreach ($query as $currentUser) {
            $this->nombre = $currentUser['nombre'];
            $this->username = $currentUser['username'];
        }
    }

    

    public function saveUser($nombre,$username,$email,$password,$rol){
        if(!empty($username)  && !empty($nombre) && !empty($email) && !empty($password) && !empty($rol)){
            $sql="INSERT INTO w_usuario (username,nombre,email,password,rol_usuario) values(:username,:nombre,:email,:password,:rol)";
            $stmt=$this->connect()->prepare("$sql");
            $stmt->bindParam(':username',$username);
            $stmt->bindParam(':nombre',$nombre);
            $stmt->bindParam(':email',$email);
            $passwordh=md5($password);
            $stmt->bindParam(':password',$passwordh);
            $stmt->bindParam(':rol',$rol);
            
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

public function actUser($id,$nombre,$username,$email,$password,$rol){
    if(!empty($id) && !empty($username)  && !empty($nombre) && !empty($email) && !empty($password) && !empty($rol)){
        $sql="Update w_usuario SET username= :username, nombre= :nombre, email= :email, password= :passwordh, rol_usuario= :rol where id_usuario= :id";
        $stmt=$this->connect()->prepare("$sql");
        $stmt->bindParam(':id',$id);
        $stmt->bindParam(':username',$username);
        $stmt->bindParam(':nombre',$nombre);
        $stmt->bindParam(':email',$email);
        $passwordh=md5($password);
        $stmt->bindParam(':passwordh',$passwordh);
        $stmt->bindParam(':rol',$rol);
        
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
