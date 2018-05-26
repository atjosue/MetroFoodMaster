<?php 

	require_once'../model/Usuario.php';
	require_once'../model/Cliente.php';

	if (isset($_POST['key'])) {

		$dec = $_POST['key'];
		
		switch ($dec) {

			case 'sesion':
					login();

				break;

			case 'finduser':
					verificar();
				break;
			case 'agregarRestaurante':
					agregarRestaurante();
				break;

			case 'first':
				primeraVez();
				break;

			default:
				
				break;
		}
		
	}

	 function login(){

	 	$data = json_decode($_POST['dataLogin']);

	 	$ObjUsuario = new Usuario();
	 	
		$user = $data[0]->value;
		
		$pass2 = $ObjUsuario->encriptar($data[1]->value);

		$res = $ObjUsuario->logear($user,$pass2);

		echo $res;

	};

	function verificar(){
		
		$user = $_POST['usuario'];
		
		$ObjUsuario = new Usuario();

		$data = $ObjUsuario->finduser($user);

		echo $data;
	}

	function agregarRestaurante(){

			$info = json_decode($_POST['dataUsuario']);

			$objUsuario =  new Usuario();
			
			$objUsuario->setUsuario($info[0]->value);
			$objUsuario->setPass($info[1]->value);
			$objUsuario->setFechaCreacionUsuario(date('y-m-d'));
			$objUsuario->setFechaModificacionUsuario(date('y-m-d'));
				
			$res=$objUsuario->agregarUsuarioRestaurante();

			echo $res;
		}
	function primeraVez(){
		$objUsuario= new Usuario();
		$res=$objUsuario->primeraVez();
		echo $res;
	}
	
 ?>