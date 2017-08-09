<?php 

require_once $models_path . 'dashboard_model.php';

$modelo = new dashboard_model();
$hola = $modelo->sayHello();




?>