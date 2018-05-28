<?php 
	require_once'../model/Carrito.php';
	if (isset($_POST['key'])){
		switch ($_POST['key']) {
			case 'cantidad':
				modificarCantidad();
				break;
			case 'Acarrito':
				Acarrito();
				break;
			case 'subtotal':
				subtotal();
				break;
			case 'total':
				subtotal();
				break;				
			case 'ordenar':
				ordenar();
				break;
			case 'cancelar':
				cancelar();
				break;		
			default:
				
				break;
		}
	}

	function modificarCantidad(){
		$objCarrito = new Carrito();
		$objCarrito->setCantidad($_POST['x']);
		$objCarrito->setIdCombo($_POST['idCombo']);
		$res=$objCarrito->modificarCantidad();
		echo $res;

	}
	function subtotal(){
		$objCarrito = new Carrito();
		$objCarrito->setIdCombo($_POST['idCombo']);
		$res=$objCarrito->subtotal();
		echo $res;
	}
	function total(){
		
	}

	
 ?>