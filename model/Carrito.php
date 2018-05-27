<?php 
require_once'Conexion.php';


class Carrito
{
	
	private $nombreCombo;
	private $cantidad;
	private $precio;
	private $idCliente;
	private $idCombo;


	function __construct()
	{
		
	}

	public function getNombreCombo()
	{
	    return $this->nombreCombo;
	}
	
	public function setNombreCombo($nombreCombo)
	{
	    $this->nombreCombo = $nombreCombo;
	    return $this;
	}

	public function getCantidad()
	{
	    return $this->cantidad;
	}
	
	public function setCantidad($cantidad)
	{
	    $this->cantidad = $cantidad;
	    return $this;
	}

	public function getPrecio()
	{
	    return $this->precio;
	}
	
	public function setPrecio($precio)
	{
	    $this->precio = $precio;
	    return $this;
	}

	public function getIdCliente()
	{
	    return $this->idCliente;
	}
	
	public function setIdCliente($idCliente)
	{
	    $this->idCliente = $idCliente;
	    return $this;
	}

	public function getIdCombo()
	{
	    return $this->idCombo;
	}
	
	public function setIdCombo($idCombo)
	{
	    $this->idCombo = $idCombo;
	    return $this;
	}
	

	public function agregarCombo(){
		$objCon = new Conexion();
		$con = $objCon->conectar();
		session_start();
		$sql1="select idCliente as id from cliente where idUsuario='".$_SESSION['IDUSUARIO']."'";
		$res=$con->query($sql1);
		$data = $res->fetch_assoc();

			$sql2="INSERT INTO `metrofooddb`.`carrito` (`nombreCombo`, `idCombo`, `cantidad`, `precio`, `idCliente`) VALUES ('".$this->nombreCombo."', '".$idCombo."', '".$this->cantidad."', '".$this->precio."', '".$data['id']."');";
			var_dump($sql2);
			die();

			$res2= $con->query($sql2);
			if ($res2==1) {
				$info=$res2;
			}else{
				$info=null;
			}

			return $info;
	}

	public function extraerCombos(){

		$objCon = new Conexion();
		$con = $objCon->conectar();
		session_start();
		$sql1="select idCliente as id from cliente where idUsuario='".$_SESSION['IDUSUARIO']."'";
		$res=$con->query($sql1);
		$data = $res->fetch_assoc();

			$sql2="SELECT * from carrito where idCliente='".$data['id']."'";
			var_dump($sql2);
			die();

			$res2= $con->query($sql2);
			if ($res2->num_rows>0) {
				$info=$res2;
			}else{
				$info=null;
			}

			return $info;



	}

	public function modificarCantidad(){
		$objCon = new Conexion();
		$con = $objCon->conectar();
		session_start();
		$sql1="select idCliente as id from cliente where idUsuario='".$_SESSION['IDUSUARIO']."'";
		$res=$con->query($sql1);
		$data = $res->fetch_assoc();

		$sql="UPDATE `metrofooddb`.`carrito` SET `cantidad`='".$this->cantidad."' WHERE `idCliente`='".$data['id']."';";

			$res2= $con->query($sql2);
			if ($res2==1) {
				$info=$res2;
			}else{
				$info=null;
			}

			return $info;

	}

	public function deleteCombos(){
		$objCon = new Conexion();
		$con = $objCon->conectar();
		session_start();
		$sql1="select idCliente as id from cliente where idUsuario='".$_SESSION['IDUSUARIO']."'";
		$res=$con->query($sql1);
		$data = $res->fetch_assoc();

			$sql2="DELETE FROM `metrofooddb`.`carrito` WHERE `idCliente`='".$data['id']."';";
			
			$res2= $con->query($sql2);
			if ($res2==1) {
				$info=$res2;
			}else{
				$info=null;
			}

			return $info;

	}


}

?>