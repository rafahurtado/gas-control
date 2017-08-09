<?php 

if(!session_id()){
	session_start();
	//echo 'inicia sesion';
}

$_SESSION['empresa'] = array();
$_SESSION['empresa']['id'] = 1;

if(!isset($_SESSION['hora'])) $_SESSION['hora']=getdate();

if(session_id()){
	//session_destroy();
	//unset($_SESSION['empresa']);
	//echo 'cerrar sesion';
}

if(session_id()){
	//session_start();
	echo "sesion iniciada";
}else echo "sesion cerrada";


if(isset($_SESSION['hora'])) {
	//var_dump($_SESSION['hora']);

	//$interval = date_diff(getdate(), $_SESSION['hora'][0]);
	//$interval = $_SESSION['hora']->date_diff(getdate());
	//$interval = getdate();

	//print_r($interval);
}
/*
echo session_id().'<br/>';
session_destroy();
session_start();
session_regenerate_id();
echo session_id().'<br/>';
*/

require '../app/data/db.php';
require 'modelo.php';

$model_usuario = new usuario_model();
$model_empresa = new empresa_model();


if (isset($_GET["empresa"])) {
	$id = $_GET["empresa"];
	$empresa = $model_empresa->get($id);
	//$subtitulo = $empresa['nombre'];
	//var_dump($empresa);

	$usuarios = $model_usuario->getAll($id);
	//var_dump($usuarios);

	$vista = 'pages/usuarios.php';

}
else if (isset($_GET["usuario"])) {

	$idusuario = $_GET["usuario"];
	$usuario = $model_usuario->get($idusuario);

	var_dump($_POST);
	if(count($_POST)>0 ){
		//var_dump($_POST);
		$idusuario = $_POST['id'];
		$nombre = $_POST['nombre'];
		$email = $_POST['email'];

		//echo 'aca post ' . $idusuario ;
		$usuario['id'] = $idusuario;
		$usuario['email'] = $email;
		$usuario['nombre'] = $nombre;

		$querys = array();
		if($idusuario==0){
			$model_usuario->create($usuario);
		}else {
			$model_usuario->update($usuario);
		}

		var_dump($querys);
		echo 'resultado: '. execute($querys);

	}else{

		
		
		//var_dump($usuario);
		
		$vista = 'pages/usuario_edit.php';
	}
}else{
	$subtitulo = 'Listado de empresas';
	$empresas = $model_empresa->getAll();
	$vista = 'pages/empresas.php';
}




 ?>