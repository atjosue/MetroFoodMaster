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
	
	public function getAllRepartidor($id)
    {
    	

    	$objCon = new Conexion();
    	$con = $objCon->conectar();
<<<<<<< HEAD
    	session_start();
      	

        $sqlAll = "SELECT * from repartidor WHERE estadoRepartidor = 1 && idUsuario='".$_SESSION['IDUSUARIO']."' ";
        
        $info = $con->query($sqlAll);
        if ($info->num_rows>0) {
            
            $dato = $info;
        }else{
=======
  		
  		$sql1="SELECT idRestaurante AS id from restaurante WHERE idUsuario='".$id."';";
  		$info= $con->query($sql1);
  		
  		$data=$info->fetch_assoc();
 
    	$sqlAll="SELECT r.idRepartidor, r.nombreRepartidor, r.apellidoRepartidor, r.telefono, r.DUI, r.idRestaurante, u.usuario as usuario, u.pass as contra FROM repartidor r INNER JOIN usuario u WHERE r.idUsuario='".$data['id']."' AND u.idUsuario='".$data['id']."';";
    	
       // $sqlAll = "SELECT * from repartidor WHERE estadoRepartidor = 1";
       	
        $info2 = $con->query($sqlAll);
        $data2= $info2->fetch_assoc();
>>>>>>> 3fdb4cccc5725bd853396de6a6890763b1040729

        
       
		      
        return $info2;
    }


}


 ?>