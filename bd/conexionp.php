<?php
    class conn{
    
    private $servidor   ="localhost";
    private $bd_nombre="tec-controlvisitas";
    private $usuario  ="root";
    private $password     ="tecniem";

    public $conexion;
        function connect(){
            
            
            

            $opciones=array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');

            try{
                $conexion=new PDO("mysql:host=".$this->servidor.";dbname=".$this->bd_nombre, $this->usuario,$this->password, $opciones);
                return $conexion;
            }catch(Exception $e){
                return 0;
            }
        }
    }
?>