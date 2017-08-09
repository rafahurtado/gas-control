<?php 	
	require_once $models_path . 'cliente_model.php';

	$modelo = new cliente_model();


	if(!isset($action)){
		$action = 'listar';
	}

	switch ($action) {
		case 'listar':
			$clientes = $modelo->getAll();
			$vista = 'listado.php';
			break;

		case 'value':
			# code...
			break;
		
		default:
			# code...
			break;
	}

	$vista = 'clientes/'.$vista;

 ?>