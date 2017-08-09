<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Listado de clientes</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
    <div class="col-lg-12">
        <a href="" class="btn btn-md btn-success">Agregar cliente</a>
    </div>
</div>
<br/>
<?php //var_dump($clientes); ?>

	<div class="row">
	    <div class="col-lg-12">
		    <div class="panel panel-default">
		        <div class="panel-heading">
		            DataTables Advanced Tables
		        </div>
		        <!-- /.panel-heading -->
		        <div class="panel-body">
					<div class="dataTable_wrapper">
					    <table class="table table-hover" id="dataTables-example">
					    <thead>
					    	<tr><th>Nombre</th><th>Dirección</th><th>Teléfono</th><th>Zona</th><th></th></tr>
					    </thead>
					    <tbody>
					    	<?php 
					    	//var_dump($clientes);
					    		foreach ($clientes as $cliente) {
					    			
					    	?>
					    		<tr>
					    			<td><?php echo $cliente['nombre']; ?></td>
					    			<td><?php echo $cliente['direccion']; ?></td>
					    			<td><?php echo $cliente['telefono']; ?></td>
					    			<td><?php echo $cliente['zona']; ?></td>
					    			<td><a href="?edit&id=<?php echo $cliente['id']; ?>" class="btn btn-xs btn-info">
					    					<span class="glyphicon glyphicon-pencil"></span>
					    				</a>
					    				<a href="?remove&id=<?php echo $cliente['id']; ?>" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-remove"></span></a></td>
								</tr>
					    	 <?php
					    		}
					    	 ?>
					    </tbody>
					    </table>
					</div>
		        </div>
	        </div>
	    	
	    </div>
	</div>


<script>
	$(document).ready(function() {
	    $('#dataTables-example').DataTable({
	            responsive: true
	    });
	});
</script>