<div><a href="?"> Volver al listado</a></div><hr/>
<table border="1" cellspacing="0" cellpadding="3" width="75%">
	<caption><h3>
			<?php if (isset($empresa['nombre'])) {
				echo $empresa['nombre']; 
			}?>				
			</h3></caption>
	<thead>
		<tr>
			<th>Nombre</th>
			<th>Email</th>
			<th>Perfil</th>
			<th>Fecha de alta</th>
			<th></th>
			<th></th>
			<th></th>
		</tr>
	</thead>
	<tbody>	
			
<?php 
foreach ($usuarios as $usuario) {
	echo '<tr align="center">';
	echo '<td>'.$usuario['nombre'] .'</td>';
	echo '<td>'.$usuario['email'].'</td>';
	echo '<td>'.$usuario['perfil'].'</td>';
	echo '<td>'.$usuario['fecha_alta'].'</td>';
	echo '<td><a href="?usuario='. $usuario['id'] .'">Editar usuario</a></td>';
	echo '<td><a href="?usuario='. $usuario['id'] .'&action=set_password">Editar password</a></td>';
	echo '<td><a href="?usuario='. $usuario['id'] .'&action=inactive">Inactivar usuario</a></td>';
}
 ?>

	</tbody>
</table> 
<br/>
<div><a href="?usuario=0">Nuevo usuario</a></div>