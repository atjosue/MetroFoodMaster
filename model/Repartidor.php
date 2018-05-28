<?php 
 require_once 'Conexion.php';
class Repartidor
{
	protected $idRepartidor;
	protected $idUsuario;
	protected $nombreRepartidor;
	protected $direccionRepartidor;
	protected $estadoDelRepartidor;
	protected $fechaCreacion;
	protected $fechaModificasion;


	function __construct()
	{
		
	}
	public function getIdRepartidor(){
	    	return $this->idRepartidor;
	}
	public function setIdRepartidor($idRepartidor){
	    	$this->idRepartidor = $idRepartidor;
	}
	public function getIdUsario(){
	    	return $this->idUsario;
	}
	public function setIdUsario($idUsario){
	    	$this->idUsario = $idUsario;
	}
	public function getNombreRepartidor(){
	    	return $this->nombreRepartidor;
	}
	public function setNombreRepartidor($nombreRepartidor){
	    	$this->nombreRepartidor = $nombreRepartidor;
	}
	public function getDireccionRepartidor(){
	    	return $this->direccionRepartidor;
	}
	public function setDireccionRepartidor($direccionRepartidor){
	    	$this->direccionRepartidor = $direccionRepartidor;
	}
	public function getEstadoRepartidor(){
	    	return $this->estadoRepartidor;
	}
	public function setEstadoRepartidor($estadoRepartidor){
	    	$this->estadoRepartidor = $estadoRepartidor;
	}
	public function getFechaCreacion(){
	    	return $this->fechaCreacion;
	}
	public function setFechaCreacion($fechaCreacion){
	    	$this->fechaCreacion = $fechaCreacion;
	}
	public function getFechaModificacion(){
	    	return $this->fechaModificacion;
	}
	public function setFechaModificacion($fechaModificacion){
	    	$this->fechaModificacion = $fechaModificacion;
	}
	
	public function getAllRepartidor()
    {
    	$objCon = new Conexion();
    	$con = $objCon->conectar();
    	session_start();
      	

        $sqlAll = "SELECT * from repartidor WHERE estadoRepartidor = 1 && idUsuario='".$_SESSION['IDUSUARIO']."' ";
        
        $info = $con->query($sqlAll);
        if ($info->num_rows>0) {
            
            $dato = $info;
        }else{

            $dato = false;
        }
       
        return $dato;
    }


}


 ?>