<?php 
require_once '../model/Producto.php';
require_once '../model/Carrito.php';

if (isset($_POST['key'])) {
	$key = $_POST['key'];

		switch ($key) {
			case 'agregar':
				agregar();
				break;
			case 'imagen':
				verificarImagen();
				break;
			case 'hora':
				obtenerHora();
				break;
			case 'Acarrito':
				Acarrito();
				break;
			case 'traerCombo':
				traerCombo();
				break;
			
			default:
				
				break;
		}
}
// fin del isset

function agregar(){
	$objProducto = new Producto();

	$info=$_POST['dataProducto'];
	$dataProducto = json_decode($info);
	
	$objProducto->setNombreProducto($dataProducto[0]->value);
	$objProducto->setPrecioProducto($dataProducto[1]->value);
	$objProducto->setImg($dataProducto[2]->value);
	$objProducto->setDescripcionProducto($dataProducto[3]->value);
	$objProducto->setFechaCreacion(date('y-m-d'));
	$objProducto->setFechaModificacion(date('y-m-d'));
	$objProducto->setEstado('1');

	$res =$objProducto->agregarProducto();
	echo $res;
}

function verificarImagen(){
	$nombre =$_POST['nombre'];
	$link = '../imagenes/img/'.$nombre;

	$op = 0;

	if (file_exists($link)) {
	    unlink($link);
	    $op = 1;
	} else {
		    
	}
	echo $op;
	
	}

	function obtenerHora(){
		echo date('ymdgis');
	}

	function Acarrito(){


		$objCarrito = new Carrito();

		$info=$_POST['formDatos'];
		$dataProd = json_decode($info);

		$objCarrito->setPrecio($dataProd[0]->value);
		$objCarrito->setIdCombo($dataProd[1]->value);
		$objCarrito->setNombreCombo($dataProd[2]->value);
		

		$res=$objCarrito->agregarCombo();

		

		echo $res;


	} 

	function traerCombo(){
		$id = $_POST['idUsuario'];

		$objProducto =  new Producto();
		$data=$objProducto->traerCombo($id);
		
		echo $data;
	}
	

 ?>
