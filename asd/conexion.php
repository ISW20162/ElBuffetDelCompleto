<?php

class conexion{

	private $conexion;
	private $server ;
	private $user;
	private $password ;
	private $db ;
	private $usuario;
	private $contrasena;
    
    public function __construct($serverDB,$userDB,$passwordDB,$bdDB){
        $this->server=$serverDB;
        $this->user=$userDB;
        $this->password=$passwordDB;
        $this->db=$bdDB;
		$this->conexion = new mysqli($this->server, $this->user, $this->password, $this->db);
        
		if($this->conexion->connect_errno){
			die("Fallo al tratar de conectar con MySQL: (". $this->conexion->connect_errno.")");
		}
        
	}
    
    public function cerrar(){
		$this->conexion->close();
	}
    
    
    public function login($usuario, $contrasena){

		$this->usuario = $usuario;
		$this->contrasena = $contrasena;
        
        $query="SELECT * FROM usuario WHERE usuario='$usuario' and clave='$contrasena'";
        
        
        $resultado=mysqli_query($this->conexion,$query);
        
        $filas=mysqli_num_rows($resultado);
        
        
		if($filas>0){
            return true;
		}else
            return false;
			
    }
    
    public function getID($usuario, $contrasena){
        
        $query="SELECT * FROM usuario WHERE usuario='$usuario' and clave='$contrasena'";   
        $resultado=mysqli_query($this->conexion,$query);
        $filas=$resultado->fetch_array();            
        return $filas['id_us'];
        
    }
    
     public function getTipo($id_us){
         
        $query="SELECT tipo FROM usuario WHERE id_us='".$id_us."'";   
        $resultado=mysqli_query($this->conexion,$query);
        $filas=$resultado->fetch_array();            
        return $filas['tipo'];
    }
    
    public function getNombre($id_us){
         
        $empleado=$this->getEmpleado($id_us);
        $query="SELECT nombre FROM empleado WHERE id_emp='".$empleado."'";
        $resultado=mysqli_query($this->conexion,$query);
        $filas=$resultado->fetch_array();        
        return $filas['nombre'];  
        
    }
    private function getEmpleado($id_us){
        $query="SELECT es_el_empleado FROM usuario WHERE id_us='".$id_us."'";
        $resultado=mysqli_query($this->conexion,$query);
        $filas=$resultado->fetch_array(); 
        return $filas['es_el_empleado'];          
    }
    
}

?>