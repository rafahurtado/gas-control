<?php 
function get_consulta($query){
	return dbConecta::get_array($query);
}

function get_row($query){
	return dbConecta::get_row($query);
}

function execute($array){
	return dbConecta::execute($array);
}
/**
* 
*/
class usuario_model
{
	
	function getAll($id){
		return get_consulta("Select a.id,a.nombre,a.email,b.perfil,a.fecha_alta from usuarios as a left join usuarios_perfil as b on a.idperfil=b.idperfil where a.idempresa=$id order by a.nombre");
	}

	function get($idusuario){
		return get_row('Select a.id,a.nombre,a.email,a.idperfil,a.fecha_alta,a.idempresa,a.fereg from usuarios as a where id='.$idusuario);
	}

	function create($usuario){
		$querys = array();
		$querys[] ="Insert into usuarios(idempresa,email,nombre) values('". $usuario['idempresa'] ."','". $usuario['email'] ."','". $usuario['nombre'] ."');";
		echo 'Execute resultado CREATE : '. execute($querys);
	}

	function update($usuario){
		$querys = array();
		$querys[] ="Update usuarios set idempresa='". $usuario['idempresa'] ."',email='". $usuario['email'] ."',nombre='". $usuario['nombre'] ."' where id=". $usuario['id'] ;

		//$querys[] ="Update usuarios set user_reg=email where id=". $usuario['id'] ;
		
		$result = execute($querys);
		echo 'Execute resultado UPDATE : '. $result;

	}

}

/**
* 
*/
class empresa_model
{
	function get($id){
		return get_row('Select a.idempresa as id,a.ruc,a.nombre from empresa as a where idempresa='.$id  );
	}

	function getAll(){
		return get_consulta('Select a.idempresa,a.ruc,a.nombre from empresa as a');
	}

}


 ?>
