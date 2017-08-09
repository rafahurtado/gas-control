<div>
	<h3>Listado de empresas</h3>
</div>

<?php 
//var_dump($empresas);
foreach ($empresas as $empresa) {
	# code...
	 ?>
	 <div><a href="?empresa=<?php echo $empresa['idempresa']; ?>"><?php echo $empresa['nombre']; ?></a></div>
	 <?php	
}

 ?>
