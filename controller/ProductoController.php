<?php 
require_once '../model/Producto.php';

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
	

 ?>
