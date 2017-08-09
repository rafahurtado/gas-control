<?php 
$id = 0;
$email = "";
$nombre = "";
$fecha_alta = "";
$fecha_reg = "";
$empresa = -1;
/*<?php echo $idempresa; ?>*/

if (isset($usuario)) {
	
	$id = $usuario['id'];
	$email = $usuario['email'];
	$nombre = $usuario['nombre'];
	$fecha_alta = $usuario['fecha_alta'];
	$fecha_reg = $usuario['fereg'];
	$empresa = $usuario['idempresa'];
}
//var_dump($_POST);
?>

<div><a href="?empresa=<?php echo $empresa; ?>"> Volver al listado</a></div><hr/>

 <form action="?usuario=<?php echo $idusuario; ?>" method="post">
 	<div>
 		<input type="hidden" name="id" value="<?php echo $id; ?>">
 	</div>
 	<div><strong>Email</strong></div>
 	<div><input type="text" name="email" id="email" value="<?php echo $email; ?>"></div>
 	<br/>
 	<div><strong>Nombre</strong></div>
 	<div><input type="text" id="nombre" name="nombre" value="<?php echo $nombre; ?>"></div>
 	<br/>
 	<div><strong>Fecha de alta</strong></div>
 	<div><?php echo $fecha_alta; ?></div>
 	<br/>
 	<div><strong>Fecha de último registro</strong></div>
 	<div><?php echo $fecha_reg; ?></div>
 	<br/>
 	<input type="submit" value="Guardar">
 </form>