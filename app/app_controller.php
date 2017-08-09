<?php 
	// modelo por defecto
	if(!isset($modelo)){
		$modelo = 'home';
	}

	$views_path = 'app/pages/';
	$controller_path = 'app/controllers/';
	$models_path = 'app/models/';

	//** inicializamos el acceso a datos
	require 'app/data/db.php';


	switch ($modelo) {
		case 'value':
			# code...
			break;

		case 'cliente':
			# code...
			$controlador = 'cliente_controller.php';

			break;

		case 'home':
		default:
			# code...
			$controlador = 'dashboard_controller.php';
			$vista = 'inicio/dashboard.phtml';
			break;
	}

	require $controller_path . $controlador;

	$vista = $views_path . $vista;
	require_once $views_path . 'layout.phtml';

 ?>