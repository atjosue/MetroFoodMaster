<?php 
	require_once 'Conexion.php';
	class Producto
	{

		private $idProducto;
		private $nombreProducto;
		private $descripcionProducto;
		private $precioProducto;
		private $estado;
		private $fechaCreacion;
		private $fechaModificacion;
		private $idRestaurante;
		private $img;


		function __construct()
		{
			
		}

		public function getIdProducto(){
		    	return $this->idProducto;
		}
		public function setIdProducto($idProducto){
		    	$this->idProducto = $idProducto;
		}

		public function getNombreProducto(){
		    	return $this->nombreProducto;
		}
		public function setNombreProducto($nombreProducto){
		    	$this->nombreProducto = $nombreProducto;
		}

		public function getDescripcionProducto(){
		    	return $this->descripcionProducto;
		}
		public function setDescripcionProducto($descripcionProducto){
		    	$this->descripcionProducto = $descripcionProducto;
		}

		public function getPrecioProducto(){
		    	return $this->precioProducto;
		}
		public function setPrecioProducto($precioProducto){
		    	$this->precioProducto = $precioProducto;
		}

		public function getEstado(){
		    	return $this->estado;
		}
		public function setEstado($estado){
		    	$this->estado = $estado;
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
	
		public function getImg()
		{
		    return $this->img;
		}
		
		public function setImg($img)
		{
		    $this->img = $img;
		    return $this;
		}

		public function getId()
		{
		    return $this->idRestaurante;
		}
		
		public function setId($idRestaurante)
		{
		    $this->idRestaurante = $idRestaurante;
		    return $this;
		}

		public function getAll()
    {
    	
    	$objCon = new Conexion();
    	$con = $objCon->conectar();

    	
    	$sql1="select idRestaurante as id from restaurante where idUsuario ='".$_SESSION['IDUSUARIO']."' ";

    	$infa=$con->query($sql1);
    	$data=$infa->fetch_assoc();

        $sqlAll = "SELECT * from combo WHERE estadoCombo = '1' && idRestaurante='".$data['id']."'";  

        $info = $con->query($sqlAll);

        if ($info->num_rows>0) {
            
            $dato = $info;
        }else{

            $dato = false;
        }

        return $dato;
    }

    public function productoParametro($var){

    		$objCon = new Conexion();
    	$con = $objCon->conectar();

    	  $sqlAll = "SELECT * from combo WHERE estadoCombo = '1' && idRestaurante='".$var."'";  

	        $info = $con->query($sqlAll);

	        if ($info->num_rows>0) {
	            
	            $dato = $info;
	        }else{

	            $dato = false;
	        }

	        return $dato;
    }

    public function agregarProducto(){

		$objCon = new Conexion();
    	$con = $objCon->conectar();

		session_start();
		$sql1="select idRestaurante as id from restaurante where idUsuario ='".$_SESSION['IDUSUARIO']."' ";	

		$info = $con->query($sql1);
		$data =  $info->fetch_assoc();

		$this->idRestaurante = $data['id'];
		

    	$sql2 = "INSERT INTO `metrofooddb`.`combo` (`nombreCombo`, `descripcionCombo`, `precioCombo`, `estadoCombo`, `fechaCreacionCombo`, `fechaModificacionCombo`, `idRestaurante`, `img`) VALUES ('".$this->nombreProducto."', '".$this->descripcionProducto."', '".$this->precioProducto."', '".$this->estado."', '".$this->fechaCreacion."', '".$this->fechaModificacion."', '".$this->idRestaurante."', '".$this->img."');";
    	

    	$res=$con->query($sql2);

    	
    	return $res;
    } 

    public function traerCombo($id){

    	$objCon = new Conexion();
    	$con = $objCon->conectar();

    	$sql = "SELECT * FROM combo where idCombo='".$id."';";

    	$info = $con->query($sql);
    	$data = $info->fetch_assoc();
    		return json_encode($data);
    }
}


 ?>