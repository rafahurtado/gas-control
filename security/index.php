<?php $titulo = 'Seguridad de GAS CONTROL';	?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo $titulo; ?></title>
	<link rel="stylesheet" href="">
</head>
<body>
	<div>
		<h1><?php echo $titulo; ?></h1>
		<hr/>
	</div>
	<?php require 'controller.php'; ?>
	
	
	<div><?php require $vista; ?></div>
</body>
</html>
